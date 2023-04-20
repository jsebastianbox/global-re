$(document).ready(function () {
    $('.modal').MultiStep({
        title: 'Información para cálculos y proceso de cotización',
        data: [{
            label: 'Cálculos',
            content: `<div class="table-responsive tableContainer">
            <table class="table table-striped table-hover table-bordered " name="firstTable" id="firstTable">
                <thead>
                <tr>
                    <th scope="col" colspan="2">Calculos</th>
                </tr>
                </thead>
                <tbody id="firstTableBody">
                <tr>
                        <td><strong>ISD</strong></td>
                        <td>
                            <div class="labelStyle2Container">
                                <span>%</span>
                                <input type="number" min="0" max="100" id="isd" name="isd" value="0">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Impuesto Renta</strong></td>
                        <td>
                            <div class="labelStyle2Container">
                                <span>%</span>
                                <input type="number" min="0" max="100" id="impRenta" name="impRenta" value="0">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Com Cia. Seguros</strong></td>
                        <td>
                            <div class="labelStyle2Container">
                                <span>%</span>
                                <input type="number" min="0" max="100" id="ciaSeguros" name="ciaSeguros" value="0">
                            </div>  
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Com Global</strong></td>
                        <td>
                            <div class="labelStyle2Container">
                                <span>%</span>
                                <input type="number" min="0" max="100" id="comGlobal" name="comGlobal" value="0">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Com Partner</strong></td>
                        <td>
                            <div class="labelStyle2Container">
                                <span>%</span>
                                <input type="number" min="0" max="100" id="ciaPartner" name="ciaPartner" value="0">
                            </div>
                        </td>
                    <tr>
                        <td><strong>Com BQ</strong></td>
                        <td>
                            <div class="labelStyle2Container">
                                <span>%</span>
                                <input type="number" min="0" max="100" id="comBq" name="comBq" value="0">
                            </div>
                        </td>
                </tr>
                <tfoot id="firstTableFooter">
                    <tr>
                        <td><strong>(=)Total</strong></td>
                        <td><span id="totalCalculo">0%</span></td>
                    </tr>
                    <tr>
                        <td><strong>Factor Cálculo</strong></td>
                        <td><strong><span id="factorCalculo">0%</span></strong></td>
                    </tr>
                </tfoot>
                </tbody>
            </table>
            </div>`
        },
        {
            label: 'Información del reasegurador',
            content: `
            
            <div class="tableContainer">
                <button class="btn btn-xs new_entry__form--button" onclick="refreshInfoReasegurador()">Actualizar </button>
            </div>

            <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered " id="calculosTable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Reasegurador</th>
                <th scope="col" id="thSumaAsegurada">Suma Asegurada</th>
                <th scope="col">Participación</th>
                <th scope="col">Tasa bruta</th>
                <th scope="col">(-)Dstos</th>
                <th scope="col">Tasa neta</th>
                <th scope="col">Prima neta</th>
                <th scope="col">Prima part</th>
                <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                    colspan="1" aria-label="Add row">

                    <button type="button" onclick="addRowCalculosTable(event, 'calculos')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                </th>
              </tr>
            </thead>
            <tbody id="calculosBody">
              <tr>
                <td scope="row">1</td>
                <td>
                    <span name="name_insurer[]">
                            
                    </span>
                </td>
                <td>
                    <input type="number" id="sumaAsegurada" name="sumaAsegurada" value="0" class="sumaAseguradaInput" onkeyup="infoReaseguradorSuma()">
                </td>
                <td>
                    <div class="perce">
                    <div class="labelStyle2Container">
                        <span>%</span>
                        <input type="number" min="0" max="100" name="participacion" id="participacion" value="0" class="participacion participacionInput" onkeyup="infoReaseguradorSuma()">
                    </div>
                </td>
                <td>
                    <div class="labelStyle2Container">
                        <span>%</span>
                        <input type="number" min="0" max="100" name="tasaBruta" id="tasaBruta" value="0" class="tasaBrutaInput" onkeyup="infoReaseguradorSuma()">
                    </div>
                </td>
                <td>
                    <div class="labelStyle2Container">
                        <span>%</span>
                        <input type="number" min="0" max="100" name="dstos" id="dstos" value="0" class="dstosInput" onkeyup="infoReaseguradorSuma()" >
                    </div>
                </td>
                <td>
                    <div class="labelStyle2Container">
                        <span>%</span>
                        <input name="tasaNeta" type="number" step="any id="tasaNeta" class="tasaNetaSpan inputNumber" onkeyup="infoReaseguradorSuma()" value="0">
                    </div>
                </td>
                <td>
                    <span name="primaNeta" class="primaNetaSpan">0</span>
                </td>
                <td>
                    <span name="primaPart" class="primaPartSpan">0</span>
                </td>
                <td></td>
              </tr>
            </tbody>
            <tfoot id="calculosFooter">
              <tr>
                <td><th>(=)Total Cesión</th></td>
                <td></td>
                <td style="text-align: center;">
                    <span id="participacionTotal" class="slipTitle">0</span>%
                </td>
                <td></td>
                <td></td>

                <td style="text-align: center;">
                    <span id="tasaNetaFooterTotal" class="slipTitle">0</span>
                </td>
                <td style="text-align: center;">
                    <span id="primaNetaFooterTotal" class="slipTitle">0</span>
                </td>
                <td style="text-align: center;">
                    <span id="primaPartFooterTotal" class="slipTitle">0</span>
                </td>
                <td></td>
              </tr>
            </tfoot>
            </table>
          </div>`
        },
        {
            label: 'Garantía de Pago', //cliente, crear api, con el slip, relacion 1-m
            content: `
            <div class="input_group">
                <label for="garantiapago">Garantía de pago de primas</label>
                <div class="input_group">
                    <ul>
                        <li>
                            <label for="numdias">Contado No. Días</label>
                            <input type="number" name="num_day" id="numdias"> 
                        </li>
                        <li>
                            <label for="instalamentos">Instalamentos</label>
                            <select name="installation" id="instalamentos">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </li>
                        <li id="ins1">
                            <label for="instalamiento1">1er instalamiento:</label>
                            <input type="date" id="instalamiento1" name="date_payment">
                        </li>
                        <li id="ins2">
                            <label for="instalamiento2">2do instalamiento:</label>
                            <input type="date" id="instalamiento2" name="date_payment">
                        </li>
                        <li id="ins3">
                            <label for="instalamiento3">3er instalamiento:</label>
                            <input type="date" id="instalamiento3" name="date_payment">
                        </li>
                    </ul>
                </div>
                <p>El incumplimiento del pago de la prima en plazo máximo establecido, liberara al reasegurador de toda
                    responsabilidad en caso de ocurrir un siniestro y anulara el respaldo desde el inicio de vigencia.</p>
            </div>
            `
        }, //solo hasta aqui xd
        {
            label: 'Ponderación de costos',
            content: `
            <div class="tableContainer">
                <button class="btn btn-xs new_entry__form--button" id="actualizacionPonde" onclick="refreshPonderacion()">Actualizar </button>
            </div>

            <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered " id="ponderacionTable" name="ponderacionTable">
              <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Part</th>
                    <th scope="col">Tasa Ponderada</th>
                    <th scope="col">Tasa Neta RI</th>
                    <th scope="col">Tasa Bruta</th>
                    <th scope="col">Comisión</th>
                  </tr>
                </thead>
                <tbody id="ponderacionBody">

                <tfoot id="ponderacionFooter">
                    <tr>
                    <td scope="row">Total</td>
                    <td id="partSum"><strong>0%</strong></td>
                    <td id="ponderadasSum"><strong>0%</strong></td>
                    <td id="netaSum"><strong>0%</strong></td>
                    <td id="brutaSum"><strong>0%</strong></td>
                    <td id="comisionSum"><strong>0%</strong></td>
                    </tr>
                </tfoot>
              </tbody>
            </table>
          </div>`
        },
        {
            label: 'Oferta por reaseguros',
            content: `
            <div class="table-responsive">
              <table class="table table-striped table-hover table-bordered " name="calculosLastTable" id="calculosLastTable">
                <thead>
                  <tr>
                    <th scope="col">Coberturas</th>
                    <th scope="col">Límite Asegurado</th>
                    <th scope="col">Tasa</th>
                    <th scope="col">Prima Bruta</th>
                    <th scope="col">Prima Part</th>
                    <th scope="col">(-) Comisión</th>
                    <th scope="col">(-) Comisión BQ</th>
                    <th scope="col">(-) Imp. Renta</th>
                    <th scope="col">(=) Subtotal</th>
                    <th scope="col">(-) ISD</th>
                    <th scope="col">Prima Neta</th>
                    <th scope="col">Fee Partener</th>
                    <th scope="col">Prima Neta Global</th>
                    <th scope="col">Fee Global</th>
                    <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                        colspan="1" aria-label="Add row">

                        <button type="button" onclick="addRowCalculosTable2(event, 'calculosLast')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                    </th>
                  </tr>
                </thead>
                <tbody id="calculosLastBody">
                  <tr>

                    <td style="text-align:center" ><input type="text" id="" name="" placeholder="..."></td>
                    <td style="text-align:center" ><span class="limiteAseguradoSpan">20020000</span></td>
                    <td style="text-align:center" ><input value="0" type="number" id="tasaAjuste" class="tasaAjusteInput" name="" placeholder="%" onkeyup="sumaLastTable()"></td>
                    <td style="text-align:center" ><span class="primaBrutaSpan">0</span></td>
                    <td style="text-align:center" ><span class="primaPartSpan">0</span></td>
                    <td style="text-align:center" ><span class="comisionSpan">0</span></td>
                    <td style="text-align:center" ><span class="comisionBQSpan">0</span></td>
                    <td style="text-align:center" ><span class="impRentaSpan">0</span></td>
                    <td style="text-align:center" ><span class="subtotalSpan">0</span></td>
                    <td style="text-align:center" ><span class="isdSpan">0</span></td>
                    <td style="text-align:center" ><span class="primaNetaSpan">0</span></td>
                    <td style="text-align:center" ><span class="feePartenerSpan">0</span></td>
                    <td style="text-align:center" ><span class="primaNetaGlobalSpan">0</span></td>
                    <td style="text-align:center" ><span class="feeGlobalSpan">0</span></td>

                    <td></td>
                  </tr>
                  <tfoot id="calculosLastFooter">
                    <tr>
                      <th style="text-align:center">(=)Total Prima</th>
                        <td style="text-align: center;">
                            <span id="limiteAseguradoTotal" class="slipTitle">0</span>
                        </td>
                        <td style="text-align:center"></td>
                        <td style="text-align: center;">
                            <span id="primaBrutaTotal" class="slipTitle">0</span>
                        </td>
                        <td style="text-align: center;">
                            <span id="primaPartTotal" class="slipTitle">0</span>
                        </td>
                        <td style="text-align: center;">
                            <span id="comisionTotal" class="slipTitle">0</span>
                        </td>
                        <td style="text-align: center;">
                            <span id="comisionBQTotal" class="slipTitle">0</span>
                        </td>
                        <td style="text-align: center;">
                            <span id="impRentaTotal" class="slipTitle">0</span>
                        </td>
                        <td style="text-align: center;">
                            <span id="subtotalTotal" class="slipTitle">0</span>
                        </td>
                        <td style="text-align: center;">
                            <span id="isdTotal" class="slipTitle">0</span>
                        </td>
                        <td style="text-align: center;">
                            <span id="primaNetaTotal" class="slipTitle">0</span>
                        </td>
                        <td style="text-align: center;">
                            <span id="feePartenerTotal" class="slipTitle">0</span>
                        </td>
                        <td style="text-align: center;">
                            <span id="primaNetaGlobalTotal" class="slipTitle">0</span>
                        </td>
                        <td style="text-align: center;">
                            <span id="feeGlobalTotal" class="slipTitle">0</span>
                        </td>
                        <td style="text-align:center"></td>
                    </tr>
                  </tfoot>
                </tbody>
              </table>
            </div>
            `
        }],
        prevText: 'Anterior',
        nextText: 'Siguiente',
        finalLabel: 'Listo',
        finishText: 'Terminar',
        final: 'Da click en el botón "Terminar" para finalizar con el proceso.',
        modalSize: 'lg'
    });

    var token = $('meta[name="csrf-token"]').attr('content');
    function selectAjax(type, url) {
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
                        search: params.term
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
        });
    }

    selectAjax('.select_insurence', 'apiinsurence');

    getReinsurers('.select_reinsurer', 'RI');
})

