
/* numeros */
const numberFormatter = Intl.NumberFormat('en-US');

let participacion = document.querySelectorAll('#borderaux_stake');
let primas_brutas = document.querySelectorAll('.borderaux_gross_premium');
let impuestos = document.querySelectorAll('#borderaux_tax_deductions');
let prima_neta = document.querySelectorAll('.borderaux_reinsurance_premium');
let prima_instalamentos = document.querySelectorAll('#borderaux_installation_premium');

let comision_recibida = document.querySelectorAll('#borderaux_commission_received');
let comision_por_cobrar = document.querySelectorAll('#borderaux_commission_receivable');
let number_formatter = document.querySelectorAll('.number_formatter');


for (const item of participacion) {
    const original_text = item.innerText;
    item.innerText = numberFormatter.format(original_text) + '%';
}

for (const item of primas_brutas) {
    const original_text = item.innerText;
    item.innerText = '$' + numberFormatter.format(original_text);
    item.style.fontWeight = 'bold';
}

for (const item of prima_neta) {
    const original_text = item.innerText;
    item.innerText = '$' + numberFormatter.format(original_text);
}
for (const item of number_formatter) {
    const original_text = item.innerText;
    item.innerText = '$' + numberFormatter.format(original_text);
}

/* end */

/* formula prima neta */

function formulaPrimaNeta() {

    let primaNeta = document.getElementById('primaNeta')
    let gross_premium = document.getElementById('gross_premium')
    let tax_deductionsPercent = document.getElementById('tax_deductions')
    let stakePercent = document.getElementById('stake')

    let tax_deductions = parseFloat(gross_premium.value * parseFloat(tax_deductionsPercent.value / 100))


    let stake;
    if (stakePercent.value === '') {
        stake = 1
        let formula = parseFloat(gross_premium.value - tax_deductions) * stake
        primaNeta.value = formula.toFixed(2)


    } else {

        stake = parseFloat(stakePercent.value / 100).toFixed(2)
        let formula = parseFloat(gross_premium.value - tax_deductions) * stake
        primaNeta.value = formula.toFixed(2)
    }


}

/* end */

/* formulas x instalamento */

function formulasPorInstalamento() {
    //instalamento
    let instalament = document.getElementById('instalament')


    //prima bruta por instalamento
    let primaBruta_instalamento = document.getElementById('primaBruta_instalamento')
    let gross_premium = document.getElementById('gross_premium')
    if (gross_premium.value > 0 && instalament.value > 0) {

        let formula = parseFloat(gross_premium.value / instalament.value).toFixed(2)
        primaBruta_instalamento.value = formula
    }
    //impuesto/deducciones x instalament
    let impuesto_instalamento = document.getElementById('impuesto_instalamento')

    let tax_deductionsPercent = document.getElementById('tax_deductions')

    if (tax_deductionsPercent.value > 0 && instalament.value > 0) {
        let tax_deductions = parseFloat(gross_premium.value * parseFloat(tax_deductionsPercent.value / 100))

        let formula = parseFloat(tax_deductions / instalament.value).toFixed(2)
        impuesto_instalamento.value = formula
    }
    //prima neta x instalament
    let primaNeta_instalamento = document.getElementById('primaNeta_instalamento')
    let primaNeta = document.getElementById('primaNeta')
    if (primaNeta.value > 0 && instalament.value > 0) {

        let formula = parseFloat(primaNeta.value / instalament.value).toFixed(2)
        primaNeta_instalamento.value = formula
    }
}


/* end */

/* datables functions */

$(document).ready(function () {

    //Solo necesario para el nombre del archivo para exportar.
    //Por defecto es el título de la página.
    document.title = 'Registros Borderaux';
    // Inicialización de la DataTable
    $('#borderaux_table').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json'
        },
        "dom": '<"dt-buttons"Bf><"clear">lirtp',
        "paging": true,
        "autoWidth": true,
        "columnDefs": [{
            "orderable": true,
            "targets": 5
        }],
        "buttons": [{
            extend: 'colvis',
            text: 'Mostrar Columnas'
        },
        {
            extend: 'copyHtml5',
            text: 'Copiar'
        },
        {
            extend: 'csvHtml5',
            text: 'CSV'
        },
        {
            extend: 'excelHtml5',
            text: 'Excel'
        },
        {
            extend: 'pdfHtml5',
            text: 'PDF',
            exportOptions: {
                selected: true,
                columns: ':visible',
                orientation: ':landscape',
                modifier: {
                    page: 'current',
                },
            }
        },
        {
            extend: 'print',
            text: 'Imprimir'
        },
        ]
    });
});

