
////////////////////////////////        Fix aside layout        ////////////////////////////
const spans = document.querySelectorAll('ul[class="navList"] > li > div > span')

spans.forEach(item => {
    if (item.classList.contains('navList__subheading-title')) {
        item.style.visibility = "initial";
        item.style.maxHeight = "initial";
        item.style.color = "white";
        item.classList.remove('sublist-hidden')
    }
});

function checkPercentage(e) {
    if (e.target.value > 100) {
        e.target.value = 100;
    } else if (e.target.value < 0) {
        e.target.value = 0;
    }
}

///////////////////////////////////////////////////////////////////////////////////////////
/* formato numeros */

const numberFormatter = Intl.NumberFormat('en-US');


function select_coverage() {
    const cobertura_select = document.getElementById('type_coverage');
    let options = cobertura_select.options[cobertura_select.selectedIndex].value;

    let select = document.getElementById('coverage');
    // console.log(options);

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

/* formula prima neta */

function formulaPrimaNeta() {

    let primaNeta = document.getElementById('primaNeta')
    let gross_premium = document.getElementById('gross_premium')
    let tax_deductionsPercent = document.getElementById('tax_deductions')
    let stakePercent = document.getElementById('stake')

    let tax_deductions = parseFloat(gross_premium.value * parseFloat(tax_deductionsPercent.value / 100))


    let stake;
    if (stakePercent.value === '' || stakePercent.value === 0) {
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

/* formula comision total y comision porcentaje */

function formulaComisionTotal() {

    let primaNeta = document.getElementById('primaNeta')
    let comision_porcentaje = document.getElementById('comision_porcentaje')
    let comision_total = document.getElementById('comision_total')


    if (comision_porcentaje.value > 0) {

        let comision = parseFloat(comision_porcentaje.value / 100)
        let comision_final = parseFloat(comision * primaNeta.value).toFixed(2)

        comision_total.value = comision_final

    }


}

$(document).ready(function () {

    function selectAjax(selector, reinsurers) {
        $(selector).select2({
            language: 'es',
            tags: true,
            placeholder: 'Seleccionar',
            data: reinsurers.map(function (reinsurer) {
                return {
                    id: reinsurer,
                    text: reinsurer
                }
            }),
            cache: true
        });
        // Add new option with blank value and "Seleccionar" text
        $(selector).append('<option value="" selected>Seleccionar</option>');
    }

    selectAjax('#select_reinsurer', reinsurer_brokers);
});
