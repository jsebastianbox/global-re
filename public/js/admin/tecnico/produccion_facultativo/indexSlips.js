$(document).ready(function () {



    // DataTable
    $('#example').DataTable({
        //"dom": 'Pfrtip', //solo buscador
        //"dom": 'lrtip',
        "dom": "Bfrtip",
        //"dom": '<"dt-buttons"Bf><"clear">lirtp',
        "searching": true,
        "paging": false,
        "autoWidth": true,
        "columnDefs": [{
            "orderable": false,
            "targets": 5
        }],
        "buttons": [
            'colvis',
            'copyHtml5',
            'csvHtml5',
            'excelHtml5',
            'pdfHtml5',
            'print'
        ]
    });


});

/* let compromisos;
async function getCompromisos() {
    const testURL = window.location.origin + '/api/comercial/compromisos'
    const productionURL = window.location.origin + '/api/comercial/compromisos'
    let response = await fetch( testURL )
    let data = await response.json()
    compromisos = data
    return data
}
getCompromisos()

function editInsured() {
    location.href = "http://127.0.0.1:8000/slip/create"
} */

