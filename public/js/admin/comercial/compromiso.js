const numberFormatter = Intl.NumberFormat('en-US');
//Para dar formato a cualquier numero, usar numberFormatter.format(numero_a_dar_formato);

var continue_button = document.getElementById('continue_button');
var new_compromiso = document.getElementById("new_compromiso");
var edit_compromiso = document.getElementById("edit_compromiso");
var compromiso_select = document.getElementById("compromiso_options");

var currentTab = 0; // Current tab is set to be the first tab (0)

var x = document.getElementsByClassName('tab'); // Definir tabs

function update() {
    var select = document.getElementById('slips');
    var value = select.options[select.selectedIndex].value;

    // Sub-forms
    showSubForm(value);
}

function showSubForm(value) {
    var s1 = document.getElementById("s1");
    var s2 = document.getElementById("s2");
    var s3 = document.getElementById("s3");
    var s4 = document.getElementById("s4");
    var s5 = document.getElementById("s5");
    var s6 = document.getElementById("s6");
    var s7 = document.getElementById("s7");
    var s8 = document.getElementById("s8");
    var s9 = document.getElementById("s9");
    var s10 = document.getElementById("s10");

    var vida_form = document.getElementById("vida_form"); //x
    var activos_fijos_form = document.getElementById("activos_fijos_form"); //x
    var vehiculoslp = document.getElementById("vehiculoslp"); //X
    var r_tecnicos = document.getElementById("r_tecnicos"); //X
    var energia = document.getElementById("energia_form"); //x
    var maritimo_1 = document.getElementById("maritimo_1_form");
    var maritimo_2 = document.getElementById("maritimo_2_form");
    var maritimo_3 = document.getElementById("maritimo_3_form");
    var maritimo_4 = document.getElementById("maritimo_4_form");
    var aviacion_1 = document.getElementById("aviacion_1_form");
    var aviacion_2 = document.getElementById("aviacion_2_form");
    var aviacion_3 = document.getElementById("aviacion_3_form");
    var responsabilidad = document.getElementById("responsabilidad_form");
    var riesgos = document.getElementById("riesgos_form");
    var finanzas_1 = document.getElementById("finanzas_1_form");
    var finanzas_2 = document.getElementById("finanzas_2_form");

    currentTab = 0;

    $.post(window.location.origin + '/api/branches?type_coverage=' + value);



    switch (value) {
        case "s1":
            s1.style.display = "block";
            s2.style.display = "none";
            s3.style.display = "none";
            s4.style.display = "none";
            s5.style.display = "none";
            s6.style.display = "none";
            s7.style.display = "none";
            s8.style.display = "none";
            s9.style.display = "none";
            s10.style.display = "none";
            // Forms
            vida_form.style.display = "none";
            activos_fijos_form.style.display = "none";
            vehiculoslp.style.display = "none";
            r_tecnicos.style.display = "none";
            energia.style.display = "none";
            maritimo_1.style.display = "none";
            maritimo_2.style.display = "none";
            maritimo_3.style.display = "none";
            maritimo_4.style.display = "none";
            aviacion_1.style.display = "none";
            aviacion_2.style.display = "none";
            aviacion_3.style.display = "none";
            responsabilidad.style.display = "none";
            riesgos.style.display = "none";
            finanzas_1.style.display = "none";
            finanzas_2.style.display = "none";
            break;
        case "s2":
            s1.style.display = "none";
            s2.style.display = "block";
            s3.style.display = "none";
            s4.style.display = "none";
            s5.style.display = "none";
            s6.style.display = "none";
            s7.style.display = "none";
            s8.style.display = "none";
            s9.style.display = "none";
            s10.style.display = "none";
            // Forms
            vida_form.style.display = "none";
            activos_fijos_form.style.display = "none";
            vehiculoslp.style.display = "none";
            r_tecnicos.style.display = "none";
            energia.style.display = "none";
            maritimo_1.style.display = "none";
            maritimo_2.style.display = "none";
            maritimo_3.style.display = "none";
            maritimo_4.style.display = "none";
            aviacion_1.style.display = "none";
            aviacion_2.style.display = "none";
            aviacion_3.style.display = "none";
            responsabilidad.style.display = "none";
            riesgos.style.display = "none";
            finanzas_1.style.display = "none";
            finanzas_2.style.display = "none";
            break;
        case "s3":
            s1.style.display = "none";
            s2.style.display = "none";
            s3.style.display = "block";
            s4.style.display = "none";
            s5.style.display = "none";
            s6.style.display = "none";
            s7.style.display = "none";
            s8.style.display = "none";
            s9.style.display = "none";
            s10.style.display = "none";
            // Forms
            vida_form.style.display = "none";
            activos_fijos_form.style.display = "none";
            vehiculoslp.style.display = "none";
            r_tecnicos.style.display = "none";
            energia.style.display = "none";
            maritimo_1.style.display = "none";
            maritimo_2.style.display = "none";
            maritimo_3.style.display = "none";
            maritimo_4.style.display = "none";
            aviacion_1.style.display = "none";
            aviacion_2.style.display = "none";
            aviacion_3.style.display = "none";
            responsabilidad.style.display = "none";
            riesgos.style.display = "none";
            finanzas_1.style.display = "none";
            finanzas_2.style.display = "none";
            break;
        case "s4":
            s1.style.display = "none";
            s2.style.display = "none";
            s3.style.display = "none";
            s4.style.display = "block";
            s5.style.display = "none";
            s6.style.display = "none";
            s7.style.display = "none";
            s8.style.display = "none";
            s9.style.display = "none";
            s10.style.display = "none";
            // Forms
            vida_form.style.display = "none";
            activos_fijos_form.style.display = "none";
            vehiculoslp.style.display = "none";
            r_tecnicos.style.display = "none";
            energia.style.display = "none";
            maritimo_1.style.display = "none";
            maritimo_2.style.display = "none";
            maritimo_3.style.display = "none";
            maritimo_4.style.display = "none";
            aviacion_1.style.display = "none";
            aviacion_2.style.display = "none";
            aviacion_3.style.display = "none";
            responsabilidad.style.display = "none";
            riesgos.style.display = "none";
            finanzas_1.style.display = "none";
            finanzas_2.style.display = "none";
            break;
        case "s5":
            s1.style.display = "none";
            s2.style.display = "none";
            s3.style.display = "none";
            s4.style.display = "none";
            s5.style.display = "block";
            s6.style.display = "none";
            s7.style.display = "none";
            s8.style.display = "none";
            s9.style.display = "none";
            s10.style.display = "none";
            // Forms
            vida_form.style.display = "none";
            activos_fijos_form.style.display = "none";
            vehiculoslp.style.display = "none";
            r_tecnicos.style.display = "none";
            energia.style.display = "none";
            maritimo_1.style.display = "none";
            maritimo_2.style.display = "none";
            maritimo_3.style.display = "none";
            maritimo_4.style.display = "none";
            aviacion_1.style.display = "none";
            aviacion_2.style.display = "none";
            aviacion_3.style.display = "none";
            responsabilidad.style.display = "none";
            riesgos.style.display = "none";
            finanzas_1.style.display = "none";
            finanzas_2.style.display = "none";
            break;
        case "s6":
            s1.style.display = "none";
            s2.style.display = "none";
            s3.style.display = "none";
            s4.style.display = "none";
            s5.style.display = "none";
            s6.style.display = "block";
            s7.style.display = "none";
            s8.style.display = "none";
            s9.style.display = "none";
            s10.style.display = "none";
            // Forms
            vida_form.style.display = "none";
            activos_fijos_form.style.display = "none";
            vehiculoslp.style.display = "none";
            r_tecnicos.style.display = "none";
            energia.style.display = "none";
            maritimo_1.style.display = "none";
            maritimo_2.style.display = "none";
            maritimo_3.style.display = "none";
            maritimo_4.style.display = "none";
            aviacion_1.style.display = "none";
            aviacion_2.style.display = "none";
            aviacion_3.style.display = "none";
            responsabilidad.style.display = "none";
            riesgos.style.display = "none";
            finanzas_1.style.display = "none";
            finanzas_2.style.display = "none";
            break;
        case "s7":
            s1.style.display = "none";
            s2.style.display = "none";
            s3.style.display = "none";
            s4.style.display = "none";
            s5.style.display = "none";
            s6.style.display = "none";
            s7.style.display = "block";
            s8.style.display = "none";
            s9.style.display = "none";
            s10.style.display = "none";
            // Forms
            vida_form.style.display = "none";
            activos_fijos_form.style.display = "none";
            vehiculoslp.style.display = "none";
            r_tecnicos.style.display = "none";
            energia.style.display = "none";
            maritimo_1.style.display = "none";
            maritimo_2.style.display = "none";
            maritimo_3.style.display = "none";
            maritimo_4.style.display = "none";
            aviacion_1.style.display = "none";
            aviacion_2.style.display = "none";
            aviacion_3.style.display = "none";
            responsabilidad.style.display = "none";
            riesgos.style.display = "none";
            finanzas_1.style.display = "none";
            finanzas_2.style.display = "none";
            break;
        case "s8":
            s1.style.display = "none";
            s2.style.display = "none";
            s3.style.display = "none";
            s4.style.display = "none";
            s5.style.display = "none";
            s6.style.display = "none";
            s7.style.display = "none";
            s8.style.display = "block";
            s9.style.display = "none";
            s10.style.display = "none";
            // Forms
            vida_form.style.display = "none";
            activos_fijos_form.style.display = "none";
            vehiculoslp.style.display = "none";
            r_tecnicos.style.display = "none";
            energia.style.display = "none";
            maritimo_1.style.display = "none";
            maritimo_2.style.display = "none";
            maritimo_3.style.display = "none";
            maritimo_4.style.display = "none";
            aviacion_1.style.display = "none";
            aviacion_2.style.display = "none";
            aviacion_3.style.display = "none";
            responsabilidad.style.display = "none";
            riesgos.style.display = "none";
            finanzas_1.style.display = "none";
            finanzas_2.style.display = "none";
            break;
        case "s9":
            s1.style.display = "none";
            s2.style.display = "none";
            s3.style.display = "none";
            s4.style.display = "none";
            s5.style.display = "none";
            s6.style.display = "none";
            s7.style.display = "none";
            s8.style.display = "none";
            s9.style.display = "block";
            s10.style.display = "none";
            // Forms
            vida_form.style.display = "none";
            activos_fijos_form.style.display = "none";
            vehiculoslp.style.display = "none";
            r_tecnicos.style.display = "none";
            energia.style.display = "none";
            maritimo_1.style.display = "none";
            maritimo_2.style.display = "none";
            maritimo_3.style.display = "none";
            maritimo_4.style.display = "none";
            aviacion_1.style.display = "none";
            aviacion_2.style.display = "none";
            aviacion_3.style.display = "none";
            responsabilidad.style.display = "none";
            riesgos.style.display = "none";
            finanzas_1.style.display = "none";
            finanzas_2.style.display = "none";
            break;
        case "s10":
            s1.style.display = "none";
            s2.style.display = "none";
            s3.style.display = "none";
            s4.style.display = "none";
            s5.style.display = "none";
            s6.style.display = "none";
            s7.style.display = "none";
            s8.style.display = "none";
            s9.style.display = "none";
            s10.style.display = "block";
            // Forms
            vida_form.style.display = "none";
            activos_fijos_form.style.display = "none";
            vehiculoslp.style.display = "none";
            r_tecnicos.style.display = "none";
            energia.style.display = "none";
            maritimo_1.style.display = "none";
            maritimo_2.style.display = "none";
            maritimo_3.style.display = "none";
            maritimo_4.style.display = "none";
            aviacion_1.style.display = "none";
            aviacion_2.style.display = "none";
            aviacion_3.style.display = "none";
            responsabilidad.style.display = "none";
            riesgos.style.display = "none";
            finanzas_1.style.display = "none";
            finanzas_2.style.display = "none";
            break;
        default:
            s1.style.display = "none";
            s2.style.display = "none";
            s3.style.display = "none";
            s4.style.display = "none";
            s5.style.display = "none";
            s6.style.display = "none";
            s7.style.display = "none";
            s8.style.display = "none";
            s9.style.display = "none";
            s10.style.display = "none";
            // Forms
            vida_form.style.display = "none";
            activos_fijos_form.style.display = "none";
            vehiculoslp.style.display = "none";
            r_tecnicos.style.display = "none";
            energia.style.display = "none";
            maritimo_1.style.display = "none";
            maritimo_2.style.display = "none";
            maritimo_3.style.display = "none";
            maritimo_4.style.display = "none";
            aviacion_1.style.display = "none";
            aviacion_2.style.display = "none";
            aviacion_3.style.display = "none";
            responsabilidad.style.display = "none";
            riesgos.style.display = "none";
            finanzas_1.style.display = "none";
            finanzas_2.style.display = "none";
            break;
    }
}

var nextBtn = document.querySelector('#nextBtn');
var prevBtn = document.querySelector('#prevBtn');
var submitBtn = document.querySelector('#submitBtn');

var currentForm = undefined; //Para poner el form para el submit

coberturasSelect(".selectCobertura", "tecnico", "construccion");

//divs para poner display en none o block
let valorAseguradoContainer = document.querySelectorAll('.valorAseguradoContainer')

