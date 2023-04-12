@extends('admin.layout')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">


    {{-- <link rel="stylesheet" href="{{ asset('css/admin/administrativo/usuarios.css') }}"> --}}

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

            const dateString = `Clientes Directos | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Clientes Directos
@endsection

<div class="card text-left">

    <div class="card-header">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="fa-solid fa-house"></i> Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('sercorp.create') }}"> <i class="fa-solid fa-plus"></i> Crear</a>
            </li>

        </ul>
    </div>
    <div class="card-body">

        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Codigo de proceso</th>
                    <th scope="col">Entidad</th>
                    <th scope="col">Adjudicatario</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Presopuesto Referencial</th>
                    <th scope="col">Valor Adjudicado</th>
                    <th scope="col">Fecha Publicación</th>
                    <th scope="col">Opcion</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>
</div>


<script src="{{ asset('js/admin/database/sercorp.js') }}" defer></script>

@endsection
