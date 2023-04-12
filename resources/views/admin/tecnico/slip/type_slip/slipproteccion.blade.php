<form method="POST" action="{{ route('slip.update', $slip->id) }}" enctype="multipart/form-data" id="formSlipProteccion"
    class="new_entry__form">
    @method('PUT');
    @csrf
    <input type="hidden" name="type_slip" value="protection_compensation">

    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip {{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        <div class="tableContainer">
            {{-- Objeto del seguro --}}
            <div class="input_group" style="max-width:600px">
                <label for="cascoBuquesObjetoSeguro" >
                    <i class="fa-solid fa-bars-staggered"></i>
                    Objeto del seguro
                </label>
                <textarea name="object_insurance" id="object_insurance" cols="30" rows="1">{{ $slip_type->object_insurance }}</textarea>
            </div>
        </div>
    </div>

    <div class="form_group2">
        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Detalle De Embarcaciones</h3>

        <div class="tableContainer">
            <button id="actualizarSuma" type="button" class="new_entry__form--button" onclick="actualizarSumaEmbarcaciones('cascoBuques')">Actualizar</button>
            <table id="cascoBuquesTableEmbarcaciones" class="indemnizacionTable" style="margin: 1.5rem 0">
                <thead>
                    <tr>
                        <th style="text-align: center">#</th>
                        <th style="text-align: center">Nombre de Embarcación</th>
                        <th style="text-align: center">Matrícula</th>
                        <th style="text-align: center">Material</th>
                        <th style="text-align: center">Manga (mts)</th>
                        <th style="text-align: center">Eslora (mts)</th>
                        <th style="text-align: center">Puntal (mts)</th>
                        <th style="text-align: center">Casco (USD)</th>
                        <th style="text-align: center">Maquina (USD)</th>
                        <th style="text-align: center">Total (USD)</th>
                        <th style="text-align: center; width: 42px;" class="sorting_" rowspan="1"
                            colspan="1" aria-label="Add row">

                        <button type="button" onclick="addRowEmbarcaciones(event, 'cascoBuques')" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        </th>
                    </tr>
                </thead>

                <tbody id="cascoBuquesTableEmbarcacionesBody">

                    @if (count($slip_type->boat_detail) > 0)

                        @foreach ($slip_type->boat_detail as $key => $item)
                            <tr>
                                <td style="text-align: center">
                                    {{ $key+1 }}
                                </td>
                                <td>
                                    <input type="text" id="cascoBuquesEmbarcacion1" name="name_boat[]"
                                        placeholder="..." value="{{ $item->name_boat }}">
                                </td>
                                <td>
                                    <input type="text" id="cascoBuquesMatricula1" name="registration_boat[]"
                                        placeholder="..." value="{{ $item->registration_boat }}">
                                </td>
                                <td>
                                    <select name="material_boat[]" id="cascoBuquesMaterial1">
                                        <option value="0" selected>Selecciona</option>
                                        <option value="Madera" @if ($item->material_boat == 'Madera') selected @endif>Madera
                                        </option>
                                        <option
                                            value="Fibra de vidrio"@if ($item->material_boat == 'Fibra de vidrio') selected @endif>
                                            Fibra de vidrio</option>
                                        <option value="Acero naval"@if ($item->material_boat == 'Acero naval') selected @endif>
                                            Acero naval</option>
                                        <option value="Aluminio"@if ($item->material_boat == 'Aluminio') selected @endif>
                                            Aluminio</option>
                                        <option value="Mixtos"@if ($item->material_boat == 'Mixtos') selected @endif>Mixtos
                                        </option>
                                    </select>
                                </td>
                                <td>
                                    <input type="number" id="cascoBuquesManga1" name="manga_boat[]"
                                        placeholder="metros.." value="{{ $item->manga_boat }}">
                                </td>
                                <td>
                                    <input type="number" id="cascoBuquesEslora1" name="eslora_boat[]"
                                        placeholder="metros.." value="{{ $item->eslora_boat }}">
                                </td>
                                <td>
                                    <input type="number" id="cascoBuquesPuntal1" name="puntual_boat[]"
                                        placeholder="metros.." value="{{ $item->puntual_boat }}">
                                </td>
                                <td>
                                    <input onkeyup="sumaCascoMaquina({{$key+1}}, 1, 'cascoBuques')" type="number" step="any" class="row{{$key+1}} col1"
                                        name="shell_boat[]" value="{{ $item->shell_boat }}">
                                </td>
                                <td>
                                    <input onkeyup="sumaCascoMaquina({{$key+1}}, 2, 'cascoBuques')" type="number" step="any" class="row{{$key+1}} col2"
                                        name="machine_boat[]" value="{{ $item->machine_boat }}">
                                </td>
                                <td style="text-align: center">
                                    <span class="slipTitle col3" id="rowTotal{{$key+1}}">0</span>$
                                </td>
                                <td></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td style="text-align: center">
                                1
                            </td>
                            <td>
                                <input type="text" name="name_boat[]" placeholder="...">
                            </td>
                            <td>
                                <input type="text" name="registration_boat[]" placeholder="...">
                            </td>
                            <td>
                                <select name="material_boat[]" id="cascoBuquesMaterial1">
                                    <option value="0" selected>Selecciona</option>
                                    <option value="Madera">Madera</option>
                                    <option value="Fibra de vidrio">Fibra de vidrio</option>
                                    <option value="Acero naval">Acero naval</option>
                                    <option value="Aluminio">Aluminio</option>
                                    <option value="Mixtos">Mixtos</option>
                                </select>
                            </td>
                            <td>
                                <input type="number" step="any" name="manga_boat[]" placeholder="metros..">
                            </td>
                            <td>
                                <input type="number" step="any" name="eslora_boat[]" placeholder="metros..">
                            </td>
                            <td>
                                <input type="number" step="any" name="puntual_boat[]" placeholder="metros..">
                            </td>
                            <td>
                                <input onkeyup="sumaCascoMaquina(1, 1, 'cascoBuques')" type="number" step="any" class="row1 col1"
                                    name="shell_boat[]" value="0">
                            </td>
                            <td>
                                <input onkeyup="sumaCascoMaquina(1, 2, 'cascoBuques')" type="number" step="any" class="row1 col2"
                                    name="machine_boat[]" value="0">
                            </td>
                            <td style="text-align: center">
                                <span class="slipTitle col3" id="rowTotal1">0</span>$
                            </td>
                            <td></td>
                        </tr>
                    @endif

                </tbody>

                <tfoot>
                    <td style="text-align: center">Total</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: center">
                        <span class="slipTitle" id="colTotal1">0</span>$
                    </td>
                    <td style="text-align: center">
                        <span class="slipTitle" id="colTotal2">0</span>$
                    </td>
                    <td style="text-align: center">
                        <span class="slipTitle" id="totalTotal">0</span>$
                    </td>
                    <td></td>
                </tfoot>

            </table>
        </div>

        {{-- USOS --}}
        <div class="two-sides">

            <div class="left_side">

                <div class="input_group">
                    <label >
                        <i class="fa-solid fa-bars-staggered"></i>
                        Límite de indemnizacion
                    </label>
                    <input type="number" name="limit_compensation"
                        value="{{ $slip_type->limit_compensation }}" >
                </div>
                
                <div class="input_group">
                    <label >
                        <i class="fa-solid fa-bars-staggered"></i>
                        Suma asegurada
                    </label>
                    <input type="number" name="insured_sum"
                        value="{{ $slip_type->insured_sum }}" >
                </div>

                <div class="input_group">
                    <label for="cascoBuquesUsos">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Usos
                    </label>
                    <select name="use_boat" id="cascoBuquesUsos">
                        <option value="0" selected >Selecciona</option>
                        <option value="mercantes" @if ($slip_type->use_boat == 'mercantes') selected @endif>Mercantes</option>
                        <option value="turismo"@if ($slip_type->use_boat == 'turismo') selected @endif>Turismo</option>
                        <option value="pesquero"@if ($slip_type->use_boat == 'pesquero') selected @endif>Pesquero</option>
                        <option value="remolcadores"@if ($slip_type->use_boat == 'remolcadores') selected @endif>Remolcadores</option>
                        <option value="placer"@if ($slip_type->use_boat == 'placer') selected @endif>Placer</option>
                        <option value="defensa"@if ($slip_type->use_boat == 'defensa') selected @endif>Defensa</option>
                        <option value="dragas"@if ($slip_type->use_boat == 'dragas') selected @endif>Dragas</option>
                        <option value="otros"@if ($slip_type->use_boat == 'otros') selected @endif>Otros</option>
                    </select>
                </div>

                
            </div>

            <div class="right_side">
                {{-- Área de navegación --}}
                <div class="input_group">
                    <label >
                        <i class="fa-solid fa-bars-staggered"></i>
                        Área de navegación
                    </label>
                    <input type="text" name="navigation"
                        value="{{ $slip_type->navigation }}" >
                </div>
                {{-- Modalidad poner opciones select --}}
                <div class="input_group">
                    <label>
                        <i class="fa-solid fa-bars-staggered"></i>
                        Modalidad
                    </label>
                    <select name="modality" id="modalidad">
                        <option value="3/4" @if ($slip_type->modality == '3/4') selected @endif>3/4</option>
                        <option value="4/4" @if ($slip_type->modality == '4/4') selected @endif>4/4</option>
                        <option value="otros"@if ($slip_type->modality == 'otros') selected @endif>Otros</option>
                    </select>
                </div>
            </div>

        </div>

        <div class="tableContainer">
            {{-- Cobertura --}}
            <div class="input_group" style="max-width: 600px">
                <label for="cascoBuquesCobertura">
                    <i class="fa-solid fa-bars-staggered"></i>
                    Cobertura
                </label>
                <textarea name="coverage" id="coverage" style="resize:both;width:100%;" 
 cols="30" rows="1">{{ $slip_type->coverage }}</textarea>
            </div>
        </div>

    </div>

    <div class="form_group3">
        {{-- Coberturas adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Coberturas Adicionales</h3>

        @include('admin.tecnico.slip.slips_generales.tableCoberturasAdicionales')

    </div>

    <div class="form_group4">
        {{-- Cláusulas Adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Cláusulas Adicionales</h3>

        @include('admin.tecnico.slip.slips_generales.clausulasAdicionales')

        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Exclusiones</h3>

        @include('admin.tecnico.slip.slips_generales.exclusiones')

    </div>

    <div class="form_group5">
        <h3 class="slipTitle"> <span class="badge badge-secondary">6</span> Deducibles</h3>

        @include('admin.tecnico.slip.slips_generales.deducibles')

    </div>

    <div class="form_group6">

        <div class="tableContainer" style="1.2rem 0">
            <h4 class="slipTitle">Condiciones precedentes de cobertura</h4>
            <div class="flexColumnCenterContainer" style="max-width:450px">
                <textarea name="precedent_conditions" placeholder="..."></textarea>
            </div>
        </div>

        @include('admin.tecnico.slip.slips_generales.footer1')
    
    </div>
    
    <div class="form_group7">
    
        @include('admin.tecnico.slip.slips_generales.footer2')
    
    </div>

</form>
