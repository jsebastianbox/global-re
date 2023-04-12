@extends('admin.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/tecnico/produccion_facultativo/emision.css') }}">
    <script src="{{ asset('js/admin/tecnico/produccion_facultativo/emision.js') }}" defer></script>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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

            const dateString = `Producción Facultativo — Emisión | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
    @section('page_title')
    Administración | Técnico
@endsection

    <div id="contentContainer">
        <div class="input_group">
            <div class="left_side">
                <div class="input--label">
                    <label class="labelForm" for="">Asegurado
                        <input class="inputForm" type="text">
                    </label>
                </div>
                <div class="input--label">
                    <label class="labelForm" for="">Ramo
                        <input class="inputForm" type="text">
                    </label>
                </div>
            </div>
            <div class="right_side">
                <div class="input--label">
                    <label class="labelForm" for="">Nota de cobertura
                        <input class="inputForm" type="text">
                    </label>
                </div>
                <div class="input--label">
                    <label class="labelForm" for="">Qué hacer
                        <select class="inputForm" name="select">
                            <option value="" selected disabled>Selecciona</option>
                            <option value="value1">Inclusión</option>
                            <option value="value2" >Exclusión</option>
                            <option value="value3" >Negocio Nuevo</option>
                            <option value="value4" >Aumento de suma asegurada</option>
                            <option value="value5" >Disminución de suma asegurada</option>
                            <option value="value6">Cancelación</option>
                            <option value="value7">Extensión de vigencia</option>
                            <option value="value8">Aclaraciones de texto</option>
                        </select>
                    </label>
                </div>

            </div>
        </div>
        <button id="btnQuemado" class="btnEnviar">Buscar</button>

        <div id="tableQuemada" class="chartsContainer" style="display: none">
            <h4 id="chartsTitle"></h4>
            <table class="cotizadosTable">
                <tr>
                    <th>Ramo</th>
                    <th>R/N</th>
                    <th>No. Nota de Cobertura </th>
                    <th>Endosos</th>
                    <th>Suma Asegurada</th>
                    <th>Prima Neta</th>
                    <th>Desde</th>
                    <th>Hasta</th>
                </tr>
                <tr>
                    <td>VH </td>
                    <td>Original </td>
                    <td>GRB-01-2022/2023</td>
                    <td>0 </td>
                    <td>2.000.000</td>
                    <td>3.000.000 </td>
                    <td>29/6/2022</td>
                    <td>29/6/2023 </td>
                </tr>
                <tr>
                    <td>VH </td>
                    <td>Inclusion </td>
                    <td>GRB-01-2022/2023</td>
                    <td>1 </td>
                    <td>2.000.000</td>
                    <td>3.000.000 </td>
                    <td>29/6/2022</td>
                    <td>29/6/2023 </td>
                </tr>
                <tr>
                    <td>VH </td>
                    <td>Original </td>
                    <td>GRB-01-2022/2023</td>
                    <td>2 </td>
                    <td>2.000.000</td>
                    <td>3.000.000 </td>
                    <td>29/6/2022</td>
                    <td>29/6/2023 </td>
                </tr>
                <tr>
                    <td>VH </td>
                    <td>Exclusión </td>
                    <td>GRB-01-2022/2023</td>
                    <td>3 </td>
                    <td>2.000.000</td>
                    <td>3.000.000 </td>
                    <td>29/6/2022</td>
                    <td>29/6/2023 </td>
                </tr>
            </table>
        </div>

        <div id="tableQuemada2" class="chartsContainer" style="display: none">
            <h4 class="chartsTitle">AIG</h4>
            <table class="cotizadosTable">
                <tr>
                    <th>Ramo</th>
                    <th>Pais</th>
                    <th>Reaseguradores</th>
                    <th>Ejecutivo</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>VH</td>
                    <td>Panamá</td>
                    <td>AB</td>
                    <td>M. Hernandez</td>
                    <td>En curso</td>
                </tr>
                <tr>
                    <td>VIDA</td>
                    <td>Ecuador</td>
                    <td>AD</td>
                    <td>M. Hernandez</td>
                    <td>Orden En firme</td>
                </tr>
                <tr>
                    <td>VH</td>
                    <td>Panamá</td>
                    <td>AB</td>
                    <td>M. Hernandez</td>
                    <td>En curso</td>
                </tr>
                <tr>
                    <td>VIDA</td>
                    <td>Ecuador</td>
                    <td>AB</td>
                    <td>M. Hernandez</td>
                    <td>En curso</td>
                </tr>
                <tr>
                    <td>VH</td>
                    <td>Panamá</td>
                    <td>AB</td>
                    <td>M. Hernandez</td>
                    <td>En curso</td>
                </tr>
                <tr>
                    <td>VH</td>
                    <td>Panamá</td>
                    <td>AB</td>
                    <td>M. Hernandez</td>
                    <td>En curso</td>
                </tr>
            </table>
        </div>

    </div>
@endsection