function updateS1() {
    let vida_form = document.querySelector("#vida_form");

    currentForm = "#vida_form"

    nextBtn = vida_form.getElementsByTagName('button').nextBtn;
    prevBtn = vida_form.getElementsByTagName('button').prevBtn;
    submitBtn = vida_form.getElementsByTagName('button').submitBtn;

    x = vida_form.getElementsByClassName("tab");
    showTab(currentTab); // Display the crurrent tab

    let select = document.querySelector('#cobertura_vida');
    let value = select.options[select.selectedIndex].value;

    const element = document.createElement('input');

    element.setAttribute('type', 'text');
    element.setAttribute('name', 'type_coverage');
    element.setAttribute('id', 'type_coverage');
    element.setAttribute('hidden', 'true');

    switch (value) {
        case "vi":
            currentTab = 0;
            vida_form.style.display = "block";
            document.getElementById('objeto_asegurado').style.display = "none";
            document.getElementById('persona_asegurada').style.display = "block";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'block';
            });
            document.getElementById('btnAddPersonaAsegurada').style.display = "none";
            element.setAttribute('value', '1');
            vida_form.appendChild(element);
            break;
        case "vc":
            currentTab = 0;
            vida_form.style.display = "block";
            document.getElementById('persona_asegurada').style.display = "none";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'none';
            })
            document.getElementById('objeto_asegurado').style.display = "block";
            document.getElementById('btnAddPersonaAsegurada').style.display = "block";
            document.getElementById('cumuloAsegurable').style.display = "block";
            element.setAttribute('value', '2');
            vida_form.appendChild(element);
            break;
        case "api":
            currentTab = 0;
            vida_form.style.display = "block";
            document.getElementById('btnAddPersonaAsegurada').style.display = "none";
            document.getElementById('cumuloAsegurable').style.display = "none";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'block';
            });
            element.setAttribute('value', '3');
            vida_form.appendChild(element);
            break;
        case "apc":
            currentTab = 0;
            vida_form.style.display = "block";
            document.getElementById('btnAddPersonaAsegurada').style.display = "block";
            document.getElementById('cumuloAsegurable').style.display = "block";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'none';
            })
            element.setAttribute('value', '4');
            vida_form.appendChild(element);
            break;
        default:
            currentTab = 0;
            vida_form.style.display = "none";
            element.setAttribute('value', '0');
            vida_form.appendChild(element);
            break;
    }
    $(document).ready(function () {
        clausulasSelect(".selectClausula", "vida", "vida");
        coberturasSelect(".selectCobertura", "vida", "vida");
    });
}

function updateS2() {
    let activos_fijos_form = document.querySelector("#activos_fijos_form");

    currentForm = "#activos_fijos_form"
    nextBtn = activos_fijos_form.getElementsByTagName('button').nextBtn;
    prevBtn = activos_fijos_form.getElementsByTagName('button').prevBtn;
    submitBtn = activos_fijos_form.getElementsByTagName('button').submitBtn;

    x = activos_fijos_form.getElementsByClassName("tab");

    showTab(currentTab); // Display the crurrent tab

    let select = document.querySelector('#cobertura_activos');
    let value = select.options[select.selectedIndex].value;

    // Mandar type_coverage en cada switch
    const element = document.createElement('input');

    element.setAttribute('type', 'text');
    element.setAttribute('name', 'type_coverage');
    element.setAttribute('id', 'type_coverage');
    element.setAttribute('hidden', 'true');

    switch (value) {
        case "ila":
            clausulasSelect(".selectClausula", 'activos', 'incendio');
            coberturasSelect(".selectCobertura", 'activos', 'incendio');
            currentTab = 0;
            activos_fijos_form.style.display = "block";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'none';
            })
            element.setAttribute('value', '5');
            activos_fijos_form.appendChild(element);
            break;
        case "lcla":
            clausulasSelect(".selectClausula", 'activos', 'lucro');
            coberturasSelect(".selectCobertura", 'activos', 'lucro');
            currentTab = 0;
            activos_fijos_form.style.display = "block";
            document.getElementById('formularioCotizacionLucro').style.display = "block";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'none';
            })
            console.log('sirve');
            element.setAttribute('value', '6');
            activos_fijos_form.appendChild(element);
            break;
        case "robo":
            coberturasSelect(".selectCobertura", 'activos', 'robo');
            clausulasSelect(".selectClausula", 'activos', 'robo');
            currentTab = 0;
            activos_fijos_form.style.display = "block";
            document.getElementById('primerRiesgo').style.display = "block";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'none';
            })
            element.setAttribute('value', '7');
            activos_fijos_form.appendChild(element);
            break;
        case "st":
            clausulasSelect(".selectClausula", 'activos', 'st');
            coberturasSelect(".selectCobertura", 'activos', 'st');
            currentTab = 0;
            activos_fijos_form.style.display = "block";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'none';
            })
            element.setAttribute('value', '8');
            activos_fijos_form.appendChild(element);
            break;
        default:
            currentTab = 0;
            activos_fijos_form.style.display = "none";
            element.setAttribute('value', '5');
            activos_fijos_form.appendChild(element);
            break;
    }
}

function updateS3() {
    let vehiculoslp = document.querySelector("#vehiculoslp");
    currentForm = "#vehiculoslp"

    nextBtn = vehiculoslp.getElementsByTagName('button').nextBtn;
    prevBtn = vehiculoslp.getElementsByTagName('button').prevBtn;
    submitBtn = vehiculoslp.getElementsByTagName('button').submitBtn;

    x = vehiculoslp.getElementsByClassName("tab");

    showTab(currentTab); // Display the crurrent tab
    let select = document.querySelector('#cobertura_vehiculos');
    let value = select.options[select.selectedIndex].value;

    // Mandar type_coverage en cada switch
    const element = document.createElement('input');

    element.setAttribute('type', 'text');
    element.setAttribute('name', 'type_coverage');
    element.setAttribute('id', 'type_coverage');
    element.setAttribute('hidden', 'true');

    // element.setAttribute('value', 'ap');
    // activos_fijos_form.appendChild(element);

    switch (value) {
        case "vl":
            coberturasSelect(".selectCobertura", 'tecnico', 'vehiculos');
            clausulasSelect(".selectClausula", 'tecnico', 'vehiculos');
            currentTab = 0;
            vehiculoslp.style.display = "block";
            element.setAttribute('value', '9');
            vehiculoslp.appendChild(element);
            break;
        case "vp":
            coberturasSelect(".selectCobertura", 'tecnico', 'vehiculos');
            clausulasSelect(".selectClausula", 'tecnico', 'vehiculos');
            currentTab = 0;
            vehiculoslp.style.display = "block";
            element.setAttribute('value', '10');
            vehiculoslp.appendChild(element);
            break;
        default:
            currentTab = 0;
            vehiculoslp.style.display = "none";
            element.setAttribute('value', '9');
            vehiculoslp.appendChild(element);
            break;
    }
    clausulasSelect(".selectClausula", "tecnico", "vehiculos");
    coberturasSelect(".selectCobertura", "tecnico", "vehiculos");

    //if livianos enviar a tabla livianos else tabla pesados
}
//end david

function updateS4() {
    let r_tecnicos = document.querySelector("#r_tecnicos");
    currentForm = "#r_tecnicos"

    nextBtn = r_tecnicos.getElementsByTagName('button').nextBtn;
    prevBtn = r_tecnicos.getElementsByTagName('button').prevBtn;
    submitBtn = r_tecnicos.getElementsByTagName('button').submitBtn;

    x = r_tecnicos.getElementsByClassName("tab");
    showTab(currentTab); // Display the crurrent tab

    let select = document.querySelector('#cobertura_tecnicos');
    let value = select.options[select.selectedIndex].value;

    // Mandar type_coverage en cada switch
    const element = document.createElement('input');

    element.setAttribute('type', 'text');
    element.setAttribute('name', 'type_coverage');
    element.setAttribute('id', 'type_coverage');
    element.setAttribute('hidden', 'true');

    let formularioElectronico = document.querySelector('#showElectronico');
    value === "ee" ? formularioElectronico.style.display = "initial" : formularioElectronico.style.display = "none"

    switch (value) {
        case "ee":
            document.getElementById('btnCoberturasEE').style.display = "block";
            document.getElementById('btnClausulasEE').style.display = "block";
            document.getElementById('btnCoberturasRM').style.display = "none";
            document.getElementById('btnCoberturasPBRM').style.display = "none";
            document.getElementById('btnCoberturasEMC').style.display = "none";
            document.getElementById('btnCoberturasTRC').style.display = "none";
            document.getElementById('btnCoberturasMM').style.display = "none";
            document.getElementById('btnCoberturasALOP').style.display = "none";
            document.getElementById('btnClausulasRM').style.display = "none";
            document.getElementById('btnClausulasPBRM').style.display = "none";
            document.getElementById('btnClausulasEMC').style.display = "none";
            document.getElementById('btnClausulasTRC').style.display = "none";
            document.getElementById('btnClausulasMM').style.display = "none";
            document.getElementById('btnClausulasALOP').style.display = "none";
            -
            element.setAttribute('value', '11');
            r_tecnicos.appendChild(element);
            currentTab = 0;
            r_tecnicos.style.display = "block";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'none';
            });

            console.log('valorAseguradoContainerObject');

            let sectionIII = document.querySelector('[name="incremento_costos"]')
            let a = document.querySelector('[name="limite_diario"]');
            let b = document.querySelector('[name="periodo_cobertura"]');

            a.addEventListener('input', updateSectionIII);
            b.addEventListener('input', updateSectionIII);

            let previousResult = undefined;
            function updateSectionIII() {
                let calc = parseFloat(a.value) * parseFloat(b.value);
                let result = calc

                if (isNaN(result)) {
                    result = previousResult
                } else {
                    result = calc
                    previousResult = calc
                }

                sectionIII.value = result;
            }

            clausulasSelect(".selectClausula", "tecnico", "electronico");
            coberturasSelect(".selectCobertura", "tecnico", "electronico");
            break;
        case "rm":
            document.getElementById('btnCoberturasRM').style.display = "block";
            document.getElementById('btnClausulasRM').style.display = "block";
            document.getElementById('btnCoberturasEE').style.display = "none";
            document.getElementById('btnCoberturasPBRM').style.display = "none";
            document.getElementById('btnCoberturasEMC').style.display = "none";
            document.getElementById('btnCoberturasTRC').style.display = "none";
            document.getElementById('btnCoberturasMM').style.display = "none";
            document.getElementById('btnCoberturasALOP').style.display = "none";
            document.getElementById('btnClausulasEE').style.display = "none";
            document.getElementById('btnClausulasPBRM').style.display = "none";
            document.getElementById('btnClausulasEMC').style.display = "none";
            document.getElementById('btnClausulasTRC').style.display = "none";
            document.getElementById('btnClausulasMM').style.display = "none";
            document.getElementById('btnClausulasALOP').style.display = "none";
            element.setAttribute('value', '12');
            r_tecnicos.appendChild(element);
            currentTab = 0;
            r_tecnicos.style.display = "block";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'block';
            })
            clausulasSelect(".selectClausula", "tecnico", "rotura_maquinaria");
            coberturasSelect(".selectCobertura", "tecnico", "rotura_maquinaria");
            break;
        case "pbrm":
            document.getElementById('btnCoberturasPBRM').style.display = "block";
            document.getElementById('btnClausulasPBRM').style.display = "block";
            document.getElementById('btnCoberturasRM').style.display = "none";
            document.getElementById('btnCoberturasEE').style.display = "none";
            document.getElementById('btnCoberturasEMC').style.display = "none";
            document.getElementById('btnCoberturasTRC').style.display = "none";
            document.getElementById('btnCoberturasMM').style.display = "none";
            document.getElementById('btnCoberturasALOP').style.display = "none";
            document.getElementById('btnClausulasRM').style.display = "none";
            document.getElementById('btnClausulasEE').style.display = "none";
            document.getElementById('btnClausulasEMC').style.display = "none";
            document.getElementById('btnClausulasTRC').style.display = "none";
            document.getElementById('btnClausulasMM').style.display = "none";
            document.getElementById('btnClausulasALOP').style.display = "none";
            element.setAttribute('value', '13');
            r_tecnicos.appendChild(element);
            currentTab = 0;
            r_tecnicos.style.display = "block";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'block';
            })
            clausulasSelect(".selectClausula", "tecnico", "beneficios");
            coberturasSelect(".selectCobertura", "tecnico", "beneficios");
            break;
        case "emc":
            document.getElementById('btnCoberturasEMC').style.display = "block";
            document.getElementById('btnClausulasEMC').style.display = "block";
            document.getElementById('btnCoberturasRM').style.display = "none";
            document.getElementById('btnCoberturasPBRM').style.display = "none";
            document.getElementById('btnCoberturasEE').style.display = "none";
            document.getElementById('btnCoberturasTRC').style.display = "none";
            document.getElementById('btnCoberturasMM').style.display = "none";
            document.getElementById('btnCoberturasALOP').style.display = "none";
            document.getElementById('btnClausulasRM').style.display = "none";
            document.getElementById('btnClausulasPBRM').style.display = "none";
            document.getElementById('btnClausulasEE').style.display = "none";
            document.getElementById('btnClausulasTRC').style.display = "none";
            document.getElementById('btnClausulasMM').style.display = "none";
            document.getElementById('btnClausulasALOP').style.display = "none";
            element.setAttribute('value', '14');
            r_tecnicos.appendChild(element);
            currentTab = 0;
            r_tecnicos.style.display = "block";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'block';
            })
            clausulasSelect(".selectClausula", "tecnico", "equipo_maquinaria");
            coberturasSelect(".selectCobertura", "tecnico", "equipo_maquinaria");
            break;
        case "trc":
            document.getElementById('btnCoberturasTRC').style.display = "block";
            document.getElementById('btnClausulasTRC').style.display = "block";
            document.getElementById('btnCoberturasRM').style.display = "none";
            document.getElementById('btnCoberturasPBRM').style.display = "none";
            document.getElementById('btnCoberturasEMC').style.display = "none";
            document.getElementById('btnCoberturasEE').style.display = "none";
            document.getElementById('btnCoberturasMM').style.display = "none";
            document.getElementById('btnCoberturasALOP').style.display = "none";
            document.getElementById('btnClausulasRM').style.display = "none";
            document.getElementById('btnClausulasPBRM').style.display = "none";
            document.getElementById('btnClausulasEMC').style.display = "none";
            document.getElementById('btnClausulasEE').style.display = "none";
            document.getElementById('btnClausulasMM').style.display = "none";
            document.getElementById('btnClausulasALOP').style.display = "none";
            element.setAttribute('value', '15');
            r_tecnicos.appendChild(element);
            currentTab = 0;
            r_tecnicos.style.display = "block";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'block';
            })
            clausulasSelect(".selectClausula", "tecnico", "construccion");
            coberturasSelect(".selectCobertura", "tecnico", "construccion");
            break;
        case "mm":
            document.getElementById('btnCoberturasMM').style.display = "block";
            document.getElementById('btnClausulasMM').style.display = "block";
            document.getElementById('btnCoberturasRM').style.display = "none";
            document.getElementById('btnCoberturasPBRM').style.display = "none";
            document.getElementById('btnCoberturasEMC').style.display = "none";
            document.getElementById('btnCoberturasTRC').style.display = "none";
            document.getElementById('btnCoberturasEE').style.display = "none";
            document.getElementById('btnCoberturasALOP').style.display = "none";
            document.getElementById('btnClausulasRM').style.display = "none";
            document.getElementById('btnClausulasPBRM').style.display = "none";
            document.getElementById('btnClausulasEMC').style.display = "none";
            document.getElementById('btnClausulasTRC').style.display = "none";
            document.getElementById('btnClausulasEE').style.display = "none";
            document.getElementById('btnClausulasALOP').style.display = "none";
            element.setAttribute('value', '16');
            r_tecnicos.appendChild(element);
            currentTab = 0;
            r_tecnicos.style.display = "block";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'block';
            })
            clausulasSelect(".selectClausula", "tecnico", "construccion");
            coberturasSelect(".selectCobertura", "tecnico", "montaje");
            break;
        case "alop":
            document.getElementById('btnCoberturasALOP').style.display = "block";
            document.getElementById('btnClausulasEE').style.display = "block";
            document.getElementById('btnCoberturasRM').style.display = "none";
            document.getElementById('btnCoberturasPBRM').style.display = "none";
            document.getElementById('btnCoberturasEMC').style.display = "none";
            document.getElementById('btnCoberturasTRC').style.display = "none";
            document.getElementById('btnCoberturasMM').style.display = "none";
            document.getElementById('btnCoberturasEE').style.display = "none";
            document.getElementById('btnClausulasRM').style.display = "none";
            document.getElementById('btnClausulasPBRM').style.display = "none";
            document.getElementById('btnClausulasEMC').style.display = "none";
            document.getElementById('btnClausulasTRC').style.display = "none";
            document.getElementById('btnClausulasMM').style.display = "none";
            document.getElementById('btnClausulasEE').style.display = "none";
            element.setAttribute('value', '17');
            r_tecnicos.appendChild(element);
            currentTab = 0;
            r_tecnicos.style.display = "block";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'block';
            })
            clausulasSelect(".selectClausula", "tecnico", "alop");
            coberturasSelect(".selectCobertura", "tecnico", "alop");
            break;
        default:
            element.setAttribute('value', '11');
            r_tecnicos.appendChild(element);
            currentTab = 0;
            r_tecnicos.style.display = "none";
            break;
    }
    //enddavid
}