/* end */

/* end */


//ajax for selects

$(document).ready(function () {


    var hosting = window.location.origin;

    function ajaxSelect(type, url, isMultiple, reference = '') {

        $(type).select2({
            language: 'es',
            tags: true,
            multiple: isMultiple,
            //minimumInputLength:1,
            placeholder: 'Seleccionar',
            type: "post",
            dataType: 'json',
            delay: 250,
            ajax: {
                url: hosting + "/api/" + url + "/show",
                //url: "/api/" + url + "/show",
                dataType: 'json',
                cache: true,
                /* success: function (data) {
                    callback(data);
                }, */
                data: function (params) {
                    return {
                        search: params.term,
                        reference: reference
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },

            },
            cache: true
        }).on("select2:select", function (e) {
            var select_val = $(e.currentTarget).val();
            //var select_trigger = $(e.currentTarget).text();
            console.log(select_val);
        });
    }

    // ajaxSelect('#reinsurance_broker', 'apireinsurer', false, 'RI'); //resagurod o broker
    ajaxSelect('#cia_sure', 'apireinsurer', false, 'RI'); //resagurod o broker
    ajaxSelect('#assignor', 'apiuser', false);
    // ajaxSelect('#coverage', 'apibranch', false);
    // ajaxSelect('#cia_sure', 'apiinsurence', false); //seguro
    ajaxSelect('#reinsurance_broker', 'apiinsurence', false); //seguro


})


//end ajax for selects

/* select_sector privado/publico relacion a regimen */

function selectSector() {
    let select_sector = document.getElementById('select_sector')
    let select_regimen = document.getElementById('select_regimen')

    if (select_sector.value === 'Público') {
        select_regimen.removeAttribute("disabled")
        select_regimen.innerHTML =
            `
            <option value="" selected>Seleccionar</option>
            <option value="Régimen Especial">Régimen Especial</option>
            <option value="Proceso de Licitación">Proceso de Licitación</option>
            `
    } else {
        select_regimen.setAttribute("disabled", "disabled")
        select_regimen.innerHTML =
            `
            <option value="No aplica" selected>No Aplica</option>
            `
    }
}

/* end */

/* function for btn 'ver registros' / 'agregar registro' */
function recordsHandler() {
    $('#addBord').fadeToggle(300, "linear");
    $('#records').fadeToggle(300, "linear");

}

/* end */

/* function for modal: instalamentos */

const closeModal = document.getElementById('closeModalInstalamentos')
closeModal.addEventListener('click', () => {
    $('#modalInstalamentos').fadeToggle(300, "linear");
})


/** Para el select de cobertura */


function select_coverage() {
    const cobertura_select = document.getElementById('type_coverage');
    let options = cobertura_select.options[cobertura_select.selectedIndex].value;

    let select = document.getElementById('coverage');
    console.log(options);

    switch (options) {
        case 's1':
            select.innerHTML = `
                <option value="" disabled selected>Seleccionar</option>
                <option value="Vida individual">Vida individual</option>
                <option value="Vida colectiva">Vida colectiva</option>
                <option value="Accidentes personales individual">Accidentes personales individual</option>
                <option value="Accidentes personales colectiva">Accidentes personales colectiva</option>
            `;
            break;
        case 's2':
            select.innerHTML = `
                <option value="" disabled selected>Seleccionar</option>
                <option value="Incendio todo riesgo">Incendio todo riesgo</option>
                <option value="Lucro cesante por incendio y líneas aliadas">Lucro cesante por incendio y líneas aliadas</option>
                <option value="Robo">Robo</option>
                <option value="Sabotaje y terrorismo">Sabotaje y terrorismo</option>
            `;
            break;
        case 's3':
            select.innerHTML = `
                <option value="" disabled selected>Seleccionar</option>
                <option value="Vehículos livianos">Vehículos livianos</option>
                <option value="Vehículos pesados">Vehículos pesados</option>
            `
            break;
        case 's4':
            select.innerHTML = `
                <option value="" disabled selected>Seleccionar</option>
                <option value="Equipo electrónico">Equipo electrónico</option>
                <option value="Rotura de maquinaria">Rotura de maquinaria</option>
                <option value="Pérdida de beneficios por rotura de maquinaria">Pérdida de beneficios por rotura de maquinaria</option>
                <option value="Equipo y maquinaria de contratistas">Equipo y maquinaria de contratistas</option>
                <option value="Todo riesgo para contratistas">Todo riesgo para contratistas</option>
                <option value="Montaje de maquinaria">Montaje de maquinaria</option>
                <option value="ALOP">ALOP</option>
            `;
            break;
        case 's5':
            select.innerHTML = `
                <option value="" disabled selected>Seleccionar</option>
                <optgroup label="Todo riesgo petrolero">
                    <option value="Upstream">Upstream</option>
                    <option value="Downstream">Downstream</option>
                    <option value="Responsabilidad civil">Responsabilidad civil</option>
                </optgroup>
            `;
            break;
        case 's6':
            select.innerHTML = `
                <option value="" disabled selected>Seleccionar</option>
                <option value="Casco y maquinaria">Casco y maquinaria</option>
                <option value="Responsabilidad civil">Responsabilidad civil</option>
                <option value="Protection and indemnity P&I">Protection and indemnity P&I</option>
                <option value="RC Portuaria">RC Portuaria</option>
                <option value="RC Astilleros">RC Astilleros</option>
                <option value="RC Armadores">RC Armadores</option>
                <optgroup label="Transporte">
                    <option value="Interno">Interno</option>
                    <option value="Exportaciones">Exportaciones</option>
                    <option value="Importaciones">Importaciones</option>
                    <option value="Stock throughout STP">Stock throughout STP</option>
                    <option value="Transporte de dinero">Transporte de dinero</option>
                </optgroup>
            `;
            break;
        case 's7':
            select.innerHTML = `
                <option value="" disabled selected>Seleccionar</option>
                <option value="Casco aéreo">Casco aéreo</option>
                <option value="Responsabilidad civil">Responsabilidad civil</option>
                <option value="Pérdida de licencia">Pérdida de licencia</option>
                <option value="Responsabilidad civil aeroportuaria">Responsabilidad civil aeroportuaria</option>
                <option value="Responsabilidad civil hangares">Responsabilidad civil hangares</option>
                <option value="ARIEL">ARIEL</option>
            `;
            break;
        case 's8':
            select.innerHTML = `
                <option value="" disabled selected>Seleccionar</option>
                <option value="Extracontractual PLO">Extracontractual PLO</option>
                <option value="Contractual">Contractual</option>
                <option value="Errores y omisiones">Errores y omisiones</option>
                <option value="Responsabilidad civil médica">Responsabilidad civil médica</option>
                <option value="Responsabilidad civil profesional">Responsabilidad civil profesional</option>
                <option value="Directores y administradores">Directores y administradores</option>
            `;
            break;
        case 's9':
            select.innerHTML = `
                <option value="" disabled selected>Seleccionar</option>
                <option value="Bancos e instituciones financieras (BBB)">Bancos e instituciones financieras (BBB)</option>
                <option value="Fidelidad para instituciones financieras">Fidelidad para instituciones financieras</option>
            `;
            break;
        case 's10':
            select.innerHTML = `
                <option value="" disabled selected>Seleccionar</option>
                <option value="Fidelidad">Fidelidad</option>
                <option value="Serenidad de oferta">Serenidad de oferta</option>
                <option value="Cumplimiento de contrato">Cumplimiento de contrato</option>
                <option value="Buen uso de anticipo">Buen uso de anticipo</option>
                <option value="Ejecución de obra y buena calidad de materiales">Ejecución de obra y buena calidad de materiales</option>
                <option value="Garantías aduaneras">Garantías aduaneras</option>
                <option value="Otras garantías">Otras garantías</option>
            `;
            break;

        default:
            select.innerHTML = `
            <option selected disabled value=''>Selecciona tipo de cobertura</option>
            `;
            break;
    }
}

/* end */

/* open modal for edit borderoux */

function openModalEditBorderoux(id) {
    
    $('#modal_borderoux').fadeToggle(300)

    
}

/* end */