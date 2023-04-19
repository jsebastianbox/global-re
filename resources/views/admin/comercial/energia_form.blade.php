{{-- Energía --}}
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


{{-- bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

{{-- david --}}

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('js/admin/comercial/ajax.js') }}" defer></script>

<div class="card" style="padding-inline: 1rem; padding-block: 1.75rem">
    <form enctype="multipart/form-data" method="POST" action="{{ route('slip.update', $slip->id) }}" id="energia_form">
        @csrf
        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
        @method('PUT')
        <input type="hidden" name="type_slip" value="energia">

        @include('admin.comercial.include.object_index')
        <div class="row">
            <label for="" class="lead">Detalles</label>
            <hr style="background-color: darkgrey; width: 70%">

            <div class="col-md-6">
                <div class="input-group">
                    <input class="form-control" type="file" name="coverageDetail" hidden="true" id="coverageDetail" accept="application/*">
                    <label class="input-group-text" hidden="true" for="coverageDetail" id="coverageDetailFileLabel">Detalle de bienes asegurados
                    </label>
                    @if ($coverageDetail)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="coverageDetailDownload">Detalle de bienes asegurados - Previo</a>
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
                    @else<input type="file" name="coverageDetail" id="coverageDetail" class="form-control">
                    <label for="coverageDetail" class="input-group-text">Detalle de bienes asegurados</label>
                    @endif
                </div>
            </div>
        </div>

        <label class="lead">Suma elegida</label>
        <hr style="color:darkgrey; width:70%">

        <div id="sumaAsegurableContainer" class="flexColumnCenterContainer" style="{{$slip->insurable_sum > 0 ? 'display:flex' : 'display:none'}};margin:1.5rem 0;">
            <h4 class="slipTitle">Tabla suma asegurable</h4>
            <button type="button" onclick="refreshSumaAsegurableTable()" class="btn btn-info my-2">
                Actualizar
            </button>
            @include('admin.tecnico.slip.slips_generales.tableSumaAsegurable')
        </div>

        <div class="row">
            <div id="sumaAseguradaContainer" class="tableContainer" style="{{$slip->insured_sum > 0 ? 'display:flex' : 'display:none'}};margin:1.5rem 0;">
                <h4 class="slipTitle">Tabla suma asegurada</h4>
                <button type="button" onclick="refreshSumaAseguradaTable()" class="btn btn-info my-2">
                    Actualizar
                </button>
                @include('admin.tecnico.slip.slips_generales.tableSumaAsegurada')
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text">Límite de indemnización</label>
                    <input type="number" step="any" placeholder="..." name="limit_compensation" data-money class="form-control" value="{{ $slip->limit_compensation }}">
                </div>
            </div>
            <div class="col-md-6" id="inputSumaAsegurada" style="{{$slip->insured_sum > 0 ? 'display:flex' : 'display:none'}};">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="insuredSum">Suma asegurada</label>
                    <input value="{{$slip->insured_sum}}" id="input_sumaAsegurada" type="number" step="any" placeholder="Suma asegurada" name="insured_sum">
                </div>
            </div>

            <div class="col-md-6" id="inputSumaAsegurable" style="{{$slip->insurable_sum > 0 ? 'display:flex' : 'display:none'}};">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="insuredSum">Suma asegurable</label>
                    <input value="{{$slip->insurable_sum}}" id="input_sumaAsegurable" type="number" step="any" placeholder="Suma asegurable" name="insurable_sum">
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


        <div class="row">
            <div class="col-md-6">
                <div class="input-group my-2">
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
                    <label class="input-group-text" for="accidentRate">Siniestralidad 5 años detallada</label>
                    <input class="inputForm" type="file" name="accidentRate" id="accidentRate">
                </div>
                <div class="input-group my-2">
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
                    <label class="input-group-text" for="valueDetail">Detalle/Desglose de valor asegurado por
                        ubicación y por
                        rubro</label>
                    <input class="inputForm" type="file" name="valueDetail" id="valueDetail">
                </div>
                <div class="input-group my-2">
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
                    <label class="input-group-text" for="petroleumDenValue">Detalle/Desglose de valor asegurado
                        por
                        pozo
                        energia</label>
                    <input class="inputForm" type="file" name="petroleumDenValue" id="petroleumDenValue">
                </div>
                <div class="input-group my-2">
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
                    <label class="input-group-text" for="report">Informe de inspección</label>
                    <input class="inputForm" type="file" name="report" id="report">
                </div>
                <div class="input-group my-2">
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
                    <label class="input-group-text" for="anualIncome">Ingresos estimados anuales</label>
                    <input class="inputForm" type="file" name="anualIncome" id="anualIncome">
                </div>
                <div class="input-group my-2">
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
                    <label class="input-group-text" for="employees">No. Empleados</label>
                    <input class="inputForm" type="file" name="employees" id="employees">
                </div>
                <div class="input-group my-2">
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
                    <label class="input-group-text" for="vehicles">No. Vehículos</label>
                    <input class="inputForm" type="file" name="vehicles" id="vehicles">
                </div>
                <div class="input-group my-2">
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
                    <label class="input-group-text" for="payroll">Valor de la nómina</label>
                    <input class="inputForm" type="file" name="payroll" id="payroll">
                </div>
                <div class="input-group my-2">
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
                    <label class="input-group-text" for="dailyProduction">Producción de barriles por día</label>
                    <input class="inputForm" type="file" name="dailyProduction" id="dailyProduction">
                </div>
                <div class="input-group my-2">
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
                    <label class="input-group-text" for="barrelValue">Costo de extracción por barril</label>
                    <input class="inputForm" type="file" name="barrelValue" id="barrelValue">
                </div>
            </div>
        </div>

        @include('admin.comercial.include.leyJurisdiccion')

        <div style="float:right;" class="row">
            <div class="col-md">
                <button type="submit" id="submitBtn" class="btn btn-info mx-2" style="color: white">Enviar a dpto. Técnico</button>
            </div>
        </div>
    </form>
