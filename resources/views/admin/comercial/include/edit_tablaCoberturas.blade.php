<div class="tableContainer" style="margin: 2rem 0">
    <table id="CoberturasAdicionalesTable" class="indemnizacionTable">
        <thead>
            <tr>
                <th style="text-align: center; width: 42px;">#</th>
                <th style="text-align: center">Coberturas</th>
                <th style="text-align: center">Campo adicional</th>
                <th style="text-align: center">USD</th>
                <th style="text-align: center">Campo adicional</th>
                <th style="text-align: center; width: 42px;" class="sorting_" rowspan="1" colspan="1"
                    aria-label="Add row">
                    @switch($slip->type_coverage)
                        @case(1)
                            <button onclick="addRowCoberturaV2(event, '', 'vida','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(2)
                            <button onclick="addRowCoberturaV2(event, '', 'vida','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(3)
                            <button onclick="addRowCoberturaV2(event, '', 'vida','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(4)
                            <button onclick="addRowCoberturaV2(event, '', 'vida','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(5)
                            <button onclick="addRowCoberturaV2(event, '', 'activos','incendio')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(6)
                            <button onclick="addRowCoberturaV2(event, '', 'activos','lucro')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(7)
                            <button onclick="addRowCoberturaV2(event, '', 'activos','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(8)
                            <button onclick="addRowCoberturaV2(event, '', 'activos','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(9)
                            <button onclick="addRowCoberturaV2(event, '', 'tecnico','vehiculos')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(10)
                            <button onclick="addRowCoberturaV2(event, '', 'tecnico','vehiculos')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(11)
                            <button onclick="addRowCoberturaV2(event, '', 'tecnico','electronico')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(12)
                            <button onclick="addRowCoberturaV2(event, '', 'tecnico','rotura_maquinaria')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(13)
                            <button onclick="addRowCoberturaV2(event, '', 'tecnico','beneficios')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(14)
                            <button onclick="addRowCoberturaV2(event, '', 'tecnico','equipo_maquinaria')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(15)
                            <button onclick="addRowCoberturaV2(event, '', 'tecnico','construccion')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(16)
                            <button onclick="addRowCoberturaV2(event, '', 'tecnico','montaje')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(17)
                            <button onclick="addRowCoberturaV2(event, '', 'tecnico','alop')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(18)
                            <button onclick="addRowCoberturaV2(event, '', 'energia','trp')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(19)
                            <button onclick="addRowCoberturaV2(event, '', 'energia','trp')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(20)
                            <button onclick="addRowCoberturaV2(event, '', 'energia','trp')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(21)
                            <button onclick="addRowCoberturaV2(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(22)
                            <button onclick="addRowCoberturaV2(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(23)
                            <button onclick="addRowCoberturaV2(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(24)
                            <button onclick="addRowCoberturaV2(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(25)
                            <button onclick="addRowCoberturaV2(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(26)
                            <button onclick="addRowCoberturaV2(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(27)
                            <button onclick="addRowCoberturaV2(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(28)
                            <button onclick="addRowCoberturaV2(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(29)
                            <button onclick="addRowCoberturaV2(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(30)
                            <button onclick="addRowCoberturaV2(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(31)
                            <button onclick="addRowCoberturaV2(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(32)
                            <button onclick="addRowCoberturaV2(event, '', 'aviacion','casco')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(33)
                            <button onclick="addRowCoberturaV2(event, '', 'aviacion','pl')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(34)
                            <button onclick="addRowCoberturaV2(event, '', 'aviacion','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(35)
                            <button onclick="addRowCoberturaV2(event, '', 'aviacion','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(36)
                            <button onclick="addRowCoberturaV2(event, '', 'aviacion','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(37)
                            <button onclick="addRowCoberturaV2(event, '', 'aviacion','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(38)
                            <button onclick="addRowCoberturaV2(event, '', 'responsabilidad_civil','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(39)
                            <button onclick="addRowCoberturaV2(event, '', 'responsabilidad_civil','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(40)
                            <button onclick="addRowCoberturaV2(event, '', 'responsabilidad_civil','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(41)
                            <button onclick="addRowCoberturaV2(event, '', 'responsabilidad_civil','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(42)
                            <button onclick="addRowCoberturaV2(event, '', 'responsabilidad_civil','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(43)
                            <button onclick="addRowCoberturaV2(event, '', 'responsabilidad_civil','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(44)
                            <button onclick="addRowCoberturaV2(event, '', 'tecnico','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(45)
                            <button onclick="addRowCoberturaV2(event, '', 'tecnico','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(46)
                            <button onclick="addRowCoberturaV2(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(47)
                            <button onclick="addRowCoberturaV2(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(48)
                            <button onclick="addRowCoberturaV2(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(49)
                            <button onclick="addRowCoberturaV2(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(50)
                            <button onclick="addRowCoberturaV2(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(51)
                            <button onclick="addRowCoberturaV2(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(52)
                            <button onclick="addRowCoberturaV2(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                    @endswitch
                </th>
            </tr>
        </thead>
        {{-- tbody --}}
        <tbody id="CoberturasAdicionalesTableBody">
            @if (count($slip->coverage_additional) > 0)
                @foreach ($slip->coverage_additional as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <select name="description_coverage_additional[]"{{--  class="selectCobertura" --}}>
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
                            {{-- <textarea name="description_coverage_additional[]"> {{ $item->description_coverage_additional }}</textarea> --}}
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="coverage_additional_additional[]"
                                value="{{ $item->coverage_additional_additional }}">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="coverage_additional_usd[]"
                                value="{{ $item->coverage_additional_usd }}">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="coverage_additional_additional2[]"
                                value="{{ $item->coverage_additional_additional2 }}">
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>1</td>
                    <td>
                        <select name="description_coverage_additional[]" class="selectCobertura">
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
