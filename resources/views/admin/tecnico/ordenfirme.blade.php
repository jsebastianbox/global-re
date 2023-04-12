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

            const dateString = `Técnico — Orden en Firme | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Técnico
@endsection
<table>
    <thead>
        <tr>
            <td>Asegurado</td>
            <td>Reasegurador</td>
            <td>Suscriptor</td>
            <td>% de cobertura</td>
            <td>Ramo</td>
            <td>Observaciones</td>
        </tr>
    </thead>
    <tbody>
        <!-- foreach asegurado -->
        <tr>
            <td><input type="text" name="" id=""></td>
            <td>
                <select name="rasegurador" id="reasegurador">
                    <option value="">seleccionar</option>
                </select>
            </td>
            <td>
                <input type="text" name="" id="">
            </td>
            <td>
                <input type="number" name="" id="">
            </td>
            <td>
                <select name="ramo" id="ramo">
                    <option value="">Seleccionar</option>
                </select>
            </td>
            <td>
                <input type="text" name="" id="">
            </td>
        </tr>
    </tbody>
</table>

@endsection
