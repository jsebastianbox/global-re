@extends('admin.layout')

@section('content')
    <script src="{{ asset('js/admin/tecnico/gestion_reaseguros.js') }}" defer></script>

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
                `Técnico — Gestión de Reaseguros | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Técnico
@endsection


<div class="card text-center">

    <div class="card-header">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('management.index') }}"><i class="fa-solid fa-house"></i> Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active"> <i class="fa-solid fa-plus"></i> Crear</a>
            </li>

        </ul>
    </div>
    <div class="card-body">

        <div class="card-body">

            <form action="" class="new_entry__form">



                <div class="left_side">
                    <div class="input_group">
                        <label for="country">
                            Asegurado:
                        </label>
                        <input type="text" id="country" name="country" placeholder="Asegurado">
                    </div>
                </div>


                <div class="mx-auto" style="width: 100%;">

                    <table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0"
                        width="100%" aria-describedby="example_info">
                        <thead>
                            <tr role="row">
                                <th>Resagurador</th>
                                <th>Suscriptor</th>
                                <th>Cobertura (%)</th>
                                <th>Ramo</th>
                                <th>Observaciones</th>
                                <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                                    colspan="1" aria-label="Add row">

                                    <button type="button" data-func="dt-add" class="btn btn-success btn-xs"
                                        id="btn-add">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="newObject">
                            <tr>
                                <th>
                                    <select name="" id="">
                                        <option value="" selected>AIG _ American International Group</option>
                                        <option value="">Allianz Global Corporate & Specialty Re</option>
                                        <option value="">Austral Resseguradora S.A.</option>
                                        <option value="">Axa Xl Insurance Company Uk Limited</option>
                                        <option value="">Beazley Group</option>
                                        <option value="">Berkley Insurance Company</option>
                                    </select>
                                </th>
                                <th>
                                    <input type="text" id="country" name="country">
                                </th>
                                <th>
                                    <input type="text" id="country" name="country">
                                </th>
                                <th>
                                    <select name="" id="">
                                        <option value="" selected>AG</option>
                                        <option value="">RC</option>
                                        <option value="">BQ</option>
                                        <option value="">RI</option>
                                    </select>
                                </th>
                                <th>
                                    <input type="text" id="country" name="country">
                                </th>
                                {{-- <th>
                                        <button type="button" class="btn btn-danger btn-xs dt-delete"><span
                                                class="glyphicon glyphicon-remove" aria-hidden="false"></span></button>
                                    </th> --}}
                            </tr>

                        </tbody>
                    </table>

                </div>

                <button id="btnQuemado" class="btnEnviar">Guardar</button>
            </form>

        </div>

    </div>
</div>

@endsection
