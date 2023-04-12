
$(document).ready(function () {

    var token = $('meta[name="csrf-token"]').attr('content');
    var hosting = window.location.origin;

    // DataTable
    $('#example').DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        dom: "Bfrtip",
        lengthChange: true,
        orderable: true,
        searchable: true,
        buttons: [
            'colvis',
            'copyHtml5',
            'csvHtml5',
            'excelHtml5',
            'print'
        ],
        ajax: {
            url: "user/show",
        },
        dataType: 'json',
        type: "POST",
        columns: [
            {
                data: 'id',
                name: 'id',
                className: "text-center",
                width: "75px",
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'surname',
                name: 'surname'
            },
            {
                data: 'email',
                name: 'email',
                render: function (data, type, row) {
                    return '<a href="mailto:' + data + '">' + data + '</a>';
                }
            },
            {
                data: 'role',
                name: 'role',
                render: function (data, type, row) {
                    let name = '';
                    switch (data) {
                        case 'admin':
                            name = 'Administrador';
                            break;
                        case 'tecnico':
                            name = 'Técnico';
                            break;
                        case 'comercial':
                            name = 'Comercial';
                            break;
                        case 'siniestros':
                            name = 'Siniestros';
                            break;

                        default:
                            break;
                    }
                    return name;
                }
            },
            {
                data: 'sex',
                name: 'sex'
            },
            {
                data: 'id',
                name: 'action',
                className: 'text-center',
                render: function (data, type, row) {
                    return `
                    <div class="d-flex justify-content-evenly">
                      <a href="/user/${data}/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                      <button class="btn btn-danger btn-delete" data-id="${data}"><i class="fa fa-trash"></i></button>
                    </div>
                  `;
                }
            },

        ],
    });

    //Edit
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        $(location).attr('href', 'user/' + id + '/edit');
    });

    //Delete
    $('body').on('click', '.btn-danger', function () {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Eliminar',
            text: "¿Estas seguro?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'Accept': 'application/json'
                    }
                });
                $.ajax(
                    {
                        url: window.location.origin + "/api/users/" + id,
                        type: 'POST',
                        data: {
                            "id": id,
                            "_token": token,
                            "_method": "DELETE"
                        },
                        success: function () {
                            Swal.fire({
                                icon: 'success',
                                title: '¡Eliminado!',
                                text: 'El usuario ha sido eliminado exitosamente',
                                timer: 2500,
                                didClose: () => {
                                    $(location).attr('href', window.location.origin + '/user');
                                }
                            });
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
            }
        })
    });

    //ajax
    function ajaxSelect(type, url) {
        $(type).select2({
            language: 'es',
            tags: true,
            //minimumInputLength:1,
            placeholder: 'Seleccionar',
            type: "post",
            dataType: 'json',
            delay: 250,
            ajax: {
                url: hosting + "/api/" + url + "/show",
                dataType: 'json',
                cache: true,
                /* success: function (data) {
                    callback(data);
                }, */
                data: function (params) {
                    return {
                        _token: token,
                        search: params.term
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
            //console.log(select_val);
            switch (select_val) {
                case "new_position":
                    document.getElementById("new-position").style.display = "block";
                    document.getElementById("new-contact").style.display = "none";
                    document.getElementById("new-adjuster").style.display = "none";
                    break;
                case "new_contact":
                    document.getElementById("new-contact").style.display = "block";
                    document.getElementById("new-position").style.display = "none";
                    document.getElementById("new-adjuster").style.display = "none";
                    break;
                case "new_adjuster":
                    document.getElementById("new-contact").style.display = "none";
                    document.getElementById("new-position").style.display = "none";
                    document.getElementById("new-adjuster").style.display = "block";
                    break;
                default:
                    document.getElementById("new-contact").style.display = "none";
                    document.getElementById("new-position").style.display = "none";
                    document.getElementById("new-adjuster").style.display = "none";
                    break;
            }
        });
    }

    ajaxSelect('#select_position', 'apiposition');
    ajaxSelect('#select_contact', 'apicontact');
    ajaxSelect('#select_country', 'apicountry', false);
    ajaxSelect('#select_adjuster', 'apiadjuster');

    function btnState(params, url) {
        $("#btn-add-" + params).on("click", function () {

            var newStateVal = $("#input-new-" + params).val();
            console.log(newStateVal);
            $.ajax({
                url: window.location.origin + "/api/" + url,
                type: 'POST',
                dataType: 'json',
                data: {
                    name: newStateVal,
                    _token: token,
                },
                success: function (data) {
                    if ($("#select_" + params).find("option[value='" + data.id + "']").length) {
                        $("#select_" + params).val(newStateVal).trigger("change");
                    } else {
                        var newState = new Option(newStateVal, data.id, true, true);
                        $("#select_" + params).append(newState).trigger('change');
                    }
                    document.getElementById("new-position").style.display = "none";
                    document.getElementById("new-contact").style.display = "none";
                    //$(location).attr('href', window.location.origin + '/adjuster');
                },
                error: function (data) {
                    console.log('Error:', data);

                }

            });

        });
    }

    btnState('position', 'apiposition');
    btnState('contact', 'apicontact');

    //nombre de la empresa
    function addNameReinsurer(params) {
        $("#btn-add-" + params).on("click", function () {

            var newStateVal = $("#input-new-" + params).val();
            console.log(newStateVal);
            if ($("#select_" + params).find("option[value='" + newStateVal + "']").length) {
                $("#select_" + params).val(newStateVal).trigger("change");
            } else {
                var newState = new Option(newStateVal, newStateVal, true, true);
                $("#select_" + params).append(newState).trigger('change');
            }
            document.getElementById("new-position").style.display = "none";
            document.getElementById("new-contact").style.display = "none";
            document.getElementById("new-adjuster").style.display = "none";
        });
    }

    addNameReinsurer('adjuster');

});

/* jQuery('#state').remove();
                    jQuery('#state').select2({
                        placeholder: "Placeholder text",
                        allowClear: true
                    }); */