function updateS5() {
    let energia = document.querySelector("#energia_form");
    currentForm = "#energia_form"


    nextBtn = energia.getElementsByTagName('button').nextBtn;
    prevBtn = energia.getElementsByTagName('button').prevBtn;
    submitBtn = energia.getElementsByTagName('button').submitBtn;

    x = energia.getElementsByClassName("tab");
    showTab(currentTab); // Display the crurrent tab

    let select = document.querySelector('#cobertura_energia');
    let value = select.options[select.selectedIndex].value;

    // Mandar type_coverage en cada switch
    const element = document.createElement('input');

    element.setAttribute('type', 'text');
    element.setAttribute('name', 'type_coverage');
    element.setAttribute('id', 'type_coverage');
    element.setAttribute('hidden', 'true');

    //david
    switch (value) {
        case "us":
            currentTab = 0;
            energia.style.display = "block";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'none';
            })
            element.setAttribute('value', '18');
            energia.appendChild(element);
            clausulasSelect(".selectClausula", "energia", "us");
            coberturasSelect(".selectCobertura", "energia", "us");
            break;
        case "ds":
            currentTab = 0;
            energia.style.display = "block";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'none';
            })
            element.setAttribute('value', '19');
            energia.appendChild(element);
            clausulasSelect(".selectClausula", "energia", "ds");
            coberturasSelect(".selectCobertura", "energia", "ds");
            break;
        case "rc":
            currentTab = 0;
            energia.style.display = "block";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'none';
            })
            element.setAttribute('value', '20');
            energia.appendChild(element);
            clausulasSelect(".selectClausula", "energia", "rc");
            coberturasSelect(".selectCobertura", "energia", "rc");
            break;
        default:
            currentTab = 0;
            energia.style.display = "none";
            element.setAttribute('value', '18');
            energia.appendChild(element);
            break;
    }
    //end david
    $(document).ready(function () {
        clausulasSelect(".selectClausula", "energia", "trp");
        coberturasSelect(".selectCobertura", "energia", "trp");
    });
}

function updateS6() {
    let maritimo = document.querySelector("#maritimo_1_form");
    let maritimo2 = document.querySelector("#maritimo_2_form");
    let maritimo3 = document.querySelector("#maritimo_3_form");
    let maritimo4 = document.querySelector("#maritimo_4_form");

    let select = document.querySelector('#cobertura_maritimo');
    let value = select.options[select.selectedIndex].value;

    const element = document.createElement('input');

    element.setAttribute('type', 'text');
    element.setAttribute('name', 'type_coverage');
    element.setAttribute('id', 'type_coverage');
    element.setAttribute('hidden', 'true');

    switch (value) {
        case "cm":
            clausulasSelect(".selectClausula", "maritimo", "casco_maquinaria");
            coberturasSelect(".selectCobertura", "maritimo", "casco_maquinaria");
            currentTab = 0;
            currentForm = "#maritimo_1_form"
            x = maritimo_1_form.getElementsByClassName("tab");
            nextBtn = maritimo.getElementsByTagName('button').nextBtn;
            prevBtn = maritimo.getElementsByTagName('button').prevBtn;
            submitBtn = maritimo.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            maritimo.style.display = "block";
            maritimo2.style.display = "none";
            maritimo3.style.display = "none";
            maritimo4.style.display = "none";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'none';
            })
            console.log('sirve');
            element.setAttribute('value', '21');
            maritimo.appendChild(element);
            break;
        case "mrc":
            clausulasSelect(".selectClausula", "maritimo", "mrc");
            coberturasSelect(".selectCobertura", "maritimo", "mrc");
            currentTab = 0;
            currentForm = "#maritimo_1_form"
            x = maritimo_1_form.getElementsByClassName("tab");
            nextBtn = maritimo.getElementsByTagName('button').nextBtn;
            prevBtn = maritimo.getElementsByTagName('button').prevBtn;
            submitBtn = maritimo.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            maritimo.style.display = "block";
            maritimo2.style.display = "none";
            maritimo3.style.display = "none";
            maritimo4.style.display = "none";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'none';
            })
            console.log('sirve');
            element.setAttribute('value', '22');
            maritimo.appendChild(element);
            break;
        case "pi":
            clausulasSelect(".selectClausula", "maritimo", "pi");
            coberturasSelect(".selectCobertura", "maritimo", "pi");
            currentTab = 0;
            currentForm = '#maritimo_2_form'
            x = maritimo_2_form.getElementsByClassName("tab");
            nextBtn = maritimo2.getElementsByTagName('button').nextBtn;
            prevBtn = maritimo2.getElementsByTagName('button').prevBtn;
            submitBtn = maritimo2.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            maritimo.style.display = "none";
            maritimo2.style.display = "block";
            maritimo3.style.display = "none";
            maritimo4.style.display = "none";
            element.setAttribute('value', '23');
            maritimo2.appendChild(element);
            break;
        case "rcp":
            clausulasSelect(".selectClausula", "maritimo", "rcp");
            coberturasSelect(".selectCobertura", "maritimo", "rcp");
            currentTab = 0;
            currentForm = '#maritimo_3_form'
            x = maritimo_3_form.getElementsByClassName("tab");
            nextBtn = maritimo3.getElementsByTagName('button').nextBtn;
            prevBtn = maritimo3.getElementsByTagName('button').prevBtn;
            submitBtn = maritimo3.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            maritimo.style.display = "none";
            maritimo2.style.display = "none";
            maritimo3.style.display = "block";
            maritimo4.style.display = "none";
            element.setAttribute('value', '24');
            maritimo3.appendChild(element);
            break;
        case "rcas":
            clausulasSelect(".selectClausula", "maritimo", "rcas");
            coberturasSelect(".selectCobertura", "maritimo", "rcas");
            currentTab = 0;
            currentForm = '#maritimo_3_form'
            x = maritimo_3_form.getElementsByClassName("tab");
            nextBtn = maritimo3.getElementsByTagName('button').nextBtn;
            prevBtn = maritimo3.getElementsByTagName('button').prevBtn;
            submitBtn = maritimo3.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            maritimo.style.display = "none";
            maritimo2.style.display = "none";
            maritimo3.style.display = "block";
            maritimo4.style.display = "none";
            element.setAttribute('value', '25');
            maritimo3.appendChild(element);
            break;
        case "rcar":
            clausulasSelect(".selectClausula", "maritimo", "rcar");
            coberturasSelect(".selectCobertura", "maritimo", "rcar");
            currentTab = 0;
            currentForm = '#maritimo_3_form'
            x = maritimo_3_form.getElementsByClassName("tab");
            nextBtn = maritimo3.getElementsByTagName('button').nextBtn;
            prevBtn = maritimo3.getElementsByTagName('button').prevBtn;
            submitBtn = maritimo3.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            maritimo.style.display = "none";
            maritimo2.style.display = "none";
            maritimo3.style.display = "block";
            maritimo4.style.display = "none";
            element.setAttribute('value', '26');
            maritimo3.appendChild(element);
            break;
        case "tin":
            currentTab = 0;
            currentForm = '#maritimo_4_form'
            x = maritimo_4_form.getElementsByClassName("tab");
            nextBtn = maritimo4.getElementsByTagName('button').nextBtn;
            prevBtn = maritimo4.getElementsByTagName('button').prevBtn;
            submitBtn = maritimo4.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            maritimo.style.display = "none";
            maritimo2.style.display = "none";
            maritimo3.style.display = "none";
            maritimo4.style.display = "block";
            element.setAttribute('value', '27');
            maritimo4.appendChild(element);
            clausulasSelect(".selectClausula", "tecnico", "tin");
            coberturasSelect(".selectCobertura", "tecnico", "tin");
            break;
        case "ex":
            currentTab = 0;
            currentForm = '#maritimo_4_form'
            x = maritimo_4_form.getElementsByClassName("tab");
            nextBtn = maritimo4.getElementsByTagName('button').nextBtn;
            prevBtn = maritimo4.getElementsByTagName('button').prevBtn;
            submitBtn = maritimo4.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            maritimo.style.display = "none";
            maritimo2.style.display = "none";
            maritimo3.style.display = "none";
            maritimo4.style.display = "block";
            element.setAttribute('value', '28');
            maritimo4.appendChild(element);
            clausulasSelect(".selectClausula", "tecnico", "ex");
            coberturasSelect(".selectCobertura", "tecnico", "ex");
            break;
        case "im":
            currentTab = 0;
            currentForm = '#maritimo_4_form'
            x = maritimo_4_form.getElementsByClassName("tab");
            nextBtn = maritimo4.getElementsByTagName('button').nextBtn;
            prevBtn = maritimo4.getElementsByTagName('button').prevBtn;
            submitBtn = maritimo4.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            maritimo.style.display = "none";
            maritimo2.style.display = "none";
            maritimo3.style.display = "none";
            maritimo4.style.display = "block";
            document.getElementById('coberturaContainer').style.display = "none";
            element.setAttribute('value', '29');
            maritimo4.appendChild(element);
            clausulasSelect(".selectClausula", "tecnico", "im");
            coberturasSelect(".selectCobertura", "tecnico", "im");
            break;
        case "stp":
            currentTab = 0;
            currentForm = '#maritimo_4_form'
            x = maritimo_4_form.getElementsByClassName("tab");
            nextBtn = maritimo4.getElementsByTagName('button').nextBtn;
            prevBtn = maritimo4.getElementsByTagName('button').prevBtn;
            submitBtn = maritimo4.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            maritimo.style.display = "none";
            maritimo2.style.display = "none";
            maritimo3.style.display = "none";
            maritimo4.style.display = "block";
            element.setAttribute('value', '30');
            maritimo4.appendChild(element);
            clausulasSelect(".selectClausula", "tecnico", "stp");
            coberturasSelect(".selectCobertura", "tecnico", "stp");
            break;
        case "td":
            currentTab = 0;
            currentForm = '#maritimo_4_form'
            x = maritimo_4_form.getElementsByClassName("tab");
            nextBtn = maritimo4.getElementsByTagName('button').nextBtn;
            prevBtn = maritimo4.getElementsByTagName('button').prevBtn;
            submitBtn = maritimo4.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            maritimo.style.display = "none";
            maritimo2.style.display = "none";
            maritimo3.style.display = "none";
            maritimo4.style.display = "block";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'none';
            })
            element.setAttribute('value', '31');
            maritimo4.appendChild(element);
            clausulasSelect(".selectClausula", "tecnico", "td");
            coberturasSelect(".selectCobertura", "tecnico", "td");
            break;
        default:
            currentTab = 0;
            maritimo.style.display = "none";
            maritimo2.style.display = "none";
            maritimo3.style.display = "none";
            maritimo4.style.display = "none";
            element.setAttribute('value', '21');
            maritimo.appendChild(element);
            maritimo2.appendChild(element);
            maritimo3.appendChild(element);
            maritimo4.appendChild(element);
            break;
    }
}

