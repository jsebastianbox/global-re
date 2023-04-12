const table = document.querySelector('#orden_pago_table');
const data = [
    {
        "SINIESTRO #": "SIN-10",
        "REFERENCIA CIA. SEGUROS": "20-0000630-2016",
        "FECHA DEL SINIESTRO": "9/20/2016",
        "VALOR DE LA PÉRDIDA": "27,844.00",
        "DEDUCIBLE  (-)": "2,784.40",
        "R.A.S.A.  (-)": "",
        "DEPRECIACIÓN 12% (-)": "3,341.28",
        "TOTAL A LIQUIDAR": "21,718.32",
        "VALOR HONORARIOS AJUSTADOR": "",
        "PARTICIPACIÓN 50%": "10,859.16",
        "ISD CHUBB 2.5%": "271.48",
        "TOTAL PAGADO CHUBB POR PARTICIPACION": "10,587.68",
        "ISD ASUMIR GLOBAL 2.5%": "271.48"
    },
    {
        "SINIESTRO #": "SIN-11",
        "REFERENCIA CIA. SEGUROS": "20-0000641-2016",
        "FECHA DEL SINIESTRO": "9/22/2016",
        "VALOR DE LA PÉRDIDA": "915.00",
        "DEDUCIBLE  (-)": "500.00",
        "R.A.S.A.  (-)": "",
        "DEPRECIACIÓN 12% (-)": "109.80",
        "TOTAL A LIQUIDAR": "305.20",
        "VALOR HONORARIOS AJUSTADOR": "",
        "PARTICIPACIÓN 50%": "152.60",
        "ISD CHUBB 2.5%": "3.82",
        "TOTAL PAGADO CHUBB POR PARTICIPACION": "148.79",
        "ISD ASUMIR GLOBAL 2.5%": "3.82"
    },
    {
        "SINIESTRO #": "SIN-13",
        "REFERENCIA CIA. SEGUROS": "20-0000667-2016",
        "FECHA DEL SINIESTRO": "10/2/2016",
        "VALOR DE LA PÉRDIDA": "34,883.71",
        "DEDUCIBLE  (-)": "3,488.37",
        "R.A.S.A.  (-)": "",
        "DEPRECIACIÓN 12% (-)": "4,186.05",
        "TOTAL A LIQUIDAR": "27,929.29",
        "VALOR HONORARIOS AJUSTADOR": "720.00",
        "PARTICIPACIÓN 50%": "13,964.65",
        "ISD CHUBB 2.5%": "349.12",
        "TOTAL PAGADO CHUBB POR PARTICIPACION": "13,615.53",
        "ISD ASUMIR GLOBAL 2.5%": "349.12"
    },
    {
        "SINIESTRO #": "SIN-14",
        "REFERENCIA CIA. SEGUROS": "20-0000676-2016",
        "FECHA DEL SINIESTRO": "10/7/2016",
        "VALOR DE LA PÉRDIDA": "1,645.59",
        "DEDUCIBLE  (-)": "500.00",
        "R.A.S.A.  (-)": "",
        "DEPRECIACIÓN 12% (-)": "197.47",
        "TOTAL A LIQUIDAR": "948.12",
        "VALOR HONORARIOS AJUSTADOR": "",
        "PARTICIPACIÓN 50%": "474.06",
        "ISD CHUBB 2.5%": "11.85",
        "TOTAL PAGADO CHUBB POR PARTICIPACION": "462.21",
        "ISD ASUMIR GLOBAL 2.5%": "11.85"
    },
    {
        "SINIESTRO #": "SIN-17",
        "REFERENCIA CIA. SEGUROS": "20-0000709-2016",
        "FECHA DEL SINIESTRO": "10/26/2016",
        "VALOR DE LA PÉRDIDA": "1,645.59",
        "DEDUCIBLE  (-)": "500.00",
        "R.A.S.A.  (-)": "",
        "DEPRECIACIÓN 12% (-)": "197.47",
        "TOTAL A LIQUIDAR": "948.12",
        "VALOR HONORARIOS AJUSTADOR": "",
        "PARTICIPACIÓN 50%": "474.06",
        "ISD CHUBB 2.5%": "11.85",
        "TOTAL PAGADO CHUBB POR PARTICIPACION": "462.21",
        "ISD ASUMIR GLOBAL 2.5%": "11.85"
    },
    {
        "SINIESTRO #": "SIN-19",
        "REFERENCIA CIA. SEGUROS": "20-0000711-2016",
        "FECHA DEL SINIESTRO": "10/29/2016",
        "VALOR DE LA PÉRDIDA": "5,805.00",
        "DEDUCIBLE  (-)": "580.50",
        "R.A.S.A.  (-)": "",
        "DEPRECIACIÓN 12% (-)": "696.60",
        "TOTAL A LIQUIDAR": "4,527.90",
        "VALOR HONORARIOS AJUSTADOR": "",
        "PARTICIPACIÓN 50%": "2,263.95",
        "ISD CHUBB 2.5%": "56.60",
        "TOTAL PAGADO CHUBB POR PARTICIPACION": "2,207.35",
        "ISD ASUMIR GLOBAL 2.5%": "56.60"
    },
    {
        "SINIESTRO #": "SIN-20",
        "REFERENCIA CIA. SEGUROS": "20-0000802-2016",
        "FECHA DEL SINIESTRO": "10/31/2016",
        "VALOR DE LA PÉRDIDA": "16,554.00",
        "DEDUCIBLE  (-)": "1,655.40",
        "R.A.S.A.  (-)": "",
        "DEPRECIACIÓN 12% (-)": "1,986.48",
        "TOTAL A LIQUIDAR": "12,912.12",
        "VALOR HONORARIOS AJUSTADOR": "",
        "PARTICIPACIÓN 50%": "6,456.06",
        "ISD CHUBB 2.5%": "161.40",
        "TOTAL PAGADO CHUBB POR PARTICIPACION": "6,294.66",
        "ISD ASUMIR GLOBAL 2.5%": "161.40"
    },
    {
        "SINIESTRO #": "SIN-21",
        "REFERENCIA CIA. SEGUROS": "20-0000807-2016",
        "FECHA DEL SINIESTRO": "11/5/2016",
        "VALOR DE LA PÉRDIDA": "915.00",
        "DEDUCIBLE  (-)": "500.00",
        "R.A.S.A.  (-)": "",
        "DEPRECIACIÓN 12% (-)": "109.80",
        "TOTAL A LIQUIDAR": "305.20",
        "VALOR HONORARIOS AJUSTADOR": "",
        "PARTICIPACIÓN 50%": "152.60",
        "ISD CHUBB 2.5%": "3.82",
        "TOTAL PAGADO CHUBB POR PARTICIPACION": "148.79",
        "ISD ASUMIR GLOBAL 2.5%": "3.82"
    },
    {
        "SINIESTRO #": "SIN-24",
        "REFERENCIA CIA. SEGUROS": "20-0000810-2016",
        "FECHA DEL SINIESTRO": "11/14/2016",
        "VALOR DE LA PÉRDIDA": "37,168.00",
        "DEDUCIBLE  (-)": "3,716.80",
        "R.A.S.A.  (-)": "",
        "DEPRECIACIÓN 12% (-)": "4,460.16",
        "TOTAL A LIQUIDAR": "28,991.04",
        "VALOR HONORARIOS AJUSTADOR": "",
        "PARTICIPACIÓN 50%": "14,495.52",
        "ISD CHUBB 2.5%": "362.39",
        "TOTAL PAGADO CHUBB POR PARTICIPACION": "14,133.13",
        "ISD ASUMIR GLOBAL 2.5%": "362.39"
    },
    {
        "SINIESTRO #": "SIN-27",
        "REFERENCIA CIA. SEGUROS": "20-0000824-2016",
        "FECHA DEL SINIESTRO": "12/12/2016",
        "VALOR DE LA PÉRDIDA": "1,859.52",
        "DEDUCIBLE  (-)": "500.00",
        "R.A.S.A.  (-)": "",
        "DEPRECIACIÓN 12% (-)": "223.14",
        "TOTAL A LIQUIDAR": "1,136.38",
        "VALOR HONORARIOS AJUSTADOR": "",
        "PARTICIPACIÓN 50%": "568.19",
        "ISD CHUBB 2.5%": "14.20",
        "TOTAL PAGADO CHUBB POR PARTICIPACION": "553.98",
        "ISD ASUMIR GLOBAL 2.5%": "14.20"
    },
    {
        "SINIESTRO #": "SIN-42",
        "REFERENCIA CIA. SEGUROS": "20-0000170-2017",
        "FECHA DEL SINIESTRO": "3/4/2017",
        "VALOR DE LA PÉRDIDA": "1,762.55",
        "DEDUCIBLE  (-)": "500.00",
        "R.A.S.A.  (-)": "",
        "DEPRECIACIÓN 12% (-)": "211.51",
        "TOTAL A LIQUIDAR": "1,051.04",
        "VALOR HONORARIOS AJUSTADOR": "",
        "PARTICIPACIÓN 50%": "525.52",
        "ISD CHUBB 2.5%": "13.14",
        "TOTAL PAGADO CHUBB POR PARTICIPACION": "512.38",
        "ISD ASUMIR GLOBAL 2.5%": "13.14"
    },
    {
        "SINIESTRO #": "SIN-45",
        "REFERENCIA CIA. SEGUROS": "20-0000193-2017",
        "FECHA DEL SINIESTRO": "3/4/2017",
        "VALOR DE LA PÉRDIDA": "5,152.00",
        "DEDUCIBLE  (-)": "515.20",
        "R.A.S.A.  (-)": "",
        "DEPRECIACIÓN 12% (-)": "618.24",
        "TOTAL A LIQUIDAR": "4,018.56",
        "VALOR HONORARIOS AJUSTADOR": "",
        "PARTICIPACIÓN 50%": "2,009.28",
        "ISD CHUBB 2.5%": "50.23",
        "TOTAL PAGADO CHUBB POR PARTICIPACION": "1,959.05",
        "ISD ASUMIR GLOBAL 2.5%": "50.23"
    },
    {
        "SINIESTRO #": "SIN-46 ",
        "REFERENCIA CIA. SEGUROS": "20-0000255-2017",
        "FECHA DEL SINIESTRO": "3/12/2017",
        "VALOR DE LA PÉRDIDA": "9,005.00",
        "DEDUCIBLE  (-)": "900.50",
        "R.A.S.A.  (-)": "",
        "DEPRECIACIÓN 12% (-)": "1,080.60",
        "TOTAL A LIQUIDAR": "7,023.90",
        "VALOR HONORARIOS AJUSTADOR": "",
        "PARTICIPACIÓN 50%": "3,511.95",
        "ISD CHUBB 2.5%": "87.80",
        "TOTAL PAGADO CHUBB POR PARTICIPACION": "3,424.15",
        "ISD ASUMIR GLOBAL 2.5%": "87.80"
    },
    {
        "SINIESTRO #": "SIN-78",
        "REFERENCIA CIA. SEGUROS": "20-0000697-2017",
        "FECHA DEL SINIESTRO": "9/10/2017",
        "VALOR DE LA PÉRDIDA": "2,529.69",
        "DEDUCIBLE  (-)": "500.00",
        "R.A.S.A.  (-)": "",
        "DEPRECIACIÓN 12% (-)": "",
        "TOTAL A LIQUIDAR": "2,556.36",
        "VALOR HONORARIOS AJUSTADOR": "526.67",
        "PARTICIPACIÓN 50%": "2,530.80",
        "ISD CHUBB 2.5%": "63.27",
        "TOTAL PAGADO CHUBB POR PARTICIPACION": "2,467.53",
        "ISD ASUMIR GLOBAL 2.5%": "63.27"
    },
    {
        "SINIESTRO #": "SIN-90",
        "REFERENCIA CIA. SEGUROS": "20-6000405-2017",
        "FECHA DEL SINIESTRO": "11/20/2017",
        "VALOR DE LA PÉRDIDA": "1,955.52",
        "DEDUCIBLE  (-)": "500.00",
        "R.A.S.A.  (-)": "",
        "DEPRECIACIÓN 12% (-)": "",
        "TOTAL A LIQUIDAR": "2,000.52",
        "VALOR HONORARIOS AJUSTADOR": "545.00",
        "PARTICIPACIÓN 50%": "1,980.51",
        "ISD CHUBB 2.5%": "49.51",
        "TOTAL PAGADO CHUBB POR PARTICIPACION": "1,931.00",
        "ISD ASUMIR GLOBAL 2.5%": "49.51"
    }
];

