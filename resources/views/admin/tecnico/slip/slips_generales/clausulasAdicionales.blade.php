<div class="tableContainer" style="margin: 2rem 0">
    <table id="clausulasAdicionalesTable" class="indemnizacionTable">
        <thead>
            <tr>
                <th style="text-align: center; width: 42px;">#</th>
                <th style="text-align: center">Cláusulas</th>
                <th style="text-align: center">Campo adicional</th>
                <th style="text-align: center">USD</th>
                <th style="text-align: center">Campo adicional</th>
                <th style="text-align: center; width: 42px;" class="sorting_" rowspan="1" colspan="1"
                    aria-label="Add row">

                    <button type="button" onclick="addRowClausula(event)" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                </th>
            </tr>
        </thead>


        {{-- tbody --}}
        <tbody id="clausulasAdicionalesTableBody">

            @if (count($slip->clause_aditional) > 0)
                @foreach ($slip->clause_aditional as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>
                            <textarea name="description_clause_additional[]">{{ $item->description_clause_additional }}</textarea>
                        </td>
                        <td>
                            <input type="text"  name="clause_additional_additional[]"
                                value="{{ $item->clause_additional_additional }}">
                        </td>
                        <td>
                            <input type="number"  name="clause_additional_usd[]"
                                value="{{ $item->clause_additional_usd }}">
                        </td>
                        <td>
                            <input type="text"  name="clause_additional_additional2[]"
                                value="{{ $item->clause_additional_additional2 }}">
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>1</td>
                    <td>
                        <textarea name="description_clause_additional[]"></textarea>
                    </td>
                    <td>
                        <input type="text" placeholder="..." name="clause_additional_additional[]">
                    </td>
                    <td>
                        <input type="number" placeholder="0" name="clause_additional_usd[]">
                    </td>
                    <td>
                        <input type="text" placeholder="..." name="clause_additional_additional2[]">
                    </td>
                </tr>
            @endif


        </tbody>

    </table>
</div>
