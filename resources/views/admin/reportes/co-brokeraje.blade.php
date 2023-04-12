@extends('admin.layout')
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

            const dateString = `Emisión de Co-Brokerajes | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Co-Brokerajes
@endsection
{{-- bootstrap --}}

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>


<script src="{{ asset('/js/admin/reportes/co-brokerajes.js') }}" defer></script>
<script>
    var data = {!! $records !!};
</script>

<!-- Esto ya ke voy a pasar al css, no te me alarmes por tener aquí la hoja de estilos -->

<style>
    .main {
        padding: 1rem;
    }

    #entries,
    #selected_entry {
        padding: 2rem;
        background-color: white;
        border-radius: 10px;
        margin: 2rem 1.7rem;
    }

    #selected_entry label strong {
        margin-block: 2rem;
    }

    #table1,
    #table2 {
        margin-block: 2rem;
        margin-inline: 1.7rem;
    }
</style>

@section('content')
    <section id="entries">
        <table id="recordsTable" class="cell-border stripe" style="width:100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Ramo</th>
                    <th>R/N</th>
                    <th>No. Nota de cobertura</th>
                    <th>Desde</th>
                    <th>Hasta</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {{--  --}}
            </tbody>
        </table>
    </section>

    <section id="selected_entry">

        <label><strong>Cliente: </strong><span id="client-name">John Doe</span></label>

        <table id="table1" class="table">
            <thead>
                <tr>
                    <th>Ramo</th>
                    <th>R/N</th>
                    <th>No. Nota de cobertura</th>
                    <th>Endosos</th>
                    <th>Suma Asegurada</th>
                    <th>Prima Neta</th>
                    <th>Desde</th>
                    <th>Hasta</th>
                    <th>Movimiento</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </section>
@endsection