window.addEventListener('click', () => {
    updateFirstTable()
});

function updateFirstTable() {
    var total, factorCalculo, isd, impRenta, ciaSeguros, comGlobal, ciaPartner, comBq, sumFirstTable

    total = document.getElementById('totalCalculo');
    factorCalculo = document.getElementById('factorCalculo');

    isd = document.querySelector('#isd');
    impRenta = document.querySelector('#impRenta');
    ciaSeguros = document.querySelector('#ciaSeguros');
    comGlobal = document.querySelector('#comGlobal');
    ciaPartner = document.querySelector('#ciaPartner');
    comBq = document.querySelector('#comBq');

    isd.addEventListener('input', () => {
        sumTable()
        updateTotal()
    })

    impRenta.addEventListener('input', () => {
        sumTable()
        updateTotal()
    })

    ciaSeguros.addEventListener('input', () => {
        sumTable()
        updateTotal()
    })

    comGlobal.addEventListener('input', () => {
        sumTable()
        updateTotal()
    })

    ciaPartner.addEventListener('input', () => {
        sumTable()
        updateTotal()
    })

    comBq.addEventListener('input', () => {
        sumTable()
        updateTotal()
    })

    function sumTable() {
        sumFirstTable = parseFloat(comGlobal.value) + parseFloat(isd.value) + parseFloat(impRenta.value) + parseFloat(ciaSeguros.value) + parseFloat(ciaPartner.value) + parseFloat(comBq.value);
        total.innerText = `${parseFloat(sumFirstTable).toFixed(4)}%`;
    }

    function updateTotal() {
        if (100 - sumFirstTable == NaN || 100 - sumFirstTable == null) {
            console.error(`factorCalculo = ${100 - sumFirstTable}`)
            factorCalculo.innerText = "0%"
        } else if (sumFirstTable > 100) {
            total.innerText = 'La suma excede el 100%'
            factorCalculo.innerText = 'La suma excede el 100%'
        } else {
            factorCalculo.innerText = `${parseFloat(100 - sumFirstTable).toFixed(4)}%`
        }
    }
}

