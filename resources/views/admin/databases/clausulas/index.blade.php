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

            const dateString = `Cláusulas | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
        
    </script>
@endsection
@section('page_title')
    Administración | Cláusulas
@endsection

<script>
    var data = {!! $clausulas !!};
</script>

<div class="card text-left">

    <div class="card-header">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('clausulas.index') }}"><i class="fa-solid fa-house"></i> Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clausulas.create') }}"> <i class="fa-solid fa-plus"></i> Crear</a>
            </li>

        </ul>
    </div>
    <div class="card-body">

        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Nomenclatura</th>
                    <th scope="col">Nombre de la cláusula</th>
                    <th scope="col">Lenguajes</th>
                    <th scope="col">Cobertura</th>
                    <th scope="col">Creación</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Descargar</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>



    </div>

</div>


<script src="{{ asset('js/admin/database/clausulas.js') }}" defer></script>

@endsection
