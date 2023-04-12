const table = document.querySelector('#compromisos_table tbody');
const headers = [
    'id',
    'created_at',
    'type_coverage',
    'country_id',
    'insurer',
    'validity_since',
    'validity_until',
    'updated_at',
    'user_id',
    'slip_status',
    'action'
];

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

$(document).ready(function () {
    const table = $('#compromisos_table').DataTable({
        processing: true,
        serverSide: false,
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        data: compromisos,
        columns: [
            { data: "id" },
            {
                data: "created_at", render: function (data) {
                    return formatDate(data);
                }
            },
            {
                data: "type_coverage", render: function (data) {
                    return getTypeCoverage(data);
                }
            },
            {
                data: "country_id", render: function (data) {
                    return getCountryName(data);
                }
            },
            { data: "insurer" },
            {
                data: "validity_since", render: function (data) {
                    return formatSecondDate(data);
                }
            },
            {
                data: "validity_until", render: function (data) {
                    return formatSecondDate(data);
                }
            },
            {
                data: "updated_at", render: function (data) {
                    return formatDate(data);
                }
            },
            { data: "slip_status" },
            {
                data: "user_id", render: function (data) {
                    return getUser(data);
                }
            },
            {
                data: "id", render: function (data) {
                    return getActionHtml(data);
                }
            }
        ]
    });

    function formatDate(dateString) {
        const date = new Date(dateString);
        const formattedDate = date.toLocaleDateString('es-MX');
        const parts = formattedDate.split('/');
        const day = parts[0];
        const month = parts[1];
        const year = parts[2];
        const mes = months[parseInt(month) - 1];
        return `${day} de ${mes} de ${year}`;
    }

    function formatSecondDate(dateString) {
        const date = new Date(dateString);
        const formattedDate = date.toLocaleDateString('es-MX');
        const parts = formattedDate.split('/');
        const day = parseInt(parts[0]) + 1;
        const month = parts[1];
        const year = parts[2];
        const mes = months[parseInt(month) - 1];
        return `${day} de ${mes} de ${year}`;
    }

    function getTypeCoverage(value) {
        let text = '';
        $.ajax({
            url: window.location.origin + "/api/apibranch/" + value,
            async: false,
            success: function (data) {
                text = data[0].text;
            }
        });
        return text;
    }

    function getCountryName(countryId) {
        let name = '';
        $.ajax({
            url: window.location.origin + "/api/apicountry",
            async: false,
            success: function (data) {
                name = data[countryId - 1].name;
            }
        });
        return name;
    }

    function getUser(id) {
        let user = '';
        $.ajax({
            url: window.location.origin + "/api/apiuser/" + id,
            async: false,
            success: function (data) {
                user = data[0].text;
            }
        });
        return user;
    }

    function getActionHtml(id) {
        return `<button href="" class="btn btn-info" onclick="location.href('/admin/comercial/edit_compromiso/${id}')" disabled>Editar</button>`;
    }
});
