<table class="indemnizacionTable" id="activos_fijosSumaAseguradaTable">
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
            @if (!is_null($slip_type->th_sum_assured_1) && $slip_type->th_sum_assured_1 !== '')
                <th style="text-align: center">
                    {{$slip_type->th_sum_assured_1}}
                    <input type="hidden" name="th_sum_assured_1" value="{{$slip_type->th_sum_assured_1}}">
                </th>
            @endif
            @if (!is_null($slip_type->th_sum_assured_2) && $slip_type->th_sum_assured_2 !== '')
                <th style="text-align: center">
                    {{$slip_type->th_sum_assured_2}}
                    <input type="hidden" name="th_sum_assured_2" value="{{$slip_type->th_sum_assured_2}}">
                </th>
            @endif
            @if (!is_null($slip_type->th_sum_assured_3) && $slip_type->th_sum_assured_3 !== '')
                <th style="text-align: center">
                    {{$slip_type->th_sum_assured_3}}
                    <input type="hidden" name="th_sum_assured_3" value="{{$slip_type->th_sum_assured_3}}">
                </th>
            @endif
            @if (!is_null($slip_type->th_sum_assured_4) && $slip_type->th_sum_assured_4 !== '')
                <th style="text-align: center">
                    {{$slip_type->th_sum_assured_4}}
                    <input type="hidden" name="th_sum_assured_4" value="{{$slip_type->th_sum_assured_4}}">
                </th>
            @endif
            @if (!is_null($slip_type->th_sum_assured_5) && $slip_type->th_sum_assured_5 !== '')
                <th style="text-align: center">
                    {{$slip_type->th_sum_assured_5}}
                    <input type="hidden" name="th_sum_assured_5" value="{{$slip_type->th_sum_assured_5}}">
                </th>
            @endif
            <th style="text-align: center">TOTAL</th>
            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                colspan="1" aria-label="Add row">

                <button type="button" onclick="addRowSumaAseguradaIncendio(event, 'activos_fijos')" class="btn btn-success btn-xs">
                    +
                </button>
            </th>
        </tr>
    </thead>
    {{-- tbody --}}

    <tbody id="activos_fijosSumaAseguradaTableBody">
        {{-- <button onclick="refreshSumaAsegurableTable('activos_fijos')" class="new_entry__form--button">Actualizar</button> --}}
        @if (count($sum_assured) > 0)
            @foreach ($sum_assured as $key => $item)

                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        <input type="text" name="location[]" class="inputLocation" style="width: 95px" placeholder="..." novalidate value="{{ $item->location }}">
                    </td>

                    <td>
                        <input onkeyup="incendioSumaAsegurableTotales({{ $key+1 }}, 1, 'activos_fijos')" type="number"
                            step="any" data-money name="edification[]" value="0" novalidate
                            style="width: 95px" class="col1 row{{ $key+1 }}">
                    </td>
                    <td>
                        <input onkeyup="incendioSumaAsegurableTotales({{ $key+1 }}, 2, 'activos_fijos')" type="number"
                            step="any" data-money name="contents[]" value="0" novalidate
                            style="width: 95px" class="col2 row{{ $key+1 }}">
                    </td>
                    <td>
                        <input onkeyup="incendioSumaAsegurableTotales({{ $key+1 }}, 3, 'activos_fijos')" type="number"
                            step="any" data-money name="equipment[]" value="0" novalidate
                            style="width: 95px" class="col3 row{{ $key+1 }}">
                    </td>
                    <td>
                        <input onkeyup="incendioSumaAsegurableTotales({{ $key+1 }}, 4, 'activos_fijos')" type="number"
                            step="any" data-money name="machine[]" value="0" novalidate
                            style="width: 95px" class="col4 row{{ $key+1 }}">
                    </td>
                    <td>
                        <input onkeyup="incendioSumaAsegurableTotales({{ $key+1 }}, 5, 'activos_fijos')" type="number"
                            step="any" data-money name="commodity[]" value="0" novalidate
                            style="width: 95px" class="col5 row{{ $key+1 }}">
                    </td>
                    <td>
                        <input onkeyup="incendioSumaAsegurableTotales({{ $key+1 }}, 6, 'activos_fijos')" type="number"
                            step="any" name="other_sum_assured[]" value="0" novalidate
                            style="width: 95px" class="col6 row{{ $key+1 }}">
                    </td>

                    @if (!is_null($slip_type->th_sum_assured_1) && $slip_type->th_sum_assured_1 !== '')
                        <td>
                            <input onkeyup="incendioSumaAsegurableTotales({{ $key+1 }}, 7, 'activos_fijos')" type="number"
                                step="any" name="other_sum_assured_1[]" value="0" novalidate
                                style="width: 95px" class="col7 row{{ $key+1 }}">
                        </td>
                    @endif
                    @if (!is_null($slip_type->th_sum_assured_2) && $slip_type->th_sum_assured_2 !== '')
                        <td>
                            <input onkeyup="incendioSumaAsegurableTotales({{ $key+1 }}, 8, 'activos_fijos')" type="number"
                                step="any" name="other_sum_assured_2[]" value="0" novalidate
                                style="width: 95px" class="col8 row{{ $key+1 }}">
                        </td>
                    @endif
                    @if (!is_null($slip_type->th_sum_assured_3) && $slip_type->th_sum_assured_3 !== '')
                        <td>
                            <input onkeyup="incendioSumaAsegurableTotales({{ $key+1 }}, 9, 'activos_fijos')" type="number"
                                step="any" name="other_sum_assured_3[]" value="0" novalidate
                                style="width: 95px" class="col9 row{{ $key+1 }}">
                        </td>
                    @endif
                    @if (!is_null($slip_type->th_sum_assured_4) && $slip_type->th_sum_assured_4 !== '')
                        <td>
                            <input onkeyup="incendioSumaAsegurableTotales({{ $key+1 }}, 10, 'activos_fijos')" type="number"
                                step="any" name="other_sum_assured_4[]" value="0" novalidate
                                style="width: 95px" class="col10 row{{ $key+1 }}">
                        </td>
                    @endif
                    @if (!is_null($slip_type->th_sum_assured_5) && $slip_type->th_sum_assured_5 !== '')
                        <td>
                            <input onkeyup="incendioSumaAsegurableTotales({{ $key+1 }}, 11, 'activos_fijos')" type="number"
                                step="any" name="other_sum_assured_5[]" value="0" novalidate
                                style="width: 95px" class="col11 row{{ $key+1 }}">
                        </td>
                    @endif

                    <td style="text-align: center">
                        <span class="slipTitle col12" id="rowTotal{{ $key+1 }}">0</span>$
                    </td>
                    <td></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>1</td>
                <td>
                    <input type="text" name="location[]" class="inputLocation" style="width: 95px"
                        placeholder="..." novalidate>
                </td>
                <td>
                    <input onkeyup="incendioSumaAsegurableTotales(1, 1, 'activos')" type="number"
                        step="any" data-money name="edification[]" value="0" novalidate
                        style="width: 95px" class="col1 row1">
                </td>
                <td>
                    <input onkeyup="incendioSumaAsegurableTotales(1, 2, 'activos')" type="number"
                        step="any" data-money name="contents[]" value="0" novalidate
                        style="width: 95px" class="col2 row1">
                </td>
                <td>
                    <input onkeyup="incendioSumaAsegurableTotales(1, 3, 'activos')" type="number"
                        step="any" data-money name="equipment[]" value="0" novalidate
                        style="width: 95px" class="col3 row1">
                </td>
                <td>
                    <input onkeyup="incendioSumaAsegurableTotales(1, 4, 'activos')" type="number"
                        step="any" data-money name="machine[]" value="0" novalidate
                        style="width: 95px" class="col4 row1">
                </td>
                <td>
                    <input onkeyup="incendioSumaAsegurableTotales(1, 5, 'activos')" type="number"
                        step="any" data-money name="commodity[]" value="0" novalidate
                        style="width: 95px" class="col5 row1">
                </td>
                <td>
                    <input onkeyup="incendioSumaAsegurableTotales(1, 6, 'activos')" type="number"
                        step="any" name="other_sum_assured[]" value="0" novalidate
                        style="width: 95px" class="col6 row1">
                </td>
                <td style="text-align: center">
                    <span class="slipTitle col12" id="rowTotal1">0</span>$
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
                <span id="colTotal1" class="slipTitle">0</span>$
            </td>
            <td style="text-align: center">
                <span id="colTotal2" class="slipTitle">0</span>$
            </td>
            <td style="text-align: center">
                <span id="colTotal3" class="slipTitle">0</span>$
            </td>
            <td style="text-align: center">
                <span id="colTotal4" class="slipTitle">0</span>$
            </td>
            <td style="text-align: center">
                <span id="colTotal5" class="slipTitle">0</span>$
            </td>
            <td style="text-align: center">
                <span id="colTotal6" class="slipTitle">0</span>$
            </td>

            @if (!is_null($slip_type->th_sum_assured_1) && $slip_type->th_sum_assured_1 !== '')
                <td style="text-align: center">
                    <span id="colTotal7" class="slipTitle">0</span>$
                </td>
            @endif
            @if (!is_null($slip_type->th_sum_assured_2) && $slip_type->th_sum_assured_2 !== '')
                <td style="text-align: center">
                    <span id="colTotal8" class="slipTitle">0</span>$
                </td>
            @endif
            @if (!is_null($slip_type->th_sum_assured_3) && $slip_type->th_sum_assured_3 !== '')
                <td style="text-align: center">
                    <span id="colTotal9" class="slipTitle">0</span>$
                </td>
            @endif
            @if (!is_null($slip_type->th_sum_assured_4) && $slip_type->th_sum_assured_4 !== '')
                <td style="text-align: center">
                    <span id="colTotal10" class="slipTitle">0</span>$
                </td>
            @endif
            @if (!is_null($slip_type->th_sum_assured_5) && $slip_type->th_sum_assured_5 !== '')
                <td style="text-align: center">
                    <span id="colTotal11" class="slipTitle">0</span>$
                </td>
            @endif

            <td style="text-align: center">
                <span class="slipTitle " id="incendioTotalTotal">0</span>$
            </td>
        </tr>

    </tfoot>

</table>
