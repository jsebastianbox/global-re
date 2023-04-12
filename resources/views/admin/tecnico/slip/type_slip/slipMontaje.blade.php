<form method="POST" action="{{ route('slip.update', $slip->id) }}"  enctype="multipart/form-data" id="formSlipMontaje"
    class="new_entry__form" >
    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="montaje">

    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip Todo Riesgo Montaje</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        <div class="two-sides">

            <div class="left_side">
                {{-- Periodo de mantenimiento --}}
                <div class="input_group">
                    <label >
                        <i class="fa-solid fa-bars-staggered"></i>
                        Periodo de mantenimiento
                    </label>
                    <input type="number" name="" placeholder="..." >
                </div>

            </div>

            <div class="right_side">

                {{-- Objeto del seguro --}}
                <div class="input_group">
                    <label for="cascoBuquesObjetoSeguro">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Objeto del seguro
                    </label>
                    <input type="text" name=""  placeholder="...">
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
                        Cobertura principal A - Daño Material: Este seguro cubre los daños materiales que sufran los bienes asegurados detallados en las condiciones particulares causados por:
                        <ul>
                            <li>a. Errores durante el montaje.</li>
                            <li>b. Impericia, descuido y actos malintencionados de obreros y empleados del Aseguradoo de extraños.</li>
                            <li>c. Caídade partesdel objetoquese monta, comoconsecuenciade roturade cables o cadenas, hundimiento o deslizamiento del equipo de montaje u otros accidentesanálogos.</li>
                            <li>d. Robo, de acuerdo con la siguiente definición: se entenderá por robo las pérdidas por substracción de los bienes aseguradosy los daños que se causen a los mismos como consecuencia del intento o la consumación del robo, siempre y cuando la persona quelocometa haya penetrado al lugar por medios violentos o de fuerza y en forma tal que en el lugar de entrada o de salida queden huellas visibles de tal acto de violencia. El Asegurado se obliga a presentar una denuncia de los hechos, de que trata este inciso, ante la autoridadcompetente.</li>
                            <li>e. Incendio, rayo, explosión.</li>
                            <li>f. Hundimientode tierrao desprendimientode tierrao de rocas.</li>
                            <li>g. Cortocircuitos, arcos voltaicos, así como la acción indirecta de la electricidadatmosférica.</li>
                            <li>h. Caída de aviones o parte de ellos.</li>
                            <li>i. Otros accidentes durante el montaje y que no pudieran ser cubiertos bajo los amparos adicionales de la Cláusula Segunda y,cuando se trate de bienes nuevos, también durante las pruebas de resistencia o de operación.</li>
                        </ul>
                    </label>
                    <input type="checkbox" value="Cobertura principal A - Daño Material."
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
                            <textarea readonly name="">004: Mantenimiento Amplio </textarea>
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
                            <textarea readonly name="">012: Exclusión de Vientos Huracanados </textarea>
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
                            <textarea readonly name="">013: Bienes Alamacenados Fuera de Sitio </textarea>
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
                            <textarea readonly name="">100: Prueba de Máquina e Instalaciones  </textarea>
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
                            <textarea readonly name="">101: Túneles y Galerias </textarea>
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
                            <textarea readonly name="">102: Cables Subterraneos, Tuberías y demás Instalaciones </textarea>
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
                            <textarea readonly name="">103: Cosechas, Bosques y Cultivos </textarea>
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
                            <textarea readonly name="">104: Presas y Embalses </textarea>
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
                            <textarea readonly name="">106: Trabajos por Secciones </textarea>
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
                            <textarea readonly name="">107: Campamentos y Almacenes de Materiales de Construcción </textarea>
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
                            <textarea readonly name="">108: Equipo y Maquinaria de Construcción y Montaje </textarea>
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
                            <textarea readonly name="">109: Almacenaje de Material de Construcción </textarea>
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
                            <textarea readonly name="">110: Responsabilidad Civil Cruzada</textarea>
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
                            <textarea readonly name="">111: Remoción de Escombros despúes del Corrimiento de Tierras </textarea>
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
                            <textarea readonly name="">112: Equipos Extintores de Incendios y Protección en Sitios de Obra </textarea>
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
                            <textarea readonly name="">113: Transportes Nacionales </textarea>
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
                            <textarea readonly name="">114: Siniestro en Serie </textarea>
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
                            <textarea readonly name="">115: Riesgos de Diseño </textarea>
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
                            <textarea readonly name="">116: Obras Civiles Aseguradas Recibidas y/o Puestas en Operación </textarea>
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
                            <textarea readonly name="">117: Tendido de Tuberias de Agua y Desagues</textarea>
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
                            <textarea readonly name="">118: Trabajos de Perforación para Pozos de Agua </textarea>
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
                            <textarea readonly name="">119: Propiedad Existente</textarea>
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
                            <textarea readonly name="">114: Siniestro en Serie</textarea>
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
                            <textarea readonly name="">120: Vibraciones</textarea>
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
                            <textarea readonly name="">121: Cimentaciones por Pilotaje y Tablestacados para Fosas de Obras</textarea>
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
        <h3 class="slipTitle"> <span class="badge badge-secondary">8</span> Garantía De Pago De Primas</h3>

        @include('admin.tecnico.slip.slips_generales.tableGarantia')

        <h3 class="slipTitle"> <span class="badge badge-secondary">9</span> Security</h3>

        @include('admin.tecnico.slip.slips_generales.tableSecurity')

    </div>

    <div class="form_group7">
        <h3 class="slipTitle"> <span class="badge badge-secondary">10</span> Adicionales</h3>

        @include('admin.tecnico.slip.slips_generales.footer')

    </div>
</form>
