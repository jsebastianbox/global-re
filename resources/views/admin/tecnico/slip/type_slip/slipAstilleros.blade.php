<form method="POST" action="{{ route('slip.update',$slip->id) }}" action="{{ route('slip.store') }}" enctype="multipart/form-data" id="formSlipAstilleros"
    class="new_entry__form">

    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="astillero">

    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip Responsabilidad Civil Astilleros</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        <div class="two-sides" style="width: 100%">

            <div class="left_side">


                {{-- Objeto del seguro --}}
                <div class="input_group">
                    <label for="astillerosObjetoSeguro">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Objeto del seguro
                    </label>
                    <textarea name="object_insurance" id="object_insurance" cols="30" rows="1"></textarea>
                </div>

                {{-- Cobertura --}}
                <div class="input_group">
                    <label for="astillerosCobertura">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Cobertura
                    </label>
                    <textarea name="coverage" id="coverage" style="resize:both;width:100%;" 
 cols="30" rows="1"></textarea>
                </div>
            </div>

            <div class="right_side">

                {{-- Limite de Indemnizacion: --}}
                <div class="input_group">
                    <label for="astillerosLimiteIndem">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Limite de indemnizacion:
                    </label>
                    <input type="number" id="astillerosLimiteIndem" name="limit_compensation" placeholder="numérico.." disabled>
                </div>

            </div>

        </div>
    </div>

    <div class="form_group2">
        {{-- Coberturas adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Coberturas Adicionales</h3>

        @include('admin.tecnico.slip.slips_generales.tableCoberturasAdicionales')

    </div>

    <div class="form_group3">
        {{-- Cláusulas Adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Cláusulas Adicionales</h3>
        
        @include('admin.tecnico.slip.slips_generales.clausulasAdicionales')
        
    </div>

    <div class="form_group4">
        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Exclusiones</h3>

        @include('admin.tecnico.slip.slips_generales.exclusiones')

    </div>

    <div class="form_group5">

        {{-- DEDUCIBLE --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Deducibles</h3>

        @include('admin.tecnico.slip.slips_generales.deducibles')

    </div>

    <div class="form_group6">

        <div class="tableContainer" style="1.2rem 0">
            <h4 class="slipTitle">Condiciones precedentes de cobertura</h4>
            <div class="flexColumnCenterContainer" style="max-width:450px">
                <div class="input_group" style="width:400px">
                    <label >
                        <i class="fa-solid fa-bars-staggered"></i>
                        Condiciones precedentes de cobertura
                    </label>
                    <input type="text" name="precedent_conditions" placeholder="...">
                </div>
            </div>
        </div>

        @include('admin.tecnico.slip.slips_generales.footer1')
    
    </div>
    
    <div class="form_group7">
    
        @include('admin.tecnico.slip.slips_generales.footer2')
    
    </div>

</form>
