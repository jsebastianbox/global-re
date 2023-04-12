var tbody = document.querySelector('#instalamento-body');

const currencyFormat = new Intl.NumberFormat(undefined, {
    currency: "USD",
    style: "currency",
    maximumFractionDigits: 2
});

// Para evitar que pase el 100%
function checkPercentage(target) {
    if (target.value > 100) {
        target.value = 100;
    } else if (target.value < 0) {
        target.value = 0;
    }
}

var dateFrom;
let arrayIds = []
let borderoux

function generateInstalamentTable(id) {

    //
    $('#modalInstalamentos').fadeToggle(300, "linear")
    $('#instalamento-body').empty()
    $('#instalamento-tfoot').empty()

    const dev_URL = window.location.origin + '/api/showInstallationBorderoux/' + id
    // const prod_URL = '/api/showInstallationBorderoux/' + id

    let num_instalaments, registro
    let key = 0
    $.get(dev_URL, data => {
        console.log(data)
        console.log(data.borderoux)
        borderoux = data.borderoux
        //variable para la function de actualizar fecha
        dateFrom = data.borderoux.from
        //variables para tfoot
        let brutaTotal, taxesTotal, netaTotal, comision_percentage, comision_total, idBorderoux
        //variable for comission formula
        let pneta
        idBorderoux = data.borderoux.id
        num_instalaments = data.borderoux.installation
        registro = data.borderoux.borderoux_installation
        comision_percentage = data.borderoux.commission_percentage
        comision_total = data.borderoux.commission_total

        let comision_por_instalamento = parseFloat(comision_total / num_instalaments)

        arrayIds = []
        registro.forEach((re, index) => {
            arrayIds.push(re.id)

            pneta = re.net_premium
            brutaTotal = re.gross_premium * num_instalaments
            taxesTotal = re.taxes * num_instalaments
            netaTotal = re.net_premium * num_instalaments

            let dateOnly = re.created_at.split('T')[0];

            $('#instalamento-body').append(`
                <tr id="trInstalament${re.id}">
                    <td>${key + 1}</td>
                    <td>${dateOnly}</td>
                    <td>${currencyFormat.format(re.gross_premium)}</td>
                    <td>${currencyFormat.format(re.taxes)}</td>
                    <td class="pnetaInstalamento">${currencyFormat.format(re.net_premium)}</td>
                    <td>${key + 1} de ${num_instalaments}</td>

                    <td><input type="number" class="day_count${key + 1}" value="${re.num_days}" onkeyup="sumDays(${key + 1})"></td>
                    <td><input value="${re.date_installation}" type="text" class="fromDate${key + 1}" disabled/></td>
                    <td><strong><span>${comision_percentage}</span>%</strong></td>
                    <td><span class="comision-total">${currencyFormat.format(comision_por_instalamento)}</span></td>

                    <td>
                        <button id="button_${index}" onclick=postInstalament(${re.id},${idBorderoux}) class="btn btn-info" style="white-space:pre-wrap;">Generar Documento</button>
                    </td>

                </tr>`
            )

            $(`#trInstalament${re.id}`).append(`

                <form method="PUT" id="formInstalament${re.id}">

                    <input type="hidden" name="gross_premium" value="${re.gross_premium}">
                    <input type="hidden" name="taxes" value="${re.taxes}">
                    <input type="hidden" name="net_premium" value="${re.net_premium}">
                    <input type="hidden" name="num_installation" value="${key + 1}">
                    <input type="hidden" name="num_days" value="${re.num_days}" class="day_count${key + 1}_input">
                    <input type="hidden" name="date_installation" value="${re.date_installation}" class="fromDate${key + 1}_input">
                    <input type="hidden" name="commission" value="${comision_percentage}" class="comision_percentage_input">
                    <input type="hidden" name="commission_total" value="${comision_por_instalamento}" class="comision_total_input">
                    <input type="hidden" name="is_generate_invoice" value="1">

                </form>
            `)

            key++

            getInstalamentoId(re.id);
            getBorderouxId(idBorderoux);
        })
        /* tfoot */
        $('#instalamento-tfoot').append(`

            <tr>
                <td>Total:</td>
                <td></td>
                <td id="brutaTotal_${id}" hidden>${brutaTotal}</td>
                <td>${currencyFormat.format(brutaTotal)}</td>
                <td>${currencyFormat.format(taxesTotal)}</td>
                <td>${currencyFormat.format(netaTotal)}</td>
                <td colspan="6"></td>
            </tr>

        `)

        const buttons = document.querySelectorAll('button[id^="button_"]');

        for (let i = 0; i < buttons.length; i++) {
            const button = buttons[i];
            if (data.borderoux.movements === 'Cancelación' || data.borderoux.movements === 'Exclusión' || data.borderoux.movements === 'Disminución de Suma Asegurada') {
                button.textContent = "Generar Nota de Crédito";
            } else if (data.borderoux.movements === 'Negocio Nuevo' || data.borderoux.movements === 'Registro' || data.borderoux.movements === 'Renovación' || data.borderoux.movements === 'Extensión Vigencia' || data.borderoux.movements === 'Aumento de Suma Asegurada' || data.borderoux.movements === 'Inclusión') {
                button.textContent = "Generar Factura";
            }
        }
    })

}

