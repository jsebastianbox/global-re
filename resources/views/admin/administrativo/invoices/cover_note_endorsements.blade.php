<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota de cobertura | Endoso</title>
    <link rel="stylesheet" href="{{ asset('css/admin/invoices/endorsements.css') }}">
</head>

<body>
    <div class="orden_pago_container" id="cover_note_endorsements">
        <div class="orden_pago_content" id="orden_content">
            <div class="orden_title">
                Nota de cobertura <span style="text-transform: capitalize">No.</span><span
                    id="cover_number">grb-15-2021/2022</span>
                <br>
                <div class="endoso_info">Endoso Modificatorio No. <span id="endoso_number">1</span></div>
            </div>
            <div class="orden_date">
                <strong>Fecha: </strong><span id="current_date">08 de abril de 2022</span>
            </div>

            <div class="orden_header">
                <div class="orden_row">
                    <div class="orden_cell orden_left">
                        Tipo:
                    </div>
                    <div class="orden_cell orden_right">
                        <div id="endoso_type">Reaseguros Facultativo de Protección e Indemnización</div>
                    </div>
                </div>

                <div class="orden_row">
                    <div class="orden_cell orden_left">
                        Asegurado:
                    </div>
                    <div class="orden_cell orden_right">
                        <div id="insured">
                            <span id="to">Pablo Ruiz Sánchez</span>
                        </div>
                    </div>
                </div>

                <div class="orden_row">
                    <div class="orden_cell orden_left">
                        Reasegurado:
                    </div>
                    <div class="orden_cell orden_right">
                        <span id="reinsured">Latina Seguros</span>
                    </div>
                </div>

                <div class="orden_row">
                    <div class="orden_cell orden_left">
                        Vigencia:
                    </div>
                    <div class="orden_cell orden_right">
                        <span>Desde: <span id="vigency_from">27 de abril de 2021</span> hora local ecuatoriana según póliza
                            original.<br>Hasta: <span id="vigency_to">01 de abril de 2022</span>hora local ecuatoriana
                            según póliza original.
                    </div>
                </div>
                <div class="orden_row">
                    <div class="orden_cell orden_left">
                        Embarcación:
                    </div>
                    <div class="orden_cell orden_right">
                        <span id="boat">
                            <strong id="shipment_name" style="text-transform: uppercase">Marly + otras
                                embarcaciones</strong> como lo detallado en el anexo 1.
                        </span>
                    </div>
                </div>
                <div class="orden_row">
                    <div class="orden_cell orden_left">
                        Límite de indemnización:
                    </div>
                    <div class="orden_cell orden_right">
                        USD <span id="limit">5,000,000</span> cualquier accidente u ocurrencia, límite único
                        combinado.
                        <p>
                            Con la emisión del presente endoso se procede a concluir lo siguiente:</p>
                        <p>
                            Asegurado adicional (beneficiario): <span id="additional_insured">Corporación Financiera
                                Nacional</span>, fecha efectiva <span id="effective_date">27 de abril de 2021</span>
                        </p>
                        <p>Misdirected Arrow Clause:<br>
                            Incluyendo <span id="same_aditional_insured">CFN Corporación Financiera Nacional</span> como
                            Coasegurado, sujeto siempre a la póliza y a lo siguiente.
                        </p>
                        <p>Términos especiales:
                        <ol>
                            <li>El Coasegurado mencionado anteriormente puede recuperar del
                                Asegurador la cantidad de la que sea responsable por ley de
                                pagar, que es correctamente responsabilidad del Asegurado</li>
                            <li>Esta cláusula no revisa las obligaciones del Asegurado bajo esta
                                póliza para limitar conjuntamente su responsabilidad.</li>
                            <li>
                                El monto máximo recuperable bajo esta póliza para liquidar el
                                pasivo solo se pagará una vez, independientemente del número
                                de Asegurados involucrados.
                            </li>
                        </ol>
                        </p>
                        <p>Demás Términos y Condiciones como el respaldo original.</p>
                    </div>
                </div>
            </div>

            <div class="footer">
                <div class="signature_container">
                    <hr>
                    <span id="issued_by">Iván Wollmann</span>
                    <br>
                    <strong>Global Reinsurance Broker Inc.</strong>
                </div>
            </div>
        </div>
        <footer id="pageCount">
            <span>Página <span class="pageNumber"></span> de <span class="totalPages"></span></span>
        </footer>
        <button onclick="generatePDF()" id="imprimir">Imprimir</button>
    </div>

    <script>
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
            'diciembre'
        ];

        const year = new Date().getFullYear();
        const month = new Date().getMonth();
        const day = new Date().getDate();

        function getMonthName(month) {
            return months[month];
        }

        const current_date = `${day} de ${getMonthName(month)} del ${year}`;

        const date = document.getElementById("current_date").innerText = current_date;



        function generatePDF() {
            const header = document.querySelector('.orden_header');

            const headerHeight = header.offsetHeight;
            const availableHeight = (window.innerHeight - headerHeight) * 0.8;

            let pageCount = 1;
            let currentPage = 1;

            const pageDiv = document.createElement('div');
            pageDiv.className = 'page';

            const pageNumberSpan = document.createElement('span');
            pageNumberSpan.id = 'pageCount';
            pageNumberSpan.innerHTML = `Página ${currentPage} de ${pageCount}`;

            pageDiv.appendChild(header.cloneNode(true));
            pageDiv.appendChild(footer.cloneNode(true));

            pageDiv.appendChild(pageNumberSpan.cloneNode(true));
            document.body.appendChild(pageDiv);

            window.print();
        }
    </script>
</body>

</html>
