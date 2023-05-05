<form method="POST" action="{{ route('slip.update', $slip->id) }}" enctype="multipart/form-data" id="formSlipFidelidad"
    class="new_entry__form" >
    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="fidelidad">


    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip {{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        @include('admin.tecnico.slip.slips_generales.objectInsuranceAndCoverage')


        <div class="two-sides">

            <div class="left_side">

                {{-- Tipo de cobertura --}}
                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Tipo de cobertura
                    </label>
                    <select name="type_coverage_fidelidad" id="type_coverage_fidelidad">
                        <option value="Blanket" {{$slip_type->type_coverage_fidelidad == 'Blanket' ? 'selected' : ''}} >Blanket</option>
                        <option value="Nominal" {{$slip_type->type_coverage_fidelidad == 'Nominal' ? 'selected' : ''}} >Nominal</option>
                    </select>
                </div>
                
                {{-- Periodo de descubrimiento --}}
                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Periodo de descubrimiento
                    </label>
                    <input type="text" id="" name="periodo_descubrimiento" value="{{$slip_type->periodo_descubrimiento}}">
                </div>

            </div>

            <div class="right_side">


                {{-- Limite colusorio --}}
                <h5 class="slipTitle">Límite colusorio:</h5>
                <div class="input_group">
                    <input type="number" value="{{ $slip_type->limit_colusorio_value}}" name="limit_colusorio_value">
                </div>
                <div class="input_group">
                    <input type="text" value="{{ $slip_type->limit_colusorio_text}}" name="limit_colusorio_text">
                </div>
            </div>
        </div>


    </div>

    <div class="form_group2">
        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Coberturas Adicionales</h3>

        @include('admin.comercial.include.edit_tablaCoberturas')

    </div>

    <div class="form_group3">

    </div>

    <div class="form_group4">
        {{-- Cláusulas Adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Cláusulas Adicionales</h3>
        
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
