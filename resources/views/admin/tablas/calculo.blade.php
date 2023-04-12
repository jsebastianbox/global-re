    <!-- Script para la funcionalidad del formulario -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js" defer></script> --}}
    <script src="https://www.jqueryscript.net/demo/multi-step-modal-wizard/dist/js/MultiStep.min.js" defer></script>
    <script src="{{ asset('js/admin/tablas/calculo.js') }}" defer></script>
    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Custom script --}}
    <link rel="stylesheet" href="{{ asset('css/admin/tablas/calculos.css') }}">



    <!-- HEADER -->
    {{-- <div id="header_wrap" class="outer">
        <header class="inner">
            <h1 id="project_title"><a href="#">Multi Step Form Wizard</a></h1>
        </header>
    </div>
    <div class="jquery-script-ads" style="margin:30px auto" align="center"></div> --}}
    <!-- MAIN CONTENT -->
    {{-- <div id="main_content_wrap" class="outer">
        <section id="main_content" class="inner">
            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#submitModal">Abrir modal de
                cálculos</button>
        </section>
    </div> --}}
    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#submitModal">Abrir modal de
        cálculos</button>
    <div id="submitModal" class="multi-step modal">
    </div>
