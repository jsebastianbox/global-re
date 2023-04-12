@extends('admin.layout')
@section('content')
@section('page_title')
    Gestión comercial global reinsurance broker inc. {{ date('Y') }}
@endsection
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

            const dateString = `Siniestros — Estados de Cuenta | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
<link rel="stylesheet" href="{{ asset('css/admin/siniestros/estados_cuenta.css') }}">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">

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


<style>
    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        border-style: hidden !important;
    }
</style>

<div class="estados_container">
    {{-- <div class="title">Gestión comercial global reinsurance broker inc. <span id="year">2021</span></div> --}}
    <div class="info_container">
        <div class="left1">
            <strong>Cedente:</strong>
        </div>
        <div class="right1">
            <strong id="insurer">Latina seguros</strong>
        </div>
        <div class="left2">
            <strong>Fecha de corte:</strong>
        </div>
        <div class="right2">
            <strong id="deadline">23-jun-22</strong>
        </div>
    </div>
    <div class="table_container">
        <table id="gestion_table" class="table table-striped table-light">
            <thead>
                <th>#</th>
                <th>País</th>
                <th>Compañía de seguros</th>
                <th>No. Nota de cobertura</th>
                <th>Asegurado</th>
                <th>Desde</th>
                <th>Hasta</th>
                <th>No. Nota de Crédito / No. Nota de Débito</th>
                <th>Instalamentos</th>
                <th>Fecha de vencimiento</th>
                <th>Prima Total Global Re</th>
                <th>Prima Cobrada Global Re</th>
                <th>Primas x Cobrar Global Re / Notas de Crédito</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

{{-- Te recomiendo solo mover lo indicado ya que esto es todo el js que se necesita
    y para traer la data, si o si tienes que poner una etiqueta script como te indico
    en el siguiente párrafo, pero debe ser var, no const para que puedas acceder desde
    el archivo js, y el archivo js debe ser cargado despues, asi que si tienes lio
    con hacerlo de ese modo, solo borra estos comentarios

    La data debes traer desde el controlador HomeController en la línea 241. Manda en una variable
    usando ->with('variable', json_encode($la_variable_que_contiene_la_data))
    aquí reemplaza este const con const data = {!! $variable !!}. con eso está listo, no debes hacer más.

    los campos { data: 'lo_que_sea' }, cambia el "lo_que_sea" con el nombre de la columna
    de la tabla de la base de datos. --}}

<script>
    const data = [{
            "id": "1",
            "pais": "Ecuador",
            "aseguradora": "Latina Seguros",
            "nota_cobertura": "GRB-12-2020/2021",
            "asegurado": "Aeroregional",
            "desde": "06-abr-20",
            "hasta": "06-abr-21",
            "no_debito_credito": "-",
            "instalamentos": "1er instalamento",
            "fecha_vencimiento": "06-jun-20",
            "prima_total_global": "54,155.19",
            "prima_cobrada_global": "54,155.19",
            "primas_por_cobrar_notas_credito": "-"
        },
        {
            "id": "2",
            "pais": "Ecuador",
            "aseguradora": "Latina Seguros",
            "nota_cobertura": "GRB-12-2020/2021",
            "asegurado": "Aeroregional",
            "desde": "06-abr-20",
            "hasta": "06-abr-21",
            "no_debito_credito": "-",
            "instalamentos": "1er instalamento",
            "fecha_vencimiento": "06-jun-20",
            "prima_total_global": "54,155.19",
            "prima_cobrada_global": "54,155.19",
            "primas_por_cobrar_notas_credito": "-"
        },
        {
            "id": "3",
            "pais": "Ecuador",
            "aseguradora": "Latina Seguros",
            "nota_cobertura": "GRB-12-2020/2021",
            "asegurado": "Aeroregional",
            "desde": "06-abr-20",
            "hasta": "06-abr-21",
            "no_debito_credito": "-",
            "instalamentos": "1er instalamento",
            "fecha_vencimiento": "06-jun-20",
            "prima_total_global": "54,155.19",
            "prima_cobrada_global": "54,155.19",
            "primas_por_cobrar_notas_credito": "-"
        },
        {
            "id": "4",
            "pais": "Ecuador",
            "aseguradora": "Latina Seguros",
            "nota_cobertura": "GRB-12-2020/2021",
            "asegurado": "Aeroregional",
            "desde": "06-abr-20",
            "hasta": "06-abr-21",
            "no_debito_credito": "-",
            "instalamentos": "1er instalamento",
            "fecha_vencimiento": "06-jun-20",
            "prima_total_global": "54,155.19",
            "prima_cobrada_global": "54,155.19",
            "primas_por_cobrar_notas_credito": "-"
        },
        {
            "id": "5",
            "pais": "Ecuador",
            "aseguradora": "Latina Seguros",
            "nota_cobertura": "GRB-12-2020/2021",
            "asegurado": "Aeroregional",
            "desde": "06-abr-20",
            "hasta": "06-abr-21",
            "no_debito_credito": "-",
            "instalamentos": "1er instalamento",
            "fecha_vencimiento": "06-jun-20",
            "prima_total_global": "54,155.19",
            "prima_cobrada_global": "54,155.19",
            "primas_por_cobrar_notas_credito": "-"
        },
        {
            "id": "6",
            "pais": "Ecuador",
            "aseguradora": "Latina Seguros",
            "nota_cobertura": "GRB-12-2020/2021",
            "asegurado": "Aeroregional",
            "desde": "06-abr-20",
            "hasta": "06-abr-21",
            "no_debito_credito": "-",
            "instalamentos": "1er instalamento",
            "fecha_vencimiento": "06-jun-20",
            "prima_total_global": "54,155.19",
            "prima_cobrada_global": "54,155.19",
            "primas_por_cobrar_notas_credito": "-"
        },
        {
            "id": "7",
            "pais": "Ecuador",
            "aseguradora": "Latina Seguros",
            "nota_cobertura": "GRB-12-2020/2021",
            "asegurado": "Aeroregional",
            "desde": "06-abr-20",
            "hasta": "06-abr-21",
            "no_debito_credito": "-",
            "instalamentos": "1er instalamento",
            "fecha_vencimiento": "06-jun-20",
            "prima_total_global": "54,155.19",
            "prima_cobrada_global": "54,155.19",
            "primas_por_cobrar_notas_credito": "-"
        },
        {
            "id": "8",
            "pais": "Ecuador",
            "aseguradora": "Latina Seguros",
            "nota_cobertura": "GRB-12-2020/2021",
            "asegurado": "Aeroregional",
            "desde": "06-abr-20",
            "hasta": "06-abr-21",
            "no_debito_credito": "-",
            "instalamentos": "1er instalamento",
            "fecha_vencimiento": "06-jun-20",
            "prima_total_global": "54,155.19",
            "prima_cobrada_global": "54,155.19",
            "primas_por_cobrar_notas_credito": "-"
        },
        {
            "id": "9",
            "pais": "Ecuador",
            "aseguradora": "Latina Seguros",
            "nota_cobertura": "GRB-12-2020/2021",
            "asegurado": "Aeroregional",
            "desde": "06-abr-20",
            "hasta": "06-abr-21",
            "no_debito_credito": "-",
            "instalamentos": "1er instalamento",
            "fecha_vencimiento": "06-jun-20",
            "prima_total_global": "54,155.19",
            "prima_cobrada_global": "54,155.19",
            "primas_por_cobrar_notas_credito": "-"
        },
        {
            "id": "10",
            "pais": "Ecuador",
            "aseguradora": "Latina Seguros",
            "nota_cobertura": "GRB-12-2020/2021",
            "asegurado": "Aeroregional",
            "desde": "06-abr-20",
            "hasta": "06-abr-21",
            "no_debito_credito": "-",
            "instalamentos": "1er instalamento",
            "fecha_vencimiento": "06-jun-20",
            "prima_total_global": "54,155.19",
            "prima_cobrada_global": "54,155.19",
            "primas_por_cobrar_notas_credito": "-"
        },
        {
            "id": "11",
            "pais": "Ecuador",
            "aseguradora": "Latina Seguros",
            "nota_cobertura": "GRB-12-2020/2021",
            "asegurado": "Aeroregional",
            "desde": "06-abr-20",
            "hasta": "06-abr-21",
            "no_debito_credito": "-",
            "instalamentos": "1er instalamento",
            "fecha_vencimiento": "06-jun-20",
            "prima_total_global": "54,155.19",
            "prima_cobrada_global": "54,155.19",
            "primas_por_cobrar_notas_credito": "-"
        },
        {
            "id": "12",
            "pais": "Ecuador",
            "aseguradora": "Latina Seguros",
            "nota_cobertura": "GRB-12-2020/2021",
            "asegurado": "Aeroregional",
            "desde": "06-abr-20",
            "hasta": "06-abr-21",
            "no_debito_credito": "-",
            "instalamentos": "1er instalamento",
            "fecha_vencimiento": "06-jun-20",
            "prima_total_global": "54,155.19",
            "prima_cobrada_global": "54,155.19",
            "primas_por_cobrar_notas_credito": "-"
        },
        {
            "id": "13",
            "pais": "Ecuador",
            "aseguradora": "Latina Seguros",
            "nota_cobertura": "GRB-12-2020/2021",
            "asegurado": "Aeroregional",
            "desde": "06-abr-20",
            "hasta": "06-abr-21",
            "no_debito_credito": "-",
            "instalamentos": "1er instalamento",
            "fecha_vencimiento": "06-jun-20",
            "prima_total_global": "54,155.19",
            "prima_cobrada_global": "54,155.19",
            "primas_por_cobrar_notas_credito": "-"
        },
        {
            "id": "14",
            "pais": "Ecuador",
            "aseguradora": "Latina Seguros",
            "nota_cobertura": "GRB-12-2020/2021",
            "asegurado": "Aeroregional",
            "desde": "06-abr-20",
            "hasta": "06-abr-21",
            "no_debito_credito": "-",
            "instalamentos": "1er instalamento",
            "fecha_vencimiento": "06-jun-20",
            "prima_total_global": "54,155.19",
            "prima_cobrada_global": "54,155.19",
            "primas_por_cobrar_notas_credito": "-"
        },
        {
            "id": "15",
            "pais": "Ecuador",
            "aseguradora": "Latina Seguros",
            "nota_cobertura": "GRB-12-2020/2021",
            "asegurado": "Aeroregional",
            "desde": "06-abr-20",
            "hasta": "06-abr-21",
            "no_debito_credito": "-",
            "instalamentos": "1er instalamento",
            "fecha_vencimiento": "06-jun-20",
            "prima_total_global": "54,155.19",
            "prima_cobrada_global": "54,155.19",
            "primas_por_cobrar_notas_credito": "-"
        }
    ];

    $(document).ready(function() {
        $('#gestion_table').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.2/i18n/es-MX.json',
            },
            data: data,
            "searching": true, // enable/disable search bar
            "ordering": true, // enable/disable sorting
            "paging": true, // enable/disable pagination
            "lengthChange": true, // enable/disable rows per page select
            "info": true, // enable/disable table info display
            "dom": 'Bfrtip', // show buttons at the bottom
            buttons: [
                'copyHtml5',
                'csvHtml5',
                {
                    extend: 'excelHtml5',
                    autoFilter: true,
                    sheetName: 'Exported data'
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ],
            columnDefs: [{
                targets: -1,
                visible: false
            }],
            fixedHeader: true,
            scrollY: 650,
            deferRender: true,
            scroller: true,
            columns: [{
                    data: 'id'
                },
                {
                    data: 'pais'
                },
                {
                    data: 'aseguradora'
                },
                {
                    data: 'nota_cobertura'
                },
                {
                    data: 'asegurado'
                },
                {
                    data: 'desde'
                },
                {
                    data: 'hasta'
                },
                {
                    data: 'no_debito_credito'
                },
                {
                    data: 'instalamentos'
                },
                {
                    data: 'fecha_vencimiento'
                },
                {
                    data: 'prima_total_global'
                },
                {
                    data: 'prima_cobrada_global'
                },
                {
                    data: 'primas_por_cobrar_notas_credito'
                }
            ],
            "rowCallback": function(row, data, index) {
                if (index % 2 === 0) {
                    $('td', row).css('background-color', '#e3f4ff');
                } else {
                    $('td', row).css('background-color', '#eff6ff');
                }
            }
        });
        $('#table.dataTable').css({
            'background-color': '#e6f7ff',
            'border-collapse': 'collapse',
            'border-style': 'hidden',
            'border': 'none',
            'box-shadow': 'none'
        });
    });
</script>
@endsection
