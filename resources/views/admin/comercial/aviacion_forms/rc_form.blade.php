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
    const crFormSigned_raw = "{{$crFormSigned}}";
    let crFormSigned;
    fetch(`data:application/*;base64,${crFormSigned_raw}`).then(base64 => base64.blob()).then(blob => {
        crFormSigned = URL.createObjectURL(blob)
        const anchor = document.getElementById('crFormSignedDownload')
        if (anchor) {
            anchor.href = crFormSigned
            anchor.download = 'vida_siniestralidad_previa.{{$crFormSignedExtension}}'
        }
    });
</script>
<div class="card py-4 px-2">
    <form enctype="multipart/form-data" method="POST" action="{{ route('slip.update', $slip->id) }}" id="aviacion_3_form">

        @csrf
        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
        <input type="hidden" name="type_slip" value="aviacion_3_form">
        <input hidden type="number" name="slip_status" value="3">
        {{-- <input type="hidden" name="type_coverage" value="8"> --}} {{-- valor temporal --}}

        @include('admin.comercial.include.object_index')



        <div class="row mt-3">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="insuredSum">Límite de indemnización</label>
                    <input type="text" placeholder="..." name="limit_compensation" value="{{ $slip->limit_compensation }}">
                </div>
            </div>
        </div>

        <div class="row">
            <label class="lead">Coberturas adicionales</label>
            <hr style="background-color: darkgrey; width: 70%">
        </div>

        <div class="row">
            @include('admin.comercial.include.edit_tablaCoberturas')
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

        <div class="row">


            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input class="form-control" type="file" name="crFormSigned" hidden="true" id="crFormSigned" accept="application/*">
                    <label class="input-group-text" hidden="true" for="crFormSigned" id="crFormSignedFileLabel">Formulario de cotización
                    </label>
                    @if ($crFormSigned)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="crFormSignedDownload">Formulario de cotización - Previo</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="togglecrFormSigned()" id="crFormSignedFileToggle">Modificar</button>
                    <script>
                        let toggledcrFormSignedFile = false;
                        const crFormSignedInput = document.getElementById('crFormSigned');
                        const crFormSignedDownload = document.getElementById('crFormSignedDownload');
                        const crFormSignedLabel = document.getElementById('crFormSignedFileLabel');
                        const crFormSignedToggle = document.getElementById('crFormSignedFileToggle');

                        function togglecrFormSigned() {
                            toggledcrFormSignedFile = !toggledcrFormSignedFile;
                            crFormSignedInput.hidden = !toggledcrFormSignedFile;
                            crFormSignedDownload.hidden = toggledcrFormSignedFile;
                            crFormSignedLabel.hidden = !toggledcrFormSignedFile;
                            crFormSignedToggle.textContent = toggledcrFormSignedFile ? 'Usar previo' : 'Modificar'
                            if (toggledcrFormSignedFile) crFormSignedInput.click()
                        }
                    </script>
                    @else<input type="file" name="crFormSigned" id="crFormSigned" class="form-control">
                    <label for="crFormSigned" class="input-group-text">Formulario de cotización</label>
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
<form enctype="multipart/form-data" method="POST" id="aviacion_3_form" class="form aviacion3" style="display: none">

    @csrf
    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
    <input type="hidden" name="type_slip" value="aviacion_3_form">
    <input hidden type="number" name="slip_status" value="3">
    {{-- <input type="hidden" name="type_coverage" value="8"> --}} {{-- valor temporal --}}

    <div class="tab">

        <div class="row">
            @include('admin.comercial.include.object_index')

        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="input-group ">
                    <label class="input-group-text" for="insuredSum">Límite de indemnización</label>
                    <input type="text" placeholder="..." name="limit_compensation">
                </div>
            </div>
        </div>
    </div>

    <div class="tab">
        <div class="row mb-3">
            <label class="lead">Coberturas adicionales</label>
            <hr>
        </div>

        <div class="row">
            <div class="tableContainer" style="margin: 2rem 0">
                <table id="aviacion_rcCoberturasAdicionalesTable" class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Coberturas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowCoberturaV2(event, 'aviacion_rc', 'aviacion', 'pl')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="aviacion_rcCoberturasAdicionalesTableBody">

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
                <table id="aviacion_rcClausulasAdicionalesTable" class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Cláusulas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowClausula(event, 'aviacion_rc', 'aviacion', 'pl')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="aviacion_rcClausulasAdicionalesTableBody">

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
            <div class="flexColumnCenterContainer" style="margin:1rem 0">
                <label class="lead">Deducibles</label>
                <hr style="background-color: darkgray">
            </div>
        </div>
        <div id="aviacion_rcrcDeduciblesContainer" class="row">
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
            <button type="button" class="btn btn-info" style="color: white" onclick="addDeducible(event, 'aviacion_rcrc')">Agregar deducible</button>
        </div>

    </div>

    <div class="tab">

        @include('admin.comercial.include.leyJurisdiccion')

        <div class="row">


            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="crFormSigned">Formulario de cotización</label>
                    <input class="inputForm" type="file" name="" id="">
                </div>
            </div>
        </div>
    </div>

    <div>
        <div style="float:right;" class="row">
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
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
</form>
@endif
