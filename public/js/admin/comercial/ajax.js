$(document).ready(function () {
    function selectAjax(selector, url, reference = '') {
        $(selector).select2({
            language: 'es',
            tags: true,
            placeholder: 'Seleccionar',
            type: "post",
            dataType: 'json',
            delay: 250,
            ajax: {
                url: window.location.origin + '/api/' + url + '/show',
                dataType: 'json',
                cache: true,
                data: function (params) {
                    return {
                        search: params.term,
                        reference: reference
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
            },
            cache: true
        });
    }

    function getReinsurers(selector, reference = "RI") {
        $(selector).select2({
            language: 'es',
            tags: true,
            placeholder: 'Seleccionar',
            type: "GET",
            dataType: 'json',
            delay: 250,
            ajax: {
                url: window.location.origin + '/api/reinsurers',
                dataType: 'json',
                cache: true,
                data: function (params) {
                    return {
                        reference: reference,
                        search: params.term,
                    };
                },
                processResults: function (response) {
                    return {
                        results: $.map(response.data, function (item) {
                            return {
                                text: item.name,
                                id: item.name
                            }
                        })
                    };
                },
            },
            cache: true
        });
    }


    selectAjax('.select_country', 'apicountry');
    selectAjax('.select_type_coverage', 'apitypecoverage');
    selectAjax('.select_assigned', 'apiuser');
    selectAjax('.select_insurence', 'apiinsurence');
    selectAjax('.select_bank', 'bankApi');

    //Ricardo

    getReinsurers('.select_broker', 'BQ');
    getReinsurers('.select_reinsurer', 'RI');
    getReinsurers('.select_lloyds', 'Lloyds');
    getReinsurers('.select_ag', 'AG');
    getReinsurers('.select_cedente', 'insurers');

});
