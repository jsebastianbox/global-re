{{-- Fidelidad --}}
<form enctype="multipart/form-data" method="POST" id="finanzas_1_form" class="form fianzas" style="display: none">
    <!-- One "tab" for each step in the form: -->

    @csrf
    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
    <input type="hidden" name="type_slip" value="finanzas_1_form">
    <input hidden type="number" name="slip_status" value="3">
    <div class="tab">

        <div class="row">
            @include('admin.comercial.include.person_index')
        </div>

        <div class="row my-3">
            <div class="col-md-6">

                <div class="input-group mb-3">
                    <label class="input-group-text" for="tecnico">Asignar t&eacute;cnico</label>

                    <select class="js-example-basic-single inputForm select_assigned form-select" name="user_id">
                    </select>

                </div>
            </div>
        </div>



        <div class="row mb-3">
            <label class="lead">Límite Colusorio</label>
            <hr>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text">Numérico</label>
                    <input type="number" step="any" placeholder="0" name="limit_colusorio_value"
                        data-money>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text">Texto</label>
                    <input type="text" placeholder="..." name="limit_colusorio_text">
                </div>
            </div>
        </div>


        <div class="row mb-3">
            <label class="lead">Objeto(s) Asegurado(s)</label>
            <hr>
        </div>

        <div class="row my-3">
            <div class="col-md-6">
                <label class="input-group-text" for="desglose">Agregar archivo si hay 20 o más</label>
                <input type="file" name="" id="">
            </div>
        </div>

        <div class="row">
            <div class="tableContainer" style="margin: 2rem 0">
                <table id="fianzas_fidelidadTableObjetosSeguro" class="table table-striped table-bordered no-footer"
                    cellspacing="0" width="80%" aria-describedby="example_info">
                    <thead>
                        <tr role="row">
                            <th>Número</th>
                            <th>Nombre(s)</th>
                            <th>Cargo</th>
                            <th>Ingreso anual</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                                colspan="1" aria-label="Add row">

                                <button onclick="addRowObjetoSeguro(event, 'fianzas_fidelidad')"
                                    class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>

                    <tbody id="fianzas_fidelidadObjetosTableBody">
                        <tr>
                            <th>
                                <input type="text" name="number[]" placeholder="...">
                            </th>
                            <th>
                                <input type="text" name="name[]" placeholder="...">
                            </th>
                            <th>
                                <input type="text" name="activity_merchant[]">
                            </th>

                            <th>
                                <input type="text" name="limit[]" placeholder="...">
                            </th>
                            <th></th>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="tab">
        <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label for="limiteIndemnizacion" class="input-group-text">Límite de indemnización</label>
                    <input type="number" step="any" name="limit_compensation" id="limiteIndemnizacion"
                        data-money>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label for="limit_aggregate" class="input-group-text">Límite Agregado</label>
                    <input type="number" step="any" name="limit_aggregate" id="limit_aggregate"
                        data-money>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <label class="lead">Coberturas adicionales</label>
            <hr>
        </div>

        <div class="row">
            <div class="tableContainer" style="margin: 2rem 0">
                <table id="fianzas_fidelidadCoberturasAdicionalesTable" class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Coberturas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                                colspan="1" aria-label="Add row">

                                <button type="button"
                                    onclick="addRowCoberturaV2(event, 'fianzas_fidelidad', 'fianzas', 'fidelidad')"
                                    class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="fianzas_fidelidadCoberturasAdicionalesTableBody">

                        <tr>
                            <td>1</td>
                            <td>
                                <select name="description_coverage_additional[]" class="selectCobertura">
                                    <option selected disabled>Seleccionar</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" placeholder="..." name="coverage_additional_additional[]">
                            </td>
                            <td>
                                <input type="number" step="any" placeholder="0"
                                    name="coverage_additional_usd[]" data-money>
                            </td>
                            <td>
                                <input type="text" placeholder="..." name="coverage_additional_additional2[]">
                            </td>
                        </tr>

                    </tbody>

                </table>
            </div>
        </div>

        <div class="row mb-3">
            <label class="lead">Cláusulas adicionales</label>
            <hr>
        </div>

        <div class="row">
            <div class="tableContainer" style="margin: 2rem 0">
                <table id="fianzas_fidelidadClausulasAdicionalesTable" class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Cláusulas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                                colspan="1" aria-label="Add row">

                                <button type="button"
                                    onclick="addRowClausula(event, 'fianzas_fidelidad', 'fianzas', 'fidelidad')"
                                    class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="fianzas_fidelidadClausulasAdicionalesTableBody">

                        <tr>
                            <td>1</td>
                            <td>
                                <select name="description_clause_additional[]"class="selectClausula">
                                    <option selected disabled>Seleccionar</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" placeholder="..." name="clause_additional_additional[]">
                            </td>
                            <td>
                                <input type="number" step="any" placeholder="0" name="clause_additional_usd[]"
                                    data-money>
                            </td>
                            <td>
                                <input type="text" placeholder="..." name="clause_additional_additional2[]">
                            </td>
                        </tr>

                    </tbody>

                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="reinsurer_rate">Tasa de reaseguros</label>
                    <input class="inputForm" type="number" step="any" name="reinsurer_rate"
                        id="reinsurer_rate"><span class="input-group-text">%</span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="deducible">Prima de reaseguros</label>
                    <input class="inputForm" type="number" step="any" placeholder="USD"
                        name="reinsurance_premium" data-money>
                </div>
            </div>
        </div>

        <div class="row">
            <label class="lead">Deducibles</label>
            <hr style="background-color: darkgray">
        </div>
        <div id="fidelidadDeduciblesContainer" class="row">
            <div class="flexColumnCenterContainer" style="margin:1rem 0">
                {{-- <div class="flexRowWrapContainer" style="margin:1.2rem 0"> --}}
                <div class="d-flex mb-2">
                    <div class="input-group">
                        <input class="form-control" type="text" name="description_deductible[]"
                            placeholder="Detalle..">
                        <input class="form-control" type="number" min="0" max="100" step="any"
                            placeholder="%" name="sinister_value[]" min="0">
                        <span class="input-group-text">valor del siniestro</span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">%</span>
                        <input class="form-control" type="number" min="0" max="100" step="any"
                            name="insured_value[]">
                        <span class="input-group-text">del valor asegurado</span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">mínimo</span>
                        <input class="form-control" type="text" name="minimum[]" placeholder="...">
                        <textarea rows="1" type="text" name="description2_deductible[]" placeholder="Descripción del deducible..."></textarea>
                    </div>

                        

                </div>
            </div>
        </div>
        <div class="row col-md-4 mb-4" style="margin-inline: .1rem">
            <button type="button" class="btn btn-info" style="color: white"
                onclick="addDeducible(event, 'fidelidad')">Agregar deducible</button>
        </div>
    </div>

    <div class="tab">

        @include('admin.comercial.include.leyJurisdiccion')

        <div class="row mb-3">

            <div class="col-md-12">
                <div style="input-group">
                    <label class="input-group-text" for="accidentRate">Siniestralidad de los últimos 5 años</label>
                    <input class="inputForm" type="file" name="accidentRate" id="accidentRate">
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div style="input-group">
                    <label class="input-group-text" for="accidentRate">Formulario de cotización relleno y
                        firmado</label>
                    <input class="inputForm" type="file" name="quotationReport" id="quotationReport">
                </div>
            </div>
            <div class="col-md-6">
                <div style="input-group">
                    <label class="input-group-text" for="accidentRate">Estados Financieros</label>
                    <input class="inputForm" type="file" name="financialReport" id="financialReport">
                </div>
            </div>

        </div>
    </div>
    <div>
        <div style="float:right;" class="row">
            <p>
            <div class="col-md">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-info mx-2"
                    style="color: white">Atrás</button>
                {{-- <button type="button" id="submitBtn" class="submitButton" onclick="submitForm('vida_form')"
                    style="display: none">Guardar</button> --}}
            </div>
            <div class="col-md">
                <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-info mx-2"
                    style="color: white">Siguiente</button>
                <button type="submit" id="submitBtn" style="display: none" class="btn btn-info mx-2"
                onclick="jqsubmit()" style="color: white">Enviar</button>

            </div>
            </p>
        </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
</form>
