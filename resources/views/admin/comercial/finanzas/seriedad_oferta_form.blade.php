{{-- Seriedad de oferta && Cumplimiento de contrato && Buen uso de anticipo && Ejecucion de obra y buena calidad de materiales && garantías aduaneras && Otras garantías --}}
@section('tab_title')
<div id="date"></div>
<script>
    function updateClock() {
        const months = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre',
            'octubre', 'noviembre', 'diciembre'
        ];
        const days = ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'];

        const now = new Date();
        const day = days[now.getDay()];
        const date = now.getDate();
        const month = months[now.getMonth()];
        const year = now.getFullYear();
        const hour = now.getHours().toString().padStart(2, '0');
        const minute = now.getMinutes().toString().padStart(2, '0');
        const second = now.getSeconds().toString().padStart(2, '0');

        const dateString =
            `Comercial — Editar Compromiso | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
        document.getElementById('date').textContent = dateString;
    }
    setInterval(updateClock, 1000);
</script>
@endsection

@if (\Illuminate\Support\Str::contains(\Illuminate\Support\Facades\Request::url(), '/admin/comercial/edit_compromiso/'))
<script>
    const sourceDoc_raw = "{{$sourceDoc}}";
    let sourceDoc;
    fetch(`data:application/*;base64,${sourceDoc_raw}`).then(base64 => base64.blob()).then(blob => {
        sourceDoc = URL.createObjectURL(blob)
        const anchor = document.getElementById('sourceDocDownload')
        if (anchor) {
            anchor.href = sourceDoc
            anchor.download = 'vida_siniestralidad_previa.{{$sourceDocExtension}}'
        }
    });
</script>
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

{{-- david --}}

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('js/admin/comercial/ajax.js') }}" defer></script>

    <div class="card px-4 py-2">
        <form enctype="multipart/form-data" method="POST" action="{{ route('slip.update', $slip->id) }}"  id="finanzas_2_form">
            @method('PUT')
            @csrf
            <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
            <input type="hidden" name="type_slip" value="finanzas_2_form">
            <input hidden type="number" name="slip_status" value="3">

            @include('admin.comercial.include.object_index')

            <div class="row">
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <label for="obligationGuarantee" class="input-group-text">Obligación a garantizar</label>
                        <textarea name="unsecured_obligation" id="" cols="30" rows="10">{{$slip_type->unsecured_obligation}}</textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <label for="entrenched" class="input-group-text">Afianzado</label>
                        <input value="{{$slip_type->entrenched}}" placeholder="Afianzado..." name="entrenched">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <label for="recipient" class="input-group-text">Beneficiario</label>
                        <input value="{{$slip_type->beneficiary}}" placeholder="Beneficiario..." name="beneficiary">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <label for="financeType" class="input-group-text">Tipo de fianza</label>
                        <input value="{{$slip_type->type_fianza}}" placeholder="Tipo de finanza..." name="type_fianza" class="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <label for="financeAmount" class="input-group-text">Monto de fianza</label>
                        <input value="{{$slip_type->mount_fianza}}" placeholder="123456" name="mount_fianza" type="number" step="any"
                            data-money>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="input-group-text">Vigencia fianza</h5>
                    <div class="d-flex flex-column">
                        <div class="input-group mb-3">
                            <label for="from_date" class="input-group-text">Desde</label>
                            <input value="{{$slip_type->from_date_mount_fianza}}" type="date" name="from_date_mount_fianza">
                        </div>
                        <div class="input-group">
                            <label for="to_date" class="input-group-text">Hasta</label>
                            <input value="{{$slip_type->to_date_mount_fianza}}" type="date" name="to_date_mount_fianza">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <label for="contractAmount" class="input-group-text">Monto contrato</label>
                        <input value="{{$slip_type->mount_contract}}" placeholder="123456" name="mount_contract" type="number" step="any"
                            data-money>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="input-group-text">Vigencia del contrato</h5>
                    <div class="d-flex flex-column">
                        <div class="input-group mb-3">
                            <label for="contract_from_date" class="input-group-text">Desde</label>
                            <input value="{{$slip_type->from_date_mount_contract}}" type="date" name="from_date_mount_contract">
                        </div>
                        <div class="input-group mb-3">
                            <label for="contract_to_date" class="input-group-text">Hasta</label>
                            <input value="{{$slip_type->to_date_mount_contract}}" type="date" name="to_date_mount_contract">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10">
                    <div class="input-group mb-3">
                        <label for="contractPercentage" class="input-group-text">Porcentaje del contrato que cubre la
                            fianza</label>
                        <input value="{{$slip_type->contract_percentage}}" placeholder="0" min="0" name="contract_percentage" type="number" step="any">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>

            <label for="" class="lead">Coberturas adicionales</label>
            <hr style="background-color: darkgrey; width: 70%">

            <div class="row">
                @include('admin.comercial.include.edit_tablaCoberturas')
            </div>

            <label class="lead">Cláusulas adicionales</label>
            <hr style="background-color: darkgrey; width: 70%">
            
            <div class="row">
                @include('admin.comercial.include.edit_tablaClausulas')
            </div>

            <label for="" style="max-width:300px" class="lead">Tasa/Prima</label>
            <hr style="background-color:darkgrey;width:70%;">

            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="reinsurer_rate">Tasa de reaseguros</label>
                        <input type="number" step="any" name="reinsurer_rate"
                            id="reinsurer_rate" value="{{ $slip->reinsurer_rate }}"><span class="input-group-text">%</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="deducible">Prima de reaseguros</label>
                        <input type="number" step="any" data-money placeholder="USD"
                            name="reinsurance_premium" value="{{ $slip->reinsurance_premium }}">
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
                <div class="col-md-12">
                    <div class="sentenceInput">
                        <ol style="list-style-type:upper-roman;">
                            <li class="my-2">
                                <h4 style="text-align: center; text-transform: uppercase">Condiciones de reafianzamiento
                                </h4>
                                <ul>
                                    <li>Retención neta de la cedente y monto cedido a contrato</li>
                                    <li>Monto propuesto al reasegurador</li>
                                    <li>Comisión de Reafianzamiento</li>
                                    <li>En caso de colocarse totalmente en forma facultativa, indicar la razón</li>
                                </ul>
                            </li>
                            <li class="my-2">
                                <h4 style="text-align: center; text-transform: uppercase">antecedentes del afianzado</h4>
                                <ul>
                                    <li>Giro</li>
                                    <li>Dirección</li>
                                    <li>Pertenecen a algún grupo económico</li>
                                    <li>Cúmulo de responsabilidades vigentes que tenga la cedente con el afianzado como
                                        consecuencia de fianzas anteriores</li>
                                    <li>Cúmulo de responsabilidades vigentes real cedido a contrato</li>
                                    <li>Información de la experiencia o trayectoria del afianzado</li>
                                    <li>Desde cuando es afianzado de la Compañía Cedente</li>
                                </ul>
                            </li>
                            <li class="my-2">
                                <h4 style="text-align: center; text-transform: uppercase">Contragarantías</h4>
                                <ul>
                                    <li>Detalle de las contragarantías</li>
                                </ul>
                            </li>
                            <li class="my-2">
                                <h4 style="text-align: center; text-transform: uppercase">Información financiera</h4>
                                <ul>
                                    <li>Estados financieros del afianzado y en su caso, del obligado solidario de los
                                        últimos 3 años</li>
                                </ul>
                            </li>
                            <li class="my-2">
                                <h4 style="text-align: center; text-transform: uppercase">Anexos</h4>
                                <ul>
                                    <li class="my-2">

                                        <div class="input-group">

                                            @if ($sourceDoc)
                                            <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="sourceDocDownload">Documento fuente</a>
                                            <button type="button" class="btn btn-info" style="color: white" onclick="toggleInputs()" id="sourceDocFileToggle">Modificar</button>
                                            <script>
                                                let toggledsourceDocFile = false;
                                                const sourceDocInput = document.getElementById('sourceDoc');
                                                const sourceDocDownload = document.getElementById('sourceDocDownload');
                                                const sourceDocLabel = document.getElementById('sourceDocFileLabel');
                                                const sourceDocToggle = document.getElementById('sourceDocFileToggle');
                        
                                                function toggleInputs() {
                                                    toggledsourceDocFile = !toggledsourceDocFile;
                                                    sourceDocInput.hidden = !toggledsourceDocFile;
                                                    sourceDocDownload.hidden = toggledsourceDocFile;
                                                    sourceDocLabel.hidden = !toggledsourceDocFile;
                                                    sourceDocToggle.textContent = toggledsourceDocFile ? 'Usar previo' : 'Modificar'
                                                    if (toggledsourceDocFile) sourceDocInput.click()
                                                }
                                            </script>
                                            @else
                                            <input class="form-control" type="file" name="sourceDoc" id="sourceDoc" accept="application/*">
                                            <label class="input-group-text" for="sourceDoc">Documento fuente
                                            </label>
                                            @endif
                                            

                                        </div>



                                    </li>
                                    <li class="my-2">
                                        <div class="input-group">
                                            <label for="bailText" class="input-group-text">Texto de la fianza</label>
                                            <input value="{{$slip_type->bailText}}" type="text" name="bailText" id="bailText">
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div>
                <div style="float:right;" class="row">
                    <div class="input-group mb-3">
                        <div class="col-md">
                            <button type="submit" id="submitBtn" class="btn btn-info mx-2"
                                style="color: white">Enviar al dpto. Técnico</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@else
    
@endif


<form enctype="multipart/form-data" method="POST" enctype="multipart/form-data" id="finanzas_2_form" class="form fianzas2"
    style="display: none">
    @csrf
    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
    <input type="hidden" name="type_slip" value="finanzas_2_form">
    <input hidden type="number" name="slip_status" value="3">
    <div class="tab">
        
        @include('admin.comercial.include.object_index')

        <div class="row">
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <label for="obligationGuarantee" class="input-group-text">Obligación a garantizar</label>
                    <textarea name="unsecured_obligation" id="" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <label for="entrenched" class="input-group-text">Afianzado</label>
                    <input placeholder="Afianzado..." name="entrenched">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <label for="recipient" class="input-group-text">Beneficiario</label>
                    <input placeholder="Beneficiario..." name="beneficiary">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <label for="financeType" class="input-group-text">Tipo de fianza</label>
                    <input placeholder="Tipo de finanza..." name="type_fianza" class="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <label for="financeAmount" class="input-group-text">Monto de fianza</label>
                    <input placeholder="123456" name="mount_fianza" type="number" step="any"
                        data-money>
                </div>
            </div>
            <div class="col-md-4">
                <h5 class="input-group-text">Vigencia fianza</h5>
                <div class="d-flex flex-column">
                    <div class="input-group mb-3">
                        <label for="from_date" class="input-group-text">Desde</label>
                        <input type="date" name="from_date_mount_fianza">
                    </div>
                    <div class="input-group">
                        <label for="to_date" class="input-group-text">Hasta</label>
                        <input type="date" name="to_date_mount_fianza">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <label for="contractAmount" class="input-group-text">Monto contrato</label>
                    <input placeholder="123456" name="mount_contract" type="number" step="any"
                        data-money>
                </div>
            </div>
            <div class="col-md-4">
                <h5 class="input-group-text">Vigencia del contrato</h5>
                <div class="d-flex flex-column">
                    <div class="input-group mb-3">
                        <label for="contract_from_date" class="input-group-text">Desde</label>
                        <input type="date" name="from_date_mount_contract">
                    </div>
                    <div class="input-group mb-3">
                        <label for="contract_to_date" class="input-group-text">Hasta</label>
                        <input type="date" name="to_date_mount_contract">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                <div class="input-group mb-3">
                    <label for="contractPercentage" class="input-group-text">Porcentaje del contrato que cubre la
                        fianza</label>
                    <input placeholder="0" min="0" name="contract_percentage" type="number" step="any">
                    <span class="input-group-text">%</span>
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
                <table id="fianzas_seriedadCoberturasAdicionalesTable" class="indemnizacionTable">
                    <caption>No olvidar de llenar mínimo una cobertura.</caption>
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Coberturas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                                colspan="1" aria-label="Add row">

                                <button type="button"
                                    onclick="addRowCoberturaV2(event, 'fianzas_seriedad','fianzas', 'fidelidad')"
                                    class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="fianzas_seriedadCoberturasAdicionalesTableBody">

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
                                <input type="number" step="any" placeholder="0"
                                    name="coverage_additional_usd[]" data-money>
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
                <table id="fianzas_seriedadClausulasAdicionalesTable" class="indemnizacionTable">
                    <caption>No olvidar de llenar mínimo una cláusula.</caption>
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Cláusulas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                                colspan="1" aria-label="Add row">

                                <button type="button"
                                    onclick="addRowClausula(event, 'fianzas_seriedad','fianzas', 'fidelidad')"
                                    class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="fianzas_seriedadClausulasAdicionalesTableBody">

                        <tr>
                            <td>1</td>
                            <td>
                                <select name="description_clause_additional[]"class="selectClausula">
                                    <option selected disabled>Seleccionar</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" placeholder="..." name="clause_additional_additional[]">
                            </td>
                            <td>
                                <input type="number" step="any" placeholder="0" name="clause_additional_usd[]"
                                    data-money>
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
                    <input class="inputForm" type="number" step="any" name="reinsurer_rate"
                        id="reinsurer_rate"><span class="input-group-text">%</span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="deducible">Prima de reaseguros</label>
                    <input class="inputForm" type="number" step="any" placeholder="USD"
                        name="reinsurance_premium" data-money>
                </div>
            </div>
        </div>

        <div class="row">
                <label class="lead">Deducibles</label>
                <hr style="background-color: darkgray">
        </div>
        <div id="seriedadDeduciblesContainer" class="row">
            <div class="flexColumnCenterContainer" style="margin:1rem 0">
                {{-- <div class="flexRowWrapContainer" style="margin:1.2rem 0"> --}}
                <div class="d-flex mb-2">
                    <div class="input-group">
                        <input class="form-control" type="text" name="description_deductible[]"
                            placeholder="Detalle..">
                        <input class="form-control" type="number" min="0" max="100" step="any"
                            placeholder="%" name="sinister_value[]" min="0">
                        <span class="input-group-text">valor del siniestro</span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">%</span>
                        <input class="form-control" type="number" min="0" max="100" step="any"
                            name="insured_value[]">
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
            <button type="button" class="btn btn-info" style="color: white"
                onclick="addDeducible(event, 'seriedad')">Agregar deducible</button>
        </div>

    </div>

    <div class="tab">
        @include('admin.comercial.include.leyJurisdiccion')

        <div class="row">
            <div class="col-md-12">
                <div class="sentenceInput">
                    <ol style="list-style-type:upper-roman;">
                        <li class="my-2">
                            <h4 style="text-align: center; text-transform: uppercase">Condiciones de reafianzamiento
                            </h4>
                            <ul>
                                <li>Retención neta de la cedente y monto cedido a contrato</li>
                                <li>Monto propuesto al reasegurador</li>
                                <li>Comisión de Reafianzamiento</li>
                                <li>En caso de colocarse totalmente en forma facultativa, indicar la razón</li>
                            </ul>
                        </li>
                        <li class="my-2">
                            <h4 style="text-align: center; text-transform: uppercase">antecedentes del afianzado</h4>
                            <ul>
                                <li>Giro</li>
                                <li>Dirección</li>
                                <li>Pertenecen a algún grupo económico</li>
                                <li>Cúmulo de responsabilidades vigentes que tenga la cedente con el afianzado como
                                    consecuencia de fianzas anteriores</li>
                                <li>Cúmulo de responsabilidades vigentes real cedido a contrato</li>
                                <li>Información de la experiencia o trayectoria del afianzado</li>
                                <li>Desde cuando es afianzado de la Compañía Cedente</li>
                            </ul>
                        </li>
                        <li class="my-2">
                            <h4 style="text-align: center; text-transform: uppercase">Contragarantías</h4>
                            <ul>
                                <li>Detalle de las contragarantías</li>
                            </ul>
                        </li>
                        <li class="my-2">
                            <h4 style="text-align: center; text-transform: uppercase">Información financiera</h4>
                            <ul>
                                <li>Estados financieros del afianzado y en su caso, del obligado solidario de los
                                    últimos 3 años</li>
                            </ul>
                        </li>
                        <li class="my-2">
                            <h4 style="text-align: center; text-transform: uppercase">Anexos</h4>
                            <ul>
                                <li class="my-2">
                                    <div class="input-group">
                                        <label for="sourceDoc" class="input-group-text">Documento fuente</label>
                                        <input type="file" name="sourceDoc" id="sourceDoc">
                                    </div>
                                </li>
                                <li class="my-2">
                                    <div class="input-group">
                                        <label for="bailText" class="input-group-text">Texto de la fianza</label>
                                        <input type="text" name="bailText" id="bailText">
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div style="float:right;" class="row">
            <p>
            <div class="col-md">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-info mx-2"
                    style="color: white">Atrás</button>
                {{-- <button type="button" id="submitBtn" class="submitButton" onclick="submitForm('vida_form')"
                    style="display: none">Guardar</button> --}}
            </div>
            <div class="col-md">
                <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-info mx-2"
                    style="color: white">Siguiente</button>
                <button type="submit" id="submitBtn" style="display: none" class="btn btn-info mx-2"
                    style="color: white" onclick="jqsubmit()">Guardar</button>

            </div>
            </p>
        </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
</form>
