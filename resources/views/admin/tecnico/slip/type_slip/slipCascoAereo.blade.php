<form method="POST" action="{{ route('slip.update', $slip->id) }}" enctype="multipart/form-data" id="formSlipCascoAereo"
    class="new_entry__form">

    @method('PUT')

    @csrf
    <input type="hidden" name="type_slip" value="casco_aereo">


    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span>{{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        <div class="two-sides">

            <div class="left_side">
                {{-- Objeto del seguro: --}}
                <div class="input_group">
                    <label for="cascoAereoObjetoSeguro">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Objeto del seguro:
                    </label>
                    <textarea name="object_insurance" cols="30" rows="1">{{ $slip_type->object_insurance }}</textarea>
                </div>

                {{-- Usos: --}}
                <div class="input_group">
                    <label for="cascoAereoUsos">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Usos:
                    </label>
                    <input type="text" id="cascoAereoUsos" name="use_aerial" placeholder="...">
                </div>

            </div>

            <div class="right_side">

                {{-- Límite geográfico: --}}
                <div class="input_group">
                    <label for="cascoAereoGeografico">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Límite geográfico:
                    </label>
                    <input type="text" value="{{ $slip_type->geography_limit }}" name="geography_limit">
                </div>
                {{-- Pilotos autorizados --}}
                <div class="input_group">
                    <label>
                        <i class="fa-solid fa-bars-staggered"></i>
                        Pilotos autorizados:
                    </label>
                    <input type="text" value="{{ $slip_type->pilot_authorized }}" name="pilot_authorized">
                </div>


            </div>

        </div>
    </div>

    <div class="form_group2">
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Información de las aeronaves</h3>

        <div class="tableContainer">
            <table id="cascoAereoTableAeronaves" class="indemnizacionTable bigTable" style="margin: 1.5rem 0">
                <thead>
                    <tr>
                        <th style="text-align: center">#</th>
                        <th style="text-align: center">Tipo Ala</th>
                        <th style="text-align: center">Serie</th>
                        <th style="text-align: center">Marca</th>
                        <th style="text-align: center">Modelo</th>
                        <th style="text-align: center">Año Fab. </th>
                        <th style="text-align: center">Cap. Crew </th>
                        <th style="text-align: center">Cap. Pax </th>
                        <th style="text-align: center">Suma Asegurada </th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($information_aerial) > 0)
                        @foreach ($information_aerial as $key => $item)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>
                                    <select name="type_ala_aerial[]" id="cascoAereoTipoAla1">
                                        @if ($item->type_ala_aerial != 'Fija')
                                            <option selected value="{{ $item->type_ala_aerial }}"> Rotativa</option>
                                            <option value="Fija"> Fija</option>
                                        @else
                                            <option selected value="{{ $item->type_ala_aerial }}">Fija</option>
                                            <option value="Rotativa">Rotativa</option>
                                        @endif
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="serie_aerial[]" value="{{ $item->serie_aerial }}">
                                </td>
                                <td>
                                    <input type="text" name="marca_aerial[]" value="{{ $item->marca_aerial }}">
                                </td>
                                <td>
                                    <input type="text" name="model_aerial[]" value="{{ $item->model_aerial }}">
                                </td>
                                <td>
                                    <input type="text" name="year_manufacture_aerial[]"
                                        value="{{ $item->year_manufacture_aerial }}">
                                </td>
                                <td>
                                    <input type="text" name="cap_crew[]" value="{{ $item->cap_crew }}">
                                </td>
                                <td>
                                    <input type="text" name="cap_pax[]" value="{{ $item->cap_pax }}">
                                </td>
                                <td>
                                    <input type="number" step="any" name="sum_insured[]" value="{{ $item->sum_insured }}">
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td style="text-align: center">
                                1
                            </td>
                            <td>
                                <select name="type_ala_aerial[]" id="cascoAereoTipoAla1">
                                    <option value="0" selected>Selecciona</option>
                                    <option value="Fija">Fija</option>
                                    <option value="Rotativa">Rotativa</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" id="cascoAereoSerie1" name="serie_aerial[]" placeholder="...">
                            </td>
                            <td>
                                <input type="text" id="cascoAereoMarca1" name="marca_aerial[]" placeholder="...">
                            </td>
                            <td>
                                <input type="text" id="cascoAereoModelo1" name="model_aerial[]" placeholder="...">
                            </td>
                            <td>
                                <input type="text" id="cascoAereoAño1" name="year_manufacture_aerial[]"
                                    placeholder="...">
                            </td>
                            <td>
                                <input type="text" id="cascoAereoCrew1" name="cap_crew[]" placeholder="...">
                            </td>
                            <td>
                                <input type="text" id="cascoAereoPax1" name="cap_pax[]" placeholder="...">
                            </td>
                            <td>
                                <input type="number" step="any" id="cascoAereoSumaAsegurada1" name="sum_insured[]" placeholder="0">
                            </td>
                        </tr>
                    @endif


                </tbody>

            </table>

            <div class="input_group" style="margin-top: 2rem; max-width:400px">
                <label>
                    <i class="fa-sharp fa-solid fa-plane"></i>
                    Tipo de aviación
                </label>
                <select name="type_aviation" id="tipoAviacion">
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="comercial" @if($slip_type->type_aviation == 'comercial') selected @endif >Comercial</option>
                    <option value="general" @if($slip_type->type_aviation == 'general') selected @endif >General</option>
                    <option value="escuela" @if($slip_type->type_aviation == 'escuela') selected @endif >Escuelas de aviación</option>
                    <option value="fumigacion" @if($slip_type->type_aviation == 'fumigacion') selected @endif >Fumigación</option>
                    <option value="privado" @if($slip_type->type_aviation == 'privado') selected @endif >Privado placer</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form_group3">
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Coberturas y Límites</h3>


                
        @if (count($aviation_extras) > 0)
            @foreach ($aviation_extras as $key => $item )
                <p class="slipTitle">{{$item->description_coverage}}:</p>
                <div class="two-sides" style="justify-content:space-between">
                    <div class="left_side">
                        <div class="input_group">
                            <label for="" style="margin-right:1rem">
                                Cobertura
                            </label>
                            <input type="hidden" name="description_coverage[]" value="{{$item->description_coverage}}">
                            <input type="text" name="aditional_coverage[]" value="{{$item->aditional_coverage}}" >
                        </div>
                    </div>
                    <div class="right_side">
                        <div class="input_group">
                            <label for="" style="margin-right:1rem">
                                Límite
                            </label>
                            <input type="hidden" name="limit_description_coverage[]" value="{{$item->limit_description_coverage}}">
                            <input type="text" name="limit_aditional_coverage[]" value="{{$item->limit_aditional_coverage}}" >
                        </div>
                    </div>
                </div>
            @endforeach
        @endif


    </div>

    <div class="form_group4">
        <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Coberturas Adicionales</h3>
        

        @include('admin.tecnico.slip.slips_generales.tableCoberturasAdicionalesV2')
        
        {{-- Cláusulas Adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">6</span> Cláusulas Adicionales</h3>

        @include('admin.tecnico.slip.slips_generales.tableClausulasAdicionalesV2')
    </div>

    <div class="form_group5">
        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">7</span> Exclusiones</h3>

        @include('admin.tecnico.slip.slips_generales.exclusiones')

        {{-- Deducibles --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">8</span> Deducibles</h3>

        @include('admin.tecnico.slip.slips_generales.deducibles')

    </div>

    <div class="form_group6">

        <div class="tableContainer" style="1.2rem 0">
            <h4 class="slipTitle">Siniestralidad ultimos 5 años</h4>
            <div class="flexColumnCenterContainer" style="max-width:450px">
                <textarea name="accidentRate">{{$slip->accidentRate}}</textarea>
            </div>
        </div>

        <div class="tableContainer" style="1.2rem 0">
            <h4 class="slipTitle">Condiciones precedentes de cobertura</h4>
            <div class="flexColumnCenterContainer" style="max-width:450px">
                <textarea placeholder="..." name="precedent_conditions"></textarea>
            </div>
        </div>

        @include('admin.tecnico.slip.slips_generales.footer1')

    </div>

    <div class="form_group7">

        @include('admin.tecnico.slip.slips_generales.footer2')

    </div>

</form>
