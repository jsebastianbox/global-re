var invoice = document.getElementById('invoice');
var invoice_number = document.getElementById('invoice_number');

function generateDocument(tipoDocumento, tipoFactura) {
    switch (tipoDocumento) {
        case 'invoice':
            generateInvoice(tipoFactura)
            break;
        case 'credito':
        generateCreditNote();
        break;
        case 'debito':
        generateDebitNote();
        break;
        default:
            break;
    }
}

function generateInvoice({type, data}) {
    let nextInvoice = 0;
    let year = new Date().getFullYear();

    switch (type) {
        case 'cobrokeraje':
            let number = nextInvoice;

            if (nextInvoice < 10) {
                number = `00${nextInvoice}`
            } else if (nextInvoice > 10 && nextInvoice < 100) {
                number = `0${nextInvoice}`
            }

            invoice_number.innerText = `FC${number}-${year}`;
            console.log(number)
            alert(`¡Se generó una factura de ${type}!`);
            break;
        default:
            break;
    }
}

function generateDebitNote(){
    let nextDebit = 0;
    alert('¡Se generó una nota de débito!')
}

function generateCreditNote(){
    let nextCredit = 0;
    alert('¡Se generó una nota de crédito!')
}
