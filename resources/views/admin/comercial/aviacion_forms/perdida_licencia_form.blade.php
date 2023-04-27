<style>
    hr {
        background-color: darkgrey;
        width: 70%
    }

    .select2 {
        max-width: min-content;
    }

    .select2-container--default .select2-selection--single {
        height: 2.35rem;
    }

    /* .select2-container--open .select2-dropdown--below {
    margin-top: 1.3rem;
} */

    form select {
        background: transparent;
    }
</style>
<link rel="stylesheet" href="{{ asset('css/admin/comercial/compromisos.css') }}">
<script src="{{ asset('js/admin/comercial/compromiso.js') }}" defer></script>


{{-- TODO: bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

{{-- david --}}

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('js/admin/comercial/ajax.js') }}" defer></script>
@if (\Illuminate\Support\Str::contains(\Illuminate\Support\Facades\Request::url(), '/admin/comercial/edit_compromiso/'))
<script>
    const pilotos_raw = "{{$pilotos}}";
    let pilotos;
    fetch(`data:application/*;base64,${pilotos_raw}`).then(base64 => base64.blob()).then(blob => {
        pilotos = URL.createObjectURL(blob)
        const anchor = document.getElementById('pilotosDownload')
        if (anchor) {
            anchor.href = pilotos
            anchor.download = 'vida_siniestralidad_previa.{{$pilotosExtension}}'
        }
    });

    const signedForm_raw = "{{$signedForm}}";
    let signedForm;
    fetch(`data:application/*;base64,${signedForm_raw}`).then(base64 => base64.blob()).then(blob => {
        signedForm = URL.createObjectURL(blob)
        const anchor = document.getElementById('signedFormDownload')
        if (anchor) {
            anchor.href = signedForm
            anchor.download = 'vida_siniestralidad_previa.{{$signedFormExtension}}'
        }
    });


    const medicTest_raw = "{{$medicTest}}";
    let medicTest;
    fetch(`data:application/*;base64,${medicTest_raw}`).then(base64 => base64.blob()).then(blob => {
        medicTest = URL.createObjectURL(blob)
        const anchor = document.getElementById('medicTestDownload')
        if (anchor) {
            anchor.href = medicTest
            anchor.download = 'vida_siniestralidad_previa.{{$medicTestExtension}}'
        }
    });
</script>

