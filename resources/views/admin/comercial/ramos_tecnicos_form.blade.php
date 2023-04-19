{{-- Ramos Técnicos --}}
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
    const informe_raw = "{{$informe}}";
    let informe;
    fetch(`data:application/*;base64,${informe_raw}`).then(base64 => base64.blob()).then(blob => {
        informe = URL.createObjectURL(blob)
        const anchor = document.getElementById('informeDownload')
        if (anchor) {
            anchor.href = informe
            anchor.download = 'vida_siniestralidad_previa.{{$informeExtension}}'
        }
    });

    const informe_raw = "{{$informe}}";
    let informe;
    fetch(`data:application/*;base64,${informe_raw}`).then(base64 => base64.blob()).then(blob => {
        informe = URL.createObjectURL(blob)
        const anchor = document.getElementById('informeDownload')
        if (anchor) {
            anchor.href = informe
            anchor.download = 'vida_siniestralidad_previa.{{$informeExtension}}'
        }
    });

    const informe_raw = "{{$informe}}";
    let informe;
    fetch(`data:application/*;base64,${informe_raw}`).then(base64 => base64.blob()).then(blob => {
        informe = URL.createObjectURL(blob)
        const anchor = document.getElementById('informeDownload')
        if (anchor) {
            anchor.href = informe
            anchor.download = 'vida_siniestralidad_previa.{{$informeExtension}}'
        }
    });

    const informe_raw = "{{$informe}}";
    let informe;
    fetch(`data:application/*;base64,${informe_raw}`).then(base64 => base64.blob()).then(blob => {
        informe = URL.createObjectURL(blob)
        const anchor = document.getElementById('informeDownload')
        if (anchor) {
            anchor.href = informe
            anchor.download = 'vida_siniestralidad_previa.{{$informeExtension}}'
        }
    });

    const informe_raw = "{{$informe}}";
    let informe;
    fetch(`data:application/*;base64,${informe_raw}`).then(base64 => base64.blob()).then(blob => {
        informe = URL.createObjectURL(blob)
        const anchor = document.getElementById('informeDownload')
        if (anchor) {
            anchor.href = informe
            anchor.download = 'vida_siniestralidad_previa.{{$informeExtension}}'
        }
    });

    const informe_raw = "{{$informe}}";
    let informe;
    fetch(`data:application/*;base64,${informe_raw}`).then(base64 => base64.blob()).then(blob => {
        informe = URL.createObjectURL(blob)
        const anchor = document.getElementById('informeDownload')
        if (anchor) {
            anchor.href = informe
            anchor.download = 'vida_siniestralidad_previa.{{$informeExtension}}'
        }
    });

    const informe_raw = "{{$informe}}";
    let informe;
    fetch(`data:application/*;base64,${informe_raw}`).then(base64 => base64.blob()).then(blob => {
        informe = URL.createObjectURL(blob)
        const anchor = document.getElementById('informeDownload')
        if (anchor) {
            anchor.href = informe
            anchor.download = 'vida_siniestralidad_previa.{{$informeExtension}}'
        }
    }); <
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
    <form enctype="multipart/form-data" method="POST" action="{{ route('slip.update', $slip->id) }}" id="r_tecnicos">
        @csrf
        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
        @method('PUT')
        <input type="hidden" name="type_slip" value="ramos_tecnicos_form">
        <input hidden type="number" name="slip_status" value="3">


        @include('admin.comercial.include.object_index')

        <div class="row mb-3">
            <div class="col-md-8">
                <div class="input-group">
                    <input class="form-control" type="file" name="coverageDetail" hidden="true" id="coverageDetail" accept="application/*">
                    <label class="input-group-text" hidden="true" for="coverageDetail" id="coverageDetailFileLabel">Detalle de equipos asegurados
                    </label>
                    @if ($coverageDetail)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="coverageDetailDownload">Detalle de equipos asegurados - Previo</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="togglecoverageDetail()" id="coverageDetailFileToggle">Modificar</button>
                    <script>
                        let toggledcoverageDetailFile = false;
                        const coverageDetailInput = document.getElementById('coverageDetail');
                        const coverageDetailDownload = document.getElementById('coverageDetailDownload');
                        const coverageDetailLabel = document.getElementById('coverageDetailFileLabel');
                        const coverageDetailToggle = document.getElementById('coverageDetailFileToggle');

                        function togglecoverageDetail() {
                            toggledcoverageDetailFile = !toggledcoverageDetailFile;
                            coverageDetailInput.hidden = !toggledcoverageDetailFile;
                            coverageDetailDownload.hidden = toggledcoverageDetailFile;
                            coverageDetailLabel.hidden = !toggledcoverageDetailFile;
                            coverageDetailToggle.textContent = toggledcoverageDetailFile ? 'Usar previo' : 'Modificar'
                            if (toggledcoverageDetailFile) coverageDetailInput.click()
                        }
                    </script>
                    @else
                    <span class="input-group-text">Detalle de equipos asegurados</span>
                    <input type="file" class="form-control" placeholder="..." name="coverageDetail" id="object_insurance_detail">
                    @endif
                </div>
            </div>
        </div>

        <div class="row mb-3" style="{{$slip->type_coverage === 11 ? 'display:flex' : 'display:none'}}">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text">Suma asegurable</span>
                    <input value="{{$slip_type->asegurable_electronico}}" type="number" step="any" class="form-control" name="asegurable_electronico">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text">Suma asegurada</span>
                    <input value="{{$slip_type->asegurada_electronico}}" type="number" step="any" class="form-control" name="asegurada_electronico">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text">Límite de indemnización</span>
                    <input value="{{$slip_type->limit_compensation}}" type="number" name="limit_compensation" id="" class="form-control" step="any">
                </div>
            </div>
        </div>
        <div class="row" style="{{$slip->type_coverage === 11 ? 'display:flex' : 'display:none'}}">
            <div class="col-md-10">
                <table class="table table-hover table-light table-responsive-lg">
                    <caption>Cuadro resumen</caption>
                    <thead>
                        <th>Descripción</th>
                        <th>Valor</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sección I: Todo riesgo</td>
                            <td>
                                <input value="{{$slip_type->todo_riesgo}}" type="number" name="todo_riesgo" data-money id="" step="any">
                            </td>
                        </tr>
                        <tr>
                            <td>Sección II: Portadores Externos de Datos</td>
                            <td>
                                <input value="{{$slip_type->portadores_externos}}" type="number" name="portadores_externos" data-money id="" step="any">
                            </td>
                        </tr>
                        <tr>
                            <td>Sección III: Incremento en los costos de operación</td>
                            <td>
                                <input value="{{$slip_type->incremento_costos}}" type="number" name="incremento_costos" data-money id="" step="any">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                a. Límite máximo Diario
                            </td>
                            <td>
                                <input value="{{$slip_type->limite_diario}}" type="number" name="limite_diario" placeholder="(en USD)" step="any">
                            </td>
                        </tr>
                        <tr>
                            <td>b. Periodo de Cobertura</td>
                            <td>
                                <input value="{{$slip_type->periodo_cobertura}}" type="number" name="periodo_cobertura" id="" placeholder="No. Días" step="any">
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>(=)Total Asegurado</td>
                            <td>
                                <input value="{{$slip_type->total_cuadro1}}" type="number" name="total_cuadro1" id="" step="any">
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row" style="{{$slip->type_coverage === 11 ? 'display:flex' : 'display:none'}}">
            <div class="col-md-10">
                <table class="table table-hover table-light table-responsive-lg">
                    <caption>Cuadro resumen</caption>
                    <thead>
                        <th>Descripción</th>
                        <th>Valor</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sección I: Todo riesgo</td>
                            <td>
                                <input value="{{$slip_type->todo_riesgo2}}" type="number" name="todo_riesgo2" data-money id="" step="any">
                            </td>
                        </tr>
                        <tr>
                            <td>Sección II: Portadores Externos de Datos</td>
                            <td>
                                <input value="{{$slip_type->portadores_externos2}}" type="number" name="portadores_externos2" data-money id="" step="any">
                            </td>
                        </tr>
                        <tr>
                            <td>Sección III: Incremento en los costos de operación</td>
                            <td>
                                <input value="{{$slip_type->incremento_costos2}}" type="number" name="incremento_costos2" data-money id="" step="any">
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td scope="col">(=)Total Asegurado</td>
                            <td>
                                <input value="{{$slip_type->total_cuadro2}}" type="number" name="total_cuadro2" id="" step="any">
                            </td>
                        </tr>
                    </tfoot>
                </table>
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
            <label for="" class="lead">Archivos adjuntos</label>
            <hr style="background-color:darkgrey">

            <div class="col-md-12">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input class="form-control" type="file" name="accidentRate" hidden="true" id="accidentRate" accept="application/*">
                            <label class="input-group-text" hidden="true" for="accidentRate" id="accidentRateFileLabel">Siniestralidad 5 años
                                detallada
                            </label>
                            @if ($accidentRate)
                            <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="accidentRateDownload">Siniestralidad 5 años
                                detallada - Previo</a>
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
                            <label for="accidentRate" class="input-group-text">Siniestralidad 5 años
                                detallada</label>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="input-group">
                            <input class="form-control" type="file" name="schedule" hidden="true" id="schedule" accept="application/*">
                            <label class="input-group-text" hidden="true" for="schedule" id="scheduleFileLabel">Cronograma valorado de la
                                obra
                            </label>
                            @if ($schedule)
                            <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="scheduleDownload">Cronograma valorado de la
                                obra - Previo</a>
                            <button type="button" class="btn btn-info" style="color: white" onclick="toggleschedule()" id="scheduleFileToggle">Modificar</button>
                            <script>
                                let toggledscheduleFile = false;
                                const scheduleInput = document.getElementById('schedule');
                                const scheduleDownload = document.getElementById('scheduleDownload');
                                const scheduleLabel = document.getElementById('scheduleFileLabel');
                                const scheduleToggle = document.getElementById('scheduleFileToggle');

                                function toggleschedule() {
                                    toggledscheduleFile = !toggledscheduleFile;
                                    scheduleInput.hidden = !toggledscheduleFile;
                                    scheduleDownload.hidden = toggledscheduleFile;
                                    scheduleLabel.hidden = !toggledscheduleFile;
                                    scheduleToggle.textContent = toggledscheduleFile ? 'Usar previo' : 'Modificar'
                                    if (toggledscheduleFile) scheduleInput.click()
                                }
                            </script>
                            @else<input type="file" name="schedule" id="schedule" class="form-control">
                            <label for="schedule" class="input-group-text">Cronograma valorado de la
                                obra</label>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input class="form-control" type="file" name="quote_form_file" hidden="true" id="quote_form_file" accept="application/*">
                            <label class="input-group-text" hidden="true" for="quote_form_file" id="quote_form_fileFileLabel">Informe de inspección
                            </label>
                            @if ($quote_form_file)
                            <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="quote_form_fileDownload">Informe de inspección - Previo</a>
                            <button type="button" class="btn btn-info" style="color: white" onclick="togglequote_form_file()" id="quote_form_fileFileToggle">Modificar</button>
                            <script>
                                let toggledquote_form_fileFile = false;
                                const quote_form_fileInput = document.getElementById('quote_form_file');
                                const quote_form_fileDownload = document.getElementById('quote_form_fileDownload');
                                const quote_form_fileLabel = document.getElementById('quote_form_fileFileLabel');
                                const quote_form_fileToggle = document.getElementById('quote_form_fileFileToggle');

                                function togglequote_form_file() {
                                    toggledquote_form_fileFile = !toggledquote_form_fileFile;
                                    quote_form_fileInput.hidden = !toggledquote_form_fileFile;
                                    quote_form_fileDownload.hidden = toggledquote_form_fileFile;
                                    quote_form_fileLabel.hidden = !toggledquote_form_fileFile;
                                    quote_form_fileToggle.textContent = toggledquote_form_fileFile ? 'Usar previo' : 'Modificar'
                                    if (toggledquote_form_fileFile) quote_form_fileInput.click()
                                }
                            </script>
                            @else<input type="file" name="quote_form_file" id="quote_form_file" class="form-control">
                            <label for="quote_form_file" class="input-group-text">Formularios de cotización</label>
                            @endif
                            <label class="input-group-text" for="soilStudy">Estudio de suelos</label>
                            <input class="form-control" type="file" name="soilStudy" id="soilStudy">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input class="form-control" type="file" name="quote_form_file" hidden="true" id="quote_form_file" accept="application/*">
                            <label class="input-group-text" hidden="true" for="quote_form_file" id="quote_form_fileFileLabel">Informe de inspección
                            </label>
                            @if ($quote_form_file)
                            <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="quote_form_fileDownload">Informe de inspección - Previo</a>
                            <button type="button" class="btn btn-info" style="color: white" onclick="togglequote_form_file()" id="quote_form_fileFileToggle">Modificar</button>
                            <script>
                                let toggledquote_form_fileFile = false;
                                const quote_form_fileInput = document.getElementById('quote_form_file');
                                const quote_form_fileDownload = document.getElementById('quote_form_fileDownload');
                                const quote_form_fileLabel = document.getElementById('quote_form_fileFileLabel');
                                const quote_form_fileToggle = document.getElementById('quote_form_fileFileToggle');

                                function togglequote_form_file() {
                                    toggledquote_form_fileFile = !toggledquote_form_fileFile;
                                    quote_form_fileInput.hidden = !toggledquote_form_fileFile;
                                    quote_form_fileDownload.hidden = toggledquote_form_fileFile;
                                    quote_form_fileLabel.hidden = !toggledquote_form_fileFile;
                                    quote_form_fileToggle.textContent = toggledquote_form_fileFile ? 'Usar previo' : 'Modificar'
                                    if (toggledquote_form_fileFile) quote_form_fileInput.click()
                                }
                            </script>
                            @else<input type="file" name="quote_form_file" id="quote_form_file" class="form-control">
                            <label for="quote_form_file" class="input-group-text">Formularios de cotización</label>
                            @endif
                            <label class="input-group-text" for="quotationForm">Formulario de
                                cotización</label>
                            <input class="form-control" type="file" name="quotationForm" id="quotationForm">
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input class="form-control" type="file" name="quote_form_file" hidden="true" id="quote_form_file" accept="application/*">
                            <label class="input-group-text" hidden="true" for="quote_form_file" id="quote_form_fileFileLabel">Informe de inspección
                            </label>
                            @if ($quote_form_file)
                            <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="quote_form_fileDownload">Informe de inspección - Previo</a>
                            <button type="button" class="btn btn-info" style="color: white" onclick="togglequote_form_file()" id="quote_form_fileFileToggle">Modificar</button>
                            <script>
                                let toggledquote_form_fileFile = false;
                                const quote_form_fileInput = document.getElementById('quote_form_file');
                                const quote_form_fileDownload = document.getElementById('quote_form_fileDownload');
                                const quote_form_fileLabel = document.getElementById('quote_form_fileFileLabel');
                                const quote_form_fileToggle = document.getElementById('quote_form_fileFileToggle');

                                function togglequote_form_file() {
                                    toggledquote_form_fileFile = !toggledquote_form_fileFile;
                                    quote_form_fileInput.hidden = !toggledquote_form_fileFile;
                                    quote_form_fileDownload.hidden = toggledquote_form_fileFile;
                                    quote_form_fileLabel.hidden = !toggledquote_form_fileFile;
                                    quote_form_fileToggle.textContent = toggledquote_form_fileFile ? 'Usar previo' : 'Modificar'
                                    if (toggledquote_form_fileFile) quote_form_fileInput.click()
                                }
                            </script>
                            @else<input type="file" name="quote_form_file" id="quote_form_file" class="form-control">
                            <label for="quote_form_file" class="input-group-text">Formularios de cotización</label>
                            @endif
                            <label class="input-group-text" for="experience">Experiencia del
                                contratista</label>
                            <input class="form-control" type="file" name="experience" id="experience">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group" id="display_if_sum_assured" style="display: none">
                            <input class="form-control" type="file" name="quote_form_file" hidden="true" id="quote_form_file" accept="application/*">
                            <label class="input-group-text" hidden="true" for="quote_form_file" id="quote_form_fileFileLabel">Informe de inspección
                            </label>
                            @if ($quote_form_file)
                            <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="quote_form_fileDownload">Informe de inspección - Previo</a>
                            <button type="button" class="btn btn-info" style="color: white" onclick="togglequote_form_file()" id="quote_form_fileFileToggle">Modificar</button>
                            <script>
                                let toggledquote_form_fileFile = false;
                                const quote_form_fileInput = document.getElementById('quote_form_file');
                                const quote_form_fileDownload = document.getElementById('quote_form_fileDownload');
                                const quote_form_fileLabel = document.getElementById('quote_form_fileFileLabel');
                                const quote_form_fileToggle = document.getElementById('quote_form_fileFileToggle');

                                function togglequote_form_file() {
                                    toggledquote_form_fileFile = !toggledquote_form_fileFile;
                                    quote_form_fileInput.hidden = !toggledquote_form_fileFile;
                                    quote_form_fileDownload.hidden = toggledquote_form_fileFile;
                                    quote_form_fileLabel.hidden = !toggledquote_form_fileFile;
                                    quote_form_fileToggle.textContent = toggledquote_form_fileFile ? 'Usar previo' : 'Modificar'
                                    if (toggledquote_form_fileFile) quote_form_fileInput.click()
                                }
                            </script>
                            @else<input type="file" name="quote_form_file" id="quote_form_file" class="form-control">
                            <label for="quote_form_file" class="input-group-text">Formularios de cotización</label>
                            @endif
                            <label class="input-group-text" for="alopQuote">Para ALOP formulario de
                                cotización</label>
                            <input class="form-control" type="file" name="alopQuote" id="alopQuote">
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="input-group">
                        <input class="form-control" type="file" name="quote_form_file" hidden="true" id="quote_form_file" accept="application/*">
                        <label class="input-group-text" hidden="true" for="quote_form_file" id="quote_form_fileFileLabel">Informe de inspección
                        </label>
                        @if ($quote_form_file)
                        <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="quote_form_fileDownload">Informe de inspección - Previo</a>
                        <button type="button" class="btn btn-info" style="color: white" onclick="togglequote_form_file()" id="quote_form_fileFileToggle">Modificar</button>
                        <script>
                            let toggledquote_form_fileFile = false;
                            const quote_form_fileInput = document.getElementById('quote_form_file');
                            const quote_form_fileDownload = document.getElementById('quote_form_fileDownload');
                            const quote_form_fileLabel = document.getElementById('quote_form_fileFileLabel');
                            const quote_form_fileToggle = document.getElementById('quote_form_fileFileToggle');

                            function togglequote_form_file() {
                                toggledquote_form_fileFile = !toggledquote_form_fileFile;
                                quote_form_fileInput.hidden = !toggledquote_form_fileFile;
                                quote_form_fileDownload.hidden = toggledquote_form_fileFile;
                                quote_form_fileLabel.hidden = !toggledquote_form_fileFile;
                                quote_form_fileToggle.textContent = toggledquote_form_fileFile ? 'Usar previo' : 'Modificar'
                                if (toggledquote_form_fileFile) quote_form_fileInput.click()
                            }
                        </script>
                        @else<input type="file" name="quote_form_file" id="quote_form_file" class="form-control">
                        <label for="quote_form_file" class="input-group-text">Formularios de cotización</label>
                        @endif
                        <label class="input-group-text" for="accidentRate">Memoria de la obra</label>
                        <input class="form-control" type="file" name="workMemory" id="workMemory">
                    </div>
                </div>
            </div>
        </div>
        @include('admin.comercial.include.leyJurisdiccion')


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
<form enctype="multipart/form-data" method="POST" id="r_tecnicos" class="form tecnico" style="display: none">
    <!-- One "tab" for each step in the form: -->

    @csrf
    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
    <input type="hidden" name="type_slip" value="ramos_tecnicos_form">
    <input hidden type="number" name="slip_status" value="3">
    <div class="tab">
        @include('admin.comercial.include.object_index')
        <div class="col-md-8">
            <div class="input-group">
                <span class="input-group-text">Detalle de equipos asegurados</span>
                <input type="file" class="form-control" placeholder="..." name="coverageDetail" id="object_insurance_detail">
            </div>

        </div>
    </div>

    <div class="tab">
        <div id="showElectronico" style="display: none">
            <div class="row">
                <div class="input-group">
                    <span class="input-group-text">Suma asegurable</span>
                    <input type="number" step="any" class="form-control" name="asegurable_electronico">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">Suma asegurada</span>
                        <input type="number" step="any" class="form-control" name="asegurada_electronico">
                    </div>
                </div>
                <div class="col-md-8">
                    <table class="table table-hover table-light table-responsive-lg">
                        <caption>Cuadro resumen</caption>
                        <thead>
                            <th>Descripción</th>
                            <th>Valor</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sección I: Todo riesgo</td>
                                <td>
                                    <input type="number" name="todo_riesgo" data-money id="" step="any">
                                </td>
                            </tr>
                            <tr>
                                <td>Sección II: Portadores Externos de Datos</td>
                                <td>
                                    <input type="number" name="portadores_externos" data-money id="" step="any">
                                </td>
                            </tr>
                            <tr>
                                <td>Sección III: Incremento en los costos de operación</td>
                                <td>
                                    <input type="number" name="incremento_costos" data-money id="" step="any">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    a. Límite máximo Diario
                                </td>
                                <td>
                                    <input type="number" name="limite_diario" placeholder="(en USD)" step="any">
                                </td>
                            </tr>
                            <tr>
                                <td>b. Periodo de Cobertura</td>
                                <td>
                                    <input type="number" name="periodo_cobertura" id="" placeholder="No. Días" step="any">
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>(=)Total Asegurado</td>
                                <td>
                                    <input type="number" name="total_cuadro1" id="" step="any">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">Límite de indemnización</span>
                        <input type="number" name="limit_compensation" id="" class="form-control" step="any">
                    </div>
                </div>
                <div class="col-md-8">
                    <table class="table table-hover table-light table-responsive-lg">
                        <caption>Cuadro resumen</caption>
                        <thead>
                            <th>Descripción</th>
                            <th>Valor</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sección I: Todo riesgo</td>
                                <td>
                                    <input type="number" name="todo_riesgo2" data-money id="" step="any">
                                </td>
                            </tr>
                            <tr>
                                <td>Sección II: Portadores Externos de Datos</td>
                                <td>
                                    <input type="number" name="portadores_externos2" data-money id="" step="any">
                                </td>
                            </tr>
                            <tr>
                                <td>Sección III: Incremento en los costos de operación</td>
                                <td>
                                    <input type="number" name="incremento_costos2" data-money id="" step="any">
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td scope="col">(=)Total Asegurado</td>
                                <td>
                                    <input type="number" name="total_cuadro2" id="" step="any">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <label class="lead">Coberturas adicionales</label>
            <hr style="background-color: darkgrey; width: 70%">
        </div>

        <div class="row">
            <div class="tableContainer" style="margin: 2rem 0">
                <table id="ramos_tecnicosCoberturasAdicionalesTable" class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Coberturas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" style="display:none" id="btnCoberturasEE" onclick="addRowCoberturaV2(event, 'ramos_tecnicos', 'tecnico', 'electronico')" class="btn btn-success btn-xs">
                                    +
                                </button>
                                <button type="button" style="display:none" id="btnCoberturasRM" onclick="addRowCoberturaV2(event, 'ramos_tecnicos', 'tecnico', 'rotura_maquinaria')" class="btn btn-success btn-xs">
                                    +
                                </button>
                                <button type="button" style="display:none" id="btnCoberturasPBRM" onclick="addRowCoberturaV2(event, 'ramos_tecnicos', 'tecnico', 'beneficios')" class="btn btn-success btn-xs">
                                    +
                                </button>
                                <button type="button" style="display:none" id="btnCoberturasEMC" onclick="addRowCoberturaV2(event, 'ramos_tecnicos', 'tecnico', 'equipo_maquinaria')" class="btn btn-success btn-xs">
                                    +
                                </button>
                                <button type="button" style="display:none" id="btnCoberturasTRC" onclick="addRowCoberturaV2(event, 'ramos_tecnicos', 'tecnico', 'construccion')" class="btn btn-success btn-xs">
                                    +
                                </button>
                                <button type="button" style="display:none" id="btnCoberturasMM" onclick="addRowCoberturaV2(event, 'ramos_tecnicos', 'tecnico', 'montaje')" class="btn btn-success btn-xs">
                                    +
                                </button>
                                <button type="button" style="display:none" id="btnCoberturasALOP" onclick="addRowCoberturaV2(event, 'ramos_tecnicos', 'tecnico', 'alop')" class="btn btn-success btn-xs">
                                    +
                                </button>

                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="ramos_tecnicosCoberturasAdicionalesTableBody">

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
                                <input type="number" placeholder="0" data-money name="coverage_additional_usd[]">
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
            <label class="lead">Cláusulas adicionales</label>
            <hr style="background-color: darkgrey; width: 70%">
        </div>

        <div class="row">
            <div class="tableContainer" style="margin: 2rem 0">
                <table id="ramos_tecnicosClausulasAdicionalesTable" class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Cláusulas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" style="display: none" id="btnClausulasEE" onclick="addRowClausula(event, 'ramos_tecnicos', 'tecnico', 'electronico')" class="btn btn-success btn-xs">
                                    +
                                </button>
                                <button type="button" style="display: none" id="btnClausulasRM" onclick="addRowClausula(event, 'ramos_tecnicos', 'tecnico', 'rotura_maquinaria')" class="btn btn-success btn-xs">
                                    +
                                </button>
                                <button type="button" style="display: none" id="btnClausulasPBRM" onclick="addRowClausula(event, 'ramos_tecnicos', 'tecnico', 'beneficios')" class="btn btn-success btn-xs">
                                    +
                                </button>
                                <button type="button" style="display: none" id="btnClausulasEMC" onclick="addRowClausula(event, 'ramos_tecnicos', 'tecnico', 'equipo_maquinaria')" class="btn btn-success btn-xs">
                                    +
                                </button>
                                <button type="button" style="display: none" id="btnClausulasTRC" onclick="addRowClausula(event, 'ramos_tecnicos', 'tecnico', 'construccion')" class="btn btn-success btn-xs">
                                    +
                                </button>
                                <button type="button" style="display: none" id="btnClausulasMM" onclick="addRowClausula(event, 'ramos_tecnicos', 'tecnico', 'montaje')" class="btn btn-success btn-xs">
                                    +
                                </button>
                                <button type="button" style="display: none" id="btnClausulasALOP" onclick="addRowClausula(event, 'ramos_tecnicos', 'tecnico', 'alop')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="ramos_tecnicosClausulasAdicionalesTableBody">

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
                                <input type="number" placeholder="0" data-money name="clause_additional_usd[]">
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
            <label for="" class="lead">Tasa/Prima</label>
            <hr style="background-color: darkgrey; width: 70%">

            <div class="col-md-6">
                <div class="input-group mb-3">
                    <span class="input-group-text" for="reinsurer_rate">Tasa de reaseguros</span>
                    <input class="form-control" type="number" name="reinsurer_rate" id="reinsurer_rate" step="any"><span class="input-group-text">%</span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="deducible">Prima de reaseguros</label>
                    <input class="inputForm" type="number" step="any" data-money placeholder="USD" name="reinsurance_premium">
                </div>
            </div>
        </div>

        <div class="row">
            <label class="lead">Deducibles</label>
            <hr style="background-color: darkgray">
        </div>
        <div id="ramos_tecnicosDeduciblesContainer" class="row">
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
            <button type="button" class="btn btn-info" style="color: white" onclick="addDeducible(event, 'ramos_tecnicos')">Agregar deducible</button>
        </div>

        <div class="row mb-3">
            <label for="" class="lead">Archivos adjuntos</label>
            <hr style="background-color:darkgrey">

            <div class="col-md-12">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="input-group">
                            <label class="input-group-text" for="accidentRate">Siniestralidad 5 años
                                detallada</label>
                            <input class="form-control" type="file" name="informe" id="informe">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <label class="input-group-text" for="schedule">Cronograma valorado de la
                                obra</label>
                            <input class="form-control" type="file" name="schedule" id="schedule">
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="input-group">
                            <label class="input-group-text" for="soilStudy">Estudio de suelos</label>
                            <input class="form-control" type="file" name="soilStudy" id="soilStudy">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <label class="input-group-text" for="quotationForm">Formulario de cotización</label>
                            <input class="form-control" type="file" name="quotationForm" id="quotationForm">
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="input-group">
                            <label class="input-group-text" for="experience">Experiencia del contratista</label>
                            <input class="form-control" type="file" name="experience" id="experience">
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="input-group">
                        <label class="input-group-text" for="workMemory">Memoria de la obra</label>
                        <input class="form-control" type="file" name="workMemory" id="workMemory">
                    </div>
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
                {{-- <button type="button" id="submitBtn" class="submitButton"
                    onclick="submitForm('activos_fijos_form')" style="display: none">Guardar</button> --}}
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
