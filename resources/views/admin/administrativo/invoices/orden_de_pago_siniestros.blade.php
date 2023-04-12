<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ORDEN DE PAGO / SINIESTROS</title>
    <link rel="stylesheet" href="{{ asset('css/admin/invoices/orden_pago_siniestros.css') }}">
    <link rel="stylesheet" href="{{ asset('js/admin/invoices.js') }}">
</head>

<body>
    <div class="orden_pago_container" id="orden_page">
        <div class="orden_pago_content" id="orden_content">
            <div class="orden_title">
                Orden de pago / siniestros
                <br>
                <span id="payment_id">GRB-2022-004</span>
            </div>
            <div class="orden_date">
                <strong>Fecha: </strong><span id="current_date">08 de abril de 2022</span>
            </div>

            <div class="orden_header">
                <div class="orden_row">
                    <div class="orden_cell orden_left">
                        De:
                    </div>
                    <div class="orden_cell orden_right">
                        <div id="name">Jorge Calvachi</div>
                    </div>
                </div>

                <div class="orden_row">
                    <div class="orden_cell orden_left">
                        Para:
                    </div>
                    <div class="orden_cell orden_right">
                        <div id="reference">
                            <span id="to">Loli Beltrán</span>
                        </div>
                    </div>
                </div>

                <div class="orden_row">
                    <div class="orden_cell orden_left">
                        Referencia:
                    </div>
                    <div class="orden_cell orden_right">
                        <span id="reference">Pago Siniestros Guy Carpenter, Asegurado Petroecuador</span>
                    </div>
                </div>

                <div class="orden_row">
                    <div class="orden_cell orden_left">
                        Valor Total:
                    </div>
                    <div class="orden_cell orden_right">
                        <span id="total_value">$60,418.91</span>
                    </div>
                </div>
                <div class="orden_row">
                    <div class="orden_cell orden_left">
                        Detalle:
                    </div>
                    <div class="orden_cell orden_right">
                        <span id="detail">
                            A continuación, encontrará el detalle de 1 orden de pago generada y aprobada para el pago
                            correspondiente:
                        </span>
                    </div>
                </div>
            </div>

            <div class="orden_table" id="orden_pago_table">
                <table>
                    <thead>
                        <tr>
                            <th>No. Orden de Pago</th>
                            <th>Fecha</th>
                            <th>Beneficiario</th>
                            <th>Asegurado</th>
                            <th>Valor a pagar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>0010-2022</td>
                            <td>8/4/2022</td>
                            <td>Guy Carpenter</td>
                            <td>Petroamazonas</td>
                            <td>$10,859.16</td>
                        </tr>
                        <tr>
                            <td>0010-2022</td>
                            <td>8/4/2022</td>
                            <td>Guy Carpenter</td>
                            <td>Petroamazonas</td>
                            <td>$152.60</td>
                        </tr>
                        <tr>
                            <td>0010-2022</td>
                            <td>8/4/2022</td>
                            <td>Guy Carpenter</td>
                            <td>Petroamazonas</td>
                            <td>$13,964.65</td>
                        </tr>
                        <tr>
                            <td>0010-2022</td>
                            <td>8/4/2022</td>
                            <td>Guy Carpenter</td>
                            <td>Petroamazonas</td>
                            <td>$474.06</td>
                        </tr>
                        <tr>
                            <td>0010-2022</td>
                            <td>8/4/2022</td>
                            <td>Guy Carpenter</td>
                            <td>Petroamazonas</td>
                            <td>$10,859.16</td>
                        </tr>
                        <tr>
                            <td>0010-2022</td>
                            <td>8/4/2022</td>
                            <td>Guy Carpenter</td>
                            <td>Petroamazonas</td>
                            <td>$10,859.16</td>
                        </tr>
                        <tr>
                            <td>0010-2022</td>
                            <td>8/4/2022</td>
                            <td>Guy Carpenter</td>
                            <td>Petroamazonas</td>
                            <td>$10,859.16</td>
                        </tr>
                        <tr>
                            <td>0010-2022</td>
                            <td>8/4/2022</td>
                            <td>Guy Carpenter</td>
                            <td>Petroamazonas</td>
                            <td>$10,859.16</td>
                        </tr>
                        <tr>
                            <td>0010-2022</td>
                            <td>8/4/2022</td>
                            <td>Guy Carpenter</td>
                            <td>Petroamazonas</td>
                            <td>$10,859.16</td>
                        </tr>
                        <tr>
                            <td>0010-2022</td>
                            <td>8/4/2022</td>
                            <td>Guy Carpenter</td>
                            <td>Petroamazonas</td>
                            <td>$10,859.16</td>
                        </tr>
                        <tr>
                            <td>0010-2022</td>
                            <td>8/4/2022</td>
                            <td>Guy Carpenter</td>
                            <td>Petroamazonas</td>
                            <td>$10,859.16</td>
                        </tr>
                        <tr>
                            <td>0010-2022</td>
                            <td>8/4/2022</td>
                            <td>Guy Carpenter</td>
                            <td>Petroamazonas</td>
                            <td>$10,859.16</td>
                        </tr>
                        <tr>
                            <td>0010-2022</td>
                            <td>8/4/2022</td>
                            <td>Guy Carpenter</td>
                            <td>Petroamazonas</td>
                            <td>$10,859.16</td>
                        </tr>
                        <tr>
                            <td>0010-2022</td>
                            <td>8/4/2022</td>
                            <td>Guy Carpenter</td>
                            <td>Petroamazonas</td>
                            <td>$10,859.16</td>
                        </tr>
                        <tr>
                            <td>0010-2022</td>
                            <td>8/4/2022</td>
                            <td>Guy Carpenter</td>
                            <td>Petroamazonas</td>
                            <td>$10,859.16</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4"><strong>Total a transferir</strong></td>
                            <td id="total_transfer">$60,418.91</td>
                        </tr>
                    </tfoot>
                </table>
                <figcaption>Quedamos atentos a su gentil ayuda.</figcaption>
            </div>
            <div class="footer">
                <div class="signature_container">
                    <hr>
                    Elaborado Por:
                    <br>
                    <span id="issued_by">Jorge Calvachi</span>
                </div>
                <div class="signature_container">
                    <hr>
                    Aprobado Por:
                    <br>
                    <span id="approver">Grace Segovia</span>
                </div>
            </div>
        </div>
        <footer id="pageCount">
            <span>Página <span class="pageNumber"></span> de <span class="totalPages"></span></span>
        </footer>
    </div>

    <button id="download-button-ordenPago"></button>
