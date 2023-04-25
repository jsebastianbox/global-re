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
                    @switch($slip->type_coverage)
                    @case(1)
                        <button onclick="addRowClausula(event, '', 'vida','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(2)
                        <button onclick="addRowClausula(event, '', 'vida','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(3)
                        <button onclick="addRowClausula(event, '', 'vida','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(4)
                        <button onclick="addRowClausula(event, '', 'vida','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(5)
                        <button onclick="addRowClausula(event, '', 'activos','incendio')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(6)
                        <button onclick="addRowClausula(event, '', 'activos','lucro')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(7)
                        <button onclick="addRowClausula(event, '', 'activos','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(8)
                        <button onclick="addRowClausula(event, '', 'activos','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(9)
                        <button onclick="addRowClausula(event, '', 'tecnico','vehiculos')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(10)
                        <button onclick="addRowClausula(event, '', 'tecnico','vehiculos')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(11)
                        <button onclick="addRowClausula(event, '', 'tecnico','electronico')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(12)
                        <button onclick="addRowClausula(event, '', 'tecnico','rotura_maquinaria')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(13)
                        <button onclick="addRowClausula(event, '', 'tecnico','beneficios')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(14)
                        <button onclick="addRowClausula(event, '', 'tecnico','equipo_maquinaria')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(15)
                        <button onclick="addRowClausula(event, '', 'tecnico','construccion')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(16)
                        <button onclick="addRowClausula(event, '', 'tecnico','montaje')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(17)
                        <button onclick="addRowClausula(event, '', 'tecnico','alop')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(18)
                        <button onclick="addRowClausula(event, '', 'energia','trp')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(19)
                        <button onclick="addRowClausula(event, '', 'energia','trp')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(20)
                        <button onclick="addRowClausula(event, '', 'energia','trp')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(21)
                        <button onclick="addRowClausula(event, '', 'maritimo','casco')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(22)
                        <button onclick="addRowClausula(event, '', 'maritimo','casco')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(23)
                        <button onclick="addRowClausula(event, '', 'maritimo','casco')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(24)
                        <button onclick="addRowClausula(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(25)
                        <button onclick="addRowClausula(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(26)
                        <button onclick="addRowClausula(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(27)
                        <button onclick="addRowClausula(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(28)
                        <button onclick="addRowClausula(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(29)
                        <button onclick="addRowClausula(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(30)
                        <button onclick="addRowClausula(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(31)
                        <button onclick="addRowClausula(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(32)
                        <button onclick="addRowClausula(event, '', 'aviacion','casco')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(33)
                        <button onclick="addRowClausula(event, '', 'aviacion','pl')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(34)
                        <button onclick="addRowClausula(event, '', 'aviacion','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(35)
                        <button onclick="addRowClausula(event, '', 'aviacion','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(36)
                        <button onclick="addRowClausula(event, '', 'aviacion','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(37)
                        <button onclick="addRowClausula(event, '', 'aviacion','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(38)
                        <button onclick="addRowClausula(event, '', 'responsabilidad_civil','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(39)
                        <button onclick="addRowClausula(event, '', 'responsabilidad_civil','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(40)
                        <button onclick="addRowClausula(event, '', 'responsabilidad_civil','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(41)
                        <button onclick="addRowClausula(event, '', 'responsabilidad_civil','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(42)
                        <button onclick="addRowClausula(event, '', 'responsabilidad_civil','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(43)
                        <button onclick="addRowClausula(event, '', 'responsabilidad_civil','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(44)
                        <button onclick="addRowClausula(event, '', 'tecnico','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(45)
                        <button onclick="addRowClausula(event, '', 'tecnico','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(46)
                        <button onclick="addRowClausula(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(47)
                        <button onclick="addRowClausula(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(48)
                        <button onclick="addRowClausula(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(49)
                        <button onclick="addRowClausula(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(50)
                        <button onclick="addRowClausula(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(51)
                        <button onclick="addRowClausula(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                    @case(52)
                        <button onclick="addRowClausula(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        @break
                @endswitch
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
                            <select name="description_clause_additional[]" {{-- class="selectClausula" --}}>
                                @foreach ($clausulasSelect as $clausulaSelect)
                                    <option value="{{ $clausulaSelect->name }}" 
                                            @if ($clausulaSelect->id == $item->description_clause_additional) 
                                                selected 
                                            @elseif($clausulaSelect->name == $item->description_clause_additional)
                                                selected
                                            @endif >
                                        {{ $clausulaSelect->name }}
                                    </option>
                                @endforeach
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
