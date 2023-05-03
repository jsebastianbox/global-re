@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/tecnico/produccion_facultativo/slip_de_cotizacion.css') }}">
    <script defer src="{{ asset('js/admin/tecnico/produccion_facultativo/slip_de_cotizacion.js') }}"></script>
    <script defer src="{{ asset('js/admin/tecnico/produccion_facultativo/security_table.js') }}"></script>

    @include('include.datatable')

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

            const dateString = `Producción Facultativo — Slips de Cotización | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
    @section('page_title')
    Administración | Técnico
@endsection

<div id="progressContainer" class="flexRowWrapContainer" style="display:flex;justify-content:center;margin-top:2rem">

    <span class="progress1 active"></span>
    <span class="progress2"></span>
    <span class="progress3"></span>
    <span class="progress4"></span>
    <span class="progress5"></span>
    <span class="progress6"></span>
    <span class="progress7"></span>
</div>

<div class="flexColumnCenterContainer">
    <ul id="errors"></ul>
</div>


@switch($slip->type_coverage)
    @case('1')
    @case('2')

    @case('3')
    @case('4')
        @include('admin.tecnico.slip.type_slip.sliplife')
    @break

    @case('5')
    @case('6')
    @case('7')
    @case('8')
        @include('admin.tecnico.slip.type_slip.slipfire')
    @break

    @case('9')
    @case('10')
        @include('admin.tecnico.slip.type_slip.slipLivianos')
    @break;
    @case('11')
    @case('12')

    @case('13')
    @case('14')

    @case('15')
    @case('16')

    @case('17')
        @include('admin.tecnico.slip.type_slip.slipEquipoElectronico')
    @break

    @case('18')
    @case('19')

    @case('20')
        @include('admin.tecnico.slip.type_slip.slipPetrolero')
    @break

    @case('21')
    @case('22')
        @include('admin.tecnico.slip.type_slip.slipcasco')
    @break

    @case('23')
        @include('admin.tecnico.slip.type_slip.slipproteccion')
    @break

    @case('24')
    @case('25')

    @case('26')
        @include('admin.tecnico.slip.type_slip.slipPortuaria')
    @break

    @case('27')
    @case('28')

    @case('29')
    @case('30')

    @case('31')
        @include('admin.tecnico.slip.type_slip.slipInterno')
    @break

    @case('32')
    @case('33')
        @include('admin.tecnico.slip.type_slip.slipCascoAereo')
    @break

    @case('34')
        @include('admin.tecnico.slip.type_slip.slipLicencia')
    @break

    @case('35')
    @case('36')

    @case('37')
        @include('admin.tecnico.slip.type_slip.slipAviacion3') {{-- SLIP PENDIENTE --}}
    @break

    @case('38')
    @case('39')

    @case('40')
    @case('41')

    @case('42')
    @case('43')
        @include('admin.tecnico.slip.type_slip.slipResponsabilidadCivil')
    @break
    
    @case('44')
    @case('45')
        @include('admin.tecnico.slip.type_slip.slipBankers')
    @break
    
    @case('46')
    
        @include('admin.tecnico.slip.type_slip.slipFidelidad')
    @break
    
    @case('47')
    @case('48')
    @case('49')
    @case('50')
    @case('51')
    @case('52')
        @include('admin.tecnico.slip.type_slip.slipFianzas')
    @break

    @default
@endswitch

<script defer src="{{ asset('js/admin/tecnico/produccion_facultativo/indexSlips.js') }}"></script>

@endsection
