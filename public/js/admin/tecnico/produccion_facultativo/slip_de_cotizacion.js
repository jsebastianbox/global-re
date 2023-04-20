const numberFormatter = Intl.NumberFormat('en-US');
//Para dar formato a cualquier numero, usar numberFormatter.format(numero_a_dar_formato);

//Detecta si el usuario está utilizando un dispositivo móvil.
/* if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    // document.querySelector('#slip').style.display = 'none';
    let timeLeft = 5;
    alert('Lo sentimos. El contenido de esta página es demasiado grande para que se pueda visualizar en tu teléfono. Por favor, ingresa desde un ordenador.')
    var timerId = setInterval(countdown, 1000)
    function countdown() {
        if (timeLeft == -1) {
            clearTimeout(timerId);
            window.location.href = "/";
        } else {
            document.querySelector('#slip').innerHTML = `<h1>Serás redirigido a la página principal en ${timeLeft} segundos...</h1>`;
            timeLeft--;
        }
    }
    // setTimeout(() => {
    //     window.location.href = "/";
    // }, timer);
} */

var token = $('meta[name="csrf-token"]').attr('content');
function selectAjax(type, url, reference = '') {
    $(type).select2({
        language: 'es',
        tags: true,
        //minimumInputLength:1,
        placeholder: 'Seleccionar',
        type: "post",
        dataType: 'json',
        delay: 250,
        ajax: {
            url: 'http://localhost:8000/api/' + url + '/show',
            dataType: 'json',
            cache: true,
            /* success: function (data) {
                callback(data);
            }, */
            data: function (params) {
                return {
                    _token: token,
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
        //console.log(select_val);
        /* switch (select_val) {
            case "new_position":
                document.getElementById("new-position").style.display = "block";
                document.getElementById("new-contact").style.display = "none";
                break;
            case "new_contact":
                document.getElementById("new-contact").style.display = "block";
                document.getElementById("new-position").style.display = "none";
                break;
            default:
                document.getElementById("new-contact").style.display = "none";
                document.getElementById("new-position").style.display = "none";
                break;
        } */
    });
}

selectAjax('.select_country', 'apicountry');
selectAjax('.select_type_coverage', 'apitypecoverage');
selectAjax('.select_insurence', 'apiinsurence');
selectAjax('.select_cedente', 'apiinsurence');
selectAjax('.select_reinsurer', 'apireinsurer', 'RI');
selectAjax('.select_assigned', 'apiuser');



/*  SELECT SLIP  */
const slipSelect = document.getElementById('slipSelect')

/*  */

/* FORM MULTI STEP */
var currentTab = 0
const progress1 = document.querySelector('.progress1')
const progress2 = document.querySelector('.progress2')
const progress3 = document.querySelector('.progress3')
const progress4 = document.querySelector('.progress4')
const progress5 = document.querySelector('.progress5')
const progress6 = document.querySelector('.progress6')
const progress7 = document.querySelector('.progress7')
//form groups
let form_group1 = document.querySelectorAll('.form_group1')
let form_group2 = document.querySelectorAll('.form_group2')
let form_group3 = document.querySelectorAll('.form_group3')
let form_group4 = document.querySelectorAll('.form_group4')
let form_group5 = document.querySelectorAll('.form_group5')
let form_group6 = document.querySelectorAll('.form_group6')
let form_group7 = document.querySelectorAll('.form_group7')
/* function create buttons */
$(document).ready(function () {
    if (window.location.href.split('/').pop().length > 0) {
        createButtons(1)
    }
})

function createButtons(numSlip) {

    //removeButtons
    form_group1[numSlip - 1].removeChild(form_group1[numSlip - 1].lastChild)
    form_group2[numSlip - 1].removeChild(form_group2[numSlip - 1].lastChild)
    form_group3[numSlip - 1].removeChild(form_group3[numSlip - 1].lastChild)
    form_group4[numSlip - 1].removeChild(form_group4[numSlip - 1].lastChild)
    form_group5[numSlip - 1].removeChild(form_group5[numSlip - 1].lastChild)
    form_group6[numSlip - 1].removeChild(form_group6[numSlip - 1].lastChild)
    form_group7[numSlip - 1].removeChild(form_group7[numSlip - 1].lastChild)
    //delete class 'tab'
    if (form_group1[numSlip - 1].classList.contains("tab")) {
        form_group1[numSlip - 1].className -= " tab"
        form_group2[numSlip - 1].className -= " tab"
        form_group3[numSlip - 1].className -= " tab"
        form_group4[numSlip - 1].className -= " tab"
        form_group5[numSlip - 1].className -= " tab"
        form_group6[numSlip - 1].className -= " tab"
        form_group7[numSlip - 1].className -= " tab"
    }
    //add class 'tab'
    form_group1[numSlip - 1].className += " tab"
    form_group2[numSlip - 1].className += " tab"
    form_group3[numSlip - 1].className += " tab"
    form_group4[numSlip - 1].className += " tab"
    form_group5[numSlip - 1].className += " tab"
    form_group6[numSlip - 1].className += " tab"
    form_group7[numSlip - 1].className += " tab"

    //buttons container in form groups
    const div1 = document.createElement('div')
    const div2 = document.createElement('div')
    const div3 = document.createElement('div')
    const div4 = document.createElement('div')
    const div5 = document.createElement('div')
    const div6 = document.createElement('div')
    const div7 = document.createElement('div')
    div1.className = 'flexRowWrapContainer marginTop'
    div2.className = 'flexRowWrapContainer marginTop'
    div3.className = 'flexRowWrapContainer marginTop'
    div4.className = 'flexRowWrapContainer marginTop'
    div5.className = 'flexRowWrapContainer marginTop'
    div6.className = 'flexRowWrapContainer marginTop'
    div7.className = 'flexRowWrapContainer marginTop'
    form_group1[numSlip - 1].appendChild(div1)
    form_group2[numSlip - 1].appendChild(div2)
    form_group3[numSlip - 1].appendChild(div3)
    form_group4[numSlip - 1].appendChild(div4)
    form_group5[numSlip - 1].appendChild(div5)
    form_group6[numSlip - 1].appendChild(div6)
    form_group7[numSlip - 1].appendChild(div7)


    //create button 'next1'
    let next1 = document.createElement('button')
    next1.innerText = 'Siguiente'
    next1.className = 'new_entry__form--button'
    //function next1
    next1.onclick = function (event) {
        event.preventDefault()
        form_group1[numSlip - 1].style.left = '-100vw'
        form_group2[numSlip - 1].style.left = '0vw'
        progress1.classList.toggle('active')
        progress2.classList.toggle('active')
        validateForm()
        currentTab++
        window.scrollTo(0, 0);
    }
    div1.appendChild(next1)

    //create button 'back1'
    let back1 = document.createElement('button')
    back1.innerText = 'Regresar'
    back1.className = 'new_entry__form--button'
    //function back1
    back1.onclick = function (event) {
        event.preventDefault()
        form_group1[numSlip - 1].style.left = '-0vw'
        form_group2[numSlip - 1].style.left = '-100vw'
        progress1.classList.toggle('active')
        progress2.classList.toggle('active')
        validateForm()
        currentTab--
        window.scrollTo(0, 0);
    }
    div2.appendChild(back1)
    //create button 'next2'
    let next2 = document.createElement('button')
    next2.innerText = 'Siguiente'
    next2.className = 'new_entry__form--button'
    //function next2
    next2.onclick = function (event) {
        event.preventDefault()
        form_group2[numSlip - 1].style.left = '-100vw'
        form_group3[numSlip - 1].style.left = '0vw'
        progress2.classList.toggle('active')
        progress3.classList.toggle('active')
        validateForm()
        currentTab++
        window.scrollTo(0, 0);
    }
    div2.appendChild(next2)

    //create button 'back2'
    let back2 = document.createElement('button')
    back2.innerText = 'Regresar'
    back2.className = 'new_entry__form--button'
    //function back2
    back2.onclick = function (event) {
        event.preventDefault()
        form_group2[numSlip - 1].style.left = '-0vw'
        form_group3[numSlip - 1].style.left = '-100vw'
        progress2.classList.toggle('active')
        progress3.classList.toggle('active')
        validateForm()
        currentTab--
        window.scrollTo(0, 0);
    }
    div3.appendChild(back2)

    //create button 'next3'
    let next3 = document.createElement('button')
    next3.innerText = 'Siguiente'
    next3.className = 'new_entry__form--button'
    //function next3
    next3.onclick = function (event) {
        event.preventDefault()
        form_group3[numSlip - 1].style.left = '-100vw'
        form_group4[numSlip - 1].style.left = '0vw'
        progress3.classList.toggle('active')
        progress4.classList.toggle('active')
        validateForm()
        currentTab++
        window.scrollTo(0, 0);
    }
    div3.appendChild(next3)

    //create button 'back3'
    let back3 = document.createElement('button')
    back3.innerText = 'Regresar'
    back3.className = 'new_entry__form--button'
    //function back3
    back3.onclick = function (event) {
        event.preventDefault()
        form_group3[numSlip - 1].style.left = '-0vw'
        form_group4[numSlip - 1].style.left = '-100vw'
        progress3.classList.toggle('active')
        progress4.classList.toggle('active')
        validateForm()
        currentTab--
        window.scrollTo(0, 0);
    }
    div4.appendChild(back3)

    //create button 'next4'
    let next4 = document.createElement('button')
    next4.innerText = 'Siguiente'
    next4.className = 'new_entry__form--button'
    //function next4
    next4.onclick = function (event) {
        event.preventDefault()
        form_group4[numSlip - 1].style.left = '-100vw'
        form_group5[numSlip - 1].style.left = '0vw'
        progress4.classList.toggle('active')
        progress5.classList.toggle('active')
        validateForm()
        currentTab++
        window.scrollTo(0, 0);
    }
    div4.appendChild(next4)

    //create button 'back4'
    let back4 = document.createElement('button')
    back4.innerText = 'Regresar'
    back4.className = 'new_entry__form--button'
    //function back4
    back4.onclick = function (event) {
        event.preventDefault()
        form_group4[numSlip - 1].style.left = '-0vw'
        form_group5[numSlip - 1].style.left = '-100vw'
        progress4.classList.toggle('active')
        progress5.classList.toggle('active')
        validateForm()
        currentTab--
        window.scrollTo(0, 0);
    }
    div5.appendChild(back4)

    //create button 'next5'
    let next5 = document.createElement('button')
    next5.innerText = 'Siguiente'
    next5.className = 'new_entry__form--button'
    //function next5
    next5.onclick = function (event) {
        event.preventDefault()
        form_group5[numSlip - 1].style.left = '-100vw'
        form_group6[numSlip - 1].style.left = '0vw'
        progress5.classList.toggle('active')
        progress6.classList.toggle('active')
        validateForm()
        currentTab++
        window.scrollTo(0, 0);
    }
    div5.appendChild(next5)

    //create button 'back5'
    let back5 = document.createElement('button')
    back5.innerText = 'Regresar'
    back5.className = 'new_entry__form--button'
    //function back5
    back5.onclick = function (event) {
        event.preventDefault()
        form_group5[numSlip - 1].style.left = '-0vw'
        form_group6[numSlip - 1].style.left = '-100vw'
        progress5.classList.toggle('active')
        progress6.classList.toggle('active')
        /* validateForm() */
        currentTab--
        window.scrollTo(0, 0);
    }
    div6.appendChild(back5)

    //create button 'next6'
    let next6 = document.createElement('button')
    next6.innerText = 'Siguiente'
    next6.className = 'new_entry__form--button'
    //function next6
    next6.onclick = function (event) {
        event.preventDefault()
        form_group6[numSlip - 1].style.left = '-100vw'
        form_group7[numSlip - 1].style.left = '0vw'
        progress6.classList.toggle('active')
        progress7.classList.toggle('active')
        /* validateForm() */
        currentTab++
        window.scrollTo(0, 0);
    }
    div6.appendChild(next6)

    //create button 'back6'
    let back6 = document.createElement('button')
    back6.innerText = 'Regresar'
    back6.className = 'new_entry__form--button'
    //function back6
    back6.onclick = function (event) {
        event.preventDefault()
        form_group6[numSlip - 1].style.left = '-0vw'
        form_group7[numSlip - 1].style.left = '-100vw'
        progress6.classList.toggle('active')
        progress7.classList.toggle('active')
        validateForm()
        currentTab--
        window.scrollTo(0, 0);
    }
    div7.appendChild(back6)

    //button 'guardar'
    let guardar = document.createElement('button')
    guardar.innerText = 'Guardar'
    guardar.className = 'new_entry__form--button'
    guardar.type = 'submit'
    div7.appendChild(guardar)
}
/* forms slips */
const formSlipAp = document.getElementById('formSlipAp')
const formSlipVida = document.getElementById('formSlipVida')
const formSlipIncendio = document.getElementById('formSlipIncendio')
const formSlipLucro = document.getElementById('formSlipLucro')
const formSlipRobo = document.getElementById('formSlipRobo')
const formSlipSabotaje = document.getElementById('formSlipSabotaje')
const formSlipCasco = document.getElementById('formSlipCasco')
const formSlipProteccion = document.getElementById('formSlipProteccion')
const formSlipPortuaria = document.getElementById('formSlipPortuaria')
const formSlipArmadores = document.getElementById('formSlipArmadores')
const formSlipAstilleros = document.getElementById('formSlipAstilleros')
const formSlipInterno = document.getElementById('formSlipInterno')
const formSlipImportaciones = document.getElementById('formSlipImportaciones')
const formSlipExportaciones = document.getElementById('formSlipExportaciones')
const formSlipThroughput = document.getElementById('formSlipThroughput')
const formSlipCascoAereo = document.getElementById('formSlipCascoAereo')
const formSlipLicencia = document.getElementById('formSlipLicencia')
const formSlipPetrolero = document.getElementById('formSlipPetrolero')
const formSlipFianzas = document.getElementById('formSlipFianzas')
const formSlipFidelidad = document.getElementById('formSlipFidelidad')
const formSlipExtraco = document.getElementById('formSlipExtraco')
const formSlipContractual = document.getElementById('formSlipContractual')
const formSlipErroresOmisiones = document.getElementById('formSlipErroresOmisiones')
const formSlipProfesional = document.getElementById('formSlipProfesional')
const formSlipDirectores = document.getElementById('formSlipDirectores')
const formSlipMedica = document.getElementById('formSlipMedica')
const formSlipBankers = document.getElementById('formSlipBankers')
const formSlipNoFinancieros = document.getElementById('formSlipNoFinancieros')

/* Slips initial */
const Fecha = document.getElementById('Fecha')
const TipoCobertura = document.getElementById('TipoCobertura')
const PaisProductor = document.getElementById('PaisProductor')
const BrokerLocal = document.getElementById('BrokerLocal')
const Cedente = document.getElementById('Cedente')
const Sector = document.getElementById('Sector')

const Asegurado = document.getElementById('Asegurado')
const Direccion = document.getElementById('Direccion')
const Actividad = document.getElementById('Actividad')
const VigenciaDesde = document.getElementById('VigenciaDesde')
const VigenciaHasta = document.getElementById('VigenciaHasta')

/* Slip footer */
const Aclaraciones = document.getElementById('Aclaraciones')
const TasaPrima1 = document.getElementById('TasaPrima1')
const TasaPrima2 = document.getElementById('TasaPrima2')
const Deducciones1 = document.getElementById('Deducciones1')
const Deducciones2 = document.getElementById('Deducciones2')
const NofificacionSiniestros = document.getElementById('NofificacionSiniestros')
const RetencionSeguros = document.getElementById('RetencionSeguros')

const EsquemaColocacion = document.getElementById('EsquemaColocacion')
const CesionRea = document.getElementById('CesionRea')
const CondicionesRea = document.getElementById('CondicionesRea')
const SujetoA = document.getElementById('SujetoA')
const Informacion = document.getElementById('Informacion')

const LeyPais1 = document.getElementById('LeyPais1')
const LeyPais2 = document.getElementById('LeyPais2')


/* SLIP AP */

//table objetos seguro
const tableObjetosSeguro = document.getElementById('apTableObjetosSeguro')

let x = 0
function addRowObjetoSeguroV2(event) {
    event.preventDefault()

    x++

    const objetosTableBody = document.getElementById('objetosTableBody')
    const tr = document.createElement('tr')

    objetosTableBody.appendChild(tr)
    tr.id = `newRowObjetoSeguro${x}`
    tr.innerHTML =
        `
        <th>
            <input type="text" name="number[]">
        </th>
        <th>
            <input type="text" name="name[]">
        </th>
        <th>
            <input type="date" name="birthday[]">
        </th>
        <th>
            <input type="number" name="age[]">
        </th>
        <th>
            <input type="number" name="limit[]">
        </th>
        <th>
            <button id="${x}" type="button" class="btn btn-danger btn-xs btn-delete-objeto"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        </th>
        `

}

$(document).on('click', '.btn-delete-objeto', function (e) {
    e.preventDefault()

    var id = $(this).attr('id')
    $('#newRowObjetoSeguro' + id).remove()

})
//////////////////////////////////////////////////////////////// //


//function general clausulas
function addClausula(event) {
    event.preventDefault()


    const clausula_left_side = document.getElementById('clausula-left_side')
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

//function general coberturas adicionales
let coberturasA = 3
function addRowCobertura(event) {
    event.preventDefault()

    coberturasA++

    const coberturasAdicionalesTableBody = document.getElementById('coberturasAdicionalesTableBody')
    const tr = document.createElement('tr')

    coberturasAdicionalesTableBody.appendChild(tr)
    tr.id = `newRowCoberturaAdicional${coberturasA}`
    tr.innerHTML =
        `
            <td>
                ${coberturasA}
            </td>
            <td>
                <input type="text" name="roboAsaltoCobertura${coberturasA}" placeholder="...">
            </td>
            <td>
                <input type="number" name="roboAsaltoCobertura${coberturasA}a" placeholder="0">
            </td>
            <td>
                <input type="text" name="roboAsaltoCobertura${coberturasA}b" placeholder="...">
            </td>
            <td>
                <button id="${coberturasA}" type="button" class="btn btn-danger btn-xs btn-delete-cobertura"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            </td>
        `

}

$(document).on('click', '.btn-delete-cobertura', function (e) {
    e.preventDefault()

    let id = $(this).attr('id')

    $(`#newRowCoberturaAdicional${id}`).remove()
})
//Deducibles
let deducibleCounter = 1
function addDeducible(event) {
    event.preventDefault()

    const deduciblesContainer = document.getElementById('deduciblesContainer')
    const div = document.createElement('div')

    deduciblesContainer.appendChild(div)
    div.className = 'flexColumnCenterContainer'
    div.style.margin = '2rem 0'
    div.id = `newDeducible${deducibleCounter}`
    div.innerHTML =
        `
        <div class="flexRowWrapContainer" style="margin:1.2rem 0">
            <input type="text" name="description_deductible[]"
                        placeholder="Detalle..">
            <div class="labelStyleContainer">
                <p>
                    <i class="fa-solid fa-percent"></i>
                    valor del siniestro
                </p>
                <input type="number" style="max-width:95px;text-align: end;" class="inputDeducible" placeholder="..." name="sinister_value[]" min="0"   >
            </div>
            <div class="labelStyleContainer">
                <p >
                    <i class="fa-solid fa-percent"></i>
                    valor asegurado
                </p>
                <input type="number" placeholder="..." name="insured_value[]" min="0"
                    class="inputDeducible" style="max-width:95px;text-align: end;">
            </div>
            <div class="labelStyleContainer">
                <input type="number" name="minimum[]" style="text-align:end" class="inputDeducible" placeholder="USD">
                <p>
                    mínimo
                </p>
            </div>
            <textarea rows="1" type="text" name="description2_deductible[]" placeholder="..."></textarea>
        </div>
        <button id="${deducibleCounter}" type="button" class="btn btn-danger btn-xs btn-delete-deducible">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
        `

    deducibleCounter++
}
$(document).on('click', '.btn-delete-deducible', function (e) {
    e.preventDefault()
    let id = $(this).attr('id')
    $(`#newDeducible${id}`).remove()
    deducibleCounter--
})



const apIndemnizacion29 = document.getElementById('apIndemnizacion29')
//function verify if 'pago contado 'pago por instalamento'
function chooseGarantia(type) {

    if (type == 'contado') {
        $('#tableGarantia').fadeIn(100)
        $('#tableContado').hide()
    }
    if (type == 'instalamentos') {
        $('#tableContado').fadeIn(100)
        $('#tableGarantia').hide()
    }
}

//function general table contado
let instalamentoA = 0
function addInstalamento(event) {
    event.preventDefault()

    instalamentoA++
    const contadoTableBody = document.getElementById('contadoTableBody')
    const tr = document.createElement('tr')

    contadoTableBody.appendChild(tr)
    tr.id = `newInstalamento${instalamentoA}`
    tr.innerHTML =
        `
        <th style="text-align: center;">
            <input type="text" placeholder="..." name="installation[]">
        </th>
        <th style="text-align: center;">
            <button id="${instalamentoA}" type="button" class="btn btn-danger btn-xs btn-delete-instalamento"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        </th>
        `
}
$(document).on('click', '.btn-delete-instalamento', function (e) {
    e.preventDefault()
    let id = $(this).attr('id')
    $(`#newInstalamento${id}`).remove()
})

//function general table garantia pago primas
let garantiaA = 0
function addRowGarantia(event) {
    event.preventDefault()

    garantiaA++

    const garantiaTableBody = document.getElementById('garantiaTableBody')
    const tr = document.createElement('tr')

    garantiaTableBody.appendChild(tr)
    tr.id = `newRowGarantia${garantiaA}`
    tr.innerHTML =
        `
        <th style="text-align: center;">
            <input type="text" name="installation[]">
        </th>

        <th style="text-align: center;">
            <input type="number" name="num_day[]">
        </th>

        <th style="text-align: center;">
            <input type="date" name="date_payment[]">
        </th>
        <th style="text-align: center;">
            <button id="${garantiaA}" type="button" class="btn btn-danger btn-xs btn-delete-garantia"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        </th>
        `

}

$(document).on('click', '.btn-delete-garantia', function (e) {
    e.preventDefault()

    let id = $(this).attr('id')
    $(`#newRowGarantia${id}`).remove()

})
////////////////////////////////////////////////////////////////


/* SLIP VIDA */
const vidaEdadMaxAceptacion = document.getElementById('vidaEdadMaxAceptacion')
const vidaEdadMaxCancelacion = document.getElementById('vidaEdadMaxCancelacion')

const vidaBeneficiarioMuerte = document.getElementById('vidaBeneficiarioMuerte')
const vidaBeneficiarioIncapacidad = document.getElementById('vidaBeneficiarioIncapacidad')

const vidaNumAsegurado = document.getElementById('vidaNumAsegurado')
const vidaCumuloAsegurado = document.getElementById('vidaCumuloAsegurado')


const vidaMuerteCausa1 = document.getElementById('vidaMuerteCausa1')
const vidaDesmembracionAccidental1 = document.getElementById('vidaDesmembracionAccidental1')
const vidaIncapacidadTotal1 = document.getElementById('vidaIncapacidadTotal1')

const vidaRembolsoGastos1 = document.getElementById('vidaRembolsoGastos1')
const vidaGastosSepelio1 = document.getElementById('vidaGastosSepelio1')
const vidaAmbulanciaAccidente1 = document.getElementById('vidaAmbulanciaAccidente1')

const vidaMuerteCausa2 = document.getElementById('vidaMuerteCausa2')
const vidaDesmembracionAccidental2 = document.getElementById('vidaDesmembracionAccidental2')
const vidaIncapacidadTotal2 = document.getElementById('vidaIncapacidadTotal2')

const vidaRembolsoGastos2 = document.getElementById('vidaRembolsoGastos2')
const vidaGastosSepelio2 = document.getElementById('vidaGastosSepelio2')
const vidaAmbulanciaAccidente2 = document.getElementById('vidaAmbulanciaAccidente2')

const vidaBaseCobertura = document.getElementById('vidaBaseCobertura')


/* SLIP INCENDIO */
const incendioObjetoSeguro = document.getElementById('incendioObjetoSeguro')

/* function prueba() {
    let asegurada, asegurable;
    asegurada = document.getElementById('sumaAsegurada');
    asegurable = document.getElementById('sumaAsegurable');

    if (asegurada.checked) {
        asegurada.setAttribute('checked');
        asegurada.removeAttribute('checked');
        $('#sumaAseguradaContainer').show();
        $('#sumaAsegurableContainer').hide();
    } else if (asegurable.checked) {
        asegurada.removeAttribute('checked');
        asegurada.setAttribute('checked');
        $('#sumaAseguradaContainer').hide();
        $('#sumaAsegurableContainer').show();
    }
} */
/* function choose tipo 'suma' */

function chooseTypeSuma(type) {
    switch (type) {
        case 'asegurada':
            $('#sumaAseguradaContainer').show(400)
            $('#limiteIndemnizacionContainer').hide()
            $('#sumaAsegurableContainer').hide()
            $('#thSumaAsegurada').text('Suma asegurada')
            break;
        case 'asegurable':
            $('#sumaAsegurableContainer').show(400)
            $('#limiteIndemnizacionContainer').hide()
            $('#sumaAseguradaContainer').hide()
            $('#thSumaAsegurada').text('Suma asegurable')
            break;
        case 'limite':
            $('#limiteIndemnizacionContainer').show(400)
            $('#thSumaAsegurada').text('Límite de indemnización')
            $('#sumaAseguradaContainer').hide()
            $('#sumaAsegurableContainer').hide()
            break;
        default:
            break;
    }
}

//suma asegurable / table suma asegurada rama:incendio

function refreshSumaAsegurableTable(table) {
    let row = $(`#${table}SumaAseguradaTableBody`).find('tr').length

    for (let i = 0; i < row; i++) {
        incendioSumaAsegurableTotales(i, `${table}`)
    }


}

///////////////////////funciones suma//////////////////////////////////
function incendioSumaAsegurableTotalesSINUSAR(row, table) {
    const activos_fijosSumaAseguradaTable = document.getElementById(`${table}SumaAseguradaTable`)
    //sumas filas
    let rowSelect = activos_fijosSumaAseguradaTable.getElementsByClassName(`row${row}`)
    console.log(rowSelect)
    let rowTotal = activos_fijosSumaAseguradaTable.querySelector(`#rowTotal${row}`)
    console.log(rowTotal);
    let rowTotalArray = []

    for (let i = 0; i < rowSelect.length; i++) {
        if (rowSelect[i].value > 0) {
            rowTotalArray.push(parseFloat(rowSelect[i].value))
        }
    }

    let sumaTotal = rowTotalArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)

    rowTotal.innerText = numberFormatter.format(parseFloat(sumaTotal).toFixed(2))
    //sumas columnas

    let edificacionInput = activos_fijosSumaAseguradaTable.getElementsByClassName("edificacionInput")
    let contenidosInput = activos_fijosSumaAseguradaTable.getElementsByClassName("contenidosInput")
    let maquinariaEquiposInput = activos_fijosSumaAseguradaTable.getElementsByClassName("maquinariaEquiposInput")
    let mueblesInput = activos_fijosSumaAseguradaTable.getElementsByClassName("mueblesInput")
    let mercaderiasInput = activos_fijosSumaAseguradaTable.getElementsByClassName("mercaderiasInput")
    let otrosInput = activos_fijosSumaAseguradaTable.getElementsByClassName("otrosInput")
    let incendioTotalSpan = activos_fijosSumaAseguradaTable.getElementsByClassName("incendioTotalSpan")

    const incendioEdificacionTotal = activos_fijosSumaAseguradaTable.querySelector('#incendioEdificacionTotal')
    const incendioContenidosTotal = activos_fijosSumaAseguradaTable.querySelector('#incendioContenidosTotal')
    const incendioMaquinariaEquiposTotal = activos_fijosSumaAseguradaTable.querySelector('#incendioMaquinariaEquiposTotal')
    const incendioMueblesTotal = activos_fijosSumaAseguradaTable.querySelector('#incendioMueblesTotal')
    const incendioMercaderiasTotal = activos_fijosSumaAseguradaTable.querySelector('#incendioMercaderiasTotal')
    const incendioOtrosTotal = activos_fijosSumaAseguradaTable.querySelector('#incendioOtrosTotal')
    const incendioTotalTotal = activos_fijosSumaAseguradaTable.querySelector('#incendioTotalTotal')

    //totals
    let incendioEdificacionArray = []
    let incendioContenidosArray = []
    let incendioMaquinariaEquiposArray = []
    let incendioMueblesArray = []
    let incendioMercaderiasArray = []
    let incendioOtrosArray = []
    let incendioTotalArray = []

    for (let i = 0; i < edificacionInput.length; i++) {
        if (edificacionInput[i].value > 0) {
            incendioEdificacionArray.push(parseFloat(edificacionInput[i].value))
        }
    }
    for (let i = 0; i < contenidosInput.length; i++) {
        if (contenidosInput[i].value > 0) {
            incendioContenidosArray.push(parseFloat(contenidosInput[i].value))
        }
    }
    for (let i = 0; i < maquinariaEquiposInput.length; i++) {
        if (maquinariaEquiposInput[i].value > 0) {
            incendioMaquinariaEquiposArray.push(parseFloat(maquinariaEquiposInput[i].value))
        }
    }
    for (let i = 0; i < mueblesInput.length; i++) {
        if (mueblesInput[i].value > 0) {
            incendioMueblesArray.push(parseFloat(mueblesInput[i].value))
        }
    }
    for (let i = 0; i < mercaderiasInput.length; i++) {
        if (mercaderiasInput[i].value > 0) {
            incendioMercaderiasArray.push(parseFloat(mercaderiasInput[i].value))
        }
    }
    for (let i = 0; i < otrosInput.length; i++) {
        if (otrosInput[i].value > 0) {
            incendioOtrosArray.push(parseFloat(otrosInput[i].value))
        }
    }
    for (let i = 0; i < incendioTotalSpan.length; i++) {
        if (incendioTotalSpan[i].innerText > 0) {
            incendioTotalArray.push(parseFloat(incendioTotalSpan[i].innerText))
        }
    }

    let suma1 = incendioEdificacionArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma2 = incendioContenidosArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma3 = incendioMaquinariaEquiposArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma4 = incendioMueblesArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma5 = incendioMercaderiasArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma6 = incendioOtrosArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma7 = incendioTotalArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)

    incendioEdificacionTotal.innerText = numberFormatter.format(parseFloat(suma1).toFixed(2))
    incendioContenidosTotal.innerText = numberFormatter.format(parseFloat(suma2).toFixed(2))
    incendioMaquinariaEquiposTotal.innerText = numberFormatter.format(parseFloat(suma3).toFixed(2))
    incendioMueblesTotal.innerText = numberFormatter.format(parseFloat(suma4).toFixed(2))
    incendioMercaderiasTotal.innerText = numberFormatter.format(parseFloat(suma5).toFixed(2))
    incendioOtrosTotal.innerText = numberFormatter.format(parseFloat(suma6).toFixed(2))

    incendioTotalTotal.innerText = numberFormatter.format(parseFloat(suma7).toFixed(2))

    const sumaAseguradaInput = document.querySelector('.sumaAseguradaInput')

    if (sumaAseguradaBool) {
        sumaAseguradaInput.value = incendioTotalTotal.innerText
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
                <input type="text" name="location[]" style="width: 95px" placeholder="..." novalidate>
            </td>
            <td>
                <input onkeyup="incendioSumaAsegurableTotales(${rowCount}, '${type}')" type="number"
                    name="edification[]" value="0" novalidate
                    style="width: 95px" class="edificacionInput row${rowCount}">
            </td>
            <td>
                <input onkeyup="incendioSumaAsegurableTotales(${rowCount}, '${type}')" type="number"
                    name="contents[]" value="0" novalidate
                    style="width: 95px" class="contenidosInput row${rowCount}">
            </td>
            <td>
                <input onkeyup="incendioSumaAsegurableTotales(${rowCount}, '${type}')" type="number"
                    name="equipment[]" value="0" novalidate
                    style="width: 95px" class="maquinariaEquiposInput row${rowCount}">
            </td>
            <td>
                <input onkeyup="incendioSumaAsegurableTotales(${rowCount}, '${type}')" type="number"
                    name="machine[]" value="0" novalidate style="width: 95px" class="mueblesInput row${rowCount}">
            </td>
            <td>
                <input onkeyup="incendioSumaAsegurableTotales(${rowCount}, '${type}')" type="number"
                    name="commodity[]" value="0" novalidate
                    style="width: 95px" class="mercaderiasInput row${rowCount}">
            </td>
            <td>
                <input onkeyup="incendioSumaAsegurableTotales(${rowCount}, '${type}')" type="number"
                    name="other_sum_assured[]" value="0" novalidate style="width: 95px" class="otrosInput row${rowCount}">
            </td>
            <td style="text-align: center">
                <span class="slipTitle incendioTotalSpan" id="rowTotal${rowCount}">0</span>$
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
//////////////////////////////////////////////////////////////////////////////

const incendioLimiteIndem = document.getElementById('incendioLimiteIndem')
const incendioCobertura = document.getElementById('incendioCobertura')

//coberturas

function addRowCoberturaV2(event) {
    event.preventDefault()

    let rowCount = document.getElementById('coberturasAdicionalesTable').rows.length

    const coberturasAdicionalesTableBody = document.getElementById('coberturasAdicionalesTableBody')
    const tr = document.createElement('tr')

    coberturasAdicionalesTableBody.appendChild(tr)
    tr.id = `newRowCoberturaAdicional${rowCount}`
    tr.innerHTML =
        `
        <td>
            ${rowCount}
        </td>
        <td>
            <select name="description_coverage_additional[]" class="selectCobertura"></select>
        </td>
        <td>
            <input type="text" placeholder="..." name="coverage_additional_additional[]">
        </td>
        <td>
            <input type="number" placeholder="0" name="coverage_additional_usd[]">
        </td>
        <td>
            <input type="text" placeholder="..." name="coverage_additional_additional2[]">
        </td>
        <td>
            <button id="${rowCount}" type="button"  class="btn btn-danger btn-xs btn-delete-cobertura"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        </td>
        `

}

$(document).on('click', '.btn-delete-cobertura', function (e) {
    e.preventDefault()

    let id = $(this).attr('id')

    $(`#newRowCoberturaAdicional${id}`).remove()

})



//clausulas adicionales

function addRowClausula(event) {
    event.preventDefault()
    let rowCount = document.getElementById(`clausulasAdicionalesTable`).rows.length

    const clausulasAdicionalesTableBody = document.getElementById(`clausulasAdicionalesTableBody`)
    const tr = document.createElement('tr')

    clausulasAdicionalesTableBody.appendChild(tr)
    tr.id = `newRowClausulaAdicional${rowCount}`
    tr.innerHTML =
        `
            <td>
                ${rowCount}
            </td>
            <td>
                <textarea cols="3" name="description_clause_additional[]"></textarea>
            </td>
            <td>
                <input type="text" placeholder="..." name="clause_additional_additional[]">
            </td>
            <td>
                <input type="number" placeholder="0" name="clause_additional_usd[]">
            </td>
            <td>
                <input type="text" placeholder="..." name="clause_additional_additional2[]">
            </td>
            <td>
                <button id="${rowCount}" type="button" class="btn btn-danger btn-xs btn-delete-clausula"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            </td>
        `
}

$(document).on('click', '.btn-delete-clausula', function (e) {
    e.preventDefault()

    let id = $(this).attr('id')

    $(`#newRowClausulaAdicional${id}`).remove()
})
//tablas de depreciacion para pérdidas totales:
const incendioEquipoElectronico1a = document.getElementById('incendioEquipoElectronico1a')
const incendioEquipoElectronico1b = document.getElementById('incendioEquipoElectronico1b')

const incendioEquipoElectronico2a = document.getElementById('incendioEquipoElectronico2a')
const incendioEquipoElectronico2b = document.getElementById('incendioEquipoElectronico2b')

const incendioEquipoElectronico3a = document.getElementById('incendioEquipoElectronico3a')
const incendioEquipoElectronico3b = document.getElementById('incendioEquipoElectronico3b')

const incendioEquipoElectronico4a = document.getElementById('incendioEquipoElectronico4a')
const incendioEquipoElectronico4b = document.getElementById('incendioEquipoElectronico4b')

//exclusiones
const incendioExclusion1 = document.getElementById('incendioExclusion1')
const incendioExclusion2 = document.getElementById('incendioExclusion2')
const incendioExclusion3 = document.getElementById('incendioExclusion3')
const incendioExclusion4 = document.getElementById('incendioExclusion4')
const incendioExclusion5 = document.getElementById('incendioExclusion5')
const incendioExclusion6 = document.getElementById('incendioExclusion6')
const incendioExclusion7 = document.getElementById('incendioExclusion7')
const incendioExclusion8 = document.getElementById('incendioExclusion8')
const incendioExclusion9 = document.getElementById('incendioExclusion9')
const incendioExclusion10 = document.getElementById('incendioExclusion10')
const incendioExclusion11 = document.getElementById('incendioExclusion11')
const incendioExclusion12 = document.getElementById('incendioExclusion12')
const incendioExclusion13 = document.getElementById('incendioExclusion13')
const incendioExclusion14 = document.getElementById('incendioExclusion14')




/* SLIP LUCRO CESANTE INCENDIO */
const lucroCesanteObjetoSeguro = document.getElementById('lucroCesanteObjetoSeguro')

//////////////////////////////////////////////////////////////////////////////
const lucroCesanteLimiteIndem = document.getElementById('lucroCesanteLimiteIndem')
const lucroCesanteCobertura = document.getElementById('lucroCesanteCobertura')

const lucroCesanteForma = document.getElementById('lucroCesanteForma')
const lucroCesantePeriodoIndem = document.getElementById('lucroCesantePeriodoIndem')


//Cláusulas adicionales
const lucroCesanteClausulaAdicional1 = document.getElementById('lucroCesanteClausulaAdicional1')
const lucroCesanteClausulaAdicional2 = document.getElementById('lucroCesanteClausulaAdicional2')
const lucroCesanteClausulaAdicional3 = document.getElementById('lucroCesanteClausulaAdicional3')
const lucroCesanteClausulaAdicional4 = document.getElementById('lucroCesanteClausulaAdicional4')
const lucroCesanteClausulaAdicional5 = document.getElementById('lucroCesanteClausulaAdicional5')
const lucroCesanteClausulaAdicional6 = document.getElementById('lucroCesanteClausulaAdicional6')
const lucroCesanteClausulaAdicional7 = document.getElementById('lucroCesanteClausulaAdicional7')



//Exclusiones
const lucroCesanteExclusion1 = document.getElementById('lucroCesanteExclusion1')
const lucroCesanteExclusion2 = document.getElementById('lucroCesanteExclusion2')
const lucroCesanteExclusion3 = document.getElementById('lucroCesanteExclusion3')
const lucroCesanteExclusion4 = document.getElementById('lucroCesanteExclusion4')
const lucroCesanteExclusion5 = document.getElementById('lucroCesanteExclusion5')
const lucroCesanteExclusion6 = document.getElementById('lucroCesanteExclusion6')
const lucroCesanteExclusion7 = document.getElementById('lucroCesanteExclusion7')
const lucroCesanteExclusion8 = document.getElementById('lucroCesanteExclusion8')
const lucroCesanteExclusion9 = document.getElementById('lucroCesanteExclusion9')
const lucroCesanteExclusion10 = document.getElementById('lucroCesanteExclusion10')
const lucroCesanteExclusion11 = document.getElementById('lucroCesanteExclusion11')
const lucroCesanteExclusion12 = document.getElementById('lucroCesanteExclusion12')
const lucroCesanteExclusion13 = document.getElementById('lucroCesanteExclusion13')
const lucroCesanteExclusion14 = document.getElementById('lucroCesanteExclusion14')


// Deducibles

const lucroCesanteDeducible1a = document.getElementById('lucroCesanteDeducible1a')
const lucroCesanteDeducible1b = document.getElementById('lucroCesanteDeducible1b')

const lucroCesanteDeducible2a = document.getElementById('lucroCesanteDeducible2a')
const lucroCesanteDeducible2b = document.getElementById('lucroCesanteDeducible2b')

let lucroD = 2
function addLucroDeducible(event) {
    event.preventDefault()

    lucroD++

    const lucroCesanteleft_sideDeducible = document.getElementById('lucroCesanteleft_sideDeducible')
    const div = document.createElement('div')

    lucroCesanteleft_sideDeducible.appendChild(div)
    div.className = 'input_group'
    div.id = `newLucroDeducible${lucroD}`
    div.innerHTML =
        `
        <input type="text" id="lucroCesanteDeducible${lucroD}a  name="Deducible${lucroD}a" placeholder="Deducible..">

        <input type="number" id="lucroCesanteDeducible${lucroD}b" name="Deducible${lucroD}b" placeholder="No. Días">

        <button id=${lucroD} class="btn btn-danger btn-xs btn-delete-lucro-deducible" style="width:30px;height:20px" ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>

        `


}

$(document).on('click', '.btn-delete-lucro-deducible', function (e) {
    e.preventDefault()

    var id = $(this).attr('id');
    $(`#newLucroDeducible${id}`).remove()

})


//table detalle embarcaciones

function sumaCascoMaquina(row, col, typeTable) {

    //tabla
    const table = document.getElementById(`${typeTable}TableEmbarcaciones`)

    //sumas filas
    let rowSelect = table.getElementsByClassName(`row${row}`)
    let rowTotal = table.querySelector(`#rowTotal${row}`)
    let rowTotalArray = []

    for (let i = 0; i < rowSelect.length; i++) {
        if (rowSelect[i].value > 0) {
            rowTotalArray.push(parseFloat(rowSelect[i].value))
        }
    }

    let sumaTotal = rowTotalArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)

    rowTotal.innerText = parseFloat(sumaTotal).toFixed(2)

    //suma columnas
    let colSelect = table.getElementsByClassName(`col${col}`)
    let colTotal = table.querySelector(`#colTotal${col}`)
    let colTotalArray = []

    for (let i = 0; i < colSelect.length; i++) {
        if (colSelect[i].value > 0) {
            colTotalArray.push(parseFloat(colSelect[i].value))
        }
    }

    let sumaTotal2 = colTotalArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)

    colTotal.innerText = parseFloat(sumaTotal2).toFixed(2)

    //total de los total
    let colTotalTotal = table.getElementsByClassName('col3')
    console.log(colTotalTotal);
    const totalTotal = table.querySelector('#totalTotal')
    let colTotalTotalArray = []

    for (let i = 0; i < colTotalTotal.length; i++) {
        if (colTotalTotal[i].innerText > 0) {
            colTotalTotalArray.push(parseFloat(colTotalTotal[i].innerText))
        }
    }

    let sumaTotal3 = colTotalTotalArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)

    totalTotal.innerText = parseFloat(sumaTotal3).toFixed(2)

}


//addrow

function addRowEmbarcaciones(event, type) {
    event.preventDefault()

    let rowCount = document.getElementById(`${type}TableEmbarcaciones`).rows.length - 1

    const tableEmbarcacionesBody = document.getElementById(`${type}TableEmbarcacionesBody`)
    const tr = document.createElement('tr')

    tableEmbarcacionesBody.appendChild(tr)
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
            <input onkeyup="sumaCascoMaquina(${rowCount}, 1, '${type}')" type="number" step="any" class="row${rowCount} col1"
                name="shell_boat[]" value="0">
        </td>
        <td>
            <input onkeyup="sumaCascoMaquina(${rowCount}, 2, '${type}')" type="number" step="any" class="row${rowCount} col2"
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

    var id = $(this).attr('id')
    $('#newRowEmbarcaciones' + id).remove()

})

