{{-- Riesgos --}}
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
    const quotationReport_raw = "{{$quotationReport}}";
    let quotationReport;
    fetch(`data:application/*;base64,${quotationReport_raw}`).then(base64 => base64.blob()).then(blob => {
        quotationReport = URL.createObjectURL(blob)
        const anchor = document.getElementById('quotationReportDownload')
        if (anchor) {
            anchor.href = quotationReport
            anchor.download = 'vida_siniestralidad_previa.{{$quotationReportExtension}}'
        }
    });
    const financialStatements_raw = "{{$financialStatements}}";
    let financialStatements;
    fetch(`data:application/*;base64,${financialStatements_raw}`).then(base64 => base64.blob()).then(blob => {
        financialStatements = URL.createObjectURL(blob)
        const anchor = document.getElementById('financialStatementsDownload')
        if (anchor) {
            anchor.href = financialStatements
            anchor.download = 'vida_siniestralidad_previa.{{$financialStatementsExtension}}'
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

<div class="card px-4 py-2">
    <form enctype="multipart/form-data" method="POST" action="{{ route('slip.update', $slip->id) }}" id="riesgos_form">
        @csrf
        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
        @method('PUT')
        <input type="hidden" name="type_slip" value="riesgos_form">
        <input hidden type="number" name="slip_status" value="3">

        @include('admin.comercial.include.object_index')


        @if ($slip->type_coverage === 44)
            <div class="row mb-3">
                <div class="flexColumnCenterContainer">
                    <label class="lead">Límite de indemnización</label>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="input-group-text">
                        Seccion I: BBB
                    </label>
                    <input type="text" value="{{$slip_type->description_compensation_limit}}" name="description_compensation_limit" placeholder="...">
                </div>
                <div class="col-md-4">
                    <label class="input-group-text">
                        Seccion II: Crimen por computador
                    </label>
                    <input type="text" value="{{$slip_type->description_compensation_limit2}}" name="description_compensation_limit2" placeholder="...">
                </div>
                <div class="col-md-4">
                    <label class="input-group-text">
                        Seccion III: Directores y administradores
                    </label>
                    <input type="text" value="{{$slip_type->description_compensation_limit3}}" name="description_compensation_limit3" placeholder="...">
                </div>
            </div>
        @endif
        @if ($slip->type_coverage === 45)
            <div class="row mb-3">
                <label class="lead">Límite Colusorio</label>
                <hr style="background-color: darkgrey; width: 70%">
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text">Numérico</label>
                        <input value="{{$slip_type->limit_colusorio_value}}" type="number" step="any" placeholder="0" name="limit_colusorio_value"
                            data-money>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text">Texto</label>
                        <input value="{{$slip_type->limit_colusorio_text}}" type="text" placeholder="..." name="limit_colusorio_text">
                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <label class="lead">Objeto(s) Asegurado(s)</label>
                <hr style="background-color: darkgrey; width: 70%">
            </div>

            <div class="row">
                @include('admin.comercial.include.tableObjetoSeguroFidelidad')
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label for="limiteIndemnizacion" class="input-group-text">Límite de indemnización</label>
                        <input value="{{$slip->limit_compensation}}" type="number" step="any" name="limit_compensation" id="limiteIndemnizacion"
                            data-money>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label for="limit_aggregate" class="input-group-text">Límite Agregado</label>
                        <input value="{{$slip_type->limit_aggregate}}" type="number" step="any" name="limit_aggregate" id="limit_aggregate"
                            data-money>
                    </div>
                </div>
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

        @include('admin.comercial.include.leyJurisdiccion')

        <div class="row mb-3">
            <div class="col-md-6">
                <input class="form-control" type="file" name="accidentRate" hidden="true" id="accidentRate" accept="application/*">
                <label class="input-group-text" hidden="true" for="accidentRate" id="accidentRateFileLabel">Siniestralidad de los últimos 5
                    años
                </label>
                @if ($accidentRate)
                <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="accidentRateDownload">Siniestralidad de los últimos 5
                    años - Previa</a>
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
                @else<input class="form-control" type="file" name="accidentRate" id="accidentRate">
                <label class="input-group-text" for="accidentRate">Siniestralidad de los últimos 5
                    años</label>
                @endif
            </div>
            <div class="col-md-6">
                <input class="form-control" type="file" name="quotationReport" hidden="true" id="quotationReport" accept="application/*">
                <label class="input-group-text" hidden="true" for="quotationReport" id="quotationReportFileLabel">Formulario de cotización relleno y
                    firmado
                </label>
                @if ($quotationReport)
                <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="quotationReportDownload">Formulario de cotización relleno y
                    firmado - Previa</a>
                <button type="button" class="btn btn-info" style="color: white" onclick="togglequotationReport()" id="quotationReportFileToggle">Modificar</button>
                <script>
                    let toggledquotationReportFile = false;
                    const quotationReportInput = document.getElementById('quotationReport');
                    const quotationReportDownload = document.getElementById('quotationReportDownload');
                    const quotationReportLabel = document.getElementById('quotationReportFileLabel');
                    const quotationReportToggle = document.getElementById('quotationReportFileToggle');

                    function togglequotationReport() {
                        toggledquotationReportFile = !toggledquotationReportFile;
                        quotationReportInput.hidden = !toggledquotationReportFile;
                        quotationReportDownload.hidden = toggledquotationReportFile;
                        quotationReportLabel.hidden = !toggledquotationReportFile;
                        quotationReportToggle.textContent = toggledquotationReportFile ? 'Usar previo' : 'Modificar'
                        if (toggledquotationReportFile) quotationReportInput.click()
                    }
                </script>
                @else<input class="form-control" type="file" name="quotationReport" id="quotationReport">
                <label class="input-group-text" for="quotationReport">Formulario de cotización relleno y
                    firmado</label>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <input class="form-control" type="file" name="financialStatements" hidden="true" id="financialStatements" accept="application/*">
                <label class="input-group-text" hidden="true" for="financialStatements" id="financialStatementsFileLabel">Estados financieros
                </label>
                @if ($financialStatements)
                <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="financialStatementsDownload">Estados financieros - Previa</a>
                <button type="button" class="btn btn-info" style="color: white" onclick="togglefinancialStatements()" id="financialStatementsFileToggle">Modificar</button>
                <script>
                    let toggledfinancialStatementsFile = false;
                    const financialStatementsInput = document.getElementById('financialStatements');
                    const financialStatementsDownload = document.getElementById('financialStatementsDownload');
                    const financialStatementsLabel = document.getElementById('financialStatementsFileLabel');
                    const financialStatementsToggle = document.getElementById('financialStatementsFileToggle');

                    function togglefinancialStatements() {
                        toggledfinancialStatementsFile = !toggledfinancialStatementsFile;
                        financialStatementsInput.hidden = !toggledfinancialStatementsFile;
                        financialStatementsDownload.hidden = toggledfinancialStatementsFile;
                        financialStatementsLabel.hidden = !toggledfinancialStatementsFile;
                        financialStatementsToggle.textContent = toggledfinancialStatementsFile ? 'Usar previo' : 'Modificar'
                        if (toggledfinancialStatementsFile) financialStatementsInput.click()
                    }
                </script>
                @else<input class="form-control" type="file" name="financialStatements" id="financialStatements">
                <label class="input-group-text" for="financialStatements">Estados financieros</label>
                @endif
            </div>

        </div>
        <div>
            <div style="float:right;" class="row">
                <div class="col-md">
                    <button type="submit" id="submitBtn" class="btn btn-info mx-2" style="color: white">Enviar
                        a dpto. Técnico</button>
                </div>
            </div>
        </div>
    </form>
</div>
@else
<form enctype="multipart/form-data" method="POST" id="riesgos_form" class="form riesgos" style="display: none">
    <!-- One "tab" for each step in the form: -->

    @csrf
    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
    <input type="hidden" name="type_slip" value="riesgos_form">
    <input hidden type="number" name="slip_status" value="3">

    <div class="tab">
        @include('admin.comercial.include.object_index')
    </div>

    <div class="tab">
        <div id="forCoverage44" style="display:none">
            <div class="row mb-3">
                <div class="flexColumnCenterContainer">
                    <label class="lead">Límite de indemnización</label>
                </div>
            </div>
    
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="input-group-text">
                        Seccion I: BBB
                    </label>
                    <input type="text" id="" name="description_compensation_limit" placeholder="...">
                </div>
                <div class="col-md-4">
                    <label class="input-group-text">
                        Seccion II: Crimen por computador
                    </label>
                    <input type="text" id="" name="description_compensation_limit2" placeholder="...">
                </div>
                <div class="col-md-4">
                    <label class="input-group-text">
                        Seccion III: Directores y administradores
                    </label>
                    <input type="text" id="" name="description_compensation_limit3" placeholder="...">
                </div>
            </div>
        </div>

        <div id="forCoverage45" style="display:none">
            <div class="row mb-3">
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
                    <label class="lead">Objeto(s) Asegurado(s)</label>
                    <hr>
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
                                    <th style="text-align: center">
                                        1
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
        </div>

        <div class="row">
            <div class="flexColumnCenterContainer">
                <label class="lead">Coberturas adicionales</label>
            </div>
        </div>

        <div class="row">
            <div class="tableContainer" style="margin: 2rem 0">
                <table id="riesgosCoberturasAdicionalesTable" class="indemnizacionTable">
                    <caption>No olvidar de llenar mínimo una cobertura.</caption>
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Coberturas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowCoberturaV2(event, 'riesgos', 'responsabilidad_civil', 'extracontractual')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="riesgosCoberturasAdicionalesTableBody">

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
                                <input type="number" placeholder="0" name="coverage_additional_usd[]" data-money>
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
                <table id="riesgosClausulasAdicionalesTable" class="indemnizacionTable">
                    <caption>No olvidar de llenar mínimo una cláusula.</caption>
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Cláusulas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowClausula(event, 'riesgos', 'responsabilidad_civil', 'extracontractual')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="riesgosClausulasAdicionalesTableBody">

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
                                <input type="number" placeholder="0" name="clause_additional_usd[]" data-money>
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
                    <input class="inputForm" type="number" name="reinsurer_rate" step="any" id="reinsurer_rate"><span class="input-group-text">%</span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="deducible">Prima de reaseguros</label>
                    <input class="inputForm" type="number" placeholder="USD" step="any" name="reinsurance_premium" data-money>
                </div>
            </div>
        </div>

        <div class="row">

            <label class="lead">Deducibles</label>
            <hr style="background-color: darkgray">

        </div>
        <div id="riesgosDeduciblesContainer" class="row">
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
            <button type="button" class="btn btn-info" style="color: white" onclick="addDeducible(event, 'riesgos')">Agregar deducible</button>
        </div>
    </div>

    <div class="tab">
        @include('admin.comercial.include.leyJurisdiccion')

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="input-group-text" for="accidentRate">Siniestralidad de los últimos 5
                    años</label>
                <input class="inputForm" type="file" name="accidentRate" id="accidentRate">
            </div>
            <div class="col-md-6">
                <label class="input-group-text" for="quotationReport">Formulario de cotización relleno y
                    firmado</label>
                <input class="inputForm" type="file" name="quotationReport" id="quotationReport">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label class="input-group-text" for="financialStatements">Estados financieros</label>
                <input class="inputForm" type="file" name="financialStatements" id="financialStatements">
            </div>

        </div>
    </div>
    <div>
        <div style="float:right;" class="row">
            <p>
            <div class="col-md">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-info mx-2" style="color: white">Atrás</button>
                {{-- <button type="button" id="submitBtn" class="submitButton" onclick="submitForm('vida_form')"
                    style="display: none">Guardar</button> --}}
            </div>
            <div class="col-md">
                <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-info mx-2" style="color: white">Siguiente</button>
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
