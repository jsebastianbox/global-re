{{-- Propiedad activos fijos --}}
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
<style>
    small {
        font-size: smaller color: black;
    }
</style>
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
        <form enctype="multipart/form-data" method="POST" action="{{ route('slip.update', $slip->id) }}"
            id="activos_fijos_form">
            @method('PUT')
            @csrf
            <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
            <input type="hidden" name="type_slip" value="activos_fijos">

            @include('admin.comercial.include.object_index')

            <label class="lead">Suma elegida</label>
            <hr style="color:darkgrey; width:70%">

            <div id="sumaAsegurableContainer" class="flexColumnCenterContainer"
                style="{{$slip->insurable_sum > 0 ? 'display:flex' : 'display:none'}};margin:1.5rem 0;">
                <h4 class="slipTitle">Tabla suma asegurable</h4>
                <button type="button" onclick="refreshSumaAsegurableTable()" class="btn btn-info my-2">
                    Actualizar
                </button>
                @include('admin.tecnico.slip.slips_generales.tableSumaAsegurable')
            </div>

            <div class="row">
                <div id="sumaAseguradaContainer" class="tableContainer" 
                style="{{$slip->insured_sum > 0 ? 'display:flex' : 'display:none'}};margin:1.5rem 0;">
                    <h4 class="slipTitle">Tabla suma asegurada</h4>
                    <button type="button" onclick="refreshSumaAseguradaTable()" class="btn btn-info my-2">
                        Actualizar
                    </button>
                    @include('admin.tecnico.slip.slips_generales.tableSumaAsegurada')
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-5">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="insuredSum">Límite de indemnización</label>
                        <input type="number" step="any" placeholder="..." name="limit_compensation"
                            data-money id="insuredLimit"
                            value="{{ $slip->limit_compensation }}">
                    </div>
                </div>
                <div class="col-md-4" id="primerRiesgo" style="{{$slip->type_coverage === 7 ? 'display:flex' : 'display:none'}}">
                    <div class="input-group mb-3">
                        <label class="input-group-text">Primer riesgo</label>
                        <select name="first_risk">
                            <option value="Absoluto" {{$slip_type->first_risk === 'Absoluto' ? 'selected' : ''}}>
                                Absoluto
                            </option>
                            <option value="Relativo" {{$slip_type->first_risk === 'Relativo' ? 'selected' : ''}}>
                                Relativo
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4" id="inputSumaAsegurada" 
                    style="{{$slip->insured_sum > 0 ? 'display:flex' : 'display:none'}};">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="insuredSum">Suma asegurada</label>
                        <input value="{{$slip->insured_sum}}" id="input_sumaAsegurada" type="number" step="any" placeholder="Suma asegurada" name="insured_sum">
                    </div>
                </div>

                <div class="col-md-4" id="inputSumaAsegurable" 
                    style="{{$slip->insurable_sum > 0 ? 'display:flex' : 'display:none'}};">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="insuredSum">Suma asegurable</label>
                        <input value="{{$slip->insurable_sum}}" id="input_sumaAsegurable" type="number" step="any" placeholder="Suma asegurable" name="insurable_sum">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label class="lead">Detalle de predios asegurados</label>
                <hr style="background-color: darkgrey; width: 70%">
            </div>

            <div class="row">
                <div class="tableContainer" style="margin: 2rem 0">
                    <button type="button" class="btn btn-info my-2" id="btnPutUbicaciones"
                        @if ($slip->insurable_sum > 0)
                            onclick="putUbicaciones_edit('activosSumaAseguradaTable')"
                        @elseif($slip->insured_sum > 0)
                            onclick="putUbicaciones_edit('activos_fijosSumaAseguradaTable')"
                        @endif
                            >Actualizar</button>
                    <table id="activos_fijosPrediosTable" class="indemnizacionTable">
                        <thead>
                            <tr>
                                <th style="text-align: center; width: 42px;">#</th>
                                <th style="text-align: center">Provincia</th>
                                <th style="text-align: center">Ciudad</th>
                                <th style="text-align: center">Dirección</th>
                                <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                                    colspan="1" aria-label="Add row">

                                    <button type="button" onclick="addRowPredios(event, 'activos_fijos')"
                                        class="btn btn-success btn-xs">
                                        +
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="activos_fijosPrediosTableBody">
                            @if (count($predios) > 0)
                                @foreach ($predios as $key => $item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <input value="{{ $item->province_perdios }}"  type="text" name="province_perdios[]" placeholder="...">
                                        </td>
                                        <td>
                                            <input value="{{ $item->city_perdios }}" type="text" name="city_perdios[]" placeholder="...">
                                        </td>
                                        <td>
                                            <input value="{{ $item->direction_perdios }}" class="inputDirection" type="text" name='direction_perdios[]' placeholder="...">
                                        </td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <input type="text" name="province_perdios[]" placeholder="...">
                                    </td>
                                    <td>
                                        <input type="text" name="city_perdios[]" placeholder="...">
                                    </td>
                                    <td>
                                        <input type="text" class="inputDirection" name='direction_perdios[]'
                                            placeholder="...">
                                    </td>
                                    <td></td>
                                </tr>
                            @endif

                        </tbody>
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

            <div class="row">
                <div class="col-md-12">
                    <label for="" class="lead">Archivos adjuntos</label>
                    <hr style="background-color:darkgrey">
                    <div class="my-2 input-group">
                        <input class="form-control" type="file" name="accidentRate" id="accidentRate">
                        <label class="input-group-text" for="accidentRate">Siniestralidad de los últimos 5
                            años (Fecha de ocurrencia, causa del siniestro, monto de la pérdida, valor
                            indemnizado)</label>
                    </div>
                    <div class="input-group my-2">
                        <input type="file" name="" id="" class="form-control">
                        <label for="" class="input-group-text">Detalle/Desglose (Valor asegurado por
                            ubicación y por rubro)</label>
                    </div>
                    <div class="input-group my-2">
                        <input type="file" name="" id="" class="form-control">
                        <label for="" class="input-group-text">Listado de equipos (Valorados para equipo
                            electrónico)</label>
                    </div>
                    <div class="input-group my-2">
                        <input type="file" name="" id="" class="form-control">
                        <label for="" class="input-group-text">Listado de maquinaria (Valorados para
                            rotura
                            de maquinaria y/o equipo de maquinaria)</label>
                    </div>
                    <div class="input-group my-2" id="display_if_sum_assured" style="display: none">
                        <input type="file" name="" id="" class="form-control">
                        <label for="" class="input-group-text">Formularios de cotización (Para lucro
                            cesante por Incendio y/o Rotura de Maquinaria)</label>
                    </div>
                    <div class="input-group my-2">
                        <input type="file" name="" id="" class="form-control">
                        <label for="" class="input-group-text">Informe de inspección</label>
                    </div>
                </div>
            </div>
            <div class="row">
                @include('admin.comercial.include.leyJurisdiccion')
            </div>

            <div>
                <div style="float:right;" class="row">
                    <button type="submit" formnovalidate="formnovalidate" id="submitBtn" class="btn btn-info"
                        style="color: white">Enviar a dpto. Técnico</button>
                </div>
            </div>
        </form>
    </div>
@else
    <form enctype="multipart/form-data" method="POST" id="activos_fijos_form" class="form activos"
        style="display: none">
        <!-- One "tab" for each step in the form: -->

        @csrf
        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
        <input type="hidden" name="type_slip" value="activos_fijos">
        <input hidden type="number" name="slip_status" value="3">

        <div class="tab">
            @include('admin.comercial.include.object_index')
        </div>

        <div class="tab">

            <label class="lead">Tipo</label>
            <hr style="color:darkgrey; width:70%">

            <div class="row">
                <div class="justify-content-center">
                    <div class="input-group col-md-5 mx-1 my-1">
                        <div class="input-group-text">
                            <input id="sumaAsegurada" type="radio" name="sumas" 
                                onchange="chooseTypeSuma(event)"
                                class="form-check-input my-1">
                        </div>
                        <label class="form-control" for="sumaAsegurada">Suma asegurada</label>
                    </div>
                    <div class="input-group col-md-5 mx-1 my-1">
                        <div class="input-group-text">
                            <input id="sumaAsegurable" type="radio" name="sumas"
                                onchange="chooseTypeSuma(event)" class="form-check-input my-1">
                        </div>
                        <label class="form-control" for="sumaAsegurable">Suma asegurable</label>
                    </div>
                </div>
            </div>

            <div id="sumaAsegurableContainer" class="flexColumnCenterContainer" style="display:none;margin:1.5rem 0">
                <h4 class="slipTitle">Tabla suma asegurable</h4>

                <div class="d-flex justify-content-around mb-2">
                    <div class="input-group">
                        <input type="text" placeholder="Nombre columna.."
                            id="columnNameactivosSumaAseguradaTable">
                        <button type="button" class="btn btn-info" id="btnAddColumnSumas"
                            onclick="addColumnSumas('activos')">Agregar columna</button>
                    </div>

                    <button type="button" id="btnDeleteColumnSumas" class="btn btn-danger btn-xl"
                        onclick="removeColumnSumas('activos')">
                        Eliminar columna
                    </button>
                </div>

                <table id="activosSumaAseguradaTable" class="indemnizacionTable">
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
                        <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                            colspan="1" aria-label="Add row">

                            <button type="button" onclick="addRowSumaAseguradaIncendio(event, 'activos')"
                                class="btn btn-success btn-xs">
                                +
                            </button>
                        </th>

                    </thead>
                    {{-- tbody --}}

                    <tbody id="activosSumaAseguradaTableBody">

                        <tr>
                            <td>1</td>
                            <td>
                                <input type="text" name="location[]" class="inputLocation" style="width: 95px"
                                    placeholder="..." novalidate>
                            </td>
                            <td>
                                <input onkeyup="incendioSumaAsegurableTotales(1, 1, 'activos')" type="number"
                                    step="any" data-money name="edification[]" value="0" novalidate
                                    style="width: 95px" class="col1 row1">
                            </td>
                            <td>
                                <input onkeyup="incendioSumaAsegurableTotales(1, 2, 'activos')" type="number"
                                    step="any" data-money name="contents[]" value="0" novalidate
                                    style="width: 95px" class="col2 row1">
                            </td>
                            <td>
                                <input onkeyup="incendioSumaAsegurableTotales(1, 3, 'activos')" type="number"
                                    step="any" data-money name="equipment[]" value="0" novalidate
                                    style="width: 95px" class="col3 row1">
                            </td>
                            <td>
                                <input onkeyup="incendioSumaAsegurableTotales(1, 4, 'activos')" type="number"
                                    step="any" data-money name="machine[]" value="0" novalidate
                                    style="width: 95px" class="col4 row1">
                            </td>
                            <td>
                                <input onkeyup="incendioSumaAsegurableTotales(1, 5, 'activos')" type="number"
                                    step="any" data-money name="commodity[]" value="0" novalidate
                                    style="width: 95px" class="col5 row1">
                            </td>
                            <td>
                                <input onkeyup="incendioSumaAsegurableTotales(1, 6, 'activos')" type="number"
                                    step="any" name="other_sum_assured[]" value="0" novalidate
                                    style="width: 95px" class="col6 row1">
                            </td>
                            <td style="text-align: center">
                                <span class="slipTitle col11" id="rowTotal1">0</span>$
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
                                <span id="colTotal2" class="slipTitle">0</span>$
                            </td>
                            <td style="text-align: center">
                                <span id="colTotal3" class="slipTitle">0</span>$
                            </td>
                            <td style="text-align: center">
                                <span id="colTotal4" class="slipTitle">0</span>$
                            </td>
                            <td style="text-align: center">
                                <span id="colTotal5" class="slipTitle">0</span>$
                            </td>
                            <td style="text-align: center">
                                <span id="colTotal6" class="slipTitle">0</span>$
                            </td>
                            <td style="text-align: center">
                                <span class="slipTitle col11" id="rowTotal1">0</span>$
                            </td>
                            <td></td>
                        </tr>

                    </tfoot>

                </table>
            </div>

            <div class="row">
                <div id="sumaAseguradaContainer" class="tableContainer" style="display:none;margin:1.5rem 0">
                    <h4 class="slipTitle">Tabla suma asegurada</h4>

                    <div class="d-flex justify-content-around mb-2">
                        <div class="input-group">
                            <input type="text" placeholder="Nombre columna.."
                                id="columnNameactivos_fijosSumaAseguradaTable">
                            <button type="button" class="btn btn-info" id="btnAddColumnSumas"
                                onclick="addColumnSumas('activos_fijos')">Agregar columna</button>
                        </div>

                        <button type="button" id="btnDeleteColumnSumas" class="btn btn-danger btn-xl"
                            onclick="removeColumnSumas('activos_fijos')">
                            Eliminar columna
                        </button>
                    </div>

                    <table id="activos_fijosSumaAseguradaTable" class="indemnizacionTable">
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
                                <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                                    colspan="1" aria-label="Add row">

                                    <button type="button"
                                        onclick="addRowSumaAseguradaIncendio(event, 'activos_fijos')"
                                        class="btn btn-success btn-xs">
                                        +
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        {{-- tbody --}}

                        <tbody id="activos_fijosSumaAseguradaTableBody">

                            <tr>
                                <td>1</td>
                                <td>
                                    <input type="text" name="location[]" class="inputLocation"
                                        style="width: 95px" placeholder="..." novalidate>
                                </td>
                                <td>
                                    <input onkeyup="incendioSumaAsegurableTotales(1, 1, 'activos_fijos')" type="number"
                                        step="any" data-money name="edification[]" value="0"
                                        novalidate style="width: 95px" class="col1 row1">
                                </td>
                                <td>
                                    <input onkeyup="incendioSumaAsegurableTotales(1, 2, 'activos_fijos')" type="number"
                                        step="any" data-money name="contents[]" value="0" novalidate
                                        style="width: 95px" class="col2 row1">
                                </td>
                                <td>
                                    <input onkeyup="incendioSumaAsegurableTotales(1, 3, 'activos_fijos')" type="number"
                                        step="any" data-money name="equipment[]" value="0"
                                        novalidate style="width: 95px" class="col3 row1">
                                </td>
                                <td>
                                    <input onkeyup="incendioSumaAsegurableTotales(1, 4, 'activos_fijos')" type="number"
                                        step="any" data-money name="machine[]" value="0" novalidate
                                        style="width: 95px" class="col4 row1">
                                </td>
                                <td>
                                    <input onkeyup="incendioSumaAsegurableTotales(1, 5, 'activos_fijos')" type="number"
                                        step="any" data-money name="commodity[]" value="0"
                                        novalidate style="width: 95px" class="col5 row1">
                                </td>
                                <td>
                                    <input onkeyup="incendioSumaAsegurableTotales(1, 6, 'activos_fijos')" type="number"
                                        step="any" data-money name="other_sum_assured[]" value="0"
                                        novalidate style="width: 95px" class="col6 row1">
                                </td>
                                <td style="text-align: center">
                                    <span class="slipTitle col11" id="rowTotal1">0</span>$
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
                                    <span id="colTotal2" class="slipTitle">0</span>$
                                </td>
                                <td style="text-align: center">
                                    <span id="colTotal3" class="slipTitle">0</span>$
                                </td>
                                <td style="text-align: center">
                                    <span id="colTotal4" class="slipTitle">0</span>$
                                </td>
                                <td style="text-align: center">
                                    <span id="colTotal5" class="slipTitle">0</span>$
                                </td>
                                <td style="text-align: center">
                                    <span id="colTotal6" class="slipTitle">0</span>$
                                </td>
                                <td style="text-align: center">
                                    <span class="slipTitle col11" id="rowTotal1">0</span>$
                                </td>
                            </tr>

                        </tfoot>

                    </table>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="insuredSum">Límite de indemnización</label>
                        <input type="number" step="any" placeholder="..." name="limit_compensation"
                            data-money id="insuredLimit" oninput="showQuoteForm(this.value)">
                    </div>
                </div>

                <div class="col-md-4" id="primerRiesgo" style="display: none">
                    <div class="input-group mb-3">
                        <label class="input-group-text">Primer riesgo</label>
                        <select name="first_risk">
                            <option value="" selected>Seleccionar</option>
                            <option value="Absoluto">Absoluto</option>
                            <option value="Relativo">Relativo</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4" id="inputSumaAsegurada" style="display:none">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="insuredSum">Suma asegurada</label>
                        <input id="input_sumaAsegurada" type="number" step="any" placeholder="Suma asegurada" name="insured_sum">
                    </div>
                </div>

                <div class="col-md-4" id="inputSumaAsegurable" style="display:none">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="insuredSum">Suma asegurable</label>
                        <input id="input_sumaAsegurable" type="number" step="any" placeholder="Suma asegurable" name="insurable_sum">
                    </div>
                </div>

            </div>
        </div>

        <div class="tab">


            <div class="row mb-3">
                <label class="lead">Detalle de predios asegurados</label>
                <hr style="background-color: darkgrey; width: 70%">
            </div>

            {{-- <div class="row">
            <div class="col-md-6">
                <label class="input-group-text" for="desglose">Agregar archivo si hay varias ubicaciones</label>
                <input type="file" name="" id="">
            </div>
        </div> TODO:PONER EN JS  --}}

            <div class="row">
                <div class="tableContainer" style="margin: 2rem 0">
                    <div class="my-2">
                        <button type="button" class="btn btn-info" id="btnPutUbicaciones"
                            onclick="putUbicaciones()">Actualizar</button>
                    </div>
                    <table id="activos_fijosPrediosTable" name="activos_fijosPrediosTable"
                        class="indemnizacionTable">
                        <thead>
                            <tr>
                                <th style="text-align: center; width: 42px;">#</th>
                                <th style="text-align: center">Provincia</th>
                                <th style="text-align: center">Ciudad</th>
                                <th style="text-align: center">Dirección</th>
                                <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                                    colspan="1" aria-label="Add row">

                                    <button type="button" onclick="addRowPredios(event, 'activos_fijos')"
                                        class="btn btn-success btn-xs">
                                        +
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="activos_fijosPrediosTableBody">
                            <tr>
                                <td>1</td>
                                <td>
                                    <input type="text" name="province_perdios[]" placeholder="...">
                                </td>
                                <td>
                                    <input type="text" name="city_perdios[]" placeholder="...">
                                </td>
                                <td>
                                    <input type="text" class="inputDirection" name='direction_perdios[]'
                                        placeholder="...">
                                </td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <label class="lead">Coberturas adicionales</label>
                <hr style="background-color: darkgrey; width: 70%">
            </div>

            <div class="row">
                <div class="tableContainer" style="margin: 2rem 0">
                    <table id="incendioCoberturasAdicionalesTable" name="incendioCoberturasAdicionalesTable"
                        class="indemnizacionTable">
                        <thead>
                            <tr>
                                <th style="text-align: center; width: 42px;">#</th>
                                <th style="text-align: center">Coberturas</th>
                                <th style="text-align: center">Campo adicional</th>
                                <th style="text-align: center">USD</th>
                                <th style="text-align: center">Campo adicional</th>
                                <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                                    colspan="1" aria-label="Add row">

                                    <button type="button"
                                        onclick="addRowCoberturaV2(event, 'incendio', 'activos', 'incendio')"
                                        class="btn btn-success btn-xs">
                                        +
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        {{-- tbody --}}
                        <tbody id="incendioCoberturasAdicionalesTableBody">
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
                                    <input type="number" step="any" placeholder="0" data-money
                                        name="coverage_additional_usd[]">
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
                    <table id="incendioClausulasAdicionalesTable" name="incendioClausulasAdicionalesTable"
                        class="indemnizacionTable">
                        <thead>
                            <tr>
                                <th style="text-align: center; width: 42px;">#</th>
                                <th style="text-align: center">Cláusulas</th>
                                <th style="text-align: center">Campo adicional</th>
                                <th style="text-align: center">USD</th>
                                <th style="text-align: center">Campo adicional</th>
                                <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                                    colspan="1" aria-label="Add row">

                                    <button type="button"
                                        onclick="addRowClausula(event, 'incendio', 'activos', 'all')"
                                        class="btn btn-success btn-xs">
                                        +
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        {{-- tbody --}}
                        <tbody id="incendioClausulasAdicionalesTableBody">
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
                                    <input type="number" step="any" data-money placeholder="0"
                                        name="clause_additional_usd[]">
                                </td>
                                <td>
                                    <input type="text" placeholder="..." name="clause_additional_additional2[]">
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>

            <label for="" style="max-width:300px" class="lead">Tasa/Prima</label>
            <hr style="background-color:darkgrey;width:70%;">

            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="reinsurer_rate">Tasa de reaseguros</label>
                        <input type="number" step="any" name="reinsurer_rate"
                            id="reinsurer_rate"><span class="input-group-text">%</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="deducible">Prima de reaseguros</label>
                        <input type="number" step="any" data-money placeholder="USD"
                            name="reinsurance_premium">
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="flexColumnCenterContainer" style="margin:1rem 0">
                    <label class="lead">Deducibles</label>
                    <hr style="background-color: darkgray">
                </div>
            </div>
            <div id="activos_fijosDeduciblesContainer" class="row">
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
                    onclick="addDeducible(event, 'activos_fijos')">Agregar deducible</button>
            </div>
        </div>

        <div class="tab">
            <div class="row">
                <div class="col-md-12">
                    <label for="" class="lead">Archivos adjuntos</label>
                    <hr style="background-color:darkgrey">
                    <div class="my-2 input-group">
                        <input class="form-control" type="file" name="accidentRate" id="accidentRate">
                        <label class="input-group-text" for="accidentRate">Siniestralidad de los últimos 5
                            años (Fecha de ocurrencia, causa del siniestro, monto de la pérdida, valor
                            indemnizado)</label>
                    </div>
                    <div class="input-group my-2">
                        <input type="file" name="desglose_file" id="" class="form-control">
                        <label for="" class="input-group-text">Detalle/Desglose (Valor asegurado por
                            ubicación y por rubro)</label>
                    </div>
                    <div class="input-group my-2">
                        <input type="file" name="devices_list_file" id="" class="form-control">
                        <label for="" class="input-group-text">Listado de equipos (Valorados para equipo
                            electrónico)</label>
                    </div>
                    <div class="input-group my-2">
                        <input type="file" name="machine_list_file" id="" class="form-control">
                        <label for="" class="input-group-text">Listado de maquinaria (Valorados para rotura
                            de maquinaria y/o equipo de maquinaria)</label>
                    </div>
                    <div class="input-group my-2">
                        <input type="file" name="inspection_control_file" id="" class="form-control">
                        <label for="" class="input-group-text">Informe de inspección</label>
                    </div>
                    
                </div>
                <div class="row" id="formularioCotizacionLucro" style="display: none">
                    <div class="input-group my-2">
                        <input type="file" name="quote_form_file" id="" class="form-control">
                        <label for="" class="input-group-text">Formularios de cotización</label>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="input-group my-2" id="formularioCotizacionLucro" style="display: none">
                            <input type="file" name="quote_form_file" id="" class="form-control">
                            <label for="" class="input-group-text">Formularios de cotización</label>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="row">
                @include('admin.comercial.include.leyJurisdiccion')
            </div>
        </div>

        <div>
            <div style="float:right;" class="row">
                <p>
                <div class="col-md">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-info mx-2"
                        style="color: white">Atrás</button>
                </div>
                <div class="col-md">
                    <button type="button" id="nextBtn" class="nextButton btn btn-info" onclick="nextPrev(1)"
                        style="color: white">Siguiente</button>

                    <button type="submit" id="submitBtn" style="display: none" onclick="jqsubmit()"
                        class="btn btn-info" style="color: white">Enviar</button>
                    {{-- <button type="submit" class="storeSlip btn btn-outline-success">Enviar</button> --}}
                </div>
                </p>
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
<script>
    function showQuoteForm(e) {
        // let sum = document.getElementById('insuredLimit');
        const fileInput = document.getElementById('display_if_sum_assured');
        e >= 500000 ? fileInput.style.display = "initial" : fileInput.style.display = "none";
    }
</script>
