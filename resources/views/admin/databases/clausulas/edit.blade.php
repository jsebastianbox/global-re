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

            const dateString = `Bases de Datos — Editar Cláusula | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Bases de Datos | clausulas
@endsection

<div class="card text-left">

    <div class="card-header">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clausulas.index') }}"><i class="fa-solid fa-house"></i> Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clausulas.create') }}"> <i class="fa-solid fa-plus"></i> Crear</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href=""> <i class="fa-solid fa-pen-to-square"></i> Editar</a>
            </li>

        </ul>
    </div>
    <div class="card-body">

        <div class="card-body">

            @include('include.flash_alert')

            <form method="POST" action="{{ route('clausulas.update', $clausula->id) }}">
                @csrf
                @method('PUT')

                <div id="contentContainer">
                    
                    <div class="left_side">
                        <div class="input--label">
                            <label class="labelForm">Nomenclatura
                                <input value="{{$clausula->nomenclatura}}" class="inputForm" type="text" name="nomenclatura" required>
                            </label>
                        </div>
                        <div class="input--label">
                            <label class="labelForm">Nombre de la cláusula
                                <input value="{{$clausula->title}}" class="inputForm" type="text" name="title" required>
                            </label>
                        </div>
                    </div>
                    <div class="right_side">
                        <div class="input--label">
                            <label class="labelForm">Lenguajes
                                <input value="{{$clausula->languages}}" class="inputForm" type="text" name="languages" required>
                            </label>
                        </div>
                        <div class="input--label">
                            <label class="labelForm">Cobertura
                                <input value="{{$clausula->coverages}}" class="inputForm" type="text" name="coverages" required>
                            </label>
                        </div>
                    </div>
                    
                    <button id="btnQuemado" class="btnEnviar">Guardar</button>
                    <a href="javascript:void(0)" data-id="{{ $clausula->id }}" class="btn btn-primary btn-delete"
                        role="button"><i class="fa fa-trash"></i> Eliminar</a>
                    <br>
                    <a href="javascript:void(0)" class="btn btn-primary btn-delete" onclick="history.back()"
                        role="button"><i class="fa-solid fa-xmark"></i> Cancelar</a>

                </div>

            </form>



        </div>

    </div>
</div>

<script src="{{ asset('js/admin/database/clausulas.js') }}" defer></script>

@endsection