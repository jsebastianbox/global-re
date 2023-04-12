<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<table id="processTable" class="compromisosTable">
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

<script>
    var countries = {!! json_encode($countries) !!};
    var type_coverage = {!! json_encode($type_coverage) !!};
    var slip_statuses = {!! json_encode($slip_statuses) !!};
</script>
@if(\Illuminate\Support\Str::contains(\Illuminate\Support\Facades\Request::url(), '/admin/comercial/edit_compromiso/'))
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
                    "order": [[1, "desc"]],
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
                    scrollY: "300px", // set max height to 400 pixels
                    scrollCollapse: true // enable table scrolling when content is taller than max height
                });
            }
        });
    });
</script>
@else
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
                    scrollY: "300px", // set max height to 400 pixels
                    scrollCollapse: true // enable table scrolling when content is taller than max height
                });
            }
        });
    });
</script>
@endif