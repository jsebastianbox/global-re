<form method="POST" action="{{ route('slip.update', $slip->id) }}" id="formSlipVida" class="new_entry__form"
    enctype="multipart/form-data">
    {{-- -ok --}}
    @method('PUT')

    @csrf

    <input type="hidden" name="type_slip" value="vida">

    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> {{ $slip->type->name }}</h3>

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
                    <input type="text" id="apEdadMaxAceptacion" name="max_age_approve" placeholder="0"
                        value="{{ $slip_type->max_age_approve }}">
                </div>
                <div class="input_group">
                    <label for="apEdadMaxCancelacion">
                        <i class="fa-solid fa-pager"></i>
                        Edad Máxima de Cancelación
                    </label>
                    <input type="text" id="apEdadMaxCancelacion" name="max_age_cancel" placeholder="0"
                        value="{{ $slip_type->max_age_cancel }}">
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
                    <input type="text" id="apBeneficiarioMuerte" name="beneficiary_death"
                        value="{{ $slip_type->beneficiary_death }}">
                </div>

                <div class="input_group">
                    <label for="apBeneficiarioIncapacidad">
                        <i class="fa-solid fa-book-skull"></i>
                        Beneficiario(s) en caso de incapacidad
                    </label>
                    <input type="text" id="apBeneficiarioIncapacidad" name="beneficiary_disability"
                        value="{{ $slip_type->beneficiary_disability }}">
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

                    @if (count($slip_type->object_insurance) > 0)
                        @foreach ($slip_type->object_insurance as $item)
                            <tr>
                                <th>
                                    <input type="text" name="number[]" value="{{ $item->number }}">
                                </th>
                                <th>
                                    <input type="text" name="name[]" value="{{ $item->name }}">
                                </th>
                                <th>
                                    <input type="date" name="birthday[]" value="{{ $item->birthday }}">
                                </th>
                                <th>
                                    <input type="number" name="age[]" value="{{ $item->age }}">
                                </th>
                                <th>
                                    <input type="number" name="limit[]" value="{{ $item->limit }}">
                                </th>
                                <th>
                                </th>
                            </tr>
                        @endforeach
                    @else
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
                    @endif


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
                    <input type="text" id="apNumAsegurado" name="num_insurer" value="{{ $slip->num_insurer }}">
                </div>
            </div>
            <div class="right">
                {{-- Cumulo asegurado --}}
                <div class="input_group">
                    <label for="apCumuloAsegurado">
                        <i class="fa-solid fa-flag"></i>
                        Cúmulo asegurado
                    </label>
                    <input type="text" id="apCumuloAsegurado" name="accumulation"
                        value="{{ $slip->accumulation }}">
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
                    <input type="text" id="apMuerteCausa2" name="aditional_coverage[]" placeholder="..."
                        @isset($slip->coverage[0])
                    value="{{ $slip->coverage[0]->aditional_coverage }}"
                    @endisset>

                </div>

                {{-- Desmembración accidental --}}
                <div class="input_group">
                    <label for="apDesmembracionAccidental2">
                        <i class="fa fa-search"></i>
                        Desmembración accidental:
                    </label>

                    <input type="text" id="apMuerteCausa2" name="aditional_coverage[]" placeholder="..."
                        @isset($slip->coverage[1])
                    value="{{ $slip->coverage[1]->aditional_coverage }}"
                    @endisset>


                </div>
                {{-- Incapacidad total y permanente por cualquier causa: --}}
                <div class="input_group">
                    <label for="apIncapacidadTotal2">
                        <i class="fa fa-search"></i>
                        Incapacidad total y permanente por cualquier causa:
                    </label>
                    <input type="text" id="apMuerteCausa2" name="aditional_coverage[]" placeholder="..."
                        @isset($slip->coverage[2])
                    value="{{ $slip->coverage[2]->aditional_coverage }}"
                    @endisset>

                </div>
            </div>
            <div class="right">
                {{-- Reembolso de gastos médicos --}}
                <div class="input_group">
                    <label for="apRembolsoGastos2">
                        <i class="fa fa-search"></i>
                        Reembolso de gastos médicos por accidente:
                    </label>
                    <input type="text" id="apMuerteCausa2" name="aditional_coverage[]" placeholder="..."
                        @isset($slip->coverage[3])
                    value="{{ $slip->coverage[3]->aditional_coverage }}"
                    @endisset>

                </div>
                {{-- Gastos de sepelio --}}
                <div class="input_group">
                    <label for="apGastosSepelio2">
                        <i class="fa fa-search"></i>
                        Gastos de sepelio:
                    </label>
                    <input type="text" id="apMuerteCausa2" name="aditional_coverage[]" placeholder="..."
                        @isset($slip->coverage[4])
                    value="{{ $slip->coverage[4]->aditional_coverage }}"
                    @endisset>

                </div>
                {{-- Ambulancia por accidente: --}}
                <div class="input_group">
                    <label for="apAmbulanciaAccidente2">
                        <i class="fa fa-search"></i>
                        Ambulancia por accidente:
                    </label>
                    <input type="text" id="apMuerteCausa2" name="aditional_coverage[]" placeholder="..."
                        @isset($slip->coverage[5])
                    value="{{ $slip->coverage[5]->aditional_coverage }}"
                    @endisset>

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

                    {{-- <input type="number" id="apMuerteCausa1" name="value_limit_insured[]" placeholder="USD"> --}}

                    <input type="text" id="apMuerteCausa1" name="value_limit_insured[]" placeholder="USD"
                        @isset($slip->limit_insured[0])
                    value="{{ $slip->limit_insured[0]->value_limit_insured }}"
                    @endisset>
                </div>
                {{-- Desmembración accidental --}}
                <div class="input_group">
                    <label for="apDesmembracionAccidental1">
                        <i class="fa fa-search"></i>
                        Desmembración accidental:
                    </label>
                    <input type="text" id="apMuerteCausa1" name="value_limit_insured[]" placeholder="USD"
                        @isset($slip->limit_insured[1])
                    value="{{ $slip->limit_insured[1]->value_limit_insured }}"
                    @endisset>
                </div>
                {{-- Incapacidad total y permanente por cualquier causa: --}}
                <div class="input_group">
                    <label for="apIncapacidadTotal1">
                        <i class="fa fa-search"></i>
                        Incapacidad total y permanente por cualquier causa:
                    </label>
                    <input type="text" id="apMuerteCausa1" name="value_limit_insured[]" placeholder="USD"
                        @isset($slip->limit_insured[2])
                    value="{{ $slip->limit_insured[2]->value_limit_insured }}"
                    @endisset>
                </div>
            </div>
            <div class="right">
                {{-- Reembolso de gastos médicos --}}
                <div class="input_group">
                    <label for="apRembolsoGastos1">
                        <i class="fa fa-search"></i>
                        Reembolso de gastos médicos por accidente:
                    </label>
                    <input type="text" id="apMuerteCausa1" name="value_limit_insured[]" placeholder="USD"
                        @isset($slip->limit_insured[3])
                    value="{{ $slip->limit_insured[3]->value_limit_insured }}"
                    @endisset>
                </div>
                {{-- Gastos de sepelio --}}
                <div class="input_group">
                    <label for="apGastosSepelio1">
                        <i class="fa fa-search"></i>
                        Gastos de sepelio:
                    </label>
                    <input type="text" id="apMuerteCausa1" name="value_limit_insured[]" placeholder="USD"
                        @isset($slip->limit_insured[4])
                    value="{{ $slip->limit_insured[4]->value_limit_insured }}"
                    @endisset>
                </div>
                {{-- Ambulancia por accidente: --}}
                <div class="input_group">
                    <label for="apAmbulanciaAccidente1">
                        <i class="fa fa-search"></i>
                        Ambulancia por accidente:
                    </label>
                    <input type="text" id="apMuerteCausa1" name="value_limit_insured[]" placeholder="USD"
                        @isset($slip->limit_insured[5])
                value="{{ $slip->limit_insured[5]->value_limit_insured }}"
                @endisset>
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
                <input type="text" id="apBaseCobertura" name="coverage_foundation"
                    value="{{ $slip_type->coverage_foundation }}">
            </div>
        </div>

    </div>

    <div class="form_group2">
        {{-- Clausulas adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Clausulas Adicionales</h3>

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

                    @if (count($slip->clause_aditional) > 0)
                        @foreach ($slip->clause_aditional as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <textarea name="description_clause_additional[]">{{ $item->description_clause_additional }}</textarea>
                                </td>
                                <td>
                                    <input type="text" placeholder="..." name="clause_additional_additional[]"
                                        value="{{ $item->clause_additional_additional }}">
                                </td>
                                <td>
                                    <input type="number" placeholder="0" name="clause_additional_usd[]"
                                        value="{{ $item->clause_additional_usd }}">
                                </td>
                                <td>
                                    <input type="text" placeholder="..." name="clause_additional_additional2[]"
                                        value="{{ $item->clause_additional_additional2 }}">
                                </td>
                                <td></td>
                            </tr>
                        @endforeach
                    @else
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
                    @endif

                </tbody>

            </table>
        </div>

    </div>

    <div class="form_group3">
        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Exclusiones</h3>

        @include('admin.tecnico.slip.slips_generales.exclusiones')
    </div>

    <div class="form_group4">
        {{-- Deducibles --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Deducibles</h3>

        {{-- Muerte por cualquier causa --}}
        <div class="flexColumnCenterContainer">
            <h4 class="slipTitle">Muerte Por Cualquier Causa:</h4>
            <div class="flexRowWrapContainer" style="margin:1.2rem 0">
                <div class="labelStyleContainer">
                    <p>
                        <i class="fa-solid fa-percent"></i>
                        valor del siniestro
                    </p>
                    <input type="number" style="max-width:95px;text-align: end;" placeholder="%"
                        name="sinister_value[]" min="0"
                        @isset($slip->deductible[0])
                    value="{{ $slip->deductible[0]->sinister_value }}"
                    @endisset>
                </div>
                <div class="labelStyleContainer">
                    <p>
                        <i class="fa-solid fa-percent"></i>
                        valor asegurado
                    </p>
                    <input type="number" placeholder="%" name="insured_value[]" min="0"
                        style="max-width:95px;text-align: end;"
                        @isset($slip->deductible[0])
                    value="{{ $slip->deductible[0]->insured_value }}"
                    @endisset>
                </div>
                <div class="labelStyleContainer">
                    <input type="number" name="minimum[]" style="text-align:end" placeholder="..."
                        @isset($slip->deductible[0])
                    value="{{ $slip->deductible[0]->minimum }}"
                    @endisset>
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
                        name="sinister_value[]" min="0"
                        @isset($slip->deductible[1])
                    value="{{ $slip->deductible[1]->sinister_value }}"
                    @endisset>
                </div>
                <div class="labelStyleContainer">
                    <p>
                        <i class="fa-solid fa-percent"></i>
                        valor asegurado
                    </p>
                    <input type="number" placeholder="%" name="insured_value[]" min="0"
                        style="max-width:95px;text-align: end;"
                        @isset($slip->deductible[1])
                    value="{{ $slip->deductible[1]->insured_value }}"
                    @endisset>
                </div>
                <div class="labelStyleContainer">
                    <input type="number" name="minimum[]" style="text-align:end" placeholder="..."
                        @isset($slip->deductible[1])
                    value="{{ $slip->deductible[1]->minimum }}"
                    @endisset>
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
                    <input type="number" placeholder="%" name="insured_value[]" min="0"
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
                    <input type="number" placeholder="%" name="insured_value[]" min="0"
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
                    <input type="number" placeholder="%" name="insured_value[]" min="0"
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
                    <input type="number" placeholder="%" name="insured_value[]" min="0"
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

</form>