function updateS7() {
    let aviacion_1_form = document.querySelector("#aviacion_1_form");
    let aviacion_2_form = document.querySelector("#aviacion_2_form");
    let aviacion_3_form = document.querySelector("#aviacion_3_form");

    let select = document.querySelector('#cobertura_aviacion');
    let value = select.options[select.selectedIndex].value;

    const element = document.createElement('input');

    element.setAttribute('type', 'text');
    element.setAttribute('name', 'type_coverage');
    element.setAttribute('id', 'type_coverage');
    element.setAttribute('hidden', 'true');


    switch (value) {
        case "ca":
            currentTab = 0;
            currentForm = '#aviacion_1_form'
            x = aviacion_1_form.getElementsByClassName("tab");
            nextBtn = aviacion_1_form.getElementsByTagName('button').nextBtn;
            prevBtn = aviacion_1_form.getElementsByTagName('button').prevBtn;
            submitBtn = aviacion_1_form.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            aviacion_1_form.style.display = "block";
            aviacion_2_form.style.display = "none";
            aviacion_3_form.style.display = "none";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'none';
            })
            element.setAttribute('value', '32');
            aviacion_1_form.appendChild(element);
            clausulasSelect(".selectClausula", "aviacion", "casco");
            coberturasSelect(".selectCobertura", "aviacion", "casco");
            break;
        case "rc":
            currentTab = 0;
            currentForm = '#aviacion_1_form'
            x = aviacion_1_form.getElementsByClassName("tab");
            nextBtn = aviacion_1_form.getElementsByTagName('button').nextBtn;
            prevBtn = aviacion_1_form.getElementsByTagName('button').prevBtn;
            submitBtn = aviacion_1_form.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            aviacion_1_form.style.display = "block";
            aviacion_2_form.style.display = "none";
            aviacion_3_form.style.display = "none";
            valorAseguradoContainer.forEach(elemento => {
                elemento.style.display = 'none';
            })
            element.setAttribute('value', '33');
            aviacion_1_form.appendChild(element);
            clausulasSelect(".selectClausula", "aviacion", "rc");
            coberturasSelect(".selectCobertura", "aviacion", "rc");
            break;
        case "pl":
            currentTab = 0;
            currentForm = '#aviacion_2_form'
            x = aviacion_2_form.getElementsByClassName("tab");
            nextBtn = aviacion_2_form.getElementsByTagName('button').nextBtn;
            prevBtn = aviacion_2_form.getElementsByTagName('button').prevBtn;
            submitBtn = aviacion_2_form.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            aviacion_1_form.style.display = "none";
            aviacion_2_form.style.display = "block";
            aviacion_3_form.style.display = "none";
            element.setAttribute('value', '34');
            aviacion_2_form.appendChild(element);
            clausulasSelect(".selectClausula", "aviacion", "pl");
            coberturasSelect(".selectCobertura", "aviacion", "pl");
            break;
        case "rca":
            console.error('ACTIVO');
            currentTab = 0;
            currentForm = '#aviacion_3_form'
            x = aviacion_3_form.getElementsByClassName("tab");
            nextBtn = aviacion_3_form.getElementsByTagName('button').nextBtn;
            prevBtn = aviacion_3_form.getElementsByTagName('button').prevBtn;
            submitBtn = aviacion_3_form.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            aviacion_1_form.style.display = "none";
            aviacion_2_form.style.display = "none";
            aviacion_3_form.style.display = "block";
            element.setAttribute('value', '35');
            aviacion_3_form.appendChild(element);
            clausulasSelect(".selectClausula", "maritimo", "rca");
            coberturasSelect(".selectCobertura", "maritimo", "rca");
            break;
        case "rch":
            currentTab = 0;
            currentForm = '#aviacion_3_form'
            x = aviacion_3_form.getElementsByClassName("tab");
            nextBtn = aviacion_3_form.getElementsByTagName('button').nextBtn;
            prevBtn = aviacion_3_form.getElementsByTagName('button').prevBtn;
            submitBtn = aviacion_3_form.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            aviacion_1_form.style.display = "none";
            aviacion_2_form.style.display = "none";
            aviacion_3_form.style.display = "block";
            element.setAttribute('value', '36');
            aviacion_3_form.appendChild(element);
            clausulasSelect(".selectClausula", "maritimo", "rch");
            coberturasSelect(".selectCobertura", "maritimo", "rch");
            break;
        case "ariel":
            currentTab = 0;
            currentForm = '#aviacion_3_form'
            x = aviacion_3_form.getElementsByClassName("tab");
            nextBtn = aviacion_3_form.getElementsByTagName('button').nextBtn;
            prevBtn = aviacion_3_form.getElementsByTagName('button').prevBtn;
            submitBtn = aviacion_3_form.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            aviacion_1_form.style.display = "none";
            aviacion_2_form.style.display = "none";
            aviacion_3_form.style.display = "block";
            element.setAttribute('value', '37');
            aviacion_3_form.appendChild(element);
            clausulasSelect(".selectClausula", "maritimo", "ariel");
            coberturasSelect(".selectCobertura", "maritimo", "ariel");
            break;
        default:
            currentTab = 0;
            aviacion_1_form.style.display = "none";
            aviacion_2_form.style.display = "none";
            aviacion_3_form.style.display = "none";
            break;
    }
}

function updateS8() {
    let responsabilidad_form = document.querySelector("#responsabilidad_form");
    currentForm = "#responsabilidad_form"

    nextBtn = responsabilidad_form.getElementsByTagName('button').nextBtn;
    prevBtn = responsabilidad_form.getElementsByTagName('button').prevBtn;
    submitBtn = responsabilidad_form.getElementsByTagName('button').submitBtn;

    x = responsabilidad_form.getElementsByClassName("tab");
    showTab(currentTab); // Display the crurrent tab

    let select = document.querySelector('#cobertura_responsabilidad_civil');
    let value = select.options[select.selectedIndex].value;

    const element = document.createElement('input');

    element.setAttribute('type', 'text');
    element.setAttribute('name', 'type_coverage');
    element.setAttribute('id', 'type_coverage');
    element.setAttribute('hidden', 'true');


    switch (value) {
        case "plo":
            currentTab = 0;
            responsabilidad_form.style.display = "block";
            element.setAttribute('value', '38');
            responsabilidad_form.appendChild(element);
            clausulasSelect(".selectClausula", "responsabilidad_civil", "extracontractual");
            coberturasSelect(".selectCobertura", "responsabilidad_civil", "extracontractual");
            break;
        case "cont":
            currentTab = 0;
            responsabilidad_form.style.display = "block";
            element.setAttribute('value', '39');
            responsabilidad_form.appendChild(element);
            clausulasSelect(".selectClausula", "responsabilidad_civil", "contractual");
            coberturasSelect(".selectCobertura", "responsabilidad_civil", "contractual");
            break;
        case "eo":
            currentTab = 0;
            responsabilidad_form.style.display = "block";
            element.setAttribute('value', '40');
            responsabilidad_form.appendChild(element);
            clausulasSelect(".selectClausula", "responsabilidad_civil", "extracontractual");
            coberturasSelect(".selectCobertura", "responsabilidad_civil", "extracontractual");
            break;
        case "rcm":
            currentTab = 0;
            responsabilidad_form.style.display = "block";
            element.setAttribute('value', '41');
            responsabilidad_form.appendChild(element);
            clausulasSelect(".selectClausula", "responsabilidad_civil", "extracontractual");
            coberturasSelect(".selectCobertura", "responsabilidad_civil", "extracontractual");
            break;
        case "rcrcp":
            currentTab = 0;
            responsabilidad_form.style.display = "block";
            element.setAttribute('value', '42');
            responsabilidad_form.appendChild(element);
            clausulasSelect(".selectClausula", "responsabilidad_civil", "extracontractual");
            coberturasSelect(".selectCobertura", "responsabilidad_civil", "extracontractual");
            break;
        case "da":
            currentTab = 0;
            responsabilidad_form.style.display = "block";
            element.setAttribute('value', '43');
            responsabilidad_form.appendChild(element);
            clausulasSelect(".selectClausula", "responsabilidad_civil", "extracontractual");
            coberturasSelect(".selectCobertura", "responsabilidad_civil", "extracontractual");
            break;
        default:
            currentTab = 0;
            responsabilidad_form.style.display = "none";
            break;
    }
}

function updateS9() {
    let riesgos = document.querySelector("#riesgos_form");
    currentForm = "#riesgos_form"

    nextBtn = riesgos.getElementsByTagName('button').nextBtn;
    prevBtn = riesgos.getElementsByTagName('button').prevBtn;
    submitBtn = riesgos.getElementsByTagName('button').submitBtn;

    x = riesgos.getElementsByClassName("tab");
    showTab(currentTab); // Display the crurrent tab

    let select = document.querySelector('#cobertura_riesgos_financieros');
    let value = select.options[select.selectedIndex].value;

    const element = document.createElement('input');

    element.setAttribute('type', 'text');
    element.setAttribute('name', 'type_coverage');
    element.setAttribute('id', 'type_coverage');
    element.setAttribute('hidden', 'true');


    switch (value) {
        case "bbb":
            currentTab = 0;
            riesgos.style.display = "block";
            element.setAttribute('value', '44');
            riesgos.appendChild(element);
            coberturasSelect(".selectCobertura", "riesgos_financieros", "bbb");
            clausulasSelect(".selectClausula", "riesgos_financieros", "bbb");
            break;
        case "fif":
            currentTab = 0;
            riesgos.style.display = "block";
            element.setAttribute('value', '45');
            riesgos.appendChild(element);
            coberturasSelect(".selectCobertura", "riesgos_financieros", "fif");
            clausulasSelect(".selectClausula", "riesgos_financieros", "fif");
            break;
        default:
            currentTab = 0;
            riesgos.style.display = "block";
            break;
    }
}

