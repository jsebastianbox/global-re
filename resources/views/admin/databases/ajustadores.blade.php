@extends('admin.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/bases_de_datos/ajustadores.css') }}">
    <script src="{{ asset('js/admin/ajustadores.js') }}" defer></script>

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

            const dateString = `Bases de Datos — Ajustadores | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Ajustadores
@endsection

<div class="">
    <form action="" class="new_entry__form">
        <div class="left_side">
            <div class="input_group">
                <label for="country">País</label>
                <input type="text" id="country" name="country">
            </div>
            <div class="input_group">
                <label for="company">Empresa</label>
                <input type="text" name="company" id="">
            </div>
            <div class="input_group">
                <label for="contact">Contacto</label>
                <input type="text" name="contact" id="contact">
            </div>
            <div class="input_group">
                <label for="position">Cargo</label>
                <input type="text" id="position" name="position">
            </div>
        </div>
        <div class="right_side">
            <div class="input_group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="input_group">
                <label for="phone">Teléfono</label>
                <input type="tel" name="phone" id="phone">
            </div>
            <div class="input_group">
                <label for="reference">Referencia</label>
                <select name="reference" id="reference">
                    <option value="">Ajustador</option>
                    <option value="">Liquidador</option>
                </select>
            </div>
        </div>
        <button>Guardar</button>
    </form>
</div>
@endsection