// End update first table

/* SECOND TABLE: Información del reasegurador */

// row totals
function infoReaseguradorSuma() {
    const calculosBody = document.getElementById('calculosBody')

    let inputsParticipation = calculosBody.getElementsByClassName("participacionInput")
    let tasaNetaSpan = calculosBody.getElementsByClassName("tasaNetaSpan")
    let primaNetaSpan = calculosBody.getElementsByClassName("primaNetaSpan")
    let primaPartSpan = calculosBody.getElementsByClassName("primaPartSpan")

    const participacionTotal = document.getElementById('participacionTotal')
    const tasaNetaFooterTotal = document.getElementById('tasaNetaFooterTotal')
    const primaNetaFooterTotal = document.getElementById('primaNetaFooterTotal')
    const primaPartFooterTotal = document.getElementById('primaPartFooterTotal')

    console.log(primaNetaSpan);
    //formulas lineales 
    
    let tasaBrutaInputs = calculosBody.getElementsByClassName('tasaBrutaInput')
    let dstosInputs = calculosBody.getElementsByClassName('dstosInput')

    //tasa neta
    for (let i = 0; i < tasaBrutaInputs.length; i++) {

        let tasaB = tasaBrutaInputs[i].value
        let dstos = parseFloat(dstosInputs[i].value / 100).toFixed(2) 

        //tasa bruta - descuentos
        let formula = parseFloat(tasaB - (tasaB * dstos)).toFixed(4)
        tasaNetaSpan[i].value = formula
    }
    //prima neta
    let sumaAseguradaInput = calculosBody.getElementsByClassName('sumaAseguradaInput')

    for (let i = 0; i < primaNetaSpan.length; i++) {

        let sumaA = sumaAseguradaInput[i].value;
        let tasaN = parseFloat(tasaNetaSpan[i].value) / 100;

        // suma asegurada * tasa neta
        let formula = parseFloat(tasaN * sumaA).toFixed(2)
        primaNetaSpan[i].innerText = formula
    }

        
    //prima part

    for (let i = 0; i < primaPartSpan.length; i++) {
        let primaN = parseFloat(primaNetaSpan[i].innerText)
        let participacion = inputsParticipation[i].value / 100;

        let formula = parseFloat(primaN * participacion).toFixed(4)

        primaPartSpan[i].innerText = formula
    }


    

    //totals
    let arrayTasaBruta = []
    let arrayDstos = []
    let arrayParticipacion = []
    let arrayTasaNeta = []
    let arrayPrimaNeta = []
    let arrayPrimaPart = []

    for (let i = 0; i < tasaBrutaInputs.length; i++) {
        let tasaB = tasaBrutaInputs[i].value;
        arrayTasaBruta.push(parseFloat(tasaB))
    }

    for (let i = 0; i < dstosInputs.length; i++) {
        let dstos = dstosInputs[i].value / 100;
        arrayDstos.push(parseFloat(dstos))
    }

    //

    for (let i = 0; i < inputsParticipation.length; i++) {
        if (inputsParticipation[i].value > 0) {
            arrayParticipacion.push(parseFloat(inputsParticipation[i].value))
        }
    }
    
    for (let i = 0; i < primaNetaSpan.length; i++) {
        if (primaNetaSpan[i].innerText > 0) {
            arrayPrimaNeta.push(parseFloat(primaNetaSpan[i].innerText))
        }
    }
    for (let i = 0; i < primaPartSpan.length; i++) {
        if (primaPartSpan[i].innerText > 0) {
            arrayPrimaPart.push(parseFloat(primaPartSpan[i].innerText))
        }
    }
    for (let i = 0; i < tasaNetaSpan.length; i++) {
        if (tasaNetaSpan[i].value > 0) {
            arrayTasaNeta.push(parseFloat(tasaNetaSpan[i].value))
        }
    }

    let suma1 = arrayParticipacion.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma3 = arrayPrimaNeta.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma4 = arrayPrimaPart.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma2 = arrayTasaNeta.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)

    participacionTotal.innerText = parseFloat(suma1).toFixed(2)
    primaNetaFooterTotal.innerText = parseFloat(suma3).toFixed(2)
    primaPartFooterTotal.innerText = parseFloat(suma4).toFixed(2)
    tasaNetaFooterTotal.innerText = parseFloat(suma2).toFixed(2)

}

