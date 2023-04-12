@extends('admin.layout')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/admin/administrativo/comparativos.css') }}">

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

            const dateString = `Bases de Datos — Bancos | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Bases de Datos | Bancos
@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


<div class="card">

    <div class="card-header">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('bancos.index') }}"><i class="fa-solid fa-house"></i> Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('bancos.create') }}"> <i class="fa-solid fa-plus"></i> Crear</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href=""> <i class="fa-solid fa-pen-to-square"></i> Editar</a>
            </li>

        </ul>
    </div>

    @include('include.flash_alert')

    <div class="card-body">

        <form method="POST" action="{{ route('bancos.update', $bank->id) }}">
            @csrf
            @method('PUT')

            
            <div class="row">
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-text">Nombre del banco</span>
                        <input class="form-control" type="text" name="name"
                                value="{{ $bank->name }}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <button id="btnQuemado" class="btnEnviar">Guardar</button>
                </div>
                <div class="col-md-3">
                    <button data-id="{{ $bank->id }}" class="btnEnviar btn-delete"
                        role="button"> Eliminar</button>
                </div>
                <div class="col-md-3">
                    <button class="btnEnviar" onclick="history.back()" 
                        role="button">Cancelar</button>

                </div>
                

            </div>
                
                
                
        </form>

    </div>

</div>

<script src="{{ asset('js/admin/database/banks.js') }}" defer></script>

@endsection