//function sumar totales table embarcaciones

function actualizarSumaEmbarcaciones(tableName) {
    const table = document.getElementById(`${tableName}TableEmbarcaciones`)

    const total1 = table.querySelector('#colTotal1')
    const total2 = table.querySelector('#colTotal2')
    const totalTotal = table.querySelector('#totalTotal')

    const col1 = table.getElementsByClassName('col1')
    const col2 = table.getElementsByClassName('col2')
    const col3 = table.getElementsByClassName('col3')

    let col1Array = []
    let col2Array = []
    let col3Array = []

    let rowsArray = []


    for (let i = 0; i < col1.length; i++) {
        col1Array.push(col1[i].value)
        col2Array.push(col2[i].value)

        rowsArray.push(parseFloat(col1[i].value) + parseFloat(col2[i].value))
        col3[i].innerText = rowsArray[i]

        col3Array.push(col3[i].innerText)

    }


    let colTotal1 = col1Array.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let colTotal2 = col2Array.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let totalFinal = col3Array.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)



    total1.innerText = parseFloat(colTotal1).toFixed(2)
    total2.innerText = parseFloat(colTotal2).toFixed(2)
    totalTotal.innerText = parseFloat(totalFinal).toFixed(2)

    $('#actualizarSuma').fadeOut(250)

}

