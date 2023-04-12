const toCurrency = Intl.NumberFormat('en-us', {
    currency: 'USD',
    style: "currency",
    maximumFractionDigits: 2,
});

const pagos = invoiceJSON;
const bancos = bancosJSON;

// console.log("Pagos: " + JSON.stringify(pagos, '', 2));
// console.log("Bancos: " + bancos);

const tabla_pagos = document.querySelector('#tabla_pagos');
const pagos_body = tabla_pagos.querySelector('tbody');

var total_pago = 0;

bancosArray = [];

for (let banco of bancos) {
    bancosArray.push(banco.name);
}

/**
 * Bancos select (bancos vienen del controlador)
 */
bancosArray.forEach(banco => {
    let option = document.createElement('option');
    option.value = banco;
    option.name = banco;
    option.innerText = banco;
    document.getElementById('bank').appendChild(option);
});

// Variables  para el borderaux padre
var asegurado;
var broker;
var banco_selected;
var valor_recibido;
var fecha_banco;

// Variables para los pagos
var num_factura;
var comision_total;
var val_factura;
var status;
var val_aplicado;
var saldo;

const movement_optionsArray = [
    'Inclusión',
    'Exclusión',
    'Negocio Nuevo',
    'Aumento de suma asegurada',
    'Cancelación',
    'Extensión de vigencia',
    'Aclaraciones de texto'
];

