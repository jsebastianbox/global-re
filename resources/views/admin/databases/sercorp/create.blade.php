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

            const dateString = `Agregar Compañía de Seguros | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Compañía de Sercop
@endsection

<div class="card text-left">
    <div class="card-header">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('insurance.index') }}"><i class="fa-solid fa-house"></i> Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active"> <i class="fa-solid fa-plus"></i> Crear</a>
            </li>

        </ul>
    </div>
</div>

<div id="aseguradores">

    @include('include.flash_alert')

    {{-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"  id="myAlert"></button>
    </div> --}}

    <form method="POST" action="{{ route('sercorp.store') }}">
        @csrf

        <div id="contentContainer">
            <div class="input_group">
                <div class="left_side">
                    <div class="input--label">
                        <label class="labelForm" for="">Código de Proceso
                            <input class="inputForm" type="text" name="code">
                        </label>
                    </div>

                    <div class="input--label">
                        <label class="labelForm" for="">Entidad
                            <select class="inputForm js-example-basic-single" id="select_entity" name="entity_id">

                            </select>
                        </label>
                    </div>

                    <div class="input--label" id="new-entity" style="display:none;">
                        <label class="labelForm" for="">Ingresar nombre de la nueva entidad
                            <input class="inputForm" type="text" id="input-new-entity">
                        </label>
                        <div class="row">
                            <button type="button" id="btn-add-entity" class="btnEnviar">Guardar</button>
                            <button type="button" class="btnEnviar btn-cancel">Cancelar</button>
                        </div>
                    </div>

                    <div class="input--label">
                        <label class="labelForm" for="">Objeto
                            <input class="inputForm" type="text" id="input-new-contact" name="object">
                        </label>
                    </div>

                    <div class="input--label">
                        <label class="labelForm" for="">Presupuesto Referencial
                            <input name="budget" class="inputForm" type="number" id="input-new-contact">
                        </label>
                    </div>

                    <div class="input--label" id="new-position">

                        <label class="labelForm" for="">Fecha de Publicación
                            <input name="date_publication" class="inputForm" type="date" id="input-new-position">
                        </label>
                    </div>

                </div>
                <div class="right_side">

                    <div class="input--label">
                        <label class="labelForm" for="">Estado
                            <select class="inputForm js-example-basic-single" id="status" name="status">
                                <option value="Adjudicado" selected>Adjudicado</option>
                                <option value="Cancelado">Cancelado</option>
                                <option value="Desierto">Desierto</option>
                                <option value="En curso">En curso</option>
                            </select>
                            {{-- <select id="select_branch" class="js-example-basic-single inputForm" name="branch_id[]"
                                multiple="multiple">
                            </select> --}}
                        </label>
                    </div>

                    <div class="input--label">
                        <label class="labelForm" for="status">Adjudicatario
                            <select id="select_awardee" class="js-example-basic-single inputForm" name="awardee_id">
                            </select>
                        </label>
                    </div>

                    <div class="input--label" id="new-awardee" style="display:none;">
                        <label class="labelForm" for="">Ingresar Nuevo Nombre Adjudicatario

                            <div class="row">
                                <button type="button" id="btn-add-entity" class="btnEnviar">Guardar</button>
                                <input class="inputForm" type="text" id="input-new-awardee">
                            </div>
                        </label>
                        <button type="button" id="btn-add-awardee" class="btnEnviar">Guardar</button>
                    </div>


                    <div class="input--label">
                        <label class="labelForm" for="status">Valor Adjudicatario
                            <input class="inputForm" type="number" name="awardee_value">
                        </label>
                    </div>
                    <div class="input--label">
                        <label class="labelForm" for="status">Comentario
                            <input class="inputForm" type="text" name="coment">
                        </label>
                    </div>



                </div>
            </div>
            <button id="btnQuemado" class="btnEnviar">Guardar</button>


        </div>


    </form>
</div>

<script src="{{ asset('js/admin/database/sercorp.js') }}" defer></script>

@endsection
