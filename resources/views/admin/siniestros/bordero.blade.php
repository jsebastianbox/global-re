@extends('admin.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/siniestros/bordero.css') }}">
    <script src="{{ asset('js/admin/siniestros/bordero.js') }}" defer></script>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

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

            const dateString = `Siniestros — Borderó | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Siniestros
@endsection

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

<table id="borderauxTable" class="table table-hover table-striped table-light">
    <thead>
        <tr>
            <th>AÑO DEL REGIS.</th>
            <th>RAMO</th>
            <th>ASEGURADO</th>
            <th>NOTA DE COBERTURA</th>
            <th>VIGENCIA DESDE</th>
            <th>VIGENCIA HASTA</th>
            <th>NUMERO DE RECLAMO</th>
            <th>FECHA DE SINIESTRO</th>
            <th>VALOR DE RECLAMO</th>
            <th>VALOR DE LIQUIDACIÓN</th>
            <th>VALOR POR PARTICIPACIÓN</th>
            <th>DESGLOSE DE REASEGURO</th>
            <th>PARTICIPACIÓN DE REASEGURO</th>
            <th>VALOR DE RECLAMO POR REASEGURADOR</th>
            <th>VALOR DE HONORARIOS Y/U OTROS POR REASEGURADOR</th>
            <th>NÚMERO DE NOTA DE DÉBITO Y CRÉDITO GLOBAL</th>
            <th>FECHA DE PAGO POR REASEGURADORES</th>
            <th>VALORES DE REASEGURADORES RECIBIDOS</th>
            <th>VALORES PAGADOS A LA CEDENTE</th>
            <th>VALORES PENDIENTES DE PAGO CEDENTE</th>
            <th>OBS. COBERTURA</th>
            <th>OBSERVACIONES</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@endsection
