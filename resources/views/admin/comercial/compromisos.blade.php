@extends('admin.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/comercial/modify_compromisos.css') }}">
    <script src="{{ asset('js/admin/comercial/compromisos.js') }}" defer></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    {{-- jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>




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

            const dateString = `Comercial — Modificar Compromiso de Cotización | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Compromiso de Cotizacion
@endsection

<script>
    var compromisos = {!! $compromisos !!};
</script>

<div class="table_container">
    <div class="table-responsive">
        <table class="table table-striped table-borderless table-hover " id="compromisos_table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha de Creación</th>
                    <th scope="col">Ramo</th>
                    <th scope="col">País</th>
                    <th scope="col">Asegurado</th>
                    <th scope="col">Validez desde</th>
                    <th scope="col">Validez hasta</th>
                    <th scope="col">&Uacute;ltima Modificación</th>
                    <th scope="col">Encargado</th>
                    <th scope="col">Fase</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                <!--  -->
            </tbody>

            {{-- <caption>
                Captions of the table
            </caption> --}}

        </table>
    </div>
</div>

@endsection
