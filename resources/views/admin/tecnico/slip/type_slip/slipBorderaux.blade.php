@extends('admin.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/tecnico/cobrokerajes/borderoux.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/tecnico/produccion_facultativo/slip_de_cotizacion.css') }}">
    <script src="{{ asset('js/admin/comercial/ajax.js') }}" defer></script>
    <script src="{{ asset('js/admin/tecnico/cobrokerajes/nuevo_cobrokeraje.js') }}" defer></script>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    @include('include.datatable')

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
                `Co-Brokerajes — Nuevo Ingreso | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Co-Brokerajes
@endsection

<script>
    var reinsurer_brokers = {!! $brokers !!};
</script>

<div id="contentContainer" style="max-height:fit-content; overflow:initial">



    <div class="tableContainer mt-5">
        <h4 id="chartsTitle" class="my-5">Co-brokerajes</h4>

        <form action="{{ route('borderoux.store') }}" method="POST" style="background-color:#f9f8f6">
            @csrf

            <div class="two-sides2 mb-5">
                <div class="left_side">
                    <div class="input_group2">
                        <label for="countrySelect">
                            País
                        </label>
                        <select class="js-example-basic-single inputForm select_country form-select" name="country_id">
                        </select>
                    </div>
                    <div class="input_group2">
                        <label>Cía Seguros:</label>
                        <select name="cia_sure" class="js-example-basic-single inputForm select_cedente form-select">
                        </select>
                    </div>

                    <div class="input_group2">
                        <label>Asegurado:</label>
                        <input type="text" name="insured">
                    </div>

                    <div class="input_group2">
                        <label>Tipo de Contrato:</label>
                        <select name="type_contract">
                            <option value="" selected disabled>Seleccionar</option>
                            <option value="Proporcionales">Proporcionales</option>
                            <option value="No Proporcionales">No Proporcionales</option>
                            <option value="Facultativo">Facultativo</option>
                        </select>
                    </div>

                    <div class="input_group2">
                        <label>Cobertura Principal:</label>
                        <select name="type_coverage" id="type_coverage" onchange="select_coverage()">
                            <option selected disabled value="">Selecciona</option>
                            <option value="s1">Vida y accidentes personales</option>
                            <option value="s2">Activos fijos</option>
                            <option value="s3">Vehículos</option>
                            <option value="s4">Ramos técnicos</option>
                            <option value="s5">Energía</option>
                            <option value="s6">Marítimo</option>
                            <option value="s7">Aviación</option>
                            <option value="s8">Responsabilidad Civil</option>
                            <option value="s9">Riesgos financieros</option>
                            <option value="s10">Fianzas</option>
                        </select>
                    </div>



                    <div class="input_group2">
                        <label>Sector:</label>
                        <select name="sector" id="select_sector" onchange="selectSector()">
                            <option value="" selected>Seleccionar</option>
                            <option value="Público">Público</option>
                            <option value="Privado">Privado</option>
                        </select>
                    </div>

                    <div class="input_group2">
                        <label>Régimen:</label>
                        <select name="regime" id="select_regimen">
                            <option value="">Elige sector</option>
                        </select>
                    </div>



                </div>

                <div class="right_side">
                    <div class="input_group2">
                        <label>Año Suscripción:</label>
                        <input name="subscription_year" placeholder="..." type="number" min="1982">
                    </div>

                    <div class="input_group2">
                        <label>Movimiento:</label>
                        <select name="movements">
                            <option value="" selected disabled>Seleccionar</option>
                            <option value="Negocio Nuevo">Negocio Nuevo</option>
                            <option value="Renovación">Renovación</option>
                            <option value="Inclusión">Inclusión</option>
                            <option value="Exclusión">Exclusión</option>
                            <option value="Aumento de Suma Asegurada">Aumento de Suma Asegurada</option>
                            <option value="Disminución de Suma Asegurada">Disminución de Suma Asegurada</option>
                            <option value="Extensión vigencia">Extensión vigencia</option>
                            <option value="Cancelación">Cancelación</option>
                        </select>
                    </div>

                    <div class="input_group2">
                        <label>Broker Reaseguros:</label>
                        <select name="reinsurance_broker" class="js-example-basic-single inputForm form-select"
                            id="select_reinsurer">
                        </select>
                    </div>


                    <div class="input_group2">
                        <label>Tecnico Asignado:</label>
                        <select name="assignor_id"
                            class="js-example-basic-single inputForm select_assigned form-select">
                        </select>
                    </div>

                    <div class="input_group2">
                        <label>Sub Cobertura:</label>
                        <select name="coverage" id="coverage" class="js-example-basic-single inputForm">
                            <option value="" selected disabled>--Seleccionar--</option>
                        </select>
                    </div>

                    <div class="input_group2">
                        <label>Desde:</label>
                        <input type="date" name="from" min='1899-01-01'>
                    </div>

                    <div class="input_group2">
                        <label>Hasta:</label>
                        <input type="date" name="until">
                    </div>

                </div>
            </div>

            <div class="two-sides2">

                <div class="left_side">

                    <div class="input_group2">
                        <label>GC - No. Nota Cobertura:</label>
                        <input name="cover_note" placeholder="...">
                    </div>

                    <div class="input_group2">
                        <label>Primas Brutas:</label>
                        <input name="gross_premium" id="gross_premium"
                            onkeyup="formulaPrimaNeta();formulasPorInstalamento();formulaComisionTotal()"
                            type="number" required placeholder="..." value="0" step="any">
                    </div>


                    <div class="input_group2">
                        <label>Participación:</label>
                        <input name="stake" id="stake" onkeyup="formulaPrimaNeta();formulaComisionTotal()"
                            type="number" min="0" max="100" step="any" required placeholder="%">
                    </div>

                    <div class="input_group2">
                        <label>Prima Neta Reaseguros:</label>
                        <input name="reinsurance_premium" id="primaNeta" type="number" step="any"
                            value="0" placeholder="000.00" required>
                    </div>

                    <div class="input_group2">
                        {{-- <label>Prima (BRUTA) x Instalamentos:</label> --}}
                        <input name="installation_premium" id="primaBruta_instalamento" step="any"
                            type="hidden" placeholder="0" value="0">
                        <input type="hidden" id="impuesto_instalamento" name="impuesto_por_instalamento"
                            value="0">
                        <input type="hidden" id="primaNeta_instalamento" name="prima_neta_por_instalamento"
                            value="0">
                    </div>
                </div>

                <div class="right_side">



                    <div class="input_group2">
                        <label>Impuestos / Deducciones:</label>
                        <input name="tax_deductions" id="tax_deductions" type="number"
                            onkeyup="formulaPrimaNeta(); checkPercentage(this);formulaComisionTotal()" placeholder="%"
                            min="0" max="100" value="0" required step="any">
                    </div>

                    <div class="input_group2">
                        <label>Porcentaje de comisión</label>
                        <input name="commission_percentage" id="comision_porcentaje" type="number" step="any"
                            placeholder="..." required onkeyup="formulaComisionTotal()">
                    </div>

                    <div class="input_group2">
                        <label> Número de Instalamentos:</label>
                        <input name="installation" id="instalament"
                            onkeyup="formulasPorInstalamento();formulaComisionTotal();" type="number"
                            placeholder="..." required>
                    </div>

                    <div class="input_group2">
                        <label>Comisión Total:</label>
                        <input name="commission_total" id="comision_total" step="any" type="number"
                            placeholder="0">
                    </div>

                </div>

            </div>


            <h3 style="margin: 2rem auto;color:#495057;text-align:center">Detalle</h3>

            <div class="two-sides2">

                <div class="left_side">

                    <div class="input_group2">
                        <label>Suma asegurable:</label>
                        <input type="number" step="any" name="sum_insurable" placeholder="...">
                    </div>

                    <div class="input_group2">
                        <label>Suma asegurada:</label>
                        <input type="number" step="any" name="sum_insured" placeholder="...">
                    </div>

                </div>

                <div class="right_side">
                    <div class="input_group2">
                        <label>Límite de Indemnización:</label>
                        <input type="number" step="any" name="limit_compensation" placeholder="...">
                    </div>
                    <div class="input_group2">
                        <label>Adjuntar:</label>
                        <input type="file" name="file" style="width: 200px">
                    </div>
                </div>

            </div>


            <div class="flexColumnCenterContainer">
                <button type="submit" class="new_entry__form--button mt-3">Guardar</button>
            </div>
        </form>

    </div>

</div>
@endsection
