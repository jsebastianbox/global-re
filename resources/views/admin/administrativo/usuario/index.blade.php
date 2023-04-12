@extends('admin.layout')
@section('page_title')
    Administración | Usuarios
@endsection

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

            const dateString = `Usuarios | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
        <script>
            let timerInterval;
            Swal.fire({
                icon: 'success',
                title: '¡Realizado!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: {
                    color: '#6610f2',
                    height: '5px',
                    borderRadius: '5px',
                    opacity: '0.7'
                },
                didOpen: () => {
                    const b = Swal.getHtmlContainer().querySelector('.swal2-progress-bar');
                    timerInterval = setInterval(() => {
                        const remainingTime = Swal.getTimerLeft();
                        const progressBar = Swal.getHtmlContainer().querySelector('.swal2-progress-bar');
                        const percent = (remainingTime / 2000) * 100;
                        progressBar.style.width = percent + '%';
                    }, 10)
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
            });
        </script>
@endif

<div class="card text-left">

    <div class="card-header">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="fa-solid fa-house"></i> Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.create') }}"> <i class="fa-solid fa-plus"></i> Crear</a>
            </li>

        </ul>
    </div>
    <div class="card-body">

        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Género</th>
                    <th scope="col">Opción</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>



    </div>
</div>

<script src="{{ asset('js/admin/administrativo/usuario.js') }}" defer></script>
{{-- <script src="{{ asset('js/admin/database/adjustador.js') }}" defer></script> --}}

@endsection
