<div class="flexColumnCenterContainer">
    
    <div class="flexRowWrapContainer">
        <button type="button" class="new_entry__form--button" onclick="chooseGarantia('contado');">
            Pago de contado
        </button>

        <button type="button" class="new_entry__form--button" onclick="chooseGarantia('instalamentos');">
            Pago por instalamentos
        </button>
    </div>

</div>

{{-- Por instalamento --}}
<div id="tableGarantia" class="tableContainer" style="display: none; margin-top: 2rem">
    <h4 class="slipTitle">Tabla Garantía De Pago</h4>
    <table class="table tableGarantia table-striped table-bordered no-footer"
        cellspacing="0" width="90%" aria-describedby="example_info">
        <thead>
            <tr role="row">
                <th>Instalamento</th>
                <th>Número días</th>
                <th>Fecha</th>
                <th>Valor</th>
                <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                    colspan="1" aria-label="Add row">

                    <button onclick="addRowGarantia(event)" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                </th>
            </tr>
        </thead>

        <tbody id="garantiaTableBody">
            <tr>
                <th style="text-align: center;">
                    <input type="text" placeholder="..." name="installation[]">
                </th>

                <th style="text-align: center;">
                    <input type="number" placeholder="..."  name="num_day[]">
                </th>

                <th style="text-align: center;">
                    <input type="date" name="date_payment[]" value="{{ date($slip->validity_since, strtotime("+1 month")) }}"> {{-- TODO: Actualizar variable de fecha a fecha de pago a los reaseguradores --}}
                </th>

                <th style="text-align: center;">
                    <input type="number" placeholder="$" step="any" name="payment_value[]"> {{-- David, agrega esto a la BDD --}}
                </th>
                <th>
                </th>
            </tr>

        </tbody>
    </table>

    <p class="slipP">
        El incumplimiento del pago de la prima en plazo máximo establecido, liberara al reasegurador de toda
        responsabilidad en caso de ocurrir un siniestro y anulara el respaldo desde el inicio de vigencia.
    </p>
</div>
{{-- Por contado --}}
<div id="tableContado" class="tableContainer" style="display: none; margin-top: 2rem">
    <h4 class="slipTitle">Tabla De Instalamentos</h4>
    <table class="table tableContado table-striped table-bordered"
        cellspacing="0" width="90%">
        <thead>
            <tr role="row">
                <th>Instalamento(s)</th>
                <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                    colspan="1" aria-label="Add row">

                    <button onclick="addInstalamento(event)" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                </th>
            </tr>
        </thead>

        <tbody id="contadoTableBody">
            <tr>
                <th style="text-align: center;">
                    <input type="text" placeholder="..." name="installation[]">
                </th>
                <th style="text-align: center;">
                    <input type="date"  name="date_installation[]">
                </th>
                <th>
                </th>
            </tr>

        </tbody>
    </table>

    <p class="slipP">
        El incumplimiento del pago de la prima en plazo máximo establecido, liberara al reasegurador de toda
        responsabilidad en caso de ocurrir un siniestro y anulara el respaldo desde el inicio de vigencia.
    </p>
</div>
