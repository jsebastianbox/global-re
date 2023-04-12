<form method="POST" action="{{ route('slip.update', $slip->id) }}"  enctype="multipart/form-data" id="formSlipRobo"
    class="new_entry__form" >
    @method('PUT');

    @csrf

    <input type="hidden" name="type_slip" value="robo">

    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip Robo y/o Asalto</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        {{-- Objeto del seguro --}}
        <div class="flexColumnCenterContainer">
            <div class="input_group" style="max-width: 450px">
                <label>
                    <i class="fa-solid fa-bars-staggered"></i>
                    Objeto del seguro
                </label>
                <textarea name="object_insurance" id="object_insurance" cols="30" rows="1"></textarea>
            </div>
        </div>

        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Suma Asegurable y/o Suma Asegurada</h3>

        <div class="flexColumnCenterContainer">
            <div class="input_group" style="max-width: 350px">
                <label for="sumaAsegurada">
                    Suma asegurada
                </label>
                <input id="sumaAsegurada" type="radio" name="sumas" onclick="chooseTypeSuma(event)">
            </div>
            <div class="input_group" style="max-width: 350px">
                <label for="sumaAsegurable">
                    Suma asegurable
                </label>
                <input id="sumaAsegurable" type="radio" name="sumas" onclick="chooseTypeSuma(event)">
            </div>
        </div>
        {{-- Suma asegurable / asegurada --}}

        <div id="sumaAsegurableContainer" class="flexColumnCenterContainer" style="display:none;margin:2.5rem 0">
            <div class="input_group" style="max-width: 300px;margin:1rem">
                <label for="incendioSumaAsegurable">
                    <i class="fa-solid fa-bars-staggered"></i>
                    Suma asegurable
                </label>
                <input type="text" id="incendioSumaAsegurable" name="insurable_sum">
            </div>
        </div>

        <div id="sumaAseguradaContainer" class="tableContainer" style="display:none;margin:1.5rem 0">
            <h4 class="slipTitle">Tabla suma asegurada</h4>
            @include('admin.tecnico.slip.slips_generales.tableSumaAsegurada')
        </div>

        <div class="flexRowWrapContainer" style="margin: 2.5rem auto">
            <div class="left_side">
                {{-- Cobertura --}}
                <div class="input_group">
                    <label style="margin-right: 8px">
                        Cobertura:
                    </label>
                    <textarea name="coverage" id="coverage" style="resize:both;width:100%;" 
 cols="30" rows="1"></textarea>
                </div>
            </div>

            <div class="right_side">
                {{-- Límite de Indemnización --}}
                <div class="input_group">
                    <label for="roboAsaltoLimiteIndem1">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Límite de indemnización:
                    </label>
                    <input type="number" id="roboAsaltoLimiteIndem1" name="limit_compensation" placeholder="0">
                </div>

                <div class="input_group">
                    <label for="roboAsaltoLimiteIndem2">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Primer riesgo:
                    </label>
                    <select name="first_risk" id="roboAsaltoLimiteIndem2">
                        <option value="0" selected disabled>Selecciona</option>
                        <option value="absoluto">Absoluto</option>
                        <option value="relativo">Relativo</option>
                    </select>
                </div>
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

        <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Exclusiones</h3>

        <div class="two-sides">
            <div id="exclusion-left_side" class="left_side">
                <div class="input_group">
                    <label for="roboAsaltoExclusion1">
                        <i class="fa-regular fa-flag"></i>
                        Eventos químicos, biológicos, nucleares, radiológicos, cibernéticos
                    </label>
                    <input type="checkbox" id="roboAsaltoExclusion1"
                        value="Eventos químicos, biológicos, nucleares, radiológicos, cibernéticos"
                        name="description_exclusion[]">
                </div>
                <div class="input_group">
                    <label for="roboAsaltoExclusion2">
                        <i class="fa-regular fa-flag"></i>
                        Daño y pérdida de información tecnológica
                    </label>
                    <input type="checkbox" id="roboAsaltoExclusion2"
                        value="Daño y pérdida de información tecnológica" name="description_exclusion[]">
                </div>
                <div class="input_group">
                    <label for="roboAsaltoExclusion3">
                        <i class="fa-regular fa-flag"></i>
                        Cualquier tipo de multas y penalizaciones
                    </label>
                    <input type="checkbox" id="roboAsaltoExclusion3"
                        value="Cualquier tipo de multas y penalizaciones" name="description_exclusion[]">
                </div>
                <div class="input_group">
                    <label for="roboAsaltoExclusion4">
                        <i class="fa-regular fa-flag"></i>
                        Guerra, guerra civil y sus consecuencias
                    </label>
                    <input type="checkbox" id="roboAsaltoExclusion4" value="Guerra, guerra civil y sus consecuencias"
                        name="description_exclusion[]">
                </div>
                <div class="input_group">
                    <label for="roboAsaltoExclusion5">
                        <i class="fa-regular fa-flag"></i>
                        Reacción nuclear
                    </label>
                    <input type="checkbox" id="roboAsaltoExclusion5" value="Reacción nuclear"
                        name="description_exclusion[]">
                </div>
                <div class="input_group">
                    <label for="roboAsaltoExclusion6">
                        <i class="fa-regular fa-flag"></i>
                        Cláusula de exclusión cibernética
                    </label>
                    <input type="checkbox" id="roboAsaltoExclusion6"value="Cláusula de exclusión cibernética"
                        name="description_exclusion[]">
                </div>
                <div class="input_group">
                    <label for="roboAsaltoExclusion7">
                        <i class="fa-regular fa-flag"></i>
                        Cláusula de sanciones, limitaciones y exclusiones
                    </label>
                    <input type="checkbox"
                        id="roboAsaltoExclusion7"value="Cláusula de sanciones, limitaciones y exclusiones"
                        name="description_exclusion[]">
                </div>

                <div class="input_group">
                    <label for="roboAsaltoExclusion8">
                        <i class="fa-regular fa-flag"></i>
                        Cláusula de exclusión de filtración, polución y contaminación
                    </label>
                    <input type="checkbox" id="roboAsaltoExclusion8"
                        value="Cláusula de exclusión de filtración, polución y contaminación"
                        name="description_exclusion[]">
                </div>
                <div class="input_group">
                    <label for="roboAsaltoExclusion9">
                        <i class="fa-regular fa-flag"></i>
                        Cualquier cobertura de pérdidas consecuenciales
                    </label>
                    <input type="checkbox" id="roboAsaltoExclusion9"
                        value="Cualquier cobertura de pérdidas consecuenciales" name="description_exclusion[]">
                </div>

            </div>

            <div class="right_side" style="align-items: flex-start; justify-content: center">

                <div class="input_group">
                    <label for="roboAsaltoExclusion10">
                        <i class="fa-regular fa-flag"></i>
                        Responsabilidad Civil
                    </label>
                    <input type="checkbox" id="roboAsaltoExclusion10" value="Responsabilidad Civil"
                        name="description_exclusion[]">
                </div>
                <div class="input_group">
                    <label for="roboAsaltoExclusion11">
                        <i class="fa-regular fa-flag"></i>
                        Transporte de mercancías

                    </label>
                    <input type="checkbox" id="roboAsaltoExclusion11" value="Transporte de mercancías"
                        name="description_exclusion[]">
                </div>
                <div class="input_group">
                    <label for="roboAsaltoExclusion12">
                        <i class="fa-regular fa-flag"></i>
                        Infidelidad o actos deshonestos de los administradores o cualquiera de los trabajadores del
                        asegurado
                    </label>
                    <input type="checkbox" id="roboAsaltoExclusion12"
                        value="Infidelidad o actos deshonestos de los administradores o cualquiera de los trabajadores del asegurado"
                        name="description_exclusion[]">
                </div>
                <div class="input_group">
                    <label for="roboAsaltoExclusion13">
                        <i class="fa-regular fa-flag"></i>
                        Los faltantes y pérdidas misteriosas e inexplicables y otras pérdidas descubiertas después de
                        realizar el inventario
                    </label>
                    <input type="checkbox" id="roboAsaltoExclusion13"
                        value="Los faltantes y pérdidas misteriosas e inexplicables y otras pérdidas descubiertas después de realizar el inventario"
                        name="description_exclusion[]">
                </div>
                <div class="input_group">
                    <label for="roboAsaltoExclusion14">
                        <i class="fa-regular fa-flag"></i>
                        Pérdidas indirectas, pérdidas consecuenciales por cualquier causa y pérdidas de mercado
                    </label>
                    <input type="checkbox" id="roboAsaltoExclusion14"
                        value="Pérdidas indirectas, pérdidas consecuenciales por cualquier causa y pérdidas de mercado"
                        name="description_exclusion[]">
                </div>

                <button class="new_entry__form--button" onclick="addExclusion(event)">Agregar exclusion</button>

            </div>
        </div>

    </div>

    <div class="form_group5">

        {{-- -deducibles --}}

        <h3 class="slipTitle"> <span class="badge badge-secondary">6</span> Deducibles</h3>

        @include('admin.tecnico.slip.slips_generales.deducibles')

    </div>

    <div class="form_group6">

        @include('admin.tecnico.slip.slips_generales.footer1')

    </div>

    <div class="form_group7">

        @include('admin.tecnico.slip.slips_generales.footer2')

    </div>


</form>
