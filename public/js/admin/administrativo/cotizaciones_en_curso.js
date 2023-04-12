// const btnQuemado = document.getElementById('btnQuemado')
// const tableQuemada = document.getElementById('tableQuemada')
// const tableQuemada2 = document.getElementById('tableQuemada2')


// function abrirTableQuemada() {
// /*  tableQuemada.style.display = 'flex'
//  tableQuemada2.style.display = 'none' */
//  tableQuemada.classList.toggle('aparece')
// }
// function abrirTableQuemada2() {
//  tableQuemada.style.display = 'none'
//  tableQuemada2.style.display = 'flex'
// }
//  btnQuemado.addEventListener('click', () => abrirTableQuemada())

$("#process_table").DataTable({
    language: {
        url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
    },
    dom: "Bfrtip",
    lengthChange: false,
    orderable: true,
    searchable: true,
    buttons: [
        'colvis',
        'copyHtml5',
        'csvHtml5',
        'excelHtml5',
        'pdfHtml5',
        'print'
    ],
    data: data,
    dataType: 'json',
    columns:
        [{
            data: 'id',
        },
        {
            data: 'country_id',
            render: function (data, type, row) {
                var country = countries.find(c => {
                    return c.id == data+1;
                });
                var countryName = country ? country.name : "";
                return countryName;
            }
        },
        {
            data: 'insurer',
        },
        {
            data: 'assignor',
        },
        {
            data: 'type_coverage',
            render: function (data, type, row) {
                var coverage = type_coverages.find(c => {
                    return c.id == data;
                });
                var coverageName = coverage ? coverage.name : "";
                return coverageName;
            }
        },
        {
            data: 'user_id',
            render: function (data, type, row) {
                var user = user_list.find(c => {
                    return c.id == data;
                });
                var userName = user ? user.name : "";
                return userName;
            }
        },
        {
            data: 'slip_status_id',
            render: function (data, type, row) {
                var status = slip_statuses.find(s => {
                    return s.id == data;
                });
                var statusName = status ? status.slip_status : "";
                return statusName;
            }
        },
        ]
});
