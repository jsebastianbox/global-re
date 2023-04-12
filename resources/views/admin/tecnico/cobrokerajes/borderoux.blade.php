@extends('admin.layout')
@section('content')
    {{-- <script src="{{ asset('js/admin/tecnico/produccion_facultativo/slip_de_cotizacion.js') }}" defer></script> --}}

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/admin/comercial/ajax.js') }}" defer></script>

    @include('include.datatable')

    <script src="{{ asset('js/admin/tecnico/cobrokerajes/borderoux.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/admin/tecnico/cobrokerajes/borderoux.css') }}">


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
                `Co-Brokerajes — Facturación | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Co-Brokerajes
@endsection



<div id="contentContainer">

    <div id="records" class="card mb-5" style="border-radius: 0.45em; padding:0.5em; background-color:#fcfbfa;">
        <div class="card-body">

            <table id="borderaux_table" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Fecha de Creación </th>
                        <th>Broker Reaseguros </th>
                        <th>Cía. Seguros</th>
                        <th>Asegurado</th>
                        <th>Tipo de Contrato</th>
                        <th>Cobertura </th>
                        <th>Sector</th>
                        <th>Régimen</th>
                        <th>Año Suscripción</th>
                        <th>Movimiento </th>
                        <th>Técnico Asignado</th>
                        <th>Desde </th>
                        <th>Hasta </th>
                        <th>No. Nota Cobertura</th>
                        <th>Participación</th>
                        <th>Primas Brutas </th>
                        <th>Impuestos / Deducciones </th>
                        <th>Prima Neta Reaseguros </th>
                        <th>Instalamentos</th>
                        <th>% de comisión </th>
                        <th>Comisión total</th>
                        <th>Suma asegurable</th>
                        <th>Suma asegurada</th>
                        <th>Límite de Indemnización</th>
                        <th>edit</th>
                    </tr>
                </thead>
                <tbody id="cobrokerajesTable">
                    @foreach ($borderouxs as $key => $borderoux)
                        <tr>
                            <td id="borderaux_id">
                                {{ $key + 1 }}
                            </td>
                            <td id="borderaux_reinsurance_broker">
                                {{ $borderoux->created_at }}
                            </td>
                            <td id="borderaux_reinsurance_broker">
                                {{ $borderoux->reinsurance_broker }}
                            </td>
                            <td id="borderaux_cedente">
                                {{ $borderoux->cia_sure }}
                            </td>
                            <td id="borderaux_insured">
                                {{ $borderoux->insured }}
                            </td>
                            <td id="borderaux_type_contract">
                                {{ $borderoux->type_contract }}
                            </td>
                            <td id="borderaux_coverage">
                                {{ $borderoux->coverage }}
                            </td>
                            <td id="sector">
                                {{ $borderoux->sector }}
                            </td>
                            <td id="borderaux_regime">
                                {{ $borderoux->regime }}
                            </td>

                            <td>
                                {{ $borderoux->subscription_year }}
                            </td>

                            <td id="borderaux_movements">
                                {{ $borderoux->movements }}
                            </td>


                            <td id="borderaux_executive">
                                Grace Segovia
                            </td>
                            <td id="borderaux_from">
                                {{ $borderoux->from }}
                            </td>
                            <td id="borderaux_until">
                                {{ $borderoux->until }}
                            </td>
                            <td id="borderaux_cover_note">
                                {{ $borderoux->cover_note }}
                            </td>
                            <td id="borderaux_stake">
                                <div>
                                    <span>
                                        {{ strval($borderoux->stake) }}
                                    </span>
                                    <strong>

                                    </strong>
                                </div>
                                <div>

                                </div>
                                <strong> </strong>
                            </td>
                            <td class="borderaux_gross_premium">
                                {{ $borderoux->gross_premium }}
                            </td>
                            <td id="borderaux_tax_deductions">
                                <strong>{{ $borderoux->tax_deductions }} %</strong>
                            </td>
                            <td class="borderaux_reinsurance_premium">
                                {{ $borderoux->reinsurance_premium }}
                            </td>

                            <td id="borderaux_installation">
                                <button
                                    onclick="generateInstalamentTable('{{ $borderoux->id }}' ); getBorderouxId('{{ $borderoux->id }}')"
                                    class="btn btn-info">
                                    Ver detalle
                                </button>
                            </td>
                            <td id="borderaux_commission_percentage">
                                <div>
                                    <span>
                                        {{ $borderoux->commission_percentage }}
                                    </span>
                                    <strong>
                                        %
                                    </strong>
                                </div>

                            </td>
                            <td class="number_formatter">
                                {{ $borderoux->commission_total }}
                            </td>
                            <td class="number_formatter">
                                {{ $borderoux->sum_insurable }}
                            </td>
                            <td class="number_formatter">
                                {{ $borderoux->sum_insured }}
                            </td>
                            <td class="number_formatter">
                                {{ $borderoux->limit_compensation }}
                            </td>
                            <td>
                                <button onclick="openModalEditBorderoux(${borderoux->id})" type="button"
                                    class="btn btn-info">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Factura --}}

    <div style="display: none">
        @include('admin.administrativo.invoices.cobrokeraje_invoice')
        @include('admin.administrativo.invoices.credit_note')
        {{--         @include('admin.administrativo.invoices.debit_note') --}}
    </div>
@endsection
