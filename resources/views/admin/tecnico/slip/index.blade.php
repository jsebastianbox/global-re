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

        const dateString =
            `Producción Facultativo — Slips de Cotización | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
        document.getElementById('date').textContent = dateString;
    }
    setInterval(updateClock, 1000);
</script>
@endsection
@section('page_title')
Administración | Técnico
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
<script>
    let timerInterval;
    Swal.fire({
        icon: 'success',
        title: '¡Realizado!',
        text: '{{ session('
        success ') }}',
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: {
            color: '#6610f2',
            height: '5px',
            borderRadius: '5px',
            opacity: '0.7'
        },
        didOpen: () => {
            const b = Swal.getHtmlContainer().querySelector('.swal2-progress-bar');
            timerInterval = setInterval(() => {
                const remainingTime = Swal.getTimerLeft();
                const progressBar = Swal.getHtmlContainer().querySelector('.swal2-progress-bar');
                const percent = (remainingTime / 2000) * 100;
                progressBar.style.width = percent + '%';
            }, 10)
        },
        willClose: () => {
            clearInterval(timerInterval);
        }
    });
</script>
@endif

<div id="slip" class="card" style="padding-inline: 2.5rem; padding-block: 4rem">
    <div class="card-body">
        <div class="card-title" style="font-size: 2.25rem; font-weight: 600; padding-block: 1.75rem">
            Selecciona un slip para trabajarlo
        </div>
        <table class="table table-striped table-bordered">
            <caption>Recuerda que solo se pueden visualizar los slips en la fase de Departamento Técnico</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Asegurador</th>
                    <th>Tipo de cobertura</th>
                    <th>Fase</th>
                    <th>Última actualización</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody style="overflow-y: auto; max-height: 700px;">
                @foreach ($slipsUser as $key => $slip)
                <tr>
                    <td style="text-align: center">{{ $key +1 }}</td>
                    <td style="text-align: center">{{ $slip->insurer }}</td>
                    <td style="text-align: center">{{ $slip->type->name }}</td>
                    <td style="text-align: center">{{ $slip_statuses->find($slip->slip_status_id)->slip_status }}
                    </td>
                    <td style="text-align: center">{{ $slip->updated_at }}</td>
                    <td style="text-align: center">
                        <a href="{{ url('/slip_selected', [$slip->id]) }}" class="btn btn-info btn-xs" style="margin-right:16px;"> Seleccionar Slip
                        </a>

                        <script>
                            function test(msg) {
                                console.log(msg)
                            }
                        </script>
                        <button onclick="test('dsaf')">Adjuntos</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