function updateS10() {
    let finanzas_1 = document.querySelector("#finanzas_1_form");
    let finanzas_2 = document.querySelector("#finanzas_2_form");

    let select = document.querySelector('#cobertura_finanzas');
    let value = select.options[select.selectedIndex].value;

    const element = document.createElement('input');

    element.setAttribute('type', 'text');
    element.setAttribute('name', 'type_coverage');
    element.setAttribute('id', 'type_coverage');
    element.setAttribute('hidden', 'true');

    switch (value) {
        case "fi":
            currentTab = 0;
            currentForm = '#finanzas_1_form'
            x = finanzas_1.getElementsByClassName("tab");
            nextBtn = finanzas_1.getElementsByTagName('button').nextBtn;
            prevBtn = finanzas_1.getElementsByTagName('button').prevBtn;
            submitBtn = finanzas_1.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            finanzas_1.style.display = "block";
            finanzas_2.style.display = "none";
            element.setAttribute('value', '46');
            finanzas_1.appendChild(element);
            clausulasSelect(".selectClausula", "fianzas", "fidelidad");
            coberturasSelect(".selectCobertura", "fianzas", "fidelidad");
            break;
        case "so":
            currentTab = 0;
            currentForm = '#finanzas_2_form'
            x = finanzas_2.getElementsByClassName("tab");
            nextBtn = finanzas_2.getElementsByTagName('button').nextBtn;
            prevBtn = finanzas_2.getElementsByTagName('button').prevBtn;
            submitBtn = finanzas_2.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            finanzas_1.style.display = "none";
            finanzas_2.style.display = "block";
            element.setAttribute('value', '47');
            finanzas_2.appendChild(element);
            clausulasSelect(".selectClausula", "fianzas", "so");
            coberturasSelect(".selectCobertura", "fianzas", "so");
            break;
        case "cc":
            currentTab = 0;
            currentForm = '#finanzas_2_form'
            x = finanzas_2.getElementsByClassName("tab");
            nextBtn = finanzas_2.getElementsByTagName('button').nextBtn;
            prevBtn = finanzas_2.getElementsByTagName('button').prevBtn;
            submitBtn = finanzas_2.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            finanzas_1.style.display = "none";
            finanzas_2.style.display = "block";
            element.setAttribute('value', '48');
            finanzas_2.appendChild(element);
            clausulasSelect(".selectClausula", "fianzas", "cc");
            coberturasSelect(".selectCobertura", "fianzas", "cc");
            break;
        case "ba":
            currentTab = 0;
            currentForm = '#finanzas_2_form'
            x = finanzas_2.getElementsByClassName("tab");
            nextBtn = finanzas_2.getElementsByTagName('button').nextBtn;
            prevBtn = finanzas_2.getElementsByTagName('button').prevBtn;
            submitBtn = finanzas_2.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            finanzas_1.style.display = "none";
            finanzas_2.style.display = "block";
            element.setAttribute('value', '49');
            finanzas_2.appendChild(element);
            clausulasSelect(".selectClausula", "fianzas", "ba");
            coberturasSelect(".selectCobertura", "fianzas", "ba");
            break;
        case "ej":
            currentTab = 0;
            currentForm = '#finanzas_2_form'
            x = finanzas_2.getElementsByClassName("tab");
            nextBtn = finanzas_2.getElementsByTagName('button').nextBtn;
            prevBtn = finanzas_2.getElementsByTagName('button').prevBtn;
            submitBtn = finanzas_2.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            finanzas_1.style.display = "none";
            finanzas_2.style.display = "block";
            element.setAttribute('value', '50');
            finanzas_2.appendChild(element);
            clausulasSelect(".selectClausula", "fianzas", "ej");
            coberturasSelect(".selectCobertura", "fianzas", "ej");
            break;
        case "ga":
            currentTab = 0;
            currentForm = '#finanzas_2_form'
            x = finanzas_2.getElementsByClassName("tab");
            nextBtn = finanzas_2.getElementsByTagName('button').nextBtn;
            prevBtn = finanzas_2.getElementsByTagName('button').prevBtn;
            submitBtn = finanzas_2.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            finanzas_1.style.display = "none";
            finanzas_2.style.display = "block";
            element.setAttribute('value', '51');
            finanzas_2.appendChild(element);
            clausulasSelect(".selectClausula", "fianzas", "ga");
            coberturasSelect(".selectCobertura", "fianzas", "ga");
            break;
        case "og":
            currentTab = 0;
            currentForm = '#finanzas_2_form'
            x = finanzas_2.getElementsByClassName("tab");
            nextBtn = finanzas_2.getElementsByTagName('button').nextBtn;
            prevBtn = finanzas_2.getElementsByTagName('button').prevBtn;
            submitBtn = finanzas_2.getElementsByTagName('button').submitBtn;
            showTab(currentTab); // Display the crurrent tab
            finanzas_1.style.display = "none";
            finanzas_2.style.display = "block";
            element.setAttribute('value', '52');
            finanzas_2.appendChild(element);
            clausulasSelect(".selectClausula", "fianzas", "og");
            coberturasSelect(".selectCobertura", "fianzas", "og");
            break;
        default:
            currentTab = 0;
            finanzas_1.style.display = "none";
            finanzas_2.style.display = "none";
            break;
    }
}
// ============= Bootstrap forms =================

// var currentTab = 0; // Current tab is set to be the first tab (0)

function showTab(n) {
    // // This function will display the specified tab of the form...
    // var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        prevBtn.style.display = "none";
    } else {
        prevBtn.style.display = "inline";
    }
    if (n == (x.length - 1)) {
        // document.getElementById("nextBtn").innerHTML = "Guardar";
        nextBtn.style.display = "none";
        submitBtn.style.display = "inline-block";

        //TODO:Descomentar esta funcion si no se envia el formulario o da problemas
        // submitBtn.addEventListener('click', e => {
        //     e.preventDefault();
        //     let activeForm = document.querySelector('form[style="display: block;"]');
        //     currencyToUSD();

        //     activeForm.submit();

        // })

    } else {
        nextBtn.innerHTML = "Siguiente";
        nextBtn.style.display = "inline-block";
        document.getElementById('submitBtn').style.display = "none";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
}



function nextPrev(n) {
    // This function will figure out which tab to display
    // var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    //if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        // ... the form gets submitted:
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += "Registrar";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}


// ================ Add / Remove table rows ===================

function addRow(tableID) {

    let table = document.getElementById(tableID);

    let rowCount = table.rows.length;
    let row = table.insertRow(rowCount);

    let cellCount = table.rows[0].cells.length;
    for (let i = 0; i < cellCount; i++) {
        let cell = row.insertCell(i);
        if (i < cellCount - 1) {
            switch (i) {
                case 0:
                    cell.innerText = `${rowCount}`;
                    break;
                case 1:
                    cell.innerHTML = `<input type="text" name="nombre" id="nombre"
                oninput="this.className = ''">`;
                    break;
                case 2:
                    cell.innerHTML = `<input type="text" name="matricula" id="matricula"
                oninput="this.className = ''">`;
                    break;
                case 3:
                    cell.innerHTML = `<select name="material" id="material"><option value="" selected disabled>Seleccionar</option><option value="madera">Madera</option><option value="vidrio">Fibra de vidrio</option><option value="acero">Acero naval</option><option value="aluminio">Aluminio</option><option value="mixtos">Mixtos</option></select>`;
                    break;
                case 4:
                    cell.innerHTML = `<input type="number" step="any" placeholder="Manga (mts)" oninput="this.className =''">`;
                    break;
                case 5:
                    cell.innerHTML = `<input type="number" step="any" placeholder="Eslora (mts)" oninput="this.className =''">`;
                    break;
                case 6:
                    cell.innerHTML = `<input type="number" step="any" placeholder="Puntal (mts)" oninput="this.className =''">`;
                    break;
                case 7:
                    cell.innerHTML = `<input type="number" step="any" placeholder="Casco (USD)" oninput="this.className =''">`;
                    break;
                case 8:
                    cell.innerHTML = `<input type="number" step="any" placeholder="Máquina (USD)" oninput="this.className =''">`;
                    break;
                default:
                    break;
            }
        } else {
            cell.innerHTML = `<input type="button" value="Eliminar" onclick="deleteRow(${table})" />`;
        }
    }
}


function putAge(tableName) {
    const inputsFechaNacimiento = document.querySelectorAll('.birthdateInput')

    inputsFechaNacimiento.forEach(input => {
        input.addEventListener('input', () => {
            let fechaNacimiento = new Date(input.value);
            let hoy = new Date();
            let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
            if (hoy < new Date(hoy.getFullYear(), fechaNacimiento.getMonth(), fechaNacimiento.getDate())) {
                edad--;
            }
            let fila = input.closest('tr');
            fila.querySelector('.ageInput').value = edad;

            // Recorrer todas las filas y actualizar la edad
            let tabla = document.getElementById(`${tableName}`)
            let filas = tabla.querySelectorAll(' tbody tr');
            filas.forEach(fila => {
                let fechaNacimientoFila = new Date(fila.querySelector('.birthdateInput').value);
                let hoy = new Date();
                let edad = hoy.getFullYear() - fechaNacimientoFila.getFullYear();
                if (hoy < new Date(hoy.getFullYear(), fechaNacimientoFila.getMonth(), fechaNacimientoFila.getDate())) {
                    edad--;
                }
                fila.querySelector('.ageInput').value = edad;
            })
        })
    })
}


function calcAge() {
    let birthdate = document.querySelectorAll('.ageInput')
    let today = new Date();
    let age = today.getFullYear() - new Date(birthdate).getFullYear();
    //Chequear si es que el cumpleaños ya paso o no
    let birthdateThisYear = new Date(today.getFullYear(),
        new Date(birthdate).getrMonth(),
        new Date(birthdate).getDate());

    if (today < birthdateThisYear) {
        age--;
    }

    document.querySelector('personAge').textContent = age;
}

function addEquipoAseguradoRow(tableID) {

    var table = document.getElementById(tableID);

    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);

    var cellCount = table.rows[0].cells.length;
    for (var i = 0; i < cellCount; i++) {
        var cell = row.insertCell(i);
        if (i < cellCount - 1) {
            switch (i) {
                case 0:
                    cell.innerText = `${rowCount}`;
                    break;
                case 1:
                    cell.innerHTML = `<input type="text" name="device" id="device"
                    oninput="this.className = ''">`;
                    break;
                case 2:
                default:
                    break;
            }
        } else {
            cell.innerHTML = `<input type="button" value="Eliminar" onclick="deleteRow('${tableID}')" />`;
        }
    }
}
function addCoberturaRow(tableID) {

    var table = document.getElementById(tableID);

    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);

    var cellCount = table.rows[0].cells.length;
    for (var i = 0; i < cellCount; i++) {
        var cell = row.insertCell(i);
        if (i < cellCount - 1) {
            switch (i) {
                case 0:
                    cell.innerText = `${rowCount}`;
                    break;
                case 1:
                    cell.innerHTML = `<input type="text" name="coverage" id="coverage"
                    oninput="this.className = ''">`;
                    break;
                case 2:
                    cell.innerHTML = `<input type="date" name="valor" id="valor"
                    oninput="this.className = ''">`;
                    break;
                case 3:
                    cell.innerHTML = `<select name="sex" id="sex">
                    <option value="m" selected>Masculino</option>
                    <option value="f">Femenino</option>
                </select>`;
                    break;
                case 4:
                    cell.innerHTML = `<input type="text" placeholder="Actividad" name="personActivity" id="personActivity"
                        oninput="this.className =''">`;
                    break;
                default:
                    break;
            }
        } else {
            cell.innerHTML = `<input type="button" value="Eliminar" onclick="deleteRow('${tableID}')" />`;
        }
    }
}

function addCoberturaMaritimaRow(tableID) {

    var table = document.getElementById(tableID);

    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);

    var cellCount = table.rows[0].cells.length;
    for (var i = 0; i < cellCount; i++) {
        var cell = row.insertCell(i);
        if (i < cellCount - 1) {
            switch (i) {
                case 0:
                    cell.innerText = `${rowCount}`;
                    break;
                case 1:
                    cell.innerHTML = `<input type="text" name="nombre" id="nombre"
                oninput="this.className = ''">`;
                    break;
                case 2:
                    cell.innerHTML = `<input type="number" step="any" name="valor" id="valor"
                oninput="this.className = ''">`;
                    break;
                case 3:
                    cell.innerHTML = `<input type="number" step="any" placeholder="Máquina (USD)" oninput="this.className =''">`;
                    break;
                default:
                    break;
            }
        } else {
            cell.innerHTML = `<input type="button" value="Eliminar" onclick="deleteRow('${tableID}')" />`;
        }
    }
}

function addAeronaveRow(tableID) {

    var table = document.getElementById(tableID)

    var rowCount = table.rows.length
    var row = table.insertRow(rowCount)

    var cellCount = table.rows[0].cells.length;
    for (var i = 0; i < cellCount; i++) {
        var cell = row.insertCell(i);
        if (i < cellCount - 1) {
            switch (i) {
                case 0:
                    cell.innerText = `${rowCount}`;
                    break;
                case 1:
                    cell.innerHTML = `<select name="type_ala_aerial[]" id="ala">
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="fija">Fija</option>
                    <option value="rotativa">Rotativa</option>
                </select>`;
                    break;
                case 2:
                    cell.innerHTML = `<input type="text" name="serie_aerial[]" id="series" oninput="this.className = ''">`;
                    break;
                case 3:
                    cell.innerHTML = `<input type="text" name="marca_aerial[]" id="brand" oninput="this.className = ''">`;
                    break;
                case 4:
                    cell.innerHTML = `<input type="text" name="model_aerial[]" id="model" oninput="this.className = ''">`;
                    break;
                case 5:
                    cell.innerHTML = `<input type="number" step="any" min="1960" name="year_manufacture_aerial[]" id="makeYear"
                            oninput="this.className = ''">`;
                    break;
                case 6:
                    cell.innerHTML = `<input type="text" name="cap_crew[]" id="capacity" min="1" step="1"
                            oninput="this.className = ''">`;
                    break;
                case 7:
                    cell.innerHTML = `<input type="number" step="any" name="cap_pax[]" id="passengers" oninput="this.className = ''">`;
                    break;
                case 8:
                    cell.innerHTML = `<input type="number" step="any" placeholder="Suma asegurada" data-money oninput="this.className = ''"
                    name="sum_insured[]" id="insuredSum">`;
                    break;
                default:
                    break;
            }
        } else {
            cell.innerHTML = ``
            /* cell.innerHTML = `<input type="button" value="Eliminar" onclick="deleteRow('${tableID}')" />` */
        }
    }
}

function deleteRow(tableID) {
    //TODO: ARREGLAR QUE NO SE BORRE TODA LA TABLA
    try {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;

        for (var i = 0; i < rowCount; i++) {
            // var row = table.rows[i];
            //  var chkbox = row.cells[0].childNodes[0];
            // if (null != chkbox && true == chkbox.checked) {
            if (rowCount == 0) {
                alert("No puedes eliminar esta fila.");
                break;
            }
            table.deleteRow(i);
            rowCount--;
            i--;
            //}
        }
    } catch (e) {
        alert(e);
    }
}


//function general clausulas
function addClausula(event, form) {
    event.preventDefault()


    const clausula_left_side = document.getElementById(`${form}Clausula-left_side`)
    const div = document.createElement('div')

    clausula_left_side.appendChild(div)
    div.className = 'input_group'
    div.innerHTML =
        `
        <label>
            <i class="fa-solid fa-flag"></i>
            Cláusula adicional:
        </label>

        <input type="text" name="description_clause_aditional[]" placeholder="...">
        `
}

