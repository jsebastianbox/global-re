@extends('admin.layout')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/admin/administrativo/usuarios.css') }}">

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
                `Lloyds | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Lloyds
@endsection

<script>
    var data = {!! $lloyds !!};
</script>

<div class="card text-left">

    <div class="card-header">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="fa-solid fa-house"></i> Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('lloyds.create') }}"> <i class="fa-solid fa-plus"></i> Crear</a>
            </li>

        </ul>
    </div>
    <div class="card-body">

        <table id="reinsurer_table" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Empresa</th>
                    <th scope="col">Referencia</th>
                    <th scope="col">País</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">Región</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Línea de Negocio</th>
                    <th scope="col">Excluye</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Teléfono 1</th>
                    <th scope="col">Teléfono 2</th>
                    <th scope="col">Teléfono 3</th>
                    <th scope="col">Opción</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>
</div>

<script src="{{ asset('js/admin/database/lloyds.js') }}" defer></script>

@endsection
