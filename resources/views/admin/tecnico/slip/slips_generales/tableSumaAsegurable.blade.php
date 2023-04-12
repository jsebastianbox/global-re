<table class="indemnizacionTable" id="activosSumaAseguradaTable">
    <thead>
        <tr>
            <th style="text-align: center">#</th>
            <th style="text-align: center">Ubicación</th>
            <th style="text-align: center">Edificación</th>
            <th style="text-align: center">Contenidos</th>
            <th style="text-align: center">Maquinaria y Equipos</th>
            <th style="text-align: center">Muebles y Enseres</th>
            <th style="text-align: center">Mercaderías</th>
            <th style="text-align: center">Otros</th>
            <th style="text-align: center">TOTAL</th>
            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                colspan="1" aria-label="Add row">

                <button type="button" onclick="addRowSumaAseguradaIncendio(event, 'activos')" class="btn btn-success btn-xs">
                    +
                </button>
            </th>
        </tr>
    </thead>
    {{-- tbody --}}

    <tbody id="activosSumaAseguradaTableBody">
        {{-- <button onclick="refreshSumaAsegurableTable('activos')" class="new_entry__form--button">Actualizar</button> --}}
        @if (count($sum_assured) > 0)
            @foreach ($sum_assured as $key => $item)

                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        <input type="text" name="location[]" style="width: 95px" placeholder="..." novalidate value="{{ $item->location }}">
                    </td>
                    <td>
                        <input onkeyup="incendioSumaAsegurableTotales({{ $key }}, 'activos')" type="number" step="any"
                            name="edification[]" novalidate value="{{ $item->edification }}"
                            style="width: 95px" class="edificacionInput row{{$key}}">
                    </td>
                    <td>
                        <input onkeyup="incendioSumaAsegurableTotales({{ $key }}, 'activos')" type="number" step="any"
                            name="contents[]" novalidate value="{{ $item->contents }}"
                            style="width: 95px" class="contenidosInput row{{$key}}">
                    </td>
                    <td>
                        <input onkeyup="incendioSumaAsegurableTotales({{ $key }}, 'activos')" type="number" step="any"
                            name="equipment[]" novalidate value="{{ $item->equipment }}"
                            style="width: 95px" class="maquinariaEquiposInput row{{$key}}">
                    </td>
                    <td>
                        <input onkeyup="incendioSumaAsegurableTotales({{ $key }}, 'activos')" type="number" step="any" value="{{ $item->machine }}"
                            name="machine[]" novalidate style="width: 95px" class="mueblesInput row{{$key}}">
                    </td>
                    <td>
                        <input onkeyup="incendioSumaAsegurableTotales({{ $key }}, 'activos')" type="number" step="any"
                            name="commodity[]" novalidate value="{{ $item->commodity }}"
                            style="width: 95px" class="mercaderiasInput row{{$key}}">
                    </td>
                    <td>
                        <input onkeyup="incendioSumaAsegurableTotales({{ $key }}, 'activos')" type="number" step="any" value="{{ $item->other_sum_assured }}"
                            name="other_sum_assured[]" novalidate style="width: 95px" class="otrosInput row{{$key}}">
                    </td>
                    <td style="text-align: center">
                        <span class="slipTitle incendioTotalSpan" id="rowTotal{{$key}}">0</span>$
                    </td>
                    <td></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>2</td>
                <td>
                    <input type="text" name="location[]" style="width: 95px" placeholder="..." novalidate>
                </td>
                <td>
                    <input onkeyup="incendioSumaAsegurableTotales(1, 'activos')" type="number" step="any"
                        name="edification[]" value="0" novalidate
                        style="width: 95px" class="edificacionInput row1">
                </td>
                <td>
                    <input onkeyup="incendioSumaAsegurableTotales(1, 'activos')" type="number" step="any"
                        name="contents[]" value="0" novalidate
                        style="width: 95px" class="contenidosInput row1">
                </td>
                <td>
                    <input onkeyup="incendioSumaAsegurableTotales(1, 'activos')" type="number" step="any"
                        name="equipment[]" value="0" novalidate
                        style="width: 95px" class="maquinariaEquiposInput row1">
                </td>
                <td>
                    <input onkeyup="incendioSumaAsegurableTotales(1, 'activos')" type="number" step="any"
                        name="machine[]" value="0" novalidate style="width: 95px" class="mueblesInput row1">
                </td>
                <td>
                    <input onkeyup="incendioSumaAsegurableTotales(1, 'activos')" type="number" step="any"
                        name="commodity[]" value="0" novalidate
                        style="width: 95px" class="mercaderiasInput row1">
                </td>
                <td>
                    <input onkeyup="incendioSumaAsegurableTotales(1, 'activos')" type="number" step="any"
                        name="other_sum_assured[]" value="0" novalidate style="width: 95px" class="otrosInput row1">
                </td>
                <td style="text-align: center">
                    <span class="slipTitle incendioTotalSpan" id="rowTotal1">0</span>$
                </td>
                <td></td>
            </tr>
        @endif

    </tbody>

    <tfoot>

        <tr>
            <td style="text-align: center">
            </td>
            <td style="text-align: center">
                <h5 class="slipTitle">Total</h5>
            </td>
            <td style="text-align: center">
                <span id="incendioEdificacionTotal" class="slipTitle">0</span>$
            </td>
            <td style="text-align: center">
                <span id="incendioContenidosTotal" class="slipTitle">0</span>$
            </td>
            <td style="text-align: center">
                <span id="incendioMaquinariaEquiposTotal" class="slipTitle">0</span>$
            </td>
            <td style="text-align: center">
                <span id="incendioMueblesTotal" class="slipTitle">0</span>$
            </td>
            <td style="text-align: center">
                <span id="incendioMercaderiasTotal" class="slipTitle">0</span>$
            </td>
            <td style="text-align: center">
                <span id="incendioOtrosTotal" class="slipTitle">0</span>$
            </td>
            <td style="text-align: center">
                <span id="incendioTotalTotal" class="slipTitle">0</span>$
            </td>
        </tr>

    </tfoot>

</table>
