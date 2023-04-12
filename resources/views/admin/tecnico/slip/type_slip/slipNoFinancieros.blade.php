<form method="POST" action="{{ route('slip.update', $slip->id) }}"  enctype="multipart/form-data" id="formSlipNoFinancieros"
    class="new_entry__form" >

    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="no_finance">


    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip Riesgos Financieros Para Entidades No Financieros</h3>

        @include('admin.tecnico.slip.slips_generales.initial')


        <div class="flexColumnCenterContainer">
            {{-- Giro del negocio: --}}
            {{-- <div class="input_group" style="max-width: 400px">
                <label for="">
                    <i class="fa-solid fa-bars-staggered"></i>
                    Giro del negocio
                </label>
                <input type="text" id="" name="" placeholder="...">
            </div> --}}
            {{-- Objeto del seguro --}}
            <div class="input_group" style="max-width: 400px">
                <label for="noFinancierosObjetoSeguro">
                    <i class="fa-solid fa-bars-staggered"></i>
                    Objeto del seguro
                </label>
                <input type="text" id="noFinancierosObjetoSeguro" name="object_insurance">
            </div>
        </div>
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
                    <input type="text" id="" name="description_compensation_limit[]" placeholder="...">
                </div>
                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Seccion II: Crimen por computador
                    </label>
                    <input type="text" id="" name="description_compensation_limit2[]" placeholder="...">
                </div>
                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Seccion III: Directores y administradores
                    </label>
                    <input type="text" id="" name="description_compensation_limit3[]" placeholder="...">
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
        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Coberturas Adicionales (Sublímites)</h3>

        <div class="tableContainer">
            <table id="erroresOmisionesCoberturasAdicionalesTable" class="indemnizacionTable">
                <thead>
                    <tr>
                        <th style="text-align: center; width: 42px;">#</th>
                        <th style="text-align: center">Cobertura</th>
                        <th style="text-align: center">USD</th>
                        <th style="text-align: center">Campo adicional</th>
                        <th style="text-align: center">USD</th>
                        <th style="text-align: center">Campo adicional</th>
                        <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                            colspan="1" aria-label="Add row">

                            <button onclick="addRowErroresOmisionesCobertura(event)" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                        </th>
                    </tr>
                </thead>
                {{-- tbody --}}
                <tbody id="erroresOmisionesCoberturasAdicionalesTableBody">

                    <tr>
                        <td>1</td>
                        <td>
                            <input type="text" id="erroresOmisionesCobertura1"
                                name="description_coverage_additional[]" placeholder="...">
                        </td>
                        <td>
                            <input type="text" placeholder="..." id="erroresOmisionesCobertura1a"
                                name="coverage_additional_usd[]">
                        </td>
                        <td style="text-align: center">
                            por evento
                        </td>
                        <td>
                            <input type="text" placeholder="..." id="extracoCobertura1b"
                                name="coverage_additional_additional[]">
                        </td>
                        <td style="text-align: center">
                            agregado anual
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>
                            <input type="text" id="erroresOmisionesCobertura1"
                                name="description_coverage_additional[]" placeholder="...">
                        </td>
                        <td>
                            <input type="text" placeholder="..." id="erroresOmisionesCobertura1a"
                                name="coverage_additional_usd[]">
                        </td>
                        <td style="text-align: center">
                            por evento
                        </td>
                        <td>
                            <input type="text" placeholder="..." id="extracoCobertura1b"
                                name="coverage_additional_additional[]">
                        </td>
                        <td style="text-align: center">
                            agregado anual
                        </td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>
                            <input type="text" id="erroresOmisionesCobertura1"
                                name="description_coverage_additional[]" placeholder="...">
                        </td>
                        <td>
                            <input type="text" placeholder="..." id="erroresOmisionesCobertura1a"
                                name="coverage_additional_usd[]">
                        </td>
                        <td style="text-align: center">
                            por evento
                        </td>
                        <td>
                            <input type="text" placeholder="..." id="extracoCobertura1b"
                                name="coverage_additional_additional[]">
                        </td>
                        <td style="text-align: center">
                            agregado anual
                        </td>
                    </tr>

                </tbody>

            </table>
        </div>
    </div>

    <div class="form_group4">
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Cláusulas Adicionales</h3>

        @include('admin.tecnico.slip.slips_generales.clausulasAdicionales')

        <div class="flexColumnCenterContainer">
            <div class="input_group" style="max-width: 400px">
                <label for="">
                    <i class="fa fa-search"></i>
                    Condiciones
                </label>
                <input type="text" id="" name="condition" placeholder="...">
            </div>

        </div>
    </div>

    <div class="form_group5">
        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Exclusiones</h3>

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
