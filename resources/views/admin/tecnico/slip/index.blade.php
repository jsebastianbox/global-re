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

<style>
    .spinner {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-top-color: #3498db;
        animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }
</style>

<script>
    function fetchFiles(slip) {
        $.ajax({
            url: `api/slips/${slip.id}/files`,
            type: 'GET',
            data: {},
            beforeSend: function() {
                $('#files-container').append('<div id="files-container-spinner" class="spinner"></div>');
            },
            success: function(response) {
                $('#files-container-spinner').remove()
                response.forEach((file) => {
                    $('#files-container').append(`
                    <div style="display:flex;gap: 1rem;">
                    <span> ${file.name} </span>
                    <button type="button" class="btn btn-success btn-xs download-btn" data-file="${file.file}" data-extension="${file.extension}" data-name="${file.name}"> Descargar </button>
                     </div>
                    `)
                })

                $('.download-btn').click(function() {
                    const file = $(this).data('file');
                    const name = $(this).data('name');
                    const extension = $(this).data('extension');
                    downloadFile(file, name, extension);
                });
            },
            error: function() {
                alert('Error al cargar los archivos.');
            }
        });
    }

    function downloadFile(file, name, extension) {
        fetch(`data:application/*;base64,${file}`).then(base64 => base64.blob()).then(blob => {
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `${name}.${extension}`;
            a.click();
            URL.revokeObjectURL(url);
        });
    }

    function closeModal() {
        $('#files-container').empty()
    }

    window.addEventListener("click", function(event) {
        if (event.target === document.getElementById("files-modal")) {
            closeModal()
        }
    });

    async function showPdf(slip) {
        fetch(`api/slips/${slip.id}/pdf`).then(base64 => base64.blob()).then(blob => {
            const pdfBlob = URL.createObjectURL(blob);
            window.open(pdfBlob);
            URL.revokeObjectURL(pdfBlob);
        });
    }
</script>

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
                        <a href="{{ url('/slip_selected', [$slip->id]) }}" class="btn btn-info btn-xs"> Seleccionar Slip
                        </a>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#files-modal" onclick="fetchFiles({{$slip}})">
                            Adjuntos
                        </button>

                        <button type="button" class="btn btn-info btn-xs" onclick="showPdf({{$slip}})"> Ver PDF del slip </button>

                        <!-- Modal -->
                        <div class="modal fade" id="files-modal" tabindex="-1" role="dialog" aria-labelledby="files-modal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="padding: 0.25rem;font-size:large;">
                                        <h5 class="modal-title" id="showFilesBtn" style="margin: 0"> Ver adjuntos </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="display: flex;flex-direction: column;align-items: center;justify-content: center;">
                                        <div id="files-container" style="width: 100%;height: 100%;display: flex;flex-direction: column;align-items: center;justify-content: center; gap:1rem;"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()"> Cerrar </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
