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
@if (\Illuminate\Support\Str::contains(\Illuminate\Support\Facades\Request::url(), '/admin/comercial/edit_compromiso/'))
<script>
    const modelMakeHours_raw = "{{$modelMakeHours}}";
    let modelMakeHours;
    fetch(`data:application/*;base64,${modelMakeHours_raw}`).then(base64 => base64.blob()).then(blob => {
        modelMakeHours = URL.createObjectURL(blob)
        const anchor = document.getElementById('modelMakeHoursDownload')
        if (anchor) {
            anchor.href = modelMakeHours
            anchor.download = 'vida_siniestralidad_previa.{{$modelMakeHoursExtension}}'
        }
    });

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


    const otherForms_raw = "{{$otherForms}}";
    let otherForms;
    fetch(`data:application/*;base64,${otherForms_raw}`).then(base64 => base64.blob()).then(blob => {
        otherForms = URL.createObjectURL(blob)
        const anchor = document.getElementById('otherFormsDownload')
        if (anchor) {
            anchor.href = otherForms
            anchor.download = 'vida_siniestralidad_previa.{{$otherFormsExtension}}'
        }
    });


    const crFormSigned_raw = "{{$crFormSigned}}";
    let crFormSigned;
    fetch(`data:application/*;base64,${crFormSigned_raw}`).then(base64 => base64.blob()).then(blob => {
        crFormSigned = URL.createObjectURL(blob)
        const anchor = document.getElementById('crFormSignedDownload')
        if (anchor) {
            anchor.href = crFormSigned
            anchor.download = 'vida_siniestralidad_previa.{{$crFormSignedExtension}}'
        }
    });


    const pilotExperienceFormSigned_raw = "{{$pilotExperienceFormSigned}}";
    let pilotExperienceFormSigned;
    fetch(`data:application/*;base64,${pilotExperienceFormSigned_raw}`).then(base64 => base64.blob()).then(blob => {
        pilotExperienceFormSigned = URL.createObjectURL(blob)
        const anchor = document.getElementById('pilotExperienceFormSignedDownload')
        if (anchor) {
            anchor.href = pilotExperienceFormSigned
            anchor.download = 'vida_siniestralidad_previa.{{$pilotExperienceFormSignedExtension}}'
        }
    });