//poner reasegurados en tabla 'oferta por reaseguros'
function putReinsurers() {
    let reinsurersSelectedArray = document.querySelectorAll('[name="reaseguradores"]')
    let reinsurersSpanArray = document.querySelectorAll('[name="name_insurer[]"]')

    if (reinsurersSelectedArray.length > 0 && reinsurersSpanArray.length > 0) {
        for (let i = 0; i < reinsurersSelectedArray.length; i++) {
            
            reinsurersSpanArray[i].innerText = reinsurersSelectedArray[i].value
            
        }            
    }

}

//actualizar tabla info
function refreshInfoReasegurador() {

    putReinsurers()

    //actualizar descuentos
    let inputsDstos = document.querySelectorAll('[name="dstos"]')

    for (let i = 0; i < inputsDstos.length; i++) {
        
        let val =  $('#firstTableFooter #totalCalculo ').text().replace('%', '')
        
        inputsDstos[i].value = val
        
    }
}

// add row
function addRowCalculosTable(event, type) {
    event.preventDefault()

    let rowCount = document.getElementById(`${type}Table`).rows.length - 1

    const calculosTableBody = document.getElementById(`${type}Body`)
    const tr = document.createElement('tr')

    calculosTableBody.appendChild(tr)
    tr.id = `newRowCalculos${rowCount}`
    tr.innerHTML =
        `
            <td>
                ${rowCount}
            </td>
            <td>
                    <span name="name_insurer[]">

                    </span>
            </td>
            <td>
                <input type="number" id="sumaAsegurada" name="sumaAsegurada" value="0" class="sumaAseguradaInput" onkeyup="infoReaseguradorSuma()">
            </td>
            <td>
                <div class="perce">
                <div class="labelStyle2Container">
                    <span>%</span>
                    <input type="number" min="0" max="100" name="participacion" id="participacion" value="0" class="participacion participacionInput" onkeyup="infoReaseguradorSuma()">
                </div>
            </td>
            <td>
                <div class="labelStyle2Container">
                    <span>%</span>
                    <input type="number" min="0" max="100" name="tasaBruta" id="tasaBruta" value="0" class="tasaBrutaInput" onkeyup="infoReaseguradorSuma()">
                </div>
            </td>
            <td>
                <div class="labelStyle2Container">
                    <span>%</span>
                    <input type="number" min="0" max="100" name="dstos" id="dstos" value="0" class="dstosInput" onkeyup="infoReaseguradorSuma()" >
                </div>
            </td>
            <td>
                <div class="labelStyle2Container">
                    <span>%</span>
                    <input name="tasaNeta" type="number" step="any id="tasaNeta" class="tasaNetaSpan inputNumber" onkeyup="infoReaseguradorSuma()" value="0">
                </div>
            </td>
            <td>
                <span name="primaNeta" class="primaNetaSpan">0</span>
            </td>
            <td>
                <span name="primaPart" class="primaPartSpan">0</span>
            </td>

            <td>
                <button id="${rowCount}" type="button" class="btn btn-danger btn-xs btn-delete-calculos" style="color:black">x</button>
            </td>
        `
        getReinsurers('.select_reinsurer', 'RI');
}

