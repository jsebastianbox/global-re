@extends('admin.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/administrativo/usuarios.css') }}">
    <script src="{{ asset('js/admin/administrativo/usuarios.js') }}" defer></script>

    {{-- bootstrap 4 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    {{-- DataTables plugin css and js --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css">
    <script defer src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script defer src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script defer src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>

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

            const dateString = `Usuarios | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
    @section('page_title')
    Administración | Usuarios
@endsection

    <div id="contentContainer">
        <div id="addBtnContainer"  class="addUserBtnContainer">
            <button onclick="openCreateUser()" class="btn-success btn m-3">Agregar usuario</button>
        </div>

        <div id="usersTableContainer" class="tableContainer whiteContainer">
            <div id="usersTable" class="tableContainer">
                <h3>Usuarios disponibles</h3>
                <table class="tableStyle" style="margin-top:2rem">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Sexo</th>
                            <th>Country</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody">
                        <tr>
                            <td>
                                <div class="spinner-border" role="status">

                                </div>
                            </td>
                            <td>
                                <div class="spinner-border" role="status">

                                </div>
                            </td>
                            <td>
                                <div class="spinner-border" role="status">

                                </div>
                            </td>
                            <td>
                                <div class="spinner-border" role="status">

                                </div>
                            </td>
                            <td>
                                <div class="spinner-border" role="status">

                                </div>
                            </td>
                            <td>
                                <div class="spinner-border" role="status">

                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="addUserContainer" class="tableContainer" style="display: none">

                <h3>Agrega un usuario</h3>

                <form id="addUserForm" method="post">
                    @csrf
                    <div class="two-sides">
                        <div class="left-side" style="margin: 0 10px">
                            <div class="selectContainer">
                                <label class="labelForm" for="name">
                                    Nombre
                                    <input type="text" name="name" id="name">
                                </label>
                            </div>

                            <div class="selectContainer">
                                <label class="labelForm" for="">Role
                                    <select name="">
                                        <option value="" selected disabled>Selecciona</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Perú">Perú</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                    </select>
                                </label>
                            </div>

                            <div class="selectContainer">
                                <label class="labelForm" for="surname">
                                    Apellido
                                    <input type="text" name="surname" id="surname">
                                </label>
                            </div>
                        </div>
                        <div class="right-side" style="margin: 0 10px">
                            <div class="selectContainer">
                                <label class="labelForm" for="email">
                                    Email
                                    <input type="text" name="email" id="email">
                                </label>
                            </div>
                            <div class="selectContainer">
                                <label class="labelForm" for="password">
                                    Contraseña
                                    <input type="text" name="password" id="password">
                                </label>
                            </div>
                            <div class="selectContainer">
                                <label class="labelForm" for="country">
                                    Country
                                    <input type="text" name="country" id="country">
                                </label>
                            </div>
                            {{-- <div class="selectContainer">
                                <label class="labelForm" for="sex">
                                    Género
                                    <select name="sex" id="sex">
                                        <option value="" selected disabled>Selecciona</option>
                                        <option value="masculino">Masculino</option>
                                        <option value="femenino">Femenino</option>
                                        <option value="otro">Otro</option>
                                </label>
                            </div> --}}

                        </div>
                    </div>

                    <div class="tableContainer">
                        <button onclick="createUser(event)" id="btnPost" class="btnEnviar">Buscar</button>
                    </div>
                </form>

            </div>
        </div>



    </div>

@endsection
