
$(document).ready(function () {

    var token = $('meta[name="csrf-token"]').attr('content');
    var networking = window.location.origin;

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
            // data: data,
            ajax: {
                url: `${window.location.origin}/api/clients`,
            },
            dataType: 'json',
            columns:
            [{
                data: 'ri_bq',
            },
            {
                data: 'reference',
            },
            {
                data: 'country',
                // render: function (data, type, row) {
                //     if (isNaN(data)) {
                //         console.log(countries[data]);
                //         return countries[data].name;
                //     } else {
                //         return data;
                //     }
                // }
            },
            {
                data: 'contact',
            },
            {
                data: 'region',
            },
            {
                data: 'position',
            },
            {
                data: 'business_line',
            },
            {
                data: 'excluye',
            },
            {
                data: 'email',
                render: function (data, type, row) {
                    return `<a href="mailto:${data}">${data}</a>`;
                }
            },
            {
                data: 'phone_one',
            },
            {
                data: 'phone_two',
            },
            {
                data: 'phone_three',
            },
            {
                data: null,
                render: function (data, type, row) {
                    return `<a data-id=${row.id} class="btn btn-primary edit" role="button"><i class="fa-solid fa-pen-to-square"></i></a>`;
                }
            },
            ],
            orderable: true,
            searchable: true
        }).buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');

    }

    //Edit
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        $(location).attr('href', 'clientes_directos/' + id + '/edit');
    });

    //Delete
    $('body').on('click', '.btn-delete', function (e) {
        e.preventDefault();
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
                        url: window.location.origin + "/clientes_directos/" + id,
                        type: 'DELETE',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function () {
                            //console.log("success");
                            $(location).attr('href', window.location.origin + '/clientes_directos');

                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
            }
        });
    });


    //ajax
    function ajaxSelect(type, url, isMultiple, reference = '') {
        $(type).select2({
            language: 'es',
            tags: true,
            multiple: isMultiple,
            //minimumInputLength:1,
            placeholder: 'Seleccionar',
            type: "post",
            dataType: 'json',
            delay: 250,
            ajax: {
                url: networking + "/api/" + url + "/show",
                dataType: 'json',
                cache: true,
                /* success: function (data) {
                    callback(data);
                }, */
                data: function (params) {
                    return {
                        _token: token,
                        search: params.term,
                        refernce: reference
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },

            },
            cache: true
        }).on("select2:select", function (e) {
            var select_val = $(e.currentTarget).val();
            //var select_trigger = $(e.currentTarget).text();
            console.log(select_val);
            switch (select_val) {
                case "new_excluye":
                    document.getElementById("new-excluye").style.display = "block";
                    break;
                case "new_position":
                    document.getElementById("new-position").style.display = "block";
                    break;
                case "new_contact":
                    document.getElementById("new-contact").style.display = "block";
                    break;
                case "new_reinsurer":
                    document.getElementById("new-reinsurer").style.display = "block";
                    break;
                case "new_region":
                    document.getElementById("new-region").style.display = "block";
                    break;
                default:
                    document.getElementById("new-contact").style.display = "none";
                    document.getElementById("new-position").style.display = "none";
                    /* document.getElementById("new-reinsurer").style.display = "none"; */
                    /* document.getElementById("new-excluye").style.display = "none"; */
                    document.getElementById("new-region").style.display = "none";
                    break;
            }
        });
    }

    ajaxSelect('#select_excluye', 'apiexcluye', true);
    ajaxSelect('#select_position', 'apiposition', false);
    ajaxSelect('#select_contact', 'apicontact', false);
    ajaxSelect('#select_country', 'apicountry', false);
    ajaxSelect('#select_bussines', 'apibussines', true);
    ajaxSelect('#select_reinsurer', 'apireinsurer', false, 'RI');
    ajaxSelect('#select_region', 'apiregion', false);

    function btnState(params, id) {
        $("#btn-add-" + id).on("click", function () {
            //e.preventDefault();

            var newStateVal = $("#input-new-" + id).val();
            console.log(newStateVal);
            $.ajax({
                url: networking + "/api/" + params,
                type: 'POST',
                dataType: 'json',
                data: {
                    name: newStateVal,
                    _token: token,
                },
                success: function (data) {
                    console.log('sucessfull');
                    if ($("#select_" + id).find("option[value='" + data.id + "']").length) {
                        $("#select_" + id).val(newStateVal).trigger("change");
                    } else {
                        var newState = new Option(newStateVal, data.id, true, true);
                        $("#select_" + id).append(newState).trigger('change');
                    }
                    document.getElementById("new-" + id).style.display = "none";
                    //$(location).attr('href', networking + '/adjuster');
                },
                error: function (data) {
                    console.log('Error:', data);

                }

            });

        });
    }

    btnState('apiposition', 'position');
    btnState('apicontact', 'contact');
    btnState('apicontact', 'contact');
    btnState('apiregion', 'region');
    //btnState('excluye');

    $('.btn-cancel').on('click', function () {
        document.getElementById("new-contact").style.display = "none";
        document.getElementById("new-position").style.display = "none";
        document.getElementById("new-reinsurer").style.display = "none";
        document.getElementById("new-region").style.display = "none";
        document.getElementById("new-excluye").style.display = "none";
    });
});


