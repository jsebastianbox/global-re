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
                `Editar Compañía de Seguros | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Compañía de Reaseguros
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
                <a class="nav-link" href="{{ route('insurance.index') }}"><i class="fa-solid fa-house"></i> Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('insurance.create') }}"> <i class="fa-solid fa-plus"></i> Crear</a>
            </li>
        </ul>
    </div>

    @include('include.flash_alert')

    <form method="POST" action="{{ route('insurance.update', ['insurance' => $insurance->id]) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $insurance->id }}">

        <div class="card-body" style="padding-block: 2rem">
            <div class="row my-4">
                <div class="col-md-12">
                    <div class="col-md-4 d-flex flex-column">
                        <div class="input-group">
                            <span class="input-group-text">Nombre</span>
                            <input type="text" class="form-control" name="name"
                                value="{{ $insurance->name }}">
                        </div>
                        <div class="input-group my-4">
                            <span class="input-group-text">Nombre registrado</span>
                            <input type="text" class="form-control" name="registered_name"
                                value="{{ $insurance->registered_name }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">País</span>
                            <select id="select_country" class="js-example-basic-single form-select" name="country">
                                <option value="{{ $insurance->country }}" selected="selected">
                                    @if(is_numeric($insurance->country))
                                    {{ DB::table('countries')->select('name')->where('id', $insurance->country)->first()->name }}
                                    @else
                                    {{ $insurance->country }}
                                    @endif
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">Cargo</span>
                            <select id="select_position" class="js-example-basic-single form-select" name="position">
                                <option value="{{ $insurance->position }}" selected="selected">
                                    @if(is_numeric($insurance->position))
                                    {{ DB::table('positions')->select('name')->where('id', $insurance->position)->first()->name }}
                                    @else
                                    {{ $insurance->position }}
                                    @endif
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
                            <span class="input-group-text">Cobertura</span>
                            <input type="text" class="form-control" value="{{ $insurance->coverage }}"
                                name="coverage">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">Contacto</span>
                            <select id="select_contact" class="js-example-basic-single inputForm" name="contact">
                                <option value="{{ $insurance->contact }}" selected="selected">
                                    @if(is_numeric($insurance->contact))
                                    {{ DB::table('contacts')->select('name')->where('id', $insurance->contact)->first()->name }}
                                    @else
                                    {{ $insurance->contact }}
                                    @endif
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
                            <input type="email" class="form-control" name="email" value="{{ $insurance->email }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">Teléfono 1</span>
                            <input type="text" class="form-control" name="phone"
                                value="{{ $insurance->phone }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">Teléfono 2</span>
                            <input type="text" class="form-control" name="phone_two"
                                value="{{ $insurance->phone_two }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">Teléfono 3</span>
                            <input type="text" class="form-control" name="phone_three"
                                value="{{ $insurance->phone_three }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <button class="btn-outline-success btn">Guardar</button>
                </div>
                <div class="text-center my-4">
                    <a href="javascript:void(0)" data-id="{{ $insurance->id }}"
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


<script src="{{ asset('js/admin/database/insurance.js') }}" defer></script>

@endsection
