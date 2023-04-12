<form method="POST" action="{{ route('slip.update', $slip->id) }}"  enctype="multipart/form-data" id="formSlipExtraco"
    class="new_entry__form">
    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="civil_extraco">


    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip Responsabilidad Civil Extracontractual</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

    </div>

    <div class="form_group2">

        <div class="two-sides">
            <div class="left_side">

                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Objeto del seguro
                    </label>
                    <textarea name="object_insurance" id="object_insurance" cols="30" rows="1"></textarea>
                </div>

                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Cobertura
                    </label>
                    <textarea name="coverage" id="coverage" style="resize:both;width:100%;" 
 cols="30" rows="1"></textarea>
                </div>

            </div>

            <div class="right_side">
                <h5 class="slipTitle">Límite de indemnización:</h5>

                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Límite único combinado por evento
                    </label>
                    <input type="number" id="" name="limit_event" placeholder="USD" disabled>
                </div>

                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Límite agregado anual
                    </label>
                    <input type="number" id="" name="limit_annual" placeholder="USD" disabled>
                </div>
            </div>
        </div>

        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Coberturas</h3>


        <div class="two-sides">
            <div class="left_side">
                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Incendio
                    </label>
                    <input type="checkbox" id="" value="Incendio" name="description_coverage[]">
                </div>
                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Explosión
                    </label>
                    <input type="checkbox" id="" value="Explosión" name="description_coverage[]">
                </div>

            </div>
            <div class="right_side">

                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Daños por humo
                    </label>
                    <input type="checkbox" id="" value="Daños por humo" name="description_coverage[]">
                </div>
                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Daños por agua
                    </label>
                    <input type="checkbox" id="" value="Daños por agua" name="description_coverage[]">
                </div>

            </div>
        </div>



    </div>

    <div class="form_group3">
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Coberturas Adicionales</h3>

        @include('admin.tecnico.slip.slips_generales.tableCoberturasAdicionales')

    </div>

    <div class="form_group4">
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Cláusulas Adicionales</h3>

        @include('admin.tecnico.slip.slips_generales.clausulasAdicionales')

    </div>

    <div class="form_group5">
        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Exclusiones</h3>

        @include('admin.tecnico.slip.slips_generales.exclusiones')

    </div>

    <div class="form_group6">

        <div class="tableContainer" style="1.2rem 0">
            <h4 class="slipTitle">Siniestralidad</h4>
            <div class="flexColumnCenterContainer">
                <div class="input_group" style="width:400px">

                    <input type="text" value="" placeholder="...">
                    <input type="file" name="siniestralidad" placeholder="No. Días">
                </div>
            </div>
        </div>

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
