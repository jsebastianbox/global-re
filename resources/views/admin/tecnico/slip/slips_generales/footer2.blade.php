
<div class="tableContainer" style="1.2rem 0">
    <h4 class="slipTitle">Retención de reaseguros</h4>

    <table class="indemnizacionTable">
        <thead>
            <tr role="row">
                <th style="text-align: center;">Porcentaje</th>
                <th style="text-align: center;">p/d</th>
                <th style="text-align: center;">Porcentaje</th>

            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <input type="number" name="retention_porcentage_one[]" class="inputNumber" placeholder="0">
                    <span class="marginLeftBold">%</span>
                </td>
                <td>
                    <p>p/d</p>
                </td>
                <td>
                    <input type="number" name="retention_porcentage_two[]" class="inputNumber" placeholder="0">
                    <span class="marginLeftBold">%</span>
                </td>

            </tr>
        </tbody>
    </table>

    {{-- <div class="flexColumnCenterContainer">
        <textarea placeholder="p/d 100%" name="reinsurance_withholding"></textarea>
    </div> --}}
</div>

<div class="tableContainer" style="1.2rem 0">
    <h4 class="slipTitle">Cesión de reaseguros</h4>

    <table class="indemnizacionTable">
        <thead>
            <tr role="row">
                <th style="text-align: center;">Porcentaje</th>
                <th style="text-align: center;">p/d</th>
                <th style="text-align: center;">Porcentaje</th>

            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <input type="number" name="cesion_porcentage_one[]" class="inputNumber" placeholder="0">
                    <span class="marginLeftBold">%</span>
                </td>
                <td>
                    <p>p/d</p>
                </td>
                <td>
                    <input type="number" name="cesion_porcentage_two[]" class="inputNumber" placeholder="0">
                    <span class="marginLeftBold">%</span>
                </td>

            </tr>
        </tbody>
    </table>

    {{-- <div class="flexColumnCenterContainer">
        <textarea placeholder="p/d 100%" name="reinsurance_assignment"></textarea>
    </div> --}}
</div>

{{-- Aqui iria security --}}
<div class="tableContainer" style="1.2rem 0">
    <h4 class="slipTitle">Security</h4>

    {{-- @include('admin.tecnico.slip.slips_generales.tableSecurity') --}}
</div>



<div class="tableContainer" style="1.2rem 0">
    <h4 class="slipTitle">Condiciones de Reaseguros</h4>
    <div class="flexColumnCenterContainer">
        <textarea placeholder="..." name="reinsurance_condition"></textarea>
    </div>
</div>
<div class="tableContainer" style="1.2rem 0">
    <h4 class="slipTitle">Sujeto a</h4>
    <div class="flexColumnCenterContainer">
        <textarea placeholder="..." name="subject"></textarea>
    </div>
</div>
<div class="tableContainer" style="1.2rem 0">
    <h4 class="slipTitle">Información</h4>
    <div class="flexColumnCenterContainer">
        <textarea placeholder="..." name="information"></textarea>
    </div>
</div>
