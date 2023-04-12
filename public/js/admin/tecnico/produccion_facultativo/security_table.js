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


    let rowCount = document.getElementById('proportionalTable').rows.length-1
    
    const proportionalTableBody = document.getElementById('proportionalTableBody')

    const tr = document.createElement('tr')
    proportionalTableBody.appendChild(tr)

    tr.innerHTML =
        `
        <td>
            ${rowCount}
        </td>
        <td>
            <select class="select_insurence js-example-basic-single inputForm" name="name_insurer[]">
            </select>
        </td>
        <td>
            <input onkeyup="securitySuma()" type="number" name="porcentage[]"
                class="inputNumber" value="0" min="0">
        </td>
        <td></td>
        `

    selectAjax('.select_insurence', 'apiinsurence')

}


function addRowSecurityNoProportional(event) {
    event.preventDefault()


    let rowCount = document.getElementById('noproportionalTable').rows.length-1
    
    const noproportionalTableBody = document.getElementById('noproportionalTableBody')

    const tr = document.createElement('tr')
    noproportionalTableBody.appendChild(tr)

    tr.innerHTML =
        `
        <td>
            ${rowCount}
        </td>
        <td>
            <select class="select_insurence js-example-basic-single inputForm" name="name_insurer[]">
            </select>
        </td>
        <td>
            <input onkeyup="securitySuma()" type="number" id="securityPorcentaje1" name="porcentage[]"
                class="inputNumber" value="0" min="0">
        </td>
        <td>
            <input type="number" id="securityLimite" class="inputNumber" value="0" min="0">
        </td>
        <td>
            <input type="text" id="securityXs" class="inputNumber" value="XS" disabled>
        </td>
        <td>
            <input type="number" id="securityPrioridad" class="inputNumber" value="0" min="0">
        </td>
        <td></td>
        `

    selectAjax('.select_insurence', 'apiinsurence')

}
