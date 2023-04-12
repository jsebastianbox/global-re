<div class="row">
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm " id="reinsurerTable">
            <caption>Lista de Reaseguradores</caption>
            <thead>
                <tr>
                    <th scope="col" >No.</th>
                    <th scope="col" >Reaseguradores</th>
                    <th scope="col" >Suscriptor</th>
                    <th scope="col" >%</th>
                    <th scope="col" >Observaciones</th>
                    <th scope="col" >Fecha de creación</th>
                    <th scope="col" >Fecha de modificación</th>
                    <th><button class="btn btn-md btn-primary" id="addBtn" type="button">+</button></th>
                </tr>
            </thead>
            <tbody id="tbody">
                <tr>
                    {{-- <td class="bs-checkbox "><input data-index="0" name="btSelectItem" type="checkbox"></td> --}}
                    <td id="R1" name="number">1</td>
                    <td>

                        <select class="js-example-basic-single inputForm select_reinsurer" name="reaseguradores">
                        </select>
                    </td>
                    <td><input type="text" name="subscriber" id="subscriber" placeholder="..." /></td>
                    <td><input type="number" name="percentage" id="percent" placeholder="%" /></td>
                    <td>
                        <textarea name="observation" id="observaciones" cols="6" rows="1" placeholder="..."></textarea>
                    </td>
                    <td>
                        <span id="created_at" name="created_at">
                            {{ $slip_type->creation_date != null ? $slip_type->creation_date : date('m/d/Y h:i:s a', time()) }}</span>
                    </td>
                    <td>
                        <span id="modified_at" name="modified_at">
                            {{ $slip_type->update_date != null ? $slip_type->update_date : date('m/d/Y h:i:s a', time()) }}</span>
                    </td>
                    <td>
                        <button class="btn btn-danger remove" type="button" disabled aria-disabled="true">X</button>
                    </td>
                </tr>
            </tbody>
            <caption>
                Ten en cuenta que al modificar cualquier campo, la fecha del mismo será actualizada a la fecha actual.
            </caption>
        </table>
    </div>
</div>

{{-- <select class="js-example-basic-single inputForm select_reinsurer" name="broker">
                    </select> --}}

<script defer src="{{ asset('js/admin/comercial/ajax.js') }}"></script>

<script>
    var token = $('meta[name="csrf-token"]').attr('content');

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
                data: function(params) {
                    return {
                        search: params.term,
                        reference: reference
                    };
                },
                processResults: function(response) {
                    return {
                        results: $.map(response.data, function(item) {
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

    // Denotes total number of rows.
    var rowIdx = 1;
    // jQuery button click event to add a row.
    $('#addBtn').on('click', function() {

        // Adding a row inside the tbody.
        $('#tbody').append(`
        <tr id="R${++rowIdx}">
            <td name="number">${rowIdx}</td>
            <td>
                <select class="js-example-basic-single inputForm select_reinsurer" name="reaseguradores">
                </select>
            </td>
            <td><input type="text" name="subscriber" id="subscriber" placeholder="..."></td>
            <td><input type="number" name="percentage" id="percent" placeholder="%" /></td>
            <td><textarea name="observation" id="observaciones" cols="6" rows="1" placeholder="..."></textarea></td>
            <td><span id="creation_date" name="created_at">{{ $slip_type->creation_date != null ? $slip_type->creation_date : date('m/d/Y h:i:s a', time()) }}</span></td>
            <td><span id="update_date" name="modified_at">{{ $slip_type->update_date != null ? $slip_type->update_date : date('m/d/Y h:i:s a', time()) }}</span></td>
            <td><button class="btn btn-danger remove" type="button">X</button></td>
            </tr>`);

        getReinsurers('.select_reinsurer', 'RI');

        addRowCalculosTable(event, 'calculos')

    });

    // jQuery button click event to remove a row
    $('#tbody').on('click', '.remove', function() {

        // Getting all the rows next to the
        // row containing the clicked button
        var child = $(this).closest('tr').nextAll();

        // Iterating across all the rows
        // obtained to change the index
        child.each(function() {

            // Getting <tr> id.
            var id = $(this).attr('id');

            // Getting the <p> inside the .row-index class.
            var idx = $(this).children('.row-index').children('p');

            // Gets the row number from <tr> id.
            var dig = parseInt(id.substring(1));

            // Modifying row index.
            idx.html(`Row ${dig - 1}`);

            // Modifying row id.
            $(this).attr('id', `R${dig - 1}`);
        });

        // Removing the current row.
        $(this).closest('tr').remove();

        // Decreasing the total number of rows by 1.
        rowIdx--;
    });


    //---------david

    getReinsurers('.select_reinsurer', 'RI');

    //----------end david
</script>
