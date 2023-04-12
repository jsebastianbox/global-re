<style>
    #securityContainer {
        display: grid;
        place-content: center;
        grid-template-areas: 'l r';
        grid-gap: 5rem;
    }

    #securityContainer .table {
        grid-area: 'l';
    }

    #securityContainer .schema {
        grid-area: 'r';
    }

    select {
        outline: 1px solid rgba(151, 151, 151, 0.35);
        border-radius: 12px;
        background-color: #fff;
        padding: 6px 8px;
        box-shadow: 3px 3px 2px 0px rgb(0 204 255 / 20%);
        -webkit-box-shadow: 3px 3px 2px 0px rgb(0 204 255 / 20%);
        -moz-box-shadow: 3px 3px 2px 0px rgba(0, 0, 0, 0.2);
    }

    .selectSchema {
        /**/
    }
</style>
<div id="securityContainer">
    <div class="selectSchema">
        <select name="securitySchema" id="securitySchema" onchange="securitySchemaOptions()">
            <option value="proportional" selected>Proporcional</option>
            <option value="nonProportional">No Proporcional</option>
        </select>
    </div>
    <div class="tableContainer table">
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

        <table id="noproportionalTable" class="indemnizacionTable tableSecurity" style="display: none">
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
