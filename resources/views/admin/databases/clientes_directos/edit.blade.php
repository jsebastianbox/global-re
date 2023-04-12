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

            const dateString =
                `Bases de Datos — Editar Cliente Directo | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Bases de Datos | Cliente Directo
@endsection


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .main {
        font-size: 13px;
    }

    .main .form-control,
    .main span,
    .main select,
    .main button {
        font-size: 14px;
    }

    /* .main button {
        color: white;
    } */
    .select2 {
        max-width: 33rem !important;
        min-width: 33rem !important;
    }
</style>

<div class="card">

    <div class="card-header">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clientes_directos.index') }}"><i class="fa-solid fa-house"></i>
                    Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clientes_directos.create') }}"> <i class="fa-solid fa-plus"></i>
                    Crear</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href=""> <i class="fa-solid fa-pen-to-square"></i> Editar</a>
            </li>

        </ul>
    </div>

    @include('include.flash_alert')

    <div class="card-body">

        <div class="card-body">

            <form method="POST" action="{{ route('clientes_directos.update', $cliente_directo->id) }}">
                @csrf
                @method('PUT')

                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">Empresa</span>
                                <input type="text" class="form-control" name="ri_bq"  value="{{ $cliente_directo->ri_bq }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">País</span>
                                <select id="select_country" class="js-example-basic-single form-select" name="country">
                                    <option value="{{ $cliente_directo->country }}" selected="selected">
                                        {{ $cliente_directo->country }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">Cargo</span>
                                <select id="select_position" class="js-example-basic-single form-select" name="position">
                                    <option value="{{ $cliente_directo->position }}" selected="selected">
                                        {{ $cliente_directo->position }}
                                    </option>
                                </select>
                            </div>

                            <div class="row" id="new-position" style="display:none;">
                                <div class="input-group">
                                    <span class="input-group-text" for="">Nuevo Cargo</span>
                                    <input class="form-control" type="text" id="input-new-position">
                                </div>
                                <div class="row d-inline-block text-center">
                                    <button type="button" id="btn-add-position"
                                        class="btn btn-primary btn-sm mx-2">Guardar</button>
                                    <button type="button" class="btn btn-primary btn-sm mx-2">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">Referencia</span>
                                <input type="text" disabled class="form-control" value="Directo" name="reference">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">Contacto</span>
                                <select id="select_contact" class="js-example-basic-single inputForm" name="contact">
                                    <option value="{{ $cliente_directo->contact }}" selected="selected">
                                        {{ $cliente_directo->contact }}
                                    </option>
                                </select>

                                <div class="input--label" id="new-contact" style="display:none;">

                                    <div class="input-group">
                                        <span class="input-group-text">Ingresar Nuevo Contacto</span>
                                        <input class="form-control" type="text" id="input-new-contact">
                                    </div>

                                    <div class="row d-flex">
                                        <button type="button" id="btn-add-contact"
                                            class="btn btn-primary mx-2">Guardar</button>
                                        <button type="button" class="btn btn-primary mx-2">Cancelar</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">E-mail</span>
                                <input type="email" class="form-control" name="email" value="{{ $cliente_directo->email }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">Región</span>
                                <select id="select_region" class="js-example-basic-single form-select" name="region">
                                    <option value="{{ $cliente_directo->region }}">{{ $cliente_directo->region }}</option>
                                </select>
                                <div class="input--label" id="new-region" style="display:none;">

                                    <div class="input-group">
                                        <span class="input-group-text">Ingresar Nueva Región</span>
                                        <input class="form-control" type="text" id="input-new-region">
                                    </div>

                                    <div class="row d-flex">
                                        <button type="button" id="btn-add-region"
                                            class="btn btn-primary mx-2">Guardar</button>
                                        <button type="button" class="btn btn-primary mx-2">Cancelar</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">Negocio</span>
                                <select id="select_bussines" class="js-example-basic-single form-select" name="business_line">
                                    <option value="{{ $cliente_directo->business_line }}">{{ $cliente_directo->business_line }}</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">Excluye</span>
                                <input type="text" name="excluye" class="form-control" value="{{$cliente_directo->excluye}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">Teléfono 1</span>
                                <input type="text" class="form-control" name="phone_one" value="{{ $cliente_directo->phone_one }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">Teléfono 2</span>
                                <input type="text" class="form-control" name="phone_two" value="{{ $cliente_directo->phone_two }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">Teléfono 3</span>
                                <input type="text" class="form-control" name="phone_three" value="{{ $cliente_directo->phone_three }}">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <button id="btnQuemado" class="btnEnviar">Guardar</button>
                    </div>
                    <div class="col-md-4">
                        <button data-id="{{ $cliente_directo->id }}" class="btnEnviar btn-delete" role="button">
                            Eliminar</button>
                    </div>
                    <div class="col-md-4">
                        <button class="btnEnviar" onclick="history.back()" role="button">Cancelar</button>

                    </div>
                </div>
            </form>



        </div>

    </div>
</div>

<script src="{{ asset('js/admin/database/clientes_directos.js') }}" defer></script>

@endsection