</body>

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
</script>

<script>
    let contentHeight = document.getElementById("orden_content").offsetHeight;
    let pageHeight = document.getElementById("orden_page").offsetHeight;
    let pageCount = Math.ceil(contentHeight / pageHeight);

    document.getElementById("pageCount").innerHTML = "Página " + 1 + " de " + pageCount;
</script>

<script>
    function generatePDF() {
        const header = document.querySelector('.orden_header');
        const table = document.querySelector('.orden_table');
        const footer = document.querySelector('tfoot');

        const headerHeight = header.offsetHeight;
        const footerHeight = footer.offsetHeight;
        const availableHeight = (window.innerHeight - headerHeight - footerHeight) * 0.8;

        const rows = Array.from(table.rows);

        let pageCount = 1;
        let currentPage = 1;

        const pageDiv = document.createElement('div');
        pageDiv.className = 'page';

        const pageNumberSpan = document.createElement('span');
        pageNumberSpan.id = 'pageCount';
        pageNumberSpan.innerHTML = `Página ${currentPage} de ${pageCount}`;

        pageDiv.appendChild(header.cloneNode(true));

        const tableContainer = document.createElement('div');
        tableContainer.className = 'orden_table';
        tableContainer.appendChild(table.cloneNode(true));

        let currentRowTop = 0;
        for (const row of rows) {
            const rowHeight = row.offsetHeight;
            currentRowTop += rowHeight;

            if (currentRowTop > availableHeight) {
                currentPage++;
                pageCount++;
                currentRowTop = rowHeight;

                pageDiv.appendChild(tableContainer);
                pageDiv.appendChild(footer.cloneNode(true));

                pageDiv.appendChild(pageNumberSpan.cloneNode(true));
                document.body.appendChild(pageDiv);

                pageDiv.className = 'page';
                pageDiv.innerHTML = '';

                pageDiv.appendChild(header.cloneNode(true));

                tableContainer.innerHTML = '';
                tableContainer.appendChild(table.cloneNode(true));
            }

            tableContainer.appendChild(row.cloneNode(true));
        }

        pageDiv.appendChild(tableContainer);
        pageDiv.appendChild(footer.cloneNode(true));

        pageDiv.appendChild(pageNumberSpan.cloneNode(true));
        document.body.appendChild(pageDiv);

        window.print();
    }
</script>


</html>
