@extends('admin.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/administrativo/comparativos.css') }}">
    <script src="{{ asset('js/admin/administrativo/comparativos.js') }}" defer></script>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <h3>@section('tab_title')
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

            const dateString = `Comparativo | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
    @endsection</h3>
    @section('page_title')
    Administración | Comparativo
@endsection

    <div id="contentContainer">
        <div class="input_group">
            <div class="left_side">
                <div class="input--label">
                    <label class="labelForm" for="">Ingresa el asegurado
                        <input class="inputForm" type="text" name="" id="">
                    </label>
                </div>
                <div class="selectContainer">
                    <div class="input--label">
                        <label class="labelForm" for="">Aseguradora
                            <select class="inputForm" name="select">
                                <option value="" selected disabled>Selecciona</option>
                                <option value="value1">AIG</option>
                                <option value="value2">Sweaden</option>
                                <option value="value3">Equinoccial</option>
                            </select>
                        </label>
                    </div>
                    <div class="input--label">
                        <label class="labelForm" for="">Ramo
                            <select class="inputForm" name="select">
                                <option value="" selected disabled>Selecciona</option>
                                <option value="value1">Vida</option>
                                <option value="value2" >Vehiculo</option>
                                <option value="value3">Valor</option>
                            </select>
                        </label>
                    </div>

                </div>
            </div>
            <div class="right_side">
                <div class="input--label">
                    <label class="labelForm" for="">Pais
                        <select class="inputForm" name="select">
                            <option value="" selected disabled>Selecciona</option>
                            <option value="value1">Ecuador</option>
                            <option value="value2" >Colombia</option>
                            <option value="value3">Bolivia</option>
                        </select>
                    </label>
                </div>
                <div class="input--label">
                    <label class="labelForm" for="status">Desde
                        <input class="inputForm" type="date">
                    </label>
                </div>
                <div class="input--label">
                    <label class="labelForm" for="status">Hasta
                        <input class="inputForm" type="date">
                    </label>
                </div>

            </div>
        </div>
        <button id="btnQuemado" class="btnEnviar">Buscar</button>

        <div id="tableQuemada"   class="multipleTableContainer" style="display: none">
            <div class="chartsContainer">
                <h4 id="chartsTitle">2019</h4>
                <table class="comparativosTable">
                    <tr>
                        <th>Pais</th>
                        <th>Primas Totales</th>
                        <th>Comisiones Anuales</th>
                    </tr>
                    <tr>
                        <td>Bolivia</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Costa Rica</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Ecuador</td>
                        <td>1.700.025,71</td>
                        <td>255.680,52</td>
                    </tr>
                    <tr>
                        <td>Colombia</td>
                        <td>1.700.025,71</td>
                        <td>255.680,52</td>
                    </tr>
                    <tr>
                        <td>Ecuador</td>
                        <td>1.700.025,71</td>
                        <td>255.680,52</td>
                    </tr>
                </table>
            </div>
            <div class="chartsContainer">
                <h4 id="chartsTitle">2021</h4>
                <table class="comparativosTable">
                    <tr>
                        <th>Pais</th>
                        <th>Primas Totales</th>
                        <th>Comisiones Anuales</th>
                    </tr>
                    <tr>
                        <td>Bolivia</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Costa Rica</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Ecuador</td>
                        <td>1.700.025,71</td>
                        <td>255.680,52</td>
                    </tr>
                    <tr>
                        <td>Colombia</td>
                        <td>1.700.025,71</td>
                        <td>255.680,52</td>
                    </tr>
                    <tr>
                        <td>Ecuador</td>
                        <td>1.700.025,71</td>
                        <td>255.680,52</td>
                    </tr>
                </table>
            </div>
        </div>

        <div id="tableQuemada2" class="multipleTableContainer" style="display: none">
            <div class="chartsContainer">
                <h4 id="chartsTitle">2022</h4>
                <table class="comparativosTable">
                    <tr>
                        <th>Pais</th>
                        <th>Primas Totales</th>
                        <th>Comisiones Anuales</th>
                    </tr>
                    <tr>
                        <td>Bolivia</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Costa Rica</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Ecuador</td>
                        <td>1.700.025,71</td>
                        <td>255.680,52</td>
                    </tr>
                    <tr>
                        <td>Colombia</td>
                        <td>1.700.025,71</td>
                        <td>255.680,52</td>
                    </tr>
                    <tr>
                        <td>Ecuador</td>
                        <td>1.700.025,71</td>
                        <td>255.680,52</td>
                    </tr>
                </table>
            </div>

            <div class="chartsContainer">
                <h4 class="chartsTitle">2022</h4>
                <table class="comparativosTable">
                    <tr>
                        <th>Pais</th>
                        <th>Primas Totales</th>
                        <th>Comisiones Anuales</th>
                    </tr>
                    <tr>
                        <td>Bolivia</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Costa Rica</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Ecuador</td>
                        <td>1.700.025,71</td>
                        <td>255.680,52</td>
                    </tr>
                    <tr>
                        <td>Colombia</td>
                        <td>1.700.025,71</td>
                        <td>255.680,52</td>
                    </tr>
                    <tr>
                        <td>Ecuador</td>
                        <td>1.700.025,71</td>
                        <td>255.680,52</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
