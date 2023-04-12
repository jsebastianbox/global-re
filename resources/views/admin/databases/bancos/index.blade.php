@extends('admin.layout')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
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

            const dateString = `Bases de Datos — Bancos | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
Bases de Datos | Bancos
@endsection

<script>
    var data = {!! $banks !!};
</script>

<div class="card text-left">

    <div class="card-header">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('bancos.index') }}"><i class="fa-solid fa-house"></i> Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('bancos.create') }}"> <i class="fa-solid fa-plus"></i> Crear</a>
            </li>

        </ul>
    </div>
    <div class="card-body">

        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Banco</th>
                    <th scope="col">Fecha Creación</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($banks as $bank)
                    <tr>
                        <td >
                            {{$bank->name}}
                        </td >
                        <td >
                            {{$bank->created_at}}
                        </td >
                    </tr>
                @endforeach --}}
            </tbody>
        </table>



    </div>

</div>


<script src="{{ asset('js/admin/database/banks.js') }}" defer></script>

@endsection
