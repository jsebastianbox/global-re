
$(document).ready(function () {

    var token = $('meta[name="csrf-token"]').attr('content');
    var networking = window.location.origin;

    //Edit
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        $(location).attr('href', 'adjuster/edit/' + id );
    });

    //Delete
    $('body').on('click', '.btn-delete', function () {
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
                        url: window.location.origin + "/adjuster/" + id,
                        type: 'DELETE',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function () {
                            //console.log("success");
                            $(location).attr('href', window.location.origin + '/adjuster');
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
                    document.getElementById("new-reinsurer").style.display = "none";
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

    //excluye no
    var i = 0;
    $('#btn-add-row-excluye').click(function (e) {
        e.preventDefault();
        i++;

        $('#newDataExcluye').append(
            '<div class="input--label" id ="newRowExcluye' + i + '">' +
            '    <label class="labelForm" for="">Excluye ' + i + ' ' +
            '        <button id=' + i + ' type="button" class="btn btn-danger btn-xs btn-delate-cedente">X</button>' +
            '       <select id= "select_excluye_' + i + '"class="js-example-basic-single inputForm" name="excluye_id[]">' +
            '       </select>' +
            '    </label>' +
            '</div>'
        );

        alert('alert_' + i, 'alert_view_' + i);

        gettext('alert_view_' + i, 'alert_text_' + i);

    });

    function alert(id, view) {
        $('#' + id).on("click", function () {
            document.getElementById(view).style.display = "block";
        });
    }

    function gettext(id, text) {

        $('#' + id).click(function (e) {
            e.preventDefault();
            var newStateVal = $('#' + text).val();
            console.log(newStateVal);
        });
        /* $('#'+id).on("click", function () {
            //alert(newStateVal);


        }); */
    }

    $(document).on('click', '.btn-delate-cedente', function (e) {

        e.preventDefault();
        var id = $(this).attr('id');
        $('#newRowExcluye' + id).remove();
    });

    //addexcluye

    function addExcluyeReinsurer(params, id) {
        $("#btn-add-" + id).on("click", function () {

            var newStateVal = $("#input-new-" + id).val();
            console.log(params);
            if ($("#select_" + params).find("option[value='" + newStateVal + "']").length) {
                $("#select_" + params).val(newStateVal).trigger("change");
            } else {
                var newState = new Option(newStateVal, newStateVal, true, true);
                $("#select_" + params).append(newState).trigger('change');
            }
            document.getElementById("new-excluye").style.display = "none";
        });
    }

    //name company

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
            document.getElementById("new-reinsurer").style.display = "none";
        });
    }

    addNameReinsurer('reinsurer');

    //                                              Ricardo                                            //

    //Filtrar solo por reaseguradores y aseguradores

    $('#reinsurer-type-filter').select2({
        ajax: {
            url: networking + "/api/apireinsurer/show",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    type: params.term,
                    page: params.page
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: data.items.filter(item => item.reference === "Lloyds"),
                    // results: data.items.filter(item => item.reference === "RI" || item.reference === "BQ"),
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        placeholder: '-- Selecciona --',
        minimumInputLength: 1
    });

});
