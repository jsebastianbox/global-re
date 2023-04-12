<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota de Débito</title>
    <link rel="stylesheet" href="{{ asset('css/admin/invoices/debit.css') }}">
</head>

<body id="debit-body">
    <div class="page-break">
        <div class="title">
            Nota de Débito <span id="note_code">GRB-ND 188-2021/2022</span>
        </div>
        <div class="content">
            <div class="dheader">
                <div class="container">
                    <div class="left_side">
                        <ul>
                            <li>Cedente:</li>
                            <li>Dirección:</li>
                            <li>Teléfono:</li>
                            <li>Ciudad:</li>
                        </ul>
                    </div>
                    <div class="right_side">
                        <ul>
                            <li>
                                <span id="cedente">Latina Seguros</span>
                            </li>
                            <li><span id="direccion">Parque Empresarial Colon, Edificio Corporativo 3, planta
                                    baja</span></li>
                            <li><span id="telefono">0987654321</span></li>
                            <li><span id="ciudad">Guayaquil</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="date">
                <strong>Fecha: </strong><span id="issued_date">27 de abril de 2023</span>
            </div>

            <div class="invoice">
                <div class="invoice-row">
                    <div class="invoice-cell left">Tipo:</div>
                    <div class="invoice-cell right" id="type">Reaseguro Facultativo para Protección e Indemnización
                    </div>
                </div>
                <div class="invoice-row">
                    <div class="invoice-cell left">Reasegurado:</div>
                    <div class="invoice-cell right" id="insurance_company">Latina Seguros</div>
                </div>
                <div class="invoice-row">
                    <div class="invoice-cell left">Asegurado:</div>
                    <div class="invoice-cell right"><strong id="insured">Pablo Ruiz Sánchez</strong></div>
                </div>
                <div class="invoice-row">
                    <div class="invoice-cell left">Vigencia:</div>
                    <div class="invoice-cell right">
                        <ul style="all:unset">
                            <li>
                                Desde: <span id="from">27 de abril de 2022</span>
                            </li>
                            <li>
                                Hasta: <span id="to">27 de abril de 2023</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="invoice-row">
                    <div class="invoice-cell left">Prima de reaseguros:</div>
                    <div class="invoice-cell right">
                        <table id="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Prima Bruta</td>
                                    <td id="prima_percentage">100,00%</td>
                                    <td id="prima_value">14.394,18</td>
                                </tr>
                                <tr>
                                    <td>Prima Cedida</td>
                                    <td id="cedida_percentage">99,00%</td>
                                    <td id="cedida_value">14.250,24</td>
                                </tr>
                                <tr>
                                    <td>(-) Imp. Renta</td>
                                    <td id="prima_percentage">6,25%</td>
                                    <td id="prima_value">890,64</td>
                                </tr>
                                <tr>
                                    <td>(-) Com Cedente</td>
                                    <td id="com_percentage">7,00%</td>
                                    <td id="com_value">997,52</td>
                                </tr>
                                <tr>
                                    <td>(-) Comisión BQ</td>
                                    <td id="bq_percentage">7,00%</td>
                                    <td id="bq_value">997,52</td>
                                </tr>
                                <tr>
                                    <td>(=)Sub total</td>
                                    <td></td>
                                    <td id="sub_total">11.364,96</td>
                                </tr>
                                <tr>
                                    <td>(-) ISD</td>
                                    <td id="isd">5,00%</td>
                                    <td id="prima_value">568,23</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr style="font-weight: 700;">
                                    <td>(=)Prima Neta</td>
                                    <td></td>
                                    <td id="totals">10.796,33</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="invoice-row">
                    <div class="invoice-cell left">Garantía de pago de primas:</div>
                    <div class="invoice-cell right">
                        La prima será pagada de acuerdo con el siguiente detalle. El incumplimiento del pago de la prima
                        en el plazo máximo establecido liberará al reasegurador de toda la responsabilidad en caso de
                        ocurrir un siniestro y anulará el respaldo desde el inicio de la vigencia.
                        <div id="instalamentos">
                            <!-- Aqui mete con un ul y li cada instalamento para que se vea algo así:
      Primer instalamento: 27 de mayo del 2021
      Segundo instalamento: 27 de junio del 2021
      ...
      etc
      -->
                        </div>
                    </div>
                </div>
            </div>
            <p>Este documento debe ser revisado cuidadosamente, si algún término y/o condición no cuenta con vuestra
                aprobación, favor informarnos dentro de los 30 días recibido; caso contrario, el mismo se considerará
                aceptado en su totalidad.</p>
            <div class="signature">
                <hr>
                <strong>Global Reinsurance Broker Inc.</strong>
            </div>
            <div class="footer">
                <!-- Footer content -->
            </div>
        </div>
    </div>
</body>

</html>
