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

            const dateString = `Técnico — Slip de Cotización | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
    @section('page_title')
    Administración | Técnico
@endsection

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <button id="new_slip">Nuevo slip</button>
    <button id="modify_slip">Modificar slip</button>


    <!-- Nuevo slip -->

    <form action="" class="new_entry__form" id="new_form" style="display: none">
        <h3 style="text-align: center; text-transform: capitalize">Slip Cotización</h3>
        <h5 style="text-align: right">Fecha: {{ date('d-M-Y') }}</h5>
        <div class="left_side">
            <div class="input_group">
                <label for="country">Tipo de cobertura</label>
                <input type="text" id="country" name="country" disabled value="{{ date('Y-M-d | H:i') }}">
            </div>
            <div class="input_group">
                <label for="country">País productor</label>
                <select name="" id="">
                    <option value="" selected disabled>Selecciona</option> <!-- TODOS los paises -->
                    <option value="">Ecuador</option>
                    <option value="">Egipto</option>
                    <option value="">ETC</option>
                </select>
            </div>
            <div class="input_group">
                <label for="">Broker local</label>
                <input type="text" name="" id="">
            </div>
        </div>
        <div class="right_side">
            <div class="input_group">
                <label for="company">Cedente</label>
                <input type="text" name="" id="">
            </div>
            <div class="input_group">
                <label for="country">Sector</label>
                <select name="" id="">
                    <option value="" selected disabled>Selecciona</option>
                    <option value="">Público</option>
                    <option value="">Privado</option>
                </select>
            </div>

            <div class="input_group">
                <label for="country">Asegurado</label>
                <input type="text" name="" id="">
            </div>
            <div class="input_group">
                <label for="country">Dirección</label>
                <input type="text" name="" id=""> <!-- Traer de la BDD -->
            </div>
            <div class="input_group">
                <label for="country">Actividad</label>
                <input type="text" name="" id="">
            </div>
            <div class="input_group">
                <label for="country">Vigencia</label>
                <div class="input_group">
                    <div class="left_side">
                        <div class="input_group">
                            <label for="from">Desde</label>
                            <input type="date" name="from" id="from">
                        </div>
                    </div>
                    <div class="right_side">
                        <div class="input_group">
                            <label for="to">Hasta</label>
                            <input type="date" name="to" id="to">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input_group">
                <label for="object">Objeto del seguro</label>
                <table id="object" name="object">
                    <tr>
                        <td>No.</td>
                        <td>Nombre</td>
                        <td>Fecha de nacimiento</td>
                        <td>Edad</td>
                        <td>Límite</td>
                    </tr>
                    <tr>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                    </tr>
                </table>
            </div>
            <div class="input_group">
                <label for="nasegurados">Número Asegurados</label>
                <input type="number" name="nasegurados" id="nasegurados">
            </div>
            <div class="input_group">
                <label for="casegurados">Cúmulo Asegurados</label>
                <input type="number" name="casegurados" id="casegurados">
            </div>
            <div class="input_group">
                <label for="lasegurado">Límite asegurado</label>
                <ul id="lasegurado">
                    <li>
                        <label for="mpc">Muerte por cualquier causa</label>
                        <input type="number" name="mpc" id="mpc">
                    </li>
                    <li>
                        <label for="da">Desmembración accidental</label>
                        <input type="number" name="da" id="da">
                    </li>
                    <li>
                        <label for="it">Incapacidad total y permanente por cualquier causa</label>
                        <input type="number" name="it" id="it">
                    </li>
                    <li>
                        <label for="rgm">Reembolso de gastos médicos por accidente</label>
                        <input type="number" name="rgm" id="rgm">
                    </li>
                    <li>
                        <label for="gs">Gastos sepelio</label>
                        <input type="number" name="gs" id="gs">
                    </li>
                    <li>
                        <label for="apa">Ambulancia por accidente</label>
                        <input type="number" name="apa" id="apa">
                    </li>
                </ul>
            </div>
            <div class="input_group">
                <label for="lasegurado">Cobertura</label>
                <ul id="lasegurado">
                    <li>
                        <label for="cmpc">Muerte por cualquier causa</label>
                        <input type="number" name="cmpc" id="cmpc">
                    </li>
                    <li>
                        <label for="cda">Desmembración accidental</label>
                        <input type="number" name="cda" id="cda">
                    </li>
                    <li>
                        <label for="cit">Incapacidad total y permanente por cualquier causa</label>
                        <input type="number" name="cit" id="cit">
                    </li>
                    <li>
                        <label for="crgm">Reembolso de gastos médicos por accidente</label>
                        <input type="number" name="crgm" id="crgm">
                    </li>
                    <li>
                        <label for="cgs">Gastos sepelio</label>
                        <input type="number" name="cgs" id="cgs">
                    </li>
                    <li>
                        <label for="capa">Ambulancia por accidente</label>
                        <input type="number" name="capa" id="capa">
                    </li>
                </ul>
            </div>
            <div class="input_group">
                <label for="basecobertura">Base de Cobertura</label>
                <input type="number" name="basecobertura" id="basecobertura">
            </div>
            <div class="input_group">
                <label for="clad">Cláusulas adicionales</label>
                <ul id="clad">
                    <li>
                        <input type="checkbox" name="" id=""> Errores u omisiones
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> 120 días para cancelación anticipada y no
                        individual
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Inclusión automática del personal con 60
                        días
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> 30 días hábiles para notificación de
                        siniestros
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Extensión de vigencia a prorrata hasta 120
                        días
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Pago de reclamos 30 días
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Modificación de suma asegurada
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> De adhesión
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> De anticipo: <small> Se entenderá por
                            enfermedades terminales y/o graves entre otras, las siguientes: Infarto miocardio, Cirugía
                            arterio coronaria, Cáncer (excluye cáncer in situ), Leucemia, Accidente cerebro vascular,
                            Insuficiencia renal crónica. Trasplante de órganos mayores como son: corazón, riñones, hígado,
                            páncreas, médula ósea, siempre y cuando el órgano esté o haya estado lesionado o enfermo.
                            Esclerosis múltiple, Sida.</small>
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Declaración de titulares
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Cobertura amplia vuelo
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Devolución de prima por buena experiencia
                        siniestral
                    </li>
                </ul>
            </div>
            <div class="input_group">
                <label for="exclusions">Exclusiones</label>
                <ul id="exclusions">
                    <li>
                        <input type="checkbox" name="" id=""> Las personas que excedan los límites de
                        edad mencionados en este Slip.
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Daños extracontractuales, daños punitivos o
                        ejemplares.
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Cualquier pago ex gracia
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Coberturas de Invalidez Parcial
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Coberturas de Invalidez Temporal
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Coberturas de Invalidez Profesional
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Cobertura de Pérdida de Licencia
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Cualquier tipo de Reserva Matemática
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Personas menores de <input type="number"
                            name="min_age" id="min_age"> años de edad
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Para todas las coberturas las personas de
                        nuevo ingreso mayores de <input type="number" name="more_than" id="more_than"> años de edad.
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Policías Judiciales
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Guardaespaldas
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Cualquier cuerpo especializado en lucha
                        contra el narcotráfico y delincuencia organizada
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Aviación Particular
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Aviación Privada
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Deportes y aficiones peligrosas si son
                        practicadas de manera profesional
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Empleados que se encuentren pensionados,
                        jubilados, en proceso o estado de invalidez.
                    </li>
                </ul>
            </div>
            <div class="input_group">
                <label for="deducible">Deducible</label>
                <li>
                    <label for="muertecausa">Muerte por cualquier causa: </label>
                    <ul id="muertecausa">
                        <li><input type="number" name="" id="">% valor del siniestro</li>
                        <li><input type="number" name="" id="">% valor asegurado</li>
                        <li>mínimo USD <input type="number" name="" id=""></li>
                    </ul>
                </li>
                <li>
                    <label for="desmembracion">Desmembración accidental: </label>
                    <ul id="desmembracion">
                        <li><input type="number" name="" id="">% valor del siniestro</li>
                        <li><input type="number" name="" id="">% valor asegurado</li>
                        <li>mínimo USD <input type="number" name="" id=""></li>
                    </ul>
                </li>
                <li>
                    <label for="incapacidad">Incapacidad total y permanente por cualquier causa:</label>
                    <ul id="incapacidad">
                        <li><input type="number" name="" id="">% valor del siniestro</li>
                        <li><input type="number" name="" id="">% valor asegurado</li>
                        <li>mínimo USD <input type="number" name="" id=""></li>
                    </ul>
                </li>
                <li>
                    <label for="reembolso">Reembolso de gastos médicos por acctidente: </label>
                    <ul id="reembolso">
                        <li><input type="number" name="" id="">% valor del siniestro</li>
                        <li><input type="number" name="" id="">% valor asegurado</li>
                        <li>mínimo USD <input type="number" name="" id=""></li>
                    </ul>
                </li>
                <li>
                    <label for="gastosepelio">Gastos de sepelio: </label>
                    <ul id="gastosepelio">
                        <li><input type="number" name="" id="">% valor del siniestro</li>
                        <li><input type="number" name="" id="">% valor asegurado</li>
                        <li>mínimo USD <input type="number" name="" id=""></li>
                    </ul>
                </li>
                <li>
                    <label for="ambulanciaaccidente">Ambulancia por accidente: </label>
                    <ul id="ambulanciaaccidente">
                        <li><input type="number" name="" id="">% valor del siniestro</li>
                        <li><input type="number" name="" id="">% valor asegurado</li>
                        <li>mínimo USD <input type="number" name="" id=""></li>
                    </ul>
                </li>
            </div>
            <div class="input_group">
                <ul>
                    <li>
                        <label for="">Edad Máxima de Aceptación</label>
                        <input type="number" name="" id="">
                    </li>
                    <li>
                        <label for="">Edad Máxima de Cancelación</label>
                        <input type="number" name="" id="">
                    </li>
                </ul>
            </div>
            <div class="input_group">
                <label for="indemnizacion">Indemnización</label>
                <div id="indemnizacion">
                    <p>Porcentaje de indemnización de acuerdo al límite de edad, para la Cobertura de Vida y Accidentes
                        Personales</p>
                    <select name="insuranceqty" id="insuranceqty">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <ul>
                        <li id="1">
                            Desde los <input type="number" name="fromage1" id="fromage1"> años hasta <input
                                type="number" name="toage1" id="toage1"> años al <input type="number"
                                name="percentage1" id="percentage1">% de la suma asegurada
                        </li>
                        <li id="2">
                            Desde los <input type="number" name="fromage2" id="fromage2"> años hasta <input
                                type="number" name="toage2" id="toage2"> años al <input type="number"
                                name="percentage2" id="percentage2">% de la suma asegurada
                        </li>
                        <li id="3">
                            Desde los <input type="number" name="fromage3" id="fromage3"> años hasta <input
                                type="number" name="toage3" id="toage3"> años al <input type="number"
                                name="percentage3" id="percentage3">% de la suma asegurada
                        </li>
                        <li id="4">
                            Desde los <input type="number" name="fromage4" id="fromage4"> años hasta <input
                                type="number" name="toage4" id="toage4"> años al <input type="number"
                                name="percentage4" id="percentage4">% de la suma asegurada
                        </li>
                        <li id="5">
                            Desde los <input type="number" name="fromage5" id="fromage5"> años hasta <input
                                type="number" name="toage5" id="toage5"> años al <input type="number"
                                name="percentage5" id="percentage5">% de la suma asegurada
                        </li>
                    </ul>
                    <table>
                        <thead>
                            <tr>
                                <td>Incapacidad y/o desmembración</td>
                                <td>%</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1) Enajenación mental que impida todo trabajo.</td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>2) Parálisis o Incapacidad total y permanente. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>3) Pérdida de la Vista de ambos ojos. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>4) Pérdida o inutilización total y permanente de ambas manos o ambos pies. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>5) Pérdida o inutilización total y permanente de una mano y un pie </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>6) Pérdida total e irrecuperable del habla. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>7) Pérdida total e irreparable de la audición de los dos oídos. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>8) Pérdida de dos o más miembros principales. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>9) Pérdida total e irreparable de un ojo, junto con la pérdida de un pie o una mano.
                                </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>10) Pérdida total de los dedos de ambas manos, comprendiendo todas las falanges. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>11) Pérdida o inutilización total y permanente de una mano. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>12) Pérdida de todos los dedos de una mano. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>13) Pérdida o inutilización total y permanente de un pie.</td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>14) Pérdida total o irreparable de la visión de un ojo.</td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>15) Pérdida total permanente de la audición de un oído. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>16) Pérdida de un miembro principal. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>17) Pérdida de los dedos pulgar e índice de la misma mano. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>18) Pérdida del pulgar derecho. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>19) Pérdida del pulgar izquierdo. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>20) Pérdida de las falanges del pulgar derecho.</td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>21) Pérdida de las falanges del pulgar izquierdo. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>22) Pérdida de una de las falanges del pulgar derecho. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>23) Pérdida de una de las falanges del pulgar izquierdo. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>24) Pérdida del dedo grande del pie. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>25) Pérdida de tres falanges de cualquier otro dedo de la mano derecha</td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>26) Pérdida de dos falanges de cualquier otro dedo de la mano izquierda </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>27) Pérdida de dos falanges de cualquier otro dedo de la mano derecha. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>28) Pérdida de dos falanges de cualquier otro dedo de la mano izquierda </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>29) Pérdida de una falange de cualquier otro dedo de la mano derecha. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="input_group">
                <label for="benefmuerte">Beneficiario(s) en caso de muerte</label>
                <input type="text" name="benefmuerte" id="benefmuerte">
            </div>
            <div class="input_group">
                <label for="benefincapacidad">Beneficiario(s) en caso de incapacidad</label>
                <input type="text" name="benefincapacidad" id="benefincapacidad">
            </div>
            <div class="input_group">
                <label for="aclaraciones">Aclaraciones</label>
                <input type="text" name="aclaraciones" id="aclaraciones">
            </div>
            <div class="input_group">
                <label for="tasaprima">Tasa/Prima de reaseguros</label>
                <input type="number" name="tasaprima" id="tasaprima">% o <input type="text" name="tasaprima"
                    id="tasaprima" placeholder="texto aclaratorio...">
            </div>
            <div class="input_group">
                <label for="deducciones">Deducciones</label>
                <input type="number" name="deducciones" id="deducciones">% <input type="text" name="deducciones"
                    id="deducciones" placeholder="texto aclaratorio...">
            </div>
            <div class="input_group">
                <label for="garantiapago">Garantía de pago de primas</label>
                <div class="input_group">
                    <ul>
                        <li>
                            <label for="numdias">Contado No. Días</label>
                            <input type="number" name="numdias" id="numdias"> o
                        </li>
                        <li>
                            <label for="instalamentos">Instalamentos</label>
                            <select name="instalamentos" id="instalamentos">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </li>

                        <!-- Esto se controla con código javascript para ocultar o mostrar según la opción escogida para no complicarse la vida :v -->
                        <li id="ins1">
                            <label for="instalamiento1">1er instalamiento:</label>
                            <input type="date" id="instalamiento1" name="instalamiento1">
                        </li>
                        <li id="ins2">
                            <label for="instalamiento2">2do instalamiento:</label>
                            <input type="date" id="instalamiento2" name="instalamiento2">
                        </li>
                        <li id="ins3">
                            <label for="instalamiento3">3er instalamiento:</label>
                            <input type="date" id="instalamiento3" name="instalamiento3">
                        </li>
                    </ul>
                </div>
                <p>El incumplimiento del pago de la prima en plazo máximo establecido, liberara al reasegurador de toda
                    responsabilidad en caso de ocurrir un siniestro y anulara el respaldo desde el inicio de vigencia.</p>
            </div>
            <div class="input_group">
                <label for="notif_siniestros">Notificación de siniestros</label>
                <input type="number" name="notif_siniestros" id="notif_siniestros">
            </div>
            <div class="input_group">
                <label for="leyjurisdiccion">Ley y jurisdicción</label>
                <p id="leyjurisdiccion">Este reaseguro será gobernado por y construido de acuerdo con la ley de
                    <select name="leypais" id="leypais">
                        <option value="">Seleccionar</option> <!-- paises vienen desde API -->
                    </select> y cada parte acuerda referir a la jurisdicción exclusiva de las cortes de <input
                        type="text" name="ley_editable" id="ley_editable"> a menos que ambas partes acuerden referir
                    el caso a arbitraje.
                </p>
            </div>
            <div class="input_group">
                <label for="esquemacolocacion">Esquema de colocación</label>
                <input type="text" name="esquemacolocacion" id="esquemacolocacion">
            </div>
            <div class="input_group">
                <label for="retencionreaseguros">Retención de reaseguros</label>
                <input type="number" name="retencionreaseguros" id="retencionreaseguros">p/d 100%
            </div>
            <div class="input_group">
                <label for="cesionreaseguros">Cesión de reaseguros</label>
                <input type="number" name="cesionreaseguros" id="cesionreaseguros"> p/d 100%
            </div>
            <div class="input_group">
                <label for="security">Security</label>
                <div id="security">
                    <ul>
                        <li>
                            <label for="nombrereasegurador1">Nombre del reasegurador</label>
                            <input type="number" name="nombrereasegurador1" id="nombrereasegurador1">%
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <label for="nombrereasegurador2">Nombre del reasegurador</label>
                            <input type="number" name="nombrereasegurador2" id="nombrereasegurador2">%
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <label for="nombrereasegurador3">Nombre del reasegurador</label>
                            <input type="number" name="nombrereasegurador3" id="nombrereasegurador3">%
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <strong>(=) Respaldo total {{ '.' }} </strong> <!-- se suman los valores -->
                        </li>
                    </ul>
                </div>
            </div>
            <div class="input_group">
                <label for="condicionreaseguro">Condiciones de reaseguros:</label>
                <input type="text" name="condicionreaseguro" id="condicionreaseguro">
            </div>
            <div class="input_group">
                <label for="sujetoa">Sujeto a:</label>
                <input type="text" name="sujetoa" id="sujetoa">
            </div>
            <div class="input_group">
                <label for="informacion">Información:</label>
                <input type="text" name="informacion" id="informacion">
            </div>
        </div>
        <button>Guardar</button>
    </form>

    <!-- Editar slip -->

    <!-- Todos los campos que tienen name y/o id agregar una e antes de su respectivo nombre o id para que no se envíe mal la info por fa :3 Me aventé 1.2k lineas de código, modificar unas 150 no es nada jajaja -->

    <form action="" class="new_entry__form" id="edit_form" style="display: none">
        <h3 style="text-align: center; text-transform: capitalize">Slip Cotización</h3>
        <h5 style="text-align: right">Fecha: {{ date('d-M-Y') }}</h5>
        <div class="left_side">
            <div class="input_group">
                <label for="country">Tipo de cobertura</label>
                <input type="text" id="country" name="country" disabled value="{{ date('Y-M-d | H:i') }}">
            </div>
            <div class="input_group">
                <label for="country">País productor</label>
                <select name="" id="">
                    <option value="" selected disabled>Selecciona</option> <!-- TODOS los paises -->
                    <option value="">Ecuador</option>
                    <option value="">Egipto</option>
                    <option value="">ETC</option>
                </select>
            </div>
            <div class="input_group">
                <label for="">Broker local</label>
                <input type="text" name="" id="">
            </div>
        </div>
        <div class="right_side">
            <div class="input_group">
                <label for="company">Cedente</label>
                <input type="text" name="" id="">
            </div>
            <div class="input_group">
                <label for="country">Sector</label>
                <select name="" id="">
                    <option value="" selected disabled>Selecciona</option>
                    <option value="">Público</option>
                    <option value="">Privado</option>
                </select>
            </div>

            <div class="input_group">
                <label for="country">Asegurado</label>
                <input type="text" name="" id="">
            </div>
            <div class="input_group">
                <label for="country">Dirección</label>
                <input type="text" name="" id=""> <!-- Traer de la BDD -->
            </div>
            <div class="input_group">
                <label for="country">Actividad</label>
                <input type="text" name="" id="">
            </div>
            <div class="input_group">
                <label for="country">Vigencia</label>
                <div class="input_group">
                    <div class="left_side">
                        <div class="input_group">
                            <label for="from">Desde</label>
                            <input type="date" name="from" id="from">
                        </div>
                    </div>
                    <div class="right_side">
                        <div class="input_group">
                            <label for="to">Hasta</label>
                            <input type="date" name="to" id="to">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input_group">
                <label for="object">Objeto del seguro</label>
                <table id="object" name="object">
                    <tr>
                        <td>No.</td>
                        <td>Nombre</td>
                        <td>Fecha de nacimiento</td>
                        <td>Edad</td>
                        <td>Límite</td>
                    </tr>
                    <tr>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                    </tr>
                </table>
            </div>
            <div class="input_group">
                <label for="nasegurados">Número Asegurados</label>
                <input type="number" name="nasegurados" id="nasegurados">
            </div>
            <div class="input_group">
                <label for="casegurados">Cúmulo Asegurados</label>
                <input type="number" name="casegurados" id="casegurados">
            </div>
            <div class="input_group">
                <label for="lasegurado">Límite asegurado</label>
                <ul id="lasegurado">
                    <li>
                        <label for="mpc">Muerte por cualquier causa</label>
                        <input type="number" name="mpc" id="mpc">
                    </li>
                    <li>
                        <label for="da">Desmembración accidental</label>
                        <input type="number" name="da" id="da">
                    </li>
                    <li>
                        <label for="it">Incapacidad total y permanente por cualquier causa</label>
                        <input type="number" name="it" id="it">
                    </li>
                    <li>
                        <label for="rgm">Reembolso de gastos médicos por accidente</label>
                        <input type="number" name="rgm" id="rgm">
                    </li>
                    <li>
                        <label for="gs">Gastos sepelio</label>
                        <input type="number" name="gs" id="gs">
                    </li>
                    <li>
                        <label for="apa">Ambulancia por accidente</label>
                        <input type="number" name="apa" id="apa">
                    </li>
                </ul>
            </div>
            <div class="input_group">
                <label for="lasegurado">Cobertura</label>
                <ul id="lasegurado">
                    <li>
                        <label for="cmpc">Muerte por cualquier causa</label>
                        <input type="number" name="cmpc" id="cmpc">
                    </li>
                    <li>
                        <label for="cda">Desmembración accidental</label>
                        <input type="number" name="cda" id="cda">
                    </li>
                    <li>
                        <label for="cit">Incapacidad total y permanente por cualquier causa</label>
                        <input type="number" name="cit" id="cit">
                    </li>
                    <li>
                        <label for="crgm">Reembolso de gastos médicos por accidente</label>
                        <input type="number" name="crgm" id="crgm">
                    </li>
                    <li>
                        <label for="cgs">Gastos sepelio</label>
                        <input type="number" name="cgs" id="cgs">
                    </li>
                    <li>
                        <label for="capa">Ambulancia por accidente</label>
                        <input type="number" name="capa" id="capa">
                    </li>
                </ul>
            </div>
            <div class="input_group">
                <label for="basecobertura">Base de Cobertura</label>
                <input type="number" name="basecobertura" id="basecobertura">
            </div>
            <div class="input_group">
                <label for="clad">Cláusulas adicionales</label>
                <ul id="clad">
                    <li>
                        <input type="checkbox" name="" id=""> Errores u omisiones
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> 120 días para cancelación anticipada y no
                        individual
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Inclusión automática del personal con 60
                        días
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> 30 días hábiles para notificación de
                        siniestros
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Extensión de vigencia a prorrata hasta 120
                        días
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Pago de reclamos 30 días
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Modificación de suma asegurada
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> De adhesión
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> De anticipo: <small> Se entenderá por
                            enfermedades terminales y/o graves entre otras, las siguientes: Infarto miocardio, Cirugía
                            arterio coronaria, Cáncer (excluye cáncer in situ), Leucemia, Accidente cerebro vascular,
                            Insuficiencia renal crónica. Trasplante de órganos mayores como son: corazón, riñones, hígado,
                            páncreas, médula ósea, siempre y cuando el órgano esté o haya estado lesionado o enfermo.
                            Esclerosis múltiple, Sida.</small>
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Declaración de titulares
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Cobertura amplia vuelo
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Devolución de prima por buena experiencia
                        siniestral
                    </li>
                </ul>
            </div>
            <div class="input_group">
                <label for="exclusions">Exclusiones</label>
                <ul id="exclusions">
                    <li>
                        <input type="checkbox" name="" id=""> Las personas que excedan los límites de
                        edad mencionados en este Slip.
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Daños extracontractuales, daños punitivos o
                        ejemplares.
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Cualquier pago ex gracia
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Coberturas de Invalidez Parcial
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Coberturas de Invalidez Temporal
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Coberturas de Invalidez Profesional
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Cobertura de Pérdida de Licencia
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Cualquier tipo de Reserva Matemática
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Personas menores de <input type="number"
                            name="min_age" id="min_age"> años de edad
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Para todas las coberturas las personas de
                        nuevo ingreso mayores de <input type="number" name="more_than" id="more_than"> años de edad.
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Policías Judiciales
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Guardaespaldas
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Cualquier cuerpo especializado en lucha
                        contra el narcotráfico y delincuencia organizada
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Aviación Particular
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Aviación Privada
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Deportes y aficiones peligrosas si son
                        practicadas de manera profesional
                    </li>
                    <li>
                        <input type="checkbox" name="" id=""> Empleados que se encuentren pensionados,
                        jubilados, en proceso o estado de invalidez.
                    </li>
                </ul>
            </div>
            <div class="input_group">
                <label for="deducible">Deducible</label>
                <li>
                    <label for="muertecausa">Muerte por cualquier causa: </label>
                    <ul id="muertecausa">
                        <li><input type="number" name="" id="">% valor del siniestro</li>
                        <li><input type="number" name="" id="">% valor asegurado</li>
                        <li>mínimo USD <input type="number" name="" id=""></li>
                    </ul>
                </li>
                <li>
                    <label for="desmembracion">Desmembración accidental: </label>
                    <ul id="desmembracion">
                        <li><input type="number" name="" id="">% valor del siniestro</li>
                        <li><input type="number" name="" id="">% valor asegurado</li>
                        <li>mínimo USD <input type="number" name="" id=""></li>
                    </ul>
                </li>
                <li>
                    <label for="incapacidad">Incapacidad total y permanente por cualquier causa:</label>
                    <ul id="incapacidad">
                        <li><input type="number" name="" id="">% valor del siniestro</li>
                        <li><input type="number" name="" id="">% valor asegurado</li>
                        <li>mínimo USD <input type="number" name="" id=""></li>
                    </ul>
                </li>
                <li>
                    <label for="reembolso">Reembolso de gastos médicos por acctidente: </label>
                    <ul id="reembolso">
                        <li><input type="number" name="" id="">% valor del siniestro</li>
                        <li><input type="number" name="" id="">% valor asegurado</li>
                        <li>mínimo USD <input type="number" name="" id=""></li>
                    </ul>
                </li>
                <li>
                    <label for="gastosepelio">Gastos de sepelio: </label>
                    <ul id="gastosepelio">
                        <li><input type="number" name="" id="">% valor del siniestro</li>
                        <li><input type="number" name="" id="">% valor asegurado</li>
                        <li>mínimo USD <input type="number" name="" id=""></li>
                    </ul>
                </li>
                <li>
                    <label for="ambulanciaaccidente">Ambulancia por accidente: </label>
                    <ul id="ambulanciaaccidente">
                        <li><input type="number" name="" id="">% valor del siniestro</li>
                        <li><input type="number" name="" id="">% valor asegurado</li>
                        <li>mínimo USD <input type="number" name="" id=""></li>
                    </ul>
                </li>
            </div>
            <div class="input_group">
                <ul>
                    <li>
                        <label for="">Edad Máxima de Aceptación</label>
                        <input type="number" name="" id="">
                    </li>
                    <li>
                        <label for="">Edad Máxima de Cancelación</label>
                        <input type="number" name="" id="">
                    </li>
                </ul>
            </div>
            <div class="input_group">
                <label for="indemnizacion">Indemnización</label>
                <div id="indemnizacion">
                    <p>Porcentaje de indemnización de acuerdo al límite de edad, para la Cobertura de Vida y Accidentes
                        Personales</p>
                    <select name="insuranceqty" id="insuranceqty">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <ul>
                        <li id="1">
                            Desde los <input type="number" name="fromage1" id="fromage1"> años hasta <input
                                type="number" name="toage1" id="toage1"> años al <input type="number"
                                name="percentage1" id="percentage1">% de la suma asegurada
                        </li>
                        <li id="2">
                            Desde los <input type="number" name="fromage2" id="fromage2"> años hasta <input
                                type="number" name="toage2" id="toage2"> años al <input type="number"
                                name="percentage2" id="percentage2">% de la suma asegurada
                        </li>
                        <li id="3">
                            Desde los <input type="number" name="fromage3" id="fromage3"> años hasta <input
                                type="number" name="toage3" id="toage3"> años al <input type="number"
                                name="percentage3" id="percentage3">% de la suma asegurada
                        </li>
                        <li id="4">
                            Desde los <input type="number" name="fromage4" id="fromage4"> años hasta <input
                                type="number" name="toage4" id="toage4"> años al <input type="number"
                                name="percentage4" id="percentage4">% de la suma asegurada
                        </li>
                        <li id="5">
                            Desde los <input type="number" name="fromage5" id="fromage5"> años hasta <input
                                type="number" name="toage5" id="toage5"> años al <input type="number"
                                name="percentage5" id="percentage5">% de la suma asegurada
                        </li>
                    </ul>
                    <table>
                        <thead>
                            <tr>
                                <td>Incapacidad y/o desmembración</td>
                                <td>%</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1) Enajenación mental que impida todo trabajo.</td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>2) Parálisis o Incapacidad total y permanente. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>3) Pérdida de la Vista de ambos ojos. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>4) Pérdida o inutilización total y permanente de ambas manos o ambos pies. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>5) Pérdida o inutilización total y permanente de una mano y un pie </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>6) Pérdida total e irrecuperable del habla. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>7) Pérdida total e irreparable de la audición de los dos oídos. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>8) Pérdida de dos o más miembros principales. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>9) Pérdida total e irreparable de un ojo, junto con la pérdida de un pie o una mano.
                                </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>10) Pérdida total de los dedos de ambas manos, comprendiendo todas las falanges. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>11) Pérdida o inutilización total y permanente de una mano. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>12) Pérdida de todos los dedos de una mano. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>13) Pérdida o inutilización total y permanente de un pie.</td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>14) Pérdida total o irreparable de la visión de un ojo.</td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>15) Pérdida total permanente de la audición de un oído. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>16) Pérdida de un miembro principal. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>17) Pérdida de los dedos pulgar e índice de la misma mano. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>18) Pérdida del pulgar derecho. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>19) Pérdida del pulgar izquierdo. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>20) Pérdida de las falanges del pulgar derecho.</td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>21) Pérdida de las falanges del pulgar izquierdo. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>22) Pérdida de una de las falanges del pulgar derecho. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>23) Pérdida de una de las falanges del pulgar izquierdo. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>24) Pérdida del dedo grande del pie. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>25) Pérdida de tres falanges de cualquier otro dedo de la mano derecha</td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>26) Pérdida de dos falanges de cualquier otro dedo de la mano izquierda </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>27) Pérdida de dos falanges de cualquier otro dedo de la mano derecha. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>28) Pérdida de dos falanges de cualquier otro dedo de la mano izquierda </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                            <tr>
                                <td>29) Pérdida de una falange de cualquier otro dedo de la mano derecha. </td>
                                <td><input type="number" name="" id="">%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="input_group">
                <label for="benefmuerte">Beneficiario(s) en caso de muerte</label>
                <input type="text" name="benefmuerte" id="benefmuerte">
            </div>
            <div class="input_group">
                <label for="benefincapacidad">Beneficiario(s) en caso de incapacidad</label>
                <input type="text" name="benefincapacidad" id="benefincapacidad">
            </div>
            <div class="input_group">
                <label for="aclaraciones">Aclaraciones</label>
                <input type="text" name="aclaraciones" id="aclaraciones">
            </div>
            <div class="input_group">
                <label for="tasaprima">Tasa/Prima de reaseguros</label>
                <input type="number" name="tasaprima" id="tasaprima">% o <input type="text" name="tasaprima"
                    id="tasaprima" placeholder="texto aclaratorio...">
            </div>
            <div class="input_group">
                <label for="deducciones">Deducciones</label>
                <input type="number" name="deducciones" id="deducciones">% <input type="text" name="deducciones"
                    id="deducciones" placeholder="texto aclaratorio...">
            </div>
            <div class="input_group">
                <label for="garantiapago">Garantía de pago de primas</label>
                <div class="input_group">
                    <ul>
                        <li>
                            <label for="numdias">Contado No. Días</label>
                            <input type="number" name="numdias" id="numdias"> o
                        </li>
                        <li>
                            <label for="instalamentos">Instalamentos</label>
                            <select name="instalamentos" id="instalamentos">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </li>

                        <!-- Esto se controla con código javascript para ocultar o mostrar según la opción escogida para no complicarse la vida :v -->
                        <li id="ins1">
                            <label for="instalamiento1">1er instalamiento:</label>
                            <input type="date" id="instalamiento1" name="instalamiento1">
                        </li>
                        <li id="ins2">
                            <label for="instalamiento2">2do instalamiento:</label>
                            <input type="date" id="instalamiento2" name="instalamiento2">
                        </li>
                        <li id="ins3">
                            <label for="instalamiento3">3er instalamiento:</label>
                            <input type="date" id="instalamiento3" name="instalamiento3">
                        </li>
                    </ul>
                </div>
                <p>El incumplimiento del pago de la prima en plazo máximo establecido, liberara al reasegurador de toda
                    responsabilidad en caso de ocurrir un siniestro y anulara el respaldo desde el inicio de vigencia.</p>
            </div>
            <div class="input_group">
                <label for="notif_siniestros">Notificación de siniestros</label>
                <input type="number" name="notif_siniestros" id="notif_siniestros">
            </div>
            <div class="input_group">
                <label for="leyjurisdiccion">Ley y jurisdicción</label>
                <p id="leyjurisdiccion">Este reaseguro será gobernado por y construido de acuerdo con la ley de
                    <select name="leypais" id="leypais">
                        <option value="">Seleccionar</option> <!-- paises vienen desde API -->
                    </select> y cada parte acuerda referir a la jurisdicción exclusiva de las cortes de <input
                        type="text" name="ley_editable" id="ley_editable"> a menos que ambas partes acuerden referir
                    el caso a arbitraje.
                </p>
            </div>
            <div class="input_group">
                <label for="esquemacolocacion">Esquema de colocación</label>
                <input type="text" name="esquemacolocacion" id="esquemacolocacion">
            </div>
            <div class="input_group">
                <label for="retencionreaseguros">Retención de reaseguros</label>
                <input type="number" name="retencionreaseguros" id="retencionreaseguros">p/d 100%
            </div>
            <div class="input_group">
                <label for="cesionreaseguros">Cesión de reaseguros</label>
                <input type="number" name="cesionreaseguros" id="cesionreaseguros"> p/d 100%
            </div>
            <div class="input_group">
                <label for="security">Security</label>
                <div id="security">
                    <ul>
                        <li>
                            <label for="nombrereasegurador1">Nombre del reasegurador</label>
                            <input type="number" name="nombrereasegurador1" id="nombrereasegurador1">%
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <label for="nombrereasegurador2">Nombre del reasegurador</label>
                            <input type="number" name="nombrereasegurador2" id="nombrereasegurador2">%
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <label for="nombrereasegurador3">Nombre del reasegurador</label>
                            <input type="number" name="nombrereasegurador3" id="nombrereasegurador3">%
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <strong>(=) Respaldo total {{ '.' }} </strong> <!-- se suman los valores -->
                        </li>
                    </ul>
                </div>
            </div>
            <div class="input_group">
                <label for="condicionreaseguro">Condiciones de reaseguros:</label>
                <input type="text" name="condicionreaseguro" id="condicionreaseguro">
            </div>
            <div class="input_group">
                <label for="sujetoa">Sujeto a:</label>
                <input type="text" name="sujetoa" id="sujetoa">
            </div>
            <div class="input_group">
                <label for="informacion">Información:</label>
                <input type="text" name="informacion" id="informacion">
            </div>
        </div>
        <button>Guardar</button>
    </form>

    <script>
        const newSlip = document.getElementById("new_slip");
        const modifySlip = document.getElementById("modify_slip");

        newSlip.addEventListener('click', () => {
            document.getElementById("new_form").style.display = "block"
            document.getElementById("edit_form").style.display = "none"
        });

        modifySlip.addEventListener('click', () => {
            document.getElementById("new_form").style.display = "none"
            document.getElementById("edit_form").style.display = "block"
        });
    </script>
@endsection