function sumDays(row) {
    let dayCount = tbody.querySelector(`.day_count${row}`)
    let dayCountInput = tbody.querySelector(`.day_count${row}_input`)
    let fromDateRow = tbody.querySelector(`.fromDate${row}`)
    let fromDateRowInput = tbody.querySelector(`.fromDate${row}_input`)

    dayCountInput.value = dayCount.value
    if (dayCount.value.length > 0) {


        let date = new Date(dateFrom.toString())

        let dias = parseInt(dayCount.value)

        date.setDate(date.getDate() + 1 + dias)

        fromDateRow.value = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
        fromDateRowInput.value = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
    }

}

var current_id;

function getBorderouxId(id) {
    current_id = id
}

var instalamento_current_id;

function getInstalamentoId(id) {
    instalamento_current_id = id;
}

function saveAllInstalaments() {

    console.log(arrayIds);
    for (let i = 0; i < arrayIds.length; i++) {
        const id = arrayIds[i];

        const dev_URL = 'http://127.00.1:8000/api/borderouxesInstallationApi/' + id
        const prod_URL = '/api/borderouxesInstallationApi/' + id

        let form = document.getElementById(`formInstalament${id}`)
        let formData = new FormData(form)
        let obj = {}
        formData.forEach((val, key) => obj[key] = val)

        console.log(obj.commission)

        let form2 = {
            "gross_premium": obj.gross_premium,
            "taxes": obj.taxes,
            "net_premium": obj.net_premium,
            "num_installation": obj.num_installation,
            "num_days": obj.num_days,
            "date_installation": obj.date_installation,
            "commission": obj.commission,
            "is_generate_invoice": 0,
            "borderouxes_id": obj.borderouxes_id,
            "registry_number": id,
        }

        $.ajax({
            url: dev_URL,
            type: 'PUT',
            data: form2,
            success: function (result) {
                console.log(`Result:  ${result}`);
                if (i == arrayIds.length - 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Exitoso...',
                        text: 'Registros guardados!',
                    })
                }
            }
        })
    }
}
$('#saveModalInstalamentos').on('click', saveAllInstalaments)

function postInstalament(id, idBorderoux) {

    const dev_URL = window.location.origin + '/api/borderouxesInstallationApi/' + id

    let form = document.getElementById(`formInstalament${id}`)
    let formData = new FormData(form)
    let obj = {}
    formData.forEach((val, key) => obj[key] = val)

    console.log(`Objeto: ${JSON.stringify(obj, '', 2)}`)

    let form2 = {
        "gross_premium": obj.gross_premium,
        "taxes": obj.taxes,
        "net_premium": obj.net_premium,
        "num_installation": obj.num_installation,
        "num_days": obj.num_days,
        "date_installation": obj.date_installation,
        "commission": obj.commission,
        "is_generate_invoice": obj.is_generate_invoice,
        "borderouxes_id": obj.borderouxes_id,
        "registry_number": id,
        "invoice_number": getBorderauxCode(current_id),
    }

    $.ajax({
        url: dev_URL,
        type: 'PUT',
        data: form2,
        success: function (result) {
            // console.log(`Result:  ${result}`);
        },
    });

    $.ajax({
        url: window.origin + "/api/borderouxesApi/" + idBorderoux,
        type: 'GET',
        contentType: "application/json",
        success: function (response) {
            // console.log(`Response 1: ${JSON.stringify(response, '', 2)}`);
            const r = response;
            /* generateInvoice({ type: 'cobrokeraje' }, idBorderoux, id); */
            //Generar nota de debito o factura
            if (r.object.movements === 'Cancelación' || r.object.movements === 'Exclusión' || r.object.movements === 'Disminución de Suma Asegurada') {
                generateCreditNote({ type: 'cobrokeraje' }, idBorderoux, id);
            } else if (r.object.movements === 'Negocio Nuevo' || r.object.movements === 'Registro' || r.object.movements === 'Renovación' || r.object.movements === 'Extensión Vigencia' || r.object.movements === 'Aumento de Suma Asegurada' || r.object.movements === 'Inclusión') {
                generateInvoice({ type: 'cobrokeraje' }, idBorderoux, id);
            }
        }
    });
}

