@extends('admin.layout')
@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/admin/administrativo/cotizaciones_en_curso.css') }}">
    <script src="{{ asset('js/admin/administrativo/cotizaciones_en_curso.js') }}" defer></script>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

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

                const dateString =
                    `Cotizaciones en Curso | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
                document.getElementById('date').textContent = dateString;
            }
            setInterval(updateClock, 1000);
        </script>
    @endsection
</h3>
@section('page_title')
    Administración | Cotizaciones en Curso
@endsection

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<div style="padding:20px">
    <table id="processTable" class="table table-hover table-responsive-md">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">País</th>
                <th scope="col">Asegurado</th>
                <th scope="col">Cedente</th>
                <th scope="col">Tipo de cobertura</th>
                <th scope="col">Técnico asignado</th>
                <th scope="col">Fase</th>
            </tr>
        </thead>
    </table>
</div>

<script>
    var countries = {!! json_encode($countries) !!};
    var type_coverage = {!! json_encode($type_coverage) !!};
    var slip_statuses = {!! json_encode($slip_statuses) !!};
</script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: `${window.location.origin}/api/slips`,
            dataType: 'json',
            success: function(data) {
                $('#processTable').DataTable({
                    processing: true,
                    serverSide: false,
                    ajax: `${window.location.origin}/api/slips`,
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
                    },
                    "columns": [{
                            data: 'id'
                        },
                        {
                            data: "updated_at",
                            render: function(data) {
                                return data.split('T')[0];
                            }
                        },
                        {
                            "data": "country_id",
                            "render": function(data, type, row) {
                                return countries[data];
                            }
                        },
                        {
                            data: "insurer"
                        },
                        {
                            data: "assignor"
                        },
                        {
                            "data": "type_coverage",
                            "render": function(data, type, row) {
                                return type_coverage[data];
                            }
                        },
                        {
                            "data": "user_id",
                            "render": function(data, type, row) {
                                return "{{ $user->name }} {{ $user->surname }}";
                            }
                        },
                        {
                            "data": "slip_status_id",
                            "render": function(data, type, row) {
                                return slip_statuses[data];
                            }
                        }
                    ],
                    pageLength: 50, // set the number of records per page
                    paging: true,
                    searching: true,
                    info: true,
                    emptyTable: "Todavía no existen registros",
                    fixedHeader: true,
                    columnDefs: [{
                        className: 'text-center',
                        targets: 0
                    }],
                    scrollY: "600px", // set max height to 400 pixels
                    scrollCollapse: true // enable table scrolling when content is taller than max height
                });
            }
        });
    });
</script>

@endsection
