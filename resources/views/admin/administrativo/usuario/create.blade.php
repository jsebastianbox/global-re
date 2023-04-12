@extends('admin.layout')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/admin/administrativo/comparativos.css') }}">

    @include('include.datatable')

    <h3>
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

                const dateString = `Agregar Usuario | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
                document.getElementById('date').textContent = dateString;
            }
            setInterval(updateClock, 1000);
        </script>
    @endsection
    @section('page_title')
        Administración | Usuarios
    @endsection
</h3>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
    <script>
        var url = '/user';
        Swal.fire({
            icon: 'success',
            title: '¡Realizado!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2500,
            willClose: () => {
                window.location.href = url;
            }
        });
    </script>
@endif

<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.index') }}"><i class="fa-solid fa-house"></i> Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active"> <i class="fa-solid fa-plus"></i> Crear</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <form method="POST" action="{{ route('user.store') }}">
            @csrf
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">Nombres</span>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">Apellidos</span>
                        <input type="text" name="surname" id="surname" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">E-mail</span>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">Clave</span>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">País</span>
                        <select id="select_country" class="form-select" name="country_id">
                            <option value="52" selected>Ecuador</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">Genero</span>
                        <select class="form-select" name="sex">
                            <option value="Masculino" selected>Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4 mt-4">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">Rol</span>
                            <select class="form-select" name="role">
                                <option value="admin" selected>Administrador</option>
                                <option value="tecnico">T&eacute;cnico</option>
                                <option value="comercial">Comercial</option>
                                <option value="siniestros">Siniestros</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <button id="btnQuemado" class="btn btn-info btn-lg" style="color:white;">Guardar</button>
                </div>
        </form>
    </div>
</div>

<script src="{{ asset('js/admin/administrativo/usuario.js') }}" defer></script>


@endsection
