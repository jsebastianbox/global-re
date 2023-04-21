var securitySelect = document.getElementById('securitySchema');
var schemeTableContainer = document.getElementById('securityContent');
var schemeTable = document.getElementsByClassName('securityContent');

var proportionalTable = document.getElementById('proportionalTable');
var nonProportionalTable = document.getElementById('noproportionalTable');

function securitySchemaOptions() {
    if (securitySelect.options[securitySelect.selectedIndex].text === "Proporcional") {
        proportionalTable.style.display = "block"
        nonProportionalTable.style.display = "none"
    } else {
        proportionalTable.style.display = "none"
        nonProportionalTable.style.display = "block"
    }
}



//Security
function securitySuma() {
    const securityTableBody = document.getElementById('securityTableBody')
    const securityTotal = document.getElementById('securityTotal')
    let inputs = securityTableBody.getElementsByTagName('input')
    let arraySuma = []
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value > 0) {
            arraySuma.push(parseFloat(inputs[i].value))
        }
    }

    let suma = arraySuma.reduce((a, b) => parseFloat(a) + parseFloat(b), 0);

    securityTotal.innerText = parseFloat(suma).toFixed(2)

}

function addRowSecurityProportional(event) {
    event.preventDefault()


    let rowCount = document.getElementById('proportionalTable').rows.length
    console.log(rowCount);
    
    const proportionalTableBody = document.getElementById('proportionalTableBody')

    const tr = document.createElement('tr')
    proportionalTableBody.appendChild(tr)

    tr.innerHTML =
        `
        <td class="security_proportional_reinsurers">
            <select class="select_reinsurer js-example-basic-single inputForm" name="proportional_name_reinsurer[]">
            </select>
        </td>
        <td>
            <input onkeyup="securitySuma()" type="number" name="proportional_porcentage[]"
                class="inputNumber" value="0" min="0">
        </td>
        <td></td>
        `

    getReinsurers('.select_reinsurer', 'RI');

}


function addRowSecurityNoProportional(event) {
    event.preventDefault()


    let rowCount = document.getElementById('noproportionalTable').rows.length
    console.log('no propor:' + rowCount)

    
    const noproportionalTableBody = document.getElementById('noproportionalTableBody')

    const tr = document.createElement('tr')
    noproportionalTableBody.appendChild(tr)

    tr.innerHTML =
        `
        <td class="security_np_reinsurers">
            <select class="select_reinsurer js-example-basic-single inputForm" name="np_name_reinsurer[]">
            </select>
        </td>
        <td>
            <input onkeyup="securitySuma()" type="number" id="securityPorcentaje1" name="np_porcentage[]"
                class="inputNumber" value="0" min="0">
        </td>
        <td>
            <input type="number" id="securityLimite" class="inputNumber" value="0" min="0" name="np_limit[]">
        </td>
        <td>
            XS
        </td>
        <td>
            <input type="number" id="securityPrioridad" class="inputNumber" name="np_priority[]" value="0" min="0">
        </td>
        <td></td>
        `

    getReinsurers('.select_reinsurer', 'RI');


}


//poner reasegurados en tabla 'oferta por reaseguros'
function putReinsurersInSecurity() {
    let reinsurersSelectedArray = document.querySelectorAll('[name="reaseguradores"]')

    let security_proportional_reinsurers = document.querySelectorAll('.security_proportional_reinsurers')
    let security_np_reinsurers = document.querySelectorAll('.security_np_reinsurers')

    for (let i = 0; i < security_proportional_reinsurers.length; i++) {
        security_proportional_reinsurers[i].innerHTML = ''
        security_proportional_reinsurers[i].innerHTML = `<input type="text" disabled="false" name="proportional_name_reinsurer[]">`
        
        security_np_reinsurers[i].innerHTML = `<input type="text" disabled="false" name="np_name_reinsurer[]">`
        security_np_reinsurers[i].innerHTML = ``
        
    }

    let reinsurersProportional = document.querySelectorAll('[name="np_name_reinsurer[]"]')
    console.log(reinsurersProportional);
    let reinsurersNoProportional = document.querySelectorAll('[name="proportional_name_reinsurer[]"]')
    console.log(reinsurersNoProportional);

    if (reinsurersSelectedArray.length > 0 && reinsurersProportional.length > 0) {
        for (let i = 0; i < reinsurersSelectedArray.length; i++) {

            reinsurersProportional[i].value = reinsurersSelectedArray[i].value
            reinsurersNoProportional[i].value = reinsurersSelectedArray[i].value
            
        }            
    }

}


function refreshTableSecurity() {

}