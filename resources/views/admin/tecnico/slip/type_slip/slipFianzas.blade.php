<form method="POST" action="{{ route('slip.update', $slip->id) }}"  enctype="multipart/form-data" id="formSlipFianzas"
    class="new_entry__form" >
    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="fianza">


    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip {{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')
        <div class="two-sides">

            <div class="left_side">
                {{-- Obligación a garantizar --}}
                <div class="input_group">
                    <label>
                        <i class="fa-solid fa-bars-staggered"></i>
                        Obligación a garantizar
                    </label>
                    <input type="text" value="{{ $slip_type->unsecured_obligation }}" name="unsecured_obligation">
                </div>
                {{-- Afianzado --}}
                <div class="input_group">
                    <label>
                        <i class="fa-solid fa-bars-staggered"></i>
                        Afianzado
                    </label>
                    <input type="text" value="{{ $slip_type->entrenched }}" name="entrenched">
                </div>
                {{-- Actividad --}}
                <div class="input_group">
                    <label>
                        <i class="fa-solid fa-bars-staggered"></i>
                        Actividad del afianzado
                    </label>
                    <input type="text" placeholder="..." name="beneficiary_activity">
                </div>
                {{-- Beneficiario --}}
                <div class="input_group">
                    <label>
                        <i class="fa-solid fa-bars-staggered"></i>
                        Beneficiario
                    </label>
                    <input type="text" value="{{ $slip_type->beneficiary }}" name="beneficiary">
                </div>
                {{-- Vigencia --}}
                <h5 class="slipTitle">Vigencia del contrato:</h5>
                <div class="input_group">
                    <label>
                        <i class="fa-solid fa-calendar-check"></i>
                        Desde
                    </label>
                    <input type="date" name="from_date_mount_contract"
                            value="{{ $slip_type->from_date_mount_contract }}"
                            min="2019-07-30" max="2023-07-30">
                </div>
                <div class="input_group">
                    <label>
                        <i class="fa-solid fa-calendar-check"></i>
                        Hasta
                    </label>
                    <input type="date" name="to_date_mount_contract"
                        value="{{ $slip_type->to_date_mount_contract }}"
                            min="2019-07-30" max="2023-07-30">
                </div>

            </div>
            <div class="right_side">


                {{-- tipo de la fianza --}}
                <div class="input_group">
                    <label>
                        <i class="fa-solid fa-bars-staggered"></i>
                        Tipo de fianza
                    </label>
                    <input type="text" value="{{ $slip_type->type_fianza }}" name="type_fianza">
                </div>
                {{-- Monto de la fianza --}}
                <div class="input_group">
                    <label>
                        <i class="fa-solid fa-bars-staggered"></i>
                        Monto de la fianza
                    </label>
                    <input type="number" step="any" value="{{ $slip_type->mount_fianza }}" name="mount_fianza">
                </div>
                {{-- Monto del contrato --}}
                <div class="input_group">
                    <label>
                        <i class="fa-solid fa-bars-staggered"></i>
                        Monto del contrato
                    </label>
                    <input type="text" value="{{ $slip_type->to_date_mount_contract }}" name="mount_contract">
                </div>
                {{-- Detalle de contragarantías --}}
                <div class="input_group">
                    <label>
                        <i class="fa-solid fa-bars-staggered"></i>
                        Detalle de contragarantías
                    </label>
                    <input type="text" placeholder="..." name="counter_guarantee_detail">
                </div>

                {{-- -Cobertura --}}

                <div class="input_group">
                    <label>
                        <i class="fa-solid fa-bars-staggered"></i>
                        Cobertura
                    </label>
                    <textarea name="coverage" id="coverage" style="resize:both;width:100%;" 
 cols="30" rows="1"></textarea>
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
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Cláusulas Adicionales</h3>

        {{-- Cláusulas Adicionales --}}
        @include('admin.tecnico.slip.slips_generales.clausulasAdicionales')

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