data.forEach(registro => {
    const tr = document.createElement('tr');

    for (const key in registro) {
        const td = document.createElement('td');
        console.log(registro[key])
        if (key === " TOTAL PAGADO CHUBB POR PARTICIPACION" || key === " ISD ASUMIR GLOBAL 2.5%") {
            td.textContent = registro[key];
        } else {
            td.textContent = registro[key];
        }
        tr.appendChild(td);
    }
    table.querySelector('tbody').appendChild(tr);
});

$(document).ready(function () {
    $('#orden_pago_table').DataTable({
        "searching": true, // enable/disable search bar
        "ordering": true, // enable/disable sorting
        "paging": true, // enable/disable pagination
        "lengthChange": true, // enable/disable rows per page select
        "info": true, // enable/disable table info display
        "dom": 'Bfrtip', // show buttons at the bottom
        buttons: [
            'copyHtml5',
            'csvHtml5',
            {
                extend: 'excelHtml5',
                autoFilter: true,
                sheetName: 'Exported data'
            },
            {
                extend: 'pdfHtml5',
                // orientation: 'landscape',
                // pageSize: 'LEGAL'
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ],
        columnDefs: [{
            targets: -1,
            visible: false
        }],
        fixedHeader: true,
        scrollY: 650,
        deferRender: true,
        scroller: true,
    });
});
