<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title')</title>
    @section('page_title')
        Global RE | Administración
    @endsection

    <link rel="stylesheet" href="{{ asset('css/admin/layout.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}">
    {{-- Chart Js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.1.1/dist/chart.min.js"></script>

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/admin/layout.js') }}" defer></script>

    {{-- david --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <div class="grid">
        <header class="header">
            {{-- <i class="fas fa-bars header__menu"></i> --}}
            <div class="header__search">
                <div class="content__title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-house-door" viewBox="0 0 16 16">
                        <path
                            d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                    </svg>
                    @yield('tab_title')
                </div>
            </div>
            <ul class="dropdown__list">
                <li class="dropdown__list-item" onclick="document.getElementById('logout-form').submit();"
                    style="display: none">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"
                        style="color:inherit">
                        <span class="dropdown__icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="dropdown__title">
                            Salir
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </span>
                    </a>
                </li>
            </ul>
        </header>

        <aside class="sidenav">
            <div class="sidenav__brand">
                <i class="fas fa-feather-alt sidenav__brand-icon"></i>
                <a class="sidenav__brand-link" href="#"><span class="text-light">Global</span>RE</a>
                {{-- <i class="fas fa-times sidenav__brand-close"></i> --}}
            </div>
            <div class="sidenav__profile">
                <div class="sidenav__profile-avatar"></div>
                <div class="sidenav__profile-title text-light">{{ $user->name . ' ' . $user->surname }}</div>
            </div>
            <div class="row row--align-v-center row--align-h-center">
                <ul class="navList">
                    <li id="vencimientos" onclick="location.href='{{ route('dashboard') }}'">
                        <div class="navList__subheading row row--align-v-center">
                            <span class="navList__subheading-icon"></span>
                            <span class="navList__subheading-title">Dashboard</span>
                        </div>
                    </li>
                    <li class="navList__heading">General</li>
                    <li>
                        <div class="navList__subheading row row--align-v-center">
                            <span class="navList__subheading-icon"></span>
                            <span class="navList__subheading-title">Administrativo</span>
                        </div>
                        <ul class="subList subList--hidden">
                            <li class="subList__item" onclick="location.href='{{ route('comparativo') }}'">Comparativos
                            </li>
                            <li class="subList__item" onclick="location.href='{{ route('cotizaciones_en_curso') }}'">
                                Cotizaciones en curso </li>
                            <li class="subList__item" onclick="location.href='{{ route('produccion') }}'">Produccion
                            </li>
                            <li class="subList__item" onclick="location.href='{{ route('sercop') }}'">Sercop</li>
                            {{-- <li class="subList__item" onclick="location.href='{{ route('administrativo.usuarios') }}'">Usuarios</li> --}}
                            <li class="subList__item" onclick="location.href='{{ route('user.index') }}'">Usuarios</li>
                        </ul>
                    </li>
                    <li>
                        <div class="navList__subheading row row--align-v-center">
                            <span class="navList__subheading-icon"></span>
                            <span class="navList__subheading-title">Bases de datos</span>
                        </div>
                        <ul class="subList subList--hidden">
                            <li class="subList__item" onclick="location.href='{{ route('agentes.index') }}'">
                                Agentes de Suscripción</li>
                            <li class="subList__item" onclick="location.href='{{ route('adjuster.index') }}'">
                                Ajustadores
                                de siniestros</li>
                            <li class="subList__item" onclick="location.href='{{ route('broker_reasegurador') }}'">
                                Brokers</li>
                            <li class="subList__item" onclick="location.href='{{ route('bancos.index') }}'">
                                Bancos</li>
                            <li class="subList__item" onclick="location.href='{{ route('clientes_directos.index') }}'">
                                Clientes Directos</li>
                            <li class="subList__item" onclick="location.href='{{ route('insurance.index') }}'">
                                Compañías
                                de
                                seguros</li>
                            <li class="subList__item" onclick="location.href='{{ route('lloyds.index') }}'">
                                Lloyds</li>
                            <li class="subList__item" onclick="location.href='{{ url('admin/database/reinsurers') }}'">
                                Reaseguradores</li>
                        </ul>
                    </li>

                    <li class="navList__heading">Operaciones</li>
                    <li>
                        <div class="navList__subheading row row--align-v-center">
                            <span class="navList__subheading-icon"></span>
                            <span class="navList__subheading-title">Comercial</span>
                        </div>
                        <ul class="subList subList--hidden">
                            <li class="subList__item" onclick="location.href='{{ route('compromiso') }}'">
                                Compromiso de cotización</li>
                            <li class="subList__item"
                                onclick="location.href='{{ route('getCompromisos') }}'">
                                Modificar cotizaciones</li>
                            {{-- <li class="subList__item" onclick="location.href='{{ route('requerimiento') }}'">
                                Requerimiento de cotización</li> --}}
                        </ul>
                    </li>
                    <li>
                        <div class="navList__subheading row row--align-v-center">
                            <span class="navList__subheading-icon"></span>
                            <span class="navList__subheading-title">Técnico</span>
                        </div>
                        <ul class="subList subList--hidden">
                            <li class="subList__item">
                                <div class="navList__subheading row row--align-v-center">
                                    <span class="navList__subheading-icon"></span>
                                    <span class="navList__subheading-title">Producción Facultativo</span>
                                </div>
                                <ul class="subList subList--hidden">
                                    <li class="subList__item" onclick="location.href='{{ route('slip.index') }}'">
                                        Slip de cotización </li>
                                    {{-- <li class="subList__item"
                                        onclick="location.href='{{ route('management.index') }}'">
                                        Gestión de reaseguros</li> --}}
                                    {{-- <li class="subList__item" onclick="location.href='{{ route('gestion') }}'">
                                        Cálculos de primas y deducciones </li> --}}
                                    {{-- <li class="subList__item"
                                        onclick="location.href='{{ route('tecnico.produccion_facultativo.emision') }}'">
                                        Emisión </li> --}}
                                </ul>
                            </li>
                            <li class="subList__item">
                                <div class="navList__subheading row row--align-v-center">
                                    <span class="navList__subheading-icon"></span>
                                    <span class="navList__subheading-title">Produccion contratos automáticos</span>
                                </div>
                                <ul class="subList subList--hidden">
                                    <li class="subList__item" onclick="location.href='{{ route('compromiso') }}'">
                                        Perfiles de cartera </li>
                                    <li class="subList__item" onclick="location.href='{{ route('requerimiento') }}'">
                                        Proporcionales </li>
                                    <li class="subList__item" onclick="location.href='{{ route('requerimiento') }}'">
                                        No Proporcionales </li>
                                    <li class="subList__item" onclick="location.href='{{ route('requerimiento') }}'">
                                        Catastróficos </li>
                                </ul>
                            </li>
                            <li class="subList__item">
                                <div class="navList__subheading row row--align-v-center">
                                    <span class="navList__subheading-icon"></span>
                                    <span class="navList__subheading-title">Cobrokerajes </span>
                                </div>
                                <ul class="subList subList--hidden">
                                    <li class="subList__item"
                                        onclick="location.href='{{ route('tecnico.cobrokerajes.nuevo') }}'">
                                        Nuevo Ingreso</li>
                                    <li class="subList__item"
                                        onclick="location.href='{{ route('tecnico.cobrokerajes.borderoux') }}'">
                                        Facturación </li>
                                    <li class="subList__item"
                                        onclick="location.href='{{ route('tecnico.cobrokerajes.reporteria') }}'">
                                        Reportería </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="navList__heading">Servicio al cliente</li>
                    <li>
                        <div class="navList__subheading row row--align-v-center">
                            <span class="navList__subheading-icon"></span>
                            <span class="navList__subheading-title">Siniestros</span>
                        </div>
                        <ul class="subList subList--hidden">
                            <li class="subList__item" onclick="location.href='{{ route('apertura') }}'">Apertura</li>
                            <li class="subList__item" onclick="location.href='{{ route('liquidacion') }}'">Liquidación</li>
                            <li class="subList__item" onclick="location.href='{{ route('pago') }}'">Pago</li>
                            <li class="subList__item" onclick="location.href='{{ route('bordero') }}'">Borderó</li>
                        </ul>
                    </li>
                    <li>
                        <div class="navList__subheading row row--align-v-center">
                            <span class="navList__subheading-icon"></span>
                            <span class="navList__subheading-title">Cartera <span
                                    style="text-transform: lowercase">y</span> cobranzas</span>
                        </div>
                        <ul class="subList subList--hidden">
                            <li class="subList__item"
                                onclick="location.href='{{ route('borderaux.cartera_management') }}'">
                                Co-Brokerajes</li>
                            <li class="subList__item">Producción</li>
                            <li class="subList__item">Siniestros</li>
                        </ul>
                    </li>
                    <li>
                        <div class="navList__subheading row row--align-v-center">
                            <span class="navList__subheading-icon"></span>
                            <span class="navList__subheading-title">Contratos automáticos</span>
                        </div>
                        <ul class="subList subList--hidden">
                            <li class="subList__item">Perfiles de cartera</li>
                            <li class="subList__item">Proporcionales</li>
                            <li class="subList__item">No Proporcionales</li>
                            <li class="subList__item">Catastróficos</li>
                        </ul>
                    </li>

                    <li class="navList__heading">Biblioteca</li>
                    {{-- <li class="navList__biblioteca" onclick="location.href='{{ route('biblioteca') }}'">
                        Biblioteca
                    </li> --}}
                    <li class="navList__biblioteca" onclick="location.href='{{ route('clausulas.index') }}'">
                        Biblioteca
                    </li>
                    <li class="navList__heading">Reportes</li>
                    <li>
                        <div class="navList__subheading row row--align-v-center">
                            <span class="navList__subheading-icon"></span>
                            <span class="navList__subheading-title">Co-Brokerajes</span>
                        </div>
                        <ul class="subList subList--hidden">
                            <li class="subList__item" onclick="location.href='{{ route('reportes.cobrokeraje') }}'">
                                Generar Co-Brokeraje</li>
                        </ul>
                    </li>
                    <li id="produccion">
                        <div class="navList__subheading row row--align-v-center">
                            <span class="navList__subheading-icon"></span>
                            <span class="navList__subheading-title"
                                onclick="location.href='{{ route('produccion.estados') }}'">Producción</span>
                        </div>
                        {{-- <ul class="subList subList--hidden">
                            <li class="subList__item" onclick="location.href='{{ route('produccion.estados') }}'">Estados de cuenta</li>
                        </ul> --}}
                    </li>
                    <li>
                        <div class="navList__subheading row row--align-v-center">
                            <span class="navList__subheading-icon"></span>
                            <span class="navList__subheading-title">Siniestros</span>
                        </div>
                        <ul class="subList subList--hidden">
                            <li class="subList__item" onclick="location.href=`{{ route('estados.cuenta') }}`">Estados
                                de cuenta</li>
                        </ul>
                    </li>
                    <li>
                        <div class="navList__subheading row row--align-v-center">
                            <span class="navList__subheading-icon"></span>
                            <span class="navList__subheading-title">Gráficos dinámicos</span>
                        </div>
                        <ul class="subList subList--hidden">
                            <li class="subList__item" onclick="location.href='{{ route('mapcollection') }}'">Mapa de
                                colocación</li>
                        </ul>
                    </li>
                    <li id="cotizaciones">
                        <div class="navList__subheading row row--align-v-center">
                            <span class="navList__subheading-icon"></span>
                            <span class="navList__subheading-title">Cotizaciones</span>
                        </div>
                    </li>
                    <li id="vencimientos">
                        <div class="navList__subheading row row--align-v-center">
                            <span class="navList__subheading-icon"></span>
                            <span class="navList__subheading-title">Vencimientos</span>
                        </div>
                    </li>
                    <li id="salir" onclick="document.getElementById('logout-form').submit();">
                        <div class="navList__subheading row row--align-v-center">
                            <span class="navList__subheading-icon"></span>
                            <span class="navList__subheading-title">Cerrar sesión</span>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>

        <main class="main">
            <script>
                window.globalData = {};

                const months = [
                    'enero',
                    'febrero',
                    'marzo',
                    'abril',
                    'mayo',
                    'junio',
                    'julio',
                    'agosto',
                    'septiembre',
                    'octubre',
                    'noviembre',
                    'diciembre',
                ];

                const year = new Date().getFullYear();
                const month = new Date().getMonth();
                const mes = getMonthName(month);
                const dia = new Date().getDate();
                const todayDate = `${dia} de ${mes} del ${year}`;

                function getMonthName(month) {
                    return months[month];
                }

                function getDay() {
                    return dia;
                }

                function getYear() {
                    return year;
                }
                function getCurrentDate() {
                    return todayDate;
                }
            </script>
            @yield('content')

        </main>

        <div id="modalInstalamentos" style="display: none">

            <div class="modal_content">

                <h2 class="">Instalamentos</h2>

                @include('admin.tecnico.cobrokerajes.tabla-instalamentos')

                <div class="input_group" style="width: 100%;">
                    <button type="button" id="saveModalInstalamentos" class="btn btn-info">Guardar</button>
                    <button type="button" id="closeModalInstalamentos" class="btn btn-info">Cerrar</button>
                </div>
            </div>


        </div>
        <div id="modal_borderoux" style="display: none">

            <div class="modal_content_borderoux">

                <form action="#">
                    <div class="form-group">
                        <label for="username">Broker reaseguros:</label>
                        <input class="form-control" name="username" id="username" type="text">
                    </div>
                    <div class="form-group">
                        <label for="email">Cía. Seguros:</label>
                        <input class="form-control" name="email" id="email" type="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Asegurado:</label>
                        <input class="form-control" name="password" id="password" type="password">
                    </div>
                    <div class="form-group">
                        <label for="type_contract">Tipo de contrato:</label>
                        <input class="form-control" name="type_contract" id="type_contract" type="text">
                    </div>
                    <div class="form-group">
                        <label for="coverage">Cobertura:</label>
                        <input class="form-control" name="coverage" id="coverage" type="password">
                    </div>
                    <div class="form-group">
                        <label for="sector">Sector:</label>
                        <input class="form-control" name="sector" id="sector" type="password">
                    </div>
                    <div class="form-group">
                        <label for="regime">Régimen:</label>
                        <input class="form-control" name="regime" id="regime" type="password">
                    </div>
                    <input type="submit" class="btn" value="submit">
                </form>

            </div>


        </div>


        <footer class="footer">
            <p><span class="footer__copyright">Powered by Amparabox &copy; <?php echo date('Y'); ?></span> Todos los
                derechos reservados.</p>
        </footer>
    </div>

</body>

</html>