</div>
@else
<form enctype="multipart/form-data" method="POST" id="energia_form" class="form energia" style="display: none">
    <!-- One "tab" for each step in the form: -->

    @csrf
    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
    <input type="hidden" name="type_slip" value="energia_form">
    <input hidden type="number" name="slip_status" value="3">

    <div class="tab">
        @include('admin.comercial.include.object_index')
        <div class="row">
            <label for="" class="lead">Detalles</label>
            <hr style="background-color: darkgrey; width: 70%">

            <div class="col-md-6">
                <label class="input-group-text" for="coverageDetail">*Detalle de bienes asegurados</label>
                <input placeholder="Cobertura..." type="file" name="coverageDetail" id="coverageDetail">
            </div>
        </div>
    </div>

    <div class="tab">
        <label class="lead">Tipo</label>
        <hr style="color:darkgrey; width:70%">

        <div class="row">
            <div class="justify-content-center">
                <div class="input-group col-md-5 mx-1 my-1">
                    <div class="input-group-text">
                        <input id="sumaAsegurada2" type="radio" name="sumas" onchange="chooseTypeSuma2(event)" class="form-check-input my-1">
                    </div>
                    <label class="form-control" for="sumaAsegurada2">Suma asegurada</label>
                </div>
                <div class="input-group col-md-5 mx-1 my-1">
                    <div class="input-group-text">
                        <input id="sumaAsegurable2" type="radio" name="sumas" onchange="chooseTypeSuma2(event)" class="form-check-input my-1">
                    </div>
                    <label class="form-control" for="sumaAsegurable2">Suma asegurable</label>
                </div>
            </div>
        </div>

        <div id="sumaAsegurable2Container" class="flexColumnCenterContainer" style="display:none;margin:1.5rem 0">
            <h4 class="slipTitle">Tabla suma asegurable</h4>
            <div class="d-flex justify-content-around mb-2">
                <div class="input-group">
                    <input type="text" placeholder="Nombre columna.." id="columnNameenergia1SumaAseguradaTable">
                    <button type="button" class="btn btn-info" id="btnAddColumnSumas" onclick="addColumnSumas('energia1SumaAseguradaTable')">Agregar columna</button>
                </div>

                <button type="button" id="btnDeleteColumnSumas" class="btn btn-danger btn-xl" onclick="removeColumnSumas('energia1SumaAseguradaTable')">
                    Eliminar columna
                </button>
            </div>

            <table id="energia1SumaAseguradaTable" class="indemnizacionTable">
                <thead>

                    <th style="text-align: center">#</th>
                    <th style="text-align: center">Ubicación</th>
                    <th style="text-align: center">Edificación</th>
                    <th style="text-align: center">Contenidos</th>
                    <th style="text-align: center">Maquinaria y Equipos</th>
                    <th style="text-align: center">Muebles y Enseres</th>
                    <th style="text-align: center">Mercaderías</th>
                    <th style="text-align: center">Otros</th>
                    <th style="text-align: center">TOTAL</th>
                    <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                        <button type="button" onclick="addRowSumaAseguradaIncendio(event, 'energia1')" class="btn btn-success btn-xs">
                            +
                        </button>
                    </th>

                </thead>
                {{-- tbody --}}

                <tbody id="energia1SumaAseguradaTableBody">

                    <tr>
                        <td>1</td>
                        <td>
                            <input type="text" name="location[]" class="inputLocation" style="width: 95px" placeholder="..." novalidate>
                        </td>
                        <td>
                            <input onkeyup="incendioSumaAsegurableTotales(1, 'energia1')" type="number" step="any" data-money name="edification[]" value="0" novalidate style="width: 95px" class="edificacionInput row1">
                        </td>
                        <td>
                            <input onkeyup="incendioSumaAsegurableTotales(1, 'energia1')" type="number" step="any" data-money name="contents[]" value="0" novalidate style="width: 95px" class="contenidosInput row1">
                        </td>
                        <td>
                            <input onkeyup="incendioSumaAsegurableTotales(1, 'energia1')" type="number" step="any" data-money name="equipment[]" value="0" novalidate style="width: 95px" class="maquinariaEquiposInput row1">
                        </td>
                        <td>
                            <input onkeyup="incendioSumaAsegurableTotales(1, 'energia1')" type="number" step="any" data-money name="machine[]" value="0" novalidate style="width: 95px" class="mueblesInput row1">
                        </td>
                        <td>
                            <input onkeyup="incendioSumaAsegurableTotales(1, 'energia1')" type="number" step="any" data-money name="commodity[]" value="0" novalidate style="width: 95px" class="mercaderiasInput row1">
                        </td>
                        <td>
                            <input onkeyup="incendioSumaAsegurableTotales(1, 'energia1')" type="number" step="any" name="other_sum_assured[]" value="0" novalidate style="width: 95px" class="otrosInput row1">
                        </td>
                        <td style="text-align: center">
                            <span class="slipTitle incendioTotalSpan" id="rowTotal1">0</span>$
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
                            <span id="incendioEdificacionTotal" class="slipTitle">0</span>$
                        </td>
                        <td style="text-align: center">
                            <span id="incendioContenidosTotal" class="slipTitle">0</span>$
                        </td>
                        <td style="text-align: center">
                            <span id="incendioMaquinariaEquiposTotal" class="slipTitle">0</span>$
                        </td>
                        <td style="text-align: center">
                            <span id="incendioMueblesTotal" class="slipTitle">0</span>$
                        </td>
                        <td style="text-align: center">
                            <span id="incendioMercaderiasTotal" class="slipTitle">0</span>$
                        </td>
                        <td style="text-align: center">
                            <span id="incendioOtrosTotal" class="slipTitle">0</span>$
                        </td>
                        <td style="text-align: center">
                            <span id="incendioTotalTotal" class="slipTitle">0</span>$
                        </td>
                        <td></td>
                    </tr>

                </tfoot>

            </table>

        </div>
        <div id="sumaAsegurada2Container" class="flexColumnCenterContainer" style="display:none;margin:1.5rem 0">
            <h4 class="slipTitle">Tabla suma asegurada</h4>
            <div class="d-flex justify-content-around mb-2">
                <div class="input-group">
                    <input type="text" placeholder="Nombre columna.." id="columnNameenergiaSumaAseguradaTable">
                    <button type="button" class="btn btn-info" id="btnAddColumnSumas" onclick="addColumnSumas('energiaSumaAseguradaTable')">Agregar columna</button>
                </div>

                <button type="button" id="btnDeleteColumnSumas" class="btn btn-danger btn-xl" onclick="removeColumnSumas('energiaSumaAseguradaTable')">
                    Eliminar columna
                </button>
            </div>

            <table id="energiaSumaAseguradaTable" class="indemnizacionTable">
                <thead>
                    <tr>
                        <th style="text-align: center">#</th>
                        <th style="text-align: center">Ubicación</th>
                        <th style="text-align: center">Edificación</th>
                        <th style="text-align: center">Contenidos</th>
                        <th style="text-align: center">Maquinaria y Equipos</th>
                        <th style="text-align: center">Muebles y Enseres</th>
                        <th style="text-align: center">Mercaderías</th>
                        <th style="text-align: center">Otros</th>
                        <th style="text-align: center">TOTAL</th>
                        <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                            <button type="button" onclick="addRowSumaAseguradaEnergia(event, 'energia')" class="btn btn-success btn-xs">
                                +
                            </button>
                        </th>
                    </tr>
                </thead>
                {{-- tbody --}}

                <tbody id="energiaSumaAseguradaTableBody">

                    <tr>
                        <td>1</td>
                        <td>
                            <input type="text" name="location[]" style="width: 95px" placeholder="..." novalidate>
                        </td>
                        <td>
                            <input onkeyup="energiaSumaAsegurableTotales('1')" type="number" name="edification[]" data-money value="0" novalidate style="width: 95px" class="edificacionInput row1">
                        </td>
                        <td>
                            <input onkeyup="energiaSumaAsegurableTotales('1')" type="number" name="contents[]" data-money value="0" novalidate style="width: 95px" class="contenidosInput row1">
                        </td>
                        <td>
                            <input onkeyup="energiaSumaAsegurableTotales('1')" type="number" name="equipment[]" data-money value="0" novalidate style="width: 95px" class="maquinariaEquiposInput row1">
                        </td>
                        <td>
                            <input onkeyup="energiaSumaAsegurableTotales('1')" type="number" name="machine[]" data-money value="0" novalidate style="width: 95px" class="mueblesInput row1">
                        </td>
                        <td>
                            <input onkeyup="energiaSumaAsegurableTotales('1')" type="number" name="commodity[]" data-money value="0" novalidate style="width: 95px" class="mercaderiasInput row1">
                        </td>
                        <td>
                            <input onkeyup="energiaSumaAsegurableTotales('1')" type="number" name="other_sum_assured[]" data-money value="0" novalidate style="width: 95px" class="otrosInput row1">
                        </td>
                        <td style="text-align: center">
                            <span class="slipTitle energiaTotalSpan" id="rowTotal1">0</span>$
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
                            <span id="energiaEdificacionTotal" class="slipTitle">0</span>$
                        </td>
                        <td style="text-align: center">
                            <span id="energiaContenidosTotal" class="slipTitle">0</span>$
                        </td>
                        <td style="text-align: center">
                            <span id="energiaMaquinariaEquiposTotal" class="slipTitle">0</span>$
                        </td>
                        <td style="text-align: center">
                            <span id="energiaMueblesTotal" class="slipTitle">0</span>$
                        </td>
                        <td style="text-align: center">
                            <span id="energiaMercaderiasTotal" class="slipTitle">0</span>$
                        </td>
                        <td style="text-align: center">
                            <span id="energiaOtrosTotal" class="slipTitle">0</span>$
                        </td>
                        <td style="text-align: center">
                            <span id="energiaTotalTotal" class="slipTitle">0</span>$
                        </td>
                    </tr>

                </tfoot>

            </table>

        </div>

        <div class="row my-3">
            <div class="col-md-4">
                <div class="input-group">
                    <label class="input-group-text">Límite de indemnización</label>
                    <input type="number" placeholder="..." step="any" name="limit_compensation" data-money class="form-control">
                </div>
            </div>

            <div class="col-md-4" id="inputSumaAsegurada2" style="display: none">
                <div class="input-group">
                    <label class="input-group-text">Suma Asegurada</label>
                    <input id="input_sumaAseguradaEnergia" name="insured_sum" class="form-control" />
                </div>
            </div>
            <div class="col-md-4" id="inputSumaAsegurable2" style="display: none">
                <div class="input-group">
                    <label class="input-group-text">Suma Asegurable</label>
                    <input id="input_sumaAsegurableEnergia" name="insurable_sum" class="form-control" />
                </div>
            </div>
        </div>

        <div class="row">
            <label class="lead">Coberturas adicionales</label>
            <hr>
        </div>

        <div class="row">
            <div class="tableContainer my-3">
                <table id="energiaCoberturasAdicionalesTable" class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Cobertura</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button onclick="addRowCoberturaV2(event, 'energia', 'energia','trp')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="energiaCoberturasAdicionalesTableBody">

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
            <hr>
        </div>

        <div class="row">
            <div class="tableContainer" style="margin: 2rem 0">
                <table id="energiaClausulasAdicionalesTable" class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Cláusulas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowClausula(event, 'energia', 'energia','all')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="energiaClausulasAdicionalesTableBody">

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
            <div class="flexColumnCenterContainer" style="margin:1rem 0">
                <label class="lead">Tasa/Prima</label>
                <hr style="background-color: darkgray">
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
        <div id="energiaDeduciblesContainer" class="row">
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
            <button type="button" class="btn btn-info" style="color: white" onclick="addDeducible(event, 'energia')">Agregar deducible</button>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="input-group my-2">
                    <label class="input-group-text" for="accidentRate">Siniestralidad 5 años detallada</label>
                </div>
                <input class="inputForm" type="file" name="accidentRate" id="accidentRate">
                <div class="input-group my-2">
                    <label class="input-group-text" for="valueDetail">Detalle/Desglose de valor asegurado por
                        ubicación y por
                        rubro</label>
                    <input class="inputForm" type="file" name="valueDetail" id="valueDetail">
                </div>
                <div class="input-group my-2">
                    <label class="input-group-text" for="petroleumDenValue">Detalle/Desglose de valor
                        asegurado por
                        pozo
                        energia</label>
                    <input class="inputForm" type="file" name="petroleumDenValue" id="petroleumDenValue">
                </div>
                <div class="input-group my-2">
                    <label class="input-group-text" for="report">Informe de inspección</label>
                    <input class="inputForm" type="file" name="report" id="report">
                </div>
                <div class="input-group my-2">
                    <label class="input-group-text" for="anualIncome">Ingresos estimados anuales</label>
                    <input class="inputForm" type="file" name="anualIncome" id="anualIncome">
                </div>
                <div class="input-group my-2">
                    <label class="input-group-text" for="employees">No. Empleados</label>
                    <input class="inputForm" type="file" name="employees" id="employees">
                </div>
                <div class="input-group my-2">
                    <label class="input-group-text" for="vehicles">No. Vehículos</label>
                    <input class="inputForm" type="file" name="vehicles" id="vehicles">
                </div>
                <div class="input-group my-2">
                    <label class="input-group-text" for="payroll">Valor de la nómina</label>
                    <input class="inputForm" type="file" name="payroll" id="payroll">
                </div>
                <div class="input-group my-2">
                    <label class="input-group-text" for="dailyProduction">Producción de barriles por
                        día</label>
                    <input class="inputForm" type="file" name="dailyProduction" id="dailyProduction">
                </div>
                <div class="input-group my-2">
                    <label class="input-group-text" for="barrelValue">Costo de extracción por barril</label>
                    <input class="inputForm" type="file" name="barrelValue" id="barrelValue">
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
                {{-- <button type="submit" id="submitBtn" style="display: none">Enviar</button> --}}
                <button type="submit" id="submitBtn" style="display: none" class="btn btn-info mx-2" onclick="jqsubmit()" style="color: white">Enviar</button>


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