//

const cascoBuquesCondicionesPrecedentes = document.getElementById('cascoBuquesCondicionesPrecedentes')


////////////////////////////////////////////////////////////////


/* SLIP PROTECCION E INDEMNIZACION */
const proteccionIndemnizacionFecha = document.getElementById('proteccionIndemnizacionFecha')
const proteccionIndemnizacionTipoCobertura = document.getElementById('proteccionIndemnizacionTipoCobertura')
const proteccionIndemnizacionPaisProductor = document.getElementById('proteccionIndemnizacionPaisProductor')
const proteccionIndemnizacionBrokerLocal = document.getElementById('proteccionIndemnizacionBrokerLocal')
const proteccionIndemnizacionCedente = document.getElementById('proteccionIndemnizacionCedente')
const proteccionIndemnizacionSector = document.getElementById('proteccionIndemnizacionSector')
const proteccionIndemnizacionSumaAsegurada = document.getElementById('proteccionIndemnizacionSumaAsegurada')
const proteccionIndemnizacionAreaNavegacion = document.getElementById('proteccionIndemnizacionAreaNavegacion')
const proteccionIndemnizacionLimiteIndem = document.getElementById('proteccionIndemnizacionLimiteIndem')


const proteccionIndemnizacionAsegurado = document.getElementById('proteccionIndemnizacionAsegurado')
const proteccionIndemnizacionDireccion = document.getElementById('proteccionIndemnizacionDireccion')
const proteccionIndemnizacionActividad = document.getElementById('proteccionIndemnizacionActividad')
const proteccionIndemnizacionVigenciaDesde = document.getElementById('proteccionIndemnizacionVigenciaDesde')
const proteccionIndemnizacionVigenciaHasta = document.getElementById('proteccionIndemnizacionVigenciaHasta')
const proteccionIndemnizacionObjetoSeguro = document.getElementById('proteccionIndemnizacionObjetoSeguro')
const proteccionIndemnizacionCobertura = document.getElementById('proteccionIndemnizacionCobertura')
const proteccionIndemnizacionModalidad = document.getElementById('proteccionIndemnizacionModalidad')


