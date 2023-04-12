@extends('admin.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/siniestros/pago.css') }}">
    <script src="{{ asset('js/admin/siniestros/pago.js') }}" defer></script>

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

            const dateString = `Siniestros — Pago | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection

@section('page_title')
    Administración | Siniestros
@endsection

<table id="orden_pago_table" class="table table-striped table-hover table-light">
    <thead>
        <th>No. Siniestro</th>
        <th>Referencia Cia. Seguros</th>
        <th>Fecha del Siniestro</th>
        <th>Valor de la Pérdida</th>
        <th>Deducible (-)</th>
        <th>R.A.S.A</th>
        <th>Depreciación 12% (-)</th>
        <th>Total a Liquidar</th>
        <th>Valor Honorarios Ajustador</th>
        <th>Participación 50%</th>
        <th>ISD <span id="reinsurer_isd">CHUBB</span> 2.5%</th>
        <th>Total Pagado por <span id="reinsurer">CHUBB</span></th>
        <th>Total Pagado por <span id="reinsurer_total">CHUBB</span> por Participación </th>
        <th>ISD Asumir Global 2.5%</th>
    </thead>
    <tbody></tbody>
</table>

@endsection
