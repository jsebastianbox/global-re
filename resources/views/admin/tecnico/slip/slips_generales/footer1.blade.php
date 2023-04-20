<div class="tableContainer" style="1.2rem 0">
    <h4 class="slipTitle">Aclaraciones</h4>
    <div class="flexColumnCenterContainer" style="max-width:450px">
        <textarea placeholder="..." name="clarification"></textarea>
    </div>
</div>

<div class="tableContainer" style="1.2rem 0">
    <h4 class="slipTitle">Tasa/Prima de Reaseguros</h4>
    <div class="flexColumnCenterContainer">

        <!-- Button trigger modal -->
        @include('admin.tablas.calculo')

        <button class="btn btn-sm btn-primary" onclick="resumenNotificacion(event)" style="margin: 1.5rem 0">Actualizar
            resumen</button>

        <table class="indemnizacionTable" style="margin: 1.5rem 0">
            <thead>
                <tr>
                    <th style="text-align: center">Resumen</th>
                    <th></th>
                    <th style="text-align: center">Valores</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center">Tasa de ajuste:</td>
                    <td></td>
                    <td style="text-align: center" id="tasaAjusteResumen">0</td>
                </tr>
                <tr>
                    <td style="text-align: center">Prima Bruta 100%:</td>
                    <td style="text-align: center">100%</td>
                    <td style="text-align: center" id="primaBrutaResumen">0</td>
                </tr>
                <tr>
                    <td style="text-align: center">Prima Participación:</td>
                    <td style="text-align: center" id="primaParticipacionResumen1"></td>
                    <td style="text-align: center" id="primaParticipacionResumen2">0</td>
                </tr>
                <tr>
                    <td style="text-align: center">(-) Deducciones:</td>
                    <td></td>
                    <td style="text-align: center" id="deduccionesResumen">0</td>
                </tr>
                <tr>
                    <td style="text-align: center">(=) Prima Neta</td>
                    <td></td>
                    <td style="text-align: center" id="primaNetaResumen">0</td>
                </tr>
                <tr>
                    <td style="text-align: center">(-) Fee Partener</td>
                    <td></td>
                    <td style="text-align: center" id="feePartenerResumen">0</td>
                </tr>
                <tr>
                    <td style="text-align: center">(=) Prima Neta Global</td>
                    <td></td>
                    <td style="text-align: center" id="primaNetaGlobalResumen">0</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

{{-- Aqui se incluyo garantia de pago de primas --}}
<div class="tableContainer">
    <h4 class="slipTitle selectLey">Garantía De Pago De Primas</h4>

    @include('admin.tecnico.slip.slips_generales.tableGarantia')

</div>


<div class="tableContainer" style="1.2rem 0">
    <h4 class="slipTitle">Notificación de Siniestros</h4>

    <textarea name="note_sinester" id="" cols="30" rows="10"></textarea>

    {{-- <div class="flexRowWrapContainer" style="1.2rem 0">
        <button id="notificacionBtnOpcion1" class="btn btn-sm btn-primary">Por días</button>
        <button id="notificacionBtnOpcion2" class="btn btn-sm btn-primary">Claúsula de Control de Reclamos</button>
        <button id="notificacionBtnOpcion3" class="btn btn-sm btn-primary">Cláusula de Cooperación de Reclamos</button>
    </div>

    <div id="notificacionOpcion1" class="sentenceInput" style="display: none">
        <input type="number" name="note_sinester" placeholder="No. Días" style="margin: 1rem 0">
        <p>días contados a partir de la fecha de ocurrencia</p>
    </div>
    <div id="notificacionOpcion2" class="sentenceInput" style="display: none">
        <input type="number" name="note_sinester" placeholder="No. Días" style="margin: 1rem 0">
        <p>días contados a partir de la fecha de ocurrencia</p>
    </div>
    <div id="notificacionOpcion3" class="sentenceInput" style="display: none">
        <input type="number" name="note_sinester" placeholder="No. Días" style="margin: 1rem 0">
        <p>días contados a partir de la fecha de ocurrencia</p>
    </div> --}}
</div>

<div class="tableContainer">
    
    <h4 class="slipTitle selectLey">Ley y jurisdicción:</h4>


    <div style="max-width: 800px">
        <p>Este reaseguro será gobernado por y constituido de acuerdo con la ley de:
            <span class="politics_country_one" style="font-weight: bold">
                {{$slip->country->name}}
            </span>,&nbsp;
        y cada parte acuerda referir a la jurisdicción exclusiva de las cortes de:
        <span class="politics_country_one" style="font-weight: bold">
            {{$slip->country->name}}
        </span>,&nbsp;
        a menos que ambas partes acuerden referir el caso a arbitraje.</p>
    </div>
</div>
