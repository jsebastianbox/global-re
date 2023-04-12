@extends('admin.layout')
@section('content')
@section('page_title')
    Libro de Producción
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

            const dateString = `Libro de Producción | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection

<link rel="stylesheet" href="{{ asset('css/admin/siniestros/estados_cuenta.css') }}">
@include('include.datatable')
<div class="estadosContainer card">
    <div class="card_body gestionContainer">
        <table id="gestion_table" class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>País</th>
                    <th>Compañía de Seguros</th>
                    <th>Broker de Reaseguros</th>
                    <th>Ejecutivo Comercial</th>
                    <th>Ejecutivo Técnico</th>
                    <th>Mes de Suscripción</th>
                    <th>Año de Suscripción</th>
                    <th>No. Nota de Cobertura</th>
                    <th>Asegurado</th>
                    <th>Desde</th>
                    <th>Hasta</th>
                    <th>Status</th>
                    {{-- <th>Sector</th>
                    <th>Ramo</th>
                    <th>Reasegurador</th>
                    <th>Orden de Colocación</th>
                    <th>No. Nota de Débito / No. Nota de Crédito</th>
                    <th>Observaciones</th>
                    <th>Instalamentos</th>
                    <th>Fecha de vencimiento</th>
                    <th>Prima Total Global Re</th>
                    <th>Prima Cobrada Global Re</th>
                    <th>Primas x Cobrar Global Re / Notas de Crédito</th>
                    <th>As. Contable Ingresos</th>
                    <th>Status Global</th>
                    <th>Fecha de Ingreso</th>
                    <th>Instalamentos Reasegurador</th>
                    <th>Fecha de Vencimiento</th> <!-- Esta es diferente a la de arriba, no está duplicado -->
                    <th>Prima Total RI</th>
                    <th>Primas Pagadas</th>
                    <th>Primas x Pagar RI</th>
                    <th>As. Contable Pagos</th>
                    <th>Status RI</th>
                    <th>Fecha de Pago</th>
                    <th>As. Contable Comisiones</th>
                    <th>Comisión Total Anual</th>
                    <th>Comisión Cobrada</th>
                    <th>Comisión x Cobrar</th> --}}
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script src="{{ asset('js/admin/produccion/estados.js') }}" defer></script>

{{-- La data debes traer desde el controlador HomeController en la línea 251. Manda en una variable
    usando ->with('variable', json_encode($la_variable_que_contiene_la_data))
    aquí reemplaza este const con const data = {!! $variable !!}. con eso está listo, no debes hacer más.

    los campos { data: 'lo_que_sea' }, cambia el "lo_que_sea" con el nombre de la columna
    de la tabla de la base de datos. tienes que agregar varias { data: "nombre" }, ya que faltan. Son 49 --}}

<script>
    
</script>
@endsection
