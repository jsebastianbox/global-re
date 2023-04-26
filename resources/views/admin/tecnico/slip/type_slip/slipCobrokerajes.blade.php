@extends('admin.layout')
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
            `Co-Brokerajes — Nuevo | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Co-Brokerajes
@endsection

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/admin/comercial/ajax.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/admin/tecnico/cobrokerajes/nuevo_cobrokeraje.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/tecnico/produccion_facultativo/slip_de_cotizacion.css') }}">
    <script defer src="{{ asset('js/admin/tecnico/produccion_facultativo/slip_de_cotizacion.js') }}"></script>
    <script defer src="{{ asset('js/admin/tecnico/produccion_facultativo/security_table.js') }}"></script>
    <script src="{{ asset('js/admin/tecnico/cobrokerajes/nuevo_cobrokeraje.js') }}" defer></script>
    @include('include.dataTable')

    <form method="POST" action="{{ route('storecobrokeraje') }}" enctype="multipart/form-data"
        id="formSlipformSlipCobrokeraje" class="new_entry__form">
        @method('POST')

        @csrf

        {{-- <input type="hidden" name="type_slip" value="formSlipCobrokeraje"> --}}

        <div class="form_group1">
            <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Información Básica</h3>
            <div class="two-sides">

                <div class="left_side">
                    {{-- fecha --}}
                    <div class="input_group">
                        <label for="Fecha">
                            <i class="fa-solid fa-calendar-check"></i>
                            Fecha
                        </label>
                        {{-- <input type="datetime-local" id="Fecha" name="date"
                            pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}"> --}}
                        <input type="datetime-local" id="Fecha" name="date" value="{{ date('Y-m-d\TH:i') }}">
                    </div>

                    {{-- Pais productor --}}
                    <div class="input_group">
                        <label for="apPaisProductor">
                            <i class="fa-solid fa-rectangle-list"></i>
                            Pais Productor
                        </label>
                        <select class="js-example-basic-single inputForm select_country form-select" name="country_id">
                        </select>
                    </div>
                    {{-- Broker Local --}}
                    <div class="input_group">
                        <label for="BrokerLocal">
                            <i class="fa-solid fa-rectangle-list"></i>
                            Broker Local
                        </label>
                        <input type="text" id="BrokerLocal" name="broker_local">
                    </div>
                    {{-- Cedente --}}
                    <div class="input_group">
                        <label for="Cedente">
                            <i class="fa-solid fa-rectangle-list"></i>
                            Cedente
                        </label>
                        <input type="text" id="Cedente" name="assignor">
                    </div>
                    {{-- Sector --}}
                    <div class="input_group">
                        <label for="Sector">
                            <i class="fa-solid fa-bars-staggered"></i>
                            Sector
                        </label>
                        <select name="sector" id="Sector">
                            <option value="Publico"> Público</option>
                            <option value="Privado">Privado</option>
                        </select>
                    </div>

                    {{-- Retrocedente --}}
                    <div class="input_group">
                        <label for="Retrocedente">
                            <i class="fa-solid fa-bars-staggered"></i>
                            Retrocedente
                        </label>
                        <input type="text" id="retrocedente" name="receding">
                    </div>

                    {{-- Intermediario de Seguros --}}
                    <div class="input_group">
                        <label for="insuranceBroker">
                            <i class="fa-solid fa-bars-staggered"></i>
                            Intermediario de Seguros
                        </label>
                        <input type="text" id="insuranceBroker" name="insurance_intermediaryr">
                    </div>

                </div>

                <div class="right_side">

                    {{-- Asegurado --}}
                    <div class="input_group">
                        <label for="Asegurado">
                            <i class="fa-solid fa-bars-staggered"></i>
                            Asegurado
                        </label>
                        <input type="text" id="Asegurado" name="insured">
                    </div>
                    {{-- Direccion --}}
                    <div class="input_group">
                        <label for="Direccion">
                            <i class="fa-solid fa-bars-staggered"></i>
                            Dirección
                        </label>
                        <input type="text" id="Direccion" name="direction">
                    </div>
                    {{-- Actividad --}}
                    <div class="input_group">
                        <label for="Actividad">
                            <i class="fa-solid fa-bars-staggered"></i>
                            Actividad
                        </label>
                        <input type="text" id="Actividad" name="activity">
                    </div>
                    {{-- Moneda --}}
                    <div class="input_group">
                        <label for="coin">
                            <i class="fa-solid fa-coins"></i>
                            Moneda
                        </label>
                        <input name="coin" id="coin" placeholder="$">
                    </div>
                    {{-- Equivalencia --}}
                    <div class="input_group">
                        <label>
                            Tipo de cambio
                        </label>
                        <input type="number" step="any" name="equivalence" id="equivalence" placeholder="$">
                    </div>
                    {{-- Vigencia --}}
                    <h5 class="slipTitle">Vigencia:</h5>
                    <div class="input_group">
                        <label for="VigenciaDesde">
                            <i class="fa-solid fa-calendar-check"></i>
                            Desde
                        </label>
                        <input type="date" id="validity_since" name="validity_since">
                        {{-- <input type="date" id="validity_since" name="validity_since"
                            pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}"> --}}
                    </div>
                    <div class="input_group">
                        <label for="VigenciaHasta">
                            <i class="fa-solid fa-calendar-check"></i>
                            Hasta
                        </label>
                        {{-- <input type="date" id="validity_until" name="validity_until"
                            pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}"> --}}
                        <input type="date" id="validity_until" name="validity_until">
                    </div>



                </div>
            </div>


            {{-- Objeto del seguro --}}
            <div class="flexColumnCenterContainer">
                <div class="input_group" style="max-width: 450px">
                    <label for="incendioObjetoSeguro">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Objeto del seguro
                    </label>
                    <textarea name="object_insurance" id="object_insurance" cols="30" rows="1"></textarea>
                </div>
            </div>

            <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Suma Asegurable y/o Suma Asegurada</h3>

            <div class="flexColumnCenterContainer">

                <div class="flexRowWrapContainer">
                    <button type="button" class="new_entry__form--button"
                        onclick="chooseTypeSuma('asegurable'); refreshSumaAsegurableTable('activos')">
                        Suma Asegurable
                    </button>

                    <button type="button" class="new_entry__form--button"
                        onclick="chooseTypeSuma('asegurada'); refreshSumaAsegurableTable('activos_fijos')">
                        Suma Asegurada
                    </button>


                </div>

            </div>

            {{-- Suma asegurable / asegurada --}}

            <div id="sumaAsegurableContainer" class="flexColumnCenterContainer" style="display:none;margin:2.5rem 0">
                <h4 class="slipTitle">Tabla Suma Asegurable</h4>

                <table class="indemnizacionTable" id="activosSumaAseguradaTable">

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

                                <button type="button" onclick="addRowSumaAseguradaIncendio(event, 'activos')"
                                    class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>

                    <tbody id="activosSumaAseguradaTableBody">
                        <tr>
                            <td>1</td>
                            <td>
                                <input type="text" name="location[]" style="width: 95px" placeholder="..."
                                    novalidate>
                            </td>
                            <td>
                                <input onkeyup="incendioSumaAsegurableTotales(1, 'activos')" type="number"
                                    step="any" name="edification[]" value="0" novalidate style="width: 95px"
                                    class="edificacionInput row1">
                            </td>
                            <td>
                                <input onkeyup="incendioSumaAsegurableTotales(1, 'activos')" type="number"
                                    step="any" name="contents[]" value="0" novalidate style="width: 95px"
                                    class="contenidosInput row1">
                            </td>
                            <td>
                                <input onkeyup="incendioSumaAsegurableTotales(1, 'activos')" type="number"
                                    step="any" name="equipment[]" value="0" novalidate style="width: 95px"
                                    class="maquinariaEquiposInput row1">
                            </td>
                            <td>
                                <input onkeyup="incendioSumaAsegurableTotales(1, 'activos')" type="number"
                                    step="any" name="machine[]" value="0" novalidate style="width: 95px"
                                    class="mueblesInput row1">
                            </td>
                            <td>
                                <input onkeyup="incendioSumaAsegurableTotales(1, 'activos')" type="number"
                                    step="any" name="commodity[]" value="0" novalidate style="width: 95px"
                                    class="mercaderiasInput row1">
                            </td>
                            <td>
                                <input onkeyup="incendioSumaAsegurableTotales(1, 'activos')" type="number"
                                    step="any" name="other_sum_assured[]" value="0" novalidate
                                    style="width: 95px" class="otrosInput row1">
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
                        </tr>
                    </tfoot>

                </table>

                <div class="tableContainer">
                    <div class="input_group" style="max-width: 700px;margin-top:2rem">
                        <label for="incendioLimiteIndem">
                            Límite de indemnización:
                        </label>
                        <input type="number" id="incendioLimiteIndem" name="limit_compensation">
                    </div>
                </div>
            </div>

            <div id="sumaAseguradaContainer" class="tableContainer" style="display:none;margin:1.5rem 0">
                <h4 class="slipTitle">Tabla Suma Asegurada</h4>

                <table class="indemnizacionTable" id="activos_fijosSumaAseguradaTable">
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

                                <button type="button" onclick="addRowSumaAseguradaIncendio(event, 'activos_fijos')"
                                    class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>

                    <tbody id="activos_fijosSumaAseguradaTableBody">
                        <tr>
                            <td>1</td>
                            <td>
                                <input type="text" name="location[]" style="width: 95px" placeholder="..."
                                    novalidate>
                            </td>
                            <td>
                                <input onkeyup="incendioSumaAsegurableTotales(1, 'activos_fijos')" type="number"
                                    step="any" name="edification[]" value="0" novalidate style="width: 95px"
                                    class="edificacionInput row1">
                            </td>
                            <td>
                                <input onkeyup="incendioSumaAsegurableTotales(1, 'activos_fijos')" type="number"
                                    step="any" name="contents[]" value="0" novalidate style="width: 95px"
                                    class="contenidosInput row1">
                            </td>
                            <td>
                                <input onkeyup="incendioSumaAsegurableTotales(1, 'activos_fijos')" type="number"
                                    step="any" name="equipment[]" value="0" novalidate style="width: 95px"
                                    class="maquinariaEquiposInput row1">
                            </td>
                            <td>
                                <input onkeyup="incendioSumaAsegurableTotales(1, 'activos_fijos')" type="number"
                                    step="any" name="machine[]" value="0" novalidate style="width: 95px"
                                    class="mueblesInput row1">
                            </td>
                            <td>
                                <input onkeyup="incendioSumaAsegurableTotales(1, 'activos_fijos')" type="number"
                                    step="any" name="commodity[]" value="0" novalidate style="width: 95px"
                                    class="mercaderiasInput row1">
                            </td>
                            <td>
                                <input onkeyup="incendioSumaAsegurableTotales(1, 'activos_fijos')" type="number"
                                    step="any" name="other_sum_assured[]" value="0" novalidate
                                    style="width: 95px" class="otrosInput row1">
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
                        </tr>
                    </tfoot>
                </table>

            </div>

        </div>

        <div class="form_group2">
            <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Coberturas Adicionales</h3>

            <div class="tableContainer" style="margin: 2rem 0">
                <table id="coberturasAdicionalesTable" class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Coberturas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                                colspan="1" aria-label="Add row">
                                <button onclick="addRowCoberturaV2(event)" class="btn btn-success btn-xs">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="coberturasAdicionalesTableBody">

                        <tr>
                            <td>1</td>
                            <td>
                                <textarea name="description_coverage_additional[]"></textarea>
                            </td>
                            <td>
                                <input type="text" placeholder="..." name="coverage_additional_additional[]">
                            </td>
                            <td>
                                <input type="number" placeholder="0" name="coverage_additional_usd[]">
                            </td>
                            <td>
                                <input type="text" placeholder="..." name="coverage_additional_additional2[]">
                            </td>
                        </tr>

                    </tbody>

                </table>
            </div>


        </div>


        <div class="form_group3">


            {{-- Cláusulas Adicionales --}}
            <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Cláusulas Adicionales</h3>

            <div class="tableContainer" style="margin: 2rem 0">
                <table id="clausulasAdicionalesTable" class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Cláusulas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                                colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowClausula(event)" class="btn btn-success btn-xs">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="clausulasAdicionalesTableBody">

                        <tr>
                            <td>1</td>
                            <td>
                                <textarea name="description_clause_additional[]"></textarea>
                            </td>
                            <td>
                                <input type="text" placeholder="..." name="clause_additional_additional[]">
                            </td>
                            <td>
                                <input type="number" placeholder="0" name="clause_additional_usd[]">
                            </td>
                            <td>
                                <input type="text" placeholder="..." name="clause_additional_additional2[]">
                            </td>
                        </tr>

                    </tbody>

                </table>
            </div>

        </div>

        <div class="form_group4">
            <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Tabla De Depreciación Para Pérdidas
                totales</h3>

            <div class="flexRowWrapContainer">
                <div>
                    <h5 class="slipTitle"> Rotura de maquinaria:</h5>
                    <table class="indemnizacionTable">
                        <thead>
                            <tr>
                                <th style="text-align: center">Años</th>
                                <th style="text-align: center">Demetito (anual)</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><input type="text" name="" id=""> años</td>
                                <td>
                                    <input type="number" name="equipoMaquinaria1" placeholder="%">
                                </td>
                            </tr>

                            <tr>
                                <td><input type="text" name="" id="">años</td>
                                <td>
                                    <input type="number" name="equipoMaquinaria1" placeholder="%">
                                </td>
                            </tr>

                            <tr>
                                <td><input type="text" name="" id="">años</td>
                                <td>
                                    <input type="number" name="equipoMaquinaria1" placeholder="max. 75%">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div>
                    <h5 class="slipTitle"> Equipo electrónico:</h5>
                    <table class="indemnizacionTable">
                        <thead>
                            <tr>
                                <th></th>
                                <th style="text-align: center">Años</th>
                                <th style="text-align: center">Demetito (anual)</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Equipos hasta</td>
                                <td>
                                    <input type="number" id="incendioEquipoElectronico1a" name="EquipoElectronico1a"
                                        class="inputNumber">
                                </td>
                                <td>
                                    <input type="number" id="incendioEquipoElectronico1b" name="EquipoElectronico1b"
                                        class="inputNumber" min="0" value="0">
                                </td>
                            </tr>

                            <tr>
                                <td>Equipos hasta</td>
                                <td>
                                    <input type="number" id="incendioEquipoElectronico2a" name="EquipoElectronico2a"
                                        class="inputNumber">
                                </td>
                                <td>
                                    <input type="number" id="incendioEquipoElectronico2b" name="EquipoElectronico2b"
                                        class="inputNumber" min="0" value="0">
                                </td>
                            </tr>

                            <tr>
                                <td>Equipos hasta</td>
                                <td>
                                    <input type="number" id="incendioEquipoElectronico3a" name="EquipoElectronico3a"
                                        class="inputNumber">
                                </td>
                                <td>
                                    <input type="number" id="incendioEquipoElectronico3b" name="EquipoElectronico3b"
                                        class="inputNumber" min="0" value="0">
                                </td>
                            </tr>

                            <tr>
                                <td>Equipos más de</td>
                                <td>
                                    <input type="number" id="incendioEquipoElectronico4a" name="EquipoElectronico4a"
                                        class="inputNumber">
                                </td>
                                <td>
                                    <input type="number" id="incendioEquipoElectronico4b" name="EquipoElectronico4b"
                                        class="inputNumber" min="0" value="0">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            {{-- Exclusiones --}}
            <h3 class="slipTitle"> <span class="badge badge-secondary">6</span> Exclusiones</h3>

            @include('admin.tecnico.slip.slips_generales.exclusiones')
        </div>

        <div class="form_group5">
            {{-- DEDUCIBLE --}}
            <h3 class="slipTitle"> <span class="badge badge-secondary">7</span> Deducibles</h3>

            <div id="deduciblesContainer">

                {{-- Deducible 1 --}}
                <div class="flexColumnCenterContainer" style="margin: 2rem 0">
                    <div class="flexRowWrapContainer" style="margin:1.2rem 0">
                        <input type="text" name="description_deductible[]" placeholder="Detalle..">
                        <div class="labelStyleContainer">
                            <p>
                                <i class="fa-solid fa-percent"></i>
                                valor del siniestro
                            </p>
                            <input type="number" style="max-width:95px;text-align: end;" placeholder="%"
                                name="sinister_value[]" min="0">
                        </div>
                        <div class="labelStyleContainer">
                            <p>
                                <i class="fa-solid fa-percent"></i>
                                valor asegurado
                            </p>
                            <input type="number" placeholder="%" name="insured_value_array[]" min="0"
                                style="max-width:95px;text-align: end;">
                        </div>
                        <div class="labelStyleContainer">
                            <input type="number" name="minimum[]" style="text-align:end" placeholder="USD">
                            <p>
                                mínimo
                            </p>
                        </div>
                        <textarea type="text" name="description2_deductible[]" placeholder="..."></textarea>
                    </div>
                </div>
                {{-- Deducible 2 --}}
                <div class="flexColumnCenterContainer" style="margin: 2rem 0">
                    <div class="flexRowWrapContainer" style="margin:1.2rem 0">
                        <input type="text" name="description_deductible[]" placeholder="Detalle..">
                        <div class="labelStyleContainer">
                            <p>
                                <i class="fa-solid fa-percent"></i>
                                valor del siniestro
                            </p>
                            <input type="number" style="max-width:95px;text-align: end;" placeholder="%"
                                name="sinister_value[]" min="0">
                        </div>
                        <div class="labelStyleContainer">
                            <p>
                                <i class="fa-solid fa-percent"></i>
                                valor asegurado
                            </p>
                            <input type="number" placeholder="%" name="insured_value_array[]" min="0"
                                style="max-width:95px;text-align: end;">
                        </div>
                        <div class="labelStyleContainer">
                            <input type="number" name="minimum[]" style="text-align:end" placeholder="USD">
                            <p>
                                mínimo
                            </p>
                        </div>
                        <textarea type="text" name="description2_deductible[]" placeholder="..."></textarea>
                    </div>
                </div>
                {{-- Deducible 3 --}}
                <div class="flexColumnCenterContainer" style="margin: 2rem 0">
                    <div class="flexRowWrapContainer" style="margin:1.2rem 0">
                        <input type="text" name="description_deductible[]" placeholder="Detalle..">
                        <div class="labelStyleContainer">
                            <p>
                                <i class="fa-solid fa-percent"></i>
                                valor del siniestro
                            </p>
                            <input type="number" style="max-width:95px;text-align: end;" placeholder="%"
                                name="sinister_value[]" min="0">
                        </div>
                        <div class="labelStyleContainer">
                            <p>
                                <i class="fa-solid fa-percent"></i>
                                valor asegurado
                            </p>
                            <input type="number" placeholder="%" name="insured_value_array[]" min="0"
                                style="max-width:95px;text-align: end;">
                        </div>
                        <div class="labelStyleContainer">
                            <input type="number" name="minimum[]" style="text-align:end" placeholder="USD">
                            <p>
                                mínimo
                            </p>
                        </div>
                        <textarea type="text" name="description2_deductible[]" placeholder="..."></textarea>
                    </div>
                </div>

            </div>

            <div class="tableContainer">
                <button class="new_entry__form--button" onclick="addDeducible(event)">Agregar deducible</button>
            </div>


        </div>

        <div class="form_group6">

            <div class="tableContainer" style="1.2rem 0">
                <h4 class="slipTitle">Aclaraciones</h4>
                <div class="flexColumnCenterContainer" style="max-width:450px">
                    <textarea placeholder="..." name="clarification"></textarea>
                </div>
            </div>

            <div class="tableContainer" style="1.2rem 0">
                <h4 class="slipTitle">Tasa/Prima de Reaseguros</h4>
                <div class="flexColumnCenterContainer">

                    <!-- Button trigger modal -->
                    @include('admin.tablas.calculo')

                    <button class="btn btn-sm btn-primary" onclick="resumenNotificacion(event)"
                        style="margin: 1.5rem 0">Actualizar
                        resumen</button>

                    <table class="indemnizacionTable" style="margin: 1.5rem 0">
                        <thead>
                            <tr>
                                <th style="text-align: center">Resumen</th>
                                <th></th>
                                <th style="text-align: center">Valores</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center">Tasa de ajuste:</td>
                                <td></td>
                                <td style="text-align: center" id="tasaAjusteResumen">0</td>
                            </tr>
                            <tr>
                                <td style="text-align: center">Prima Bruta 100%:</td>
                                <td style="text-align: center">100%</td>
                                <td style="text-align: center" id="primaBrutaResumen">0</td>
                            </tr>
                            <tr>
                                <td style="text-align: center">Prima Participación:</td>
                                <td style="text-align: center" id="primaParticipacionResumen1"></td>
                                <td style="text-align: center" id="primaParticipacionResumen2">0</td>
                            </tr>
                            <tr>
                                <td style="text-align: center">(-) Deducciones:</td>
                                <td></td>
                                <td style="text-align: center" id="deduccionesResumen">0</td>
                            </tr>
                            <tr>
                                <td style="text-align: center">(=) Prima Neta</td>
                                <td></td>
                                <td style="text-align: center" id="primaNetaResumen">0</td>
                            </tr>
                            <tr>
                                <td style="text-align: center">(-) Fee Partener</td>
                                <td></td>
                                <td style="text-align: center" id="feePartenerResumen">0</td>
                            </tr>
                            <tr>
                                <td style="text-align: center">(=) Prima Neta Global</td>
                                <td></td>
                                <td style="text-align: center" id="primaNetaGlobalResumen">0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Aqui se incluyo garantia de pago de primas --}}
            <div class="tableContainer">
                <h4 class="slipTitle selectLey">Garantía De Pago De Primas</h4>

                {{-- @include('admin.tecnico.slip.slips_generales.tableGarantia') --}}

            </div>


            <div class="tableContainer" style="1.2rem 0">
                <h4 class="slipTitle">Notificación de Siniestros</h4>

                <div class="flexRowWrapContainer" style="1.2rem 0">
                    <button id="notificacionBtnOpcion1" class="btn btn-sm btn-primary">Por días</button>
                    <button id="notificacionBtnOpcion2" class="btn btn-sm btn-primary">Claúsula de Control de
                        Reclamos</button>
                    <button id="notificacionBtnOpcion3" class="btn btn-sm btn-primary">Cláusula de Cooperación de
                        Reclamos</button>
                </div>

                <div id="notificacionOpcion1" class="sentenceInput" style="display: none">
                    <input type="number" name="note_sinester" placeholder="No. Días" style="margin: 1rem 0">
                    <p>días contados a partir de la fecha de ocurrencia</p>
                </div>
                <div id="notificacionOpcion2" class="sentenceInput" style="display: none">
                    <input type="number" name="note_sinester" placeholder="No. Días" style="margin: 1rem 0">
                    <p>días contados a partir de la fecha de ocurrencia</p>
                </div>
                <div id="notificacionOpcion3" class="sentenceInput" style="display: none">
                    <input type="number" name="note_sinester" placeholder="No. Días" style="margin: 1rem 0">
                    <p>días contados a partir de la fecha de ocurrencia</p>
                </div>
            </div>

            <div class="tableContainer">
                <h4 class="slipTitle selectLey">Ley y jurisdicción:</h4>


                <div style="max-width: 800px">
                    <p>Este reaseguro será gobernado por y constituido de acuerdo con la ley de:
                        <select class="js-example-basic-single inputForm select_country" name="politics_country_one"
                            style="margin-bottom: 15px">
                        </select>
                        y cada parte acuerda referir a la jurisdicción exclusiva de las cortes de:
                        <select class="js-example-basic-single inputForm select_country">
                        </select>
                        a menos que ambas partes acuerden referir el caso a arbitraje.
                    </p>
                </div>
            </div>


        </div>

        <div class="form_group7">


            <div class="tableContainer" style="1.2rem 0">
                <h4 class="slipTitle">Retención de reaseguros</h4>

                <table class="indemnizacionTable">
                    <thead>
                        <tr role="row">
                            <th style="text-align: center;">Porcentaje</th>
                            <th style="text-align: center;">p/d</th>
                            <th style="text-align: center;">Porcentaje</th>

                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <input type="number" name="retention_porcentage_one[]" class="inputNumber"
                                    placeholder="0">
                                <span class="marginLeftBold">%</span>
                            </td>
                            <td>
                                <p>p/d</p>
                            </td>
                            <td>
                                <input type="number" name="retention_porcentage_two[]" class="inputNumber"
                                    placeholder="0">
                                <span class="marginLeftBold">%</span>
                            </td>

                        </tr>
                    </tbody>
                </table>

                {{-- <div class="flexColumnCenterContainer">
                <textarea placeholder="p/d 100%" name="reinsurance_withholding"></textarea>
            </div> --}}
            </div>

            <div class="tableContainer" style="1.2rem 0">
                <h4 class="slipTitle">Cesión de reaseguros</h4>

                <table class="indemnizacionTable">
                    <thead>
                        <tr role="row">
                            <th style="text-align: center;">Porcentaje</th>
                            <th style="text-align: center;">p/d</th>
                            <th style="text-align: center;">Porcentaje</th>

                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <input type="number" name="cesion_porcentage_one[]" class="inputNumber"
                                    placeholder="0">
                                <span class="marginLeftBold">%</span>
                            </td>
                            <td>
                                <p>p/d</p>
                            </td>
                            <td>
                                <input type="number" name="cesion_porcentage_two[]" class="inputNumber"
                                    placeholder="0">
                                <span class="marginLeftBold">%</span>
                            </td>

                        </tr>
                    </tbody>
                </table>

                {{-- <div class="flexColumnCenterContainer">
                <textarea placeholder="p/d 100%" name="reinsurance_assignment"></textarea>
            </div> --}}
            </div>

            {{-- Aqui iria security --}}
            <div class="tableContainer" style="1.2rem 0">
                <h4 class="slipTitle">Security</h4>

                @include('admin.tecnico.slip.slips_generales.tableSecurity')
            </div>



            <div class="tableContainer" style="1.2rem 0">
                <h4 class="slipTitle">Condiciones de Reaseguros</h4>
                <div class="flexColumnCenterContainer">
                    <textarea placeholder="..." name="reinsurance_condition"></textarea>
                </div>
            </div>
            <div class="tableContainer" style="1.2rem 0">
                <h4 class="slipTitle">Sujeto a</h4>
                <div class="flexColumnCenterContainer">
                    <textarea placeholder="..." name="subject"></textarea>
                </div>
            </div>
            <div class="tableContainer" style="1.2rem 0">
                <h4 class="slipTitle">Información</h4>
                <div class="flexColumnCenterContainer">
                    <textarea placeholder="..." name="information"></textarea>
                </div>
            </div>


        </div>

    </form>
@endsection
