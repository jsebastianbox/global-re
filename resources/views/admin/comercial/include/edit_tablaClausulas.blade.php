<div class="tableContainer" style="margin: 2rem 0">
    <table id="ClausulasAdicionalesTable" class="indemnizacionTable">
        <thead>
            <tr>
                <th style="text-align: center; width: 42px;">#</th>
                <th style="text-align: center">Cláusulas</th>
                <th style="text-align: center">Campo adicional</th>
                <th style="text-align: center">USD</th>
                <th style="text-align: center">Campo adicional</th>
                <th style="text-align: center; width: 42px;" class="sorting_" rowspan="1" colspan="1"
                    aria-label="Add row">

                    <button type="button" 
                        onclick="addRowClausula(event, '', 'activos', 'all')" 
                        class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                </th>
            </tr>
        </thead>
        {{-- tbody --}}
        <tbody id="ClausulasAdicionalesTableBody">

            @if (count($slip->clause_aditional) > 0)
                @foreach ($slip->clause_aditional as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <select name="description_clause_additional[]" class="selectClausula">
                                <option selected value="{{ $item->description_clause_aditional }}">
                                    @foreach ($clausulasSelect as $clausulaSelect)
                                        <option value="{{ $clausulaSelect->name }}" 
                                                @if ($clausulaSelect->id == $item->description_clause_additional) 
                                                    selected 
                                                @endif >
                                            {{ $clausulaSelect->name }}
                                        </option>
                                    @endforeach
                                </option>
                            </select>
                        </td>
                        <td>
                            <input type="text" value="{{ $item->clause_additional_additional }}"
                                name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" value="{{ $item->clause_additional_usd }}"
                                name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" value="{{ $item->clause_additional_additional2 }}"
                                name="clause_additional_additional2[]">
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>1</td>
                    <td>
                        <select name="description_clause_additional[]" class="selectClausula">
                        </select>
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
