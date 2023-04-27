<div class="tableContainer" style="margin: 2rem 0">
    <table id="aviacion_licenciaCoberturasAdicionalesTable" class="indemnizacionTable">
        <caption>No olvidar de llenar mínimo una cobertura.</caption>
        <thead>
            <tr>
                <th style="text-align: center; width: 42px;">#</th>
                <th style="text-align: center">Coberturas</th>
                <th style="text-align: center">Campo adicional</th>
                <th style="text-align: center">USD</th>
                <th style="text-align: center">Campo adicional</th>
                <th style="text-align: center">Suma Asegurada</th>
                <th style="text-align: center">No. Asegurados</th>
                <th style="text-align: center">Total Valor Asegurado</th>
                <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                    <button type="button" onclick="addRowCoberturaV3(event, 'aviacion_licencia', 'aviacion', 'pl')" class="btn btn-success btn-xs">
                        +
                    </button>
                </th>
            </tr>
        </thead>
        {{-- tbody --}}
        <tbody id="aviacion_licenciaCoberturasAdicionalesTableBody">
            @if ($count > 0))
                @foreach ($coverages_pilots as $key => $item)
                    <tr>
                        <td>1</td>
                        <td>
                            <select name="description_coverage_additional[]"{{--  class="selectCobertura" --}} disabled>
                                @foreach ($coberturasSelect as $coberturaSelect)
                                    <option value="{{ $coberturaSelect->name }}" 
                                            @if ($coberturaSelect->id == $item->description_coverage_additional) 
                                                selected
                                            @elseif($coberturaSelect->name == $item->description_coverage_additional)
                                            selected
                                            @endif >
                                        {{ $coberturaSelect->name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="text" value="{{$item->coverage_additional_additional}}" name="coverage_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" step="any" value="{{$item->coverage_additional_usd}}" name="coverage_additional_usd[]" data-money>
                        </td>
                        <td>
                            <input type="text" value="{{$item->coverage_additional_additional2}}" name="coverage_additional_additional2[]">
                        </td>
                        <td>
                            <input  value="{{$item->sum_assured}}" onkeyup="actualizarTotalAsegurado(1, 'aviacion_licenciaCoberturasAdicionalesTable')" name="sum_assured[]" class="row1" type="number" step="any" >
                        </td>
                        <td>
                            <input  value="{{$item->pilots_quantity}}" onkeyup="actualizarTotalAsegurado(1, 'aviacion_licenciaCoberturasAdicionalesTable')" name="pilots_quantity[]" class="row1" type="number" step="any" >
                        </td>
                        <td>
                            <input  value="{{$item->total_assured}}" onkeyup="actualizarTotalAsegurado(1, 'aviacion_licenciaCoberturasAdicionalesTable')" name="total_assured[]" class="rowTotal1" type="number" step="any" >
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>1</td>
                    <td>
                        <select name="description_coverage_additional[]" class="selectCobertura">
                            <option selected disabled>Seleccionar</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" placeholder="..." name="coverage_additional_additional[]">
                    </td>
                    <td>
                        <input type="number" step="any" placeholder="0" name="coverage_additional_usd[]" data-money>
                    </td>
                    <td>
                        <input type="text" placeholder="..." name="coverage_additional_additional2[]">
                    </td>
                    <td>
                        <input onkeyup="actualizarTotalAsegurado(1, 'aviacion_licenciaCoberturasAdicionalesTable')" name="sum_assured[]" class="row1" type="number" step="any" >
                    </td>
                    <td>
                        <input onkeyup="actualizarTotalAsegurado(1, 'aviacion_licenciaCoberturasAdicionalesTable')" name="pilots_quantity[]" class="row1" type="number" step="any" >
                    </td>
                    <td>
                        <input onkeyup="actualizarTotalAsegurado(1, 'aviacion_licenciaCoberturasAdicionalesTable')" name="total_assured[]" class="rowTotal1" type="number" step="any" >
                    </td>
                </tr> 
            @endif

        </tbody>

    </table>
</div>