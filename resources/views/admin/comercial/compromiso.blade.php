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
                `Comercial — Nuevo Compromiso de Cotización | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
    <script>
        let timerInterval;
        Swal.fire({
            icon: 'success',
            title: '¡Realizado!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3700,
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

{{-- TODO: izquierda, ingresar informacion. Derecha, ver quien esta trabajando en --}}

<div id="contentContainer">
    <div class="grid_elements">
        <div class="left-side">
            @include('admin.comercial.compromiso_selectors')
        </div>

        <div class="right-side">
            <h4 id="chartsTitle">En proceso</h4>

            <div class="table_container">
                @include('admin.comercial.process_table')
            </div>
        </div>

        <link rel="stylesheet" href="{{ asset('css/admin/comercial/compromisos.css') }}">
        <script src="{{ asset('js/admin/comercial/compromiso.js') }}" defer></script>


        {{-- TODO: bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        {{-- david --}}

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="{{ asset('js/admin/comercial/ajax.js') }}" defer></script>

        {{-- enddavid --}}

        <div class="bottom">
            @include('admin.comercial.forms')
        </div>
    </div>
</div>

{{-- TODO: if edit compromiso mostrar lista de compromisos, estado y editar con lo que viene de la bdd --}}
<div class="two-sides" id="edit_compromiso" style="display: none">
    <div class="left_side">
        <div class="selectContainer">
            <div class="input--label">

                <label class="labelForm" for="country">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                        <path
                            d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                    </svg>
                    Fecha
                    <input class="inputForm" type="text" id="country" name="country" disabled
                        value="{{ date('Y-M-d | H:i') }}">
                </label>
            </div>
        </div>

        <div class="selectContainer">
            <div class="input--label">

                <label class="labelForm" for="country">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-card-checklist" viewBox="0 0 16 16">
                        <path
                            d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                        <path
                            d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                    </svg>
                    Asegurado
                    <input class="inputForm" type="text" id="country" name="country">
                </label>
            </div>
        </div>

        <div class="selectContainer">
            <div class="input--label">

                <label class="labelForm" for="country">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-bezier2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 2.5A1.5 1.5 0 0 1 2.5 1h1A1.5 1.5 0 0 1 5 2.5h4.134a1 1 0 1 1 0 1h-2.01c.18.18.34.381.484.605.638.992.892 2.354.892 3.895 0 1.993.257 3.092.713 3.7.356.476.895.721 1.787.784A1.5 1.5 0 0 1 12.5 11h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5H6.866a1 1 0 1 1 0-1h1.711a2.839 2.839 0 0 1-.165-.2C7.743 11.407 7.5 10.007 7.5 8c0-1.46-.246-2.597-.733-3.355-.39-.605-.952-1-1.767-1.112A1.5 1.5 0 0 1 3.5 5h-1A1.5 1.5 0 0 1 1 3.5v-1zM2.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10 10a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
                    </svg>
                    Ramo
                    <select class="inputForm" name="slips" id="slips" onchange="update()">
                        <option selected disabled value="">Selecciona</option>
                        <option value="s1_">Vida y accidentes personales</option>
                        <option value="s2_">Propiedad activos fijos</option>
                        <option value="s3_">Veh&iacute;culos</option>
                    </select>
                </label>
            </div>
        </div>

        <section class="grid_layout" id="s1_" style="display: none">
            <div class="new_entry__form">
                <label class="labelForm" for="">Cobertura principal
                    <select class="inputForm" name="cobertura_principal" id="cobertura_vida">
                        <option value="" disabled selected>Seleccionar</option>
                        <option value="vi">Vida individual</option>
                        <option value="vc">Vida colectiva</option>
                        <option value="api">Accidentes personales individual</option>
                        <option value="vehiculos">Accidentes personales colectiva</option>
                    </select>
                </label>

                <div class="selectContainer">
                    <div class="input--label">

                        <label class="labelForm" for="">Pa&iacute;s productor
                            <select class="inputForm" name="" id="">
                                <option value="" selected disabled>Seleccionar</option>
                                <option value="">Ecuador</option>
                                <option value="">Colombia</option>
                            </select>
                        </label>
                    </div>
                </div>

                <div class="selectContainer">
                    <div class="input--label">

                        <label class="labelForm" for="">Broker local
                            <select class="inputForm" name="" id="">
                                <option value="" selected disabled>Selecciona</option>
                                <option value="">A</option>
                                <option value="">B</option>
                            </select>
                        </label>
                    </div>
                </div>

                <div class="selectContainer">
                    <div class="input--label">

                        <label class="labelForm" for="">Aseguradora
                            <select class="inputForm" name="" id="">
                                <option value="" selected disabled>Selecciona</option>
                                <option value="">A</option>
                                <option value="">B</option>
                            </select>
                        </label>
                    </div>
                </div>

                <div class="selectContainer">
                    <div class="input--label">

                        <label class="labelForm" for="">Actividad
                            <input class="inputForm" type="text" name="activity" id="activity">
                        </label>
                    </div>
                </div>

                <div class="selectContainer">
                    <div class="input--label">

                        <label class="labelForm" for=""></label>
                    </div>
                </div>

                <div class="selectContainer">
                    <div class="input--label">

                        <label class="labelForm" for=""></label>
                    </div>
                </div>

                <div class="selectContainer">
                    <div class="input--label">

                        <label class="labelForm" for=""></label>
                    </div>
                </div>

        </section>
    </div>

    <section class="grid_layout" id="s2_" style="display: none">
        <div class="new_entry__form">
            <h3>Slip Vida</h3>
        </div>
    </section>

    <section class="grid_layout" id="s3_" style="display: none">
        <div class="new_entry__form">
            <h3>Slip Incendio</h3>
        </div>
    </section>
    <button class="new_entry__form--button" id="continue_button" onclick="next_step()">Continuar
        a
        requerimiento</button>
</div>
<script>
    // Calculate the minimum date as 3 months before the current date
    var today = new Date();
    var threeMonthsAgo = new Date(today.getFullYear(), today.getMonth() - 3, today.getDate());
    var minDate = threeMonthsAgo.toISOString().slice(0, 10);

    // Set the minimum date as the value of the 'min' attribute
    let since_dates = document.querySelectorAll('[name="validity_since"]');
    since_dates.forEach((element, index) => {
        element.setAttribute("min", minDate);
    })
</script>
@endsection
