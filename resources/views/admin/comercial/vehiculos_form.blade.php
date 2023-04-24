{{-- Vehículos --}}
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

<script>
    const accidentRate_raw = "{{$accidentRate}}";
    let accidentRate;
    fetch(`data:application/*;base64,${accidentRate_raw}`).then(base64 => base64.blob()).then(blob => {
        accidentRate = URL.createObjectURL(blob)
        const anchor = document.getElementById('accidentRateDownload')
        if (anchor) {
            anchor.href = accidentRate
            anchor.download = 'vida_siniestralidad_previa.{{$accidentRateExtension}}'
        }
    });
    const informe_raw = "{{$informe}}";
    let informe;
    fetch(`data:application/*;base64,${informe_raw}`).then(base64 => base64.blob()).then(blob => {
        informe = URL.createObjectURL(blob)
        const anchor = document.getElementById('informeDownload')
        if (anchor) {
            anchor.href = informe
            anchor.download = 'informe_de_inspección_previa.{{$informeExtension}}'
        }
    });
</script>


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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

{{-- david --}}

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('js/admin/comercial/ajax.js') }}" defer></script>

<div class="card">
    <form enctype="multipart/form-data" method="POST" action="{{ route('slip.update', $slip->id) }}" id="vehiculoslp" style="padding-block: 1rem; padding-inline: 2rem">
        <!-- One "tab" for each step in the form: -->

        @method('PUT')
        @csrf
        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
        <input type="hidden" name="type_slip" value="vehiculo">
        <input hidden type="number" name="slip_status" value="3">

        @include('admin.comercial.include.object_index')

        <div class="row">
            <label class="lead">Detalle del vehículo</label>
            <hr style="background-color: darkgrey; width: 70%">
        </div>
        <div class="row my-2">

            <div class="col-md-12 my-2">

                <div class="d-flex justify-content-center">
                    <table id="vehiculosMatriculasTable" class="table" style="overflow-x: auto;width:500px">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Matrícula</th>
                                <th scope="col"><input type="button" value="Agregar campo" onclick="addMatriculaRow(event)"></th>
                            </tr>
                        </thead>
                        <tbody id="vehiculosMatriculasTableBody">
                            @if (count($vehicles_details) > 0)
                            @foreach ($vehicles_details as $key => $item)
                            <tr>
                                <th scope="row">{{$key + 1}}</th>
                                <td>
                                    <input type="text" name="plate_vehicle[]" id="plate" value="{{$item->plate_vehicle}}">
                                </td>

                            </tr>
                            @endforeach
                            @else
                            <th scope="row">1</th>
                            <td>
                                <input type="text" name="plate_vehicle[]" id="plate" value="">
                            </td>
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="row">
            <label class="lead">   </label>
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
                    <input type="number" step="any" name="reinsurer_rate" id="reinsurer_rate" value="{{ $slip->reinsurer_rate }}"><span class="input-group-text">%</span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="deducible">Prima de reaseguros</label>
                    <input type="number" step="any" data-money placeholder="USD" name="reinsurance_premium" value="{{ $slip->reinsurance_premium }}">
                </div>
            </div>
        </div>



        <div class="row">
            <label class="lead">Deducibles</label>
            <hr style="background-color: darkgrey; width: 70%">
        </div>

        @include('admin.comercial.include.edit_deducibles')

        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <input class="form-control" type="file" name="informe" hidden="true" id="informe" accept="application/*">
                    <label class="input-group-text" hidden="true" for="informe" id="informeFileLabel">Informe de inspección
                    </label>
                    @if ($informe)
                    <a download="Informe_de_inspección_previa" style="padding:1rem; color: #000" id="informeDownload">Informe de inspección - Previa</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="toggleInforme()" id="informeFileToggle">Modificar</button>
                    <script>
                        let toggledInformeFile = false;
                        const informeInput = document.getElementById('informe');
                        const informeDownload = document.getElementById('informeDownload');
                        const informeLabel = document.getElementById('informeFileLabel');
                        const informeToggle = document.getElementById('informeFileToggle');

                        function toggleInforme() {
                            toggledInformeFile = !toggledInformeFile;
                            informeInput.hidden = !toggledInformeFile;
                            informeDownload.hidden = toggledInformeFile;
                            informeLabel.hidden = !toggledInformeFile;
                            informeToggle.textContent = toggledInformeFile ? 'Usar previo' : 'Modificar'
                            if (toggledInformeFile) informeInput.click()
                        }
                    </script>
                    @else<input class="form-control" type="file" name="informe" id="informe">
                    <label class="input-group-text" for="informe">Informe de inspección</label>
                    @endif
                </div>
                <div class="my-2 input-group">
                    <input class="form-control" type="file" name="accidentRate" hidden="true" id="accidentRate" accept="application/*">
                    <label class="input-group-text" hidden="true" for="accidentRate" id="accidentRateFileLabel">Siniestralidad de los últimos 5 años (Fecha de ocurrencia, causa del siniestro, monto de la pérdida, valor
                        indemnizado)
                    </label>
                    @if ($accidentRate)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="accidentRateDownload">Siniestralidad previa</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="toggleInputs()" id="accidentRateFileToggle">Modificar</button>
                    <script>
                        let toggledAccidentRateFile = false;
                        const accidentRateInput = document.getElementById('accidentRate');
                        const accidentRateDownload = document.getElementById('accidentRateDownload');
                        const accidentRateLabel = document.getElementById('accidentRateFileLabel');
                        const accidentRateToggle = document.getElementById('accidentRateFileToggle');

                        function toggleInputs() {
                            toggledAccidentRateFile = !toggledAccidentRateFile;
                            accidentRateInput.hidden = !toggledAccidentRateFile;
                            accidentRateDownload.hidden = toggledAccidentRateFile;
                            accidentRateLabel.hidden = !toggledAccidentRateFile;
                            accidentRateToggle.textContent = toggledAccidentRateFile ? 'Usar previo' : 'Modificar'
                            if (toggledAccidentRateFile) accidentRateInput.click()
                        }
                    </script>
                    @else<input class="form-control" type="file" name="accidentRate" id="accidentRate" accept="application/*">
                    <label class="input-group-text" for="accidentRate">Siniestralidad de los últimos 5 años (Fecha de ocurrencia, causa del siniestro, monto de la pérdida, valor
                        indemnizado)
                    </label>
                    @endif
                </div>
            </div>

        </div>
        @include('admin.comercial.include.leyJurisdiccion')

        <button type="submit" id="submitBtn" class="btn btn-info mx-2" style="color: white">Enviar a dpto.
            Técnico</button>
    </form>
