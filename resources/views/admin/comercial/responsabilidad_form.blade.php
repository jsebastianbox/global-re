{{-- Responsabilidad Civil --}}
@section('tab_title')
    <div id="date"></div>
    <script>
        function updateClock() {
            const months = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre',
                'octubre', 'noviembre', 'diciembre'
            ];
            const days = ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'];

            const now = new Date();
            const day = days[now.getDay()];
            const date = now.getDate();
            const month = months[now.getMonth()];
            const year = now.getFullYear();
            const hour = now.getHours().toString().padStart(2, '0');
            const minute = now.getMinutes().toString().padStart(2, '0');
            const second = now.getSeconds().toString().padStart(2, '0');

            const dateString =
                `Comercial — Editar Compromiso | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@if (\Illuminate\Support\Str::contains(\Illuminate\Support\Facades\Request::url(), '/admin/comercial/edit_compromiso/'))
    <style>
        hr {
            background-color: darkgrey;
            width: 70%
        }

        .select2 {
            max-width: min-content;
        }

        .select2-container--default .select2-selection--single {
            height: 2.35rem;
        }
 
        /* .select2-container--open .select2-dropdown--below {
    margin-top: 1.3rem;
    } */

        form select {
            background: transparent;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/admin/comercial/compromisos.css') }}">
    <script src="{{ asset('js/admin/comercial/compromiso.js') }}" defer></script>


    {{-- TODO: bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    {{-- david --}}

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/admin/comercial/ajax.js') }}" defer></script>

    <div class="card" style="padding-inline: 1rem; padding-block: 1.75rem">
        <form enctype="multipart/form-data" method="POST" action="{{ route('slip.update', $slip->id) }}"
            id="responsabilidad_form">

            @csrf
            <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
            @method('PUT')
            <input type="hidden" name="type_slip" value="responsabilidad_form">
            <input hidden type="number" name="slip_status" value="3">

            @include('admin.comercial.include.object_index')
            

            <div class="row">
                <label for="" class="lead">Límite de indemnización</label>
                <hr>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <label for="limit_event" class="input-group-text">
                            <i class="fa-solid fa-rectangle-list"></i>
                            Límite único combinado por evento
                        </label>
                        <input type="number" step="any" id="" name="limit_event" placeholder="USD" value="{{ $slip_type->limit_event }}"
                            data-money>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <label for="limit_annual" class="input-group-text">
                            <i class="fa-solid fa-rectangle-list"></i>
                            Límite agregado anual
                        </label>
                        <input type="number" step="any" id="" name="limit_annual" placeholder="USD"
                            data-money  value="{{ $slip_type->limit_annual}}"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="lead">Coberturas adicionales</label>
                <hr style="background-color: darkgrey; width: 70%">
            </div>
    
            <div class="row">
                @include('admin.comercial.include.edit_tablaCoberturas')
            </div>
    
            <div class="row">
                <label class="lead">Cláusulas adicionales</label>
                <hr style="background-color: darkgrey; width: 70%">
            </div>
    
            <div class="row">
                @include('admin.comercial.include.edit_tablaClausulas')
            </div>
    
            <label for="" style="max-width:300px" class="lead">Tasa/Prima</label>
            <hr style="background-color:darkgrey;width:70%;">
    
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="reinsurer_rate">Tasa de reaseguros</label>
                        <input type="number" step="any" name="reinsurer_rate"
                            id="reinsurer_rate" value="{{ $slip->reinsurer_rate }}"><span
                            class="input-group-text">%</span>
                    </div>
                </div>
    
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="deducible">Prima de reaseguros</label>
                        <input type="number" step="any" data-money placeholder="USD"
                            name="reinsurance_premium" value="{{ $slip->reinsurance_premium }}">
                    </div>
                </div>
            </div>
    
    
            <div class="row">
                <label class="lead">Deducibles</label>
                <hr style="background-color: darkgrey; width: 70%">
            </div>
    
            @include('admin.comercial.include.edit_deducibles')
    

            @include('admin.comercial.include.leyJurisdiccion')

            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <label class="input-group-text" for="pastYearIncome">Ingreso bruto del año anterior</label>
                        <input type="number" step="any" name="ingress_previous_year" id="pastYearIncome" value="{{ $slip_type->ingress_previous_year }}"
                            data-money>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <label class="input-group-text" for="estimatedIncome">Ingreso estimado del año en
                            curso</label>
                        <input type="number" step="any" name="ingress_present_year" id="estimatedIncome" value="{{ $slip_type->ingress_present_year }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <label class="input-group-text" for="estimatedIncomenextYear">Ingreso estimado del próximo
                            año</label>
                        <input type="number" step="any" name="ingress_next_year" id="estimatedIncomenextYear" value="{{ $slip_type->ingress_next_year }}"
                            data-money>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <label class="input-group-text" for="employeeCount">Número de empleados</label>
                        <input type="number" step="any" name="num_employee" id="employeeCount" value="{{ $slip_type->num_employee }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <label class="input-group-text" for="vehicleCount">Número de vehículos</label>
                        <input type="number" step="any" name="num_vehicle" id="vehicleCount" value="{{ $slip_type->num_vehicle }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <label class="input-group-text" for="payRoll">Valor de la nómina</label>
                        <input type="number" step="any" name="value_payroll" id="payRoll" data-money value="{{ $slip_type->value_payroll }}">
                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <label class="input-group-text" for="quotationReport">Formulario de cotización relleno y
                            firmado</label>
                        <input class="inputForm" type="file" name="quotationReport" id="quotationReport">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <label class="input-group-text" for="financialStatements">Estados financieros</label>
                        <input class="inputForm" type="file" name="financialStatements" id="financialStatements">
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <label class="input-group-text" for="accidentRate">Siniestralidad de los últimos 5 años</label>
                    <input class="inputForm" type="file" name="accidentRate" id="accidentRate" value="{{ $slip->accidentRate }}">
                </div>

            </div>

            <div>
                <div style="float:right;" class="row">
                    <p>
                    <div class="col-md">
                        <button type="submit" id="submitBtn" class="btn btn-info mx-2" style="color: white">Enviar
                            a dpto. Técnico</button>
                    </div>
                    </p>
                </div>
            </div>
        </form>
    </div>
@else
    <form enctype="multipart/form-data" method="POST"  
        id="responsabilidad_form" class="form responsabilidad" style="display: none">
        <!-- One "tab" for each step in the form: -->

        @csrf
        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
        <input type="hidden" name="type_slip" value="responsabilidad_form">
        <input hidden type="number" name="slip_status" value="3">

        <div class="tab">
            @include('admin.comercial.include.object_index')
        </div>

        <div class="tab">
            <div class="row">
                <label for="" class="lead">Límite de indemnización</label>
                <hr>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <label for="limit_event" class="input-group-text">
                            Límite único combinado por evento
                        </label>
                        <input type="number" step="any" id="" name="limit_event" placeholder="USD"
                            data-money>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <label for="limit_annual" class="input-group-text">
                            Límite agregado anual
                        </label>
                        <input type="number" step="any" id="" name="limit_annual" placeholder="USD"
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
                    <table id="responsabilidadCoberturasAdicionalesTable" class="indemnizacionTable">
                        <thead>
                            <tr>
                                <th style="text-align: center; width: 42px;">#</th>
                                <th style="text-align: center">Coberturas</th>
                                <th style="text-align: center">Campo adicional</th>
                                <th style="text-align: center">USD</th>
                                <th style="text-align: center">Campo adicional</th>
                                <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                                    colspan="1" aria-label="Add row">

                                    <button type="button" onclick="addRowCoberturaV2(event, 'responsabilidad', 'responsabilidad_civil', 'all')"
                                        class="btn btn-success btn-xs">
                                        +
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        {{-- tbody --}}
                        <tbody id="responsabilidadCoberturasAdicionalesTableBody">

                            <tr>
                                <td>1</td>
                                <td>
                                    <select name="description_coverage_additional[]" class="selectCobertura">
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
                    <table id="responsabilidadClausulasAdicionalesTable" class="indemnizacionTable">
                        <thead>
                            <tr>
                                <th style="text-align: center; width: 42px;">#</th>
                                <th style="text-align: center">Cláusulas</th>
                                <th style="text-align: center">Campo adicional</th>
                                <th style="text-align: center">USD</th>
                                <th style="text-align: center">Campo adicional</th>
                                <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                                    colspan="1" aria-label="Add row">

                                    <button type="button" onclick="addRowClausula(event, 'responsabilidad', 'responsabilidad_civil', 'extracontractual')"
                                        class="btn btn-success btn-xs">
                                        +
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        {{-- tbody --}}
                        <tbody id="responsabilidadClausulasAdicionalesTableBody">

                            <tr>
                                <td>1</td>
                                <td>
                                     <select name="description_clause_additional[]" class="selectClausula">
                                        <option selected disabled>Seleccionar</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" placeholder="..." name="clause_additional_additional[]">
                                </td>
                                <td>
                                    <input type="number" step="any" placeholder="0"
                                        name="clause_additional_usd[]" data-money>
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
            <div id="responsabilidad_formDeduciblesContainer" class="row">
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
                    onclick="addDeducible(event, 'responsabilidad_form')">Agregar deducible</button>
            </div>


        </div>

        <div class="tab">

            @include('admin.comercial.include.leyJurisdiccion')

            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <label class="input-group-text" for="pastYearIncome">Ingreso bruto del año anterior</label>
                        <input type="number" step="any" name="ingress_previous_year" id="pastYearIncome"
                            data-money>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <label class="input-group-text" for="estimatedIncome">Ingreso estimado del año en
                            curso</label>
                        <input type="number" step="any" name="ingress_present_year" id="estimatedIncome">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <label class="input-group-text" for="estimatedIncomenextYear">Ingreso estimado del próximo
                            año</label>
                        <input type="number" step="any" name="ingress_next_year" id="estimatedIncomenextYear"
                            data-money>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <label class="input-group-text" for="employeeCount">Número de empleados</label>
                        <input type="number" step="any" name="num_employee" id="employeeCount">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <label class="input-group-text" for="vehicleCount">Número de vehículos</label>
                        <input type="number" step="any" name="num_vehicle" id="vehicleCount">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <label class="input-group-text" for="payRoll">Valor de la nómina</label>
                        <input type="number" step="any" name="value_payroll" id="payRoll" data-money>
                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <label class="input-group-text" for="quotationReport">Formulario de cotización relleno y
                            firmado</label>
                        <input class="inputForm" type="file" name="quotationReport" id="quotationReport">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <label class="input-group-text" for="financialStatements">Estados financieros</label>
                        <input class="inputForm" type="file" name="financialStatements" id="financialStatements">
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <label class="input-group-text" for="accidentRate">Siniestralidad de los últimos 5 años</label>
                    <input class="inputForm" type="file" name="accidentRate" id="accidentRate">
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
@endif
