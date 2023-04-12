@extends('admin.layout')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/admin/administrativo/usuarios.css') }}">
    <script src="{{ asset('js/admin/database/insurance.js') }}" defer></script>

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

            const dateString = `Compañías de Seguros | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Compañía de Seguros
@endsection

<script>
    var data = {!! $insurers !!};
</script>

<div class="card text-left">

    <div class="card-header">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="fa-solid fa-house"></i> Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('insurance.create') }}"> <i class="fa-solid fa-plus"></i> Crear</a>
            </li>

        </ul>
    </div>
    <div class="card-body">

        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Empresa</th>
                    <th scope="col">Nombre registrado</th>
                    <th scope="col">Cobertura</th>
                    <th scope="col">País</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Email</th>
                    <th scope="col">Teléfono 1</th>
                    <th scope="col">Teléfono 2</th>
                    <th scope="col">Teléfono 3</th>
                    <th scope="col">Editar</th>
                    {{-- <th scope="col">Opción</th> --}}
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>



    </div>
</div>


@endsection

{{-- <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                    aria-sort="ascending" aria-label="Order: activate to sort column descending"
                    style="width: 39px;">Order</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                    aria-label="Description: activate to sort column ascending" style="width: 78px;">Ajustador
                </th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                    aria-label="Deadline: activate to sort column ascending" style="width: 59px;">Fecha</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                    aria-label="Status: activate to sort column ascending" style="width: 43px;">Empresa</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                    aria-label="Amount: activate to sort column ascending" style="width: 53px;">Contacto</th>
                <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                    colspan="1" aria-label="Add row">

                    Accion

                </th>
            </tr>
        </thead>
        <tbody>

            <tr role="row" class="odd">
                <td class="sorting_1">1</td>
                <td>Alphabet puzzle</td>
                <td>2016/01/15</td>
                <td>Done</td>
                <td>1000</td>
                <td>
                    <button type="button" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-danger btn-xs dt-delete">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </td>
            </tr>

            <tr role="row" class="even">
                <td class="sorting_1">30</td>
                <td>TV carton</td>
                <td>2019/02/08</td>
                <td>Offer</td>
                <td>1369</td>
                <td>
                    <button type="button" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-danger btn-xs dt-delete">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div> --}}
