<form method="POST" action="{{ route('slip.update',$slip->id) }}" enctype="multipart/form-data" id="formSlipConstruccion"
    class="new_entry__form" >
    @method('PUT');


    @csrf
    <input type="hidden" name="type_slip" value="construction">

    @method('put');

    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip Todo Riesgo Construccion</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        <div class="two-sides">

            <div class="left_side">
                {{-- Periodo de mantenimiento --}}
                <div class="input_group">
                    <label >
                        <i class="fa-solid fa-bars-staggered"></i>
                        Periodo de mantenimiento
                    </label>
                    <input type="text" name="" placeholder="..." >
                </div>

            </div>

            <div class="right_side">

                {{-- Objeto del seguro --}}
                <div class="input_group">
                    <label for="cascoBuquesObjetoSeguro">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Objeto del seguro
                    </label>
                    <input type="text" name="" placeholder="..." >
                </div>

            </div>

        </div>
    </div>

    <div class="form_group2">
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
                            <input type="number" id="coberturaSumaAsegurada1" value="0" name="" onkeyup="sumaAseguradaV2()">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center">Cobertura B: Terremoto, Temblor, Tsunami y Erupción Volcánica</td>
                        <td>
                            <input type="number" id="coberturaSumaAsegurada2" value="0" name="" onkeyup="sumaAseguradaV2()">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center">Cobertura C: Ciclón, Huracán, Tormenta, Ventarrón e Inundación</td>
                        <td>
                            <input type="number" id="coberturaSumaAsegurada3" value="0" name="" onkeyup="sumaAseguradaV2()">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center">Cobertura D: Mantenimiento</td>
                        <td>
                            <input type="number" id="coberturaSumaAsegurada4" value="0" name="" onkeyup="sumaAseguradaV2()">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center">Cobertura E y F: Responsabilidad Civil </td>
                        <td>
                            <input type="number" id="coberturaSumaAsegurada5" value="0" name="" onkeyup="sumaAseguradaV2()">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center">Cobertura G: Remosión de Escombros </td>
                        <td>
                            <input type="number" id="coberturaSumaAsegurada6" value="0" name="" onkeyup="sumaAseguradaV2()">
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

    </div>

    <div class="form_group3">
        {{-- Coberturas adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Coberturas </h3>

        <div class="two-sides">
            <div class="left_side">
                <div class="input_group">
                    <label>
                        <i class="fa-regular fa-flag"></i>
                        Cobertura principal A - Daño Material: Este seguro cubre los daños materiales que sufran los bienes asegurados detallados en las condiciones particulares por cualquier causa que no sea excluida expresamente y que no pudiera ser cubierta bajo las coberturasadicionales(hurto, dif.de inventarios/ desgastepaulatino, corrosión, deteriorogradual / daños existentes / otros(texto)
                    </label>
                    <input type="checkbox" value="Cobertura principal A - Daño Material: Este seguro cubre los daños materiales que sufran los bienes asegurados detallados en las condiciones particulares por cualquier causa que no sea excluida expresamente y que no pudiera ser cubierta bajo las coberturasadicionales(hurto, dif.de inventarios/ desgastepaulatino, corrosión, deteriorogradual / daños existentes / otros(texto)"
                        name="description_clause_aditional[]">
                </div>
                

            </div>
            <div class="right_side">
                
                <div class="input_group">
                    <label >
                        <i class="fa-regular fa-flag"></i>
                        Cobertura B: Terremoto, Temblor, Tsunami y Erupción Volcánica
                    </label>
                    <input type="checkbox" value="Cobertura B: Terremoto, Temblor, Tsunami y Erupción Volcánica"
                        name="description_clause_aditional[]">
                </div>
                <div class="input_group">
                    <label >
                        <i class="fa-regular fa-flag"></i>
                        Cobertura C: Ciclón, Huracán, Tormenta, Ventarrón e Inundación
                    </label>
                    <input type="checkbox" value="Cobertura C: Ciclón, Huracán, Tormenta, Ventarrón e Inundación"
                        name="description_clause_aditional[]">
                </div>
                <div class="input_group">
                    <label >
                        <i class="fa-regular fa-flag"></i>
                        Cobertura D: Mantenimiento
                    </label>
                    <input type="checkbox" value="Cobertura D: Mantenimiento"
                        name="description_clause_aditional[]">
                </div>
                <div class="input_group">
                    <label >
                        <i class="fa-regular fa-flag"></i>
                        Cobertura E y F: Responsabilidad Civil 
                    </label>
                    <input type="checkbox" value="Cobertura E y F: Responsabilidad Civil "
                        name="description_clause_aditional[]">
                </div>
                <div class="input_group">
                    <label >
                        <i class="fa-regular fa-flag"></i>
                        Cobertura G: Remosión de Escombros
                    </label>
                    <input type="checkbox" value="Cobertura G: Remosión de Escombros"
                        name="description_clause_aditional[]">
                </div>

            </div>
        </div>
    </div>

    <div class="form_group4">
        {{-- Cláusulas Adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Endosos Adicionales</h3>
        
        <div class="tableContainer">
            <table class="indemnizacionTable">
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

                    <tr>
                        <td>
                            <textarea readonly name="">001: Huelga, Motín y Conmoción Civil </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <textarea readonly name="">002: Responsabilidad Civil Cruzada </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <textarea readonly name="">003: Mantenimiento </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <textarea readonly name="">004: Mantenimiento Amplio  </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <textarea readonly name="">005: Cronograma de Avance de los Trabajos de Construcción y/o Montaje </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <textarea readonly name="">006: Horas Extras, Trabajo Nocturno, Trabajos en Días Festivos, Flete Expreso   </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea readonly name="">007: Flete Aéreo    </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea readonly name="">008: Obras sitas en Zonas Sísmicas </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea readonly name="">009: Exclusión de Pérdida, Daño o Responsabilidad Debido a Terremoto y Temblor  </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <textarea readonly name="">010: Condición Especial Concerniente a Pérdida, Daño o Responsabilidad debidos a Civlón, Avenida e Inundación </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <textarea readonly name="">201: Garantía </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <textarea readonly name="">202: Cobertura de Maquinaria de Construcción / Montaje </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <textarea readonly name="">203: Exclusiones Relativas a Maquinaria Usada  </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <textarea readonly name="">204: Condición Especial 1 para Industrias de Procesamiento de Hidrocarburos</textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <textarea readonly name="">205: Condición Especial 2 para Industrias de Procesamiento de Hidrocarburos Amparo de Medios Catalizadores </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <textarea readonly name="">206: Condiciones Especiales para Equipos Extintores de Incendio </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <textarea readonly name="">207: Campamentos y Almacenes de Materiales de Construcción </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <textarea readonly name="">208: Condiciones Especiales Relativas a Cables y Tuberias Subterráneas </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <textarea readonly name="">209: Condiciones Especiales Relativas a Pérdidas de o Daño a Siembras, Bosques y Cultivos </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <textarea readonly name="">210: Cobertura para Propiedad Adyacente </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <textarea readonly name="">211: Inclusión de Elementos Combustibles </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <textarea readonly name="">212: Cobertura de Gastos para la Descontaminación </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <textarea readonly name="">217: Condiciones Especiales para la Cobertura del Tendido de Oleoductos, Tuberías y Cables en Zanjas Abiertas </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea readonly name="">218: Cobertura de Gastos para Localizar Fugas que Ocurran durante el Tendido de Tuberías </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea readonly name="">221: Cobertura de Riesgos del Fabricante  </textarea>
                        </td>
                        <td>
                            <input type="number" placeholder="0"
                                name="">
                        </td>
                        <td>
                            <input type="text" placeholder="..."
                                name="">
                        </td>
                    </tr>


                </tbody>

            </table>
        </div>
    </div>
    
    <div class="form_group5">
        {{-- Exclusiones --}}

        <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Cláusulas Adicionales</h3>
        <div class="two-sides">
            <div id="clausula-left_side" class="left_side">
                <div class="input_group">
                    <label >
                        <i class="fa-solid fa-flag"></i>
                        Materiales importados
                    </label>
                    <input type="checkbox" value="Materiales importados"
                        name="description_clause_aditional[]">
                </div>
                <div class="input_group">
                    <label >
                        <i class="fa-solid fa-flag"></i>
                        Salvamento 
                    </label>
                    <input type="checkbox"
                        value="Salvamento "
                        name="description_clause_aditional[]">
                </div>
                <div class="input_group">
                    <label >
                        <i class="fa-solid fa-flag"></i>
                        Errores u omisiones no intencionales para descripción
                    </label>
                    <input type="checkbox" value="Errores u omisiones no intencionales para descripción"
                        name="description_clause_aditional[]">
                </div>
                <div class="input_group">
                    <label >
                        <i class="fa-solid fa-flag"></i>
                        No cancelación individual
                    </label>
                    <input type="checkbox" value="No cancelación individual"
                        name="description_clause_aditional[]">
                </div>
                <div class="input_group">
                    <label >
                        <i class="fa-solid fa-flag"></i>
                        Adhesión
                    </label>
                    <input type="checkbox" value="Adhesión"
                        name="description_clause_aditional[]">
                </div>
                <div class="input_group">
                    <label >
                        <i class="fa-solid fa-flag"></i>
                        Ajustadores, liquidadores y peritos de común acuerdo
                    </label>
                    <input type="checkbox" value="Ajustadores, liquidadores y peritos de común acuerdo"
                        name="description_clause_aditional[]">
                </div>
                <div class="input_group">
                    <label >
                        <i class="fa-solid fa-flag"></i>
                        Arbitraje
                    </label>
                    <input type="checkbox" value="Arbitraje"
                        name="description_clause_aditional[]">
                </div>
                <div class="input_group">
                    <label >
                        <i class="fa-solid fa-flag"></i>
                        Cláusula de 72 horas
                    </label>
                    <input type="checkbox" value="Cláusula de 72 horas"
                        name="description_clause_aditional[]">
                </div>

            </div>

            <div class="right_side" style="align-items: center">

                <button class="new_entry__form--button" onclick="addClausula(event)">Agregar cláusula</button>

            </div>
        </div>


        <div class="flexColumnCenterContainer">

            <div class="input_group" style="max-width: 400px">
                <label >
                    <i class="fa-solid fa-flag"></i>
                    Amparo automático de nuevas propiedades (días):
                </label>
                <input type="number" name="description_clause_aditional[]"
                    placeholder="No. Días">
            </div>

        </div>


        <h3 class="slipTitle"> <span class="badge badge-secondary">6</span> Exclusiones</h3>
    
        <div class="two-sides">
            <div id="exclusion-left_side" class="left_side">
                <div class="input_group">
                    <label >
                        <i class="fa-regular fa-flag"></i>
                        Eventos químicos, biológicos, nucleares, radiológicos, cibernéticos
                    </label>
                    <input type="checkbox" value="Eventos químicos, biológicos, nucleares, radiológicos, cibernéticos"
                        name="description_exclusion[]" multiple>
                </div>
                <div class="input_group">
                    <label >
                        <i class="fa-regular fa-flag"></i>
                        Cualquier tipo de multas y penalizaciones
                    </label>
                    <input type="checkbox"
                        value="Cualquier tipo de multas y penalizaciones"
                        name="description_exclusion[]" multiple>
                </div>
                <div class="input_group">
                    <label >
                        <i class="fa-regular fa-flag"></i>
                        Guerra, guerra civil y sus consecuencias
                    </label>
                    <input type="checkbox" value="Guerra, guerra civil y sus consecuencias"
                        name="description_exclusion[]" multiple>
                </div>
                <div class="input_group">
                    <label >
                        <i class="fa-regular fa-flag"></i>
                        Reacción nuclear
                    </label>
                    <input type="checkbox" value="Reacción nuclear"
                        name="description_exclusion[]" multiple>
                </div>
                <div class="input_group">
                    <label >
                        <i class="fa-regular fa-flag"></i>
                        Cláusula de exclusión cibernética
                    </label>
                    <input type="checkbox" value="Cláusula de exclusión cibernética"
                        name="description_exclusion[]" multiple>
                </div>
                <div class="input_group">
                    <label >
                        <i class="fa-regular fa-flag"></i>
                        Cláusula de sanciones, limitaciones y exclusiones
                    </label>
                    <input type="checkbox" value="Cláusula de sanciones, limitaciones y exclusiones"
                        name="description_exclusion[]" multiple>
                </div>
                <div class="input_group">
                    <label >
                        <i class="fa-regular fa-flag"></i>
                        Cláusula de exclusión de filtración, polución y contaminación
                    </label>
                    <input type="checkbox" value="Cláusula de exclusión de filtración, polución y contaminación"
                        name="description_exclusion[]" multiple>
                </div>
                <div class="input_group">
                    <label >
                        <i class="fa-regular fa-flag"></i>
                        Cualquier cobertura de pérdidas consecuenciales.
                    </label>
                    <input type="checkbox" value="Cualquier cobertura de pérdidas consecuenciales."
                        name="description_exclusion[]" multiple>
                </div>

            </div>

            <div class="right_side" style="align-items: center">

                <button class="new_entry__form--button" onclick="addExclusion(event)">Agregar Exclusión</button>

            </div>
        </div>

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
