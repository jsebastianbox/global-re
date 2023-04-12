<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura Cobrokeraje</title>
    <link rel="stylesheet" href="{{ asset('css/admin/invoices/cobrokeraje.css') }}">
</head>

<body>
    <link href="https://fonts.cdnfonts.com/css/calibri-light" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <div class="invoice" id="invoice_credit_note">
        <header>
            <div class="l logo">
                <img src="data:image/jpeg;base64,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"
                    alt="global re logo">
            </div>
            <div class="r invoice_title">Nota de Crédito</div>
        </header>

        <section id="info">
            <address class="l">
                201 Rogers Office Building<br>
                Edwin Wallace Rey Drive<br>
                George Hill-Anguilla<br>
                Phone number: 44 20 3290 3840
            </address>
            <div class="r">
                <h4>
                    <strong>Date: </strong> <span id="invoice-date2"></span>
                </h4>
                <div class="l">
                    <h4>
                        <strong>Invoice No.: </strong> <span id="invoice_number"></span>
                    </h4>
                </div>
            </div>
        </section>

        <section id="info_2">
            <div class="l">
                <strong><small>BMS Latin America LLC</small></strong><br>
                501 Brickell Key Dr, Suite 509<br>
                Miami, FL 33131
            </div>
            <div class="r">
                <strong><small>EIN: 36-4819220</small></strong>
            </div>
        </section>

        <section id="invoice-data">
            <table>
                <thead>
                    <tr>
                        <th style="text-align: center" class="center"  colspan="2" >Concept</th>
                        <th style="text-align: center" class="center" >Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="left"><span id="numero_instalamento"></span></td>
                        <td class="right">
                            <span style="display: none" id="instalamento_value"></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="left">
                            <strong>(=) Total comisión co-brokeraje</strong>
                        </td>
                        <td class="right">
                            <strong style="display: none" id="commission_percentage" class="total_comission_invoice" style="text-align: end"></strong>
                        </td>
                        <td> <span id="total_comission_invoice" class="total_comission_invoice"></span></td>
                    </tr>
                    <tr id="bakn-details">
                        <td>Wire transfer in US dollars / Transferencia electrónica en dólares Americanos</td>
                        <td class=right></td>
                    </tr>
                    <tr>
                        <td>Beneficiary name / Nombre del beneficiario: Global Reinsurance Broker Inc</td>
                        <td class=right></td>
                    </tr>
                    <tr>
                        <td>Account number / Número de cuenta: 00505438</td>
                        <td class=right></td>
                    </tr>
                    <tr>
                        <td>Receiver Bank / Banco Receptor: Banco Sabadell – Miami Branch</td>
                        <td class=right></td>
                    </tr>
                    <tr>
                        <td>Receiver ABA: 066014069</td>
                        <td class=right></td>
                    </tr>
                    <tr>
                        <td>Swift: BSABUS3X</td>
                        <td class=right></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">
                            <strong>Total</strong>
                        </td>
                        <td class=right id="total-invoice"><span></span> - </td>
                    </tr>
                </tfoot>
            </table>
        </section>
        <small class="centered"> George hill - Anguilla</small>
    </div>
    <button id="download-button-creditNote">Descargar Factura</button>
</body>

</html>
