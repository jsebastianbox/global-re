<form method="POST" action="{{ route('slip.update', $slip->id) }}"  enctype="multipart/form-data" id="formSlipMontaje"
    class="new_entry__form" >
    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="">

    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> {{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        <div class="tableContainer">
            <h4 class="slipTitle">Objeto(s) del seguro</h4>

            <div class="input_group" style="max-width: 400px">
                <label>
                    <i class="fa-solid fa-bars-staggered"></i>
                    Objeto del seguro
                </label>
                <input type="text" name="object_insurance"  placeholder="...">
            </div>

            <table class="indemnizacionTable bigTable" style="margin: 2rem 0">
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
            </table>
        </div>

    </div>

    <div class="form_group2">
        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Suma Asegurada y Suma Asegurable</h3>

        <div class="tableContainer">
            <div class="input_group" style="max-width: 300px;margin:1rem">
                <label >
                    <i class="fa-solid fa-bars-staggered"></i>
                    Suma asegurable
                </label>
                <input type="number" placeholder="Numéricos.." name="insurable_sum">
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
                        <td style="text-align: center">1. Todo Riesgo </td>
                        <td>
                            <input type="number" id="sumaAsegurada1" value="0" name="" onkeyup="sumaAseguradaV3()">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center">2. Portadores Externos de Datos</td>
                        <td>
                            <input type="number" id="sumaAsegurada2" value="0" name="" onkeyup="sumaAseguradaV3()">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center">
                            3a. Límite Máximo Diario (USD)
                        </td>
    
                        <td>
                            <input type="number" id="sumaAsegurada3a" value="0" name="" onkeyup="sumaAseguradaV3()">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center">
                            3b. Periodo de Cobertura (No. Días)
                        </td>
                        <td>
                            <input type="number" id="sumaAsegurada3b" value="0" name="" onkeyup="sumaAseguradaV3()">
                        </td>
                    </tr>
    
                </tbody>
                
                <tfoot>
                    <tr>
                        <td>
                            <h5 class="slipTitle" style="text-align: center">Total: </h5>
                        </td>
                        <td style="text-align: center">
                            <span id="sumaAseguradaTotal" class="slipTitle" >0</span>$
                        </td>
                </tfoot>
            </table>

            <h3 class="slipTitle">Límite de Indemnización</h3>

            <div class="input_group" style="max-width: 400px;margin-top:10px">
                <label>
                    <i class="fa-solid fa-bars-staggered"></i>
                    Límite de indemnización
                </label>
                <input type="text" name="limit_compensation"  placeholder="...">
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
                        <td style="text-align: center">1. Todo Riesgo </td>
                        <td>
                            <input type="number" id="limiteIndem1" value="0" name="" onkeyup="limiteIndemTableSuma()">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center">2. Portadores Externos de Datos</td>
                        <td>
                            <input type="number" id="limiteIndem2" value="0" name="" onkeyup="limiteIndemTableSuma()">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center">
                            3. Incremento en los costos de operación
                        </td>
    
                        <td>
                            <input type="number" id="limiteIndem3" value="0" name="" onkeyup="limiteIndemTableSuma()">
                        </td>
                    </tr>
    
                </tbody>
                
                <tfoot>
                    <tr>
                        <td>
                            <h5 class="slipTitle" style="text-align: center">Total: </h5>
                        </td>
                        <td style="text-align: center">
                            <span id="limiteIndemTotal" class="slipTitle" >0</span>$
                        </td>
                </tfoot>
            </table>

        </div>
    </div>

    <div class="form_group3">
        {{-- Coberturas adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Coberturas Adicionales</h3>

        @include('admin.tecnico.slip.slips_generales.tableCoberturasAdicionales')
    </div>

    <div class="form_group4">
        {{-- Cláusulas Adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Cláusulas Adicionales</h3>
        
        @include('admin.tecnico.slip.slips_generales.clausulasAdicionales')

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