//table detalle embarcaciones
const proteccionIndemnizacionEmbarcacion1 = document.getElementById('proteccionIndemnizacionEmbarcacion1')
const proteccionIndemnizacionMatricula1 = document.getElementById('proteccionIndemnizacionMatricula1')
const proteccionIndemnizacionMaterial1 = document.getElementById('proteccionIndemnizacionMaterial1')
const proteccionIndemnizacionManga1 = document.getElementById('proteccionIndemnizacionManga1')
const proteccionIndemnizacionEslora1 = document.getElementById('proteccionIndemnizacionEslora1')
const proteccionIndemnizacionPuntal1 = document.getElementById('proteccionIndemnizacionPuntal1')
const proteccionIndemnizacionCasco1 = document.getElementById('proteccionIndemnizacionCasco1')
const proteccionIndemnizacionMaquina1 = document.getElementById('proteccionIndemnizacionMaquina1')

const proteccionIndemnizacionEmbarcacion2 = document.getElementById('proteccionIndemnizacionEmbarcacion2')
const proteccionIndemnizacionMatricula2 = document.getElementById('proteccionIndemnizacionMatricula2')
const proteccionIndemnizacionMaterial2 = document.getElementById('proteccionIndemnizacionMaterial2')
const proteccionIndemnizacionManga2 = document.getElementById('proteccionIndemnizacionManga2')
const proteccionIndemnizacionEslora2 = document.getElementById('proteccionIndemnizacionEslora2')
const proteccionIndemnizacionPuntal2 = document.getElementById('proteccionIndemnizacionPuntal2')
const proteccionIndemnizacionCasco2 = document.getElementById('proteccionIndemnizacionCasco2')
const proteccionIndemnizacionMaquina2 = document.getElementById('proteccionIndemnizacionMaquina2')