function addRowCalculosTable2(event, type) {
    event.preventDefault()

    let rowCount = document.getElementById(`${type}Table`).rows.length

    const calculosTableBody = document.getElementById(`${type}Body`)
    const tr = document.createElement('tr')

    calculosTableBody.appendChild(tr)
    tr.id = `newRowCalculos2${rowCount}`
    tr.innerHTML =
        `
        <td style="text-align:center" ><input type="text" id="" name="" placeholder="..."></td>
        <td style="text-align:center" ><span class="limiteAseguradoSpan">  126758642.23   </span></td>
        <td style="text-align:center" ><input value="0.30185" type="number" id="tasaAjuste" class="tasaAjusteInput" name="" placeholder="%" onkeyup="sumaLastTable()"></td>
        <td style="text-align:center" ><span class="primaBrutaSpan">0</span></td>
        <td style="text-align:center" ><span class="primaPartSpan">0</span></td>
        <td style="text-align:center" ><span class="comisionSpan">0</span></td>
        <td style="text-align:center" ><span class="comisionBQSpan">0</span></td>
        <td style="text-align:center" ><span class="impRentaSpan">0</span></td>
        <td style="text-align:center" ><span class="subtotalSpan">0</span></td>
        <td style="text-align:center" ><span class="isdSpan">0</span></td>
        <td style="text-align:center" ><span class="primaNetaSpan">0</span></td>
        <td style="text-align:center" ><span class="feePartenerSpan">0</span></td>
        <td style="text-align:center" ><span class="primaNetaGlobalSpan">0</span></td>
        <td style="text-align:center" ><span class="feeGlobalSpan">0</span></td>

        <td>
            <button id="${rowCount}" type="button" class="btn btn-danger btn-xs btn-delete-calculos2" style="color:black">x</button>
        </td>
        `
}

$(document).on('click', '.btn-delete-calculos', function (e) {
    e.preventDefault()

    let id = $(this).attr('id')

    $(`#newRowCalculos${id}`).remove()
})
$(document).on('click', '.btn-delete-calculos2', function (e) {
    e.preventDefault()

    let id = $(this).attr('id')

    $(`#newRowCalculos2${id}`).remove()
})


window.onload = infoReaseguradorSuma;

var contador = 0;

function refreshPonderacion() {


    // inputs
    let inputsParticipation = calculosBody.getElementsByClassName("participacionInput")
    let inputsTasaNeta = calculosBody.getElementsByClassName("tasaNetaSpan")
    let inputsTasaBruta = calculosBody.getElementsByClassName("tasaBrutaInput")
    let inputsDstos = calculosBody.getElementsByClassName("dstosInput")
    //table body
    const ponderacionTableBody = document.getElementById(`ponderacionBody`)
    ponderacionTableBody.innerHTML = ''
    var numRow = 1
    for (let i = 0; i < inputsParticipation.length; i++) {
        const tr = document.createElement('tr')
        
        //part es la misma part que la anterior tabla



        //tasa ponderada =  participacion por fila / participacion total 
        var participacionTotal = $("#calculosTable #calculosFooter #participacionTotal").text()
        var participacionTotalDecimal = parseFloat(participacionTotal / 100).toFixed(2)
        var participacionDecimal = parseFloat(inputsParticipation[i].value / 100).toFixed(2)
        let tasaPonderadaPorFila = parseFloat(participacionDecimal / participacionTotalDecimal).toFixed(2) 

        //tasa neta RI = tasa neta * tasa ponde por fila
        var tasaNetaDecimal = parseFloat(inputsTasaNeta[i].value).toFixed(4)
        console.log(tasaNetaDecimal);
        let tasaNetaRiPorFila = parseFloat(tasaNetaDecimal * tasaPonderadaPorFila).toFixed(4)
        console.log(tasaNetaRiPorFila);

        //tasa bruta = tasa bruta * tasa ponde por fila
        var tasaBrutaDecimal = parseFloat(inputsTasaBruta[i].value).toFixed(4)
        let brutaPorFila = parseFloat(tasaBrutaDecimal * tasaPonderadaPorFila).toFixed(4)

        //comision = descuentos * tasa ponde por fila
        var dstsDecimal = parseFloat(inputsDstos[i].value / 100).toFixed(2)
        let comisionPorFila = parseFloat(dstsDecimal * tasaPonderadaPorFila).toFixed(2)


        tr.innerHTML =
            `<td>
                ${numRow}
            </td>
            <td><span name="partPonderada">${inputsParticipation[i].value}</span>%</td>
            <td><span name="tasaPonderada">${(tasaPonderadaPorFila * 100).toFixed(2)}</span>%</td>
            <td><span name="netaPonderada">${(tasaNetaRiPorFila * 100).toFixed(4)}</span>%</td>
            <td><span name="brutaPonderada">${(brutaPorFila * 100).toFixed(4)}</span>%</td>
            <td><span name="comisionPonderada">${(comisionPorFila * 100).toFixed(2)}</span>%</td>`
            
            numRow++

        ponderacionTableBody.appendChild(tr)
            
    }

    //total participation
    $('#ponderacionFooter #partSum').text(participacionTotal + '%').css({"font-weight": "bold"})


    //total tasa ponderada
    let partsPonderada = document.querySelectorAll('[name="tasaPonderada"]')    
    var totalPartPonderada = 0
    for (let i = 0; i < partsPonderada.length; i++) {
        const element = parseFloat(partsPonderada[i].innerText)
        
        totalPartPonderada += element
        
    }
    $('#ponderacionFooter #ponderadasSum').text(totalPartPonderada + '%').css({"font-weight": "bold"})

    //total tasa neta ri
    let tasaPonderada = document.querySelectorAll('[name="netaPonderada"]')    
    let totalNetaPonderada = 0
    for (let i = 0; i < tasaPonderada.length; i++) {
        const element = parseFloat(tasaPonderada[i].innerText)
        
        totalNetaPonderada += element
        
    }
    $('#ponderacionFooter #netaSum').text(totalNetaPonderada.toFixed(4) + '%').css({"font-weight": "bold"})

    //total tasa neta ri
    let tasaBrutaPonderada = document.querySelectorAll('[name="brutaPonderada"]')    
    let totalBrutaPonderada = 0
    for (let i = 0; i < tasaBrutaPonderada.length; i++) {
        const element = parseFloat(tasaBrutaPonderada[i].innerText)
        
        totalBrutaPonderada += element
        
    }
    $('#ponderacionFooter #brutaSum').text(totalBrutaPonderada.toFixed(4) + '%').css({"font-weight": "bold"})

    //total comision ponderada
    let comisionPonderada = document.querySelectorAll('[name="comisionPonderada"]')    
    var totalComisionPonderada = 0
    for (let i = 0; i < comisionPonderada.length; i++) {
        const element = parseFloat(comisionPonderada[i].innerText)
        
        totalComisionPonderada += element
        
    }
    $('#ponderacionFooter #comisionSum').text(totalComisionPonderada + '%').css({"font-weight": "bold"})




    //SweetAlert
    Swal.fire({
        title: 'Se ha actualizado la tabla',
        timer: 1600,
        timerProgressBar: true,
    })
}