$(document).ready(function () {
    const responseData = JSON.parse(sessionStorage.getItem('responseData')); //Contiene la informacion del o los instalamentos

    console.log(responseData);
    //Trae información del borderaux seleccionado
    $.ajax({
        type: "GET",
        url: window.origin + "/api/borderouxesApi/" + responseData[0].id,
        success: function (r) {
            // console.log(`Response: \n${JSON.stringify(r, '', 2)}`);

            num_factura = r.object.bord_number;
            asegurado = r.object.insured;
            valor_recibido = toCurrency.format(parseFloat(r.object.invoice_value));
            r.object.movements;
            let bankSelect = document.querySelector('#bank');
            let bankOptions = bankSelect.options;

            //Asigna valores en pantalla
            document.querySelector('#assured').innerText = r.object.insured;
            document.querySelector("#received_value").value = r.object.received_value != null ? r.object.received_value : '';
            //Seleccionar el valor guardado del banco
            for (let i = 0; i < bankOptions.length; i++) {
                if (bankOptions[i].value == r.object.bank) {
                    bankOptions[i].selected = true;
                    break;
                }
            }

            broker = r.object.reinsurance_broker;
            let brokerSelect = $("[name='broker']");
            brokerSelect.empty();
            brokerSelect.append(new Option(broker, broker));
            brokerSelect.val(broker).trigger("change");
            brokerSelect.select2({
                language: 'es',
                tags: true,
                placeholder: 'Seleccionar',
                type: "post",
                dataType: 'json',
                delay: 250,
                ajax: {
                    url: window.location.origin + '/api/apireinsurer/show',
                    dataType: 'json',
                    cache: true,
                    data: function (params) {
                        return {
                            search: params.term,
                            reference: 'BQ'
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                },
                cache: true
            });
        }
    });


    if (responseData.length > 1) {
        for (let idx = 0; idx < responseData.length; idx++) {
            const registro = responseData[idx];

            let row = document.createElement('tr');
            pagos_body.append(row);

            let registry_number = document.createElement('th');
            let invoice_number = document.createElement('td');
            let total_commission = document.createElement('td');
            let invoice_value = document.createElement('td');
            let status = document.createElement('td');
            let applied_value = document.createElement('td');
            let invoice_balance = document.createElement('td');


            let register_number = undefined;

            if (registro.id < 10) {
                register_number = `000${registro.id}`;
            } else if (registro.id > 10 && registro.id < 100) {
                register_number = `00${registro.id}`;
            } else if (registro.id > 100 && registro.id < 1000) {
                registry_number = `0${registro.id}`;
            } else {
                register_number = `${registro.id}`;
            }


            registry_number.textContent = `${register_number}`;
            registry_number.setAttribute("scope", "row");
            registry_number.id = `registry_number_${idx}`;
            invoice_number.textContent = `${registro.invoice_number}`;
            invoice_number.id = `invoice_number_${idx}`;
            total_commission.textContent = `${toCurrency.format(registro.commission_total)}`;
            total_commission.id = `total_commission_${idx}`;
            invoice_value.textContent = `${toCurrency.format(registro.invoice_value)}`;
            invoice_value.id = `invoice_value_${idx}`;

            status.innerHTML = `
                <select name="status_${idx}" id="status_${idx}" >
                    <option value="" selected disabled>--Seleccionar--</option>
                    <option value="parcial">Parcial</option>
                    <option value="total">Total</option>
                </select>`;
            applied_value.innerHTML = `
            <input type="number" name="applied_value_${idx}" id="applied_value_${idx}" step="any"
            min="0" pattern="^[0-9]+(\.[0-9]{0,2})?$" value="0.00" required>`;
            invoice_balance.innerHTML = `
            <span id="invoice_balance_${idx}" name="invoice_balance_${idx}">${toCurrency.format(registro.invoice_balance)}</span>`;

            row.appendChild(registry_number);
            row.appendChild(invoice_number);
            row.appendChild(total_commission);
            row.appendChild(invoice_value);
            row.appendChild(status);
            row.appendChild(applied_value);
            row.appendChild(invoice_balance);

            // reviewAppliedValue(); //<-Esto da problemas, aun no reviso

            $.ajax({
                url: window.location.origin + '/api/borderouxesInstallationApi/' + responseData[idx].num_installation, // Replace with the URL of your update function
                method: 'GET',
                success: function (r) {
                    // console.log(`r: ${JSON.stringify(r, '', 2)}`);
                    let statusSelect = document.querySelector(`[name='status_${idx}']`);

                    for (let i = 0; i < statusSelect.options.length; i++) {
                        if (statusSelect.options[i].value === r.object.status) {
                            statusSelect.value = r.object.status;
                            break;
                        }
                    }
                    let valor_aplicado = document.querySelector(`[name="applied_value_${idx}"`);
                    valor_aplicado.value = r.object.applied_value != '' ? r.object.applied_value : 0.00;

                    document.querySelector(`#invoice_balance_${idx}`).innerText = toCurrency.format(parseFloat(r.object.invoice_balance));

                    document.getElementById(`applied_value_${idx}`).style.color = 'green';
                    document.getElementById(`invoice_balance_${idx}`).style.color = 'darkgreen';
                    updateFooter();
                }
            });
            updateFooter();
        }
    } else {
        let row = document.createElement('tr');
        pagos_body.append(row);

        let registry_number = document.createElement('th');
        let invoice_number = document.createElement('td');
        let total_commission = document.createElement('td');
        let invoice_value = document.createElement('td');
        let status = document.createElement('td');
        let applied_value = document.createElement('td');
        let invoice_balance = document.createElement('td');

        registry_number.textContent = `${responseData[0].invoice_serie}`;
        registry_number.setAttribute("scope", "row");
        registry_number.id = `registry_number`;
        invoice_number.textContent = `${responseData[0].invoice_number}`;
        invoice_number.id = `invoice_number`;
        total_commission.textContent = `${toCurrency.format(responseData[0].commission_total)}`;
        total_commission.id = `total_commission`;
        invoice_value.textContent = `${parseFloat(responseData[0].invoice_value).toFixed(2)}`;
        invoice_value.id = `invoice_value`;

        status.innerHTML = `
                <select name="status" id="status" >
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="parcial" >Parcial</option>
                    <option value="total">Total</option>
                </select>`;
        applied_value.innerHTML = `
            <input type="number" name="applied_value" id="applied_value" step="any"
            min="0" pattern="^[0-9]+(\.[0-9]{0,2})?$" value="0.00" required>`;
        invoice_balance.innerHTML = `
            <span id="invoice_balance" name="invoice_balance">$0.00</span>`;

        row.appendChild(registry_number);
        row.appendChild(invoice_number);
        row.appendChild(total_commission);
        row.appendChild(invoice_value);
        row.appendChild(status);
        row.appendChild(applied_value);
        row.appendChild(invoice_balance);

        $.ajax({
            url: window.location.origin + '/api/borderouxesInstallationApi/' + responseData[0].num_installation, // Replace with the URL of your update function
            method: 'GET',
            success: function (r) {
                // console.log(`r: ${JSON.stringify(r, '', 2)}`);

                let statusSelect = document.querySelector("[name='status']");
                for (let i = 0; i < statusSelect.options.length; i++) {
                    if (statusSelect.options[i].value === r.object.status) {
                        statusSelect.value = r.object.status;
                        break;
                    }
                }

                let valor_aplicado = document.querySelector('[name="applied_value"');
                valor_aplicado.value = r.object.applied_value != null ? r.object.applied_value : "$0.00";

                document.querySelector('#invoice_balance').innerText = toCurrency.format(parseFloat(r.object.invoice_balance));

                document.getElementById('applied_value').style.color = 'green';
                document.getElementById('invoice_balance').style.color = 'darkgreen';
                updateFooter();
            }
        });

        updateFooter();
    }

    const sum_payment_values = tabla_pagos.querySelector('#sum_payment_values');

    if (responseData.length > 1) {
        const status_selects = document.querySelectorAll(`[id^="status_"]`);
        status_selects.forEach(select => {
            // let status = select.options[select.selectedIndex].value;
            select.addEventListener('change', () => {
                updateMultiple();
            });
        })

        const inputs = document.querySelectorAll(`[id^='applied_value_']`);

        inputs.forEach(input => {
            input.addEventListener('input', () => {
                updateMultiple();
            });
        });
    } else {
        const status_select = document.querySelector(`[id="status"]`);
        // let status = status_select.options[status_select.selectedIndex].value;
        status_select.addEventListener('change', () => {
            updateSingle();
        });

        const input = document.querySelector(`[id='applied_value']`);
        input.addEventListener('input', () => {
            updateSingle();
        });
    }

    function getPagosBodyRows() {
        return tabla_pagos.querySelectorAll('tbody > tr');
    }

    const submit_button = document.querySelector("#submit_manejo_form");
    const form = document.querySelector("#manejo_form");

    function updateMultiple() {

        const pagos_body_rows = getPagosBodyRows();

        console.log(`Objetos: ${JSON.stringify(responseData, '', 2)}`);

        pagos_body_rows.forEach((item, idx) => {

            let status_select = document.getElementById(`status_${idx}`);
            // let status = status_select.options[status_select.selectedIndex].value;
            let inputAplicado = document.querySelector(`#applied_value_${idx}`);
            // let valor_aplicado = parseFloat(inputAplicado.value);
            let valor_aplicado = 0;

            let received_value = document.querySelector(`#received_value`).value;
            let saldoFactura = document.querySelector(`#invoice_balance_${idx}`);
            let valor_factura = document.querySelector(`#invoice_value_${idx}`);


            let status = undefined;
            /** evita numeros negativos */
            if (valor_aplicado < 0) {
                return false;
            }

            /**  Deshabilitar el inputAplicado si el status es "total" */
            if (status_select.value === "total") {
                inputAplicado.setAttribute('disabled', 'true');
                inputAplicado.value = valor_factura.innerHTML
            } else if (status_select.value ===  "parcial") {
                status_select.selectedIndex = 1;
                if (inputAplicado.hasAttribute('disabled')) {
                    inputAplicado.removeAttribute('disabled');
                }
            }

            /** Obtener el valor del input */

            if (inputAplicado.hasAttribute('disabled')) {
                valor_aplicado = 0;
            } else {
                valor_aplicado = parseFloat(inputAplicado.value);
            }

            /** Actualizar el saldo de la factura y el valor aplicado basado en el status */

            if (status_select.value === "total") {
                saldoFactura.innerText = `$0.00`;
            } else if (status_select.value === "parcial") {
                let parsedAplicado = parseFloat(inputAplicado.value)
                total_pago = toCurrency.format(valor_factura.innerText - parsedAplicado)
                console.log(valor_factura.innerHTML, parsedAplicado);
                saldoFactura.innerText = total_pago
            } else {
                saldoFactura.innerText = toCurrency.format(total_pago);
            }

            /** Solo se cambiará una vez */

            inputAplicado.addEventListener('input', function () {
                valor_aplicado = parseFloat(inputAplicado.value);
                total_pago = parseFloat(valor_factura - valor_aplicado).toFixed(2) ;
            });
            status_select.addEventListener('change', function () {
                status = status_select.options[status_select.selectedIndex].value;
                if (status === "parcial") {
                    total_pago = valor_factura - valor_aplicado;
                }
            });

            /** Evitar que salga NAN cuando el campo está vacío */

            if (inputAplicado.value === "" || isNaN(inputAplicado.value)) {
                inputAplicado.value = 0;
                valor_aplicado = 0;
            } else {
                valor_aplicado = parseFloat(inputAplicado.value);
            }

            /** No permitir que el valor ingresado sea mayor al valor recibido */

            if (parseFloat(inputAplicado.value) > parseFloat(received_value.innerText)) {
                invoice_balance.innerText = `${toCurrency.format(saldoFactura)}`;
                submit_button.setAttribute('disabled', 'true');
                console.log(received_value.innerText.replace('$', '').replace(',', ''))
                alert("¡El valor aplicado no puede ser mayor al valor recibido!");
                inputAplicado.value = parseFloat(received_value.innerText.replace('$', '').replace(',', ''));
                updateMultiple();
            } else if (parseFloat(inputAplicado.value) === parseFloat(received_value.innerText)) {
                invoice_balance.innerText = `${toCurrency.format(saldoFactura)}`;
                submit_button.removeAttribute('disabled');
            }
        });
        updateFooter();
    }

    function updateSingle() {
        // console.log(`Objetos: ${JSON.stringify(responseData, '', 2)}`);

        let registro = responseData[0].num_installation;
        let factura = responseData[0].invoice_number;
        let comision_total = responseData[0].commission_total;
        let valor_factura = responseData[0].invoice_value;

        let registry_number = tabla_pagos.querySelector(`#registry_number`);
        let invoice_number = tabla_pagos.querySelector(`#invoice_number`);
        let total_commission = tabla_pagos.querySelector(`#total_commission`);
        let invoice_value = tabla_pagos.querySelector(`#invoice_value`);
        let invoice_balance = tabla_pagos.querySelector(`#invoice_balance`);
        let status_select = document.getElementById(`status`);
        let status = status_select.options[status_select.selectedIndex].value;
        let inputAplicado = document.getElementById(`applied_value`);
        let valor_aplicado = parseFloat(inputAplicado.value);
        let saldo_factura = (valor_factura - valor_aplicado);
        let received_value = document.querySelector('#received_value');


        // validations(valor_aplicado, status, received_value);

        /** evita numeros negativos */
        if (valor_aplicado < 0) {
            return false;
        }

        /**  Deshabilitar el inputAplicado si el status es "total" */
        if (status_select.value === "total") {
            inputAplicado.setAttribute('disabled', 'true');
            inputAplicado.value = invoice_value.innerHTML
        } else if (status_select.value ===  "parcial") {
            status_select.selectedIndex = 0;
            if (inputAplicado.hasAttribute('disabled')) {
                inputAplicado.removeAttribute('disabled');
            }
        }

        /** Obtener el valor del input */

        if (inputAplicado.hasAttribute('disabled')) {
            valor_aplicado = 0;
        } else {
            valor_aplicado = parseFloat(inputAplicado.value);
        }

        /** Actualizar el saldo de la factura y el valor aplicado basado en el status */

        if (status === "total") {
            saldo_factura = 0;
        } else if (status === "parcial") {
            total_pago = valor_factura - valor_aplicado;
        } else {
            saldo_factura = 0;
        }

        /** Solo se cambiará una vez */

        inputAplicado.addEventListener('input', function () {
            valor_aplicado = parseFloat(inputAplicado.value);
            total_pago = valor_factura - valor_aplicado;
        });
        status_select.addEventListener('change', function () {
            /* status = status_select.options[status_select.selectedIndex].value;
            if (status === "parcial") {
                total_pago = valor_factura - valor_aplicado;
            } */
        });

        /** Evitar que salga NAN cuando el campo está vacío */

        if (inputAplicado.value === "" || isNaN(inputAplicado.value)) {
            inputAplicado.value = 0;
            valor_aplicado = 0;
        } else {
            valor_aplicado = parseFloat(inputAplicado.value);
        }

        /** No permitir que el valor ingresado sea diferente al valor recibido */

        if (parseFloat(inputAplicado.value) > parseFloat(received_value.innerText.replace('$', '').replace(',', ''))) {
            invoice_balance.innerText = `${toCurrency.format(saldo_factura)}`;
            submit_button.setAttribute('disabled', 'true');
            console.log(received_value.innerText.replace('$', '').replace(',', ''))
            alert("¡El valor aplicado no puede ser mayor al valor recibido!");
            inputAplicado.value = parseFloat(received_value.innerText.replace('$', '').replace(',', ''));
            updateSingle();
        } else if (parseFloat(inputAplicado.value) === parseFloat(received_value.innerText.replace('$', '').replace(',', ''))) {
            invoice_balance.innerText = `${toCurrency.format(saldo_factura)}`;
            submit_button.removeAttribute('disabled');
        }

        /** Asignar los valores a los campos */

        registry_number.innerText = `${registro}`;
        invoice_number.innerText = `${factura}`;
        total_commission.innerText = `${toCurrency.format(comision_total)}`;
        invoice_value.innerText = `${toCurrency.format(valor_factura)}`;

        invoice_balance.innerText = isNaN ? `${toCurrency.format("0")}` : `${toCurrency.format(saldo_factura)}`;
        $('[id="sum_payment_values"]').text(`${toCurrency.format(parseFloat(inputAplicado.value))}`);
    }

    // function validations(valor_aplicado, status, received_value) {
    //     let valor_factura = pagos.invoice_value;
    //     let inputAplicado = document.getElementById(`applied_value`);
    //     let saldo_factura = (valor_factura - valor_aplicado);
    //     let status_select = document.getElementById(`status`);

    //     /** evita numeros negativos */
    //     if (valor_aplicado < 0) {
    //         return false;
    //     }

    //     /**  Deshabilitar el inputAplicado si el status es "total" */
    //     if (status === "total") {
    //         inputAplicado.setAttribute('disabled', 'true');
    //     } else {
    //         inputAplicado.removeAttribute('disabled');
    //     }

    //     /** Obtener el valor del input */

    //     if (inputAplicado.hasAttribute('disabled')) {
    //         valor_aplicado = 0;
    //     } else {
    //         valor_aplicado = parseFloat(inputAplicado.value);
    //     }

    //     /** Actualizar el saldo de la factura y el valor aplicado basado en el status */

    //     if (status === "total") {
    //         saldo_factura = 0;
    //     } else if (status === "parcial") {
    //         total_pago = valor_factura - valor_aplicado;
    //     } else {
    //         saldo_factura = 0;
    //     }

    //     /** Solo se cambiará una vez */

    //     inputAplicado.addEventListener('input', function () {
    //         valor_aplicado = parseFloat(inputAplicado.value);
    //         total_pago = valor_factura - valor_aplicado;
    //     });
    //     status_select.addEventListener('change', function () {
    //         status = status_select.options[status_select.selectedIndex].value;
    //         if (status === "parcial") {
    //             total_pago = valor_factura - valor_aplicado;
    //         }
    //     });

    //     /** Evitar que salga NAN cuando el campo está vacío */

    //     if (inputAplicado.value === "" || isNaN(inputAplicado.value)) {
    //         inputAplicado.value = 0;
    //         valor_aplicado = 0;
    //     } else {
    //         valor_aplicado = parseFloat(inputAplicado.value);
    //     }

    //     /** No permitir que el valor ingresado sea diferente al valor recibido */

    //     if (parseFloat(inputAplicado.value) !== parseFloat(received_value.replace(/[g^\d.-]/g, ''))) {
    //         inputAplicado.value = parseFloat(received_value);
    //         invoice_balance.innerText = `${toCurrency.format(saldo_factura)}`;
    //         submit_button.setAttribute('disabled', 'true');
    //         alert("¡El valor aplicado no puede ser mayor al valor recibido!");
    //         updatePagos();
    //     } else if (parseFloat(inputAplicado.value) === parseFloat(received_value.replace(/[g^\d.-]/g, ''))) {
    //         invoice_balance.innerText = `${toCurrency.format(saldo_factura)}`;
    //         submit_button.removeAttribute('disabled');
    //     }
    // }

});

function updateFooter() {
    let sum = 0;
    $('[id^="invoice_balance"]').each(function () {
        sum += parseFloat($(this).text().replace(/[^\d.-]/g, ''));
    });

    document.querySelector('td#sum_payment_values').innerText = toCurrency.format(sum);
}
/* valor recibido va en valor aplicado */

function valueReceived() {
    let received_value = document.getElementById('received_value')
    let applied_value = document.getElementById('applied_value')
    let invoice_balance = document.getElementById('invoice_balance')
    console.log(invoice_balance)


    applied_value.value = received_value.value

    let formula = parseFloat(pagos.invoice_value - applied_value.value).toFixed(2)
    invoice_balance.innerHTML = `${formula}`
    updateFooter();
}

function reviewAppliedValue() {

    document.querySelector('#submit_manejo_form').removeAttribute('disabled');
    document.querySelector('#submit_manejo_form_2').removeAttribute('disabled');

    let applied_value = document.getElementById('applied_value')
    let invoice_value = document.getElementById('invoice_value')
    let invoice_balance = document.getElementById('invoice_balance')

    console.log(pagos.invoice_value);

    console.log(invoice_value.innerText);
    console.log(parseFloat(invoice_value.innerText));

    if (parseFloat(applied_value.value) > pagos.invoice_value) {

        applied_value.style.color = 'red'
        invoice_balance.style.color = 'red'
        document.querySelector('#submit_manejo_form').setAttribute('disabled', 'true');
        document.querySelector('#submit_manejo_form_2').setAttribute('disabled', 'true');

    }
    if (parseFloat(applied_value.value) <= pagos.invoice_value) {

        applied_value.style.color = 'green'
        invoice_balance.style.color = 'darkgreen'

        document.querySelector('#submit_manejo_form').removeAttribute('disabled');
        document.querySelector('#submit_manejo_form_2').removeAttribute('disabled');

    }
    updateFooter();
}


/**
 *
 * Para actualizar datos
 *
 */

function submitFirstForm(event) {
    event.preventDefault()
    let rows = [];

    const url = window.location.href;
    let borderauxId = url.substring(url.lastIndexOf('/') + 1);

    console.log(borderauxId);

    //Itera por cada fila de datos
    $("#cobrokerajes_cobranzas tr").each(function () {
        let insured = $(this).find("#assured").text();
        let reisurance_broker = $(this).find("select[name='broker']").val();
        let bank = $(this).find("select[name='bank']").val();
        let received_value = $(this).find("input[name='received_value']").val();
        let bank_deposit_date = $(this).find("input[name='bank_deposit_date']").val();

        rows.push({
            insured: insured,
            reinsurance_broker: reisurance_broker,
            bank: bank,
            received_value: received_value,
            bank_deposit_date: bank_deposit_date
        });

        //Set rows data as a value of the hidden input
        $("input[name='first_rows']").val(JSON.stringify(rows));

        //Submit form
        $("#manejo_form").submit();
    });


    rows.forEach(row => {
        console.log(row);
        $.ajax({
            url: window.location.origin + '/api/borderouxesApi/' + borderauxId, // Replace with the URL of your update function
            method: 'put',
            /*         headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }, */
            data: row,
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Exitoso...',
                    text: 'Registro guardado!',
                })
            }
        });
    })

}

