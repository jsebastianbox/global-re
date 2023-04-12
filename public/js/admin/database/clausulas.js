
$(document).ready(function () {

    var token = $('meta[name="csrf-token"]').attr('content');
    var hosting = window.location.origin;

    console.log(hosting);

    // DataTable
    if (typeof data != 'undefined') {
        $('#example').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
            },
            dom: "Bfrtip",
            lengthChange: false,
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
            columns: [
            {
                data: 'nomenclatura'
            },
            {
                data: 'title'
            },
            {
                data: 'languages'
            },
            {
                data: 'coverages'
            },
            {
                data: 'created_at'
            },
            {
                data:'null',
                render: function(data, type, row) {
                    return `<a data-id=${row.id} class="btn btn-primary edit" role="button"><i class="fa-solid fa-pen-to-square"></i></a>`;
                }
            },
            {
                data:'null',
                render: function(data, type, row) {
                    return `<a href="/download/${row.id}" class="btn btn-primary edit" role="button"><i class="fa-sharp fa-solid fa-download"></i></a>`;
                }
            },
            ]
        }).buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    }

    //Edit
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        $(location).attr('href', 'clausulas/' + id + '/edit');
    });

    //Delete
    $('body').on('click', '.btn-delete', function () {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Eliminar',
            text: "¿Estás seguro?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminarlo!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax(
                    {
                        url: window.location.origin + "/clausulas/" + id,
                        type: 'DELETE',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function () {
                            $(location).attr('href', window.location.origin + '/clausulas');
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
            }
        });
    });
});

