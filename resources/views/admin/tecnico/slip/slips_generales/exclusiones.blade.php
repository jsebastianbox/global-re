<div class="tableContainer">
    <table id="exclusionesAdicionalesTable" class="indemnizacionTable">
        <thead>
            <tr>
                <th style="text-align: center; width: 42px;">#</th>
                <th style="text-align: center">Exclusiones</th>
                <th style="text-align: center">Campo adicional</th>
                <th style="text-align: center">USD</th>
                <th style="text-align: center">Campo adicional</th>
                <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1"
                    aria-label="Add row">

                    <button type="button" onclick="addRowExclusion(event)" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                </th>
            </tr>
        </thead>
        {{-- tbody --}}
        <tbody id="exclusionesAdicionalesTableBody">

            <tr>
                <td>1</td>
                <td>
                    <textarea name="description_exclusion_additional[]"></textarea>
                </td>
                <td>
                    <input type="text" placeholder="..." name="exclusion_additional_additional[]">
                </td>
                <td>
                    <input type="number" placeholder="0" name="exclusion_additional_usd[]">
                </td>
                <td>
                    <input type="text" placeholder="..." name="exclusion_additional_additional2[]">
                </td>
            </tr>

        </tbody>

    </table>
</div>
