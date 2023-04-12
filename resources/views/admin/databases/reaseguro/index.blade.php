@extends('admin.layout')

@section('content')

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
                `Compañías de Reaseguros | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Compañía de Reaseguros
@endsection

<script>
    var data = {!! $reinsurers !!};
</script>

<div class="card text-left">

    <div class="card-header">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="fa-solid fa-house"></i> Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reinsurer.create') }}"> <i class="fa-solid fa-plus"></i> Crear</a>
            </li>

        </ul>
    </div>
    <div class="card-body">

        <table id="reinsurers" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    {{-- <th scope="col">#</th> --}}
                    <th scope="col">Empresa</th>
                    <th scope="col">Referencia</th>
                    <th scope="col">País</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">Región</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Línea de Negocio</th>
                    <th scope="col">Excluye</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Teléfono 1</th>
                    <th scope="col">Teléfono 2</th>
                    <th scope="col">Teléfono 3</th>
                    <th scope="col">Opción</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
</div>

<script>
    const contacts = {!! $contacts !!};
    const position = {!! $position !!};
    const reference = {!! $references !!};
    const country = {!! $countries !!};

    function capitalize(string) {
    return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
}
    $('#reinsurers').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
            },
            dom: "Bfrtip",
            lengthChange: false,
            buttons: [
                'colvis',
                'copyHtml5',
                'csvHtml5',
                'excelHtml5',
                'pdfHtml5',
                'print'
            ],
            // ajax: {
            //     // url: "adjuster/show",
            //     url: `${window.location.origin}/api/reinsurer_list`,
            // },
            data: data,
            dataType: 'json',
            type: "GET",
            columns: [
                // {
                //     data: 'id',
                //     name: 'id'
                // },
                {
                    data: 'name',
                    name: 'name',
                    defaultContent: "N/A",
                    render: function (data, type, row) {
                        return data.split(' ').map(capitalize).join(' ');;
                    }
                },
                {
                    data: 'reference',
                    name: 'reference',
                    defaultContent: "N/A",
                    // render: function (data, type, row) {
                    //     return data.split(' ').map(capitalize).join(' ');;
                    // }
                },
                {
                    data: 'country_id',
                    name: 'country_id',
                    defaultContent: "N/A",
                    // render: function (data, type, row) {
                    //     return data.split(' ').map(capitalize).join(' ');;
                    // }
                },
                {
                    data: 'contact_id',
                    name: 'contact_id',
                    defaultContent: "N/A",
                    // render: function(data, type, row) {
                    //     let contact_name = contacts[data];
                    //     return contact_name.split(' ').map(capitalize).join(' ');
                    // }
                },
                {
                    data: 'region_id',
                    name: 'region_id',
                    defaultContent: "N/A",
                    // render: function(data, type, row) {
                    //     let contact_name = contacts[data];
                    //     return contact_name.split(' ').map(capitalize).join(' ');
                    // }
                },
                {
                    data: 'position_id',
                    name: 'position_id',
                    defaultContent: "N/A",
                    // render: function(data, type, row) {
                    //     console.log('data:', data, 'position:', position);

                    //     let position_name = position[data];
                    //     return position_name.split(' ').map(capitalize).join(' ');
                    // }
                },
                {
                    data: 'business',
                    name: 'business',
                    defaultContent: "N/A",
                    // render: function(data, type, row) {
                    //     console.log('data:', data, 'position:', position);

                    //     let position_name = position[data];
                    //     return position_name.split(' ').map(capitalize).join(' ');
                    // }
                },
                {
                    data: 'excluye',
                    name: 'excluye',
                    defaultContent: "N/A",
                    // render: function(data, type, row) {
                    //     console.log('data:', data, 'position:', position);

                    //     let position_name = position[data];
                    //     return position_name.split(' ').map(capitalize).join(' ');
                    // }
                },
                {
                    data: 'email',
                    name: 'email',
                    render: function(data, type, full, meta) {
                        return '<a href="mailto:' + data + '">' + data + '</a>'.toLowerCase();
                    }
                },
                {
                    data: 'phone_one',
                    name: 'phone_one'
                },
                {
                    data: 'phone_two',
                    name: 'phone_two'
                },
                {
                    data: 'phone_three',
                    name: 'phone_three'
                },
                {
                    data: 'id',
                    name: 'id',
                    render: function(data, type, row) {
                        return `<form method="GET" action="/admin/database/reinsurers/edit/${data}">

                            <button type="submit" class="btn btn-outline-info"><i class="fa-solid fa-pen-to-square"></i></button>
                        </form>`;
                    }
                },
            ],
            orderable: true,
            searchable: true,
        }).buttons().container()
        .appendTo('#example_wrapper .col-md-6:eq(0)');
</script>


{{-- <script src="{{ asset('js/admin/database/reinsurer.js') }}" defer></script> --}}

@endsection