function prueba() {
    let asegurada, asegurable;
    asegurada = $('#sumaAsegurada');
    asegurable = $('#sumaAsegurable');

    if (asegurada.checked) {
        asegurada.setAttribute('checked');
        asegurada.removeAttribute('checked');
        $('#sumaAseguradaContainer').show();
        $('#sumaAsegurableContainer').hide();
    }
    if (asegurable.checked) {
        asegurada.removeAttribute('checked');
        asegurada.setAttribute('checked');
        $('#sumaAseguradaContainer').hide();
        $('#sumaAsegurableContainer').show();
    }
}
/* function choose tipo 'suma' */
function choose() {
    const sumaAsegurable = document.getElementById('sumaAsegurable')
    const sumaAsegurada = document.getElementById('sumaAsegurada')

    if (sumaAsegurada.checked) {
        $('#sumaAseguradaContainer').show();
        $('#sumaAsegurableContainer').hide();

    }
    if (sumaAsegurable.checked) {
        $('#sumaAsegurableContainer').show();
        $('#sumaAseguradaContainer').hide();

    }
}

function chooseTypeSuma(event) {
    event.preventDefault()

    const sumaAsegurable = document.getElementById('sumaAsegurable')
    const sumaAsegurada = document.getElementById('sumaAsegurada')

    if (sumaAsegurada.checked) {
        $('#sumaAseguradaContainer').show();
        $('#inputSumaAsegurada').show();
        $('#sumaAsegurableContainer').hide();
        $('#inputSumaAsegurable').hide();

    }
    if (sumaAsegurable.checked) {
        $('#sumaAsegurableContainer').show();
        $('#inputSumaAsegurable').show();
        $('#sumaAseguradaContainer').hide();
        $('#inputSumaAsegurada').hide();

    }
}
function chooseTypeSuma2(event) {
    event.preventDefault()

    const sumaAsegurable = document.getElementById('sumaAsegurable2')
    const sumaAsegurada = document.getElementById('sumaAsegurada2')

    if (sumaAsegurada.checked) {
        $('#sumaAsegurada2Container').show();
        $('#inputSumaAsegurada2').show();
        $('#sumaAsegurable2Container').hide();
        $('#inputSumaAsegurable2').hide();

    }
    if (sumaAsegurable.checked) {
        $('#sumaAsegurable2Container').show();
        $('#inputSumaAsegurable2').show();
        $('#sumaAsegurada2Container').hide();
        $('#inputSumaAsegurada2').hide();

    }
}


//suma asegurable / table suma asegurada rama:incendio

function refreshSumaAseguradaTable() {
    let row = $('#activos_fijosSumaAseguradaTableBody').find('tr').length
    let column = $('#activos_fijosSumaAseguradaTableBody').find('tr:first-child td').length - 4;
    console.log(column);
    
    for (let i = 1; i <= row; i++) {
        for (let j = 1; j <= column; j++) {
            incendioSumaAsegurableTotales(i, j, 'activos_fijos');
        }
    }
}

function incendioSumaAsegurableTotales(row, col, table) {
    const activos_fijosSumaAseguradaTable = document.getElementById(`${table}SumaAseguradaTable`)
    //sumas filas
    let rowSelect = activos_fijosSumaAseguradaTable.getElementsByClassName(`row${row}`)
    let rowTotal = activos_fijosSumaAseguradaTable.querySelector(`#rowTotal${row}`)
    let rowTotalArray = []

    for (let i = 0; i < rowSelect.length; i++) {
        if (rowSelect[i].value > 0) {
            rowTotalArray.push(parseFloat(rowSelect[i].value))
        }
    }

    let sumaTotal = rowTotalArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)

    rowTotal.innerText = parseFloat(sumaTotal).toFixed(2)

    //suma columnas
    let colSelect = activos_fijosSumaAseguradaTable.getElementsByClassName(`col${col}`)
    let colTotal = activos_fijosSumaAseguradaTable.querySelector(`#colTotal${col}`)
    let colTotalArray = []

    for (const element of colSelect) {
        if (element.value > 0) {
            colTotalArray.push(parseFloat(element.value))
        }
    }

    let sumaTotal2 = colTotalArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)

    colTotal.innerText = parseFloat(sumaTotal2).toFixed(2)

    //total de los total
    let colTotalTotal = activos_fijosSumaAseguradaTable.getElementsByClassName('col12')
    console.log(colTotalTotal);
    const totalTotal = activos_fijosSumaAseguradaTable.querySelector('#incendioTotalTotal')
    let colTotalTotalArray = []

    for (const element of colTotalTotal) {
        if (element.innerText > 0) {
            colTotalTotalArray.push(parseFloat(element.innerText))
        }
    }

    let sumaTotal3 = colTotalTotalArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)

    totalTotal.innerText = parseFloat(sumaTotal3).toFixed(2)

    //suma en input

    if (table === 'activos') {
        $(`#input_sumaAsegurable`).val(parseFloat(sumaTotal3).toFixed(2))
    }
    if (table === 'energia1') {
        $(`#input_sumaAsegurableEnergia`).val(parseFloat(sumaTotal3).toFixed(2))
    }
    if (table === 'activos_fijos') {
        $(`#input_sumaAsegurada`).val(parseFloat(sumaTotal3).toFixed(2))
    }

}

function addRowSumaAseguradaIncendio(event, type) {
    event.preventDefault()

    let rowCount = document.getElementById(`${type}SumaAseguradaTable`).rows.length - 1

    const sumaAseguradaTableBody = document.getElementById(`${type}SumaAseguradaTableBody`)
    const tr = document.createElement('tr')

    sumaAseguradaTableBody.appendChild(tr)
    tr.id = `newRowSumaAsegurada${rowCount}`
    tr.innerHTML =
        `
            <td>
                ${rowCount}
            </td>
            <td>
                <input type="text" name="location[]" class="inputLocation" style="width: 95px"
                    placeholder="..." novalidate>
            </td>
            <td>
                <input onkeyup="incendioSumaAsegurableTotales(${rowCount}, 1, '${type}')" type="number"
                    step="any" data-money name="edification[]" value="0" novalidate
                    style="width: 95px" class="col1 row${rowCount}">
            </td>
            <td>
                <input onkeyup="incendioSumaAsegurableTotales(${rowCount}, 2, '${type}')" type="number"
                    step="any" data-money name="contents[]" value="0" novalidate
                    style="width: 95px" class="col2 row${rowCount}">
            </td>
            <td>
                <input onkeyup="incendioSumaAsegurableTotales(${rowCount}, 3, '${type}')" type="number"
                    step="any" data-money name="equipment[]" value="0" novalidate
                    style="width: 95px" class="col3 row${rowCount}">
            </td>
            <td>
                <input onkeyup="incendioSumaAsegurableTotales(${rowCount}, 4, '${type}')" type="number"
                    step="any" data-money name="machine[]" value="0" novalidate
                    style="width: 95px" class="col4 row${rowCount}">
            </td>
            <td>
                <input onkeyup="incendioSumaAsegurableTotales(${rowCount}, 5, '${type}')" type="number"
                    step="any" data-money name="commodity[]" value="0" novalidate
                    style="width: 95px" class="col5 row${rowCount}">
            </td>
            <td>
                <input onkeyup="incendioSumaAsegurableTotales(${rowCount}, 6, '${type}')" type="number"
                    step="any" name="other_sum_assured[]" value="0" novalidate
                    style="width: 95px" class="col6 row${rowCount}">
            </td>
            <td style="text-align: center">
                <span class="slipTitle col12" id="rowTotal${rowCount}">0</span>$
            </td>

            <td>
                <button id="${rowCount}" type="button"  class="btn btn-danger btn-delete-suma"></button>
            </td>
        `

    addRowPredios(event, 'activos_fijos')

}

$(document).on('click', '.btn-delete-suma', function (e) {
    e.preventDefault()

    let id = $(this).attr('id')

    $(`#newRowSumaAsegurada${id}`).remove()
})

//function addDeducible
var deduciblesCounter = 1
function addDeducible(event, slipType) {
    event.preventDefault()
    console.log(slipType)
    const deduciblesContainer = document.getElementById(`${slipType}DeduciblesContainer`)
    const div = document.createElement('div')

    deduciblesContainer.appendChild(div)
    div.className = 'flexColumnCenterContainer'
    div.style.margin = '1rem 0'
    div.id = `newRowDeducible${deduciblesCounter}`
    div.innerHTML =
        `
        <div class="d-flex mb-2">
            <div class="input-group">
                <input class="form-control" type="text" name="description_deductible[]"
                    placeholder="Detalle..">
                <input class="form-control" type="number" min="0" max="100" step="any"
                    placeholder="%" name="sinister_value[]" min="0">
                <span class="input-group-text">valor del siniestro</span>
            </div>
            <div class="input-group">
                <span class="input-group-text">%</span>
                <input class="form-control" type="number" min="0" max="100" step="any"
                    name="insured_value[]">
                <span class="input-group-text">del valor asegurado</span>
            </div>
                    <div class="input-group">
                        <span class="input-group-text">mínimo</span>
                        <input class="form-control" type="text" name="minimum[]" placeholder="...">
                        <textarea rows="1" type="text" name="description2_deductible[]" placeholder="Descripción del deducible..."></textarea>
                    </div>

                    <button data-deducible="${deduciblesCounter}" class="btn btn-danger btn-delete-deducible">X</button>

                </div>
        `

    deduciblesCounter++
}

$(document).on('click', '.btn-delete-deducible', function (e) {
    e.preventDefault()

    let id = $(this).data('deducible')
    $(`#newRowDeducible${id}`).remove()
    deduciblesCounter--
})
/* function coberturas adicionales */

// function addRowCoberturaV2(event, type, typeRamo, typeSubCobertura) {
//     event.preventDefault()

//     let rowCount = document.getElementById(`${type}CoberturasAdicionalesTable`).rows.length

//     const coberturasAdicionalesTableBody = document.getElementById(`${type}CoberturasAdicionalesTableBody`)
//     const tr = document.createElement('tr')

//     coberturasAdicionalesTableBody.appendChild(tr)
//     tr.id = `newRowIncendioCoberturaAdicional${rowCount}`
//     tr.innerHTML =
//         `
//             <td>
//                 ${rowCount}
//             </td>
//             <td>
//                 <select name="description_coverage_additional[]" class="selectCobertura"></select>
//             </td>
//             <td>
//                 <input type="text" placeholder="..." name="coverage_additional_additional[]">
//             </td>
//             <td>
//                 <input type="number" step="any" placeholder="0" name="coverage_additional_usd[]" data-money>
//             </td>
//             <td>
//                 <input type="text" placeholder="..." name="coverage_additional_additional2[]">
//             </td>
//             <td>
//                 <button id="${rowCount}" type="button"  class="btn btn-danger btn-delete-cobertura"></button>
//             </td>
//         `

//     coberturasSelect(".selectCobertura", `${typeRamo}`, `${typeSubCobertura}`);

// }


function addRowCoberturaV2(event, type, typeRamo, typeSubCobertura) {
    event.preventDefault()

    let rowCount = document.getElementById(`${type}CoberturasAdicionalesTable`).rows.length

    const coberturasAdicionalesTableBody = document.getElementById(`${type}CoberturasAdicionalesTableBody`)
    const tr = document.createElement('tr')

    coberturasAdicionalesTableBody.appendChild(tr)
    tr.id = `newRowIncendioCoberturaAdicional${rowCount}`
    tr.innerHTML =
        `
            <td>
                ${rowCount}
            </td>
            <td>
                <select id="description_coverage_additional_${rowCount}" name="description_coverage_additional[]" class="selectCobertura"></select>
            </td>
            <td>
                <input type="text" placeholder="..." name="coverage_additional_additional[]">
            </td>
            <td>
                <input type="number" step="any" placeholder="0" name="coverage_additional_usd[]" data-money>
            </td>
            <td>
                <input type="text" placeholder="..." name="coverage_additional_additional2[]">
            </td>
            <td>
                <button id="${rowCount}" type="button"  class="btn btn-danger btn-delete-cobertura"></button>
            </td>
        `

    $('#description_coverage_additional_' + rowCount).select2();
    coberturasSelect(`#description_coverage_additional_${rowCount}`, `${typeRamo}`, `${typeSubCobertura}`);

}


$(document).on('click', '.btn-delete-cobertura', function (e) {
    e.preventDefault()

    let id = $(this).attr('id')

    $(`#newRowIncendioCoberturaAdicional${id}`).remove()
})

function addRowClausula(event, type, typeRamo, typeSubCobertura) {
    event.preventDefault()
    let rowCount = document.getElementById(`${type}ClausulasAdicionalesTable`).rows.length

    const clausulasAdicionalesTableBody = document.getElementById(`${type}ClausulasAdicionalesTableBody`)
    const tr = document.createElement('tr')

    clausulasAdicionalesTableBody.appendChild(tr)
    tr.id = `newRowClausulaAdicional${rowCount}`
    tr.innerHTML =
        `
            <td>
                ${rowCount}
            </td>
            <td>
                <select id="description_clause_additional_${rowCount}" name="description_clause_additional[]" class="selectClausula">
                    <option selected disabled>Seleccionar</option>
                </select>
            </td>
            <td>
                <input type="text" placeholder="..." name="clause_additional_additional[]">
            </td>
            <td>
                <input type="number" step="any" placeholder="0" name="clause_additional_usd[]" data-money>
            </td>
            <td>
                <input type="text" placeholder="..." name="clause_additional_additional2[]">
            </td>
            <td>
                <button id="${rowCount}" type="button" class="btn btn-danger btn-delete-clausula"></button>
            </td>
        `
    $('#description_clause_additional_' + rowCount).select2();
    clausulasSelect(`#description_clause_additional_${rowCount}`, `${typeRamo}`, `${typeSubCobertura}`);
}


