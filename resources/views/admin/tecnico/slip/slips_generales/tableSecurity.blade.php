<style>

</style>
<div id="securityContainer">

    <div class="tableContainer table">

        <button type="button" onclick="putReinsurersInSecurity()">Actualizar</button>

        <p class="slipTitle">Proporcional</p>

        <table id="proportionalTable" class="indemnizacionTable tableSecurity">
            <thead>
                <tr role="row">
                    <th style="text-align: center;">Nombre del reasegurador</th>
                    <th style="text-align: center;">Porcentaje</th>
                    <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1"
                        aria-label="Add row">

                        <button onclick="addRowSecurityProportional(event)" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                    </th>

                </tr>
            </thead>

            <tbody id="proportionalTableBody">
                <tr id="newRowProportionalSecurity1">
                    <td class="security_proportional_reinsurers">
                        <select class="select_reinsurer js-example-basic-single inputForm" name="np_name_reinsurer[]">
                        </select>
                    </td>
                    <td>
                        <input onkeyup="securitySuma()" type="number" name="proportional_porcentage[]"
                            class="inputNumber" value="0" min="0">
                    </td>
                    <td>
                        <button id="1" type="button"  class="btn btn-danger btn-xs btn-delete-proportional">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                    </td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <td style="text-align: center;">
                        <h5 class="slipTitle">Total:</h5>
                    </td>
                    <td style="text-align: center;">
                        <span id="proportionalTotal" class="slipTitle">0</span>%
                    </td>
                    <td></td>
                </tr>
            </tfoot>

        </table>

        <p class="slipTitle marginTop">No proporcional</p>

        <table id="noproportionalTable" class="indemnizacionTable tableSecurity">
            <thead>
                <tr role="row">
                    <th style="text-align: center;">Nombre del reasegurador</th>
                    <th style="text-align: center;">Porcentaje</th>
                    <th style="text-align: center;">Límite</th>
                    <th style="text-align: center;"></th>
                    <th style="text-align: center;">Prioridad</th>
                    <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1"
                        aria-label="Add row">

                        <button onclick="addRowSecurityNoProportional(event)" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                    </th>

                </tr>
            </thead>

            <tbody id="noproportionalTableBody">
                <tr id="newRowNpSecurity1">
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
                    <td>
                        <button id="1" type="button"  class="btn btn-danger btn-xs btn-delete-np">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                    </td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <td style="text-align: center;">
                        <h5 class="slipTitle">Total:</h5>
                    </td>
                    <td style="text-align: center;">
                        <span id="noproportionalTotal" class="slipTitle">0</span>%
                    </td>
                    <td></td>
                </tr>
            </tfoot>

        </table>
    </div>

</div>