<div class="card px-4 py-2">
    <form enctype="multipart/form-data" method="POST" action="{{ route('slip.update', $slip->id) }}" id="aviacion_2_form">
        @method('PUT')

        @csrf
        <input type="hidden" name="type_slip" value="aviacion_2_form">
        <input hidden type="number" name="slip_status" value="3">


        @include('admin.comercial.include.person_index')

        <div class="row my-3">
            <div class="col-md-6">

                <div class="input-group mb-3">
                    <label class="input-group-text" for="tecnico">Asignar t&eacute;cnico</label>
                    <select class="js-example-basic-single inputForm select_assigned form-select" name="user_id">
                        <option selected value="{{ $users->find($slip->user_id)->id }}">
                            {{ $users->find($slip->user_id)->name . ' ' . $users->find($slip->user_id)->surname }}</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <label class="lead">Tabla objeto(s) del seguro</label>
            <hr>
        </div>

        <div class="row">
            <div class="tableContainer mb-4">
                @include('admin.comercial.include.tablePilotosAviacion')
            </div>

            <div class="row my-2">
                <div class="col-md-6">
                    <div class="input-group">
                        <label for="" class="input-group-text">Suma Asegurada</label>
                        <input type="number" step="any" name="suma_asegurada_lol">
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input class="form-control" type="file" name="pilotos" hidden="true" id="pilotos" accept="application/*">
                    <label class="input-group-text" hidden="true" for="pilotos" id="pilotosFileLabel">Detalle de pilotos asegurados
                    </label>
                    @if ($pilotos)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="pilotosDownload">Detalle de pilotos asegurados - Previo</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="togglepilotos()" id="pilotosFileToggle">Modificar</button>
                    <script>
                        let toggledpilotosFile = false;
                        const pilotosInput = document.getElementById('pilotos');
                        const pilotosDownload = document.getElementById('pilotosDownload');
                        const pilotosLabel = document.getElementById('pilotosFileLabel');
                        const pilotosToggle = document.getElementById('pilotosFileToggle');

                        function togglepilotos() {
                            toggledpilotosFile = !toggledpilotosFile;
                            pilotosInput.hidden = !toggledpilotosFile;
                            pilotosDownload.hidden = toggledpilotosFile;
                            pilotosLabel.hidden = !toggledpilotosFile;
                            pilotosToggle.textContent = toggledpilotosFile ? 'Usar previo' : 'Modificar'
                            if (toggledpilotosFile) pilotosInput.click()
                        }
                    </script>
                    @else<input type="file" name="pilotos" id="pilotos" class="form-control">
                    <label for="pilotos" class="input-group-text">Detalle de pilotos asegurados</label>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="insuredSum">Límite de indemnización</label>
                    <input type="text" value="{{ $slip->limit_compensation }}" placeholder="..." name="limit_compensation">
                </div>
            </div>
        </div>

        <div class="row">
            <label class="lead">Coberturas adicionales</label>
            <hr style="background-color: darkgrey; width: 70%">
        </div>

        <div class="row">
            @include('admin.comercial.include.edit_tablePilotosCoberturas')
        </div>

        <div class="row">
            <label class="lead">Cláusulas adicionales</label>
            <hr style="background-color: darkgrey; width: 70%">
        </div>

        <div class="row">
            @include('admin.comercial.include.edit_tablaClausulas')
        </div>

        <label for="" style="max-width:300px" class="lead">Tasa/Prima</label>
        <hr style="background-color:darkgrey;width:70%;">

        <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="reinsurer_rate">Tasa de reaseguros</label>
                    <input type="number" step="any" name="reinsurer_rate" id="reinsurer_rate" value="{{ $slip->reinsurer_rate }}"><span class="input-group-text">%</span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="deducible">Prima de reaseguros</label>
                    <input type="number" step="any" data-money placeholder="USD" name="reinsurance_premium" value="{{ $slip->reinsurance_premium }}">
                </div>
            </div>
        </div>


        <div class="row">
            <label class="lead">Deducibles</label>
            <hr style="background-color: darkgrey; width: 70%">
        </div>

        @include('admin.comercial.include.edit_deducibles')

        @include('admin.comercial.include.leyJurisdiccion')

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input class="form-control" type="file" name="signedForm" hidden="true" id="signedForm" accept="application/*">
                    <label class="input-group-text" hidden="true" for="signedForm" id="signedFormFileLabel">Formulario de cotización relleno y
                        firmado
                    </label>
                    @if ($signedForm)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="signedFormDownload">Formulario de cotización relleno y
                        firmado - Previo</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="togglesignedForm()" id="signedFormFileToggle">Modificar</button>
                    <script>
                        let toggledsignedFormFile = false;
                        const signedFormInput = document.getElementById('signedForm');
                        const signedFormDownload = document.getElementById('signedFormDownload');
                        const signedFormLabel = document.getElementById('signedFormFileLabel');
                        const signedFormToggle = document.getElementById('signedFormFileToggle');

                        function togglesignedForm() {
                            toggledsignedFormFile = !toggledsignedFormFile;
                            signedFormInput.hidden = !toggledsignedFormFile;
                            signedFormDownload.hidden = toggledsignedFormFile;
                            signedFormLabel.hidden = !toggledsignedFormFile;
                            signedFormToggle.textContent = toggledsignedFormFile ? 'Usar previo' : 'Modificar'
                            if (toggledsignedFormFile) signedFormInput.click()
                        }
                    </script>
                    @else<input type="file" name="signedForm" id="signedForm" class="form-control">
                    <label for="signedForm" class="input-group-text">Formulario de cotización relleno y
                        firmado</label>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input class="form-control" type="file" name="medicTest" hidden="true" id="medicTest" accept="application/*">
                    <label class="input-group-text" hidden="true" for="medicTest" id="medicTestFileLabel">Exámenes médicos
                    </label>
                    @if ($medicTest)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="medicTestDownload">Exámenes médicos - Previo</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="togglemedicTest()" id="medicTestFileToggle">Modificar</button>
                    <script>
                        let toggledmedicTestFile = false;
                        const medicTestInput = document.getElementById('medicTest');
                        const medicTestDownload = document.getElementById('medicTestDownload');
                        const medicTestLabel = document.getElementById('medicTestFileLabel');
                        const medicTestToggle = document.getElementById('medicTestFileToggle');

                        function togglemedicTest() {
                            toggledmedicTestFile = !toggledmedicTestFile;
                            medicTestInput.hidden = !toggledmedicTestFile;
                            medicTestDownload.hidden = toggledmedicTestFile;
                            medicTestLabel.hidden = !toggledmedicTestFile;
                            medicTestToggle.textContent = toggledmedicTestFile ? 'Usar previo' : 'Modificar'
                            if (toggledmedicTestFile) medicTestInput.click()
                        }
                    </script>
                    @else<input type="file" name="medicTest" id="medicTest" class="form-control">
                    <label for="medicTest" class="input-group-text">Exámenes médicos</label>
                    @endif
                </div>
            </div>
        </div>


        <div style="float:right;" class="row">
            <p>
            <div class="col-md">
                <button type="submit" id="submitBtn" class="btn btn-info mx-2" style="color: white">Enviar a dpto.
                    Técnico</button>

            </div>
            </p>
        </div>

    </form>