$(document).on('click', '.btn-delete-clausula', function (e) {
    e.preventDefault()

    let id = $(this).attr('id')

    $(`#newRowClausulaAdicional${id}`).remove()
})


/* function addrow listado personas aseguradas */

function addPersonaAseguradaRow(event, type) {
    event.preventDefault()

    let rowCount = document.getElementById(`${type}ListadoPersonasAseguradasTable`).rows.length

    const ListadoPersonasAseguradasTableBody = document.getElementById(`${type}ListadoPersonasAseguradasTableBody`)
    const tr = document.createElement('tr')

    ListadoPersonasAseguradasTableBody.appendChild(tr)
    tr.id = `newRowListadoPersonas${rowCount}`
    tr.innerHTML =
        `
            <td>
                ${rowCount}
            </td>
            <td>
                <input type="text" name="name[]" placeholder="Nombre..">
            </td>

            <td>
                <input type="date" name="birthday[]" id="birthDate" class="birthdateInput" oninput="putAge('personaAdicional')">
            </td>

            <td>
                <input type="number" class="ageInput" name="age[]" id="personAge" min="1"
                        max="110">
            </td>

            <td>
                <select name="sex_merchant[]" id="sex">
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="Masculino" selected>Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </td>
            <td>
                <input type="text" placeholder="..." name="activity_merchant[]">
            </td>
            <td>
                <input type="text" placeholder="..." name="limit[]">
            </td>
            <td>
                <button id="${rowCount}" type="button"  class="btn btn-danger btn-delete-listado"></button>
            </td>
        `

}

$(document).on('click', '.btn-delete-listado', function (e) {
    e.preventDefault()

    let id = $(this).attr('id')

    $(`#newRowListadoPersonas${id}`).remove()
})

//suma asegurable / table suma asegurada rama:energia
const energiaSumaAsegurable = document.getElementById('energiaSumaAsegurable')

function energiaSumaAsegurableTotales(row) {
    const energiaSumaAseguradaTable = document.getElementById('energiaSumaAseguradaTable')
    //sumas filas
    let rowSelect = energiaSumaAseguradaTable.getElementsByClassName(`row${row}`)
    console.log(rowSelect)
    let rowTotal = energiaSumaAseguradaTable.querySelector(`#rowTotal${row}`)
    console.log(rowTotal);
    let rowTotalArray = []

    for (let i = 0; i < rowSelect.length; i++) {
        if (rowSelect[i].value > 0) {
            rowTotalArray.push(parseFloat(rowSelect[i].value))
        }
    }

    let sumaTotal = rowTotalArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)

    rowTotal.innerText = parseFloat(sumaTotal).toFixed(2)
    //sumas columnas

    let edificacionInput = energiaSumaAseguradaTable.getElementsByClassName("edificacionInput")
    let contenidosInput = energiaSumaAseguradaTable.getElementsByClassName("contenidosInput")
    let maquinariaEquiposInput = energiaSumaAseguradaTable.getElementsByClassName("maquinariaEquiposInput")
    let mueblesInput = energiaSumaAseguradaTable.getElementsByClassName("mueblesInput")
    let mercaderiasInput = energiaSumaAseguradaTable.getElementsByClassName("mercaderiasInput")
    let otrosInput = energiaSumaAseguradaTable.getElementsByClassName("otrosInput")
    let energiaTotalSpan = energiaSumaAseguradaTable.getElementsByClassName("energiaTotalSpan")

    const energiaEdificacionTotal = document.getElementById('energiaEdificacionTotal')
    const energiaContenidosTotal = document.getElementById('energiaContenidosTotal')
    const energiaMaquinariaEquiposTotal = document.getElementById('energiaMaquinariaEquiposTotal')
    const energiaMueblesTotal = document.getElementById('energiaMueblesTotal')
    const energiaMercaderiasTotal = document.getElementById('energiaMercaderiasTotal')
    const energiaOtrosTotal = document.getElementById('energiaOtrosTotal')
    const energiaTotalTotal = document.getElementById('energiaTotalTotal')

    //totals
    let energiaEdificacionArray = []
    let energiaContenidosArray = []
    let energiaMaquinariaEquiposArray = []
    let energiaMueblesArray = []
    let energiaMercaderiasArray = []
    let energiaOtrosArray = []
    let energiaTotalArray = []

    for (let i = 0; i < edificacionInput.length; i++) {
        if (edificacionInput[i].value > 0) {
            energiaEdificacionArray.push(parseFloat(edificacionInput[i].value))
        }
    }
    for (let i = 0; i < contenidosInput.length; i++) {
        if (contenidosInput[i].value > 0) {
            energiaContenidosArray.push(parseFloat(contenidosInput[i].value))
        }
    }
    for (let i = 0; i < maquinariaEquiposInput.length; i++) {
        if (maquinariaEquiposInput[i].value > 0) {
            energiaMaquinariaEquiposArray.push(parseFloat(maquinariaEquiposInput[i].value))
        }
    }
    for (let i = 0; i < mueblesInput.length; i++) {
        if (mueblesInput[i].value > 0) {
            energiaMueblesArray.push(parseFloat(mueblesInput[i].value))
        }
    }
    for (let i = 0; i < mercaderiasInput.length; i++) {
        if (mercaderiasInput[i].value > 0) {
            energiaMercaderiasArray.push(parseFloat(mercaderiasInput[i].value))
        }
    }
    for (let i = 0; i < otrosInput.length; i++) {
        if (otrosInput[i].value > 0) {
            energiaOtrosArray.push(parseFloat(otrosInput[i].value))
        }
    }
    for (let i = 0; i < energiaTotalSpan.length; i++) {
        if (energiaTotalSpan[i].innerText > 0) {
            energiaTotalArray.push(parseFloat(energiaTotalSpan[i].innerText))
        }
    }

    let suma1 = energiaEdificacionArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma2 = energiaContenidosArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma3 = energiaMaquinariaEquiposArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma4 = energiaMueblesArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma5 = energiaMercaderiasArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma6 = energiaOtrosArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma7 = energiaTotalArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)

    energiaEdificacionTotal.innerText = parseFloat(suma1).toFixed(2)
    energiaContenidosTotal.innerText = parseFloat(suma2).toFixed(2)
    energiaMaquinariaEquiposTotal.innerText = parseFloat(suma3).toFixed(2)
    energiaMueblesTotal.innerText = parseFloat(suma4).toFixed(2)
    energiaMercaderiasTotal.innerText = parseFloat(suma5).toFixed(2)
    energiaOtrosTotal.innerText = parseFloat(suma6).toFixed(2)
    energiaTotalTotal.innerText = parseFloat(suma7).toFixed(2)

    //suma input total
    $(`#input_sumaAseguradaEnergia`).val(parseFloat(suma7).toFixed(2))
}
function addRowSumaAseguradaEnergia(event, type) {
    event.preventDefault()

    let rowCount = document.getElementById(`${type}SumaAseguradaTable`).rows.length - 1

    const sumaAseguradaTableBody = document.getElementById(`${type}SumaAseguradaTableBody`)
    const tr = document.createElement('tr')

    sumaAseguradaTableBody.appendChild(tr)
    tr.id = `newRowSumaAsegurada${rowCount}`
    tr.innerHTML =
        `
            <td>
                ${rowCount}
            </td>
            <td>
                <input type="text" name="location[]" style="width: 95px" placeholder="..." novalidate>
            </td>
            <td>
                <input onkeyup="energiaSumaAsegurableTotales('${rowCount}')" type="number" step="any"
                    name="edification[]" value="0" novalidate
                    style="width: 95px" class="edificacionInput row${rowCount}">
            </td>
            <td>
                <input onkeyup="energiaSumaAsegurableTotales('${rowCount}')" type="number" step="any"
                    name="contents[]" value="0" novalidate
                    style="width: 95px" class="contenidosInput row${rowCount}">
            </td>
            <td>
                <input onkeyup="energiaSumaAsegurableTotales('${rowCount}')" type="number" step="any"
                    name="equipment[]" value="0" novalidate
                    style="width: 95px" class="maquinariaEquiposInput row${rowCount}">
            </td>
            <td>
                <input onkeyup="energiaSumaAsegurableTotales('${rowCount}')" type="number" step="any"
                    name="machine[]" value="0" novalidate style="width: 95px" class="mueblesInput row${rowCount}">
            </td>
            <td>
                <input onkeyup="energiaSumaAsegurableTotales('${rowCount}')" type="number" step="any"
                    name="commodity[]" value="0" novalidate
                    style="width: 95px" class="mercaderiasInput row${rowCount}">
            </td>
            <td>
                <input onkeyup="energiaSumaAsegurableTotales('${rowCount}')" type="number" step="any"
                    name="other_sum_assured[]" value="0" novalidate style="width: 95px" class="otrosInput row${rowCount}">
            </td>
            <td style="text-align: center">
                <span class="slipTitle energiaTotalSpan" id="rowTotal${rowCount}">0</span>$
            </td>
            <td>
                <button id="${rowCount}" type="button"  class="btn btn-danger btn-delete-suma"></button>
            </td>
        `

}

$(document).on('click', '.btn-delete-suma', function (e) {
    e.preventDefault()

    let id = $(this).attr('id')

    $(`#newRowSumaAsegurada${id}`).remove()
})



/* maritimo: casco */
function refreshSumaCascoMaquina(table) {
    
    let row = $(`#${table}TableEmbarcaciones`).find('tr').length

    for (let i = 1; i < row; i++) {
        console.log(i);
        sumaCascoMaquina(i, 1, `${table}`)
        sumaCascoMaquina(i, 2, `${table}`)
    }

}
//table detalle embarcaciones
function sumaCascoMaquina(row, col, typeTable) {

    //tabla
    const table = document.getElementById(`${typeTable}TableEmbarcaciones`)
    console.log(table);
    //sumas filas
    let rowSelect = table.getElementsByClassName(`row${row}`)
    let rowTotal = table.querySelector(`#rowTotal${row}`)
    let rowTotalArray = []

    for (const element of rowSelect) {
        if (element.value > 0) {
            rowTotalArray.push(parseFloat(element.value))
        }
    }

    let sumaTotal = rowTotalArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)

    rowTotal.innerText = parseFloat(sumaTotal).toFixed(2)

    //suma columnas
    let colSelect = table.getElementsByClassName(`col${col}`)
    let colTotal = table.querySelector(`#colTotal${col}`)
    let colTotalArray = []

    for (const element of colSelect) {
        if (element.value > 0) {
            colTotalArray.push(parseFloat(element.value))
        }
    }

    let sumaTotal2 = colTotalArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)

    colTotal.innerText = parseFloat(sumaTotal2).toFixed(2)

    //total de los total
    let colTotalTotal = table.getElementsByClassName('col3')
    console.log(colTotalTotal);
    const totalTotal = table.querySelector('#totalTotal')
    let colTotalTotalArray = []

    for (const element of colTotalTotal) {
        if (element.innerText > 0) {
            colTotalTotalArray.push(parseFloat(element.innerText))
        }
    }

    let sumaTotal3 = colTotalTotalArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)

    totalTotal.innerText = parseFloat(sumaTotal3).toFixed(2)

    $('#sumaAseguradaCascoBuques').val(totalTotal.innerText)

}

function addRowEmbarcaciones(event, type) {
    event.preventDefault()

    let rowCount = document.getElementById(`${type}TableEmbarcaciones`).rows.length - 1

    const cascoBuquesTableEmbarcacionesBody = document.getElementById(`${type}TableEmbarcacionesBody`)
    const tr = document.createElement('tr')

    cascoBuquesTableEmbarcacionesBody.appendChild(tr)
    tr.id = `newRowEmbarcaciones${rowCount}`
    tr.innerHTML =
        `
        <td style="text-align: center">
            ${rowCount}
        </td>
        <td>
            <input type="text" name="name_boat[]" placeholder="...">
        </td>
        <td>
            <input type="text" name="registration_boat[]" placeholder="...">
        </td>
        <td>
            <select name="material_boat[]" id="cascoBuquesMaterial1">
                <option value="0" selected>Selecciona</option>
                <option value="Madera">Madera</option>
                <option value="Fibra de vidrio">Fibra de vidrio</option>
                <option value="Acero naval">Acero naval</option>
                <option value="Aluminio">Aluminio</option>
                <option value="Mixtos">Mixtos</option>
            </select>
        </td>
        <td>
            <input type="number" step="any" name="manga_boat[]" placeholder="metros..">
        </td>
        <td>
            <input type="number" step="any" name="eslora_boat[]" placeholder="metros..">
        </td>
        <td>
            <input type="number" step="any" name="puntual_boat[]" placeholder="metros..">
        </td>
        <td>
            <input onkeyup="sumaCascoMaquina(${rowCount}, 1, '${type}')" type="number" data-money step="any" class="row${rowCount} col1"
                name="shell_boat[]" value="0">
        </td>
        <td>
            <input onkeyup="sumaCascoMaquina(${rowCount}, 2, '${type}')" type="number" data-money step="any" class="row${rowCount} col2"
                name="machine_boat[]" value="0">
        </td>
        <td style="text-align: center">
            <span class="slipTitle col3" id="rowTotal${rowCount}">0</span>$
        </td>
        <td>
            <button id="${rowCount}" type="button" class="btn btn-danger btn-xs btn-delete-embarcacion"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        </td>
        `

}
$(document).on('click', '.btn-delete-embarcacion', function (e) {
    e.preventDefault()

    let id = $(this).attr('id')
    $('#newRowEmbarcaciones' + id).remove()

})


