<style>

</style>
<div id="securityContainer">

    <div class="tableContainer table">

        <p class="slipTitle">Proporcional</p>

        <table id="proportionalTable" class="indemnizacionTable tableSecurity">
            <thead>
                <tr role="row">
                    <th style="text-align: center;">#</th>
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
                <tr>
                    <td>
                        1
                    </td>
                    <td>
                        <select class="select_insurence js-example-basic-single inputForm" name="name_insurer[]">
                        </select>
                    </td>
                    <td>
                        <input onkeyup="securitySuma()" type="number" id="securityPorcentaje1" name="porcentage[]"
                            class="inputNumber" value="0" min="0">
                    </td>
                    <td></td>

                </tr>

                <tr>
                    <td>
                        2
                    </td>
                    <td>
                        <select class="select_insurence js-example-basic-single inputForm" name="name_insurer[]">
                        </select>
                    </td>
                    <td>
                        <input onkeyup="securitySuma()" type="number" id="securityPorcentaje2" name="porcentage[]"
                            class="inputNumber" value="0" min="0">
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        3
                    </td>
                    <td>
                        <select class="select_insurence js-example-basic-single inputForm" name="name_insurer[]">
                        </select>
                    </td>
                    <td>
                        <input onkeyup="securitySuma()" type="number" id="securityPorcentaje3" name="porcentage[]"
                            class="inputNumber" value="0" min="0">
                    </td>
                    <td></td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <td>
                    </td>
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
                    <th style="text-align: center;">#</th>
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
                <tr>
                    <td>
                        1
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
                        <input type="text" id="securityXs" class="inputNumber" value="XS" disabled hidden>
                        <span>XS</span>
                    </td>
                    <td>
                        <input type="number" id="securityPrioridad" class="inputNumber" value="0" min="0">
                    </td>
                    <td></td>

                </tr>

                <tr>
                    <td>
                        2
                    </td>
                    <td>
                        <select class="select_insurence js-example-basic-single inputForm" name="name_insurer[]">
                        </select>
                    </td>
                    <td>
                        <input onkeyup="securitySuma()" type="number" id="securityPorcentaje2" name="porcentage[]"
                            class="inputNumber" value="0" min="0">
                    </td>
                    <td>
                        <input type="number" id="securityLimite" class="inputNumber" value="0" min="0">
                    </td>
                    <td>
                        <input type="text" id="securityXs" class="inputNumber" value="XS" disabled hidden>
                        <span>XS</span>
                    </td>
                    <td>
                        <input type="number" id="securityPrioridad" class="inputNumber" value="0" min="0">
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        3
                    </td>
                    <td>
                        <select class="select_insurence js-example-basic-single inputForm" name="name_insurer[]">
                        </select>
                    </td>
                    <td>
                        <input onkeyup="securitySuma()" type="number" id="securityPorcentaje3" name="porcentage[]"
                            class="inputNumber" value="0" min="0">
                    </td>
                    <td>
                        <input type="number" id="securityLimite" class="inputNumber" value="0" min="0">
                    </td>
                    <td>
                        <input type="text" id="securityXs" class="inputNumber" value="XS" disabled hidden>
                        <span>XS</span>
                    </td>
                    <td>
                        <input type="number" id="securityPrioridad" class="inputNumber" value="0" min="0">
                    </td>
                    <td></td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <td>
                    </td>
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