function submitSecondForm() {
    const url = window.location.href;
    let borderauxId = url.substring(url.lastIndexOf('/') + 1);

    const responseData = JSON.parse(sessionStorage.getItem('responseData')); //Contiene la informacion del o los instalamentos

    var rows = [];
    //Itera por cada fila de datos
    $("#tabla_pagos tr").each(function () {
        let registry_number = $(this).find('#registry_number').text();
        let invoice_balance = $(this).find('#invoice_balance').text();
        let status = $(this).find('#status').val();
        let appliedValue = $(this).find('#applied_value').val();

        rows.push({
            registry_number: registry_number,
            invoice_balance: invoice_balance,
            status: status,
            applied_value: appliedValue
        });

        //Set rows data as a value of the hidden input
        $("input[name='second_rows']").val(JSON.stringify(rows));

        //Submit form
        $("#manejo_form").submit();
    });

    rows.forEach(row => {
        if (responseData > 1) {
            responseData.forEach((data, index, array) => {
                $.ajax({
                    url: window.location.origin + '/api/borderouxesInstallationApi/' + responseData[index].num_installation, // Replace with the URL of your update function
                    method: 'put',
                    /* headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }, */
                    data: row,
                    success: function (response) {
                        console.log(response);
                        if (index == responseData) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Exitoso...',
                                text: 'Registros guardados!',
                            })
                        }
                    }
                });
            })
        } else {
            $.ajax({
                url: window.location.origin + '/api/borderouxesInstallationApi/' + responseData[0].num_installation, // Replace with the URL of your update function
                method: 'put',
                /* headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, */
                data: row,
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Exitoso...',
                        text: 'Registro guardado!',
                    })
                }
            });
        }
    })

}


