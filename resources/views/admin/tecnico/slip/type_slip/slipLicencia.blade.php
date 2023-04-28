<form method="POST" action="{{ route('slip.update', $slip->id) }}" enctype="multipart/form-data" id="formSlipLicencia"
    class="new_entry__form" >
    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="licencia">


    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip {{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        @include('admin.tecnico.slip.slips_generales.objectInsuranceAndCoverage')

        {{-- table Objetos del seguro --}}
        <div class="tableContainer">
            <h4 class="slipTitle">Objeto(s) del seguro</h4>

            <div class="tableContainer">
                @include('admin.comercial.include.tablePilotosAviacion')
            </div>

        </div>

        <div class="two-sides">
            <div class="left_side">
                {{-- <div class="input_group">
                    <label >
                        <i class="fa-solid fa-pager"></i>
                        Límite de indemnización:
                    </label>
                    <input type="text" name="limit_compensation" value="{{ $slip->limit_compensation }}">
                </div> --}}

                <div class="input_group">
                    <label for="licenciaGeografico">
                        <i class="fa-solid fa-pager"></i>
                        Límite geográfico:
                    </label>
                    <input type="text" id="licenciaGeografico" name="geography_limit">
                </div>

            </div>

            <div class="right_side">
                <div class="input_group">
                    <label for="licenciaUsos" style="margin-right: 3rem">
                        <i class="fa-solid fa-pager"></i>
                        Usos:
                    </label>
                    <input type="text" id="licenciaUsos" name="use_loss_license'">
                </div>

                

            </div>
        </div>

    </div>

    <div class="form_group2">
        {{-- Coberturas adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Coberturas Adicionales</h3>

        @include('admin.comercial.include.edit_tablePilotosCoberturas')

    </div>

    <div class="form_group3">
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Cláusulas Adicionales</h3>

        @include('admin.comercial.include.edit_tablaClausulas')

    </div>

    <div class="form_group4">
        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Exclusiones</h3>

        @include('admin.tecnico.slip.slips_generales.exclusiones')

    </div>

    <div class="form_group5">
        <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Deducibles</h3>

        @include('admin.tecnico.slip.slips_generales.deducibles')

    </div>

    <div class="form_group6">

        @include('admin.tecnico.slip.slips_generales.footer1')
    
    </div>
    
    <div class="form_group7">
    
        @include('admin.tecnico.slip.slips_generales.footer2')
    
    </div>

</form>
