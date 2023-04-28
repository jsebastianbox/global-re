<form method="POST" action="{{ route('slip.update', $slip->id) }}" enctype="multipart/form-data"
    id="formSlipBankers" class="new_entry__form">

    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="bbb">


    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> {{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        @include('admin.tecnico.slip.slips_generales.objectInsuranceAndCoverage')

    </div>

    <div class="form_group2">

        <div class="two-sides">

            <div class="left_side">


                {{-- Limite Indemnización --}}
                <h5 class="slipTitle">Límite de indemnización (USD):</h5>
                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Seccion I: BBB
                    </label>
                    <input type="text" value="{{$slip_type->description_compensation_limit}}" name="description_compensation_limit" placeholder="...">
                </div>
                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Seccion II: Crimen por computador
                    </label>
                    <input type="text" value="{{$slip_type->description_compensation_limit2}}" name="description_compensation_limit2" placeholder="...">
                </div>
                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Seccion III: Directores y administradores
                    </label>
                    <input type="text" value="{{$slip_type->description_compensation_limit3}}" name="description_compensation_limit3" placeholder="...">
                </div>

            </div>

            <div class="right_side">

                {{-- Cobertura --}}
                <h5 class="slipTitle">Coberturas:</h5>
                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Seccion I: BBB
                    </label>
                    <input type="text" id="" name="description_coverage[]" placeholder="...">
                </div>
                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Seccion II: Crimen por computador
                    </label>
                    <input type="text" id="" name="description_coverage[]" placeholder="...">
                </div>
                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Seccion III: Directores y administradores
                    </label>
                    <input type="text" id="" name="description_coverage[]" placeholder="...">
                </div>

            </div>
        </div>


    </div>

    <div class="form_group3">

        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Coberturas Adicionales</h3>

        @include('admin.comercial.include.edit_tablaCoberturas')

    </div>

    <div class="form_group4">
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Cláusulas Adicionales</h3>

        @include('admin.comercial.include.edit_tablaClausulas')

    </div>

    <div class="form_group5">
        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Exclusiones</h3>

        @include('admin.tecnico.slip.slips_generales.exclusiones')

        <h3 class="slipTitle"> <span class="badge badge-secondary">6</span> Deducibles</h3>

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

        <div class="tableContainer" style="1.2rem 0">
            <h4 class="slipTitle">Siniestralidad</h4>
            <div class="flexColumnCenterContainer">
                <div class="input_group" style="width:400px">
                    
                    <input type="text" value="" placeholder="...">
                    <input type="file" name="siniestralidad" placeholder="No. Días">
                </div>
            </div>
        </div>

        @include('admin.tecnico.slip.slips_generales.footer1')
    
    </div>
    
    <div class="form_group7">
    
        @include('admin.tecnico.slip.slips_generales.footer2')
    
    </div>

</form>