//** Facturas */
function generateInvoice({ type }, idBorderoux, id) {
    let message = "La factura ha sido generada exitosamente. ¿Deseas verla ahora?"

    // console.log(id, idBorderoux);

    let invoice = document.getElementById('invoice');
    let invoice_number = document.getElementById('invoice_number');
    let nextInvoice = 1;
    let year = new Date().getFullYear();
    let month = new Date().getMonth();
    let day = new Date().getDate();
    let date = document.getElementById('invoice-date');
    let numero_instalamento = invoice.querySelector('#numero_instalamento')
    let instalamento_value = invoice.querySelector('#instalamento_value')
    let commission_percentage = document.getElementById('commission_percentage');
    let total_comission = document.getElementById('total_comission_invoice')
    let total_invoice = document.getElementById('total-invoice');
    // let total_comission_invoice = document.querySelector('total_comission_invoice');

    date.innerText = `${day}/${month + 1}/${year}`;

    let number = 0;

    number = nextInvoice;

    switch (type) {
        case 'cobrokeraje':
            if (nextInvoice < 10) {
                number = `00${nextInvoice}`
            } else if (nextInvoice > 10 && nextInvoice < 100) {
                number = `0${nextInvoice}`
            }
            invoice_number.innerText = `FC${number}-${year}`;
            // alert(`¡Se generó una factura de ${type}!`);
            break;
        default:
            break;
    }

    //Para generación de borderaux
    $.ajax({
        url: window.location.origin + "/api/showInstallationBorderoux/" + idBorderoux,
        data: {
            id: id
        },
        success: function (data) {
            // console.log("URL: " + window.location.origin + "/api/showInstallationBorderoux/" + idBorderoux)

            console.log(data);
            let res = JSON.stringify(data.borderoux, null, 2);
            let r = JSON.parse(res);
            // console.log(r)
            //find instalament
            let theInstalament = r.borderoux_installation.find(el => el.id === id)

            console.log(theInstalament);

            total_comission.innerText = `${currencyFormat.format(theInstalament.invoice_value)}`;
            total_invoice.innerText = currencyFormat.format(theInstalament.invoice_value);

            instalamento_value.innerText = currencyFormat.format(theInstalament.net_premium);
            commission_percentage.innerText = `${theInstalament.commission}%`;

            total_comission_invoice.innerText = currencyFormat.format(theInstalament.invoice_value);

            postBorderaux({
                borderaux_id: r.id,
                insured: r.insured,
                // register_number: r.bord_number,
                broker: r.reinsurance_broker,
                invoice_number: getBorderauxCode(r.id),           /** Actualizar con el ID del registro en caso de que sea ver factura  */
                total_comission: theInstalament.commission_total,
                invoice_total: theInstalament.invoice_value,
                invoice_balance: parseFloat(theInstalament.invoice_balance).toFixed(2),
                last_id: theInstalament.id
            });

            if (confirm(message)) {
                pdfbutton.addEventListener("click", generatePDF('invoice'));
                pdfbutton.click();
            } else {
                return;
            }
        },
        error: function () {
            console.warn("No se pudo recuperar la información de " + window.location.origin + "/api/borderouxesInstallationApi/" + id + ".");
        }
    });
}

