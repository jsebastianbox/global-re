<div class="tableContainer" style="1.2rem 0">
    <h4 class="slipTitle">Aclaraciones</h4>
    <div class="flexColumnCenterContainer" style="max-width:450px">
        <textarea placeholder="..." name="clarification"></textarea>
    </div>
</div>

<div class="tableContainer" style="1.2rem 0">
    <h4 class="slipTitle">Tasa/Prima de Reaseguros</h4>

    <div class="two-sides">
        <div class="left_side">
            <div class="input_group">
                <label>Tasa de reaseguros:</label>
                <input type="number" name="reinsurer_rate" value="{{$slip->reinsurer_rate}}">
            </div>
        </div>
        <div class="right_side">
            <div class="input_group">
                <label>Prima de reaseguros:</label>
                <input type="number" name="reinsurance_premium" value="{{$slip->reinsurance_premium}}">
            </div>
        </div>
    </div>

    <div class="flexColumnCenterContainer">

        <!-- Button trigger modal -->
        @include('admin.tablas.calculo')

    </div>
</div>

<div class="tableContainer">
    <h4 class="slipTitle selectLey">Garantía De Pago De Primas</h4>

    @include('admin.tecnico.slip.slips_generales.tableGarantia')

</div>


<div class="tableContainer" style="1.2rem 0">
    <h4 class="slipTitle">Notificación de Siniestros</h4>

    <textarea name="note_sinester" id="" cols="30" rows="10"></textarea>

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
