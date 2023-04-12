/* generate pdf */
function generatePDF(type) {
    // Choose the element that your content will be rendered to.
    const element = document.getElementById(type);
    // Choose the element and save the PDF for your user.
    html2pdf().from(element).save();
}
/* end */


/* orden de pago */


function generateOrdenPago({ type }, idBorderoux, id) {

    let message = 'La orden de pago ha sido generada exitosamente. ¿Deseas verla ahora?';

    let year = new Date().getFullYear()
    let month = new Date().getMonth()
    let day = new Date().getDate()

    //invoice container
    let orden_page = document.getElementById('orden_page')
    let name = orden_page.getElementById('name');
    let payment_id = orden_page.getElementById('payment_id');
    let to = orden_page.getElementById('to');
    let reference = orden_page.getElementById('reference');
    let total_value = orden_page.getElementById('total_value');
    let detail = orden_page.getElementById('detail');
    let orden_table = orden_page.querySelector('.orden_table');
    let total_transfer = orden_page.getElementById('total_transfer');
    let issued_by = orden_page.getElementById('issued_by');
    let approver = orden_page.getElementById('approver');

    
    //find the object
    let the_object = borderoux.borderoux_installation.find( res => res.id === id )
    
    //codigo
    if (id < 10) {
        payment_id.innerHTML = `GRB-2023-00${id}`
    } else if (id < 100) {
        payment_id.innerHTML = `GRB-2023-0${id}`
    } else if (id >= 100) {
        payment_id.innerHTML = `GRB-2023-${id}`
    }

    //Poner en el HTML
    name.innerHTML = `${the_object.name}`

    
    if (confirm(message)) {
        const pdfbutton = document.getElementById("download-button-ordenPago");
        pdfbutton.addEventListener("click", generatePDF('orden_page'));
        pdfbutton.click();
    } else {
        return;
    }

}

/* end */

/* nota de cobertura - endosos */


function generateCoverNotaEndorsement({ type }, idBorderoux, id) {

    let message = 'La nota de cobertura ha sido generada exitosamente. ¿Deseas verla ahora?';

    let year = new Date().getFullYear()
    let month = new Date().getMonth()
    let day = new Date().getDate()

    //invoice container
    let cover_note_endorsements = document.getElementById('cover_note_endorsements')
    let cover_number = cover_note_endorsements.getElementById('cover_number');
    let to = cover_note_endorsements.getElementById('to');
    let reinsured = cover_note_endorsements.getElementById('reinsured');
    let vigency_from = cover_note_endorsements.getElementById('vigency_from');
    let vigency_to = cover_note_endorsements.getElementById('vigency_to');
    let boat = cover_note_endorsements.querySelector('.boat');
    let shipment_name = cover_note_endorsements.getElementById('shipment_name');
    let limit = cover_note_endorsements.getElementById('limit');
    let same_aditional_insured = cover_note_endorsements.getElementById('same_aditional_insured');
    let issued_by = cover_note_endorsements.getElementById('issued_by');
    let pageCount = cover_note_endorsements.getElementById('pageCount');

    
    //find the object
    let the_object = borderoux.borderoux_installation.find( res => res.id === id )
    
    //codigo
    if (id < 10) {
        cover_number.innerHTML = `GRB-00${id}-${year}/${year+1}`
    } else if (id < 100) {
        cover_number.innerHTML = `GRB-0${id}-${year}/${year+1}`
    } else if (id >= 100) {
        cover_number.innerHTML = `GRB-${id}-${year}/${year+1}`
    }

    //Poner en el HTML
    to.innerHTML = `${the_object.name}`

    
    if (confirm(message)) {
        const pdfbutton = document.getElementById("download-button-ordenPago");
        pdfbutton.addEventListener("click", generatePDF('cover_note_endorsements'));
        pdfbutton.click();
    } else {
        return;
    }

}

/* end */