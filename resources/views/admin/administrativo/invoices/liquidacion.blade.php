<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liquidación de Primas</title>
    <link rel="stylesheet" href="{{ asset('css/admin/invoices/liquidacion.css') }}">
</head>

<body id="debit-body">
    <div class="primas_container">
        <section class="primas_section">
            <div class="primas_heading">
                Liquidación de primas - <span id="prima_number">grb-14-2021/2022</span> y <span
                    id="prima_number_two">grb-15-2021/2022</span>
            </div>
            <div class="primas_content">
                <div class="l1">
                    Reasegurador/Corredor:
                </div>
                <div class="r1" id="reinsurer">
                    Global Reinsurance Broker Inc.
                </div>

                <div class="l2">
                    País:
                </div>
                <div class="r2" id="country">
                    Ecuador
                </div>

                <div class="l3">
                    Cedente:
                </div>
                <div class="r3" id="insurer">
                    Latina Seguros
                </div>

                <div class="l4">
                    Asegurado:
                </div>
                <div class="r4" id="insured">
                    Pablo Ruiz
                </div>

                <div class="l5">
                    Ramo:
                </div>
                <div class="r5" id="branch">
                    Casco de Buques
                </div>

                <div class="l6">
                    Fecha de recepción <span style="text-transform: lowercase">y</span> confirmación de fondos:
                </div>
                <div class="r6">
                    10-jun-21
                </div>

                <div class="l7">
                    Vigencia:
                </div>
                <div class="r7">
                    <p>Desde: <span id="from">27-abr-21</span></p>
                    <p>Hasta: <span id="until">01-abr-22</span></p>
                </div>
            </div>
        </section>

        <section class="primas_section">
            <div class="primas_heading">
                Prima recibida por <span id="insurer">Hispana de seguros</span>
            </div>
            <div class="primas_content">
                <table id="prima_recibida">
                    <thead>
                        <th>Detalle</th>
                        <th>Participación</th>
                        <th>Instalamento</th>
                        <th>Prima Neta</th>
                        <th>Cobrada</th>
                        <th>Por Cobrar</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col" id="first_table_branch">Casco de Buques</td>
                            <td id="first_table_part">99%</td>
                            <td id="first_table_install">1 de 7</td>
                            <td id="first_table_neta">11,911,97</td>
                            <td id="first_table_cobrada">1,701,71</td>
                            <td id="first_table_por_cobrar">10,210,26</td>
                        </tr>
                        <tr>
                            <td scope="col">Protección e Indemnización</td>
                            <td id="first_table_part_2">99%</td>
                            <td id="first_table_install_2">1 de 7</td>
                            <td id="first_table_neta_2">10,796,31</td>
                            <td id="first_table_cobrada_2">1,542,33</td>
                            <td id="first_table_por_cobrar_2">9,253,98</td>
                        </tr>
                        <tr>
                            <td scope="col">Fee Bancario</td>
                            <td id="first_table_part_3"></td>
                            <td id="first_table_install_3"></td>
                            <td id="first_table_neta_3"></td>
                            <td id="first_table_cobrada_3">35,00</td>
                            <td id="first_table_por_cobrar_3"></td>
                        </tr>
                        <tr>
                            <td scope="col">(=) Total</td>
                            <td></td>
                            <td></td>
                            <td id="suma_neta">22,708.28</td>
                            <td id="suma_cobrada">3,209.24</td>
                            <td id="suma_por_cobrar">9,253.98</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="primas_section">
            <div class="primas_heading">
                Prima a ser pagada a <span id="beneficiary">meridian</span>
            </div>
            <div class="primas_content">
                <table id="prima_a_pagar">
                    <thead>
                        <th>Detalle</th>
                        <th>Participación</th>
                        <th>Instalamento</th>
                        <th>Prima Neta</th>
                        <th>Pagada</th>
                        <th>Por Pagar</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col" id="second_table_branch">Casco de Buques</td>
                            <td id="second_table_part">99%</td>
                            <td id="second_table_install">1 de 7</td>
                            <td id="second_table_neta">11,911,97</td>
                            <td id="second_table_pagada">1,701,71</td>
                            <td id="second_table_por_pagar">10,210,26</td>
                        </tr>
                        <tr>
                            <td scope="col">Protección e Indemnización</td>
                            <td id="second_table_part_2">99%</td>
                            <td id="second_table_install_2">1 de 7</td>
                            <td id="second_table_neta_2">10,796,31</td>
                            <td id="second_table_pagada_2">1,542,33</td>
                            <td id="second_table_por_pagar_2">9,253,98</td>
                        </tr>
                        <tr>
                            <td scope="col">(=) Total a transferir a <span
                                    id="second_table_beneficiary">Meridian</span></td>
                            <td></td>
                            <td></td>
                            <td id="suma_neta">22,708.28</td>
                            <td id="suma_cobrada">3,209.24</td>
                            <td id="suma_por_cobrar">9,253.98</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="primas_section">
            <div class="primas_heading">
                comisión global re
            </div>
            <div id="number_installments">7 de 7</div>
            <div class="primas_content">
                <table id="comision_global">
                    <thead>
                        <th>Detalle</th>
                        <th>Participación</th>
                        <th>Instalamento</th>
                        <th>Prima Neta</th>
                        <th>Cobrada</th>
                        <th>Por Cobrar</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col" id="first_table_branch">Casco de Buques</td>
                            <td id="first_table_part">99%</td>
                            <td id="first_table_install">1 de 7</td>
                            <td id="first_table_neta">11,911,97</td>
                            <td id="first_table_cobrada">1,701,71</td>
                            <td id="first_table_por_cobrar">10,210,26</td>
                        </tr>
                        <tr>
                            <td scope="col">Protección e Indemnización</td>
                            <td id="first_table_part_2">99%</td>
                            <td id="first_table_install_2">1 de 7</td>
                            <td id="first_table_neta_2">10,796,31</td>
                            <td id="first_table_cobrada_2">1,542,33</td>
                            <td id="first_table_por_cobrar_2">9,253,98</td>
                        </tr>
                        <tr>
                            <td scope="col">Fee Bancario</td>
                            <td id="first_table_part_3"></td>
                            <td id="first_table_install_3"></td>
                            <td id="first_table_neta_3"></td>
                            <td id="first_table_cobrada_3">35,00</td>
                            <td id="first_table_por_cobrar_3"></td>
                        </tr>
                        <tr>
                            <td scope="col">(=) Total</td>
                            <td></td>
                            <td></td>
                            <td id="suma_neta">22,708.28</td>
                            <td id="suma_cobrada">3,209.24</td>
                            <td id="suma_por_cobrar">9,253.98</td>
                        </tr>
                    </tbody>
                </table>
        </section>
        <div class="liquidacion_info">
            <div>Elaborado por: <span id="made_by">María Belén Toalombo</span></div>
            <div>
                Revisado por: <span id="revision">Grace Segovia</span>
            </div>
            <p>Fecha de elaboración: <span id="issued_date">22 de junio de 2021<span></p>
        </div>
    </div>
    </div>
</body>

<script>
    //Actualización importante:
    //
    //Esta información se debe guardar en la tabla ya que
    //siempre que se genere la vista, se cambiará a la fecha actual
    //en caso de que NO se guarde en la tabla
    //y esto SI debe quedarse guardado ya que pueden buscar por fecha, etc
    //es como generar una factura; no se puede actualizar la fecha de una factura
    //que ya fue generada
    //porque ademas esto debe estar aprobado

    const year =  new Date().getFullYear();
    const month = new Date().getMonth();
    const mes = getMonthName(month);
    const dia = new Date().getDate();
    const currentDate = `${dia} de ${mes} del ${year}`;

    document.getElementById("issued_date").textContent = currentDate;
</script>

</html>
