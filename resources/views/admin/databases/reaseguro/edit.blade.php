{{--
    Cambios 05/12/22
    contact_id, position_id, region_id cambio de fk a string
    --}}

@extends('admin.layout')
@section('content')
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

            const dateString =
                `Editar Compañía de Reaseguro | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Compañía de Reaseguro
@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Por alguna razon que ya le veremos maaaaaas tarde,
    el tamaño de la letra está estúpidamente pequeño, así que no borres este estilo -->

<style>
    .main {
        font-size: 13px;
    }

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
                <a class="nav-link" href="{{ route('reinsurers.index') }}"><i class="fa-solid fa-house"></i> Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reinsurers.create') }}"> <i class="fa-solid fa-plus"></i> Crear</a>
            </li>
        </ul>
    </div>

    @include('include.flash_alert')

    <form method="POST" action="{{ route('reinsurer.update', ['reinsurer' => $reinsurers->id]) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $reinsurers->id }}">

        <div class="card-body" style="padding-block: 2rem">
            <div class="row my-4">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">Empresa</span>
                            <input type="text" class="form-control" name="name" value="{{ $reinsurers->name }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">País</span>
                            <select id="select_country" class="js-example-basic-single form-select" name="country_id">
                                <option value="{{ $reinsurers->country_id }}" selected="selected">
                                    {{ $reinsurers->country_id }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">Cargo</span>
                            <select id="select_position" class="js-example-basic-single form-select" name="position_id">
                                <option value="{{ $reinsurers->position_id }}" selected="selected">
                                    {{ $reinsurers->position_id }}
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
                            <input type="text" disabled class="form-control" value="RI" reference>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">Contacto</span>
                            <select id="select_contact" class="js-example-basic-single inputForm" name="contact">
                                <option value="{{ $reinsurers->contact_id }}" selected="selected">
                                    {{ $reinsurers->contact_id }}</option>
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
                            <input type="email" class="form-control" name="email" value="{{ $reinsurers->email }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">Región</span>
                            <select id="select_region" class="js-example-basic-single form-select" name="region_id">
                                <option value="{{ $reinsurers->region_id }}">{{ $reinsurers->region_id }}</option>
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
                            <span class="input-group-text">Línea de Negocio</span>
                            <input type="text" class="form-control" name="business"
                                value="{{ $reinsurers->business }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">Excluye</span>
                            <input type="text" class="form-control" name="excluye"
                                value="{{ $reinsurers->excluye }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">Teléfono 1</span>
                            <input type="text" class="form-control" name="phone_one" value="{{ $reinsurers->phone_one }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">Teléfono 2</span>
                            <input type="text" class="form-control" name="phone_two" value="{{ $reinsurers->phone_two }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">Teléfono 3</span>
                            <input type="text" class="form-control" name="phone_three" value="{{ $reinsurers->phone_three }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <button class="btn-outline-success btn">Guardar</button>
                </div>
                <div class="text-center my-4">
                    <a href="javascript:void(0)" data-id="{{ $reinsurers->id }}"
                        class="btn btn-outline-danger btn-md btn-delete my-2" role="button"><i
                            class="fa fa-trash"></i>
                        Eliminar</a>
                    <br>
                    <a href="javascript:void(0)" class="btn btn-outline-info btn-delete" onclick="history.back()"
                        role="button"><i class="fa-solid fa-xmark"></i> Cancelar</a>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="{{ asset('js/admin/database/reinsurer.js') }}"></script>

@endsection