const proteccionIndemnizacionEmbarcacion3 = document.getElementById('proteccionIndemnizacionEmbarcacion3')
const proteccionIndemnizacionMatricula3 = document.getElementById('proteccionIndemnizacionMatricula3')
const proteccionIndemnizacionMaterial3 = document.getElementById('proteccionIndemnizacionMaterial3')
const proteccionIndemnizacionManga3 = document.getElementById('proteccionIndemnizacionManga3')
const proteccionIndemnizacionEslora3 = document.getElementById('proteccionIndemnizacionEslora3')
const proteccionIndemnizacionPuntal3 = document.getElementById('proteccionIndemnizacionPuntal3')
const proteccionIndemnizacionCasco3 = document.getElementById('proteccionIndemnizacionCasco3')
const proteccionIndemnizacionMaquina3 = document.getElementById('proteccionIndemnizacionMaquina3')
///total en function

const proteccionIndemnizacionUsos = document.getElementById('proteccionIndemnizacionUsos')



const proteccionIndemnizacionCondicionesPrecedentes = document.getElementById('proteccionIndemnizacionCondicionesPrecedentes')

////////////////////////////////////////////////////////////////

/* SLIP RC PORTUARIA */

const portuariaSector = document.getElementById('portuariaSector')
const portuariaLimiteIndem = document.getElementById('portuariaLimiteIndem')

const portuariaObjetoSeguro = document.getElementById('portuariaObjetoSeguro')
const portuariaCobertura = document.getElementById('portuariaCobertura')

//Coberturas adicionales

const portuariaCondicionesPrecedentes = document.getElementById('portuariaCondicionesPrecedentes')

////////////////////////////////////////////////////////////////

/* SLIP RC ARMADORES */

////////////////////////////////////////////////////////////////

/* SLIP RC ASTILLEROS */

////////////////////////////////////////////////////////////////

/* SLIP TRANS INTERNO */
const internoObjetoSeguro = document.getElementById('internoObjetoSeguro')
const internoTrayectoAsegurado = document.getElementById('internoTrayectoAsegurado')
const internoClase = document.getElementById('internoClase')
const internoTipoEmbalaje = document.getElementById('internoTipoEmbalaje')
const internoTipoUnificador = document.getElementById('internoTipoUnificador')
const internoMedioTransporte = document.getElementById('internoMedioTransporte')

const internoMovilizacion = document.getElementById('internoMovilizacion')
const internoLimiteEmbarque = document.getElementById('internoLimiteEmbarque')
const internoFechaSalida = document.getElementById('internoFechaSalida')
const internoFechaLlegada = document.getElementById('internoFechaLlegada')
const internoCobertura = document.getElementById('internoCobertura')

