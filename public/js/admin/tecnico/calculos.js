// const form = document.querySelector('#calculosTable');

var calc_values = [document.getElementById('isd_value'),
document.getElementById('tax_value'),
document.getElementById('com_cia_value'),
document.getElementById('com_global_value'),
document.getElementById('com_bms_value'),
document.getElementById('com_bq_value')];

var subtotal = document.getElementById('subtotal');
var factor = document.getElementById('factor');
const saveCalculoBtn = document.getElementById('save_calculo');

calc_values.forEach((e) => {
    e.addEventListener('input', () => {
        updateValues();
    });
})

function updateValues() {
    let sum = 0;
    for (let i = 0; i < calc_values.length; i++) {
        const element = parseInt(calc_values[i].value);
        if (element < 0 && element > 100 || element == NaN) {
            element = 0;
        }
        sum += element;
    }
    if (sum > 100) {
        subtotal.innerText = "El valor excede el 100%"
        alert('El la sumatoria no puede exceder el 100%. Comprueba que has ingresado bien los datos y vuelve a intentarlo.');
        saveCalculoBtn.ariaDisabled = true;
    } else {
        subtotal.innerText = isNaN(parseInt(sum)) ? "0%" : `${sum} %`;
        saveCalculoBtn.ariaDisabled = false;
    }
    if (100 - sum < 0) {
        factor.innerText = "El valor excede el 100%"
    } else {
        factor.innerText = isNaN(parseInt(sum)) ? "0%" : `${100 - sum} %`;
    }
}