</div>
@else
<form enctype="multipart/form-data" method="POST" id="vehiculoslp" class="form vehiculos" style="display: none">
    <!-- One "tab" for each step in the form: -->

    @csrf
    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
    <input type="hidden" name="type_slip" value="vehiculo">
    <input hidden type="number" name="slip_status" value="3">
    <div class="tab">
        @include('admin.comercial.include.object_index')
    </div>

    <div class="tab">
        <div class="row my-2">


            <div class="col-md-6 my-2">
                <div class="row">
                    <label class="lead">Detalle del vehículo</label>
                    <hr>
                    <table id="vehiculosMatriculasTable" class="table" style="overflow-x: auto">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Matrícula</th>
                                <th scope="col"><input type="button" value="Agregar campo" onclick="addMatriculaRow(event)"></th>
                            </tr>
                        </thead>
                        <tbody id="vehiculosMatriculasTableBody">
                            <th scope="row">1</th>
                            <td>
                                <input type="text" name="plate_vehicle[]" id="plate">
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="flexColumnCenterContainer">
                <label class="lead">Coberturas adicionales</label>
            </div>
        </div>

        <div class="row">
            <div class="tableContainer" style="margin: 2rem 0">
                <table id="vehiculosCoberturasAdicionalesTable" name="vehiculosCoberturasAdicionalesTable" class="indemnizacionTable">
                    <caption>No olvidar de llenar mínimo una cobertura.</caption>
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Coberturas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowCoberturaV2(event, 'vehiculos', 'tecnico', 'vehiculos')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="vehiculosCoberturasAdicionalesTableBody">
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
                                <input type="number" step="any" placeholder="0" data-money name="coverage_additional_usd[]">
                            </td>
                            <td>
                                <input type="text" placeholder="..." name="coverage_additional_additional2[]">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="flexColumnCenterContainer">
                <label class="lead">Cláusulas adicionales</label>
            </div>
        </div>

        <div class="row">
            <div class="tableContainer" style="margin: 2rem 0">
                <table id="vehiculosClausulasAdicionalesTable" name="vehiculosClausulasAdicionalesTable" class="indemnizacionTable">
                    <caption>No olvidar de llenar mínimo una cláusula.</caption>
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Cláusulas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowClausula(event, 'vehiculos', 'tecnico', 'vehiculos')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="vehiculosClausulasAdicionalesTableBody">
                        <tr>
                            <td>1</td>
                            <td>
                                <select name="description_clause_additional[]" class="selectClausula">
                                </select>
                            </td>
                            <td>
                                <input type="text" placeholder="..." name="clause_additional_additional[]">
                            </td>
                            <td>
                                <input type="number" step="any" data-money placeholder="0" name="clause_additional_usd[]">
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
        <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="reinsurer_rate">Tasa de reaseguros</label>
                    <input class="inputForm" type="number" step="any" name="reinsurer_rate" id="reinsurer_rate"><span class="input-group-text">%</span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="deducible">Prima de reaseguros</label>
                    <input class="inputForm" type="number" step="any" placeholder="USD" name="reinsurance_premium" data-money>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="flexColumnCenterContainer" style="margin:1rem 0">
                <label class="lead">Deducibles</label>
                <hr style="background-color: darkgray">
            </div>
        </div>
        <div id="vehiculosDeduciblesContainer" class="row">
            <div class="flexColumnCenterContainer" style="margin:1rem 0">
                {{-- <div class="flexRowWrapContainer" style="margin:1.2rem 0"> --}}
                <div class="d-flex mb-2">
                    <div class="input-group">
                        <input class="form-control" type="text" name="description_deductible[]" placeholder="Detalle..">
                        <input class="form-control" type="number" min="0" max="100" step="any" placeholder="%" name="sinister_value[]" min="0">
                        <span class="input-group-text">valor del siniestro</span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">%</span>
                        <input class="form-control" type="number" min="0" max="100" step="any" name="insured_value[]">
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
            <button type="button" class="btn btn-info" style="color: white" onclick="addDeducible(event, 'vehiculos')">Agregar deducible</button>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <input class="form-control" type="file" name="informe" id="informe">
                    <label class="input-group-text" for="informe">Informe de inspección</label>
                </div>
                <div class="my-2 input-group">
                    <input class="form-control" type="file" name="accidentRate" id="accidentRate">
                    <label class="input-group-text" for="accidentRate">Siniestralidad de los últimos 5
                        años (Fecha de ocurrencia, causa del siniestro, monto de la pérdida, valor
                        indemnizado)</label>
                </div>
            </div>

        </div>
        @include('admin.comercial.include.leyJurisdiccion')
    </div>
    <div>
        <div style="float:right;" class="row">
            <p>
            <div class="col-md">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-info mx-2" style="color: white">Atrás</button>
            </div>
            <div class="col-md">
                <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-info mx-2" style="color: white">Siguiente</button>
                {{-- <button type="button" id="submitBtn" class="btn btn-outline-primary"
                    style="display: none">Guardar</button> --}}

                {{-- <button type="submit" class="storeSlip btn btn-outline-success"
                        style="display: none">Store</button> --}}

                <button type="submit" id="submitBtn" style="display: none" class="btn btn-info mx-2" onclick="jqsubmit()" style="color: white">Enviar</button>
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
