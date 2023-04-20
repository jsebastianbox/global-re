<form method="POST" action="{{ route('slip.update', $slip->id) }}"  enctype="multipart/form-data" id="formSlipMontaje"
    class="new_entry__form" >
    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="">

    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> {{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        @include('admin.tecnico.slip.slips_generales.objectInsuranceAndCoverage')


        <div class="tableContainer">

            {{-- <table class="indemnizacionTable bigTable" style="margin: 2rem 0">
                <thead>
                    <tr>
                        <th style="text-align: center">#</th>
                        <th style="text-align: center">Equipo</th>
                        <th style="text-align: center">Marca</th>
                        <th style="text-align: center">Modelo</th>
                        <th style="text-align: center">Año</th>
                        <th style="text-align: center">Serie</th>
                        <th style="text-align: center">Suma Asegurada (USD)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center">
                            1
                        </td>
                        <td style="text-align: center">
                            <input type="text" name="description2_deductible[]" placeholder="...">
                        </td>
                        <td style="text-align: center">
                            <input type="text" name="description2_deductible[]" placeholder="...">
                        </td>
                        <td style="text-align: center">
                            <input type="text" name="description2_deductible[]" placeholder="...">
                        </td>
                        <td style="text-align: center">
                            <input type="text" name="description2_deductible[]" placeholder="...">
                        </td>
                        <td style="text-align: center">
                            <input type="text" name="description2_deductible[]" placeholder="...">
                        </td>

                        <td style="text-align: center">
                            <input  id="objetoSeguroSuma1" onkeyup="objetoSeguroSuma(event)" type="number" value="0">
                        </td>
                      
                    </tr>
                    <tr>
                        <td style="text-align: center">
                            2
                        </td>
                        <td style="text-align: center">
                            <input type="text" name="description2_deductible[]" placeholder="...">
                        </td>
                        <td style="text-align: center">
                            <input type="text" name="description2_deductible[]" placeholder="...">
                        </td>
                        <td style="text-align: center">
                            <input type="text" name="description2_deductible[]" placeholder="...">
                        </td>
                        <td style="text-align: center">
                            <input type="text" name="description2_deductible[]" placeholder="...">
                        </td>
                        <td style="text-align: center">
                            <input type="text" name="description2_deductible[]" placeholder="...">
                        </td>

                        <td style="text-align: center">
                            <input id="objetoSeguroSuma2" onkeyup="objetoSeguroSuma(event)" type="number" value="0">
                        </td>
                      
                    </tr>
                    <tr>
                        <td style="text-align: center">
                            3
                        </td>
                        <td style="text-align: center">
                            <input type="text" name="description2_deductible[]" placeholder="...">
                        </td>
                        <td style="text-align: center">
                            <input type="text" name="description2_deductible[]" placeholder="...">
                        </td>
                        <td style="text-align: center">
                            <input type="text" name="description2_deductible[]" placeholder="...">
                        </td>
                        <td style="text-align: center">
                            <input type="text" name="description2_deductible[]" placeholder="...">
                        </td>
                        <td style="text-align: center">
                            <input type="text" name="description2_deductible[]" placeholder="...">
                        </td>

                        <td style="text-align: center">
                            <input id="objetoSeguroSuma3" onkeyup="objetoSeguroSuma(event)" type="number" value="0">
                        </td>
                      
                    </tr>
                </tbody>
                
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <h5 class="slipTitle" style="text-align: center">Total: </h5>
                        </td>
                        <td style="text-align: center">
                            <span id="objetoSeguroSumaTotal" class="slipTitle" >0</span>$
                        </td>
                </tfoot>
            </table> --}}
        </div>

    </div>

    <div class="form_group2">
        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Suma Asegurada y Suma Asegurable</h3>

        @if ($slip->type_coverage === 11)
            <div class="two-sides">
                <div class="left_side">
                    <div class="input_group">
                        <label >
                            <i class="fa-solid fa-bars-staggered"></i>
                            Suma asegurada:
                        </label>
                        <input value="{{$slip_type->asegurable_electronico}}" type="number" name="asegurable_electronico">
                    </div>
                </div>
                <div class="rigth_side">
                    <div class="input_group">
                        <label >
                            <i class="fa-solid fa-bars-staggered"></i>
                            Suma asegurable:
                        </label>
                        <input value="{{$slip_type->asegurada_electronico}}" type="number" name="asegurada_electronico">
                    </div>
                </div>
            </div>
            <div class="tableContainer">

                <table class="indemnizacionTable" style="margin: 2rem 0">
                    <thead>
                        <tr>
                            <th style="text-align: center">Sección</th>
                            <th style="text-align: center">USD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sección I: Todo riesgo</td>
                            <td>
                                <input value="{{$slip_type->todo_riesgo}}" type="number" name="todo_riesgo" data-money id="" step="any">
                            </td>
                        </tr>
                        <tr>
                            <td>Sección II: Portadores Externos de Datos</td>
                            <td>
                                <input value="{{$slip_type->portadores_externos}}" type="number" name="portadores_externos" data-money
                                    id="" step="any">
                            </td>
                        </tr>
                        <tr>
                            <td>Sección III: Incremento en los costos de operación</td>
                            <td>
                                <input value="{{$slip_type->incremento_costos}}" type="number" name="incremento_costos" data-money
                                    id="" step="any">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                a. Límite máximo Diario
                            </td>
                            <td>
                                <input value="{{$slip_type->limite_diario}}" type="number" name="limite_diario" placeholder="(en USD)" step="any">
                            </td>
                        </tr>
                        <tr>
                            <td>b. Periodo de Cobertura</td>
                            <td>
                                <input value="{{$slip_type->periodo_cobertura}}" type="number" name="periodo_cobertura" id=""
                                    placeholder="No. Días" step="any">
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>(=)Total Asegurado</td>
                            <td>
                                <input value="{{$slip_type->total_cuadro1}}" type="number" name="total_cuadro1" id="" step="any">
                            </td>
                        </tr>
                    </tfoot>
                </table>

                <h3 class="slipTitle">Límite de Indemnización</h3>

                <div class="input_group" style="max-width: 400px;margin-top:10px">
                    <label>
                        <i class="fa-solid fa-bars-staggered"></i>
                        Límite de indemnización
                    </label>
                    <input type="text" name="limit_compensation"  placeholder="..."value="{{$slip_type->limit_compensation}}">
                </div>

                <table class="indemnizacionTable" style="margin: 2rem 0">
                    <thead>
                        <tr>
                            <th style="text-align: center">Sección</th>
                            <th style="text-align: center">USD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sección I: Todo riesgo</td>
                            <td>
                                <input value="{{$slip_type->todo_riesgo2}}" type="number" name="todo_riesgo2" data-money id="" step="any">
                            </td>
                        </tr>
                        <tr>
                            <td>Sección II: Portadores Externos de Datos</td>
                            <td>
                                <input value="{{$slip_type->portadores_externos2}}" type="number" name="portadores_externos2" data-money
                                    id="" step="any">
                            </td>
                        </tr>
                        <tr>
                            <td>Sección III: Incremento en los costos de operación</td>
                            <td>
                                <input value="{{$slip_type->incremento_costos2}}" type="number" name="incremento_costos2" data-money
                                    id="" step="any">
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td scope="col">(=)Total Asegurado</td>
                            <td>
                                <input value="{{$slip_type->total_cuadro2}}" type="number" name="total_cuadro2" id="" step="any">
                            </td>
                        </tr>
                    </tfoot>
                </table>

            </div>
        @endif
    </div>

    <div class="form_group3">
        {{-- Coberturas adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Coberturas Adicionales</h3>

        @include('admin.comercial.include.edit_tablaCoberturas')
        
    </div>

    <div class="form_group4">
        {{-- Cláusulas Adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Cláusulas Adicionales</h3>
        
        @include('admin.comercial.include.edit_tablaClausulas')

        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Exclusiones</h3>

        @include('admin.tecnico.slip.slips_generales.exclusiones')

    </div>

    <div class="form_group5">
        <h3 class="slipTitle"> <span class="badge badge-secondary">6</span> Deducibles</h3>

        @include('admin.tecnico.slip.slips_generales.deducibles')
        
    </div>

    <div class="form_group6">

        @include('admin.tecnico.slip.slips_generales.footer1')
    
    </div>
    
    <div class="form_group7">
    
        @include('admin.tecnico.slip.slips_generales.footer2')
    
    </div>
</form>
