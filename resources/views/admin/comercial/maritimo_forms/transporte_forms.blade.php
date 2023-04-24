{{-- Transporte --}}
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


{{-- bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

{{-- david --}}

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('js/admin/comercial/ajax.js') }}" defer></script>

<div class="card py-4 px-2" style="overflow-x: hidden">
    <form enctype="multipart/form-data" method="POST" action="{{ route('slip.update', $slip->id) }}" id="maritimo_4_form">
        @csrf
        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
        @method('PUT')
        <input type="hidden" name="type_slip" value="maritimo_4_form">

        <div class="row">
            <label for="" class="lead">Información inicial</label>
            <hr>
        </div>

        @include('admin.comercial.include.object_index')

        <div class="row mb-3">

            <div class="col-md-4">
                <label class="input-group-text" for="tipoEmbalaje">Tipo de embalaje</label>
                <select name="type_packing" id="tipoEmbalaje">
                    <option value="" disabled>Seleccionar</option>
                    <option value="vidon" {{ $slip_type->type_packing == 'vidon' ? 'selected' : '' }}>Vidones/Toneles
                    </option>
                    <option value="huacal" {{ $slip_type->type_packing == 'huacal' ? 'selected' : '' }}>Huacales
                    </option>
                    <option value="caja" {{ $slip_type->type_packing == 'caja' ? 'selected' : '' }}>Cajas de fibra
                    </option>
                    <option value="tfibra" {{ $slip_type->type_packing == 'tfibra' ? 'selected' : '' }}>Tambores de
                        fibra</option>
                    <option value="tplastico" {{ $slip_type->type_packing == 'tplastico' ? 'selected' : '' }}>Tambores
                        de plástico</option>
                    <option value="tmetal" {{ $slip_type->type_packing == 'tmetal' ? 'selected' : '' }}>Tambores de
                        metal</option>
                    <option value="bobina" {{ $slip_type->type_packing == 'bobina' ? 'selected' : '' }}>Bobinas
                    </option>
                    <option value="bala" {{ $slip_type->type_packing == 'bala' ? 'selected' : '' }}>Balas</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="input-group-text" for="unificador">Tipo de unificador</label>
                <select name="type_unify" id="unificador">
                    <option value="" disabled>Seleccionar</option>
                    <option {{ $slip_type->type_unify == 'pallet' ? 'selected' : '' }} value="pallet">Pallet</option>
                    <option {{ $slip_type->type_unify == 'contenedor' ? 'selected' : '' }} value="contenedor">
                        Contenedores</option>
                    <option {{ $slip_type->type_unify == 'intermodal' ? 'selected' : '' }} value="intermodal">
                        Intermodales</option>
                    <option {{ $slip_type->type_unify == 'iglu' ? 'selected' : '' }} value="iglu">Iglu (aéreo)
                    </option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="input-group-text" for="medioTransporte">Medio de transporte</label>
                <select name="transportation" id="medioTransporte">
                    <option value="" disabled>Seleccionar</option>
                    <option {{ $slip_type->transportation == 'maritimo' ? 'selected' : '' }} value="maritimo">
                        Marítimo</option>
                    <option {{ $slip_type->transportation == 'aereo' ? 'selected' : '' }} value="aereo">Aéreo
                    </option>
                    <option {{ $slip_type->transportation == 'terrestre' ? 'selected' : '' }} value="terrestre">
                        Terrestre</option>
                    <option {{ $slip_type->transportation == 'ferreo' ? 'selected' : '' }} value="ferreo">Férreo
                    </option>
                    <option {{ $slip_type->transportation == 'combinado' ? 'selected' : '' }} value="combinado">
                        Combinado</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="input-group-text" for="claseMercancia">Clase de mercancía</label>
                <select name="type_merchandise" id="claseMercancia">
                    <option value="" disabled>Seleccionar</option>
                    <option {{ $slip_type->type_merchandise == 'granel' ? 'selected' : '' }} value="granel">Granel
                    </option>
                    <option {{ $slip_type->type_merchandise == 'perecible' ? 'selected' : '' }} value="perecible">
                        Perecible (refrigerados, congelados o calefacción)</option>
                    <option {{ $slip_type->type_merchandise == 'valiosa' ? 'selected' : '' }} value="valiosa">
                        Mercancía valiosa</option>
                    <option {{ $slip_type->type_merchandise == 'peligrosa' ? 'selected' : '' }} value="peligrosa">
                        Mercancía Peligrosa</option>
                    <option {{ $slip_type->type_merchandise == 'semovientes' ? 'selected' : '' }} value="semovientes">Semovientes</option>
                    <option {{ $slip_type->type_merchandise == 'general' ? 'selected' : '' }} value="general">
                        Mercancía general</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="input-group-text" for="anualCost">Estimado de movilización anual</label>
                <input type="number" step="any" name="annual_mobilization" id="anualCost" data-money value="{{ $slip_type->annual_mobilization }}">
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-4">
                <label class="input-group-text" for="maxLimit">Límite máximo por embarque</label>
                <input type="number" step="any" name="limit_shipment" id="maxLimit" data-money value="{{ $slip_type->limit_shipment }}">
            </div>
            <div class="col-md-4">
                <label class="input-group-text" for="departure">
                    <i class="fa-solid fa-calendar-check"></i>
                    Salida
                </label>
                <input type="date" id="departure" name="departure_date" value="{{ $slip_type->departure_date }}">
            </div>
            <div class="col-md-4">
                <label class="input-group-text" for="arrival">
                    <i class="fa-solid fa-calendar-check"></i>
                    Llegada
                </label>
                <input type="date" id="arrival" name="arrival_date" value="{{ $slip_type->arrival_date }}">
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
                <div class="input-group mb-3">
                    <label class="input-group-text" for="transportStatus">Estado del medio de
                        transporte</label>
                    <input type="text" name="status_transport" id="transportStatus" value="{{ $slip_type->status_transport }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="transportStatus">Trayecto asegurado</label>
                    <input type="text" name="insured_journey" id="transportStatus" value="{{ $slip_type->insured_journey }}">
                </div>
            </div>

        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="transbordo">Existe transbordo de mercadería</label>
                    <select name="ismerchandise" id="transbordo">
                        <option value="" disabled>Seleccionar</option>
                        <option {{ $slip_type->ismerchandise == '1' ? 'selected' : '' }} value="1">Sí</option>
                        <option {{ $slip_type->ismerchandise == '0' ? 'selected' : '' }} value="0">No</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="entrance">Puerto de entrada al país</label>
                    <input type="text" name="entrance" id="entrance" value="{{ $slip_type->entrance }}">
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="custodia">Custodia de la mercancía</label>
                    <input type="text" name="custodia" id="custodia" value="{{ $slip_type->custodia }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input class="form-control" type="file" name="quotationForm" hidden="true" id="quotationForm" accept="application/*">
                    <label class="input-group-text" hidden="true" for="quotationForm" id="quotationFormFileLabel">Formulario de cotización
                    </label>
                    @if ($quotationForm)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="quotationFormDownload">Formulario de cotización - Previo</a>
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
                            if (toggledquotationFormFile) quotationFormInput.click()
                        }
                    </script>
                    @else<input type="file" name="quotationForm" id="quotationForm" class="form-control">
                    <label for="quotationForm" class="input-group-text">Formulario de cotización</label>
                    @endif
                </div>
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
<form enctype="multipart/form-data" method="POST" id="maritimo_4_form" class="form transporte" style="display: none">

    @csrf
    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
    <input type="hidden" name="type_slip" value="maritimo_4_form">
    <input hidden type="number" name="slip_status" value="3">
    <div class="tab">
        <div class="row">
            @include('admin.comercial.include.object_index')
        </div>
    </div>


    <div class="tab">
        <div class="row mb-3">

            <div class="col-md-4">
                <div class="input-group">
                    <label class="input-group-text" for="tipoEmbalaje">Tipo de embalaje</label>
                    <select name="type_packing" id="tipoEmbalaje">
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="vidon">Vidones/Toneles</option>
                        <option value="huacal">Huacales</option>
                        <option value="caja">Cajas de fibra</option>
                        <option value="tfibra">Tambores de fibra</option>
                        <option value="tplastico">Tambores de plástico</option>
                        <option value="tmetal">Tambores de metal</option>
                        <option value="bobina">Bobinas</option>
                        <option value="bala">Balas</option>
                        <option value="Otros">Otros</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <label class="input-group-text" for="unificador">Tipo de unificador</label>
                    <select name="type_unify" id="unificador">
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="pallet">Pallet</option>
                        <option value="contenedor">Contenedores</option>
                        <option value="intermodal">Intermodales</option>
                        <option value="iglu">Iglu (aéreo)</option>
                        <option value="Otros">Otros</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <label class="input-group-text" for="medioTransporte">Medio de transporte</label>
                    <select name="transportation" id="medioTransporte">
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="maritimo">Marítimo</option>
                        <option value="aereo">Aéreo</option>
                        <option value="terrestre">Terrestre</option>
                        <option value="ferreo">Férreo</option>
                        <option value="combinado">Combinado</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text" for="claseMercancia">Clase de mercancía</label>
                    <select name="type_merchandise" id="claseMercancia">
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="granel">Granel</option>
                        <option value="perecible">Perecible (refrigerados, congelados o calefacción)</option>
                        <option value="valiosa">Mercancía valiosa</option>
                        <option value="peligrosa">Mercancía Peligrosa</option>
                        <option value="semovientes">Semovientes</option>
                        <option value="general">Mercancía general</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text" for="anualCost">Estimado de movilización anual</label>
                    <input type="number" step="any" name="annual_mobilization" id="anualCost" data-money>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-4">
                <div class="input-group">
                    <label class="input-group-text" for="maxLimit">Límite máximo por embarque</label>
                    <input type="number" step="any" name="limit_shipment" id="maxLimit" data-money>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <label class="input-group-text" for="departure">
                        <i class="fa-solid fa-calendar-check"></i>
                        Salida
                    </label>
                    <input type="date" id="departure" name="departure_date" value="2022-07-01" min="1950-07-30" max="2096-07-30">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <label class="input-group-text" for="arrival">
                        <i class="fa-solid fa-calendar-check"></i>
                        Llegada
                    </label>
                    <input type="date" id="arrival" name="arrival_date" value="2022-07-01" min="1950-07-30" max="2096-07-30">
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <label class="lead">Coberturas adicionales</label>
            <hr>
        </div>

        <div class="row">
            <div class="tableContainer" style="margin: 2rem 0">
                <table id="maritimo_transporteCoberturasAdicionalesTable" class="indemnizacionTable">
                    <caption>No olvidar de llenar mínimo una cobertura.</caption>
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Coberturas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowCoberturaV2(event, 'maritimo_transporte')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="maritimo_transporteCoberturasAdicionalesTableBody">

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
                <table id="maritimo_transporteClausulasAdicionalesTable" class="indemnizacionTable">
                    <caption>No olvidar de llenar mínimo una cláusula.</caption>
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Cláusulas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowClausula(event, 'maritimo_transporte')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="maritimo_transporteClausulasAdicionalesTableBody">

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
                    <input type="number" step="any" name="reinsurer_rate" id="reinsurer_rate"><span class="input-group-text">%</span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="deducible">Prima de reaseguros</label>
                    <input type="number" step="any" placeholder="USD" name="reinsurance_premium" data-money>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="flexColumnCenterContainer" style="margin:1rem 0">
                <label class="lead">Deducibles</label>
                <hr style="background-color: darkgray">
            </div>
        </div>
        <div id="transporte_maritimoDeduciblesContainer" class="row">
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
            <button type="button" class="btn btn-info" style="color: white" onclick="addDeducible(event, 'transporte_maritimo')">Agregar deducible</button>
        </div>

    </div>

    <div class="tab">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="transportStatus">Estado del medio de transporte</label>
                    <input type="text" name="status_transport" id="transportStatus">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="transportStatus">Trayecto asegurado</label>
                    <input type="text" name="insured_journey" id="transportStatus">
                </div>
            </div>

        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="transbordo">Existe transbordo de mercadería</label>
                    <select name="ismerchandise" id="transbordo">
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="entrance">Puerto de entrada al país</label>
                    <input type="text" name="entrance" id="entrance">
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="custodia">Custodia de la mercancía</label>
                    <input type="text" name="custodia" id="custodia">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="quotationForm">Formulario de cotización</label>
                    <input type="file" name="quotationForm" id="quotationForm">
                </div>
            </div>
        </div>

    </div>
    <div>
        <div style="float:right;" class="row">
            <p>
            <div class="col-md">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-info mx-2" style="color: white">Atrás</button>
                {{-- <button type="button" id="submitBtn" class="submitButton"
                    onclick="submitForm('vida_form')" style="display: none">Guardar</button> --}}
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