function getBorderauxCode(borderaux_id) {
    let year = new Date().getFullYear();
    //Poner código de instalamento
    if (borderaux_id < 10) {
        return `COB-000${borderaux_id}/${year} `;
    } else if (borderaux_id > 10 && borderaux_id < 100) {
        return `COB-00${borderaux_id}/${year}`;
    } else if (borderaux_id > 100 && borderaux_id < 1000) {
        return `COB-0${borderaux_id}/${year}`;
    }
    else {
        return `COB-${borderaux_id}/${year}`;
    }
}

function postBorderaux({ borderaux_id, insured, broker, invoice_number, total_comission, invoice_total, invoice_balance, last_id }) {

    let codigo_borderaux = getBorderauxCode(borderaux_id);

    let data = {
        'insured': insured,
        'invoice_serie': invoice_number,
        'reinsurance_broker': broker,
        'number_invoice': last_id,
        'commission_total': total_comission,
        'invoice_value': invoice_total,
        'invoice_balance': parseFloat(invoice_balance).toFixed(2),
        'borderoux_id': borderaux_id,
        'bord_number': codigo_borderaux
    };

    // console.log(`Post Borderaux received object: ${JSON.stringify(data, '', 2)}`);

    let host = window.location.origin;

    console.log(JSON.stringify({
        invoice_number: data.invoice_serie,
        invoice_value: data.invoice_value,
        invoice_balance: data.invoice_balance,
        borderouxes_id: data.borderoux_id,
        invoice_serie: data.number_invoice,
        bord_number: data.invoice_serie
    }, '', 2));

    $.ajax({
        url: window.origin + "/api/borderouxesApi/" + borderaux_id,
        type: 'PUT',
        contentType: "application/json",
        data: JSON.stringify({
            insured: data.insured,
            reinsurance_broker: data.reinsurance_broker,
            commission_total: data.commission_total,
            bord_number: data.invoice_serie
        }),
        success: function (response) {
            // console.log(`Response 1: ${JSON.stringify(response, '', 2)}`);

            // After posting the data to the "borderoux" table, you can use the borderoux_id to post the additional data to the "installment" table
            $.ajax({
                url: host + '/api/borderouxesInstallationApi/' + instalamento_current_id,
                type: 'PUT',
                contentType: "application/json",
                data: JSON.stringify({
                    invoice_number: data.invoice_serie,
                    invoice_value: data.invoice_value,
                    invoice_balance: parseFloat(data.invoice_balance).toFixed(2),
                    borderouxes_id: data.borderoux_id,
                    invoice_serie: data.number_invoice,
                    bord_number: data.invoice_serie,
                    registry_number: instalamento_current_id
                }),
                success: function (response) {
                    console.log(`Given URL: ${host}/api/borderouxesInstallationApi/${instalamento_current_id}`);
                    console.log(`Given Data: ${data.invoice_serie}, ${data.invoice_value}, ${data.invoice_balance}, ${data.borderoux_id}, ${data.number_invoice}`);
                    console.log(`Response 2: ${JSON.stringify(response, '', 2)}`);
                }
            });
        }
    });
}

function generateDebitNote({ type }, idBorderoux, id) {
    let nextDebit = 0;
    let message = 'La nota de débito ha sido generada exitosamente. ¿Deseas verla ahora?';

    confirm(message);

    if (confirm(message)) {
        pdfbutton.addEventListener("click", generatePDF);
        pdfbutton.click();
    } else {
        return;
    }
}

