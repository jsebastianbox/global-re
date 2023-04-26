<form method="POST" action="{{ route('slip.update', $slip->id) }}" enctype="multipart/form-data" id="fromSlipAviacion3"
    class="new_entry__form" >
    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="licencia"> {{-- revisar value para envio tecnico --}}


    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip {{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        @include('admin.tecnico.slip.slips_generales.objectInsuranceAndCoverage')


        <div class="two-sides">

            <div class="left_side">
                    <div class="input_group">
                        <label >
                            <i class="fa-solid fa-bars-staggered"></i>
                            Valor Asegurado
                        </label>
                        <input type="text" name="valor_asegurado" id="value_for_calculos" value="{{ $slip->valor_asegurado }}">
                    </div>
                    <div class="input_group">
                        <label >
                            <i class="fa-solid fa-bars-staggered"></i>
                            Límite de indemnización
                        </label>
                        <input type="text" name="limit_compensation" value="{{ $slip_type->limit_compensation }}">
                    </div>
                <div class="input_group">
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

            <div class="right_side">
                {{-- Usos: --}}
                <div class="input_group">
                    <label for="cascoAereoUsos">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Usos:
                    </label>
                    <input type="text" id="cascoAereoUsos" name="use_aerial" placeholder="...">
                </div>
                
                {{-- Límite geográfico: --}}
                <div class="input_group">
                    <label for="cascoAereoGeografico">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Ubicación:
                    </label>
                    <input type="text" value="{{ $slip_type->geography_limit }}" name="geography_limit">
                </div>


            </div>

        </div>

    </div>

    <div class="form_group2">
        {{-- Coberturas adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Coberturas Adicionales</h3>

        @include('admin.comercial.include.edit_tablaCoberturas')

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
