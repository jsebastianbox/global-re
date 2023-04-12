<form method="POST" action="{{ route('slip.update', $slip->id) }}"  enctype="multipart/form-data" id="formSlipPetrolero"
    class="new_entry__form" >
    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="petrolero">


    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span>{{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        <div class="flexColumnCenterContainer">
            <div class="input_group"  style="max-width:550px">
                <label for="petroleroCobertura">
                    <i class="fa-solid fa-bars-staggered"></i>
                    Cobertura
                </label>
                <textarea name="coverage" id="coverage" style="resize:both;width:100%;" 
 cols="30" rows="1"></textarea>
            </div>

            <div class="input_group" style="max-width:550px">
                <label for="petroleroObjetoSeguro">
                    <i class="fa-solid fa-bars-staggered"></i>
                    Objeto del seguro
                </label>
                <textarea name="object_insurance" id="object_insurance" cols="30" rows="1"></textarea>
            </div>
        </div>


    </div>

    <div class="form_group2">

        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Tabla Suma Asegurada</h3>

        <div class="tableContainer">
            <div class="tableContainer" style="margin:2rem 0">
                <table class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center">#</th>
                            <th style="text-align: center">Ubicación</th>
                            <th style="text-align: center">Edificación</th>
                            <th style="text-align: center">Contenidos</th>
                            <th style="text-align: center">Maquinaria y Equipos</th>
                            <th style="text-align: center">Muebles y Enseres</th>
                            <th style="text-align: center">Mercaderías</th>
                            <th style="text-align: center">Otros</th>
                            <th style="text-align: center">TOTAL</th>
                        </tr>
                    </thead>
                    {{-- tbody --}}

                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>
                                <input type="text" id="energiaUbicacion1" name="location[]" style="width: 95px" placeholder="..." novalidate>
                            </td>
                            <td>
                                <input onkeyup="energiaSumaAsegurableTotales()" type="number"
                                    id="energiaEdificacion1" name="edification[]" value="0" novalidate
                                    style="width: 95px">
                            </td>
                            <td>
                                <input onkeyup="energiaSumaAsegurableTotales()" type="number"
                                    id="energiaContenidos1" name="contents[]" value="0" novalidate
                                    style="width: 95px">
                            </td>
                            <td>
                                <input onkeyup="energiaSumaAsegurableTotales()" type="number"
                                    id="energiaMaquinariaEquipos1" name="equipment[]" value="0" novalidate
                                    style="width: 95px">
                            </td>
                            <td>
                                <input onkeyup="energiaSumaAsegurableTotales()" type="number" id="energiaMuebles1"
                                    name="machine[]" value="0" novalidate style="width: 95px">
                            </td>
                            <td>
                                <input onkeyup="energiaSumaAsegurableTotales()" type="number"
                                    id="energiaMercaderias1" name="description2_deductible[]" value="0" novalidate
                                    style="width: 95px">
                            </td>
                            <td>
                                <input onkeyup="energiaSumaAsegurableTotales()" type="number" id="energiaOtros1"
                                    name="description2_deductible[]" value="0" novalidate style="width: 95px">
                            </td>
                            <td style="text-align: center">
                                <span id="energiaTotal1" class="slipTitle">0</span>$
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>
                                <input type="text" id="energiaUbicacion2" name="location[]" style="width: 95px" placeholder="..." novalidate>
                            </td>
                            <td>
                                <input onkeyup="energiaSumaAsegurableTotales()" type="number"
                                    id="energiaEdificacion2" name="edification[]" value="0" novalidate
                                    style="width: 95px">
                            </td>
                            <td>
                                <input onkeyup="energiaSumaAsegurableTotales()" type="number"
                                    id="energiaContenidos2" name="contents[]" value="0" novalidate
                                    style="width: 95px">
                            </td>
                            <td>
                                <input onkeyup="energiaSumaAsegurableTotales()" type="number"
                                    id="energiaMaquinariaEquipos2" name="equipment[]" value="0" novalidate
                                    style="width: 95px">
                            </td>
                            <td>
                                <input onkeyup="energiaSumaAsegurableTotales()" type="number" id="energiaMuebles2"
                                    name="machine[]" value="0" novalidate style="width: 95px">
                            </td>
                            <td>
                                <input onkeyup="energiaSumaAsegurableTotales()" type="number"
                                    id="energiaMercaderias2" name="machine[]" value="0" novalidate
                                    style="width: 95px">
                            </td>
                            <td>
                                <input onkeyup="energiaSumaAsegurableTotales()" type="number" id="energiaOtros2"
                                    name="machine[]" value="0" novalidate style="width: 95px">
                            </td>
                            <td style="text-align: center">
                                <span id="energiaTotal2" class="slipTitle">0</span>$
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>
                                <input type="text" id="energiaUbicacion3" name="location[]" style="width: 95px" placeholder="..." novalidate>
                            </td>
                            <td>
                                <input onkeyup="energiaSumaAsegurableTotales()" type="number"
                                    id="energiaEdificacion3" name="edification[]" value="0" novalidate
                                    style="width: 95px">
                            </td>
                            <td>
                                <input onkeyup="energiaSumaAsegurableTotales()" type="number"
                                    id="energiaContenidos3" name="contents[]" value="0" novalidate
                                    style="width: 95px">
                            </td>
                            <td>
                                <input onkeyup="energiaSumaAsegurableTotales()" type="number"
                                    id="energiaMaquinariaEquipos3" name="equipment[]" value="0" novalidate
                                    style="width: 95px">
                            </td>
                            <td>
                                <input onkeyup="energiaSumaAsegurableTotales()" type="number" id="energiaMuebles3"
                                    name="machine[]" value="0" novalidate style="width: 95px">
                            </td>
                            <td>
                                <input onkeyup="energiaSumaAsegurableTotales()" type="number"
                                    id="energiaMercaderias3" name="machine[]" value="0" novalidate
                                    style="width: 95px">
                            </td>
                            <td>
                                <input onkeyup="energiaSumaAsegurableTotales()" type="number" id="energiaOtros3"
                                    name="machine[]" value="0" novalidate style="width: 95px">
                            </td>
                            <td style="text-align: center">
                                <span id="energiaTotal3" class="slipTitle">0</span>$
                            </td>
                        </tr>


                    </tbody>

                    <tfoot>

                        <tr>
                            <td style="text-align: center">
                            </td>
                            <td style="text-align: center">
                                <h5 class="slipTitle">Total</h5>
                            </td>
                            <td style="text-align: center">
                                <span id="energiaEdificacionTotal" class="slipTitle">0</span>$
                            </td>
                            <td style="text-align: center">
                                <span id="energiaContenidosTotal" class="slipTitle">0</span>$
                            </td>
                            <td style="text-align: center">
                                <span id="energiaMaquinariaEquiposTotal" class="slipTitle">0</span>$
                            </td>
                            <td style="text-align: center">
                                <span id="energiaMueblesTotal" class="slipTitle">0</span>$
                            </td>
                            <td style="text-align: center">
                                <span id="energiaMercaderiasTotal" class="slipTitle">0</span>$
                            </td>
                            <td style="text-align: center">
                                <span id="energiaOtrosTotal" class="slipTitle">0</span>$
                            </td>
                            <td style="text-align: center">
                                <span id="energiaTotalTotal" class="slipTitle">0</span>$
                            </td>
                        </tr>

                    </tfoot>

                </table>
            </div>

            <div class="input_group" style="max-width: 400px; margin-top:2.2rem">
                <label for="petroleroLimiteIndem">
                    <i class="fa-solid fa-bars-staggered"></i>
                    Límite de indemnización
                </label>
                <input type="number" placeholder="Numéricos.." id="petroleroLimiteIndem" disabled name="limit_compensation">
            </div>
        </div>

    </div>

    <div class="form_group3">
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Coberturas Adicionales</h3>

        <div class="tableContainer">
            <table id="coberturasAdicionalesTable" class="indemnizacionTable">
                <thead>
                    <tr>
                        <th style="text-align: center; width: 42px;">#</th>
                        <th style="text-align: center">Cobertura</th>
                        <th style="text-align: center">Campo adicional</th>
                        <th style="text-align: center">USD</th>
                        <th style="text-align: center">Campo adicional</th>
                        <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                            colspan="1" aria-label="Add row">

                            <button onclick="addRowCoberturaV2(event)" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                        </th>
                    </tr>
                </thead>
                {{-- tbody --}}
                <tbody id="coberturasAdicionalesTableBody">

                    <tr>
                        <td>1</td>
                        <td>
                            <textarea name="description_coverage_additional[]">Bienes bajo cuidado, custodia y control hasta</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                            name="coverage_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="coverage_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="coverage_additional_additional[]">
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <textarea name="description_coverage_additional[]">Rotura de tanques y derrame de contenido</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                            name="coverage_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="coverage_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="coverage_additional_additional[]">
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <textarea name="description_coverage_additional[]">Honorarios de Ingenieros, Arquitectos</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                            name="coverage_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="coverage_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="coverage_additional_additional[]">
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                        <textarea name="description_coverage_additional[]">Remoción de escombros (desarme, demolición, obras provisionales como consecuencia de un
                            siniestro amparado por la presente póliza) </textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                            name="coverage_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="coverage_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="coverage_additional_additional[]">
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>
                            <textarea name="description_coverage_additional[]">Gastos para reducir perdidas y daños </textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                            name="coverage_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="coverage_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="coverage_additional_additional[]">
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>
                            <textarea name="description_coverage_additional[]">Traslado temporal, bienes propios únicamente (excluye daños durante el trasporte, carga,
                                descarga y hurto) </textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                            name="coverage_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="coverage_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="coverage_additional_additional[]">
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>
                            <textarea name="description_coverage_additional[]">Gastos para acelerar reparaciones (expediting expenses)</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                            name="coverage_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="coverage_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="coverage_additional_additional[]">
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>
                            <textarea name="description_coverage_additional[]">Honorarios, gastos de viaje y estadía</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                            name="coverage_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="coverage_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="coverage_additional_additional[]">
                        </td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>
                            <textarea name="description_coverage_additional[]">Vidrios y cristales</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                            name="coverage_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="coverage_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="coverage_additional_additional[]">
                        </td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>
                            <textarea name="description_coverage_additional[]">Honorarios de auditores, revisores y contadores</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                            name="coverage_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="coverage_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="coverage_additional_additional[]">
                        </td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>
                            <textarea name="description_coverage_additional[]">Alteraciones y reparaciones </textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                            name="coverage_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="coverage_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="coverage_additional_additional[]">
                        </td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>
                            <textarea name="description_coverage_additional[]">Intereses de contratista</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                            name="coverage_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="coverage_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="coverage_additional_additional[]">
                        </td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>
                            <textarea name="description_coverage_additional[]">Gastos adicionales (flete aéreo, horas extras, días feriados, trabajos nocturnos
                                aplicable a
                                cualquier cobertura de la póliza) </textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                            name="coverage_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="coverage_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="coverage_additional_additional[]">
                        </td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>
                            <textarea name="description_coverage_additional[]">Documentos y modelos</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                            name="coverage_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="coverage_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="coverage_additional_additional[]">
                        </td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>
                            <textarea name="description_coverage_additional[]">Extintores</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                            name="coverage_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="coverage_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="coverage_additional_additional[]">
                        </td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td>
                            <textarea name="description_coverage_additional[]">Refrigeración</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                            name="coverage_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="coverage_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="coverage_additional_additional[]">
                        </td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <td>
                            <textarea name="description_coverage_additional[]">Arrendamientos</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                            name="coverage_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="coverage_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="coverage_additional_additional[]">
                        </td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <td>
                            <textarea name="description_coverage_additional[]">Gastos extraordinarios </textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                            name="coverage_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="coverage_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="coverage_additional_additional[]">
                        </td>
                    </tr>

                </tbody>

            </table>
        </div>


        {{-- Cláusulas Adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Cláusulas Adicionales</h3>

        <div class="tableContainer" style="margin: 2rem 0">
            <table id="clausulasAdicionalesTable" class="indemnizacionTable">
                <thead>
                    <tr>
                        <th style="text-align: center; width: 42px;">#</th>
                        <th style="text-align: center">Cláusulas</th>
                        <th style="text-align: center">Campo adicional</th>
                        <th style="text-align: center">USD</th>
                        <th style="text-align: center">Campo adicional</th>
                        <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                            colspan="1" aria-label="Add row">

                            <button type="button" onclick="addRowClausula(event)" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                        </th>
                    </tr>
                </thead>
                {{-- tbody --}}
                <tbody id="clausulasAdicionalesTableBody">

                    <tr>
                        <td>1</td>
                        <td>
                            <textarea name="description_clause_additional[]">Cláusula eléctrica</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>

                            <textarea name="description_clause_additional[]">Libre circulación</textarea>
                        </td>

                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <textarea name="description_clause_additional[]">Reparaciones inmediatas</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <textarea name="description_clause_additional[]">Alteraciones y reparaciones</textarea>
                        </td>
                            <td>
                                <input type="text" placeholder="..." name="clause_additional_additional[]">
                            </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>
                            <textarea name="description_clause_additional[]">Materiales importados</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>
                            <textarea name="description_clause_additional[]">Pérdida total constructiva </textarea>
                        </td>
                            <td>
                                <input type="text" placeholder="..." name="clause_additional_additional[]">
                            </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>
                            <textarea name="description_clause_additional[]">Cláusula de inspección</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>
                            <textarea name="description_clause_additional[]">Reservas en el manejo de la información</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>
                            <textarea name="description_clause_additional[]">Salvamento</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>
                            <textarea name="description_clause_additional[]">Errores u omisiones no intencionales para descripción</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>
                            <textarea name="description_clause_additional[]">No cancelación individual</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>
                            <textarea name="description_clause_additional[]">Daños a instalaciones por tentativa de robo</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>
                            <textarea name="description_clause_additional[]">Bienes a la intemperie </textarea>
                        </td>
                            <td>
                                <input type="text" placeholder="..." name="clause_additional_additional[]">
                            </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>
                            <textarea name="description_clause_additional[]">Adhesión</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>
                            <textarea name="description_clause_additional[]">Ajustadores, liquidadores y peritos de común acuerdo</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td>
                            <textarea name="description_clause_additional[]">Arbitraje</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <td>
                            <textarea name="description_clause_additional[]">Designación de bienes</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <td>
                            <textarea name="description_clause_additional[]">Destrucción preventiva</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td>
                            <textarea name="description_clause_additional[]">Reposición o reemplazo</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td>
                            <textarea name="description_clause_additional[]">Aplicación de depreciación en pérdidas parciales</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>21</td>
                        <td>
                            <textarea name="description_clause_additional[]">Sellos y marcas</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>22</td>
                        <td>
                            <textarea name="description_clause_additional[]">Alteración civil</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>23</td>
                        <td>
                            <textarea name="description_clause_additional[]">Subrogación</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>24</td>
                        <td>
                            <textarea name="description_clause_additional[]">Restitución de suma asegurada con cobro de prima adicional</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>25</td>
                        <td>
                            <textarea name="description_clause_additional[]">Tolerancia del 10%</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>
                    <tr>
                        <td>26</td>
                        <td>
                            <textarea name="description_clause_additional[]">Claúsula de 72 horas</textarea>
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional[]">
                        </td>
                        <td>
                            <input type="number" placeholder="0" name="clause_additional_usd[]">
                        </td>
                        <td>
                            <input type="text" placeholder="..." name="clause_additional_additional2[]">
                        </td>
                    </tr>

                </tbody>

            </table>
        </div>

    </div>

    <div class="form_group4">
        <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Tabla de depreciación para pérdidas
            totales</h3>

        <div class="flexRowWrapContainer">
            <div>
                <h5 class="slipTitle"> Rotura de maquinaria:</h5>
                <table class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center">Años</th>
                            <th style="text-align: center">Demetito (anual)</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><input type="text" name="" id=""> años</td>
                            <td>
                                <input type="number" name="equipoMaquinaria1" placeholder="%">
                            </td>
                        </tr>

                        <tr>
                            <td><input type="text" name="" id="">años</td>
                            <td>
                                <input type="number" name="equipoMaquinaria1" placeholder="%">
                            </td>
                        </tr>

                        <tr>
                            <td><input type="text" name="" id="">años</td>
                            <td>
                                <input type="number" name="equipoMaquinaria1" placeholder="max. 75%">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div>
                <h5 class="slipTitle">- Equipo electrónico:</h5>
                <table class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th></th>
                            <th style="text-align: center">Años</th>
                            <th style="text-align: center">Demetito (deprecación anual)</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Equipos hasta</td>
                            <td>
                                <input type="number" id="petroleroEquipoElectronico1a" name="EquipoElectronico1a"
                                    class="inputNumber">
                            </td>
                            <td style="text-align: center">
                                <input type="number" id="petroleroEquipoElectronico1b" name="EquipoElectronico1b"
                                    min="0"    placeholder="%">
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: center">Equipos hasta</td>
                            <td style="text-align: center">
                                <input type="number" id="petroleroEquipoElectronico2a" name="EquipoElectronico2a"
                                    class="inputNumber">
                            </td>
                            <td style="text-align: center">
                                <input type="number" id="petroleroEquipoElectronico2b" name="EquipoElectronico2b"
                                    min="0"    placeholder="%">
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: center">Equipos hasta</td>
                            <td style="text-align: center">
                                <input type="number" id="petroleroEquipoElectronico3a" name="EquipoElectronico3a"
                                    class="inputNumber">
                            </td>
                            <td style="text-align: center">
                                <input type="number" id="petroleroEquipoElectronico3b" name="EquipoElectronico3b"
                                    min="0"    placeholder="%">
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: center">Equipos más de</td>
                            <td style="text-align: center">
                                <input type="number" id="petroleroEquipoElectronico4a" name="EquipoElectronico4a"
                                    class="inputNumber">
                            </td>
                            <td style="text-align: center">
                                <input type="number" id="petroleroEquipoElectronico4b" name="EquipoElectronico4b"
                                    min="0"    placeholder="%">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">6</span> Exclusiones</h3>

        @include('admin.tecnico.slip.slips_generales.exclusiones')
        
    </div>

    <div class="form_group5">
        {{-- DEDUCIBLE --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">7</span> Deducibles</h3>

        @include('admin.tecnico.slip.slips_generales.deducibles')

    </div>

    <div class="form_group6">

        @include('admin.tecnico.slip.slips_generales.footer1')
    
    </div>
    
    <div class="form_group7">
    
        @include('admin.tecnico.slip.slips_generales.footer2')
    
    </div>

</form>
