<div class="tableContainer">
    <table id="exclusionesAdicionalesTable" class="indemnizacionTable">
        <thead>
            <tr>
                <th style="text-align: center; width: 42px;">#</th>
                <th style="text-align: center">Exclusiones</th>
                <th style="text-align: center">Campo adicional</th>
                <th style="text-align: center">USD</th>
                <th style="text-align: center">Campo adicional</th>
                <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                    @switch($slip->type_coverage)
                    @case(1)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'vida','vida')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(2)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'vida','vida')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(3)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'vida','accidentes_personales')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(4)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'vida','accidentes_personales')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(5)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'activos','incendio')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(6)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'activos','lucro_cesante')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(7)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'activos','robo')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(8)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'activos','sabotaje_terrorismo')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(9)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'veiculos','livianos')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(10)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'veiculos','pesados')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(11)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'tecnico','equipo_electronico')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(12)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'tecnico','rotura_maquinaria')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(13)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'tecnico','perdida_beneficio_rotura_maquinaria')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(14)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'tecnico','riesgo_contratistas')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(15)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'tecnico','todo_riesgo_equipo_maquinaria')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(16)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'tecnico','riesgo_montaje')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(17)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'tecnico','alop')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(18)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'energia','riesgo_petrolero')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(19)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'energia','riesgo_petrolero')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(20)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'energia','riesgo_petrolero')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(21)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'maritimo','casco_maquinaria')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(22)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'maritimo','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(23)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'maritimo','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(24)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'maritimo','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(25)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'maritimo','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(26)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'maritimo','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(27)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'maritimo','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(28)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'maritimo','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(29)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'maritimo','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(30)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'maritimo','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(31)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'maritimo','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(32)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'aviacion','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(33)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'aviacion','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(34)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'aviacion','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(35)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'aviacion','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(36)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'aviacion','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(37)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'aviacion','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(38)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'responsabilidad_civil','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(39)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'responsabilidad_civil','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(40)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'responsabilidad_civil','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(41)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'responsabilidad_civil','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(42)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'responsabilidad_civil','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(43)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'responsabilidad_civil','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(44)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'riesgo_financiero','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(45)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'riesgo_financiero','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(46)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'fianzas','fidelidad')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(47)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'fianzas','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(48)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'fianzas','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(49)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'fianzas','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(50)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'fianzas','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(51)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'fianzas','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @case(52)
                    <button id="addRowExclusionButton" onclick="addRowExclusion(event, '', 'fianzas','')" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    @break
                    @endswitch
                    <script>
                        $(document).ready(function () {
                            const button = $('#addRowExclusionButton');                            
                            button.click()
                        })

                    </script>
                </th>
            </tr>
        </thead>
        {{-- tbody --}}
        <tbody id="exclusionesAdicionalesTableBody">

        </tbody>

    </table>
</div>