function sumaLastTable() {
    const calculosLastBody = document.getElementById('calculosLastBody')

    let limiteAseguradoSpan = calculosLastBody.getElementsByClassName("limiteAseguradoSpan")
    let primaBrutaSpan = calculosLastBody.getElementsByClassName("primaBrutaSpan")
    let primaPartSpan = calculosLastBody.getElementsByClassName("primaPartSpan")
    let comisionSpan = calculosLastBody.getElementsByClassName("comisionSpan")
    let comisionBQSpan = calculosLastBody.getElementsByClassName("comisionBQSpan")
    let impRentaSpan = calculosLastBody.getElementsByClassName("impRentaSpan")
    let subtotalSpan = calculosLastBody.getElementsByClassName("subtotalSpan")
    let isdSpan = calculosLastBody.getElementsByClassName("isdSpan")
    let primaNetaSpan = calculosLastBody.getElementsByClassName("primaNetaSpan")
    let feePartenerSpan = calculosLastBody.getElementsByClassName("feePartenerSpan")
    let primaNetaGlobalSpan = calculosLastBody.getElementsByClassName("primaNetaGlobalSpan")
    let feeGlobalSpan = calculosLastBody.getElementsByClassName("feeGlobalSpan")

    const limiteAseguradoTotal = document.getElementById('limiteAseguradoTotal')
    const primaBrutaTotal = document.getElementById('primaBrutaTotal')
    const primaPartTotal = document.getElementById('primaPartTotal')
    const comisionTotal = document.getElementById('comisionTotal')
    const comisionBQTotal = document.getElementById('comisionBQTotal')
    const impRentaTotal = document.getElementById('impRentaTotal')
    const subtotalTotal = document.getElementById('subtotalTotal')
    const isdTotal = document.getElementById('isdTotal')
    const primaNetaTotal = document.getElementById('primaNetaTotal')
    const feePartenerTotal = document.getElementById('feePartenerTotal')
    const primaNetaGlobalTotal = document.getElementById('primaNetaGlobalTotal')
    const feeGlobalTotal = document.getElementById('feeGlobalTotal')

    //formulas lineales - Prima Bruta = limite asegurado * tasa
    let tasaAjusteInput = document.getElementsByClassName('tasaAjusteInput')
    for (let i = 0; i < limiteAseguradoSpan.length; i++) {

        let limiteA = parseFloat(limiteAseguradoSpan[i].innerText)
        let tasaA = parseFloat(tasaAjusteInput[i].value / 100)

        let formula = parseFloat(limiteA * tasaA).toFixed(2)
        primaBrutaSpan[i].innerText = formula
    }

    //prima part = prima bruta * (getElementById(participacionTotal).innerText/100)
    const participacionTotal = document.getElementById('participacionTotal')

    for (let i = 0; i < limiteAseguradoSpan.length; i++) {

        let primaB = parseFloat(primaBrutaSpan[i].innerText)
        let participacionTotalPorcentaje = participacionTotal.innerText / 100;

        let formula = parseFloat(primaB * participacionTotalPorcentaje).toFixed(2)
        primaPartSpan[i].innerText = formula
    }
    //Comision =  prima part * (getElementById(ciaSeguros).innerText/100)
    const ciaSeguros = document.getElementById('ciaSeguros')

    for (let i = 0; i < limiteAseguradoSpan.length; i++) {

        let primaPart = primaPartSpan[i].innerText;
        let ciaSegurosPorcentaje = ciaSeguros.value / 100;

        let formula = parseFloat(primaPart * ciaSegurosPorcentaje).toFixed(2)
        comisionSpan[i].innerText = formula
    }

    //ComisionBQ = PrimaPart*ComBQ/100
    const comBq = document.getElementById('comBq')

    for (let i = 0; i < limiteAseguradoSpan.length; i++) {

        let primaPart = primaPartSpan[i].innerText;
        let comBqPorcentaje = comBq.value / 100;

        let formula = parseFloat(primaPart * comBqPorcentaje).toFixed(2)
        comisionBQSpan[i].innerText = formula
    }

    //Imp renta = PrimaPart * (Imp.renta/100)
    const impRenta = document.getElementById('impRenta')

    for (let i = 0; i < limiteAseguradoSpan.length; i++) {

        let primaPart = primaPartSpan[i].innerText;
        let impRentaPorcentaje = impRenta.value / 100;

        let formula = parseFloat(primaPart * impRentaPorcentaje).toFixed(2)
        impRentaSpan[i].innerText = formula
    }

    //Subtotal = primaPart - (Comision + ComisionBQ + Imp.Renta)

    for (let i = 0; i < primaPartSpan.length; i++) {

        let primaPart = primaPartSpan[i].innerText;
        let comision1 = comisionSpan[i].innerText;
        let comisionBQ1 = comisionBQSpan[i].innerText;
        let impRenta1 = impRentaSpan[i].innerText;

        let sumaParaRestar = parseFloat(comision1) + parseFloat(comisionBQ1) + parseFloat(impRenta1)

        let formula = parseFloat(primaPart - sumaParaRestar).toFixed(2)
        subtotalSpan[i].innerText = formula
    }

    //ISD = Subtotal * (ISD/100)
    const isd = document.getElementById('isd')

    for (let i = 0; i < limiteAseguradoSpan.length; i++) {

        let subtotal = subtotalSpan[i].innerText
        let isdPorcentaje = isd.value / 100;

        let formula = parseFloat(subtotal * isdPorcentaje).toFixed(2)
        isdSpan[i].innerText = formula
    }


    //prima neta = subtotal - ISD

    for (let i = 0; i < limiteAseguradoSpan.length; i++) {

        let subtotal = subtotalSpan[i].innerText
        let isd = isdSpan[i].innerText

        let formula = parseFloat(subtotal - isd).toFixed(2)
        primaNetaSpan[i].innerText = formula
    }

    //FeePartener =   PrimaPart *  (Com.Partner/100)

    const ciaPartner = document.getElementById('ciaPartner')

    for (let i = 0; i < limiteAseguradoSpan.length; i++) {

        let primaPart = primaPartSpan[i].innerText;
        let ciaPartnerPorcentaje = ciaPartner.value / 100;

        let formula = parseFloat(primaPart * ciaPartnerPorcentaje).toFixed(2)
        feePartenerSpan[i].innerText = formula
    }

    //Prima Neta Global = Prima neta - FeePartener

    for (let i = 0; i < limiteAseguradoSpan.length; i++) {

        let primaNeta = primaNetaSpan[i].innerText
        let feePart = feePartenerSpan[i].innerText

        let formula = parseFloat(primaNeta - feePart).toFixed(2)
        primaNetaGlobalSpan[i].innerText = formula
    }


    //FeeGlobal = Fee Partener - Tasa

    for (let i = 0; i < limiteAseguradoSpan.length; i++) {

        let feePart = feePartenerSpan[i].innerText
        let tasaA = tasaAjusteInput[i].value / 100;

        let formula = parseFloat(feePart - tasaA).toFixed(2)
        feeGlobalSpan[i].innerText = formula
    }


    //totals
    let limiteAseguradoArray = []
    let primaBrutaArray = []
    let primaPartArray = []
    let comisionArray = []
    let comisionBQArray = []
    let impRentaArray = []
    let subtotalArray = []
    let isdArray = []
    let primaNetaArray = []
    let feePartenerArray = []
    let primaNetaGlobalArray = []
    let feeGlobalArray = []

    for (let i = 0; i < limiteAseguradoSpan.length; i++) {
        if (limiteAseguradoSpan[i].innerText > 0) {
            limiteAseguradoArray.push(parseFloat(limiteAseguradoSpan[i].innerText))
        }
    }
    for (let i = 0; i < primaBrutaSpan.length; i++) {
        if (primaBrutaSpan[i].innerText > 0) {
            primaBrutaArray.push(parseFloat(primaBrutaSpan[i].innerText))
        }
    }
    for (let i = 0; i < primaPartSpan.length; i++) {
        if (primaPartSpan[i].innerText > 0) {
            primaPartArray.push(parseFloat(primaPartSpan[i].innerText))
        }
    }
    for (let i = 0; i < comisionSpan.length; i++) {
        if (comisionSpan[i].innerText > 0) {
            comisionArray.push(parseFloat(comisionSpan[i].innerText))
        }
    }
    for (let i = 0; i < comisionBQSpan.length; i++) {
        if (comisionBQSpan[i].innerText > 0) {
            comisionBQArray.push(parseFloat(comisionBQSpan[i].innerText))
        }
    }
    for (let i = 0; i < impRentaSpan.length; i++) {
        if (impRentaSpan[i].innerText > 0) {
            impRentaArray.push(parseFloat(impRentaSpan[i].innerText))
        }
    }
    for (let i = 0; i < subtotalSpan.length; i++) {
        if (subtotalSpan[i].innerText > 0) {
            subtotalArray.push(parseFloat(subtotalSpan[i].innerText))
        }
    }
    for (let i = 0; i < isdSpan.length; i++) {
        if (isdSpan[i].innerText > 0) {
            isdArray.push(parseFloat(isdSpan[i].innerText))
        }
    }
    for (let i = 0; i < primaNetaSpan.length; i++) {
        if (primaNetaSpan[i].innerText > 0) {
            primaNetaArray.push(parseFloat(primaNetaSpan[i].innerText))
        }
    }
    for (let i = 0; i < feePartenerSpan.length; i++) {
        if (feePartenerSpan[i].innerText > 0) {
            feePartenerArray.push(parseFloat(feePartenerSpan[i].innerText))
        }
    }
    for (let i = 0; i < primaNetaGlobalSpan.length; i++) {
        if (primaNetaGlobalSpan[i].innerText > 0) {
            primaNetaGlobalArray.push(parseFloat(primaNetaGlobalSpan[i].innerText))
        }
    }
    for (let i = 0; i < feeGlobalSpan.length; i++) {
        if (feeGlobalSpan[i].innerText > 0) {
            feeGlobalArray.push(parseFloat(feeGlobalSpan[i].innerText))
        }
    }

    let suma1 = limiteAseguradoArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma2 = primaBrutaArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma3 = primaPartArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma4 = comisionArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma5 = comisionBQArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma6 = impRentaArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma7 = subtotalArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma8 = isdArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma9 = primaNetaArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma10 = feePartenerArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma11 = primaNetaGlobalArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)
    let suma12 = feeGlobalArray.reduce((a, b) => parseFloat(a) + parseFloat(b), 0)

    limiteAseguradoTotal.innerText = parseFloat(suma1).toFixed(2)
    primaBrutaTotal.innerText = parseFloat(suma2).toFixed(2)
    primaPartTotal.innerText = parseFloat(suma3).toFixed(2)
    comisionTotal.innerText = parseFloat(suma4).toFixed(2)
    comisionBQTotal.innerText = parseFloat(suma5).toFixed(2)
    impRentaTotal.innerText = parseFloat(suma6).toFixed(2)
    subtotalTotal.innerText = parseFloat(suma7).toFixed(2)
    isdTotal.innerText = parseFloat(suma8).toFixed(2)
    primaNetaTotal.innerText = parseFloat(suma9).toFixed(2)
    feePartenerTotal.innerText = parseFloat(suma10).toFixed(2)
    primaNetaGlobalTotal.innerText = parseFloat(suma11).toFixed(2)
    feeGlobalTotal.innerText = parseFloat(suma12).toFixed(2)
}