/* SLIP TRANS EXPORTACIONES */
const exportacionesObjetoSeguro = document.getElementById('exportacionesObjetoSeguro')
const exportacionesTrayectoAsegurado = document.getElementById('exportacionesTrayectoAsegurado')
const exportacionesClase = document.getElementById('exportacionesClase')
const exportacionesTipoEmbalaje = document.getElementById('exportacionesTipoEmbalaje')
const exportacionesTipoUnificador = document.getElementById('exportacionesTipoUnificador')
const exportacionesMedioTransporte = document.getElementById('exportacionesMedioTransporte')

const exportacionesMovilizacion = document.getElementById('exportacionesMovilizacion')
const exportacionesLimiteEmbarque = document.getElementById('exportacionesLimiteEmbarque')
const exportacionesFechaSalida = document.getElementById('exportacionesFechaSalida')
const exportacionesFechaLlegada = document.getElementById('exportacionesFechaLlegada')
const exportacionesCobertura = document.getElementById('exportacionesCobertura')

//Coberturas adicionales

//Cláusulas adicionales

//Exclusiones

//Deducibles

/* SLIP TRANS IMPORTANCIONES */
const importacionesObjetoSeguro = document.getElementById('importacionesObjetoSeguro')
const importacionesTrayectoAsegurado = document.getElementById('importacionesTrayectoAsegurado')
const importacionesClase = document.getElementById('importacionesClase')
const importacionesTipoEmbalaje = document.getElementById('importacionesTipoEmbalaje')
const importacionesTipoUnificador = document.getElementById('importacionesTipoUnificador')
const importacionesMedioTransporte = document.getElementById('importacionesMedioTransporte')

const importacionesMovilizacion = document.getElementById('importacionesMovilizacion')
const importacionesLimiteEmbarque = document.getElementById('importacionesLimiteEmbarque')
const importacionesFechaSalida = document.getElementById('importacionesFechaSalida')
const importacionesFechaLlegada = document.getElementById('importacionesFechaLlegada')
const importacionesCobertura = document.getElementById('importacionesCobertura')

//Coberturas adicionales


//Cláusulas adicionales

//Exclusiones


//Deducibles

////////////////////////////////////////////////////////////////

/* SLIP TRANS THROUGHPUT_TRANSPORTE */
const throughputObjetoSeguro = document.getElementById('throughputObjetoSeguro')
const throughputTrayectoAsegurado = document.getElementById('throughputTrayectoAsegurado')
const throughputClase = document.getElementById('throughputClase')
const throughputTipoEmbalaje = document.getElementById('throughputTipoEmbalaje')
const throughputTipoUnificador = document.getElementById('throughputTipoUnificador')

const throughputMedioTransporte = document.getElementById('throughputMedioTransporte')
const throughputMovilizacion = document.getElementById('throughputMovilizacion')
const throughputBaseValoracion = document.getElementById('throughputBaseValoracion')
const throughputComision = document.getElementById('throughputComision')
const throughputCondiciones = document.getElementById('throughputCondiciones')

//Limite por embarque
const throughputAlmacenamiento1a = document.getElementById('throughputAlmacenamiento1a')
const throughputAlmacenamiento1b = document.getElementById('throughputAlmacenamiento1b')

const throughputTransporte1a = document.getElementById('throughputTransporte1a')
const throughputTransporte1b = document.getElementById('throughputTransporte1b')
//
let thA = 1
function addThroughputAlmacenamiento(event) {
    event.preventDefault()

    thA++

    const throughputleft_sideAlmacenamiento = document.getElementById('throughputleft_sideAlmacenamiento')

    const h5 = document.createElement('h5')
    h5.innerHTML = `Almacenamiento ${thA}:`
    h5.className = 'slipTitle'
    throughputleft_sideAlmacenamiento.appendChild(h5)

    const div1 = document.createElement('div1')
    const div2 = document.createElement('div2')

    throughputleft_sideAlmacenamiento.appendChild(div1)
    div1.className = 'input_group'
    div1.innerHTML =
        `
        <label for="throughputAlmacenamiento${thA}a">
            <i class="fa-solid fa-box"></i>
            Valor en USD:
        </label>
        <input type="number" id="throughputAlmacenamiento${thA}a" name="throughputAlmacenamiento${thA}a" class="inputNumber" placeholder="0">
        `

    throughputleft_sideAlmacenamiento.appendChild(div2)
    div2.className = 'input_group'
    div2.innerHTML =
        `
        <label for="throughputAlmacenamiento${thA}b">
            <i class="fa-solid fa-box"></i>
            Descripción:
        </label>
        <input type="text" id="throughputAlmacenamiento${thA}b" name="throughputAlmacenamiento${thA}b" placeholder="...">
        `


}

//
let thB = 1
function addThroughputTransporte(event) {
    event.preventDefault()

    thB++

    const throughputleft_sideTransporte = document.getElementById('throughputleft_sideTransporte')

    const h5 = document.createElement('h5')
    h5.innerHTML = `Transporte ${thB}:`
    h5.className = 'slipTitle'
    throughputleft_sideTransporte.appendChild(h5)

    const div1 = document.createElement('div1')
    const div2 = document.createElement('div2')

    throughputleft_sideTransporte.appendChild(div1)
    div1.className = 'input_group'
    div1.innerHTML =
        `
        <label for="throughputTransporte${thB}a">
            <i class="fa-solid fa-box"></i>
            Valor en USD:
        </label>
        <input type="number" id="throughputTransporte${thB}a" name="throughputTransporte${thB}a" class="inputNumber" placeholder="0">
        `

    throughputleft_sideTransporte.appendChild(div2)
    div2.className = 'input_group'
    div2.innerHTML =
        `
        <label for="throughputTransporte${thB}b">
            <i class="fa-solid fa-box"></i>
            Descripción:
        </label>
        <input type="text" id="throughputTransporte${thB}b" name="throughputTransporte${thB}b" placeholder="...">
        `


}

const throughputCondicionesPrecedentes = document.getElementById('throughputCondicionesPrecedentes')



/* SLIP TRANS CASCO AÉREO */
const cascoAereoObjetoSeguro = document.getElementById('cascoAereoObjetoSeguro')
const cascoAereoUsos = document.getElementById('cascoAereoUsos')

const cascoAereoGeografico = document.getElementById('cascoAereoGeografico')


let aereoA = 6
function addRowCascoAereoCobertura(event) {
    event.preventDefault()

    aereoA++

    const cascoAereoCoberturasAdicionalesTableBody = document.getElementById('cascoAereoCoberturasAdicionalesTableBody')
    const tr = document.createElement('tr')

    cascoAereoCoberturasAdicionalesTableBody.appendChild(tr)
    tr.id = `newRowCascoAereoCoberturaAdicional${aereoA}`
    tr.innerHTML =
        `
            <td>
                ${aereoA}
            </td>
            <td>
                <input type="text" id="cascoAereoCobertura${aereoA}" name="Cobertura${aereoA}" placeholder="...">
            </td>
            <td>
                <input type="text" id="cascoAereoCobertura${aereoA}a" name="Cobertura${aereoA}a" placeholder="...">
            </td>
            <td>
                <input type="text" id="cascoAereoCobertura${aereoA}b" name="Cobertura${aereoA}b" placeholder="...">
            </td>
            <td>
                <button id="${aereoA}" type="button" class="btn btn-danger btn-xs btn-delete-aereo-cobertura"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            </td>
        `

}

$(document).on('click', '.btn-delete-aereo-cobertura', function (e) {
    e.preventDefault()

    let id = $(this).attr('id')
    console.log(id);

    $(`#newRowCascoAereoCoberturaAdicional${id}`).remove()
})

//clausulas adicionales
let aereoB = 26
function addCascoAereoClausula(event) {
    event.preventDefault()

    aereoB++

    const cascoAereoleft_sideClausula = document.getElementById('cascoAereoleft_sideClausula')
    const div = document.createElement('div')

    cascoAereoleft_sideClausula.appendChild(div)

    div.className = 'input_group'
    div.innerHTML =
        `
        <label for="cascoAereoClausulaAdicional${aereoB}">
            <i class="fa fa-search"></i>
            Cláusula adicional:
        </label>

        <input type="text" id="cascoAereoClausulaAdicional${aereoB}" name="description_clause_aditional[]" placeholder="...">

        `
}

//Exclusiones
const cascoAereoExclusion1 = document.getElementById('cascoAereoExclusion1')


let aereoC = 2
function addCascoAereoExclusion(event) {
    event.preventDefault()

    aereoC++

    const cascoAereoleft_sideExclusion = document.getElementById('cascoAereoleft_sideExclusion')
    const div = document.createElement('div')

    cascoAereoleft_sideExclusion.appendChild(div)
    div.className = 'input_group'
    div.innerHTML =
        `
        <label for="cascoAereoExclusion${aereoC}">
            <i class="fa fa-search"></i>
            Exclusión ${aereoC}:
        </label>

        <input type="text" id="cascoAereoExclusion${aereoC}" name="description_exclusion[]" placeholder="...">
        `
}


////////////////////////////////////////////////////////////////

/* SLIP PÉRDIDA DE LICENCIA */
const licenciaGeografico = document.getElementById('licenciaGeografico')
const licenciaUsos = document.getElementById('licenciaUsos')
const licenciaCobertura = document.getElementById('licenciaCobertura')

//table objetos seguro
const licenciaTableObjetosSeguro = document.getElementById('licenciaTableObjetosSeguro')

const licenciaObjetoNumero = document.getElementById('licenciaObjetoNumero')
const licenciaObjetoNombre = document.getElementById('licenciaObjetoNombre')
const licenciaObjetoFecha = document.getElementById('licenciaObjetoFecha')
const licenciaObjetoEdad = document.getElementById('licenciaObjetoEdad')
const licenciaObjetoLimite = document.getElementById('licenciaObjetoLimite')