</script>
<script>
</script>
<div class="card px-4 py-2">
    <form enctype="multipart/form-data" method="POST" action="{{ route('slip.update', $slip->id) }}" id="aviacion_1_form">
        <h3>Casco aviacion</h3>
        @csrf
        @method('PUT')
        <input type="hidden" name="type_slip" value="aviacion_1_form">
        {{-- <input hidden type="number" name="slip_status" value="3"> --}}
        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
        @include('admin.comercial.include.object_index')


        <div class="row my-3">
            <label class="lead">Datos de la Aeronave</label>
            <hr style="background-color: darkgrey; width: 70%">
        </div>


        <div class="row">
            <div class="card table-responsive">
                <table class="table" style="overflow-x: auto" id="aeronaveAdicional">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Tipo Ala</th>
                            <th scope="col">Serie</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Año fabricación</th>
                            <th scope="col">Capacidad tripulantes</th>
                            <th scope="col">Capacidad pasajeros</th>
                            <th scope="col">Deducibles</th>
                            <th scope="col">Suma asegurada</th>
                            <th scope="col"><input type="button" value="Agregar campo" onclick="addAeronaveRow('aeronaveAdicional')"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($information_aerial) > 0)
                        @foreach ($information_aerial as $key => $item)
                        <tr>
                            <th scope="row">{{ $key +1 }}</th>
                            <td>
                                <select name="type_ala_aerial[]" id="ala">
                                    <option {{ $item->type_ala_aerial === 'fija' ? 'selected' : '' }} value="Fija">
                                        Fija</option>
                                    <option {{ $item->type_ala_aerial === 'rotativa' ? 'selected' : '' }} value="Rotativa">
                                        Rotativa</option>
                                </select>
                            </td>
                            <td>
                                <input value="{{ $item->serie_aerial }}" type="text" name="serie_aerial[]" id="series">
                            </td>
                            <td>
                                <input value="{{ $item->marca_aerial }}" type="text" name="marca_aerial[]" id="brand">
                            </td>
                            <td>
                                <input value="{{ $item->model_aerial }}" type="text" name="model_aerial[]" id="model">
                            </td>
                            <td>
                                <input value="{{ $item->year_manufacture_aerial }}" type="number" step="any" name="year_manufacture_aerial[]" id="makeYear" min="1960">
                            </td>
                            <td>
                                <input value="{{ $item->cap_crew }}" type="text" name="cap_crew[]" id="capacity" min="1" step="1">
                            </td>
                            <td>
                                <input value="{{ $item->cap_pax }}" type="number" step="any" name="cap_pax[]" id="passengers">
                            </td>
                            <td>
                                <input value="{{ $item->deducible_aerial }}" type="number" step="any" name="deducible_aerial[]">
                            </td>
                            <td>
                                <input value="{{ $item->sum_insured }}" type="number" step="any" placeholder="Suma asegurada" name="sum_insured[]" id="insuredSum" data-money>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <th scope="row">1</th>
                        <td>
                            <select name="type_ala_aerial[]" id="ala">
                                <option value="" selected disabled>Seleccionar</option>
                                <option value="fija">Fija</option>
                                <option value="rotativa">Rotativa</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="serie_aerial[]" id="series">
                        </td>
                        <td>
                            <input type="text" name="marca_aerial[]" id="brand">
                        </td>
                        <td>
                            <input type="text" name="model_aerial[]" id="model">
                        </td>
                        <td>
                            <input type="number" step="any" name="year_manufacture_aerial[]" id="makeYear" min="1960">
                        </td>
                        <td>
                            <input type="text" name="cap_crew[]" id="capacity" min="1" step="1">
                        </td>
                        <td>
                            <input type="number" step="any" name="cap_pax[]" id="passengers">
                        </td>
                        <td>
                            <input type="number" step="any" name="deducible_aerial[]">
                        </td>
                        <td>
                            <input type="number" step="any" placeholder="Suma asegurada" name="sum_insured[]" id="insuredSum" data-money>
                        </td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>


        <div class="row">

            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text">Tipo de aviación</label>
                    <select name="type_aviation" id="tipoAviacion">
                        <option {{ $slip_type->type_aviation === 'comercial' ? 'selected' : '' }} value="comercial">
                            Comercial</option>
                        <option {{ $slip_type->type_aviation === 'general' ? 'selected' : '' }} value="general">General
                        </option>
                        <option {{ $slip_type->type_aviation === 'escuela' ? 'selected' : '' }} value="escuela">Escuelas
                            de aviación</option>
                        <option {{ $slip_type->type_aviation === 'fumigacion' ? 'selected' : '' }} value="fumigacion">
                            Fumigación</option>
                        <option {{ $slip_type->type_aviation === 'privado' ? 'selected' : '' }} value="privado">Privado
                            placer</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group my-2">
                    <label class="input-group-text">Límite de indemnización</label>
                    <input type="number" step="any" value="{{$slip_type->limit_compensation}}" name="limit_compensation">
                </div>
            </div>
        </div>

        @if ($slip->type_coverage === 32)
        <div class="row my-3">
            <label class="lead">Coberturas y Límite de coberturas</label>
            <hr style="background-color: darkgrey; width: 70%">
        </div>

        @if (count($aviation_extras) > 0)
        @foreach ($aviation_extras as $key => $item)
        <div class="row mb-3">
            <label class="lead">{{$item->description_coverage}}</label>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text">Cobertura</label>
                    <input type="hidden" name="description_coverage[]" value="{{$item->description_coverage}}">
                    <input type="number" step="any" name="aditional_coverage[]" value="{{$item->aditional_coverage}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text">Límite de cobertura</label>
                    <input type="hidden" name="limit_description_coverage[]" value="{{$item->limit_description_coverage}}">
                    <input type="number" step="any" name="limit_aditional_coverage[]" value="{{$item->limit_aditional_coverage}}">
                </div>
            </div>
        </div>
        @endforeach
        @endif
        @endif

        <div class="row">
            <div class="col-md-7">
                <div class="input-group mb-3">
                    <label class="input-group-text">Pilotos autorizados</label>
                    <textarea name="pilot_authorized" cols="35" rows="2">{{ $slip_type->pilot_authorized }}</textarea>
                </div>
            </div>
            <div class="col-md-5">
                <div class="input-group mb-3">
                    <label class="input-group-text">Límite geográfico</label>
                    <input type="text" name="geography_limit" value="{{ $slip_type->geography_limit }}">
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


        @include('admin.comercial.include.leyJurisdiccion')

        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="input-group mb-3">
                    <input class="form-control" type="file" name="detalleAeronaves" hidden="true" id="detalleAeronaves" accept="application/*">
                    <label class="input-group-text" hidden="true" for="detalleAeronaves" id="detalleAeronavesFileLabel" Detalle Aeronaves>
                    </label>
                    @if ($detalleAeronaves)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="detalleAeronavesDownload">Detalle Aeronaves - Previo</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="toggledetalleAeronaves()" id="detalleAeronavesFileToggle">Modificar</button>
                    <script>
                        let toggleddetalleAeronavesFile = false;
                        const detalleAeronavesInput = document.getElementById('detalleAeronaves');
                        const detalleAeronavesDownload = document.getElementById('detalleAeronavesDownload');
                        const detalleAeronavesLabel = document.getElementById('detalleAeronavesFileLabel');
                        const detalleAeronavesToggle = document.getElementById('detalleAeronavesFileToggle');

                        function toggledetalleAeronaves() {
                            toggleddetalleAeronavesFile = !toggleddetalleAeronavesFile;
                            detalleAeronavesInput.hidden = !toggleddetalleAeronavesFile;
                            detalleAeronavesDownload.hidden = toggleddetalleAeronavesFile;
                            detalleAeronavesLabel.hidden = !toggleddetalleAeronavesFile;
                            detalleAeronavesToggle.textContent = toggleddetalleAeronavesFile ? 'Usar previo' : 'Modificar'
                            if (toggleddetalleAeronavesFile) detalleAeronavesInput.click()
                        }
                    </script>
                    @else<input type="file" name="detalleAeronaves" id="detalleAeronaves" class="form-control">
                    <label for="detalleAeronaves" class="input-group-text">Detalle Aeronaves</label>
                    @endif
                </div>


            </div>
            <div class="col-md-6 mb-3">
                <div class="input-group mb-3">
                    <input class="form-control" type="file" name="modelMakeHours" hidden="true" id="modelMakeHours" accept="application/*">
                    <label class="input-group-text" hidden="true" for="modelMakeHours" id="modelMakeHoursFileLabel">Horas en marca y modelo
                    </label>
                    @if ($modelMakeHours)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="modelMakeHoursDownload">Horas en marca y modelo - Previo</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="togglemodelMakeHours()" id="modelMakeHoursFileToggle">Modificar</button>
                    <script>
                        let toggledmodelMakeHoursFile = false;
                        const modelMakeHoursInput = document.getElementById('modelMakeHours');
                        const modelMakeHoursDownload = document.getElementById('modelMakeHoursDownload');
                        const modelMakeHoursLabel = document.getElementById('modelMakeHoursFileLabel');
                        const modelMakeHoursToggle = document.getElementById('modelMakeHoursFileToggle');

                        function togglemodelMakeHours() {
                            toggledmodelMakeHoursFile = !toggledmodelMakeHoursFile;
                            modelMakeHoursInput.hidden = !toggledmodelMakeHoursFile;
                            modelMakeHoursDownload.hidden = toggledmodelMakeHoursFile;
                            modelMakeHoursLabel.hidden = !toggledmodelMakeHoursFile;
                            modelMakeHoursToggle.textContent = toggledmodelMakeHoursFile ? 'Usar previo' : 'Modificar'
                            if (toggledmodelMakeHoursFile) modelMakeHoursInput.click()
                        }
                    </script>
                    @else<input type="file" name="modelMakeHours" id="modelMakeHours" class="form-control">
                    <label for="modelMakeHours" class="input-group-text">Horas en marca y modelo</label>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" type="file" name="accidentRate" hidden="true" id="accidentRate" accept="application/*">
                    <label class="input-group-text" hidden="true" for="accidentRate" id="accidentRateFileLabel">Siniestralidad de los últimos 5
                        años
                    </label>
                    @if ($accidentRate)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="accidentRateDownload">Siniestralidad de los últimos 5
                        años - Previo</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="toggleaccidentRate()" id="accidentRateFileToggle">Modificar</button>
                    <script>
                        let toggledaccidentRateFile = false;
                        const accidentRateInput = document.getElementById('accidentRate');
                        const accidentRateDownload = document.getElementById('accidentRateDownload');
                        const accidentRateLabel = document.getElementById('accidentRateFileLabel');
                        const accidentRateToggle = document.getElementById('accidentRateFileToggle');

                        function toggleaccidentRate() {
                            toggledaccidentRateFile = !toggledaccidentRateFile;
                            accidentRateInput.hidden = !toggledaccidentRateFile;
                            accidentRateDownload.hidden = toggledaccidentRateFile;
                            accidentRateLabel.hidden = !toggledaccidentRateFile;
                            accidentRateToggle.textContent = toggledaccidentRateFile ? 'Usar previo' : 'Modificar'
                            if (toggledaccidentRateFile) accidentRateInput.click()
                        }
                    </script>
                    @else<input type="file" name="accidentRate" id="accidentRate" class="form-control">
                    <label for="accidentRate" class="input-group-text">Siniestralidad de los últimos 5
                        años</label>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" type="file" name="otherForms" hidden="true" id="otherForms" accept="application/*">
                    <label class="input-group-text" hidden="true" for="otherForms" id="otherFormsFileLabel">Formularios de Hangares y formularios varios
                        por cobertura
                    </label>
                    @if ($otherForms)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="otherFormsDownload">Formularios de Hangares y formularios varios
                        por cobertura - Previo</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="toggleotherForms()" id="otherFormsFileToggle">Modificar</button>
                    <script>
                        let toggledotherFormsFile = false;
                        const otherFormsInput = document.getElementById('otherForms');
                        const otherFormsDownload = document.getElementById('otherFormsDownload');
                        const otherFormsLabel = document.getElementById('otherFormsFileLabel');
                        const otherFormsToggle = document.getElementById('otherFormsFileToggle');

                        function toggleotherForms() {
                            toggledotherFormsFile = !toggledotherFormsFile;
                            otherFormsInput.hidden = !toggledotherFormsFile;
                            otherFormsDownload.hidden = toggledotherFormsFile;
                            otherFormsLabel.hidden = !toggledotherFormsFile;
                            otherFormsToggle.textContent = toggledotherFormsFile ? 'Usar previo' : 'Modificar'
                            if (toggledotherFormsFile) otherFormsInput.click()
                        }
                    </script>
                    @else<input type="file" name="otherForms" id="otherForms" class="form-control">
                    <label for="otherForms" class="input-group-text">Formularios de Hangares y formularios varios
                        por cobertura</label>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input class="form-control" type="file" name="crFormSigned" hidden="true" id="crFormSigned" accept="application/*">
                    <label class="input-group-text" hidden="true" for="crFormSigned" id="crFormSignedFileLabel">Formulario de casco relleno y
                        firmado
                    </label>
                    @if ($crFormSigned)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="crFormSignedDownload">Formulario de casco relleno y
                        firmado - Previo</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="togglecrFormSigned()" id="crFormSignedFileToggle">Modificar</button>
                    <script>
                        let toggledcrFormSignedFile = false;
                        const crFormSignedInput = document.getElementById('crFormSigned');
                        const crFormSignedDownload = document.getElementById('crFormSignedDownload');
                        const crFormSignedLabel = document.getElementById('crFormSignedFileLabel');
                        const crFormSignedToggle = document.getElementById('crFormSignedFileToggle');

                        function togglecrFormSigned() {
                            toggledcrFormSignedFile = !toggledcrFormSignedFile;
                            crFormSignedInput.hidden = !toggledcrFormSignedFile;
                            crFormSignedDownload.hidden = toggledcrFormSignedFile;
                            crFormSignedLabel.hidden = !toggledcrFormSignedFile;
                            crFormSignedToggle.textContent = toggledcrFormSignedFile ? 'Usar previo' : 'Modificar'
                            if (toggledcrFormSignedFile) crFormSignedInput.click()
                        }
                    </script>
                    @else<input type="file" name="crFormSigned" id="crFormSigned" class="form-control">
                    <label for="crFormSigned" class="input-group-text">Formulario de casco relleno y
                        firmado</label>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" type="file" name="pilotExperienceFormSigned" hidden="true" id="pilotExperienceFormSigned" accept="application/*">
                    <label class="input-group-text" hidden="true" for="pilotExperienceFormSigned" id="pilotExperienceFormSignedFileLabel">Experiencia de los pilotos -
                        formulario relleno y
                        firmado
                    </label>
                    @if ($pilotExperienceFormSigned)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="pilotExperienceFormSignedDownload">Experiencia de los pilotos -
                        formulario relleno y
                        firmado - Previo</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="togglepilotExperienceFormSigned()" id="pilotExperienceFormSignedFileToggle">Modificar</button>
                    <script>
                        let toggledpilotExperienceFormSignedFile = false;
                        const pilotExperienceFormSignedInput = document.getElementById('pilotExperienceFormSigned');
                        const pilotExperienceFormSignedDownload = document.getElementById('pilotExperienceFormSignedDownload');
                        const pilotExperienceFormSignedLabel = document.getElementById('pilotExperienceFormSignedFileLabel');
                        const pilotExperienceFormSignedToggle = document.getElementById('pilotExperienceFormSignedFileToggle');

                        function togglepilotExperienceFormSigned() {
                            toggledpilotExperienceFormSignedFile = !toggledpilotExperienceFormSignedFile;
                            pilotExperienceFormSignedInput.hidden = !toggledpilotExperienceFormSignedFile;
                            pilotExperienceFormSignedDownload.hidden = toggledpilotExperienceFormSignedFile;
                            pilotExperienceFormSignedLabel.hidden = !toggledpilotExperienceFormSignedFile;
                            pilotExperienceFormSignedToggle.textContent = toggledpilotExperienceFormSignedFile ? 'Usar previo' : 'Modificar'
                            if (toggledpilotExperienceFormSignedFile) pilotExperienceFormSignedInput.click()
                        }
                    </script>
                    @else<input type="file" name="pilotExperienceFormSigned" id="pilotExperienceFormSigned" class="form-control">
                    <label for="pilotExperienceFormSigned" class="input-group-text">Experiencia de los pilotos -
                        formulario relleno y
                        firmado</label>
                    @endif
                </div>
            </div>

        </div>
        <div style="float:right;" class="row">
            <p>
            <div class="col-md">
                <button type="submit" id="submitBtn" class="btn btn-info mx-2" style="color: white">Enviar a dpto.
                    Técnico</button>

            </div>
            </p>
        </div>
    </form>
</div>
@else
<form enctype="multipart/form-data" method="POST" id="aviacion_1_form" class="form aviacion" style="display: none">

    <h3>Casco aviacion</h3>

    @csrf
    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
    <input type="hidden" name="type_slip" value="aviacion_1_form">
    <input hidden type="number" name="slip_status" value="3">
    <div class="tab">
        @include('admin.comercial.include.object_index')
    </div>

    <div class="tab">


        <div class="row my-3">
            <label class="lead">Datos de la Aeronave</label>
            <hr>
        </div>

        <div class="row">
            <table class="table" style="overflow-x: auto" id="aeronaveAdicional">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Tipo Ala</th>
                        <th scope="col">Serie</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Año fabricación</th>
                        <th scope="col">Capacidad tripulantes</th>
                        <th scope="col">Capacidad pasajeros</th>
                        <th scope="col">Deducibles</th>
                        <th scope="col">Suma asegurada</th>
                        <th scope="col"><input type="button" value="Agregar campo" onclick="addAeronaveRow('aeronaveAdicional')"></th>
                    </tr>
                </thead>
                <tbody>
                    <th scope="row">1</th>
                    <td>
                        <select name="type_ala_aerial[]" id="ala">
                            <option value="" selected disabled>Seleccionar</option>
                            <option value="fija">Fija</option>
                            <option value="rotativa">Rotativa</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="serie_aerial[]" class="inputNumber">
                    </td>
                    <td>
                        <input type="text" name="marca_aerial[]" class="inputNumber">
                    </td>
                    <td>
                        <input type="text" name="model_aerial[]" class="inputNumber">
                    </td>
                    <td>
                        <input type="number" step="any" name="year_manufacture_aerial[]" min="1960">
                    </td>
                    <td>
                        <input type="number" name="cap_crew[]" id="capacity" min="1" step="1" class="inputNumber">
                    </td>
                    <td>
                        <input type="number" step="any" name="cap_pax[]" class="inputNumber">
                    </td>
                    <td>
                        <input type="number" step="any" name="deducible_aerial[]">
                    </td>
                    <td>
                        <input type="number" step="any" placeholder="Suma asegurada" name="sum_insured[]" id="insuredSum" data-money>
                    </td>
                </tbody>
            </table>
        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text">Tipo de aviación</label>
                    <select name="type_aviation" id="tipoAviacion">
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="comercial">Comercial</option>
                        <option value="general">General</option>
                        <option value="escuela">Escuelas de aviación</option>
                        <option value="fumigacion">Fumigación</option>
                        <option value="privado">Privado placer</option>
                    </select>
                </div>


            </div>

            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text">Valor asegurado</label>
                    <input type="number" step="any" placeholder="Valor.." name="valor_asegurado" class="form-control">
                </div>

                <div id="forType33" class="input-group my-2">
                    <label class="input-group-text">Límite de indemnización</label>
                    <input type="number" step="any" placeholder="..." name="limit_compensation" class="form-control">
                </div>
            </div>
        </div>

        <div id="forType32">


            <div class="row my-3">
                <label class="lead">Coberturas</label>
                <hr>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="input_group mb-3">
                        <label class="input-group-text">

                            Casco Aéreo:
                        </label>
                        <input type="hidden" name="description_coverage[]" value="Casco Aéreo">
                        <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                    </div>

                    <div class="input_group mb-3">
                        <label class="input-group-text">

                            Guerra:
                        </label>
                        <input type="hidden" name="description_coverage[]" value="Guerra">
                        <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input_group mb-3">
                        <label class="input-group-text">

                            Responsabilidad Civil:
                        </label>
                        <input type="hidden" name="description_coverage[]" value="Responsabilidad Civil">
                        <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                    </div>

                    <div class="input_group mb-3">
                        <label class="input-group-text">

                            Seguro de Deducibles:
                        </label>
                        <input type="hidden" name="description_coverage[]" value="Seguro de Deducibles">
                        <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="input_group mb-3">
                        <label class="input-group-text">

                            Partes y Respuestos:
                        </label>
                        <input type="hidden" name="description_coverage[]" value="Partes y Respuestos">
                        <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                    </div>

                    <div class="input_group mb-3">
                        <label class="input-group-text">

                            Carga y Equipaje:
                        </label>
                        <input type="hidden" name="description_coverage[]" value="Carga y Equipaje">
                        <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input_group mb-3">
                        <label class="input-group-text">

                            Seguro de Prima no Devengada:
                        </label>
                        <input type="hidden" name="description_coverage[]" value="Seguro de Prima no Devengada">
                        <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="input_group mb-3">
                        <label class="input-group-text">

                            Seguro de Busqueda y Rescate:
                        </label>
                        <input type="hidden" name="description_coverage[]" value="Seguro de Busqueda y Rescate">
                        <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                    </div>

                    <div class="input_group mb-3">
                        <label class="input-group-text">

                            Accidentes Personales:
                        </label>
                        <input type="hidden" name="description_coverage[]" value="Accidentes Personales">
                        <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input_group mb-3">
                        <label class="input-group-text">

                            Gastos Médicos:
                        </label>
                        <input type="hidden" name="description_coverage[]" value="Gastos Médicos">
                        <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                    </div>
                </div>
            </div>

            <div class="row my-3">
                <label class="lead">Límites de cobertura</label>
                <hr>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="input_group mb-3">
                        <label class="input-group-text">

                            Casco Aéreo:
                        </label>
                        <input type="hidden" name="limit_description_coverage[]" value="Casco Aéreo">
                        <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                    </div>

                    <div class="input_group mb-3">
                        <label class="input-group-text">

                            Guerra:
                        </label>
                        <input type="hidden" name="limit_description_coverage[]" value="Guerra">
                        <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input_group mb-3">
                        <label class="input-group-text">

                            Casco Guerra:
                        </label>
                        <input type="hidden" name="limit_description_coverage[]" value="Casco Guerra">
                        <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                    </div>

                    <div class="input_group mb-3">
                        <label class="input-group-text">

                            Seguro de Deducibles:
                        </label>
                        <input type="hidden" name="limit_description_coverage[]" value="Seguro de Deducibles">
                        <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="input_group mb-3">
                        <label class="input-group-text">

                            Partes y Respuestos:
                        </label>
                        <input type="hidden" name="limit_description_coverage[]" value="Partes y Respuestos">
                        <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                    </div>

                    <div class="input_group mb-3">
                        <label class="input-group-text">

                            Carga y Equipaje:
                        </label>
                        <input type="hidden" name="limit_description_coverage[]" value="Carga y Equipaje">
                        <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input_group mb-3">
                        <label class="input-group-text">

                            Seguro de Prima no Devengada:
                        </label>
                        <input type="hidden" name="limit_description_coverage[]" value="Seguro de Prima no Devengada">
                        <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="input_group mb-3">
                        <label class="input-group-text">

                            Seguro de Busqueda y Rescate:
                        </label>
                        <input type="hidden" name="limit_description_coverage[]" value="Seguro de Busqueda y Rescate">
                        <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                    </div>

                    <div class="input_group mb-3">
                        <label class="input-group-text">

                            Accidentes Personales:
                        </label>
                        <input type="hidden" name="limit_description_coverage[]" value="Accidentes Personales">
                        <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input_group mb-3">
                        <label class="input-group-text">

                            Gastos Médicos:
                        </label>
                        <input type="hidden" name="limit_description_coverage[]" value="Gastos Médicos">
                        <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                    </div>
                </div>
            </div>
        </div>



    </div>

    <div class="tab">
        <div class="row">
            <div class="col-md-7">
                <div class="input-group mb-3">
                    <label class="input-group-text">Pilotos autorizados</label>
                    <textarea name="pilot_authorized" cols="35" rows="2"></textarea>
                </div>
            </div>
            <div class="col-md-5">
                <div class="input-group mb-3">
                    <label class="input-group-text">Límite geográfico</label>
                    <input type="text" name="geography_limit">
                </div>
            </div>


        </div>

        <div class="row mb-3">
            <label class="lead">Coberturas adicionales</label>
            <hr>
        </div>

        <div class="row">
            <div class="tableContainer" style="margin: 2rem 0">
                <table id="aviacion_casco_rcCoberturasAdicionalesTable" class="indemnizacionTable">
                    <caption>No olvidar de llenar mínimo una cobertura.</caption>
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Coberturas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowCoberturaV2(event, 'aviacion_casco_rc', 'aviacion', 'all')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="aviacion_casco_rcCoberturasAdicionalesTableBody">

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
                                <input type="text" placeholder="0" name="coverage_additional_usd[]">
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
                <table id="aviacion_casco_rcClausulasAdicionalesTable" class="indemnizacionTable">
                    <caption>No olvidar de llenar mínimo una cláusula.</caption>
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Cláusulas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowClausula(event, 'aviacion_casco_rc', 'aviacion', 'casco')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="aviacion_casco_rcClausulasAdicionalesTableBody">

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
                                <input type="text" placeholder="0" name="clause_additional_usd[]">
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
                    <input class="inputForm" type="number" step="any" name="reinsurer_rate" id="reinsurer_rate"><span class="input-group-text">%</span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="deducible">Prima de reaseguros</label>
                    <input class="inputForm" type="number" step="any" placeholder="USD" name="reinsurance_premium">
                </div>
            </div>
        </div>



        <div class="row">

            <label class="lead">Deducibles</label>
            <hr style="background-color: darkgray">

        </div>
        <div id="aviacion_rcDeduciblesContainer" class="row">
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
            <button type="button" class="btn btn-info" style="color: white" onclick="addDeducible(event, 'aviacion_rc')">Agregar deducible</button>
        </div>

        @include('admin.comercial.include.leyJurisdiccion')

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="input-group my-2">
                    <label class="input-group-text" for="detalleAeronaves">Detalles aeronaves</label>
                    <input class="inputForm" type="file" name="detalleAeronaves" id="detalleAeronaves">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="modelMakeHours">Horas en marca y modelo</label>
                    <input class="inputForm" type="file" name="modelMakeHours" id="modelMakeHours">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="accidentRate">Siniestralidad de los últimos 5
                        años</label>
                    <input class="inputForm" type="file" name="accidentRate" id="accidentRate">
                </div>
            </div>
            <div class="col-md-4">

                <div class="input-group mb-3">
                    <label class="input-group-text" for="crFormSigned">Formulario de casco relleno y
                        firmado</label>
                    <input class="inputForm" type="file" name="crFormSigned" id="crFormSigned">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="pilotExperienceFormSigned">Experiencia de los pilotos -
                        formulario relleno y
                        firmado</label>
                    <input class="inputForm" type="file" name="pilotExperienceFormSigned" id="pilotExperienceFormSigned">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="otherForms">Formularios de Hangares y formularios varios
                        por cobertura</label>
                    <input class="inputForm" type="file" name="otherForms" id="otherForms">
                </div>
            </div>
        </div>
    </div>

    <div>
        <div style="float:right;" class="row">
            <p>
            <div class="col-md">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-info mx-2" style="color: white">Atrás</button>
            </div>
            <div class="col-md">
                <button type="button" id="nextBtn" class="nextButton btn btn-info" onclick="nextPrev(1)" style="color: white">Siguiente</button>

                <button type="submit" formnovalidate="formnovalidate" id="submitBtn" style="display: none" onclick="jqsubmit()" class="btn btn-info" style="color: white">Enviar</button>

                {{-- <button type="button" id="submitBtn" class="submitButton"
                    onclick="submitForm('activos_fijos_form')" style="display: none">Guardar</button> --}}
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