</div>
@else
<form enctype="multipart/form-data" method="POST" id="aviacion_2_form" class="form aviacion2" style="display: none">

    @csrf
    <input type="hidden" name="type_slip" value="aviacion_2_form">
    <input hidden type="number" name="slip_status" value="3">

    <!-- One "tab" for each step in the form: -->
    <div class="tab">
        @include('admin.comercial.include.person_index')

        <div class="row my-3">
            <div class="col-md-6">

                <div class="input-group mb-3">
                    <label class="input-group-text" for="tecnico">Asignar t&eacute;cnico</label>

                    <select class="js-example-basic-single inputForm select_assigned form-select" name="user_id">
                    </select>

                </div>
            </div>
        </div>

        <div class="row mb-3">
            <label class="lead">Tabla objeto(s) del seguro</label>
            <hr>
        </div>

        <div class="row">
            <div class="tableContainer mb-4">
                <table id="aviacion_licenciaTableObjetosSeguro" class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center">Número</th>
                            <th style="text-align: center">Nombre</th>
                            <th style="text-align: center">Tipo</th>
                            <th style="text-align: center">Fecha de nacimiento</th>
                            <th style="text-align: center">Edad</th>
                            <th style="text-align: center">Suma Asegurada</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">
                                <button type="button" onclick="addRowObjetoSeguroV2(event, 'aviacion_licencia')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>

                    <tbody id="aviacion_licenciaObjetosTableBody">
                        <tr>
                            <td style="text-align: center">
                                <span>1</span>
                            </td>
                            <td style="text-align: center">
                                <input type="text" name="name[]">
                            </td>
                            <td style="text-align: center">
                                <select name="person_type">
                                    <option value="" selected>Seleccionar</option>
                                    <option value="Piloto">Piloto</option>
                                    <option value="Tripulante">Tripulante</option>
                                </select>
                            </td>

                            <td style="text-align: center">
                                <input type="date" class="birthdateInput" name="birthday[]" onchange="putAge('aviacion_licenciaTableObjetosSeguro')">
                            </td>
                            <td style="text-align: center">
                                <input type="number" step="any" name="age[]" class="ageInput">
                            </td>
                            <td style="text-align: center">
                                <input type="number" class="col1" data-money step="any"onkeyup="sumaAviacion(1, 1, 'aviacion_licenciaTableObjetosSeguro')"  name="limit[]">
                            </td>
            
                            <td></td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td></td>
                            <td style="text-align: center" class="slipTitle">Total</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: center">
                                <span class="slipTitle" id="colTotal1">0</span>$
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <label for="" class="input-group-text">Suma Asegurada LOL</label>
                        <input type="number" step="any" name="suma_asegurada_lol" id="suma_asegurada_lol">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab">

        <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="pilotos">Detalle de pilotos asegurados</label>
                    <input type="file" placeholder="..." name="pilotos" id="pilotos">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="insuredSum">Límite de indemnización</label>
                    <input type="text" placeholder="..." name="limit_compensation">
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <label class="lead">Coberturas adicionales</label>
            <hr>
        </div>

        <div class="row">
            <div class="tableContainer" style="margin: 2rem 0">
                <table id="aviacion_licenciaCoberturasAdicionalesTable" class="indemnizacionTable">
                    <caption>No olvidar de llenar mínimo una cobertura.</caption>
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Coberturas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">Suma Asegurada</th>
                            <th style="text-align: center">No. Asegurados</th>
                            <th style="text-align: center">Total Valor Asegurado</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowCoberturaV3(event, 'aviacion_licencia', 'aviacion', 'pl')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="aviacion_licenciaCoberturasAdicionalesTableBody">

                        <tr>
                            <td>1</td>
                            <td>
                                <select name="description_coverage_additional[]" class="selectCobertura">
                                    <option selected disabled>Seleccionar</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" placeholder="..." name="coverage_additional_additional[]">
                            </td>
                            <td>
                                <input type="number" step="any" placeholder="0" name="coverage_additional_usd[]" data-money>
                            </td>
                            <td>
                                <input type="text" placeholder="..." name="coverage_additional_additional2[]">
                            </td>
                            <td>
                                <input onkeyup="actualizarTotalAsegurado(1, 'aviacion_licenciaCoberturasAdicionalesTable')" name="sum_assured[]" class="row1" type="number" step="any" >
                            </td>
                            <td>
                                <input onkeyup="actualizarTotalAsegurado(1, 'aviacion_licenciaCoberturasAdicionalesTable')" name="pilots_quantity[]" class="row1" type="number" step="any" >
                            </td>
                            <td>
                                <input onkeyup="actualizarTotalAsegurado(1, 'aviacion_licenciaCoberturasAdicionalesTable')" name="total_assured[]" class="rowTotal1" type="number" step="any" >
                            </td>
                        </tr> 

                    </tbody>

                </table>
            </div>
        </div>

        <div class="row mb-3">
            <label class="lead">Cláusulas adicionales</label>
            <hr>
        </div>

        <div class="row">
            <div class="tableContainer" style="margin: 2rem 0">
                <table id="aviacion_licenciaClausulasAdicionalesTable" class="indemnizacionTable">
                    <caption>No olvidar de llenar mínimo una cláusula.</caption>
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Cláusulas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowClausula(event, 'aviacion_licencia', 'aviacion', 'pl')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="aviacion_licenciaClausulasAdicionalesTableBody">

                        <tr>
                            <td>1</td>
                            <td>
                                <select name="description_clause_additional[]" class="selectClausula">
                                    <option selected disabled>Seleccionar</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" placeholder="..." name="clause_additional_additional[]">
                            </td>
                            <td>
                                <input type="number" step="any" placeholder="0" name="clause_additional_usd[]" data-money>
                            </td>
                            <td>
                                <input type="text" placeholder="..." name="clause_additional_additional2[]">
                            </td>
                        </tr>

                    </tbody>

                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="reinsurer_rate">Tasa de reaseguros</label>
                    <input class="inputForm" type="number" step="any" name="reinsurer_rate" id="reinsurer_rate"><span class="input-group-text">%</span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="deducible">Prima de reaseguros</label>
                    <input class="inputForm" type="number" step="any" placeholder="USD" name="reinsurance_premium" data-money>
                </div>
            </div>
        </div>



        <div class="row">
            <label class="lead">Deducibles</label>
            <hr style="background-color: darkgray">
        </div>
        <div id="aviacion_perdidaDeduciblesContainer" class="row">
            <div class="flexColumnCenterContainer" style="margin:1rem 0">
                {{-- <div class="flexRowWrapContainer" style="margin:1.2rem 0"> --}}
                <div class="d-flex mb-2">
                    <div class="input-group">
                        <input class="form-control" type="text" name="description_deductible[]" placeholder="Detalle..">
                        <input class="form-control" type="number" min="0" max="100" step="any" placeholder="%" name="sinister_value[]" min="0">
                        <span class="input-group-text">valor del siniestro</span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">%</span>
                        <input class="form-control" type="number" min="0" max="100" step="any" name="insured_value[]">
                        <span class="input-group-text">del valor asegurado</span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">mínimo</span>
                        <input class="form-control" type="text" name="minimum[]" placeholder="...">
                        <textarea rows="1" type="text" name="description2_deductible[]" placeholder="Descripción del deducible..."></textarea>
                    </div>



                </div>
            </div>
        </div>
        <div class="row col-md-4 mb-4" style="margin-inline: .1rem">
            <button type="button" class="btn btn-info" style="color: white" onclick="addDeducible(event, 'aviacion_perdida')">Agregar deducible</button>
        </div>

    </div>

    <div class="tab">
        @include('admin.comercial.include.leyJurisdiccion')

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="signedForm">Formulario de cotización relleno y
                        firmado</label>
                    <input class="inputForm" type="file" name="signedForm" id="signedForm">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label for="medicTest" class="input-group-text">Exámenes médicos</label>
                    <input type="file" name="medicTest" id="medicTest">
                </div>
            </div>
        </div>

    </div>
    <div>
        <div style="float:right;" class="row">
            <div class="input-group mb-3">
                <div class="col-md">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-info mx-2" style="color: white">Atrás</button>
                    {{-- <button type="button" id="submitBtn" class="submitButton" onclick="submitForm('vida_form')"
                            style="display: none">Guardar</button> --}}
                </div>
                <div class="col-md">
                    <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-info mx-2" style="color: white">Siguiente</button>

                    <button type="submit" id="submitBtn" style="display: none" class="btn btn-info mx-2" onclick="jqsubmit()" style="color: white">Enviar</button>

                </div>
            </div>
        </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
</form>
@endif
