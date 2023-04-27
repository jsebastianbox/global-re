<table id="aviacion_licenciaTableObjetosSeguro" class="indemnizacionTable">
    <thead>
        <tr>
            <th style="text-align: center">Número</th>
            <th style="text-align: center">Nombre</th>
            <th style="text-align: center">Tipo</th>
            <th style="text-align: center">Fecha de nacimiento</th>
            <th style="text-align: center">Edad</th>
            <th style="text-align: center">Suma Asegurada</th>
            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">
                <button type="button" onclick="addRowObjetoSeguroV2(event, 'aviacion_licencia')" class="btn btn-success btn-xs">
                    +
                </button>
            </th>
        </tr>
    </thead>

    <tbody id="aviacion_licenciaObjetosTableBody">
        @if (count($object_insurance) > 0)
            @foreach ($object_insurance as $key => $item)
                <tr>
                    <td style="text-align: center">
                        <span>{{ $key + 1 }}</span>
                    </td>
                    <td style="text-align: center">
                        <input value="{{ $item->name }}" type="text" name="name[]">
                    </td>
                    <td style="text-align: center">
                        <select name="person_type" >
                            <option value="" selected>Seleccionar</option>
                            <option value="Piloto" {{$item->person_type === 'Piloto' ? 'selected' : '' }}>Piloto</option>
                            <option value="Tripulante" {{$item->person_type === 'Tripulante' ? 'selected' : '' }}>Tripulante</option>
                        </select>
                    </td>
                    <td style="text-align: center">
                        <input value="{{ $item->birthday }}" type="date" class="birthdateInput" name="birthday[]" onchange="putAge('aviacion_licenciaTableObjetosSeguro')">
                    </td>
                    <td style="text-align: center">
                        <input value="{{ $item->age }}" type="number" step="any" name="age[]" class="ageInput">
                    </td>
                    <td style="text-align: center">
                        <input value="{{ $item->limit }}" class="col1" type="number" data-money step="any"onkeyup="sumaAviacion(1, 1, 'aviacion_licenciaTableObjetosSeguro')"  name="limit[]">
                    </td>

                    <td></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td style="text-align: center">
                    <span>1</span>
                </td>
                <td style="text-align: center">
                    <input type="text" name="name[]">
                </td>
                <td style="text-align: center">
                    <select name="person_type">
                        <option value="" selected>Seleccionar</option>
                        <option value="Piloto">Piloto</option>
                        <option value="Tripulante">Tripulante</option>
                    </select>
                </td>
                <td style="text-align: center">
                    <input type="date" class="birthdateInput" name="birthday[]" onchange="putAge('aviacion_licenciaTableObjetosSeguro')">
                </td>
                <td style="text-align: center">
                    <input type="number" step="any" name="age[]" class="ageInput">
                </td>
                <td style="text-align: center">
                    <input type="number" class="col1" data-money step="any"onkeyup="sumaAviacion(1, 1, 'aviacion_licenciaTableObjetosSeguro')"  name="limit[]">
                </td>

                <td></td>
            </tr>
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td></td>
            <td class="slipTitle">Total</td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <span id="totalSumaAseguradaLicencia"></span>
            </td>
        </tr>
    </tfoot>
</table>