function resumenNotificacion(event) {
    event.preventDefault()

    const tasaAjuste = document.getElementById('tasaAjuste')
    const primaBrutaTotal = document.getElementById('primaBrutaTotal')
    const primaPartTotal = document.getElementById('primaPartTotal')
    const primaNetaTotal = document.getElementById('primaNetaTotal')
    const feePartenerTotal = document.getElementById('feePartenerTotal')
    const primaNetaGlobalTotal = document.getElementById('primaNetaGlobalTotal')

    const tasaAjusteResumen = document.getElementById('tasaAjusteResumen')
    const primaBrutaResumen = document.getElementById('primaBrutaResumen')
    const primaParticipacionResumen1 = document.getElementById('primaParticipacionResumen1')
    const primaParticipacionResumen2 = document.getElementById('primaParticipacionResumen2')
    const deduccionesResumen = document.getElementById('deduccionesResumen')
    const primaNetaResumen = document.getElementById('primaNetaResumen')
    const feePartenerResumen = document.getElementById('feePartenerResumen')
    const primaNetaGlobalResumen = document.getElementById('primaNetaGlobalResumen')

    const participacionTotal = document.getElementById('participacionTotal')

    tasaAjusteResumen.innerText = tasaAjuste.value + '%'
    primaBrutaResumen.innerText = primaBrutaTotal.innerText
    primaParticipacionResumen1.innerText = participacionTotal.innerText + '%'
    primaParticipacionResumen2.innerText = primaPartTotal.innerText
    primaNetaResumen.innerText = primaNetaTotal.innerText
    feePartenerResumen.innerText = feePartenerTotal.innerText
    primaNetaGlobalResumen.innerText = primaNetaGlobalTotal.innerText
    //suma deducciones
    //comision + comisionBQ + imp. renta + isd total
    const comisionTotal = document.getElementById('comisionTotal')
    const comisionBQTotal = document.getElementById('comisionBQTotal')
    const impRentaTotal = document.getElementById('impRentaTotal')
    const isdTotal = document.getElementById('isdTotal')
    let sumaDeducciones = parseFloat(comisionTotal.innerText) + parseFloat(comisionBQTotal.innerText) + parseFloat(impRentaTotal.innerText) + parseFloat(isdTotal.innerText)

    deduccionesResumen.innerText = sumaDeducciones.toFixed(2)
}

