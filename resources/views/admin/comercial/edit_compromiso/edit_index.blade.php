@extends('admin.layout')
@section('page_title')
    Administración | Compromiso de Cotización
@endsection
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

            const dateString =
                `Comercial — Editar Compromiso de Cotización | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection

<div>
    @if (Route::is('edit.activos'))
        @include('admin.comercial.activos_fijos_form')
    @elseif (Route::is('edit.aviacion'))
        @switch($slip->type_coverage)
            @case('32')
            @case('33')
                @include('admin.comercial.aviacion_forms.casco_rc_form')
                @break

            @case('34')
                @include('admin.comercial.aviacion_forms.perdida_licencia_form')
                @break

            @case('35')
            @case('36')
            @case('37')
                @include('admin.comercial.aviacion_forms.rc_form')
                @break

            @default
        @endswitch
    @elseif (Route::is('edit.energia'))
        @include('admin.comercial.energia_form')
    @elseif (Route::is('edit.maritimo'))
        @switch($slip->type_coverage)
            @case('21')
            @case('22')
                @include('admin.comercial.maritimo_forms.casco_responsabilidad_form')
                @break

            @case('23')
                @include('admin.comercial.maritimo_forms.pi_form')
                @break

            @case('24')
            @case('25')
            @case('26')
                @include('admin.comercial.maritimo_forms.rc_forms')
                @break
            
            @case('27')
            @case('28')
            @case('29')
            @case('30')
            @case('31')
                @include('admin.comercial.maritimo_forms.transporte_forms')
                @break

            @default
        @endswitch
    @elseif (Route::is('edit.riesgos'))
        @include('admin.comercial.riesgos_form')
    @elseif (Route::is('edit.responsabilidad'))
        @include('admin.comercial.responsabilidad_form')
    @elseif (Route::is('edit.tecnico'))
        @include('admin.comercial.ramos_tecnicos_form')
    @elseif (Route::is('edit.vehiculos'))
        @include('admin.comercial.vehiculos_form')
    @elseif (Route::is('edit.vida'))
        @include('admin.comercial.vida_forms')
    @endif

</div>
@endsection
