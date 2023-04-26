<form method="POST" action="{{ route('slip.update', $slip->id) }}" id="formSlipAp" class="new_entry__form"
    enctype="multipart/form-data">

    @csrf
    @method('PUT');

    <input type="hidden" name="type_slip" value="ap">

    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip Accidentes Personales</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        <div class="two-sides">

            <div class="left_side">
                {{-- Limite edad --}}
                <h5 class="slipTitle">Limite de edad:</h5>
                <div class="input_group">
                    <label for="apEdadMaxAceptacion">
                        <i class="fa-solid fa-pager"></i>
                        Edad Máxima de Aceptación
                    </label>
                    <input type="text" id="apEdadMaxAceptacion" name="max_age_approve" placeholder="0">
                </div>
                <div class="input_group">
                    <label for="apEdadMaxCancelacion">
                        <i class="fa-solid fa-pager"></i>
                        Edad Máxima de Cancelación
                    </label>
                    <input type="text" id="apEdadMaxCancelacion" name="max_age_cancel" placeholder="0">
                </div>

            </div>

            <div class="right_side">
                {{-- Beneficiarios --}}
                <h5 class="slipTitle">Beneficiario(s):</h5>
                <div class="input_group">
                    <label for="apBeneficiarioMuerte">
                        <i class="fa-solid fa-book-skull"></i>
                        Beneficiario(s) en caso de muerte
                    </label>
                    <input type="text" id="apBeneficiarioMuerte" name="beneficiary_death">
                </div>

                <div class="input_group">
                    <label for="apBeneficiarioIncapacidad">
                        <i class="fa-solid fa-book-skull"></i>
                        Beneficiario(s) en caso de incapacidad
                    </label>
                    <input type="text" id="apBeneficiarioIncapacidad" name="beneficiary_disability">
                </div>

            </div>
        </div>

        {{-- table Objetos del seguro --}}
        <div class="tableContainer" style="width:90%;">
            <h3 class="slipTitle">Objeto(s) Del Seguro</h3>

            <table id="tableObjetosSeguro" class="table table-striped table-bordered dataTable no-footer"
                cellspacing="0" width="90%" aria-describedby="example_info">
                <thead>
                    <tr role="row">
                        <th>Número</th>
                        <th>Nombre</th>
                        <th>Fecha de nacimiento</th>
                        <th>Edad</th>
                        <th>Limite</th>
                        <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                            colspan="1" aria-label="Add row">

                            <button onclick="addRowObjetoSeguro(event)" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                        </th>
                    </tr>
                </thead>

                <tbody id="objetosTableBody">
                    <tr>
                        <th>

                            <input type="text" name="number[]">
                        </th>
                        <th>
                            <input type="text" name="name[]">
                        </th>
                        <th>
                            <input type="date" name="birthday[]">
                        </th>
                        <th>
                            <input type="number" name="age[]">
                        </th>
                        <th>
                            <input type="number" name="limit[]">
                        </th>
                        <th>

                        </th>
                    </tr>

                </tbody>
            </table>

        </div>

        <div class="two-sides">
            <div class="left_side">
                {{-- Numero asegurado --}}
                <div class="input_group">
                    <label for="apNumAsegurado">
                        <i class="fa-solid fa-flag"></i>
                        Número asegurados
                    </label>
                    <input type="text" id="apNumAsegurado" name="num_insurer">
                </div>
            </div>
            <div class="right">
                {{-- Cumulo asegurado --}}
                <div class="input_group">
                    <label for="apCumuloAsegurado">
                        <i class="fa-solid fa-flag"></i>
                        Cúmulo asegurado
                    </label>
                    <input type="text" id="apCumuloAsegurado" name="accumulation">
                </div>
            </div>
        </div>

        <h4 class="slipTitle">Coberturas</h4>

        <div class="two-sides">
            <div class="left_side">
                {{-- Limite asegurado --}}
                <div class="input_group">
                    <label for="apMuerteCausa2">
                        <i class="fa fa-search"></i>
                        Muerte por cualquier causa:
                    </label>
                    <input type="text" id="apMuerteCausa2" name="aditional_coverage[]" placeholder="...">
                    <input type="text" id="apMuerteCausa2" value="Muerte por cualquier causa" hidden
                        name="description_coverage[]">
                </div>

                {{-- Desmembración accidental --}}
                <div class="input_group">
                    <label for="apDesmembracionAccidental2">
                        <i class="fa fa-search"></i>
                        Desmembración accidental:
                    </label>
                    <input type="text" id="apMuerteCausa2" name="aditional_coverage[]" placeholder="...">
                    <input type="text" id="apMuerteCausa2" value="Desmembración accidental" hidden
                        name="description_coverage[]">
                </div>
                {{-- Incapacidad total y permanente por cualquier causa: --}}
                <div class="input_group">
                    <label for="apIncapacidadTotal2">
                        <i class="fa fa-search"></i>
                        Incapacidad total y permanente por cualquier causa:
                    </label>
                    <input type="text" id="apMuerteCausa2" name="aditional_coverage[]" placeholder="...">
                    <input type="text" id="apMuerteCausa2"
                        value="Incapacidad total y permanente por cualquier causa" hidden
                        name="description_coverage[]">
                </div>
            </div>
            <div class="right">
                {{-- Reembolso de gastos médicos --}}
                <div class="input_group">
                    <label for="apRembolsoGastos2">
                        <i class="fa fa-search"></i>
                        Reembolso de gastos médicos por accidente:
                    </label>
                    <input type="text" id="apMuerteCausa2" name="aditional_coverage[]" placeholder="...">
                    <input type="text" id="apMuerteCausa2" value="Reembolso de gastos médicos por accidente"
                        hidden name="description_coverage[]">
                </div>
                {{-- Gastos de sepelio --}}
                <div class="input_group">
                    <label for="apGastosSepelio2">
                        <i class="fa fa-search"></i>
                        Gastos de sepelio:
                    </label>
                    <input type="text" id="apMuerteCausa2" name="aditional_coverage[]" placeholder="...">
                    <input type="text" id="apMuerteCausa2" value="Gastos de sepelio" hidden
                        name="description_coverage[]">
                </div>
                {{-- Ambulancia por accidente: --}}
                <div class="input_group">
                    <label for="apAmbulanciaAccidente2">
                        <i class="fa fa-search"></i>
                        Ambulancia por accidente:
                    </label>
                    <input type="text" id="apMuerteCausa2" name="aditional_coverage[]" placeholder="...">
                    <input type="text" id="apMuerteCausa2" value="Ambulancia por accidente" hidden
                        name="description_coverage[]">
                </div>
            </div>
        </div>

        <h4 class="slipTitle">Límite asegurado</h4>
        <div class="two-sides">
            <div class="left_side">
                {{-- Limite asegurado --}}
                <div class="input_group">
                    <label for="apMuerteCausa1">
                        <i class="fa fa-search"></i>
                        Muerte por cualquier causa:
                    </label>
                    <input type="text" id="apMuerteCausa1" name="description_limit_insured[]"
                        value="Muerte por cualquier causa:" hidden>

                    <input type="number" id="apMuerteCausa1" name="value_limit_insured[]" placeholder="USD">
                </div>
                {{-- Desmembración accidental --}}
                <div class="input_group">
                    <label for="apDesmembracionAccidental1">
                        <i class="fa fa-search"></i>
                        Desmembración accidental:
                    </label>
                    <input type="text" name="description_limit_insured[]" value="Desmembración accidental:"
                        hidden>
                    <input type="number" id="apDesmembracionAccidental1" name="DesmembracionAccidental1"
                        placeholder="USD">
                </div>
                {{-- Incapacidad total y permanente por cualquier causa: --}}
                <div class="input_group">
                    <label for="apIncapacidadTotal1">
                        <i class="fa fa-search"></i>
                        Incapacidad total y permanente por cualquier causa:
                    </label>
                    <input type="text" name="description_limit_insured[]"
                        value="Incapacidad total y permanente por cualquier causa:" hidden>
                    <input type="number" id="apIncapacidadTotal1" name="IncapacidadTotal1" placeholder="USD">
                </div>
            </div>
            <div class="right">
                {{-- Reembolso de gastos médicos --}}
                <div class="input_group">
                    <label for="apRembolsoGastos1">
                        <i class="fa fa-search"></i>
                        Reembolso de gastos médicos por accidente:
                    </label>
                    <input type="text" name="description_limit_insured[]"
                        value="Reembolso de gastos médicos por accidente:" hidden>
                    <input type="number" id="apRembolsoGastos1" name="RembolsoGastos1" placeholder="USD">
                </div>
                {{-- Gastos de sepelio --}}
                <div class="input_group">
                    <label for="apGastosSepelio1">
                        <i class="fa fa-search"></i>
                        Gastos de sepelio:
                    </label>
                    <input type="text" name="description_limit_insured[]" value="Gastos de sepelio:" hidden>
                    <input type="number" id="apGastosSepelio1" name="GastosSepelio1" placeholder="USD">
                </div>
                {{-- Ambulancia por accidente: --}}
                <div class="input_group">
                    <label for="apAmbulanciaAccidente1">
                        <i class="fa fa-search"></i>
                        Ambulancia por accidente:
                    </label>
                    <input type="text" name="description_limit_insured[]" value="Ambulancia por accidente:"
                        hidden>
                    <input type="number" id="apAmbulanciaAccidente1" name="AmbulanciaAccidente1" placeholder="USD">
                </div>
            </div>
        </div>

        {{-- Base de cobertura --}}
        <h4 class="slipTitle">Base de cobertura</h4>
        <div class="flexColumnCenterContainer">
            <div class="input_group" style="max-width:450px">
                <label for="apBaseCobertura">
                    <i class="fa fa-search"></i>
                    Base de cobertura:
                </label>
                <input type="text" id="apBaseCobertura" name="coverage_foundation">
            </div>
        </div>

    </div>

    <div class="form_group2">
        {{-- Clausulas adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Cláusulas Adicionales</h3>

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
                            <textarea name="description_clause_additional[]">Errores u omisiones</textarea>
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
                        <td></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <textarea name="description_clause_additional[]">120 días para cancelación anticipada y no individual</textarea>
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
                        <td></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <textarea name="description_clause_additional[]">30 días hábiles para notificación de siniestros</textarea>
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
                        <td></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <textarea name="description_clause_additional[]">Extensión de vigencia a prorrata hasta 120 días</textarea>
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
                        <td></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>
                            <textarea name="description_clause_additional[]">Pago de reclamos 30 días</textarea>
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
                        <td></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>
                            <textarea name="description_clause_additional[]">Modificación de suma asegurada</textarea>
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
                        <td></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>
                            <textarea name="description_clause_additional[]">De adhesión</textarea>
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
                        <td></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>
                            <textarea name="description_clause_additional[]">Declaración de titulares</textarea>
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
                        <td></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>
                            <textarea name="description_clause_additional[]">Cobertura amplia vuelo</textarea>
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
                        <td></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>
                            <textarea name="description_clause_additional[]">Devolución de prima por buena experiencia siniestral</textarea>
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
                        <td></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>
                            <textarea name="description_clause_additional[]">Inclusión automática del personal con 60 días</textarea>
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
                        <td></td>
                    </tr>

                </tbody>

            </table>
        </div>

    </div>

    <div class="form_group3">
        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Exclusiones</h3>

        <div class="two-sides">
            <div id="exclusion-left_side" class="left_side">
                <div class="input_group">
                    <label for="apExclusion2">
                        <i class="fa-regular fa-flag"></i>
                        Daños extracontractuales, daños punitivos o ejemplares
                    </label>
                    <input type="checkbox" id="apExclusion2"
                        value="Daños extracontractuales, daños punitivos o ejemplares" name="description_exclusion[]"
                        multiple>
                </div>
                <div class="input_group">
                    <label for="apExclusion3">
                        <i class="fa-regular fa-flag"></i>
                        Cualquier pago x gracia
                    </label>
                    <input type="checkbox" id="apExclusion3" value="Cualquier pago x gracia"
                        name="description_exclusion[]" multiple>
                </div>
                <div class="input_group">
                    <label for="apExclusion4">
                        <i class="fa-regular fa-flag"></i>
                        Coberturas de Desempleo
                    </label>
                    <input type="checkbox" id="apExclusion4" value="Coberturas de Desempleo"
                        name="description_exclusion[]" multiple>
                </div>
                <div class="input_group">
                    <label for="apExclusion5">
                        <i class="fa-regular fa-flag"></i>
                        Coberturas de Invalidez Parcial
                    </label>
                    <input type="checkbox" id="apExclusion5" value="Coberturas de Invalidez Parcial"
                        name="description_exclusion[]" multiple>
                </div>
                <div class="input_group">
                    <label for="apExclusion12">
                        <i class="fa-regular fa-flag"></i>
                        Policías Judiciales
                    </label>
                    <input type="checkbox" id="apExclusion12" value="Policías Judiciales"
                        name="description_exclusion[]" multiple>
                </div>
                <div class="input_group">
                    <label for="apExclusion13">
                        <i class="fa-regular fa-flag"></i>
                        Guardaespaldas
                    </label>
                    <input type="checkbox" id="apExclusion13" value="Guardaespaldas" name="description_exclusion[]"
                        multiple>
                </div>
                <div class="input_group">
                    <label for="apExclusion15">
                        <i class="fa-regular fa-flag"></i>
                        Aviación Particular
                    </label>
                    <input type="checkbox" id="apExclusion15" value="Aviación Particular"
                        name="description_exclusion[]" multiple>
                </div>
                <div class="input_group">
                    <label for="apExclusion17">
                        <i class="fa-regular fa-flag"></i>
                        Deportes y aficiones peligrosas si son practicadas de manera profesional
                    </label>
                    <input type="checkbox" id="apExclusion17"
                        value="Deportes y aficiones peligrosas si son practicadas de manera profesional"
                        name="description_exclusion[]" multiple>
                </div>
                <div class="input_group">
                    <label for="apExclusion18">
                        <i class="fa-regular fa-flag"></i>
                        Empleados que se encuentren pensionados, jubilados, en proceso o estado de invalidez.
                    </label>
                    <input type="checkbox" id="apExclusion18"
                        value="Empleados que se encuentren pensionados, jubilados, en proceso o estado de invalidez."
                        name="description_exclusion[]" multiple>
                </div>
            </div>
            <div class="right_side">
                <div class="input_group">
                    <label for="apExclusion6">
                        <i class="fa-regular fa-flag"></i>
                        Coberturas de Invalidez Temporal
                    </label>
                    <input type="checkbox" id="apExclusion6" value="Coberturas de Invalidez Temporal"
                        name="description_exclusion[]" multiple>
                </div>
                <div class="input_group">
                    <label for="apExclusion7">
                        <i class="fa-regular fa-flag"></i>
                        Coberturas de Invalidez Profesional
                    </label>
                    <input type="checkbox" id="apExclusion7" value="Coberturas de Invalidez Profesional"
                        name="description_exclusion[]" multiple>
                </div>
                <div class="input_group">
                    <label for="apExclusion8">
                        <i class="fa-regular fa-flag"></i>
                        Cobertura de Pérdida de Licencia
                    </label>
                    <input type="checkbox" id="apExclusion8" value="Cobertura de Pérdida de Licencia"
                        name="description_exclusion[]" multiple>
                </div>
                <div class="input_group">
                    <label for="apExclusion9">
                        <i class="fa-regular fa-flag"></i>
                        Cualquier tipo de Reserva Matemática

                    </label>
                    <input type="checkbox" id="apExclusion9" value="Cualquier tipo de Reserva Matemática"
                        name="description_exclusion[]" multiple>
                </div>
                <div class="input_group">
                    <label for="apExclusion16">
                        <i class="fa-regular fa-flag"></i>
                        Aviación Privada
                    </label>
                    <input type="checkbox" id="apExclusion16" value="Aviación Privada"
                        name="description_exclusion[]" multiple>
                </div>

                <div class="input_group">
                    <label for="apExclusion14">
                        <i class="fa-regular fa-flag"></i>
                        Cualquier cuerpo especializado en lucha contra el narcotráfico y delincuencia organizada
                    </label>
                    <input type="checkbox" id="apExclusion14"
                        value="Cualquier cuerpo especializado en lucha contra el narcotráfico y delincuencia organizada"
                        name="description_exclusion[]" multiple>
                </div>
            </div>
        </div>

        <div class="flexColumnCenterContainer">
            <button class="new_entry__form--button" onclick="addExclusion(event)">Agregar exclusion</button>
        </div>

    </div>

    <div class="form_group4">
        {{-- Deducibles --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Deducibles</h3>

        {{-- Muerte por cualquier causa --}}
        <div class="flexColumnCenterContainer">
            <h4 class="slipTitle">Muerte Por Cualquier Causa:</h4>
            <div class="flexRowWrapContainer">
                <div class="labelStyleContainer">
                    <p>
                        <i class="fa-solid fa-percent"></i>
                        valor del siniestro
                    </p>
                    <input type="number" style="max-width:95px;text-align: end;" placeholder="%"
                        name="sinister_value[]" min="0">
                </div>
                <div class="labelStyleContainer">
                    <p>
                        <i class="fa-solid fa-percent"></i>
                        valor asegurado
                    </p>
                    <input type="number" placeholder="%" name="insured_value_array[]" min="0"
                        style="max-width:95px;text-align: end;">
                </div>
                <div class="labelStyleContainer">
                    <input type="number" name="minimum[]" style="text-align:end" placeholder="...">
                    <p>
                        mínimo
                    </p>
                </div>
                <textarea type="text" name="description2_deductible[]" placeholder="..."></textarea>
            </div>
        </div>
        {{-- Desmembración accidental --}}
        <div class="flexColumnCenterContainer">
            <h4 class="slipTitle">Desmembración Accidental</h4>
            <div class="flexRowWrapContainer" style="margin:1.2rem 0">
                <div class="labelStyleContainer">
                    <p>
                        <i class="fa-solid fa-percent"></i>
                        valor del siniestro
                    </p>
                    <input type="number" style="max-width:95px;text-align: end;" placeholder="%"
                        name="sinister_value[]" min="0">
                </div>
                <div class="labelStyleContainer">
                    <p>
                        <i class="fa-solid fa-percent"></i>
                        valor asegurado
                    </p>
                    <input type="number" placeholder="%" name="insured_value_array[]" min="0"
                        style="max-width:95px;text-align: end;">
                </div>
                <div class="labelStyleContainer">
                    <input type="number" name="minimum[]" style="text-align:end" placeholder="...">
                    <p>
                        mínimo
                    </p>
                </div>
                <textarea type="text" name="description2_deductible[]" placeholder="..."></textarea>
            </div>
        </div>
        {{-- Incapacidad total y permanente por cualquier causa: --}}
        <div class="flexColumnCenterContainer">
            <h4 class="slipTitle">Incapacidad Total y Permanente Por Cualquier Causa</h4>
            <div class="flexRowWrapContainer" style="margin:1.2rem 0">
                <div class="labelStyleContainer">
                    <p>
                        <i class="fa-solid fa-percent"></i>
                        valor del siniestro
                    </p>
                    <input type="number" style="max-width:95px;text-align: end;" placeholder="%"
                        name="sinister_value[]" min="0">
                </div>
                <div class="labelStyleContainer">
                    <p>
                        <i class="fa-solid fa-percent"></i>
                        valor asegurado
                    </p>
                    <input type="number" placeholder="%" name="insured_value_array[]" min="0"
                        style="max-width:95px;text-align: end;">
                </div>
                <div class="labelStyleContainer">
                    <input type="number" name="minimum[]" style="text-align:end" placeholder="...">
                    <p>
                        mínimo
                    </p>
                </div>
                <textarea type="text" name="description2_deductible[]" placeholder="..."></textarea>
            </div>
        </div>



        {{-- Reembolso de gastos médicos --}}

        <div class="flexColumnCenterContainer">
            <h4 class="slipTitle">Reembolso De Gastos Médicos</h4>
            <div class="flexRowWrapContainer" style="margin:1.2rem 0">
                <div class="labelStyleContainer">
                    <p>
                        <i class="fa-solid fa-percent"></i>
                        valor del siniestro
                    </p>
                    <input type="number" style="max-width:95px;text-align: end;" placeholder="%"
                        name="sinister_value[]" min="0">
                </div>
                <div class="labelStyleContainer">
                    <p>
                        <i class="fa-solid fa-percent"></i>
                        valor asegurado
                    </p>
                    <input type="number" placeholder="%" name="insured_value_array[]" min="0"
                        style="max-width:95px;text-align: end;">
                </div>
                <div class="labelStyleContainer">
                    <input type="number" name="minimum[]" style="text-align:end" placeholder="...">
                    <p>
                        mínimo
                    </p>
                </div>
                <textarea type="text" name="description2_deductible[]" placeholder="..."></textarea>
            </div>
        </div>
        {{-- Gastos de sepelio --}}

        <div class="flexColumnCenterContainer">
            <h4 class="slipTitle">Gastos De Sepelio:</h4>
            <div class="flexRowWrapContainer" style="margin:1.2rem 0">
                <div class="labelStyleContainer">
                    <p>
                        <i class="fa-solid fa-percent"></i>
                        valor del siniestro
                    </p>
                    <input type="number" style="max-width:95px;text-align: end;" placeholder="%"
                        name="sinister_value[]" min="0">
                </div>
                <div class="labelStyleContainer">
                    <p>
                        <i class="fa-solid fa-percent"></i>
                        valor asegurado
                    </p>
                    <input type="number" placeholder="%" name="insured_value_array[]" min="0"
                        style="max-width:95px;text-align: end;">
                </div>
                <div class="labelStyleContainer">
                    <input type="number" name="minimum[]" style="text-align:end" placeholder="...">
                    <p>
                        mínimo
                    </p>
                </div>
                <textarea type="text" name="description2_deductible[]" placeholder="..."></textarea>
            </div>
        </div>
        {{-- Ambulancia por accidente --}}
        <div class="flexColumnCenterContainer">
            <h4 class="slipTitle">Ambulancia Por Accidente:</h4>
            <div class="flexRowWrapContainer" style="margin:1.2rem 0">
                <div class="labelStyleContainer">
                    <p>
                        <i class="fa-solid fa-percent"></i>
                        valor del siniestro
                    </p>
                    <input type="number" style="max-width:95px;text-align: end;" placeholder="%"
                        name="sinister_value[]" min="0">
                </div>
                <div class="labelStyleContainer">
                    <p>
                        <i class="fa-solid fa-percent"></i>
                        valor asegurado
                    </p>
                    <input type="number" placeholder="%" name="insured_value_array[]" min="0"
                        style="max-width:95px;text-align: end;">
                </div>
                <div class="labelStyleContainer">
                    <input type="number" name="minimum[]" style="text-align:end" placeholder="...">
                    <p>
                        mínimo
                    </p>
                </div>
                <textarea type="text" name="description2_deductible[]" placeholder="..."></textarea>
            </div>
        </div>

    </div>

    <div class="form_group5">
        <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Indemnización</h3>

        <p class="slipTitle">
            Porcentaje de indemnización de acuerdo al límite de edad, para la cobertura de vida y accidentes personales
        </p>

        <div class="sentenceInput">
            <label>Desde los</label>
            <input class="inputNumber" type="number" id="apIndemnizacionEdadDesde" name="compensation_since">
            <label> años, hasta los</label>
            <input class="inputNumber" type="number" id="apIndemnizacionEdadHasta" name="compensation_until">
            <label> años, al</label>
            <input class="inputNumber" type="number" id="apIndemnizacionSumaAsegurada1"
                name="compensation_porcentage">
            <label>% de la suma asegurada</label>
        </div>

        <div class="tableContainer">
            <table class="indemnizacionTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>INCAPACIDAD Y/O DESMEMBRACION</th>
                        <th>CANTIDAD (%)</th>
                    </tr>
                </thead>
                {{-- tbody --}}
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>Enajenación mental que impida todo trabajo.</td>
                        <td>
                            <input type="number" id="apIndemnizacion1" name="Indemnizacion1" value="100"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Parálisis o Incapacidad total y permanente</td>
                        <td>
                            <input type="number" id="apIndemnizacion2" name="Indemnizacion2" value="100"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Pérdida de la Vista de ambos ojos</td>
                        <td>
                            <input type="number" id="apIndemnizacion3" name="Indemnizacion3" value="100"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Pérdida o inutilización total y permanente de ambas manos o ambos pies</td>
                        <td>
                            <input type="number" id="apIndemnizacion4" name="Indemnizacion4" value="100"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Pérdida o inutilización total y permanente de una mano y un pie</td>
                        <td>
                            <input type="number" id="apIndemnizacion5" name="Indemnizacion5" value="100"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Pérdida total e irrecuperable del habla</td>
                        <td>
                            <input type="number" id="apIndemnizacion6" name="Indemnizacion6" value="100"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Pérdida total e irreparable de la audición de los dos oídos</td>
                        <td>
                            <input type="number" id="apIndemnizacion7" name="Indemnizacion7" value="100"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Pérdida de dos o más miembros principales</td>
                        <td>
                            <input type="number" id="apIndemnizacion8" name="Indemnizacion8" value="100"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Pérdida total e irreparable de un ojo, junto con la pérdida de un pie o una mano</td>
                        <td>
                            <input type="number" id="apIndemnizacion9" name="Indemnizacion9" value="100"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Pérdida total de los dedos de ambas manos, comprendiendo todas las falanges</td>
                        <td>
                            <input type="number" id="apIndemnizacion10" name="Indemnizacion10" value="100"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Pérdida o inutilización total y permanente de una mano</td>
                        <td>
                            <input type="number" id="apIndemnizacion11" name="Indemnizacion11" value="80"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>Pérdida de todos los dedos de una mano</td>
                        <td>
                            <input type="number" id="apIndemnizacion12" name="Indemnizacion12" value="60"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>Pérdida o inutilización total y permanente de un pie</td>
                        <td>
                            <input type="number" id="apIndemnizacion13" name="Indemnizacion13" value="80"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>Pérdida total o irreparable de la visión de un ojo</td>
                        <td>
                            <input type="number" id="apIndemnizacion14" name="Indemnizacion14" value="60"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>Pérdida total permanente de la audición de un oído</td>
                        <td>
                            <input type="number" id="apIndemnizacion15" name="Indemnizacion15" value="60"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td>Pérdida de un miembro principal. </td>
                        <td>
                            <input type="number" id="apIndemnizacion16" name="Indemnizacion16" value="60"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <td>Pérdida de los dedos pulgar e índice de la misma mano</td>
                        <td>
                            <input type="number" id="apIndemnizacion17" name="Indemnizacion17" value="25"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <td>Pérdida del pulgar derecho</td>
                        <td>
                            <input type="number" id="apIndemnizacion18" name="Indemnizacion18" value="20"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td>Pérdida del pulgar izquierdo</td>
                        <td>
                            <input type="number" id="apIndemnizacion19" name="Indemnizacion19" value="20"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td>Pérdida de las falanges del pulgar derecho</td>
                        <td>
                            <input type="number" id="apIndemnizacion20" name="Indemnizacion20" value="20"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>21</td>
                        <td>Pérdida de las falanges del pulgar izquierdo</td>
                        <td>
                            <input type="number" id="apIndemnizacion21" name="Indemnizacion21" value="20"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>22</td>
                        <td>Pérdida de una de las falanges del pulgar derecho</td>
                        <td>
                            <input type="number" id="apIndemnizacion22" name="Indemnizacion22" value="20"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>23</td>
                        <td>Pérdida de una de las falanges del pulgar izquierdo</td>
                        <td>
                            <input type="number" id="apIndemnizacion23" name="Indemnizacion23" value="20"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>24</td>
                        <td>Pérdida del dedo grande del pie</td>
                        <td>
                            <input type="number" id="apIndemnizacion24" name="Indemnizacion24" value="20"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>25</td>
                        <td>Pérdida de tres falanges de cualquier otro dedo de la mano derecha</td>
                        <td>
                            <input type="number" id="apIndemnizacion25" name="Indemnizacion25" value="15"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>26</td>
                        <td>Pérdida de dos falanges de cualquier otro dedo de la mano izquierda</td>
                        <td>
                            <input type="number" id="apIndemnizacion26" name="Indemnizacion26" value="15"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>27</td>
                        <td>Pérdida de dos falanges de cualquier otro dedo de la mano derecha </td>
                        <td>
                            <input type="number" id="apIndemnizacion27" name="Indemnizacion27" value="15"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>28</td>
                        <td>Pérdida de dos falanges de cualquier otro dedo de la mano izquierda </td>
                        <td>
                            <input type="number" id="apIndemnizacion28" name="Indemnizacion28" value="15"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>29</td>
                        <td>Pérdida de una falange de cualquier otro dedo de la mano derecha </td>
                        <td>
                            <input type="number" id="apIndemnizacion29" name="Indemnizacion29" value="10"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>

    </div>

    <div class="form_group6">

        @include('admin.tecnico.slip.slips_generales.footer1')

    </div>

    <div class="form_group7">

        @include('admin.tecnico.slip.slips_generales.footer2')

    </div>

    <script>
        const inputs = document.querySelectorAll('input[type="number"]');

        for (let item of inputs) {
            let currentValue = item.value;
            item.value = numberFormatter.format(currentValue);
        }
    </script>
</form>
