@extends('admin.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/bases_de_datos/aseguradores.css') }}">
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

            const dateString = `Bases de Datos — Compañía de Seguros | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Compañía de Seguros
@endsection

<button>Nueva compañía de seguros</button>

<!-- modal -->
<div class="modal-overlay" onclick="elements.removeClass('active');">
    <div class="modal">

        <a class="close-modal">
            <svg viewBox="0 0 20 20">
                <path fill="#000000"
                    d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z">
                </path>
            </svg>
        </a><!-- close modal -->

        <div class="modal-content">
            {{-- <h3>Some content here</h3> --}}
            <div id="aseguradores">
                <h1>Nueva compañía de seguros</h1>
                <form action="#" method="post" class="new_entry__form">
                    {{-- <button>Importar desde excel</button> --}}
                    <div class="left_side">
                        <div class="input_group">
                            <label for="country">País</label>
                            <div class="input_group">
                                <label for="registered_name">Aseguradora</label>
                                <select name="registered_name" id="registered_name">
                                    <option value="">Allianz Global Corporate & Specialty Re</option>
                                    <option value="">Liberty Mutual Insurance Company </option>
                                    <option value="">Allied Word Re </option>
                                    <option value="">Austral Resseguradora S.A. </option>
                                    <option value="">Axa Xl Insurance Company Uk Limited</option>
                                </select>
                            </div>
                        </div>
                        <div class="input_group">
                            <label for="registered_name">Aseguradora</label>
                            <select name="registered_name" id="registered_name">
                                <option value="" disabled selected>-- Selecciona una opción --</option>
                                <option value="">Names form DB</option>
                            </select>
                        </div>
                        <div class="input_group">
                            <label for="insurance_name">Contacto</label>
                            <input type="text" name="insurance_name" id="insurance_name">
                        </div>
                        <div class="input_group">
                            <label for="insurance_position">Cargo</label>
                            <input type="text" name="insurance_position" id="insurance_position">
                        </div>
                        <div class="input_group">
                            <label for="insurance_section">Ramo</label>
                            <input type="text" name="insurance_section" id="insurance_section">
                        </div>
                    </div>
                    <div class="right_side">
                        <div class="input_group">
                            <label for="insurance_email">Email</label>
                            <input type="text" name="insurance_email" id="insurance_email">
                        </div>
                        <div class="input_group">
                            <label for="business_line1">Teléfono 1</label>
                            <input type="text" name="business_line1" id="business_line1">
                        </div>
                        <div class="input_group">
                            <label for="business_line2">Teléfono 2</label>
                            <input type="text" name="business_line2" id="business_line2">
                        </div>
                        <div class="input_group">
                            <label for="business_line3">Teléfono 3</label>
                            <input type="text" name="business_line3" id="business_line3">
                        </div>
                    </div>
                    <button>Guardar</button>
                </form>
            </div>
        </div><!-- content -->

    </div><!-- modal -->
</div><!-- overlay -->
@endsection
