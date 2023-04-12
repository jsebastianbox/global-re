<!-- Script para la funcionalidad del formulario -->
<script src="{{ asset('js/admin/tecnico/calculos.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('css/admin/comercial/calculo.css') }}">

<!-- Modal -->
<div class="modal " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="calculosTable" onsubmit="return calculoValues(event)">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cálculos</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float: right; color: white">Cerrar</button> --}}
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>ISD</td>
                                <td>
                                    <input type="number" name="isd_value" id="isd_value">%
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Impuesto Renta</td>
                                <td>
                                    <input type="number" name="tax_value" id="tax_value">%
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Com Cia. Seguros</td>
                                <td>
                                    <input type="number" name="com_cia_value" id="com_cia_value">%
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Com Global</td>
                                <td>
                                    <input type="number" name="com_global_value" id="com_global_value">%
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Com BMS</td>
                                <td>
                                    <input type="number" name="com_bms_value" id="com_bms_value">%
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Com BQ</td>
                                <td>
                                    <input type="number" name="com_bq_value" id="com_bq_value">%
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <th scope="col">(=) Total</th>
                                <th scope="col">
                                    <span name="subtotal" id="subtotal">0%</span>
                                </th>
                            </tr>
                            <tr>
                                <th></th>
                                <th scope="col">Factor Cálculo</th>
                                <th scope="col">
                                    <span name="factor" id="factor">0%</span>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="save_calculo" data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </form>
    </div>
  </div>

{{-- <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="calculosTable" onsubmit="return calculoValues(event)">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cálculos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>ISD</td>
                                <td>
                                    <input type="number" name="isd_value" id="isd_value">%
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Impuesto Renta</td>
                                <td>
                                    <input type="number" name="tax_value" id="tax_value">%
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Com Cia. Seguros</td>
                                <td>
                                    <input type="number" name="com_cia_value" id="com_cia_value">%
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Com Global</td>
                                <td>
                                    <input type="number" name="com_global_value" id="com_global_value">%
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Com BMS</td>
                                <td>
                                    <input type="number" name="com_bms_value" id="com_bms_value">%
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Com BQ</td>
                                <td>
                                    <input type="number" name="com_bq_value" id="com_bq_value">%
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <th scope="col">(=) Total</th>
                                <th scope="col">
                                    <span name="subtotal" id="subtotal">0%</span>
                                </th>
                            </tr>
                            <tr>
                                <th></th>
                                <th scope="col">Factor Cálculo</th>
                                <th scope="col">
                                    <span name="factor" id="factor">0%</span>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        onclick="return calculoValues(event);">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="save_calculo"
                        onclick="hide()">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div> --}}
