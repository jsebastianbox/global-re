@extends('admin.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/administrativo/sercop.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/tecnico/produccion_facultativo/slip_de_cotizacion.css') }}">
    <script src="{{ asset('js/admin/tecnico/produccion_facultativo/slip_de_cotizacion.js') }}" defer></script>
    <script src="{{ asset('js/admin/database/sercorp.js') }}" defer></script>

    {{-- datatable --}}
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

            const dateString = `Sercop | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Sercop
@endsection

<div id="contentContainer">

    <div class="card mb-5" style="border-radius: 0.5em; padding:0.5em;background-color:#f9f8f6">
        <div class="card-body">

            <div class="card-text flexColumnCenterContainer">
                <h4 id="chartsTitle" class="my-5">Registros</h4>
                <div style="overflow: auto;max-height:100vh">
                    <table id="sercopTable" class="table table-striped table-hover table-bordered ">
                        <thead style="position: sticky;top:0">
                            <tr>
                                <th>No. </th>
                                <th>Proceso</th>
                                <th>Entidad</th>
                                <th>Objeto</th>
                                <th>Prima</th>
                                <th>Fecha Publicación</th>
                                <th>Estatus</th>
                                <th>Adjudicado</th>
                                <th>Valor Adjudicado</th>
                                <th>Alerta</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

{{-- @extends('admin.layout')
@section('content')


    @include('include.datatable')


    <table id=".data-table" class="table table-bordered data-table">
        <thead style="position: sticky;top:0">
            <tr>
                <th>No. </th>
                <th>Proceso</th>
                <th>Entidad</th>
                <th>Objeto</th>
                <th>Prima</th>
                <th>Fecha Publicación</th>
                <th>Estatus</th>
                <th>Adjudicado</th>
                <th>Valor Adjudicado</th>
                <th>Alerta</th>
            </tr>
        </thead>

        <tbody>

        </tbody>

    </table>

    <script src="{{ asset('js/admin/database/sercorp.js') }}" defer></script>

@endsection --}}
