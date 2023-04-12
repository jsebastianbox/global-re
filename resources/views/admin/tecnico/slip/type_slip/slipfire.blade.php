<form method="POST" action="{{ route('slip.update', $slip->id) }}" enctype="multipart/form-data" id="formSlipIncendio"
    class="new_entry__form">
    @method('PUT');

    @csrf

    {{-- <input type="hidden" name="type_slip" value="incendio"> --}}

    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip {{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        {{-- Objeto del seguro --}}
        <div class="flexColumnCenterContainer">
            <div class="input_group" style="max-width: 450px">
                <label for="incendioObjetoSeguro">
                    <i class="fa-solid fa-bars-staggered"></i>
                    Objeto del seguro
                </label>
                <textarea name="object_insurance" id="object_insurance" cols="30" rows="1">{{ $slip_type->object_insurance }}</textarea>
            </div>
        </div>

        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Suma Asegurable y/o Suma Asegurada</h3>

        <div class="flexColumnCenterContainer">

            <div class="flexRowWrapContainer">
                <button type="button" class="new_entry__form--button"  onclick="chooseTypeSuma('asegurable'); refreshSumaAsegurableTable('activos')">
                    Suma Asegurable
                </button>

                <button type="button" class="new_entry__form--button"  onclick="chooseTypeSuma('asegurada'); refreshSumaAsegurableTable('activos_fijos')">
                    Suma Asegurada
                </button>


            </div>

        </div>

        {{-- Suma asegurable / asegurada --}}

        <div id="sumaAsegurableContainer" class="flexColumnCenterContainer" style="display:none;margin:2.5rem 0">
            <h4 class="slipTitle">Tabla Suma Asegurable</h4>
            @include('admin.tecnico.slip.slips_generales.tableSumaAsegurable')

            <div class="tableContainer">
                <div class="input_group" style="max-width: 700px;margin-top:2rem">
                    <label for="incendioLimiteIndem">
                        Límite de indemnización:
                    </label>
                    <input type="number" id="incendioLimiteIndem" name="limit_compensation"
                        value="{{ $slip_type->limit_compensation }}">
                </div>
            </div>
        </div>

        <div id="sumaAseguradaContainer" class="tableContainer" style="display:none;margin:1.5rem 0">
            <h4 class="slipTitle">Tabla Suma Asegurada</h4>
            @include('admin.tecnico.slip.slips_generales.tableSumaAsegurada')
        </div>


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

        @include('admin.tecnico.slip.slips_generales.tableCoberturasAdicionalesV2')

    </div>


    <div class="form_group3">


        {{-- Cláusulas Adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Cláusulas Adicionales</h3>

        @include('admin.tecnico.slip.slips_generales.tableClausulasAdicionalesV2')

    </div>

    <div class="form_group4">
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

        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">6</span> Exclusiones</h3>

        @include('admin.tecnico.slip.slips_generales.exclusiones')
    </div>

    <div class="form_group5">
        {{-- DEDUCIBLE --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">7</span> Deducibles</h3>

        @include('admin.tecnico.slip.slips_generales.deducibles')

    </div>

    <div class="form_group6">

        @include('admin.tecnico.slip.slips_generales.footer1')

    </div>

    <div class="form_group7">

        @include('admin.tecnico.slip.slips_generales.footer2')

    </div>

</form>