function securitySuma() {
    const proportionalTableBody = document.getElementById('proportionalTableBody')
    const proportionalTotal = document.getElementById('proportionalTotal')
    let proportionalInputs = proportionalTableBody.getElementsByTagName('input')
    let arraySuma1 = []
    for (let i = 0; i < proportionalInputs.length; i++) {
        if (proportionalInputs[i].value > 0) {
            arraySuma1.push(parseFloat(proportionalInputs[i].value))
        }
    }

    let suma1 = arraySuma1.reduce((a, b) => parseFloat(a) + parseFloat(b), 0);

    proportionalTotal.innerText = parseFloat(suma1).toFixed(2)

    if(proportionalTotal.innerText > 100) {
        proportionalTotal.innerText = 'superaste el 100'
    }

    const noproportionalTableBody = document.getElementById('noproportionalTableBody')
    const noproportionalTotal = document.getElementById('noproportionalTotal')
    let noproportionalInputs = noproportionalTableBody.getElementsByTagName('input')
    let arraySuma2 = []
    for (let i = 0; i < noproportionalInputs.length; i++) {
        if (noproportionalInputs[i].value > 0) {
            arraySuma2.push(parseFloat(noproportionalInputs[i].value))
        }
    }

    let suma2 = arraySuma2.reduce((a, b) => parseFloat(a) + parseFloat(b), 0);

    noproportionalTotal.innerText = parseFloat(suma2).toFixed(2)

    if(noproportionalTotal.innerText > 100) {
        noproportionalTotal.innerText = 'superaste el 100'
    }

}



function getReinsurers(selector, reference = "RI") {
    $(selector).select2({
        language: 'es',
        tags: true,
        placeholder: 'Seleccionar',
        type: "GET",
        dataType: 'json',
        delay: 250,
        ajax: {
            url: window.location.origin + '/api/reinsurers',
            dataType: 'json',
            cache: true,
            data: function (params) {
                return {
                    search: params.term,
                    reference: reference
                };
            },
            processResults: function (response) {
                return {
                    results: $.map(response.data, function (item) {
                        return {
                            text: item.name,
                            id: item.name
                        }
                    })
                };
            },
        },
        cache: true
    });
}


