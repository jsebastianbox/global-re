<form method="POST" action="{{ route('slip.update', $slip->id) }}" enctype="multipart/form-data"
    id="formSlipContractual" class="new_entry__form">
    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="civil_contractual">


    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip {{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        @include('admin.tecnico.slip.slips_generales.objectInsuranceAndCoverage')

    </div>

    <div class="form_group2">

        <h5 class="slipTitle">Límite de indemnización:</h5>

        <div class="two-sides">
            <div class="left_side">

                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Límite único combinado por evento
                    </label>
                    <input type="number" step="any" value="{{$slip_type->limit_event}}" name="limit_event" placeholder="USD">
                </div>

            </div>

            <div class="right_side">

                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Límite agregado anual
                    </label>
                    <input type="number" step="any" value="{{$slip_type->limit_annual}}" name="limit_annual" placeholder="USD">
                </div>
            </div>

        </div>


    </div>

    <div class="form_group3">
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Coberturas Adicionales</h3>

        @include('admin.comercial.include.edit_tablaCoberturas')

    </div>

    <div class="form_group4">
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Cláusulas Adicionales </h3>

        @include('admin.comercial.include.edit_tablaClausulas')

    </div>

    <div class="form_group5">
        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Exclusiones</h3>

        @include('admin.tecnico.slip.slips_generales.exclusiones')

        <h3 class="slipTitle"> <span class="badge badge-secondary">6</span> Deducibles</h3>

        @include('admin.tecnico.slip.slips_generales.deducibles')

    </div>

    <div class="form_group6">

        <div class="tableContainer" style="1.2rem 0">
            <h4 class="slipTitle">Condiciones adicionales</h4>
            <div class="flexColumnCenterContainer">
                <div class="input_group" style="width:400px">

                    <label>
                        <i class="fa fa-search" aria-hidden="true"></i>
                        Condiciones adicionales
                    </label>
                    <input type="text" name="condition_additional" placeholder="...">
                </div>
            </div>
        </div>

        @include('admin.tecnico.slip.slips_generales.footer1')
    
    </div>
    
    <div class="form_group7">
    
        @include('admin.tecnico.slip.slips_generales.footer2')
    
    </div>


</form>
