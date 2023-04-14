{{-- Vida y accidentes personales --}}
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
    
    <div class="card px-4 py-2">
        <form method="POST" action="{{ route('slip.update', $slip->id) }}" id="vida_form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- <input type="hidden" name="type_slip" value="vida_forms"> --}}
            {{-- <input hidden type="number" name="slip_status" value="3"> --}}
            <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">

            <div class="row">
                @include('admin.comercial.include.person_index')
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="tecnico">Asignar t&eacute;cnico</label>
                        <select class="js-example-basic-single inputForm select_assigned form-select" name="user_id">
                            <option selected value="{{ $users->find($slip->user_id)->id }}">
                                {{ $users->find($slip->user_id)->name . ' ' . $users->find($slip->user_id)->surname }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6" id="cumuloAsegurable" style="{{$slip->insurable_value > 0 ? 'display:flex' : 'display:none'}}">
                    <div class="input-group mb-3">
                        <label class="input-group-text">Cúmulo asegurable</label>
                        <input type="number" step="any" name="insurable_value" placeholder="..." value="{{$slip->insurable_value}}">
                    </div>
                </div>
            </div>

            <label for="" class="lead">Coberturas adicionales</label>
            <hr style="background-color: darkgrey; width: 70%">

            <div class="row">
                @include('admin.comercial.include.edit_tablaCoberturas')
            </div>

            <label class="lead">Cláusulas adicionales</label>
            <hr style="background-color: darkgrey; width: 70%">
            
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
                            id="reinsurer_rate" value="{{ $slip->reinsurer_rate }}"><span class="input-group-text">%</span>
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

            <label class="lead" for="detalleValor">Listado de personas a ser aseguradas</label>
            <hr style="background-color:darkgrey;width:70%;">

            <div class="row">
                <div class="tableContainer" style="margin: 2rem 0">
                    <table id="vidaListadoPersonasAseguradasTable" class="indemnizacionTable">
                        <thead>
                            <tr>
                                <th style="text-align: center; width: 42px;">#</th>
                                <th style="text-align: center">Nombre</th>
                                <th style="text-align: center">Fecha de Nacimiento</th>
                                <th style="text-align: center">Edad</th>
                                <th style="text-align: center">Sexo</th>
                                <th style="text-align: center">Actividad</th>
                                <th style="text-align: center">Límite</th>
                                <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                                    colspan="1" aria-label="Add row">

                                    <button type="button" onclick="addPersonaAseguradaRow(event, 'vida')"
                                        class="btn btn-success btn-xs">
                                        +
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        {{-- tbody --}}
                        <tbody id="vidaListadoPersonasAseguradasTableBody">
                            @if (count($object_insurance) > 0)
                                @foreach ($object_insurance as $key => $item )
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>
                                            <input value="{{$item->name}}" type="text" name="name[]" placeholder="Nombre..">
                                        </td>

                                        <td>
                                            <input value="{{$item->birthday}}" type="date" name="birthday[]" id="birthDate" class="birthdateInput" oninput="putAge('personaAdicional')">
                                        </td>

                                        <td>
                                            <input value="{{$item->age}}" type="number" class="ageInput" name="age[]" id="personAge" min="1"
                                                    max="110">
                                        </td>

                                        <td>
                                            <select name="sex_merchant[]" id="sex">
                                                <option value="Masculino" {{$item->sex_merchant == 'Masculino' ? 'selected' : ''}}>Masculino</option>
                                                <option value="Femenino" {{$item->sex_merchant == 'Femenino' ? 'selected' : ''}}>Femenino</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input value="{{$item->activity_merchant}}" type="text" placeholder="..." name="activity_merchant[]">
                                        </td>
                                        <td>
                                            <input value="{{$item->limit}}" type="text" placeholder="..." name="limit[]">
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <input type="text" name="name[]" placeholder="Nombre..">
                                    </td>

                                    <td>
                                        <input type="date" name="birthday[]" id="birthDate" class="birthdateInput" oninput="putAge('personaAdicional')">
                                    </td>

                                    <td>
                                        <input type="number" class="ageInput" name="age[]" id="personAge" min="1"
                                                max="110">
                                    </td>

                                    <td>
                                        <select name="sex_merchant[]" id="sex">
                                            <option value="m" selected>Masculino</option>
                                            <option value="f">Femenino</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" placeholder="..." name="activity_merchant[]">
                                    </td>
                                    <td>
                                        <input type="text" placeholder="..." name="limit[]">
                                    </td>
                                </tr>
                            @endif
                        </tbody>

                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input class="form-control" type="file" name="accidentRate" id="accidentRate">
                        <label class="input-group-text" for="accidentRate">Siniestralidad de los últimos 5 años
                        </label>
                    </div>
                </div>
            </div>

            @include('admin.comercial.include.leyJurisdiccion')

            <div>
                <div style="float:right;" class="row">
                    <div class="input-group mb-3">
                        <div class="col-md">
                            <button type="submit" id="submitBtn" class="btn btn-info mx-2"
                                style="color: white">Enviar al dpto. Técnico</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@else
    <form method="POST"   id="vida_form" class="form vida" style="display: none"
        enctype="multipart/form-data">
        <!-- One "tab" for each step in the form: -->
        @csrf
        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
        <input type="hidden" name="type_slip" value="vida_forms">
        <input hidden type="number" name="slip_status" value="3">

        <div class="tab">

            <div class="row">
                @include('admin.comercial.include.person_index')
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="tecnico">Asignar t&eacute;cnico</label>
                        <select class="js-example-basic-single inputForm select_assigned form-select" name="user_id">
                        </select>
                    </div>
                </div>
                <div class="col-md-6" id="cumuloAsegurable" style="display: none">
                    <div class="input-group mb-3">
                        <label class="input-group-text">Cúmulo asegurable</label>
                        <input type="number" step="any" name="insurable_value" placeholder="...">
                    </div>
                </div>
                
            </div>
            
        </div>

        <div class="tab">
            <label for="" class="lead">Coberturas adicionales</label>
            <hr>

            <div class="row">
                <div class="tableContainer" style="margin: 2rem 0">
                    <table id="vida_formsCoberturasAdicionalesTable" class="indemnizacionTable">
                        <thead>
                            <tr>
                                <th style="text-align: center; width: 42px;">#</th>
                                <th style="text-align: center">Coberturas</th>
                                <th style="text-align: center">Campo adicional</th>
                                <th style="text-align: center">USD</th>
                                <th style="text-align: center">Campo adicional</th>
                                <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                                    colspan="1" aria-label="Add row">

                                    <button type="button" onclick="addRowCoberturaV2(event, 'vida_forms', 'vida', 'vida')"
                                        class="btn btn-success btn-xs">
                                        +
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        {{-- tbody --}}
                        <tbody id="vida_formsCoberturasAdicionalesTableBody">

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
                                    <input type="number" placeholder="0" name="coverage_additional_usd[]"
                                        data-money>
                                </td>
                                <td>
                                    <input type="text" placeholder="..." name="coverage_additional_additional2[]">
                                </td>
                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>

            <label class="lead">Cláusulas adicionales</label>
            <hr>
            <div class="row">
                <div class="tableContainer" style="margin: 2rem 0">
                    <table id="vidaClausulasAdicionalesTable" class="indemnizacionTable">
                        <thead>
                            <tr>
                                <th style="text-align: center; width: 42px;">#</th>
                                <th style="text-align: center">Cláusulas</th>
                                <th style="text-align: center">Campo adicional</th>
                                <th style="text-align: center">USD</th>
                                <th style="text-align: center">Campo adicional</th>
                                <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                                    colspan="1" aria-label="Add row">

                                    <button type="button" onclick="addRowClausula(event, 'vida', 'vida', 'vida')"
                                        class="btn btn-success btn-xs">
                                        +
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        {{-- tbody --}}
                        <tbody id="vidaClausulasAdicionalesTableBody">

                            <tr>
                                <td>1</td>
                                <td>
                                    {{-- <textarea name="description_clause_additional[]"></textarea> --}}
                                    <select class="selectClausula" name="description_clause_additional[]"></select>
                                </td>
                                <td>
                                    <input type="text" placeholder="..." name="clause_additional_additional[]">
                                </td>
                                <td>
                                    <input type="number" placeholder="0" name="clause_additional_usd[]"
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
        </div>

        <div class="tab">
            <div class="flexColumnCenterContainer">
                <label for="" class="lead">Tasa/Prima</label>
                <hr>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="reinsurer_rate">Tasa de reaseguros</label>
                        <input class="inputForm" type="number" step="any" name="reinsurer_rate" id="reinsurer_rate"><span
                            class="input-group-text">%</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="deducible">Prima de reaseguros</label>
                        <input class="inputForm" type="number" step="any" placeholder="USD" name="reinsurance_premium"
                            data-money>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="flexColumnCenterContainer" style="margin:1rem 0">
                    <label class="lead">Deducibles</label>
                    <hr style="background-color: darkgray">
                </div>
            </div>
            <div id="vidaDeduciblesContainer" class="row">
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
                    onclick="addDeducible(event, 'vida')">Agregar deducible</button>
            </div>
        </div>


        <div class="tab">

            <label class="lead" for="detalleValor">Listado de personas a ser aseguradas</label>
            <hr>

            <div class="row">
                <div class="tableContainer" style="margin: 2rem 0">
                    <table id="vidaListadoPersonasAseguradasTable" class="indemnizacionTable">
                        <thead>
                            <tr>
                                <th style="text-align: center; width: 42px;">#</th>
                                <th style="text-align: center">Nombre</th>
                                <th style="text-align: center">Fecha de Nacimiento</th>
                                <th style="text-align: center">Edad</th>
                                <th style="text-align: center">Sexo</th>
                                <th style="text-align: center">Actividad</th>
                                <th style="text-align: center">Límite</th>
                                <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                                    colspan="1" aria-label="Add row">

                                    <button type="button" onclick="addPersonaAseguradaRow(event, 'vida')" id="btnAddPersonaAsegurada"
                                        class="btn btn-success btn-xs" style="display: none">
                                        +
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        {{-- tbody --}}
                        <tbody id="vidaListadoPersonasAseguradasTableBody">

                            <tr>
                                <td>1</td>
                                <td>
                                    <input type="text" name="name[]" placeholder="Nombre..">
                                </td>

                                <td>
                                    <input type="date" name="birthday[]" id="birthDate" class="birthdateInput" oninput="putAge('personaAdicional')">
                                </td>

                                <td>
                                    <input type="number" class="ageInput" name="age[]" id="personAge" min="1"
                                            max="110">
                                </td>

                                <td>
                                    <select name="sex_merchant[]" id="sex">
                                        <option value="" selected disabled>Seleccionar</option>
                                        <option value="Masculino" selected>Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" placeholder="..." name="activity_merchant[]">
                                </td>
                                <td>
                                    <input type="text" placeholder="..." name="limit[]">
                                </td>
                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input class="form-control" type="file" name="accidentRate" id="accidentRate">
                        <label class="input-group-text" for="accidentRate">Siniestralidad de los últimos 5 años
                        </label>
                    </div>
                </div>
            </div>

            @include('admin.comercial.include.leyJurisdiccion')
        </div>

        <div>
            <div style="float:right;" class="row">
                <div class="input-group mb-3">
                    <div class="col-md">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-info mx-2"
                            style="color: white">Atrás</button>
                        {{-- <button type="button" id="submitBtn" class="submitButton" onclick="submitForm('vida_form')"
                        style="display: none">Guardar</button> --}}

                        <button type="submit" id="submitBtn" style="display: none" class="btn btn-info mx-2"
                        onclick="jqsubmit()"  style="color: white">Enviar</button>

                    </div>
                    <div class="col-md">
                        <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-info mx-2"
                            style="color: white">Siguiente</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>
@endif