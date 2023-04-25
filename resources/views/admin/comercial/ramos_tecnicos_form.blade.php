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
    const coverageDetail_raw = "{{$coverageDetail}}";
    let coverageDetail;
    fetch(`data:application/*;base64,${coverageDetail_raw}`).then(base64 => base64.blob()).then(blob => {
        coverageDetail = URL.createObjectURL(blob)
        const anchor = document.getElementById('coverageDetailDownload')
        if (anchor) {
            anchor.href = coverageDetail
            anchor.download = 'vida_siniestralidad_previa.{{$coverageDetailExtension}}'
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

    const schedule_raw = "{{$schedule}}";
    let schedule;
    fetch(`data:application/*;base64,${schedule_raw}`).then(base64 => base64.blob()).then(blob => {
        schedule = URL.createObjectURL(blob)
        const anchor = document.getElementById('scheduleDownload')
        if (anchor) {
            anchor.href = schedule
            anchor.download = 'vida_siniestralidad_previa.{{$scheduleExtension}}'
        }
    });

    const soilStudy_raw = "{{$soilStudy}}";
    let soilStudy;
    fetch(`data:application/*;base64,${soilStudy_raw}`).then(base64 => base64.blob()).then(blob => {
        soilStudy = URL.createObjectURL(blob)
        const anchor = document.getElementById('soilStudyDownload')
        if (anchor) {
            anchor.href = soilStudy
            anchor.download = 'vida_siniestralidad_previa.{{$soilStudyExtension}}'
        }
    });

    const quotationForm_raw = "{{$quotationForm}}";
    let quotationForm;
    fetch(`data:application/*;base64,${quotationForm_raw}`).then(base64 => base64.blob()).then(blob => {
        quotationForm = URL.createObjectURL(blob)
        const anchor = document.getElementById('quotationFormDownload')
        if (anchor) {
            anchor.href = informe
            anchor.download = 'vida_siniestralidad_previa.{{$quotationFormExtension}}'
        }
    });
    const experience_raw = "{{$experience}}";
    let experience;
    fetch(`data:application/*;base64,${experience_raw}`).then(base64 => base64.blob()).then(blob => {
        experience = URL.createObjectURL(blob)
        const anchor = document.getElementById('experienceDownload')
        if (anchor) {
            anchor.href = experience
            anchor.download = 'vida_siniestralidad_previa.{{$experienceExtension}}'
        }
    });

    const workMemory_raw = "{{$workMemory}}";
    let workMemory;
    fetch(`data:application/*;base64,${workMemory_raw}`).then(base64 => base64.blob()).then(blob => {
        workMemory = URL.createObjectURL(blob)
        const anchor = document.getElementById('workMemoryDownload')
        if (anchor) {
            anchor.href = workMemory
            anchor.download = 'vida_siniestralidad_previa.{{$workMemoryExtension}}'
        }
    })
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

        @if ($slip->type_coverage === 11)
            <div class="row mb-3">
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
            <div class="row">
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
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text">Límite de indemnización</span>
                    <input value="{{$slip_type->limit_compensation}}" type="number" name="limit_compensation" id="" class="form-control" step="any">
                </div>
            </div>
        </div>
        <div class="row">
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
        <div class="row">
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
        @endif


        @if ($slip_type->asegurable_electronico > 0)
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text">Límite de indemnizacion</span>
                        <input value="{{$slip_type->limit_compensation}}" type="number" step="any" class="form-control" name="limit_compensation">
                    </div>
                </div>

                <div class="col-md-6" id="inputSumaAsegurable3">
                    <div class="input-group mb-3">
                        <label class="input-group-text">Suma asegurable</label>
                        <input value="{{$slip_type->asegurable_electronico}}" id="input_sumaAsegurable" type="number" step="any" placeholder="Suma asegurable" name="asegurable_electronico">
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text">Límite de indemnizacion</span>
                        <input value="{{$slip_type->limit_compensation}}" type="number" step="any" class="form-control" name="limit_compensation">
                    </div>
                </div>
                <div class="col-md-6" id="inputSumaAsegurada3" style="display:flex">
                    <div class="input-group mb-3">
                        <label class="input-group-text">Suma asegurada</label>
                        <input value="{{$slip_type->asegurada_electronico}}" id="input_sumaAsegurada" type="number" step="any" placeholder="Suma asegurada" name="asegurada_electronico">
                    </div>
                </div>
            </div>
        @endif
        @if ($slip->type_coverage === 13)

        <div class="tableContainer">
            @if ($slip_type->asegurable_electronico > 0)
            <h4 class="slipTitle mb-2">Tabla suma asegurable</h4>
            @elseif($slip_type->asegurada_electronico > 0)
            <h4 class="slipTitle mb-2">Tabla suma asegurada</h4>
            @endif

            <button type="button" onclick="refreshSumaAseguradaPerdida()" class="btn btn-info my-2">
                Actualizar
            </button>
            <table id="perdidaSumaAseguradaTable" class="indemnizacionTable">
                <thead>
                    <tr>
                        <th style="text-align: center">#</th>
                        <th style="text-align: center">Ubicación</th>
                        <th style="text-align: center">machine</th>
                        <th style="text-align: center">TOTAL</th>
                        <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                            <button type="button" onclick="addRowSumaPerdida(event, 'perdida')" class="btn btn-success btn-xs">
                                +
                            </button>
                        </th>
                    </tr>
                </thead>
                {{-- tbody --}}

                <tbody id="perdidaSumaAseguradaTableBody">
                    @if (count($sum_assured) > 0)
                    @foreach ($sum_assured as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td style="text-align: center">
                            <input type="text" value="{{$item->location}}" name="location[]" class="inputLocation" style="width: 95px" placeholder="..." novalidate>
                        </td>
                        <td style="text-align: center">
                            <input value="{{$item->machine}}" class="col1 row{{$key+1}}" onkeyup="incendioSumaAsegurableTotales({{$key+1}}, 1, 'perdida')" type="number" step="any" name="machine[]" value="0" novalidate style="width: 95px">
                        </td>
                        <td style="text-align: center">
                            <span class="slipTitle col12" id="rowTotal{{$key+1}}">0</span>$
                        </td>
                        <td></td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>1</td>
                        <td style="text-align: center">
                            <input type="text" name="location[]" class="inputLocation" style="width: 95px" placeholder="..." novalidate>
                        </td>
                        <td style="text-align: center">
                            <input class="col1 row1" onkeyup="incendioSumaAsegurableTotales(1, 1, 'perdida')" type="number" step="any" name="machine[]" value="0" novalidate style="width: 95px">
                        </td>
                        <td style="text-align: center">
                            <span class="slipTitle col12" id="rowTotal1">0</span>$
                        </td>
                        <td></td>
                    </tr>
                    @endif


                </tbody>

                <tfoot>

                    <tr>
                        <td style="text-align: center">
                        </td>
                        <td style="text-align: center">
                            <h5 class="slipTitle">Total</h5>
                        </td>
                        <td style="text-align: center">
                            <span id="colTotal1" class="slipTitle">0</span>$
                        </td>
                        <td style="text-align: center">
                            <span class="slipTitle " id="incendioTotalTotal">0</span>$
                        </td>
                    </tr>

                </tfoot>

            </table>
        </div>

        @endif

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
                            <input class="form-control" type="file" name="soilStudy" hidden="true" id="soilStudy" accept="application/*">
                            <label class="input-group-text" hidden="true" for="soilStudy" id="soilStudyFileLabel">Estudio de suelos
                            </label>
                            @if ($soilStudy)
                            <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="soilStudyDownload">Estudio de suelos - Previo</a>
                            <button type="button" class="btn btn-info" style="color: white" onclick="togglesoilStudy()" id="soilStudyFileToggle">Modificar</button>
                            <script>
                                let toggledsoilStudyFile = false;
                                const soilStudyInput = document.getElementById('soilStudy');
                                const soilStudyDownload = document.getElementById('soilStudyDownload');
                                const soilStudyLabel = document.getElementById('soilStudyFileLabel');
                                const soilStudyToggle = document.getElementById('soilStudyFileToggle');

                                function togglesoilStudy() {
                                    toggledsoilStudyFile = !toggledsoilStudyFile;
                                    soilStudyInput.hidden = !toggledsoilStudyFile;
                                    soilStudyDownload.hidden = toggledsoilStudyFile;
                                    soilStudyLabel.hidden = !toggledsoilStudyFile;
                                    soilStudyToggle.textContent = toggledsoilStudyFile ? 'Usar previo' : 'Modificar'
                                    if (toggledsoilStudyFile) soilStudyInput.click()
                                }
                            </script>
                            @else<input type="file" name="soilStudy" id="soilStudy" class="form-control">
                            <label for="soilStudy" class="input-group-text">Estudio de suelos</label>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input class="form-control" type="file" name="quotationForm" hidden="true" id="quotationForm" accept="application/*">
                            <label class="input-group-text" hidden="true" for="quotationForm" id="quotationFormFileLabel">Formulario de
                                cotización
                            </label>
                            @if ($quotationForm)
                            <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="quotationFormDownload">Formulario de
                                cotización - Previo</a>
                            <button type="button" class="btn btn-info" style="color: white" onclick="togglequotationForm()" id="quotationFormFileToggle">Modificar</button>
                            <script>
                                let toggledquotationFormFile = false;
                                const quotationFormInput = document.getElementById('quotationForm');
                                const quotationFormDownload = document.getElementById('quotationFormDownload');
                                const quotationFormLabel = document.getElementById('quotationFormFileLabel');
                                const quotationFormToggle = document.getElementById('quotationFormFileToggle');

                                function togglequotationForm() {
                                    toggledquotationFormFile = !toggledquotationFormFile;
                                    quotationFormInput.hidden = !toggledquotationFormFile;
                                    quotationFormDownload.hidden = toggledquotationFormFile;
                                    quotationFormLabel.hidden = !toggledquotationFormFile;
                                    quotationFormToggle.textContent = toggledquotationFormFile ? 'Usar previo' : 'Modificar'
                                    if (toggledquotationFormFile) quote_form_fileInput.click()
                                }
                            </script>
                            @else<input type="file" name="quote_form_file" id="quote_form_file" class="form-control">
                            <label for="quote_form_file" class="input-group-text">Formularios de cotización</label>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input class="form-control" type="file" name="experience" hidden="true" id="experience" accept="application/*">
                            <label class="input-group-text" hidden="true" for="experience" id="experienceFileLabel">Experiencia del
                                contratista
                            </label>
                            @if ($experience)
                            <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="experienceDownload">Experiencia del
                                contratista - Previo</a>
                            <button type="button" class="btn btn-info" style="color: white" onclick="toggleexperience()" id="experienceFileToggle">Modificar</button>
                            <script>
                                let toggledexperienceFile = false;
                                const experienceInput = document.getElementById('experience');
                                const experienceDownload = document.getElementById('experienceDownload');
                                const experienceLabel = document.getElementById('experienceFileLabel');
                                const experienceToggle = document.getElementById('experienceFileToggle');

                                function toggleexperience() {
                                    toggledexperienceFile = !toggledexperienceFile;
                                    experienceInput.hidden = !toggledexperienceFile;
                                    experienceDownload.hidden = toggledexperienceFile;
                                    experienceLabel.hidden = !toggledexperienceFile;
                                    experienceToggle.textContent = toggledexperienceFile ? 'Usar previo' : 'Modificar'
                                    if (toggledexperienceFile) experienceInput.click()
                                }
                            </script>
                            @else<input type="file" name="experience" id="experience" class="form-control">
                            <label for="experience" class="input-group-text">Experiencia del
                                contratista</label>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group" id="display_if_sum_assured" style="display: none">
                            <input class="form-control" type="file" name="alopQuote" hidden="true" id="alopQuote" accept="application/*">
                            <label class="input-group-text" hidden="true" for="alopQuote" id="alopQuoteFileLabel">Para ALOP formulario de
                                cotización
                            </label>
                            @if ($alopQuote)
                            <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="alopQuoteDownload">Para ALOP formulario de
                                cotización - Previo</a>
                            <button type="button" class="btn btn-info" style="color: white" onclick="togglealopQuote()" id="alopQuoteFileToggle">Modificar</button>
                            <script>
                                let toggledalopQuoteFile = false;
                                const alopQuoteInput = document.getElementById('alopQuote');
                                const alopQuoteDownload = document.getElementById('alopQuoteDownload');
                                const alopQuoteLabel = document.getElementById('alopQuoteFileLabel');
                                const alopQuoteToggle = document.getElementById('alopQuoteFileToggle');

                                function togglealopQuote() {
                                    toggledalopQuoteFile = !toggledalopQuoteFile;
                                    alopQuoteInput.hidden = !toggledalopQuoteFile;
                                    alopQuoteDownload.hidden = toggledalopQuoteFile;
                                    alopQuoteLabel.hidden = !toggledalopQuoteFile;
                                    alopQuoteToggle.textContent = toggledalopQuoteFile ? 'Usar previo' : 'Modificar'
                                    if (toggledalopQuoteFile) alopQuoteInput.click()
                                }
                            </script>
                            @else<input type="file" name="alopQuote" id="alopQuote" class="form-control">
                            <label for="alopQuote" class="input-group-text">Para ALOP formulario de
                                cotización</label>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="input-group">
                        <input class="form-control" type="file" name="workMemory" hidden="true" id="workMemory" accept="application/*">
                        <label class="input-group-text" hidden="true" for="workMemory" id="workMemoryFileLabel">Memoria de la obra
                        </label>
                        @if ($workMemory)
                        <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="workMemoryDownload">Memoria de la obra - Previo</a>
                        <button type="button" class="btn btn-info" style="color: white" onclick="toggleworkMemory()" id="workMemoryFileToggle">Modificar</button>
                        <script>
                            let toggledworkMemoryFile = false;
                            const workMemoryInput = document.getElementById('workMemory');
                            const workMemoryDownload = document.getElementById('workMemoryDownload');
                            const workMemoryLabel = document.getElementById('workMemoryFileLabel');
                            const workMemoryToggle = document.getElementById('workMemoryFileToggle');

                            function toggleworkMemory() {
                                toggledworkMemoryFile = !toggledworkMemoryFile;
                                workMemoryInput.hidden = !toggledworkMemoryFile;
                                workMemoryDownload.hidden = toggledworkMemoryFile;
                                workMemoryLabel.hidden = !toggledworkMemoryFile;
                                workMemoryToggle.textContent = toggledworkMemoryFile ? 'Usar previo' : 'Modificar'
                                if (toggledworkMemoryFile) workMemoryInput.click()
                            }
                        </script>
                        @else<input type="file" name="workMemory" id="workMemory" class="form-control">
                        <label for="workMemory" class="input-group-text">Memoria de la obra</label>
                        @endif
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

    <div class="tab">`
        <div class="row">
            <div class="col-md-6" id="inputSumaAsegurable3">
                <div class="input-group">
                    <span class="input-group-text">Suma asegurable</span>
                    <input id="input_sumaAsegurable" type="number" step="any" class="form-control" name="asegurable_electronico">
                </div>
            </div>
            <div class="col-md-6" id="inputSumaAsegurada3">
                <div class="input-group">
                    <span class="input-group-text">Suma asegurada</span>
                    <input id="input_sumaAsegurada" type="number" step="any" class="form-control" name="asegurada_electronico">
                </div>
            </div>
        </div>

        <div class="row my-2">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text">Límite de indemnizacion</span>
                    <input type="number" name="limit_compensation" id="" class="form-control" step="any">
                </div>
            </div>
        </div>
        <div id="showElectronico" style="display: none">
            <div class="row">
                <label class="lead">Suma asegurada y/o asegurable</label>
                <hr style="background-color: darkgrey; width: 70%">
            </div>
            
            <div class="row my-2">
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
                <label class="lead">Límite de indemnizacion</label>
                <hr style="background-color: darkgrey; width: 70%">
            </div>
            <div class="row">
                
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

        <div id="showPerdidaBeneficios" style="display: none">
            <label class="lead">Suma asegurada o asegurable</label>
            <hr style="color:darkgrey; width:70%">
            <div class="row">
                <div class="justify-content-center">
                    <div class="input-group col-md-5 mx-1 my-1">
                        <div class="input-group-text">
                            <input id="sumaAsegurada3" type="radio" name="sumas" onchange="chooseTypeSuma3(event)" class="form-check-input my-1">
                        </div>
                        <label class="form-control" for="sumaAsegurada3">Suma asegurada</label>
                    </div>
                    <div class="input-group col-md-5 mx-1 my-1">
                        <div class="input-group-text">
                            <input id="sumaAsegurable3" type="radio" name="sumas" onchange="chooseTypeSuma3(event)" class="form-check-input my-1">
                        </div>
                        <label class="form-control" for="sumaAsegurable3">Suma asegurable</label>
                    </div>
                </div>
            </div>
        </div>

        <div id="sumaAsegurable3Container" class="flexColumnCenterContainer" style="display:none;margin:1.5rem 0">
            <h4 class="slipTitle">Tabla suma asegurable</h4>

            <table id="perdidaSumaAseguradaTable" class="indemnizacionTable">
                <thead>
                    <tr>
                        <th style="text-align: center">#</th>
                        <th style="text-align: center">Ubicación</th>
                        <th style="text-align: center">machine</th>
                        <th style="text-align: center">TOTAL</th>
                        <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                            <button type="button" onclick="addRowSumaPerdida(event, 'perdida')" class="btn btn-success btn-xs">
                                +
                            </button>
                        </th>
                    </tr>
                </thead>
                {{-- tbody --}}

                <tbody id="perdidaSumaAseguradaTableBody">

                    <tr>
                        <td>1</td>
                        <td style="text-align: center">
                            <input type="text" name="location[]" class="inputLocation" style="width: 95px" placeholder="..." novalidate>
                        </td>
                        <td style="text-align: center">
                            <input class="col1 row1" onkeyup="incendioSumaAsegurableTotales(1, 1, 'perdida')" type="number" step="any" name="machine[]" value="0" novalidate style="width: 95px">
                        </td>
                        <td style="text-align: center">
                            <span class="slipTitle col12" id="rowTotal1">0</span>$
                        </td>
                        <td></td>
                    </tr>

                </tbody>

                <tfoot>

                    <tr>
                        <td style="text-align: center">
                        </td>
                        <td style="text-align: center">
                            <h5 class="slipTitle">Total</h5>
                        </td>
                        <td style="text-align: center">
                            <span id="colTotal1" class="slipTitle">0</span>$
                        </td>
                        <td style="text-align: center">
                            <span class="slipTitle " id="incendioTotalTotal">0</span>$
                        </td>
                    </tr>

                </tfoot>

            </table>
        </div>

        <div class="row">
            <div id="sumaAsegurada3Container" class="tableContainer" style="display:none;margin:1.5rem 0">
                <h4 class="slipTitle">Tabla suma asegurada</h4>

                <table id="perdida_beneficiosSumaAseguradaTable" class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center">#</th>
                            <th style="text-align: center">Ubicación</th>
                            <th style="text-align: center">Maquinaria</th>
                            <th style="text-align: center">TOTAL</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowSumaPerdida(event, 'perdida_beneficios')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}

                    <tbody id="perdida_beneficiosSumaAseguradaTableBody">

                        <tr>
                            <td>1</td>
                            <td style="text-align: center">
                                <input type="text" name="location[]" class="inputLocation" style="width: 95px" placeholder="..." novalidate>
                            </td>
                            <td style="text-align: center">
                                <input class="col1 row1" onkeyup="incendioSumaAsegurableTotales(1, 1, 'perdida_beneficios')" type="number" step="any" name="machine[]" value="0" novalidate style="width: 95px">
                            </td>
                            <td style="text-align: center">
                                <span class="slipTitle col12" id="rowTotal1">0</span>$
                            </td>
                            <td></td>
                        </tr>

                    </tbody>

                    <tfoot>

                        <tr>
                            <td style="text-align: center">
                            </td>
                            <td style="text-align: center">
                                <h5 class="slipTitle">Total</h5>
                            </td>
                            <td style="text-align: center">
                                <span id="colTotal1" class="slipTitle">0</span>$
                            </td>
                            <td style="text-align: center">
                                <span class="slipTitle " id="incendioTotalTotal">0</span>$
                            </td>
                        </tr>

                    </tfoot>

                </table>
            </div>
        </div>

        <div id="tituloCoberturas" class="row">
            <label class="lead">Coberturas adicionales</label>
            <hr style="background-color: darkgrey; width: 70%">
        </div>

        <div id="tituloCobertura" class="row" style="display:none">
            <label class="lead">Coberturas</label>
            <hr style="background-color: darkgrey; width: 70%">
        </div>

        <div class="row">
            <div class="tableContainer" style="margin: 2rem 0">
                <table id="ramos_tecnicosCoberturasAdicionalesTable" class="indemnizacionTable">
                    <caption>No olvidar de llenar mínimo una cobertura.</caption>
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
                    <caption>No olvidar de llenar mínimo una cláusula.</caption>
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
                            <input class="form-control" type="file" name="accidentRate" id="accidentRate">
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
