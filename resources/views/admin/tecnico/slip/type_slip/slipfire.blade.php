<form method="POST" action="{{ route('slip.update', $slip->id) }}" enctype="multipart/form-data" id="formSlipIncendio"
    class="new_entry__form">
    @method('PUT');

    @csrf

    {{-- <input type="hidden" name="type_slip" value="incendio"> --}}

    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip {{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        {{-- Objeto del seguro --}}
        @include('admin.tecnico.slip.slips_generales.objectInsuranceAndCoverage')


        @if (count($sum_assured) > 0)
            @if ($slip->insurable_sum > 0)
                <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Suma Asegurable</h3>
            @elseif($slip->insured_sum > 0)
                <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Suma Asegurada</h3>
            @endif

            {{-- Suma asegurable / asegurada --}}

            <div class="flexColumnCenterContainer" style="margin:2.5rem 0">
                <button id="btnRefreshSuma" type="button" onclick="refreshSumaAseguradaTable()" class="btn btn-info" style="margin: 1rem">
                    Actualizar
                </button>
                @include('admin.tecnico.slip.slips_generales.tableSumaAsegurada')
            </div>
        @endif



        <div class="two-sides">
            <div class="left_side">
                <div class="input_group">
                    <label for="incendioLimiteIndem">
                        Límite de indemnización:
                    </label>
                    <input type="number" id="incendioLimiteIndem" name="limit_compensation"
                        value="{{ $slip_type->limit_compensation }}">
                </div>
            </div>
            <div class="right_side">
                @if ($slip->insurable_sum > 0)
                    <div class="input_group">
                        <label for="">Suma Asegurable:</label>
                        <input id="value_for_calculos" type="number" name="insurable_sum"
                        value="{{ $slip->insurable_sum }}">
                    </div>
                @elseif($slip->insured_sum > 0)
                    <div class="input_group">
                        <label for="">Suma Asegurada:</label>
                        <input id="value_for_calculos" type="number" name="insured_sum"
                        value="{{ $slip->insured_sum }}">
                    </div>
                @endif
            </div>
        </div>

        @if ($slip->type_coverage === 7)
            <div class="tableContainer">
                <div class="input_group" style="width: 350px">
                    <label class="input-group-text">Primer riesgo:</label>
                    <select name="first_risk">
                        <option value="Absoluto" {{$slip_type->first_risk === 'Absoluto' ? 'selected' : ''}}>
                            Absoluto
                        </option>
                        <option value="Relativo" {{$slip_type->first_risk === 'Relativo' ? 'selected' : ''}}>
                            Relativo
                        </option>
                    </select>
                </div>
            </div>
        @endif

        <div class="flexRowWrapContainer" style="margin: 2rem 1rem">
            {{-- Límite de Indemnización --}}

            <div class="input_group" style="display:none;">
                <label style="margin-right: 8px">
                    Cobertura:
                </label>
                <textarea name="coverage" id="coverage" style="resize:both;width:100%;" 
            cols="30" rows="1">{{ $slip_type->coverage }} </textarea>
            </div>


        </div>
    </div>

    <div class="form_group2">
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Coberturas Adicionales</h3>

        @include('admin.comercial.include.edit_tablaCoberturas')


    </div>


    <div class="form_group3">


        {{-- Cláusulas Adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Cláusulas Adicionales</h3>

        @include('admin.comercial.include.edit_tablaClausulas')


    </div>

    <div class="form_group4">
        @if ($slip->type_coverage === 5)
            <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Tabla De Depreciación Para Pérdidas
                totales</h3>

            <div class="flexRowWrapContainer">
                <div>
                    <h5 class="slipTitle"> Rotura de maquinaria:</h5>
                    <table class="indemnizacionTable">
                        <thead>
                            <tr>
                                <th style="text-align: center">Años</th>
                                <th style="text-align: center">Demetito (anual)</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><input type="text" name="" id=""> años</td>
                                <td>
                                    <input type="number" name="equipoMaquinaria1" placeholder="%">
                                </td>
                            </tr>

                            <tr>
                                <td><input type="text" name="" id="">años</td>
                                <td>
                                    <input type="number" name="equipoMaquinaria1" placeholder="%">
                                </td>
                            </tr>

                            <tr>
                                <td><input type="text" name="" id="">años</td>
                                <td>
                                    <input type="number" name="equipoMaquinaria1" placeholder="max. 75%">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div>
                    <h5 class="slipTitle"> Equipo electrónico:</h5>
                    <table class="indemnizacionTable">
                        <thead>
                            <tr>
                                <th></th>
                                <th style="text-align: center">Años</th>
                                <th style="text-align: center">Demetito (anual)</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Equipos hasta</td>
                                <td>
                                    <input type="number" id="incendioEquipoElectronico1a" name="EquipoElectronico1a"
                                        class="inputNumber">
                                </td>
                                <td>
                                    <input type="number" id="incendioEquipoElectronico1b" name="EquipoElectronico1b"
                                        class="inputNumber" min="0" value="0">
                                </td>
                            </tr>

                            <tr>
                                <td>Equipos hasta</td>
                                <td>
                                    <input type="number" id="incendioEquipoElectronico2a" name="EquipoElectronico2a"
                                        class="inputNumber">
                                </td>
                                <td>
                                    <input type="number" id="incendioEquipoElectronico2b" name="EquipoElectronico2b"
                                        class="inputNumber" min="0" value="0">
                                </td>
                            </tr>

                            <tr>
                                <td>Equipos hasta</td>
                                <td>
                                    <input type="number" id="incendioEquipoElectronico3a" name="EquipoElectronico3a"
                                        class="inputNumber">
                                </td>
                                <td>
                                    <input type="number" id="incendioEquipoElectronico3b" name="EquipoElectronico3b"
                                        class="inputNumber" min="0" value="0">
                                </td>
                            </tr>

                            <tr>
                                <td>Equipos más de</td>
                                <td>
                                    <input type="number" id="incendioEquipoElectronico4a" name="EquipoElectronico4a"
                                        class="inputNumber">
                                </td>
                                <td>
                                    <input type="number" id="incendioEquipoElectronico4b" name="EquipoElectronico4b"
                                        class="inputNumber" min="0" value="0">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endif


        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary"></span> Exclusiones</h3>

        @include('admin.tecnico.slip.slips_generales.exclusiones')
    </div>

    <div class="form_group5">
        {{-- DEDUCIBLE --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary"></span> Deducibles</h3>

        @include('admin.tecnico.slip.slips_generales.deducibles')

    </div>

    <div class="form_group6">

        @include('admin.tecnico.slip.slips_generales.footer1')

    </div>

    <div class="form_group7">

        @include('admin.tecnico.slip.slips_generales.footer2')

    </div>

</form>
