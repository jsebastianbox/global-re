////////////////////////////////        Fix aside layout        ////////////////////////////
const spans = document.querySelectorAll('ul[class="navList"] > li > div > span')

spans.forEach(item => {
    if (item.classList.contains('navList__subheading-title')) {
        item.style.visibility = "initial";
        item.style.maxHeight = "initial";
        item.style.color = "white";
        item.classList.remove('sublist-hidden')
    }
});

///////////////////////////////////////////////////////////////////////////////////////////
var movementOptions = [
    'Negocio Nuevo',
    'Renovación',
    'Inclusión',
    'Exclusión',
    'Aumento de Suma Asegurada',
    'Disminución de Suma Asegurada',
    'Extensión vigencia',
    'Cancelación'
];


var recordId;
var working_id;
var records = data;
//Información de cada instalamento para mostrar
var ramo;
var rn_variable;
var desde;
var hasta;
var sum_insured;
var bord_number;

var endorsement;

function sendData(current_id, coverage, rn, from, until, sum, borderaux) {
    ramo = coverage;
    rn_variable = rn;
    desde = from;
    hasta = until;
    working_id = current_id;
    sum_insured = sum;
    bord_number = borderaux;
    console.log('Data sent: ', working_id, ramo, desde, hasta, sum, borderaux);
}

$(document).ready(function () {

    $.noConflict(); //Evita que se confunda con todas las versiones de JQuery

    // Tabla principal, de donde se selecciona el Borderaux.
    var recordsTable = $('#recordsTable').DataTable({
        columns: [
            { data: 'id', defaultContent: "N/A" },
            { data: 'coverage', defaultContent: "N/A" },
            { data: 'rn', defaultContent: "N/A" },
            { data: 'bord_number', defaultContent: "N/A" },
            { data: 'from', defaultContent: "N/A" },
            { data: 'until', defaultContent: "N/A" },
            {
                data: null,
                render: function (data, type, row) {
                    return `<button type="button" class="btn selectionBtn" data-id="${row.id}" onclick="sendData('${row.id}','${row.coverage}', '${row.rn}', '${row.from}', '${row.until}', '${row.sum_insured}', '${row.bord_number}')">Seleccionar</button>`;
                }
            }
        ],
        scrollY: "400px",
        scrollCollapse: true,
        searching: true,
        paging: false,
    });

    data.forEach(installation => {
        recordsTable.row.add(installation).draw();
    });

    const buttons = document.querySelectorAll('.selectionBtn');

    console.log(`Records: \n ${JSON.stringify(data, '', 2)}`);

    //Paso el ID de cada botón, aquí se renderizan las otras tablas según el ID obtenido
    buttons.forEach(button => {
        button.addEventListener('click', e => {

            let recordId = e.target.getAttribute('data-id');

            document.getElementById('client-name').innerText = data[recordId-1].insured;

            //Clear elimina todo el contenido (sino se sigue agregando)
            //Destroy elimina la tabla ya que no se puede renderizar
            //Una tabla encima de otra puesto a que se genera una excepción.

            $('#table1').DataTable().clear().destroy();

            let table1 = $('#table1').DataTable({
                columns: [
                    { data: ramo, defaultContent: "N/A" },
                    { data: 'rn', defaultContent: "N/A" },
                    { data: bord_number, defaultContent: "N/A" },
                    { data: 'endorsement', defaultContent: "N/A" },
                    { data: sum_insured, defaultContent: "N/A",
                        render: function (data, type, row) {
                            return new Intl.NumberFormat('en-Us', {
                                style: 'currency',
                                currency: 'USD',
                                maximumFractionDigits: 2,
                            }).format(data);
                        } },
                    { data: 'net_premium', defaultContent: "N/A",
                        render: function (data, type, row) {
                            return new Intl.NumberFormat('en-Us', {
                                style: 'currency',
                                currency: 'USD',
                                maximumFractionDigits: 2,
                            }).format(data);
                        } },
                    { data: desde, defaultContent: "N/A" },
                    { data: hasta, defaultContent: "N/A" },
                    { data: null, render: function (data, type, row, meta) {
                            let recordIdNew = meta.row;
                            let selectedMovement = records[recordIdNew].movements;
                            let selectOptions = movementOptions.map(option => {
                                let selected = option === selectedMovement ? 'selected' : '';
                                return `<option value="${option}" ${selected}>${option}</option>`;
                            }).join('');
                            return `<select class="custom-select">${selectOptions}</select>`;
                        } }
                ],
                scrollY: "400px",
                scrollCollapse: true,
                searching: true,
                paging: false,
            });

            $.ajax({
                type: "GET",
                url: window.origin + "/api/borderouxesInstallationApi?borderouxes_id=" + recordId,
                success: function (response) {
                    console.log(`Response 2: \n ${JSON.stringify(response, '', 2)}`);

                    let options = `<option value="">Selecciona una opción</option>`;
                    response.forEach(record => {
                        options += `<option value="${record.id}">${record.coverage} - ${record.rn}</option>`;
                    });
                    response.forEach(record => {
                        table1.row.add(record).draw();
                    });
                }
            });
        });
    });
});