function addRowObjetoSeguroV2(event) {
    event.preventDefault()

    let rowCount = document.getElementById(`tableObjetosSeguro`).rows.length

    const fidelidadObjetosTableBody = document.getElementById(`objetosTableBody`)
    const tr = document.createElement('tr')

    fidelidadObjetosTableBody.appendChild(tr)
    tr.id = `newRowObjetoSeguro${rowCount}`
    tr.innerHTML =
        `
        <td>
            <input type="text" name="number[]" placeholder="...">
        </td>
        <td>
            <input type="text" name="name[]" placeholder="...">
        </td>
        <td style="text-align: center">
            <input type="date" name="birthday[]">
        </td>
        <td style="text-align: center">
            <input type="number" name="age[]">
        </td>
        <td>
            <input type="text" name="limit[]" placeholder="...">
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



////////////////////////////////////////////////////////////////

/* SLIP PETROLERO  */

//suma asegurable / table suma asegurada rama:energia
const energiaSumaAsegurable = document.getElementById('energiaSumaAsegurable')

const energiaUbicacion1 = document.getElementById('energiaUbicacion1')
const energiaEdificacion1 = document.getElementById('energiaEdificacion1')
const energiaContenidos1 = document.getElementById('energiaContenidos1')
const energiaMaquinariaEquipos1 = document.getElementById('energiaMaquinariaEquipos1')
const energiaMuebles1 = document.getElementById('energiaMuebles1')
const energiaMercaderias1 = document.getElementById('energiaMercaderias1')
const energiaOtros1 = document.getElementById('energiaOtros1')
let energiaTotal1 = document.getElementById('energiaTotal1')

const energiaUbicacion2 = document.getElementById('energiaUbicacion2')
const energiaEdificacion2 = document.getElementById('energiaEdificacion2')
const energiaContenidos2 = document.getElementById('energiaContenidos2')
const energiaMaquinariaEquipos2 = document.getElementById('energiaMaquinariaEquipos2')
const energiaMuebles2 = document.getElementById('energiaMuebles2')
const energiaMercaderias2 = document.getElementById('energiaMercaderias2')
const energiaOtros2 = document.getElementById('energiaOtros2')
let energiaTotal2 = document.getElementById('energiaTotal2')

const energiaUbicacion3 = document.getElementById('energiaUbicacion3')
const energiaEdificacion3 = document.getElementById('energiaEdificacion3')
const energiaContenidos3 = document.getElementById('energiaContenidos3')
const energiaMaquinariaEquipos3 = document.getElementById('energiaMaquinariaEquipos3')
const energiaMuebles3 = document.getElementById('energiaMuebles3')
const energiaMercaderias3 = document.getElementById('energiaMercaderias3')
const energiaOtros3 = document.getElementById('energiaOtros3')
let energiaTotal3 = document.getElementById('energiaTotal3')

//total
const energiaUbicacionTotal = document.getElementById('energiaUbicacionTotal')
const energiaEdificacionTotal = document.getElementById('energiaEdificacionTotal')
const energiaContenidosTotal = document.getElementById('energiaContenidosTotal')
const energiaMaquinariaEquiposTotal = document.getElementById('energiaMaquinariaEquiposTotal')
const energiaMueblesTotal = document.getElementById('energiaMueblesTotal')
const energiaMercaderiasTotal = document.getElementById('energiaMercaderiasTotal')
const energiaOtrosTotal = document.getElementById('energiaOtrosTotal')
let energiaTotalTotal = document.getElementById('energiaTotalTotal')
///////////////////////funciones suma//////////////////////////////////
function energiaSumaAsegurableTotales() {
    // total columna ubicacion
    /* let sumaUbicacion = parseFloat(energiaUbicacion1.value) + parseFloat(energiaUbicacion2.value) + parseFloat(energiaUbicacion3.value)
    energiaUbicacionTotal.innerText = parseFloat(sumaUbicacion).toFixed(2) */
    // total columna Edificacion
    let sumaEdificacion = parseFloat(energiaEdificacion1.value) + parseFloat(energiaEdificacion2.value) + parseFloat(energiaEdificacion3.value)
    energiaEdificacionTotal.innerText = parseFloat(sumaEdificacion).toFixed(2)
    // total columna Contenidos
    let sumaContenidos = parseFloat(energiaContenidos1.value) + parseFloat(energiaContenidos2.value) + parseFloat(energiaContenidos3.value)
    energiaContenidosTotal.innerText = parseFloat(sumaContenidos).toFixed(2)
    // total columna MaquinariaEquipos
    let sumaMaquinariaEquipos = parseFloat(energiaMaquinariaEquipos1.value) + parseFloat(energiaMaquinariaEquipos2.value) + parseFloat(energiaMaquinariaEquipos3.value)
    energiaMaquinariaEquiposTotal.innerText = parseFloat(sumaMaquinariaEquipos).toFixed(2)
    // total columna Muebles
    let sumaMuebles = parseFloat(energiaMuebles1.value) + parseFloat(energiaMuebles2.value) + parseFloat(energiaMuebles3.value)
    energiaMueblesTotal.innerText = parseFloat(sumaMuebles).toFixed(2)
    // total columna Mercaderias
    let sumaMercaderias = parseFloat(energiaMercaderias1.value) + parseFloat(energiaMercaderias2.value) + parseFloat(energiaMercaderias3.value)
    energiaMercaderiasTotal.innerText = parseFloat(sumaMercaderias).toFixed(2)
    // total columna Otros
    let sumaOtros = parseFloat(energiaOtros1.value) + parseFloat(energiaOtros2.value) + parseFloat(energiaOtros3.value)
    energiaOtrosTotal.innerText = parseFloat(sumaOtros).toFixed(2)

    //total fila 1,2,3
    let sumaTotal1 = parseFloat(energiaEdificacion1.value) + parseFloat(energiaContenidos1.value) + parseFloat(energiaMaquinariaEquipos1.value) + parseFloat(energiaMuebles1.value) + parseFloat(energiaMercaderias1.value) + parseFloat(energiaOtros1.value)
    energiaTotal1.innerText = parseFloat(sumaTotal1).toFixed(2)
    let sumaTotal2 = parseFloat(energiaEdificacion2.value) + parseFloat(energiaContenidos2.value) + parseFloat(energiaMaquinariaEquipos2.value) + parseFloat(energiaMuebles2.value) + parseFloat(energiaMercaderias2.value) + parseFloat(energiaOtros2.value)
    energiaTotal2.innerText = parseFloat(sumaTotal2).toFixed(2)
    let sumaTotal3 = parseFloat(energiaEdificacion3.value) + parseFloat(energiaContenidos3.value) + parseFloat(energiaMaquinariaEquipos3.value) + parseFloat(energiaMuebles3.value) + parseFloat(energiaMercaderias3.value) + parseFloat(energiaOtros3.value)
    energiaTotal3.innerText = parseFloat(sumaTotal3).toFixed(2)

    // total del total de filas
    let sumaTotal = parseFloat(energiaTotal1.innerText) + parseFloat(energiaTotal2.innerText) + parseFloat(energiaTotal3.innerText)
    energiaTotalTotal.innerText = parseFloat(sumaTotal).toFixed(2)
}


let petroleroB = 18
function addRowPetroleroCobertura(event) {
    event.preventDefault()

    petroleroB++

    const petroleroCoberturasAdicionalesTableBody = document.getElementById('petroleroCoberturasAdicionalesTableBody')
    const tr = document.createElement('tr')

    petroleroCoberturasAdicionalesTableBody.appendChild(tr)
    tr.id = `newRowPetroleroCoberturaAdicional${petroleroB}`
    tr.innerHTML =
        `
            <td>
                ${petroleroB}
            </td>
            <td>
                <input type="text" id="petroleroCobertura${petroleroB}" name="Cobertura${petroleroB}">
            </td>
            <td>
                <input type="number" id="petroleroCobertura${petroleroB}a" name="Cobertura${petroleroB}a">
            </td>
            <td>
                <input type="text" id="petroleroCobertura${petroleroB}b" name="Cobertura${petroleroB}b">
            </td>
            <td>
                <button id="${petroleroB}" type="button" class="btn btn-danger btn-xs btn-delete-petrolero-cobertura"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            </td>
        `

}

$(document).on('click', '.btn-delete-petrolero-cobertura', function (e) {
    e.preventDefault()

    let id = $(this).attr('id')

    $(`#newRowPetroleroCoberturaAdicional${id}`).remove()

})



let petroleroC = 14
function addPetroleroExclusion(event) {
    event.preventDefault()

    petroleroC++

    const petroleroleft_sideExclusion = document.getElementById('petroleroleft_sideExclusion')
    const div = document.createElement('div')

    petroleroleft_sideExclusion.appendChild(div)
    div.className = 'input_group'
    div.innerHTML =
        `
        <label for="petroleroExclusion${petroleroC}">
            <i class="fa fa-search"></i>
            Exclusión:
        </label>

        <input type="text" id="petroleroExclusion${petroleroC}" name="description_exclusion[]" placeholder="...">
        `
}

//Deducibles
/* SLIP FIANZAS */



let fianzasA = 2
function addRowFianzasCobertura(event) {
    event.preventDefault()

    fianzasA++

    const fianzasCoberturasAdicionalesTableBody = document.getElementById('fianzasCoberturasAdicionalesTableBody')
    const tr = document.createElement('tr')

    fianzasCoberturasAdicionalesTableBody.appendChild(tr)
    tr.id = `newRowFianzasCoberturaAdicional${fianzasA}`
    tr.innerHTML =
        `
            <td>
                ${fianzasA}
            </td>
            <td>
                <input type="text" id="fianzasCobertura${fianzasA}" name="Cobertura${fianzasA}" placeholder="...">
            </td>
            <td>
                <input type="number" id="fianzasCobertura${fianzasA}a" name="Cobertura${fianzasA}a" placeholder="0">
            </td>
            <td>
                <input type="text" id="fianzasCobertura${fianzasA}b" name="Cobertura${fianzasA}b" placeholder="...">
            </td>
            <td>
                <button id="${fianzasA}" type="button" class="btn btn-danger btn-xs btn-delete-fianzas-cobertura"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            </td>
        `

}

$(document).on('click', '.btn-delete-fianzas-cobertura', function (e) {
    e.preventDefault()

    let id = $(this).attr('id')

    $(`#newRowFianzasCoberturaAdicional${id}`).remove()
})


let fianzasB = 3
function addFianzasClausula(event) {
    event.preventDefault()

    fianzasB++

    const fianzasleft_sideClausula = document.getElementById('fianzasleft_sideClausula')
    const div = document.createElement('div')

    fianzasleft_sideClausula.appendChild(div)

    div.className = 'input_group'
    div.innerHTML =
        `
        <label for="fianzasClausulaAdicional${fianzasB}">
            <i class="fa fa-search"></i>
            Cláusula adicional ${fianzasB}:
        </label>

        <input type="text" id="fianzasClausulaAdicional${fianzasB}" name="description_clause_aditional[]" placeholder="...">

        `
}



