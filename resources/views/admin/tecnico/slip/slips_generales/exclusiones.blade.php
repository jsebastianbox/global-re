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

                    @switch($slip->type_coverage)
                        @case(1)
                            <button onclick="addRowExclusion(event, '', 'vida','vida')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(2)
                            <button onclick="addRowExclusion(event, '', 'vida','vida')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(3)
                            <button onclick="addRowExclusion(event, '', 'vida','accidente_personales')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(4)
                            <button onclick="addRowExclusion(event, '', 'vida','accidente_personales')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(5)
                            <button onclick="addRowExclusion(event, '', 'activos','incendio')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(6)
                            <button onclick="addRowExclusion(event, '', 'activos','lucro_cesante')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(7)
                            <button onclick="addRowExclusion(event, '', 'activos','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(8)
                            <button onclick="addRowExclusion(event, '', 'activos','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(9)
                            <button onclick="addRowExclusion(event, '', 'tecnico','vehiculos')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(10)
                            <button onclick="addRowExclusion(event, '', 'tecnico','vehiculos')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(11)
                            <button onclick="addRowExclusion(event, '', 'tecnico','electronico')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(12)
                            <button onclick="addRowExclusion(event, '', 'tecnico','rotura_maquinaria')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(13)
                            <button onclick="addRowExclusion(event, '', 'tecnico','beneficios')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(14)
                            <button onclick="addRowExclusion(event, '', 'tecnico','equipo_maquinaria')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(15)
                            <button onclick="addRowExclusion(event, '', 'tecnico','construccion')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(16)
                            <button onclick="addRowExclusion(event, '', 'tecnico','montaje')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(17)
                            <button onclick="addRowExclusion(event, '', 'tecnico','alop')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(18)
                            <button onclick="addRowExclusion(event, '', 'energia','trp')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(19)
                            <button onclick="addRowExclusion(event, '', 'energia','trp')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(20)
                            <button onclick="addRowExclusion(event, '', 'energia','trp')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(21)
                            <button onclick="addRowExclusion(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(22)
                            <button onclick="addRowExclusion(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(23)
                            <button onclick="addRowExclusion(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(24)
                            <button onclick="addRowExclusion(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(25)
                            <button onclick="addRowExclusion(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(26)
                            <button onclick="addRowExclusion(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(27)
                            <button onclick="addRowExclusion(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(28)
                            <button onclick="addRowExclusion(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(29)
                            <button onclick="addRowExclusion(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(30)
                            <button onclick="addRowExclusion(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(31)
                            <button onclick="addRowExclusion(event, '', 'maritimo','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(32)
                            <button onclick="addRowExclusion(event, '', 'aviacion','casco')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(33)
                            <button onclick="addRowExclusion(event, '', 'aviacion','pl')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(34)
                            <button onclick="addRowExclusion(event, '', 'aviacion','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(35)
                            <button onclick="addRowExclusion(event, '', 'aviacion','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(36)
                            <button onclick="addRowExclusion(event, '', 'aviacion','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(37)
                            <button onclick="addRowExclusion(event, '', 'aviacion','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(38)
                            <button onclick="addRowExclusion(event, '', 'responsabilidad_civil','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(39)
                            <button onclick="addRowExclusion(event, '', 'responsabilidad_civil','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(40)
                            <button onclick="addRowExclusion(event, '', 'responsabilidad_civil','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(41)
                            <button onclick="addRowExclusion(event, '', 'responsabilidad_civil','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(42)
                            <button onclick="addRowExclusion(event, '', 'responsabilidad_civil','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(43)
                            <button onclick="addRowExclusion(event, '', 'responsabilidad_civil','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(44)
                            <button onclick="addRowExclusion(event, '', 'tecnico','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(45)
                            <button onclick="addRowExclusion(event, '', 'tecnico','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(46)
                            <button onclick="addRowExclusion(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(47)
                            <button onclick="addRowExclusion(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(48)
                            <button onclick="addRowExclusion(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(49)
                            <button onclick="addRowExclusion(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(50)
                            <button onclick="addRowExclusion(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(51)
                            <button onclick="addRowExclusion(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                        @case(52)
                            <button onclick="addRowExclusion(event, '', 'fianzas','all')" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            @break
                    @endswitch
                </th>
            </tr>
        </thead>
        {{-- tbody --}}
        <tbody id="exclusionesAdicionalesTableBody">

            <tr>
                <td>1</td>
                <td>
                    <select id="description_coverage_additional_1" name="description_coverage_additional[]" class="selectCobertura"></select>
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
