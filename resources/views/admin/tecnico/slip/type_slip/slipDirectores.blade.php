<form method="POST" action="{{ route('slip.update', $slip->id) }}" enctype="multipart/form-data" id="formSlipDirectores"
    class="new_entry__form" >
    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="director">


    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip Responsabilidad Civil Directores y Administradores</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

    </div>

    <div class="form_group2">

        <div class="two-sides">
            <div class="left_side">

                <label for="">
                    <i class="fa-solid fa-bars-staggered"></i> Objeto del seguro:
                </label>
                <div class="input_group">
                    <textarea name="object_insurance" id="object_insurance" cols="15" rows="1"></textarea>
                </div>

                <label style="margin-top: 2rem" for="">
                    <i class="fa-solid fa-bars-staggered"></i> Coberturas:
                </label>
                <div class="input_group">
                    <textarea name="coverage" id="coverage" style="resize:both;width:100%;" 
 cols="15" rows="1"></textarea>
                </div>

            </div>

            <div class="right_side">
                <h5 class="slipTitle">Límite de indemnización:</h5>

                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Límite único combinado por evento
                    </label>
                    <input type="number" id="" name="limit_event" placeholder="USD">
                </div>

                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Límite agregado anual
                    </label>
                    <input type="number" id="" name="limit_annual" placeholder="USD">
                </div>
            </div>

        </div>

        <div class="flexColumnCenterContainer">
            <div class="input_group" style="max-width: 450px">
                <label for="">
                    <i class="fa-solid fa-rectangle-list"></i>
                    Coberturas Adicionales
                </label>
                <textarea type="text" name="description_coverage[]" placeholder="..."></textarea>
            </div>
        </div>

    </div>

    <div class="form_group3">
        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Coberturas Adicionales (sublímites)</h3>

        @include('admin.tecnico.slip.slips_generales.tableCoberturasAdicionales')

    </div>

    <div class="form_group4">
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Cláusulas Adicionales</h3>

        @include('admin.tecnico.slip.slips_generales.clausulasAdicionales')
    </div>

    <div class="form_group5">
        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Exclusiones</h3>

        @include('admin.tecnico.slip.slips_generales.exclusiones')
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


        <div class="tableContainer" style="1.2rem 0">
            <h4 class="slipTitle">Siniestralidad</h4>
            <div class="flexColumnCenterContainer">
                <div class="input_group" style="width:400px">
                    <input type="text" name="siniestralidad" placeholder="...">
                    <input type="file" name="siniestralidad" placeholder="No. Días">
                </div>
            </div>
        </div>

        <div class="tableContainer" style="1.2rem 0">
            <h4 class="slipTitle">Deducciones</h4>
            <div class="flexColumnCenterContainer">
                <div class="input_group" style="width:420px">
                    <input type="number" step="any" name="deductions_percent" placeholder="%" class="inputNumber">
                    <textarea name="deductions_text" placeholder="..." cols="30" rows="1"></textarea>
                </div>
            </div>
        </div>
        
        @include('admin.tecnico.slip.slips_generales.footer1')
    
    </div>
    
    <div class="form_group7">

        
        <div class="tableContainer" style="1.2rem 0">
            <h4 class="slipTitle">Respaldo de Reaseguros</h4>
            <table id="respaldoTable" class="indemnizacionTable">

                <thead>
                    <tr>
                        <th style="text-align: center">Nombre Reasegurador</th>
                        <th style="text-align: center">%</th>
                        <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                            colspan="1" aria-label="Add row">

                            <button type="button" onclick="addRowRespaldo(event)" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody id="respaldoTableBody">
                    <tr>
                        <td>
                            <input type="text" placeholder="..." name="respaldo_reasegurador[]">
                        </td>
                        <td>
                            <input type="number" step="any" name="respaldo_porcentaje[]" placeholder="%" class="inputNumber">
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    
        @include('admin.tecnico.slip.slips_generales.footer2')
    
    </div>

</form>
