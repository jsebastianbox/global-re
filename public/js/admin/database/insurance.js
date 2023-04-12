//require('./bootstrap');
//Compania de seguros
$(document).ready(function () {

    var token = $('meta[name="csrf-token"]').attr('content');
    var hosting = window.location.origin;

    if (typeof data != 'undefined') {
        // DataTable
        $('#example').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
            },
            dom: "Bfrtip",
            lengthChange: true,
            buttons: [
                'colvis',
                'copyHtml5',
                'csvHtml5',
                'excelHtml5',
                'pdfHtml5',
                'print'
            ],
            // ajax: {
            //     url: "insurance/show",
            // },
            data: data,
            dataType: 'json',
            columns: [
                {
                    data: 'name', defaultContent: "N/A",
                    render: function (data, type, row) {
                        return (data === '') ? 'N/A' : data;
                    }
                },
                {
                    data: 'registered_name', defaultContent: "N/A",
                    render: function (data, type, row) {
                        return (data === '') ? 'N/A' : data;
                    }
                },
                {
                    data: 'coverage', defaultContent: "N/A",
                    render: function (data, type, row) {
                        return (data === '') ? 'N/A' : data;
                    }
                },
                {
                    data: 'country', defaultContent: "N/A",
                    render: function (data, type, row) {
                        return (data === '') ? 'N/A' : data;
                    }
                },
                {
                    data: 'contact', defaultContent: "N/A",
                    render: function (data, type, row) {
                        return (data === '') ? 'N/A' : data;
                    }
                },
                {
                    data: 'position', defaultContent: "N/A",
                    render: function (data, type, row) {
                        return (data === '') ? 'N/A' : data;
                    }
                },
                // {
                //     data: 'branch',
                //     //name: 'branch[]',
                //     render: function (data, type, row) {
                //         let branch = [];

                //         data.forEach(element => {
                //             //console.log(element.name);
                //             branch.push(element.name);
                //         });

                //         return branch;
                //     }
                // },
                {
                    data: 'email', defaultContent: 'N/A',
                    render: function (data, type, row) {
                        return (data === '') ? 'N/A' : data;
                    }
                },
                {
                    data: 'phone', defaultContent: 'N/A',
                    render: function (data, type, row) {
                        return (data === '') ? 'N/A' : data;
                    }
                },
                {
                    data: 'phone_two', defaultContent: 'N/A',
                    render: function (data, type, row) {
                        return (data === '') ? 'N/A' : data;
                    }
                },
                {
                    data: 'phone_three', defaultContent: 'N/A',
                    render: function (data, type, row) {
                        return (data === '') ? 'N/A' : data;
                    }
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
        $(location).attr('href', 'insurance/' + id + '/edit');
    });

    //Delete
    $('body').on('click', '.btn-delete', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        Swal.fire({
            title: 'Eliminar',
            text: "¿Estas seguro?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminarlo!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax(
                    {
                        url: window.location.origin + "/insurance/" + id,
                        type: 'DELETE',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function () {
                            console.log("success");
                            $(location).attr('href', window.location.origin + '/insurance');
                            //history.back();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
            }
        })
    });

    //ajax
    function ajaxSelect(type, url, isMultiple) {
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
                //url : "http://127.0.0.1:8000/"+"selectinsurance",
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
            //var select_trigger = $(e.currentTarget).text();
            console.log(select_val);
            switch (select_val) {
                case "new_position":
                    document.getElementById("new-position").style.display = "block";
                    document.getElementById("new-contact").style.display = "none";
                    document.getElementById("new-insurance").style.display = "none";
                    break;
                case "new_contact":
                    document.getElementById("new-contact").style.display = "block";
                    document.getElementById("new-position").style.display = "none";
                    document.getElementById("new-insurance").style.display = "none";
                    break;
                case "new_insurace":
                    document.getElementById("new-contact").style.display = "none";
                    document.getElementById("new-position").style.display = "none";
                    document.getElementById("new-insurance").style.display = "block";
                    break;
                default:
                    document.getElementById("new-contact").style.display = "none";
                    document.getElementById("new-position").style.display = "none";
                    document.getElementById("new-insurance").style.display = "none";

                    break;
            }
        });
    }

    ajaxSelect('#select_position', 'apiposition', false);
    ajaxSelect('#select_contact', 'apicontact', false);
    ajaxSelect('#select_country', 'apicountry', false);
    ajaxSelect('#select_insurance', 'apiinsurence', false);
    ajaxSelect('#select_branch', 'apibranch', true);

    function btnState(params, id) {
        $("#btn-add-" + id).on("click", function () {
            //e.preventDefault();

            var newStateVal = $("#input-new-" + id).val();
            console.log(newStateVal);
            $.ajax({
                url: window.location.origin + "/api/" + params,
                type: 'POST',
                dataType: 'json',
                data: {
                    name: newStateVal,
                    _token: token,
                },
                success: function (data) {
                    console.log('successfull');
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
    //btnState('insurance');

    function addInsurance(params) {
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
            document.getElementById("new-insurance").style.display = "none";

        });
    }

    addInsurance('insurance');


    $('body').on('click', '#myAlert', function () {
        /* var alertNode = document.querySelector('.alert')
        var alert = bootstrap.Alert.getInstance(alertNode)
        alert.close() */
    });




});

/* jQuery('#state').remove();
                    jQuery('#state').select2({
                        placeholder: "Placeholder text",
                        allowClear: true
                    }); */
