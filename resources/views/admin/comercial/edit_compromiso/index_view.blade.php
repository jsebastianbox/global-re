@extends('admin.layout')

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
                `Comercial — Pendientes | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Comercial | Pendientes
@endsection

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            let timerInterval;
            Swal.fire({
                icon: 'success',
                title: '¡Realizado!',
                text: '{{ session('success') }}',
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
        integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.min.js"
        integrity="sha512-7rusk8kGPFynZWu26OKbTeI+QPoYchtxsmPeBqkHIEXJxeun4yJ4ISYe7C6sz9wdxeE1Gk3VxsIWgCZTc+vX3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
        integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">

    <div class="card p-5" style="height: 99%; overflow-y: scroll">
        <table class="table table-striped table-hover table-responsive-md" id="compromisos_list">

            <caption>Compromisos Pendientes</caption>

            <thead>
                <th scope="col">Fecha</th>
                <th scope="col">País</th>
                <th scope="col">Asegurado</th>
                <th scope="col">Cedente</th>
                <th scope="col">Tipo de cobertura</th>
                <th scope="col">Técnico asignado</th>
                <th scope="col">Fase</th>
                <th scope="col">Acción</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script>
        const users = {!! $users !!};
        const countries = {!! $countries !!};
        const slip_statuses = {!! $slip_statuses !!};
        const type_coverages = {!! $type_coverage !!};

        $(document).ready(function() {
            $('#compromisos_list').DataTable({
                processing: true,
                serverSide: false,
                ajax: {
                    url: `${window.location.origin}/api/slips?slip_status_id=2`,
                },
                columns: [{
                        data: 'updated_at',
                        name: 'updated_at',
                        defaultContent: "N/A",
                        render: function(data, type, row) {
                            let formattedDate = data.split("T")[0];
                            return formattedDate;
                        }
                    },
                    {
                        data: 'country_id',
                        name: 'country_id',
                        defaultContent: "N/A",
                        render: function(data, type, row) {
                            let countryName = countries[data - 1].name
                            return countryName;
                        }
                    },
                    {
                        data: 'insurer',
                        name: 'insurer',
                        defaultContent: "N/A",
                    },
                    {
                        data: 'assignor',
                        name: 'assignor',
                        defaultContent: "N/A",
                    },
                    {
                        data: 'type_coverage',
                        name: 'type_coverage',
                        defaultContent: "N/A",
                        render: function(data, type, row) {
                            let coverage = type_coverages[data - 1].name;
                            return coverage;
                        }
                    },
                    {
                        data: 'user_id',
                        name: 'user_id',
                        defaultContent: "N/A",
                        render: function(data, type, row) {
                            return users[data - 1].name + ' ' + users[data - 1].surname;
                        }
                    },
                    {
                        data: 'slip_status_id',
                        name: 'slip_status_id',
                        defaultContent: "N/A",
                        render: function(data, type, row) {
                            return slip_statuses[data - 1].slip_status;
                        }
                    },
                    {
                        data: 'id',
                        render: function(data, type, row) {
                            let coverage = type_coverages[row.type_coverage - 1].branch_id
                            let button = ``;

                            destroyForm = `
                            <form action="/admin/comercial/destroy/${data}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-danger btn-xs mb-1">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true">Borrar</span>
                                </button>
                            </form>
                            `;

                            switch (coverage) {
                                case '1':
                                    button =`<a class="btn btn-primary btn-xs mb-1" href="/admin/comercial/edit_compromiso/vida/${data}">Editar</a>`;
                                    button += destroyForm;
                                    break;
                                case '2':
                                    button =`<a class="btn btn-primary btn-xs mb-1" href="/admin/comercial/edit_compromiso/activos/${data}">Editar</a>`;
                                    button += destroyForm;
                                    break;
                                case '3':
                                    button =`<a class="btn btn-primary btn-xs mb-1" href="/admin/comercial/edit_compromiso/vehiculos/${data}">Editar</a>`;
                                    button += destroyForm;
                                    break;
                                case '4':
                                    button =`<a class="btn btn-primary btn-xs mb-1" href="/admin/comercial/edit_compromiso/tecnico/${data}">Editar</a>`;
                                    button += destroyForm;
                                    break;
                                case '5':
                                    button =`<a class="btn btn-primary btn-xs mb-1" href="/admin/comercial/edit_compromiso/energia/${data}">Editar</a>`;
                                    button += destroyForm;
                                    break;
                                case '6':
                                    button =`<a class="btn btn-primary btn-xs mb-1" href="/admin/comercial/edit_compromiso/maritimo/${data}">Editar</a>`;
                                    button += destroyForm;
                                    break;
                                case '7':
                                    button =`<a class="btn btn-primary btn-xs mb-1" href="/admin/comercial/edit_compromiso/aviacion/${data}">Editar</a>`;
                                    button += destroyForm;
                                    break;
                                case '8':
                                    button =`<a class="btn btn-primary btn-xs mb-1" href="/admin/comercial/edit_compromiso/responsabilidad/${data}">Editar</a>`;
                                    button += destroyForm;
                                    break;
                                case '9':
                                    button =`<a class="btn btn-primary btn-xs mb-1" href="/admin/comercial/edit_compromiso/riesgos/${data}">Editar</a>`;
                                    button += destroyForm;
                                    break;
                                case '10':
                                    button =`<a class="btn btn-primary btn-xs mb-1" href="/admin/comercial/edit_compromiso/fianzas/${data}">Editar</a>`;
                                    button += destroyForm;
                                    break;
                                default:
                                    break;
                            }
                            return button;
                        }
                    },
                    
                ],
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
                }
            });
        });
    </script>
@endsection
