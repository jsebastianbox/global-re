@extends('admin.layout')

@section('content')
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

            const dateString = `Cartera y Cobranzas — Borderaux | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Borderaux
@endsection
<script src="{{ asset('js/admin/cobranzas/borderaux_list.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('css/admin/cobranzas/listado.css') }}">

{{-- datatable --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css">
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script defer src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script defer src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script defer src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script>
<script defer src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script defer src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script defer src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script defer src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js"></script>

<div id="contentContainer">
    <div class="registrosContainer">

        <div>
            <button id="showRegister" class="btn btn-info" style="margin-bottom: 1rem" disabled>Ver registros
                seleccionados</button>
        </div>

        <table id="facturas_table" class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>
                        Fecha de Creación
                    </th>
                    <th>
                        No. Registro
                    </th>
                    <th>
                        Asegurado
                    </th>
                    <th>
                        Broker de reaseguros
                    </th>
                    <th>
                        No. Factura
                    </th>
                    <th>
                        Comisión Total
                    </th>
                    <th>
                        Valor Factura
                    </th>
                    <th>
                        Valor Aplicado
                    </th>
                    <th>
                        Saldo Factura
                    </th>
                    <th></th>
                </tr>
            </thead>

            <tbody>

                @foreach ($borderouxsInstallation as $registro)
                    @if ($registro->is_generate_invoice === 1)
                        <tr>
                            <td style="width: 30px;text-align:center">
                                <input id="{{ $registro->id }}checkbox" type="checkbox" value=""
                                    onchange="sendInvoiceId({{ $registro->id }})">
                            </td>
                            <td>
                                {{ $registro->created_at }}
                            </td>
                            <td name="install_id">
                                {{ $registro->id }}
                            </td>
                            <td>
                                {{ $registro->insured }}
                            </td>
                            <td>
                                {{ $registro->reinsurance_broker }}
                            </td>
                            <td>
                                {{ $registro->invoice_number }}
                            </td>
                            <td class="number_formatter">
                                {{ round($registro->commission_total, 2) }}

                            </td>
                            <td class="number_formatter">
                                <strong>{{ round($registro->invoice_value, 2) }}</strong>

                            </td>
                            <td class="number_formatter">
                                <strong>{{ round($registro->applied_value, 2) }}</strong>

                            </td>
                            <td class="number_formatter">
                                {{ round($registro->invoice_balance, 2) }}
                            </td>
                            <td style="text-align:center">
                                <button class="btn btn-info" name="editRecordBtn"
                                    data-id="{{ $registro->borderouxes_id }}">Ver</button>
                                {{-- <a class="btn btn-info" href="/admin/cartera_y_cobranzas/borderaux/item/{{$registro->id}}">
                                        Ver
                                    </a> --}}
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

    </div>

</div>
@endsection