function generateCreditNote({ type }, idBorderoux, id) {

    let message = 'La nota de crédito ha sido generada exitosamente. ¿Deseas verla ahora?';

    let invoice_credit_note = document.getElementById('invoice_credit_note');
    let nextInvoice = 1;
    let year = new Date().getFullYear();
    let month = new Date().getMonth();
    let day = new Date().getDate();
    let note_code = invoice_credit_note.querySelector('#invoice_number')
    let cedente = document.querySelector('#cedente')
    let direccion = document.querySelector('#direccion')
    let telefono = document.querySelector('#telefono')
    let ciudad = document.querySelector('#ciudad')
    let date = document.getElementById('invoice-date2');
    let total_comission = invoice_credit_note.querySelector('#total_comission_invoice')
    let total_invoice = invoice_credit_note.querySelector('#total-invoice');

    date.innerText = `${day}/${month + 1}/${year}`;

    number = nextInvoice;

    //find instalament
    let theInstalament = borderoux.borderoux_installation.find(res => res.id === id)
    console.log(theInstalament);

    //Poner en el HTML

    total_comission.innerText = `${currencyFormat.format(theInstalament.invoice_value)}`;
    total_invoice.innerText = currencyFormat.format(theInstalament.invoice_value);






    //Poner código de instalamento
    switch (type) {
        case 'cobrokeraje':
            if (nextInvoice < 10) {
                number = `00${nextInvoice}`
            } else if (nextInvoice > 10 && nextInvoice < 100) {
                number = `0${nextInvoice}`
            }
            note_code.innerText = `FC${number}-${year}`;
            // alert(`¡Se generó una factura de ${type}!`);
            break;
        default:
            break;
    }

    if (confirm(message)) {
        let pdfbutton = document.getElementById("download-button-creditNote");
        pdfbutton.addEventListener("click", generatePDF('invoice_credit_note'));
        pdfbutton.click();
    } else {
        return;
    }
    // if (confirm(message)) {
    //     pdfbutton.addEventListener("click", generatePDF);
    //     pdfbutton.click();
    // } else {
    //     return;
    // }
}
//Descargar como PDF

const pdfbutton = document.getElementById("download-button");

function generatePDF(type) {
    // Choose the element that your content will be rendered to.
    const element = document.getElementById(type);
    // Choose the element and save the PDF for your user.
    html2pdf().from(element).save();
}

// function validateForm() {
//     let isValid = true;
//     const inputs = $('input:not([type="hidden"]):not([type="search"]):not(#impuesto_instalamento):not(#primaNeta_instalamento):not(#primaBruta_instalamento)');
//     const selects = $('select');

//     for (let i = 0; i < inputs.length; i++) {
//         if (inputs[i].value === '') {
//             console.log(`Input ${i}: ${inputs[i].name} is empty`);
//             $(inputs[i]).css('border', '1px solid #f00');
//             if (isValid) {
//                 $(inputs[i]).focus();
//             }
//             isValid = false;
//         } else {
//             $(inputs[i]).css('border', '');
//         }
//     }

//     if (isValid) {
//         for (let i = 0; i < selects.length; i++) {
//             if (selects.eq(i).is('select') && selects[i].value === '') {
//                 console.log(`Select ${i}: ${selects[i].name} is empty`);
//                 $(selects[i]).css('border', '1px solid #f00');
//                 if (isValid) {
//                     $(selects[i]).focus();
//                 }
//                 isValid = false;
//             } else if (selects.eq(i).hasClass('js-example-basic-single') && selects.eq(i).select2('val') === '') {
//                 console.log(`Select ${i}: ${selects[i].name} is empty`);
//                 $(selects[i]).css('border', '1px solid #f00');
//                 if (isValid) {
//                     $(selects[i]).focus();
//                 }
//                 isValid = false;
//             } else {
//                 $(selects[i]).css('border', '');
//             }
//         }
//     }

//     return isValid;
// }

// $('form#borderaux_form').on("submit", function (e) {
//     e.preventDefault();
//     if (!validateForm()) {
//         Swal.fire({
//             icon: 'error',
//             title: 'Oops...',
//             text: 'Por favor, asegúrate de llenar todos los campos correctamente.'
//         });
//     } else {
//         Swal.fire({
//             icon: 'success',
//             title: '¡Realizado!',
//             text: 'El registro ha sido creado exitosamente.',
//             showConfirmButton: true,
//             allowOutsideClick: false,
//             confirmButtonText: 'Aceptar',
//             timer: 6000
//         }).then(() => {
//             Swal.fire({
//                 title: "¿Qué deseas hacer ahora?",
//                 text: "¿Ir a los registros o ingresar más datos?",
//                 icon: "warning",
//                 showDenyButton: true,
//                 confirmButtonText: 'Ingresar Nuevo Registro',
//                 denyButtonText: 'Ver Registros',
//                 allowOutsideClick: false,
//             }).then(result => {
//                 if (result.isConfirmed) {
//                     $('form#borderaux_form')[0].reset();
//                 } else if (result.isDenied) {
//                     recordsHandler();
//                 }
//                 this.submit().then(() => {
//                     setTimeout(() => recordsHandler(), 500);
//                     console.log('Submitted!')
//                 });
//             });
//         });
//     }
// });
