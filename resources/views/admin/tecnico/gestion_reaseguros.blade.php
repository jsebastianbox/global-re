@extends('admin.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/tecnico/gestion_reaseguros.css') }}">
<script src="{{ asset('js/admin/tecnico/gestion_reaseguros.js') }}" defer></script>


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

            const dateString = `Técnico — Gestión de Reaseguros | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Técnico
@endsection

<div id="contentContainer">
    <div class="chartsContainer">
        <h4 id="chartsTitle">Gestiona facilmente</h4>

        <div id="myChartContainer">
            <hr class="styleHr">
            <div class="input--label">
                <label class="labelForm" for="">
                    Asegurado
                    <input class="inputForm" type="text" name="insurer" id="insurer">
                </label>
            </div>
            <div class="input--label">
                <label class="labelForm" for="">
                    Reasegurador
                    <input class="inputForm" type="text" name="" id="">
                </label>
            </div>
            <div class="input--label">
                <label class="labelForm" for="">
                    Suscriptor
                    <input class="inputForm" type="text" name="" id="">
                </label>
            </div>
            <div class="input--label">
                <label class="labelForm" for="">
                    % de cobertura
                    <input class="inputForm" type="text" name="" id="">
                </label>
            </div>
            <div class="input--label">
                <label class="labelForm" for="">
                    Ramo
                    <input class="inputForm" type="text" name="" id="">
                </label>
            </div>
            <div class="input--label">
                <label class="labelForm" for="">
                    Observaciones
                    <input class="inputForm" type="text" name="" id="">
                </label>
            </div>
            <div class="btnContainer">
                <button class="btnEnviar">
                    Enviar
                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-left: 3px" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                      </svg>
                </button>
            </div>
        </div>

    </div>
    {{-- Descomenta para agregar otra seccion aqui --}}
    {{-- <div class="detailChartContainer">
        <h4 class="detailChartTitle">Titulo nueva seccion</h4>
        <div>
        </div>
    </div> --}}
</div>


@endsection
