<div class="tableContainer">
    <table id="coberturasAdicionalesTable" class="indemnizacionTable">
        <thead>
            <tr>
                <th style="text-align: center; width: 42px;">#</th>
                <th style="text-align: center">Coberturas</th>
                <th style="text-align: center">Campo adicional</th>
                <th style="text-align: center">USD</th>
                <th style="text-align: center">Campo adicional</th>
                <th style="text-align: center; width: 42px;" class="sorting_" rowspan="1" colspan="1"
                    aria-label="Add row">

                    <button type="button" onclick="addRowCoberturaV2(event)" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                </th>
            </tr>
        </thead>
        {{-- tbody --}}
        <tbody id="coberturasAdicionalesTableBody">

            @if (count($slip->coverage_additional) > 0)
                @foreach ($slip->coverage_additional as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <select name="description_coverage_additional[]" class="selectCobertura">
                                <option value="{{ $coberturas->find('coberturas_selectors') }}">
                                    {{ $coberturas->find($item->coberturas_selectors)->name }}
                                </option>
                            </select>
                            {{-- <textarea name="description_coverage_additional[]">{{ $item->description_coverage_additional }}</textarea> --}}
                        </td>
                        <td>
                            <input type="text" value="{{ $item->coverage_additional_additional }}"
                                name="coverage_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" value="{{ $item->coverage_additional_usd }}"
                                name="coverage_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" value="{{ $item->coverage_additional_additional2 }}"
                                name="coverage_additional_additional2[]">
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>1</td>
                    <td>
                        <select name="description_coverage_additional[]" class="selectCobertura">
                            <option value="{{ $coberturas->find('coberturas_selectors') }}">
                                {{ $coberturas->find('coberturas_selectors') }}
                            </option>
                        </select>
                        {{-- <textarea name="description_coverage_additional[]"></textarea> --}}
                    </td>
                    <td>
                        <input type="text" placeholder="..." name="coverage_additional_additional[]">
                    </td>
                    <td>
                        <input type="number" placeholder="0" name="coverage_additional_usd[]">
                    </td>
                    <td>
                        <input type="text" placeholder="..." name="coverage_additional_additional2[]">
                    </td>
                </tr>
            @endif

        </tbody>

    </table>
</div>
