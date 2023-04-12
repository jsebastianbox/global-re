<form method="POST" action="{{ route('slip.update', $slip->id) }}" enctype="multipart/form-data" id="formSlipSabotaje"
    class="new_entry__form" >
    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="sabotaje">

    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip Sabotaje y Terrorismo</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        <div class="flexColumnCenterContainer">
            <div class="input_group" style="max-width: 350px">
                <label >
                    <i class="fa-sharp fa-solid fa-angles-right"></i>
                    Objeto asegurado:
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


        <div class="flexRowWrapContainer" style="margin: 2rem 1rem">
            {{-- Límite de Indemnización --}}
            <div class="left_side">
                <div class="input_group">
                    <label for="incendioLimiteIndem">
                        Límite de indemnización:
                    </label>
                    <input type="number" id="incendioLimiteIndem" name="limit_compensation" disabled>
                </div>
            </div>

            <div class="right_side">
                <div class="input_group">
                    <label style="margin-right: 8px">
                        Cobertura:
                    </label>
                    <textarea name="coverage" id="coverage" style="resize:both;width:100%;" 
 cols="30" rows="1"></textarea>
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
        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Exclusiones</h3>

        <div class="two-sides">
            <div id="exclusion-left_side" class="left_side">
                <div class="input_group">
                    <label for="sabotajeExclusion1">
                        <i class="fa-regular fa-flag"></i>
                        Pagos ex gratia
                    </label>
                    <input type="checkbox" id="sabotajeExclusion1" value="Pagos ex gratia"
                        name="description_exclusion[]">
                </div>
                <div class="input_group">
                    <label for="sabotajeExclusion2">
                        <i class="fa-regular fa-flag"></i>
                        Cualquier tipo de responsabilidad civil
                    </label>
                    <input type="checkbox" id="sabotajeExclusion2" value="Cualquier tipo de responsabilidad civil"
                        name="description_exclusion[]">
                </div>
                <div class="input_group">
                    <label for="sabotajeExclusion3">
                        <i class="fa-regular fa-flag"></i>
                        Excluye BI/CBI
                    </label>
                    <input type="checkbox" id="sabotajeExclusion3" value="Excluye BI/CBI"
                        name="description_exclusion[]">
                </div>
                <div class="input_group">
                    <label for="sabotajeExclusion4">
                        <i class="fa-regular fa-flag"></i>
                        Actos de crimen organizado
                    </label>
                    <input type="checkbox" id="sabotajeExclusion4" value="Actos de crimen organizado"
                        name="description_exclusion[]">
                </div>
                <div class="input_group">
                    <label for="sabotajeExclusion5">
                        <i class="fa-regular fa-flag"></i>
                        Automóviles
                    </label>
                    <input type="checkbox" id="sabotajeExclusion5" value="Automóviles"
                        name="description_exclusion[]">
                </div>
                <div class="input_group">
                    <label for="sabotajeExclusion6">
                        <i class="fa-regular fa-flag"></i>
                        Bienes en tránsito
                    </label>
                    <input type="checkbox" id="sabotajeExclusion6"value="Bienes en tránsito"
                        name="description_exclusion[]">
                </div>

            </div>

            <div class="right_side" style="align-items:flex-end">

                <button class="new_entry__form--button" onclick="addExclusion(event)">Agregar
                    exclusion</button>

            </div>
        </div>
    </div>

    <div class="form_group5">
        {{-- DEDUCIBLE --}}
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