function addRowObjetoSeguro(event, type) {
    event.preventDefault()

    let rowCount = document.getElementById(`${type}TableObjetosSeguro`).rows.length

    const fidelidadObjetosTableBody = document.getElementById(`${type}ObjetosTableBody`)
    const tr = document.createElement('tr')

    fidelidadObjetosTableBody.appendChild(tr)
    tr.id = `newRowFidelidadObjetoSeguro${rowCount}`
    tr.innerHTML =
        `
        <th>
            <input type="text" name="number[]"
                placeholder="...">
        </th>
        <th>
            <input type="text" name="name[]"
                placeholder="...">
        </th>
        <th>
            <input type="text" name="activity_merchant[]">
        </th>

        <th>
            <input type="text" name="limit[]"
                placeholder="...">
        </th>
        <th>
            <button id="${rowCount}" type="button" class="btn btn-danger btn-xs btn-delete-objeto"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        </th>
        `

}
$(document).on('click', '.btn-delete-objeto', function (e) {
    e.preventDefault();

    let id = $(this).attr('id');
    $('#newRowFidelidadObjetoSeguro' + id).remove()

})

function addRowObjetoSeguroV2(event, type) {
    event.preventDefault()

    let rowCount = document.getElementById(`${type}TableObjetosSeguro`).rows.length

    const fidelidadObjetosTableBody = document.getElementById(`${type}ObjetosTableBody`)
    const tr = document.createElement('tr')

    fidelidadObjetosTableBody.appendChild(tr)
    tr.id = `newRowObjetoSeguro${rowCount}`
    tr.innerHTML =
        `
        <td>
            ${rowCount}
        </td>
        <td style="text-align: center">
            <input type="text" name="name[]">
        </td>
        <td style="text-align: center">
            <input type="date" class="birthdateInput" name="birthday[]" onchange="putAge('aviacion_licenciaTableObjetosSeguro')">
        </td>
        <td style="text-align: center">
            <input type="number" step="any" name="age[]" class="ageInput">
        </td>
        <td style="text-align: center">
            <input type="number" data-money step="any" name="limit[]">
        </td>
        <td>
            <button id="${rowCount}" type="button" class="btn btn-danger btn-xs btn-delete-objeto"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        </td>
        `

}
$(document).on('click', '.btn-delete-objeto', function (e) {
    e.preventDefault();

    var id = $(this).attr('id')
    $('#newRowObjetoSeguro' + id).remove()

})
function addRowListadoPersonas(event, type) {
    event.preventDefault()

    let rowCount = document.getElementById(`${type}TableListadoPersona`).rows.length

    const tableListadoPersonas = document.getElementById(`${type}TableListadoPersonaBody`)
    const tr = document.createElement('tr')

    tableListadoPersonas.appendChild(tr)
    tr.id = `newRowListadoPersonas${rowCount}`
    tr.innerHTML =
        `
        <td >${rowCount}</td>
        <td>
            <input type="number" step="any" name="number[]" id="personAge">
        </td>
        <td>
            <input type="date" name="birthday[]" id="birthDate">
        </td>
        <td>
            <select name="sex_merchant[]" id="sex">
                <option value="m" selected>Masculino</option>
                <option value="f">Femenino</option>
            </select>
        </td>
        <td>
            <input type="text" placeholder="actividad.." name="activity_merchant[]" id="personActivity" >
        </td>
        <td>
            <button id="${rowCount}" type="button" class="btn btn-danger btn-xs btn-delete-listado-personas"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        </td>
        `

}
$(document).on('click', '.btn-delete-listado-personas', function (e) {
    e.preventDefault();

    var id = $(this).attr('id')
    $('#newRowListadoPersonas' + id).remove()

})

/*  */


/* VEHICULOS */

function addMatriculaRow(event) {
    event.preventDefault()

    let rowCount = document.getElementById(`vehiculosMatriculasTable`).rows.length

    const fidelidadObjetosTableBody = document.getElementById(`vehiculosMatriculasTableBody`)
    const tr = document.createElement('tr')

    fidelidadObjetosTableBody.appendChild(tr)
    tr.innerHTML =
        `
        <th scope="row">${rowCount}</th>
        <td>
            <input type="text" name="plate_vehicle[]" >
        </td>

        `
}


function addRowPredios(event, type) {
    event.preventDefault()

    let rowCount = document.getElementById(`${type}PrediosTable`).rows.length

    const prediosTable = document.getElementById(`${type}PrediosTableBody`)
    const tr = document.createElement('tr')

    prediosTable.appendChild(tr)
    tr.id = `newRowPredios${rowCount}`
    tr.innerHTML =
        `
        <td >${rowCount}</td>
        <td>
            <input type="text" name="province_perdios[]" placeholder="...">
        </td>
        <td>
            <input type="text" name="city_perdios[]" placeholder="...">
        </td>
        <td>
            <input type="text" name='direction_perdios[]' class="inputDirection" placeholder="...">
        </td>
        <td>
            <button id="${rowCount}" type="button" class="btn btn-danger btn-xs btn-delete-predios"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        </td>
        `
}

$(document).on('click', '.btn-delete-predios', function (e) {
    e.preventDefault()

    let id = $(this).attr('id')
    $('#newRowPredios' + id).remove()
})

/* ley y jurisdiccion */
function countryLeyJurisdiccion() {

    let countrySpan = document.getElementsByClassName('politics_country_one')
    let country2Select = document.getElementsByClassName('politics_country_two')

    let arrCountries = []
    $('[name="country_id"]').each(function () {
        arrCountries.push($(this).find('option:selected').text())
    })
    console.log(arrCountries)

    var countryFound = arrCountries.filter(function(elemento) {
        return elemento !== '';
    })[0];

    console.log(countryFound);

    for (let i = 0; i < country2Select.length; i++) {
        countrySpan[i].innerText = countryFound
        country2Select[i].innerText = countryFound
    }
}

function currencyToUSD() {
    let currentForm = document.querySelector('form[style="display: block;"')
    let currency = parseFloat(currentForm.querySelector('input[name="equivalence"]').value).toFixed(4);

    let dinero = currentForm.querySelectorAll('input[data-money]');

    if (isNaN(currency) || currency === null) {
        currency = 1;
    } else {
        dinero.forEach(element => {
            let dinero1 = parseFloat(element.value).toFixed(2);
            element.value = parseFloat(element.value *= currency).toFixed(2);

            // console.log(`Dinero antes: ${dinero1}`)
            // console.log(`Dinero multiplicado: ${dinero2}`)
        });
    }

}

//Select2 para clausulas
function clausulasSelect(class_selector = ".selectClausula", main_branch, sub_branch) {
    $(class_selector).select2({
        language: 'es',
        tags: true,
        placeholder: 'Seleccionar',
        ajax: {
            url: `${window.location.origin}/api/clausulas_selectors`,
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    main_branch: main_branch,
                    sub_branch: sub_branch,
                    q: params.term // Include search query parameter
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        };
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 0 // Set to 0 to always show options on focus
    });
    $(class_selector).append('<option value="" selected>Seleccionar</option>');
}

//Select2 para coberturas
function coberturasSelect(class_selector = ".selectCobertura", main_branch, sub_branch) {
    $(class_selector).select2({
        language: 'es',
        tags: true,
        placeholder: 'Seleccionar',
        ajax: {
            url: `${window.location.origin}/api/coberturas_selectors`,
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    main_branch: main_branch,
                    sub_branch: sub_branch,
                    q: params.term // Include search query parameter
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        };
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 0 // Set to 0 to always show options on focus
    });
    $(class_selector).append('<option value="" selected>Seleccionar</option>');
}



//add column suma asegurada / asegurable
var rowCounter = 1
var columnCounter = 1
var columnCounter2 = 7
var insertCell_sum = 8
function addColumnSumas(tableName) {

    if (columnCounter <= 5) {
        columnCounter++
        $('#btnAddColumnSumas').removeAttr('disabled')
        // Obtener referencia de la tabla
        let tabla = document.getElementById(`${tableName}SumaAseguradaTable`);

        // Crear encabezado de columna y input hidden
        let encabezado = document.createElement("th");
        let inputName = document.getElementById(`columnName${tableName}SumaAseguradaTable`).value
        encabezado.style.textAlign = 'center'
        encabezado.textContent = inputName
        // Crear el elemento input
        let input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', `th_sum_assured_${columnCounter-1}`);
        input.setAttribute('value', `${inputName}`);
        encabezado.appendChild(input)

        // Agregar encabezado de columna a la primera fila de la tabla
        let ths = tabla.querySelectorAll('th')
        tabla.rows[0].cells[ths.length - 3].insertAdjacentElement('afterend', encabezado)

        // Recorrer cada fila de la tabla y agregar una celda en la nueva columna
        for (let i = 1; i < tabla.rows.length - 1; i++) {
            let celda = tabla.rows[i].insertCell(insertCell_sum);
            celda.innerHTML = `<input onkeyup="incendioSumaAsegurableTotales(${rowCounter}, ${columnCounter2}, '${tableName}')" class="col${columnCounter2} row${rowCounter}" style="width: 95px" type="number" step="any" name="other_sum_assured_${columnCounter-1}[]">`;
            rowCounter++ 
        }
        rowCounter = 1
        let celda = tabla.rows[tabla.rows.length - 1].insertCell(insertCell_sum);
        celda.style.textAlign = 'center'
        insertCell_sum++
        
        celda.innerHTML = ` <span id="colTotal${columnCounter2}" class="slipTitle">0</span>$`;
        columnCounter2++ 


    } else {
        $('#btnAddColumnSumas').attr('disabled')
        $('#columnName').attr('disabled')
    }
}

function addColumnSumasInEdit(tableName) {
    let columnCounter2 = $('#activos_fijosSumaAseguradaTableBody').find('tr:first-child td').length - 3;

    console.log(columnCounter2);


    if (columnCounter <= 5) {
        columnCounter++
        $('#btnAddColumnSumas').removeAttr('disabled')
        // Obtener referencia de la tabla
        let tabla = document.getElementById(`${tableName}SumaAseguradaTable`);

        // Crear encabezado de columna y input hidden
        let encabezado = document.createElement("th");
        let inputName = document.getElementById(`columnName${tableName}SumaAseguradaTable`).value
        encabezado.style.textAlign = 'center'
        encabezado.textContent = inputName
        // Crear el elemento input
        let input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', `th_sum_assured_${columnCounter-1}`);
        input.setAttribute('value', `${inputName}`);
        encabezado.appendChild(input)

        // Agregar encabezado de columna a la primera fila de la tabla
        let ths = tabla.querySelectorAll('th')
        tabla.rows[0].cells[ths.length - 3].insertAdjacentElement('afterend', encabezado)

        // Recorrer cada fila de la tabla y agregar una celda en la nueva columna
        for (let i = 1; i < tabla.rows.length - 1; i++) {
            let celda = tabla.rows[i].insertCell(insertCell_sum);
            celda.innerHTML = `<input onkeyup="incendioSumaAsegurableTotales(${rowCounter}, ${columnCounter2}, '${tableName}')" class="col${columnCounter2} row${rowCounter}" style="width: 95px" type="number" step="any" name="other_sum_assured_${columnCounter-1}[]">`;
            rowCounter++ 
        }
        rowCounter = 1
        let celda = tabla.rows[tabla.rows.length - 1].insertCell(insertCell_sum);
        celda.style.textAlign = 'center'
        insertCell_sum++
        
        celda.innerHTML = ` <span id="colTotal${columnCounter2}" class="slipTitle">0</span>$`;
        columnCounter2++ 


    } else {
        $('#btnAddColumnSumas').attr('disabled')
        $('#columnName').attr('disabled')
    }
}



function removeColumnSumas(tableName) {

    if (columnCounter > 1) {
        $('#btnDeleteColumnSumas').removeAttr('disabled')

        // Obtener la referencia de la tabla
        let tabla = document.getElementById(`${tableName}SumaAseguradaTable`);

        // Obtener el número de columnas de la tabla
        let numColumnas = tabla.rows[0].cells.length - 3;

        // Recorrer todas las filas de la tabla
        for (let i = 0; i < tabla.rows.length; i++) {
            // Eliminar la celda correspondiente a la tercera columna en cada fila
            tabla.rows[i].deleteCell(numColumnas);
        }

        columnCounter--
        columnCounter2--
        insertCell_sum--
    } else {
        $('#btnDeleteColumnSumas').attr('disabled')
    }
}

function putUbicaciones() {
    let allLocationsArray = document.querySelectorAll('.inputLocation')
    let inputsDirection = document.querySelectorAll('.inputDirection')
    let newLocationsArray = []

    console.log(allLocationsArray);
    console.log(inputsDirection);

    for (const element of allLocationsArray) {
        if (element.value.length > 0) {
            newLocationsArray.push(element.value)
        }
    }

    for (let i = 0; i < newLocationsArray.length; i++) {

        inputsDirection[i].value = newLocationsArray[i]

    }


}
function putUbicaciones_edit(table) {
    const tabla = document.getElementById(`${table}`)
    let allLocationsArray = tabla.querySelectorAll('.inputLocation')
    let inputsDirection = document.querySelectorAll('.inputDirection')
    let newLocationsArray = []

    console.log(allLocationsArray);
    console.log(inputsDirection);

    for (const element of allLocationsArray) {
        if (element.value.length > 0) {
            newLocationsArray.push(element.value)
        }
    }

    for (let i = 0; i < newLocationsArray.length; i++) {

        inputsDirection[i].value = newLocationsArray[i]

    }


}