let fianzasC = 3
function addFianzasExclusion(event) {
    event.preventDefault()

    fianzasC++

    const fianzasleft_sideExclusion = document.getElementById('fianzasleft_sideExclusion')
    const div = document.createElement('div')

    fianzasleft_sideExclusion.appendChild(div)
    div.className = 'input_group'
    div.innerHTML =
        `
        <label for="fianzasExclusion${fianzasC}">
            <i class="fa fa-search"></i>
            Exclusión ${fianzasC}:
        </label>

        <input type="text" id="fianzasExclusion${fianzasC}" name="description_exclusion[]" placeholder="...">
        `
}



/* SLIP FIDELIDAD */


//table objetos seguro
const fidelidadTableObjetosSeguro = document.getElementById('fidelidadTableObjetosSeguro')

const fidelidadObjetoNumero = document.getElementById('fidelidadObjetoNumero')
const fidelidadObjetoNombre = document.getElementById('fidelidadObjetoNombre')
const fidelidadObjetoFecha = document.getElementById('fidelidadObjetoFecha')
const fidelidadObjetoEdad = document.getElementById('fidelidadObjetoEdad')
const fidelidadObjetoLimite = document.getElementById('fidelidadObjetoLimite')

let fidelidadA = 0
function addRowFidelidadObjetoSeguro(event) {
    event.preventDefault()

    fidelidadA++

    const fidelidadObjetosTableBody = document.getElementById('fidelidadObjetosTableBody')
    const tr = document.createElement('tr')

    fidelidadObjetosTableBody.appendChild(tr)
    tr.id = `newRowFidelidadObjetoSeguro${fidelidadA}`
    tr.innerHTML =
        `
        <th style="text-align: center">
            <input type="text" name="number[]" placeholder="...">
        </th>
        <th style="text-align: center">
            <input type="text" name="name[]" placeholder="...">
        </th>
        <th style="text-align: center">
            <input type="text" name="activity[]">
        </th>

        <th style="text-align: center">
            <input type="text" name="limit[]" placeholder="...">
        </th>
        <th>
            <button id="${fidelidadA}" type="button" class="btn btn-danger btn-xs btn-delete-fidelidad-objeto"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        </th>
        `

}
$(document).on('click', '.btn-delete-fidelidad-objeto', function (e) {
    e.preventDefault();

    var id = $(this).attr('id');
    $('#newRowFidelidadObjetoSeguro' + id).remove()

})



function addRowExclusion(event) {
    event.preventDefault()

    let rowCount = document.getElementById('exclusionesAdicionalesTable').rows.length

    const exclusionesAdicionalesTableBody = document.getElementById('exclusionesAdicionalesTableBody')
    const tr = document.createElement('tr')

    exclusionesAdicionalesTableBody.appendChild(tr)
    tr.id = `newRowExclusion${rowCount}`
    tr.innerHTML =
        `
        <td>
            ${rowCount}
        </td>
        <td>
            <textarea name="description_exclusion_additional[]"></textarea>
        </td>
        <td>
            <input type="text" placeholder="..." name="exclusion_additional_additional[]">
        </td>
        <td>
            <input type="number" placeholder="0" name="exclusion_additional_usd[]">
        </td>
        <td>
            <input type="text" placeholder="..." name="exclusion_additional_additional2[]">
        </td>
        <td>
            <button id="${rowCount}" type="button" class="btn btn-danger btn-xs btn-delete-exclusion"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        </td>
        `
}

$(document).on('click', '.btn-delete-exclusion', function (e) {
    e.preventDefault()

    let id = $(this).attr('id')

    $(`#newRowExclusion${id}`).remove()

})


/* nuevos slips */

//suma asegurada
const coberturaSumaAsegurada1 = document.getElementById('coberturaSumaAsegurada1')
const coberturaSumaAsegurada2 = document.getElementById('coberturaSumaAsegurada2')
const coberturaSumaAsegurada3 = document.getElementById('coberturaSumaAsegurada3')
const coberturaSumaAsegurada4 = document.getElementById('coberturaSumaAsegurada4')
const coberturaSumaAsegurada5 = document.getElementById('coberturaSumaAsegurada5')
const coberturaSumaAsegurada6 = document.getElementById('coberturaSumaAsegurada6')
//total
const coberturaSumaTotal = document.getElementById('coberturaSumaTotal')

function sumaAseguradaV2() {

    let suma = parseFloat(coberturaSumaAsegurada1.value) + parseFloat(coberturaSumaAsegurada2.value) + parseFloat(coberturaSumaAsegurada3.value) + parseFloat(coberturaSumaAsegurada4.value) + parseFloat(coberturaSumaAsegurada5.value) + parseFloat(coberturaSumaAsegurada6.value)

    coberturaSumaTotal.innerText = parseFloat(suma).toFixed(2)
}

function addEndosoAdicional(event) {
    event.preventDefault()

    const endososTableBody = document.getElementById('endososTableBody')
    const tr = document.createElement('tr')

    endososTableBody.appendChild(tr)
    tr.innerHTML =
        `
            <td>
                <textarea name=""></textarea>
            </td>
            <td>
                <input type="number" placeholder="0"
                    name="">
            </td>
            <td>
            <input type="text" placeholder="..."
                    name="">
            </td>
            <td>

            </td>
        `

}

//objeto del seguro table
const objetoSeguroSuma1 = document.getElementById('objetoSeguroSuma1')
const objetoSeguroSuma2 = document.getElementById('objetoSeguroSuma2')
const objetoSeguroSuma3 = document.getElementById('objetoSeguroSuma3')

//total
const objetoSeguroSumaTotal = document.getElementById('objetoSeguroSumaTotal')

function objetoSeguroSuma(event) {
    event.preventDefault()

    let suma = parseFloat(objetoSeguroSuma1.value) + parseFloat(objetoSeguroSuma2.value) + parseFloat(objetoSeguroSuma3.value)

    objetoSeguroSumaTotal.innerText = parseFloat(suma).toFixed(2)
}

//Suma asegurada version 3
const sumaAsegurada1 = document.getElementById('sumaAsegurada1')
const sumaAsegurada2 = document.getElementById('sumaAsegurada2')
const sumaAsegurada3a = document.getElementById('sumaAsegurada3a')
const sumaAsegurada3b = document.getElementById('sumaAsegurada3b')
//total
const sumaAseguradaTotal = document.getElementById('sumaAseguradaTotal')

function sumaAseguradaV3() {
    let suma = parseFloat(sumaAsegurada1.value) + parseFloat(sumaAsegurada2.value) + (parseFloat(sumaAsegurada3a.value) * parseFloat(sumaAsegurada3b.value))

    sumaAseguradaTotal.innerText = parseFloat(suma).toFixed(2)
}

//Limite Indemnizacion
const limiteIndem1 = document.getElementById('limiteIndem1')
const limiteIndem2 = document.getElementById('limiteIndem2')
const limiteIndem3 = document.getElementById('limiteIndem3')
//total
const limiteIndemTotal = document.getElementById('limiteIndemTotal')

function limiteIndemTableSuma() {
    let suma = parseFloat(limiteIndem1.value) + parseFloat(limiteIndem2.value) + parseFloat(limiteIndem3.value)

    limiteIndemTotal.innerText = parseFloat(suma).toFixed(2)
}



function validateForm() {
    //errors
    const errors = document.getElementById('errors')
    let messages = []
    // This function deals with validation of the form fields
    var x, y, i = true;
    x = document.getElementsByClassName("tab");
    // variable quantity of inputs
    y = x[currentTab].getElementsByTagName("input");
    let e = y.length
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            //error's count
        }

        if (y[i].value.length > 0) {
            // erase an "invalid" class to the field:
            y[i].className -= " invalid";
            //error's count
            e--
        }
    }

    if (e > 0) {
        messages.push(`Cuidado! te dejaste ${e} campo(s) sin llenar`)
        errors.innerHTML = ""
        errors.style.marginTop = '2rem'
        messages.forEach(message => {
            const li = document.createElement('li')
            li.innerText = message
            li.style.color = 'red'
            errors.appendChild(li)
        })
    }

}


$(document).on('click', '.new_entry__form', function (e) {
    e.preventDefault()

    /* Submit form */
    let form_id = $(this).attr('id')
    if (currentTab == 6 && e.target.innerText === "GUARDAR") {
        document.getElementById(`${form_id}`).submit()
    }

    /* notificacion opciones */
    if (e.target.innerText === "Por días") {
        $('#notificacionOpcion1').fadeIn(300)
        $('#notificacionOpcion2').fadeOut(0)
        $('#notificacionOpcion3').fadeOut(0)
    }
    if (e.target.innerText === "Claúsula de Control de Reclamos") {
        $('#notificacionOpcion1').fadeOut(0)
        $('#notificacionOpcion2').fadeIn(300)
        $('#notificacionOpcion3').fadeOut(0)
    }
    if (e.target.innerText === "Cláusula de Cooperación de Reclamos") {
        $('#notificacionOpcion1').fadeOut(0)
        $('#notificacionOpcion2').fadeOut(0)
        $('#notificacionOpcion3').fadeIn(300)
    }
})

/* notificacion opciones */
function notificacionOpciones(event) {
    event.preventDefault()


}

//tabla respaldo de reaseguros
function addRowRespaldo(event) {

    event.preventDefault()

    let rowCount = document.getElementById('respaldoTable').rows.length

    const respaldoTableBody = document.getElementById('respaldoTableBody')
    const tr = document.createElement('tr')

    respaldoTableBody.appendChild(tr)
    tr.id = `newRowRespaldo${rowCount}`
    tr.innerHTML =
        `
        <td>
            <input type="text" placeholder="..." name="respaldo_reasegurador[]">
        </td>
        <td>
            <input type="number" step="any" name="respaldo_porcentaje[]" placeholder="%" class="inputNumber">
        </td>
        <td>
            <button id="${rowCount}" type="button" class="btn btn-danger btn-xs btn-delete-respaldo"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        </td>
        `

    
}

$(document).on('click', '.btn-delete-respaldo', function (e) {
    e.preventDefault()

    let id = $(this).attr('id')

    $(`#newRowRespaldo${id}`).remove()

})




/* new function de comercial > edit */


///////////////////////////////////////////////////////////////


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

/* add row */

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

    $('#btnRefreshSuma').fadeOut();
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
        $(`#value_for_calculos`).val(parseFloat(sumaTotal3).toFixed(2))
    }

}


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

