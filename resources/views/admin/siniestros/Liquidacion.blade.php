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

            const dateString = `Siniestros — Liquidación | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
    @section('page_title')
    Administración | Liquidación
@endsection
    <button>Nuevo ajustador</button>

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
                <div class="form_head">
                    <h3>Nuevo ajustador</h3>
                    {{-- <button>Importar excel</button> --}}
                </div>
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
            </div><!-- content -->

        </div><!-- modal -->
    </div><!-- overlay -->
@endsection
