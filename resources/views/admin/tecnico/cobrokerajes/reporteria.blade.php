@extends('admin.layout')
@section('content')
    {{-- <script src="{{ asset('js/admin/tecnico/produccion_facultativo/slip_de_cotizacion.js') }}" defer></script> --}}

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/admin/comercial/ajax.js') }}" defer></script>

    @include('include.datatable')

    <script src="{{ asset('js/admin/tecnico/cobrokerajes/borderoux.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/admin/tecnico/cobrokerajes/borderoux.css') }}">


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
                `Co-Brokerajes — Reportería | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection

@section('page_title')
    Administración | Co-Brokerajes
@endsection



<div id="contentContainer">

    <div id="reporteria" class="card mb-5" style="border-radius: 0.45em; padding:0.5em; background-color:#fcfbfa;">
        <div class="card-body">

            <table id="borderaux_table" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th># </th>
                        <th>Fecha de Creación </th>
                        <th>Ramo </th>
                        <th>R/N </th>
                        <th>NO. Nota de Cobertura </th>
                        <th>Desde </th>
                        <th>Hasta </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

@endsection
