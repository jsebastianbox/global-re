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
    const report_raw = "{{$report}}";
    let report;
    fetch(`data:application/*;base64,${report_raw}`).then(base64 => base64.blob()).then(blob => {
        report = URL.createObjectURL(blob)
        const anchor = document.getElementById('reportDownload')
        if (anchor) {
            anchor.href = report
            anchor.download = 'vida_siniestralidad_previa.{{$reportExtension}}'
        }
    });
    const signedForm_raw = "{{$signedForm}}";
    let signedForm;
    fetch(`data:application/*;base64,${signedForm_raw}`).then(base64 => base64.blob()).then(blob => {
        signedForm = URL.createObjectURL(blob)
        const anchor = document.getElementById('signedFormDownload')
        if (anchor) {
            anchor.href = signedForm
            anchor.download = 'vida_siniestralidad_previa.{{$signedFormExtension}}'
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

<div class="card" style="padding-inline: 1rem; padding-block: 1.75rem">
    <form enctype="multipart/form-data" method="POST" action="{{ route('slip.update', $slip->id) }}" id="maritimo_3_form">
        @csrf
        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
        @method('PUT')

        <input type="hidden" name="type_slip" value="maritimo_3_form">
        <input hidden type="number" name="slip_status" value="3">

        @include('admin.comercial.include.object_index')

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text" for="coverage">
                        Cobertura
                    </label>
                    <textarea name="coverage" id="coverage" style="resize:both;width:100%;" cols="30" rows="1">{{ !empty($slip->coverage) ? $slip->coverage : '' }}</textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text" for="insuredObject">
                        Objeto asegurado
                    </label>
                    <textarea name="object_insurance" id="object_insurance" cols="30" rows="1">{{ !empty($slip->object_insurance) ? $slip->object_insurance : '' }}</textarea>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text" for="limit">
                        Límite de indemnización
                    </label>
                    <input type="number" step="any" placeholder="..." name="limit_compensation" id="limit" data-money value="{{ $slip->limit_compensation }}">
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

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group">
                    <input class="form-control" type="file" name="report" hidden="true" id="report" accept="application/*">
                    <label class="input-group-text" hidden="true" for="report" id="reportFileLabel">Informe de inspección actualizado
                    </label>
                    @if ($report)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="reportDownload">Informe de inspección actualizado - Previo</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="togglereport()" id="reportFileToggle">Modificar</button>
                    <script>
                        let toggledreportFile = false;
                        const reportInput = document.getElementById('report');
                        const reportDownload = document.getElementById('reportDownload');
                        const reportLabel = document.getElementById('reportFileLabel');
                        const reportToggle = document.getElementById('reportFileToggle');

                        function togglereport() {
                            toggledreportFile = !toggledreportFile;
                            reportInput.hidden = !toggledreportFile;
                            reportDownload.hidden = toggledreportFile;
                            reportLabel.hidden = !toggledreportFile;
                            reportToggle.textContent = toggledreportFile ? 'Usar previo' : 'Modificar'
                            if (toggledreportFile) reportInput.click()
                        }
                    </script>
                    @else<input type="file" name="report" id="report" class="form-control">
                    <label for="report" class="input-group-text">Informe de inspección actualizado</label>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <input class="form-control" type="file" name="signedForm" hidden="true" id="signedForm" accept="application/*">
                    <label class="input-group-text" hidden="true" for="signedForm" id="signedFormFileLabel">Formulario relleno y firmado
                    </label>
                    @if ($signedForm)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="signedFormDownload">Formulario relleno y firmado - Previo</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="togglesignedForm()" id="signedFormFileToggle">Modificar</button>
                    <script>
                        let toggledsignedFormFile = false;
                        const signedFormInput = document.getElementById('signedForm');
                        const signedFormDownload = document.getElementById('signedFormDownload');
                        const signedFormLabel = document.getElementById('signedFormFileLabel');
                        const signedFormToggle = document.getElementById('signedFormFileToggle');

                        function togglesignedForm() {
                            toggledsignedFormFile = !toggledsignedFormFile;
                            signedFormInput.hidden = !toggledsignedFormFile;
                            signedFormDownload.hidden = toggledsignedFormFile;
                            signedFormLabel.hidden = !toggledsignedFormFile;
                            signedFormToggle.textContent = toggledsignedFormFile ? 'Usar previo' : 'Modificar'
                            if (toggledsignedFormFile) signedFormInput.click()
                        }
                    </script>
                    @else<input type="file" name="signedForm" id="signedForm" class="form-control">
                    <label for="signedForm" class="input-group-text">Formulario relleno y firmado</label>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <div class="input-group">
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
            </div>
        </div>
        <div>
            <div style="float:right;" class="row">
                <div class="col-md">
                    <button type="submit" id="submitBtn" style="display: none" class="btn btn-info mx-2" style="color: white">Enviar a dpto. Técnico</button>
                </div>
            </div>
        </div>
    </form>
</div>
@else
<form enctype="multipart/form-data" method="POST" id="maritimo_3_form" class="form maritimo3" style="display: none">
    <!-- One "tab" for each step in the form: -->

    @csrf
    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
    <input type="hidden" name="type_slip" value="maritimo_3_form">
    <input hidden type="number" name="slip_status" value="3">
    <div class="tab">
        <div class="row">
            @include('admin.comercial.include.object_index')
        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text" for="limit">
                        Límite de indemnización
                    </label>
                    <input type="number" step="any" placeholder="..." name="limit_compensation" id="limit" data-money>
                </div>
            </div>
        </div>
    </div>

    <div class="tab">


        <div class="row mb-3">
            <label class="lead">Coberturas adicionales</label>
            <hr>
        </div>

        <div class="row">
            <div class="tableContainer" style="margin: 2rem 0">
                <table id="maritimo_rcCoberturasAdicionalesTable" class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Coberturas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowCoberturaV2(event, 'maritimo_rc')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="maritimo_rcCoberturasAdicionalesTableBody">

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
                                <input type="number" step="any" placeholder="0" name="coverage_additional_usd[]" data-money>
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
                <table id="maritimo_rcClausulasAdicionalesTable" class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Cláusulas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowClausula(event, 'maritimo_rc')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="maritimo_rcClausulasAdicionalesTableBody">

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
                                <input type="number" step="any" placeholder="0" name="clause_additional_usd[]" data-money>
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
        <div id="maritimo_rcDeduciblesContainer" class="row">
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
            <button type="button" class="btn btn-info" style="color: white" onclick="addDeducible(event, 'maritimo_rc')">Agregar deducible</button>
        </div>

    </div>

    <div class="tab">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text" for="report">Informe de inspección actualizado</label>
                    <input class="inputForm" type="file" name="report" id="report">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text" for="signedForm">Formulario relleno y firmado</label>
                    <input class="inputForm" type="file" name="signedForm" id="signedForm">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <div class="input-group">
                    <label class="input-group-text" for="accidentRate">Siniestralidad de los últimos 5
                        años</label>
                    <input class="inputForm" type="file" name="accidentRate" id="accidentRate">
                </div>
            </div>
        </div>
    </div>
    <div>
        <div style="float:right;" class="row">
            <p>
            <div class="col-md">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-info mx-2" style="color: white">Atrás</button>
                <button type="submit" id="submitBtn" style="display: none" class="btn btn-info mx-2" onclick="jqsubmit()" style="color: white">Enviar</button>

                {{-- <button type="button" id="submitBtn" class="submitButton" onclick="submitForm('vida_form')"
                    style="display: none">Guardar</button> --}}
            </div>
            <div class="col-md">
                <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-info mx-2" style="color: white">Siguiente</button>
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
