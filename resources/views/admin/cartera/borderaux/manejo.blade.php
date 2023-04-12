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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

{{-- <script src="{{ asset('js/admin/comercial/ajax.js') }}" defer></script> --}}
<script src="{{ asset('js/admin/cobranzas/boreraux_management.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('css/admin/cobranzas/manejo.css') }}">

<script>
    var invoiceJSON = JSON.parse('{!! $invoiceJSON !!}')
    var bancosJSON = JSON.parse('{!! $bancosJSON !!}')
</script>

@include('include.datatable')

<div class="first_contaier">
    <div class="registros_container">
        <div class="table-responsive">
            <table id="cobrokerajes_cobranzas" class="table table-sm table-bordered table-hover ">
                <thead>
                    <th scope="col">
                        Asegurado
                    </th>
                    <th scope="col">
                        Broker de Reaseguros
                    </th>
                    <th scope="col">
                        Banco
                    </th>
                    <th scope="col">
                        Valor Recibido
                    </th>
                    <th scope="col">
                        Fecha de Ingreso Banco
                    </th>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            <span id="assured">{{ $borderaux_selected->insured }}</span>
                        </td>
                        <td>
                            <select name="broker"
                                class="js-example-basic-single inputForm select_broker form-select">
                                <!-- Comentar el foreach si es que deja de funcionar -->
                                {{-- @foreach ($reinsurers as $reinsurer)
                                    <option value="{{ $reinsurer }}">{{ $reinsurer }}</option>
                                @endforeach --}}
                            </select>
                        </td>
                        <td>
                            <select name="bank" id="bank" class="">
                                <option value="ninguno" selected>Seleccionar</option>
                            </select>
                        </td>
                        <td>
                            <input name="received_value" id="received_value"
                                onkeyup="valueReceived();reviewAppliedValue()" type="number" step="any"
                                placeholder="...">
                        </td>
                        <td>
                            <input type="date" name="bank_deposit_date" id="bank_deposit_date">
                        </td>
                    </tr>
                </tbody>
            </table>

            <button class="btn btn-primary" type="button" id="submit_manejo_form"
                onclick="submitFirstForm(event)">Guardar</button>

        </div>
    </div>
</div>

<div class="information_container">
    <div class="registros_container">
        <div class="table-responsive">
            <table id="tabla_pagos" class="table table-hover table-bordered table-sm">
                <thead>
                    <th>
                        No. Registro
                    </th>
                    <th>
                        No. Factura
                    </th>
                    <th>
                        Comisión Total
                    </th>
                    <th>
                        Valor de la Factura
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Valor Aplicado
                    </th>
                    <th>
                        Saldo Factura
                    </th>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4"></td>
                        <td><strong>Total Aplicado: </strong></td>
                        <td id="sum_payment_values" style="font-weight: bold">$0.00</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>

            <button class="btn btn-primary" type="button" id="submit_manejo_form_2"
                onclick="submitSecondForm()">Guardar</button>

        </div>
    </div>
</div>

<form onsubmit="return false" method="PUT" style="display: none" id="manejo_form">
    @csrf
    <input name="first_rows" type="hidden">
</form>

<form action="" method="PUT" style="display: none" id="manejo_form_2">
    @csrf
    <input name="second_rows" type="hidden">
</form>
@endsection
