<form method="POST" action="{{ route('slip.update', $slip->id) }}"  enctype="multipart/form-data" id="formSlipMontaje"
    class="new_entry__form" >
    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="">

    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> {{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        @include('admin.tecnico.slip.slips_generales.objectInsuranceAndCoverage')


        @if ($slip->type_coverage !== 11 && $slip->type_coverage !== 13 && $slip->type_coverage !== 14 && $slip->type_coverage !== 17)
            <div class="two-sides">
                <div class="left_side">
                    <div class="input_group">
                        <label for="">Límite de indemnización</label>
                        <input value="{{$slip_type->limit_compensation}}" type="number" step="any" class="form-control" name="limit_compensation">
                    </div>
                </div>

                <div class="right_side">
                    @if ($slip->type_coverage !== 15 && $slip->type_coverage !== 16)
                        <div class="input_group">
                            <label for="">Suma asegurable:</label>
                            <input value="{{$slip_type->asegurable_electronico}}" type="number" step="any" placeholder="Suma asegurada" name="asegurable_electronico">
                        </div>
                    
                    @endif
                    <div class="input_group">
                        <label for="">Suma asegurada:</label>
                        <input value="{{$slip_type->asegurada_electronico}}"type="number" step="any" placeholder="Suma asegurable" name="asegurada_electronico">
                    </div>
                </div>  
            </div>
        @endif

        @if ($slip->type_coverage === 13 || $slip->type_coverage === 17)
            <div class="two-sides">
                <div class="left_side">
                    <div class="input_group">
                        <label for="">Límite de indemnización</label>
                        <input value="{{$slip_type->limit_compensation}}" type="number" step="any" class="form-control" name="limit_compensation">
                    </div>
                    <div class="input_group">
                        <label for="">Forma:</label>
                        <select name="nacionality" id="nacionality">
                            <option value="">Seleccionar</option>
                            <option value="Inglesa">Inglesa</option>
                            <option value="Americana">Americana</option>
                        </select>
                    </div>
                </div>
                
                <div class="right_side">
                    @if($slip_type->asegurada_electronico > 0 && $slip_type->asegurable_electronico > 0)
                        <div class="input_group">
                            <label for="">Suma asegurada:</label>
                            <input value="{{$slip_type->asegurada_electronico}}"type="number" step="any" placeholder="Suma asegurable" name="asegurada_electronico">
                        </div>
                        <div class="input_group">
                            <label for="">Suma asegurable:</label>
                            <input value="{{$slip_type->asegurable_electronico}}" type="number" step="any" placeholder="Suma asegurada" name="asegurable_electronico">
                        </div>
                    @elseif ($slip_type->asegurable_electronico > 0)
                        <div class="input_group">
                            <label for="">Suma asegurable:</label>
                            <input value="{{$slip_type->asegurable_electronico}}" type="number" step="any" placeholder="Suma asegurada" name="asegurable_electronico">
                        </div>
                    @elseif($slip_type->asegurada_electronico > 0)
                        <div class="input_group">
                            <label for="">Suma asegurada:</label>
                            <input value="{{$slip_type->asegurada_electronico}}"type="number" step="any" placeholder="Suma asegurable" name="asegurada_electronico">
                        </div>
                    @endif
                    <div class="input_group">
                        <label for="">Periodo Indemnizacion</label>
                        <input type="text" id="no_month" name="no_month" placeholder="No. Meses">
                    </div>
                </div>
            </div>
        @endif
        
        @if ($slip->type_coverage === 13)
            <div class="tableContainer">
                @if ($slip_type->asegurable_electronico > 0)
                <h4 class="slipTitle mb-2">Tabla suma asegurable</h4>
                @elseif($slip_type->asegurada_electronico > 0)
                <h4 class="slipTitle mb-2">Tabla suma asegurada</h4>
                @endif
        
                <button type="button" onclick="refreshSumaAseguradaPerdida()" class="btn btn-info">
                    Actualizar
                </button>
                <table id="perdidaSumaAseguradaTable" class="indemnizacionTable marginTop">
                    <thead>
                        <tr>
                            <th style="text-align: center">#</th>
                            <th style="text-align: center">Ubicación</th>
                            <th style="text-align: center">Maquinaria</th>
                            <th style="text-align: center">TOTAL</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowSumaPerdida(event, 'perdida')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}

                    <tbody id="perdidaSumaAseguradaTableBody">
                        @if (count($sum_assured) > 0)
                            @foreach ($sum_assured as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td style="text-align: center">
                                    <input type="text" value="{{$item->location}}" name="location[]" class="inputLocation" style="width: 95px" placeholder="..." novalidate>
                                </td>
                                <td style="text-align: center">
                                    <input value="{{$item->machine}}" class="col1 row{{$key+1}}" onkeyup="incendioSumaAsegurableTotales({{$key+1}}, 1, 'perdida')" type="number" step="any" name="machine[]" value="0" novalidate style="width: 95px" >
                                </td>
                                <td style="text-align: center">
                                    <span class="slipTitle col12" id="rowTotal{{$key+1}}">0</span>$
                                </td>
                                <td></td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>1</td>
                                <td style="text-align: center">
                                    <input type="text" name="location[]" class="inputLocation" style="width: 95px" placeholder="..." novalidate>
                                </td>
                                <td style="text-align: center">
                                    <input class="col1 row1" onkeyup="incendioSumaAsegurableTotales(1, 1, 'perdida')" type="number" step="any" name="machine[]" value="0" novalidate style="width: 95px" >
                                </td>
                                <td style="text-align: center">
                                    <span class="slipTitle col12" id="rowTotal1">0</span>$
                                </td>
                                <td></td>
                            </tr>
                        @endif


                    </tbody>

                    <tfoot>

                        <tr>
                            <td style="text-align: center">
                            </td>
                            <td style="text-align: center">
                                <h5 class="slipTitle">Total</h5>
                            </td>
                            <td style="text-align: center">
                                <span id="colTotal1" class="slipTitle">0</span>$
                            </td>
                            <td style="text-align: center">
                                <span class="slipTitle " id="incendioTotalTotal">0</span>$
                            </td>
                        </tr>

                    </tfoot>

                </table>
            </div>
        @endif


        @if ($slip->type_coverage === 14)
            @include('admin.tecnico.slip.slips_generales.limiteIndem')

            <div class="tableContainer" style="margin: 2rem 0">
                <h3>Objeto(s) del seguro</h3>
                <table id="maquinariaObjectInsurance" class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Tipo</th>
                            <th style="text-align: center">Marca</th>
                            <th style="text-align: center">Modelo</th>
                            <th style="text-align: center">Año</th>
                            <th style="text-align: center">Serie</th>
                            <th style="text-align: center">Suma Asegurada</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addObjectInsuranceMaquinaria(event)" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="maquinariaObjectInsuranceBody">

                        <tr>
                            <td>1</td>
                            <td>
                                <input type="text" name="type[]" placeholder="..." class="inputNumber">
                            </td>

                            <td>
                                <input type="text" name="brand[]" placeholder="..." class="inputNumber">
                            </td>
                            <td>
                                <input type="text" name="object_model[]" placeholder="..." class="inputNumber">
                            </td>

                            <td>
                                <input type="number" class="inputNumber" name="year[]" placeholder="">
                            </td>
                            <td>
                                <input type="text" placeholder="..." name="serie[]" class="inputNumber">
                            </td>
                            <td>
                                <input type="number" step="any" placeholder="..." name="object_insured_val[]" class="row1">
                            </td>
                            <td></td>
                        </tr>

                    </tbody>

                </table>
            </div>
        @endif
        
        @if ($slip->type_coverage === 15 || $slip->type_coverage === 16)
            <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Suma Asegurada</h3>

            <div class="tableContainer">
                <table class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center">Cobertura</th>
                            <th style="text-align: center">USD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center">Cobertura A: Daño Material</td>
                            <td>
                                <input type="number" class="inputNumber" id="coberturaSumaAsegurada1" value="0" name="" onkeyup="sumaAseguradaV2()">
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center">Cobertura B: Terremoto, Temblor, Tsunami y Erupción Volcánica</td>
                            <td>
                                <input type="number" class="inputNumber" id="coberturaSumaAsegurada2" value="0" name="" onkeyup="sumaAseguradaV2()">
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center">Cobertura C: Ciclón, Huracán, Tormenta, Ventarrón e Inundación</td>
                            <td>
                                <input type="number" class="inputNumber" id="coberturaSumaAsegurada3" value="0" name="" onkeyup="sumaAseguradaV2()">
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center">Cobertura D: Mantenimiento</td>
                            <td>
                                <input type="number" class="inputNumber" id="coberturaSumaAsegurada4" value="0" name="" onkeyup="sumaAseguradaV2()">
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center">Cobertura E y F: Responsabilidad Civil </td>
                            <td>    
                                <input type="number" class="inputNumber" id="coberturaSumaAsegurada5" value="0" name="" onkeyup="sumaAseguradaV2()">
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center">Cobertura G: Remosión de Escombros </td>
                            <td>
                                <input type="number" class="inputNumber" id="coberturaSumaAsegurada6" value="0" name="" onkeyup="sumaAseguradaV2()">
                            </td>
                        </tr>
                    </tbody>
                    
                    <tfoot>
                        <tr>
                            <td>
                                <h5 class="slipTitle" style="text-align: center">Total: </h5>
                            </td>
                            <td style="text-align: center">
                                <span id="coberturaSumaTotal" class="slipTitle" >0</span>$
                            </td>
                    </tfoot>
                </table>
            </div>
        @endif

    </div>

    <div class="form_group2">
        
        @if ($slip->type_coverage === 11)
            <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Suma Asegurada y Suma Asegurable</h3>
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



        {{-- Coberturas adicionales --}}
        @if($slip->type_coverage === 15 ||$slip->type_coverage === 16)
            <h3 class="slipTitle"> <span class="badge badge-secondary"></span> Coberturas</h3>
        @else
            <h3 class="slipTitle"> <span class="badge badge-secondary"></span> Coberturas Adicionales</h3>
        @endif

        @include('admin.comercial.include.edit_tablaCoberturas')
                

        @if ($slip->type_coverage === 15 ||$slip->type_coverage === 16)
            <h3 class="slipTitle"> <span class="badge badge-secondary"></span> Coberturas Adicionales</h3>
            
            <div class="tableContainer">
                <table id="endososTable" class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center">Endoso (Número: nombre)</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                                colspan="1" aria-label="Add row">

                                <button onclick="addEndosoAdicional(event)" class="btn btn-success btn-xs">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}

                    <tbody id="endososTableBody">
                        <td>
                            <select name="" id="">
                                <option value="Seleccionar">Seleccionar</option>
                                @include('admin.tecnico.slip.slips_generales.optionEndosos')
                            </select>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                        <input type="text" placeholder="..."
                                name="">
                        </td>
                        <td>
            
                        </td>
                    </tbody>

                </table>
            </div>
        @endif
    </div>

    <div class="form_group3">
        {{-- Cláusulas Adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary"></span> Cláusulas Adicionales</h3>

        @include('admin.comercial.include.edit_tablaClausulas')


        @if ($slip->type_coverage === 12)
            @include('admin.tecnico.slip.slips_generales.tableRoturaMaquinaria')
        @endif

        @if ($slip->type_coverage === 14 || $slip->type_coverage === 11)
            <h3 class="slipTitle"> <span class="badge badge-secondary"></span> Tabla De Depreciación Para Pérdidas
            totales</h3>
            @include('admin.tecnico.slip.slips_generales.tableEquipoElectronico')

        @endif

    </div>

    <div class="form_group4">
        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary"></span> Exclusiones</h3>

        @include('admin.tecnico.slip.slips_generales.exclusiones')

    </div>

    <div class="form_group5">
        <h3 class="slipTitle"> <span class="badge badge-secondary"></span> Deducibles</h3>

        @include('admin.tecnico.slip.slips_generales.deducibles')
        
    </div>

    <div class="form_group6">

        @include('admin.tecnico.slip.slips_generales.footer1')
    
    </div>
    
    <div class="form_group7">
    
        @include('admin.tecnico.slip.slips_generales.footer2')
    
    </div>
</form>
