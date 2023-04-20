{{-- Protection and indemnity P&I --}}
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
    const coverageDetail_raw = "{{$coverageDetail}}";
    let coverageDetail;
    fetch(`data:application/*;base64,${coverageDetail_raw}`).then(base64 => base64.blob()).then(blob => {
        coverageDetail = URL.createObjectURL(blob)
        const anchor = document.getElementById('coverageDetailDownload')
        if (anchor) {
            anchor.href = coverageDetail
            anchor.download = 'vida_siniestralidad_previa.{{$coverageDetailExtension}}'
        }
    });


    const coverageDetail_raw = "{{$coverageDetail}}";
    let coverageDetail;
    fetch(`data:application/*;base64,${coverageDetail_raw}`).then(base64 => base64.blob()).then(blob => {
        coverageDetail = URL.createObjectURL(blob)
        const anchor = document.getElementById('coverageDetailDownload')
        if (anchor) {
            anchor.href = coverageDetail
            anchor.download = 'vida_siniestralidad_previa.{{$coverageDetailExtension}}'
        }
    });


    const coverageDetail_raw = "{{$coverageDetail}}";
    let coverageDetail;
    fetch(`data:application/*;base64,${coverageDetail_raw}`).then(base64 => base64.blob()).then(blob => {
        coverageDetail = URL.createObjectURL(blob)
        const anchor = document.getElementById('coverageDetailDownload')
        if (anchor) {
            anchor.href = coverageDetail
            anchor.download = 'vida_siniestralidad_previa.{{$coverageDetailExtension}}'
        }
    });


    const coverageDetail_raw = "{{$coverageDetail}}";
    let coverageDetail;
    fetch(`data:application/*;base64,${coverageDetail_raw}`).then(base64 => base64.blob()).then(blob => {
        coverageDetail = URL.createObjectURL(blob)
        const anchor = document.getElementById('coverageDetailDownload')
        if (anchor) {
            anchor.href = coverageDetail
            anchor.download = 'vida_siniestralidad_previa.{{$coverageDetailExtension}}'
        }
    });


    const coverageDetail_raw = "{{$coverageDetail}}";
    let coverageDetail;
    fetch(`data:application/*;base64,${coverageDetail_raw}`).then(base64 => base64.blob()).then(blob => {
        coverageDetail = URL.createObjectURL(blob)
        const anchor = document.getElementById('coverageDetailDownload')
        if (anchor) {
            anchor.href = coverageDetail
            anchor.download = 'vida_siniestralidad_previa.{{$coverageDetailExtension}}'
        }
    });


    const coverageDetail_raw = "{{$coverageDetail}}";
    let coverageDetail;
    fetch(`data:application/*;base64,${coverageDetail_raw}`).then(base64 => base64.blob()).then(blob => {
        coverageDetail = URL.createObjectURL(blob)
        const anchor = document.getElementById('coverageDetailDownload')
        if (anchor) {
            anchor.href = coverageDetail
            anchor.download = 'vida_siniestralidad_previa.{{$coverageDetailExtension}}'
        }
    });


    const coverageDetail_raw = "{{$coverageDetail}}";
    let coverageDetail;
    fetch(`data:application/*;base64,${coverageDetail_raw}`).then(base64 => base64.blob()).then(blob => {
        coverageDetail = URL.createObjectURL(blob)
        const anchor = document.getElementById('coverageDetailDownload')
        if (anchor) {
            anchor.href = coverageDetail
            anchor.download = 'vida_siniestralidad_previa.{{$coverageDetailExtension}}'
        }
    });


    const coverageDetail_raw = "{{$coverageDetail}}";
    let coverageDetail;
    fetch(`data:application/*;base64,${coverageDetail_raw}`).then(base64 => base64.blob()).then(blob => {
        coverageDetail = URL.createObjectURL(blob)
        const anchor = document.getElementById('coverageDetailDownload')
        if (anchor) {
            anchor.href = coverageDetail
            anchor.download = 'vida_siniestralidad_previa.{{$coverageDetailExtension}}'
        }
    });


    const coverageDetail_raw = "{{$coverageDetail}}";
    let coverageDetail;
    fetch(`data:application/*;base64,${coverageDetail_raw}`).then(base64 => base64.blob()).then(blob => {
        coverageDetail = URL.createObjectURL(blob)
        const anchor = document.getElementById('coverageDetailDownload')
        if (anchor) {
            anchor.href = coverageDetail
            anchor.download = 'vida_siniestralidad_previa.{{$coverageDetailExtension}}'
        }
    });


    const coverageDetail_raw = "{{$coverageDetail}}";
    let coverageDetail;
    fetch(`data:application/*;base64,${coverageDetail_raw}`).then(base64 => base64.blob()).then(blob => {
        coverageDetail = URL.createObjectURL(blob)
        const anchor = document.getElementById('coverageDetailDownload')
        if (anchor) {
            anchor.href = coverageDetail
            anchor.download = 'vida_siniestralidad_previa.{{$coverageDetailExtension}}'
        }
    });


    const coverageDetail_raw = "{{$coverageDetail}}";
    let coverageDetail;
    fetch(`data:application/*;base64,${coverageDetail_raw}`).then(base64 => base64.blob()).then(blob => {
        coverageDetail = URL.createObjectURL(blob)
        const anchor = document.getElementById('coverageDetailDownload')
        if (anchor) {
            anchor.href = coverageDetail
            anchor.download = 'vida_siniestralidad_previa.{{$coverageDetailExtension}}'
        }
    });


    const coverageDetail_raw = "{{$coverageDetail}}";
    let coverageDetail;
    fetch(`data:application/*;base64,${coverageDetail_raw}`).then(base64 => base64.blob()).then(blob => {
        coverageDetail = URL.createObjectURL(blob)
        const anchor = document.getElementById('coverageDetailDownload')
        if (anchor) {
            anchor.href = coverageDetail
            anchor.download = 'vida_siniestralidad_previa.{{$coverageDetailExtension}}'
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

{{-- david --}}

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('js/admin/comercial/ajax.js') }}" defer></script>

<div class="card" style="padding-inline: 1rem; padding-block: 1.75rem">
    <form enctype="multipart/form-data" method="POST" id="maritimo_2_form" onsubmit="maritimoform2()">
        @csrf
        @method('PUT')
        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
        <input type="hidden" name="type_slip" value="maritimo_2_form">

        @include('admin.comercial.include.object_index')

        <div class="row my-3">
            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text" for="modalidad">Modalidad</label>
                    <select class="form-group" name="modality" id="modalidad">
                        <option value="" disabled>Seleccionar</option>
                        <option {{ $slip_type->modality == '3/4' ? 'selected' : '' }} value="3/4">3/4</option>
                        <option {{ $slip_type->modality == '4/4' ? 'selected' : '' }} value="4/4">4/4</option>
                        <option {{ $slip_type->modality == 'otros' ? 'selected' : '' }} value="otros">Otros</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text" for="limit">Límite de indemnización</label>
                    <input type="number" step="any" placeholder="..." name="limit_compensation" id="limit" data-money value="{{ $slip->limit_compensation }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label class="input-group-text" for="coverage">Cobertura</label>
                <textarea name="coverage" id="coverage" style="resize:both;width:100%;" cols="30" rows="1">{{ !empty($slip->coverage) ? $slip->coverage : '' }}</textarea>
            </div>

        </div>

        <div class="row">
            <label class="lead">Detalle de Embarcaciones</label>
            <hr style="background-color: darkgrey; width: 70%">
        </div>

        <div class="row">
            <div class="tableContainer">
                <button type="button" onclick="refreshSumaCascoMaquina('cascoBuques')" class="btn btn-info">
                    Actualizar
                </button>
                <table id="cascoBuquesTableEmbarcaciones" class="indemnizacionTable bigTable" style="margin: 1.5rem 0">
                    <thead>
                        <tr>
                            <th style="text-align: center">#</th>
                            <th style="text-align: center">Nombre de Embarcación</th>
                            <th style="text-align: center">Matrícula</th>
                            <th style="text-align: center">Material</th>
                            <th style="text-align: center">Manga (mts)</th>
                            <th style="text-align: center">Eslora (mts)</th>
                            <th style="text-align: center">Puntal (mts)</th>
                            <th style="text-align: center">Casco (USD)</th>
                            <th style="text-align: center">Maquina (USD)</th>
                            <th style="text-align: center">Total (USD)</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowEmbarcaciones(event, 'cascoBuques')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>

                    <tbody id="cascoBuquesTableEmbarcacionesBody">

                        @if (count($boat_detail) > 0)

                        @foreach ($boat_detail as $key => $item)
                        <tr>
                            <td style="text-align: center">
                                {{ $key + 1 }}
                            </td>
                            <td>
                                <input type="text" id="cascoBuquesEmbarcacion1" name="name_boat[]" placeholder="..." value="{{ $item->name_boat }}">
                            </td>
                            <td>
                                <input type="text" id="cascoBuquesMatricula1" name="registration_boat[]" placeholder="..." value="{{ $item->registration_boat }}">
                            </td>
                            <td>
                                <select name="material_boat[]" id="cascoBuquesMaterial1">
                                    <option value="0" selected>Selecciona</option>
                                    <option value="Madera" @if ($item->material_boat == 'Madera') selected @endif>Madera
                                    </option>
                                    <option value="Fibra de vidrio" @if ($item->material_boat == 'Fibra de vidrio') selected @endif>
                                        Fibra de vidrio</option>
                                    <option value="Acero naval" @if ($item->material_boat == 'Acero naval') selected @endif>
                                        Acero naval</option>
                                    <option value="Aluminio" @if ($item->material_boat == 'Aluminio') selected @endif>
                                        Aluminio</option>
                                    <option value="Mixtos" @if ($item->material_boat == 'Mixtos') selected @endif>
                                        Mixtos
                                    </option>
                                </select>
                            </td>
                            <td>
                                <input type="number" id="cascoBuquesManga1" name="manga_boat[]" placeholder="metros.." value="{{ $item->manga_boat }}">
                            </td>
                            <td>
                                <input type="number" id="cascoBuquesEslora1" name="eslora_boat[]" placeholder="metros.." value="{{ $item->eslora_boat }}">
                            </td>
                            <td>
                                <input type="number" id="cascoBuquesPuntal1" name="puntual_boat[]" placeholder="metros.." value="{{ $item->puntual_boat }}">
                            </td>
                            <td>
                                <input onkeyup="sumaCascoMaquina({{ $key + 1 }}, 1, 'cascoBuques')" type="number" step="any" class="row{{ $key + 1 }} col1" name="shell_boat[]" value="{{ $item->shell_boat }}">
                            </td>
                            <td>
                                <input onkeyup="sumaCascoMaquina({{ $key + 1 }}, 2, 'cascoBuques')" type="number" step="any" class="row{{ $key + 1 }} col2" name="machine_boat[]" value="{{ $item->machine_boat }}">
                            </td>
                            <td style="text-align: center">
                                <span class="slipTitle col3" id="rowTotal{{ $key + 1 }}">0</span>$
                            </td>
                            <td></td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td style="text-align: center">
                                1
                            </td>
                            <td>
                                <input type="text" name="name_boat[]" placeholder="...">
                            </td>
                            <td>
                                <input type="text" name="registration_boat[]" placeholder="...">
                            </td>
                            <td>
                                <select name="material_boat[]" id="cascoBuquesMaterial1">
                                    <option value="0" selected>Selecciona</option>
                                    <option value="Madera">Madera</option>
                                    <option value="Fibra de vidrio">Fibra de vidrio</option>
                                    <option value="Acero naval">Acero naval</option>
                                    <option value="Aluminio">Aluminio</option>
                                    <option value="Mixtos">Mixtos</option>
                                </select>
                            </td>
                            <td>
                                <input type="number" step="any" name="manga_boat[]" placeholder="metros..">
                            </td>
                            <td>
                                <input type="number" step="any" name="eslora_boat[]" placeholder="metros..">
                            </td>
                            <td>
                                <input type="number" step="any" name="puntual_boat[]" placeholder="metros..">
                            </td>
                            <td>
                                <input onkeyup="sumaCascoMaquina(1, 1, 'cascoBuques')" type="number" step="any" class="row1 col1" name="shell_boat[]" value="0">
                            </td>
                            <td>
                                <input onkeyup="sumaCascoMaquina(1, 2, 'cascoBuques')" type="number" step="any" class="row1 col2" name="machine_boat[]" value="0">
                            </td>
                            <td style="text-align: center">
                                <span class="slipTitle col3" id="rowTotal1">0</span>$
                            </td>
                            <td></td>
                        </tr>
                        @endif

                    </tbody>

                    <tfoot>
                        <td style="text-align: center">Total</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: center">
                            <span class="slipTitle" id="colTotal1">0</span>$
                        </td>
                        <td style="text-align: center">
                            <span class="slipTitle" id="colTotal2">0</span>$
                        </td>
                        <td style="text-align: center">
                            <span class="slipTitle" id="totalTotal">0</span>$
                        </td>
                        <td></td>
                    </tfoot>

                </table>
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

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text" for="usoEmbarcacion">Uso de la embarcación</label>
                    <select class="form-group" name="use_boat" id="cascoBuquesUsos">
                        <option value="0" disabled>Selecciona</option>
                        <option {{ $slip_type->use_boat == 'mercantes' ? 'selected' : '' }} value="mercantes">Mercante
                        </option>
                        <option {{ $slip_type->use_boat == 'turismo' ? 'selected' : '' }} value="turismo">Turismo
                        </option>
                        <option {{ $slip_type->use_boat == 'pesquero' ? 'selected' : '' }} value="pesquero">Pesqueros
                        </option>
                        <option {{ $slip_type->use_boat == 'remolcadores' ? 'selected' : '' }} value="remolcadores">
                            Remolcadores</option>
                        <option {{ $slip_type->use_boat == 'placer' ? 'selected' : '' }} value="placer">Placer</option>
                        <option {{ $slip_type->use_boat == 'defensa' ? 'selected' : '' }} value="defensa">Defensa
                        </option>
                        <option {{ $slip_type->use_boat == 'dragas' ? 'selected' : '' }} value="dragas">Dragas</option>
                        <option {{ $slip_type->use_boat == 'otros' ? 'selected' : '' }} value="otros">Otros</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text" for="detalleValor">Detalle valorado de las
                        embarcaciones</label>
                    <input type="text" name="detail_boat" id="detalleValor" placeholder="Detalle..." value="{{ $slip_type->detail_boat }}">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text" for="nombreArmador">Nombre del armador</label>
                    <input class="inputForm" type="text" name="name_armador" id="nombreArmador" value="{{ $slip_type->name_armador }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text" for="areaNavegacion">&Aacute;rea principal de
                        navegación</label>
                    <input type="text" name="navigation" id="areaNavegacion" value="{{ $slip_type->navigation }}">
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <label class="lead">Archivos</label>
            <hr style="background-color: darkgrey; width: 70%">

        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group">
                    <input class="form-control" type="file" name="coverageDetail" hidden="true" id="coverageDetail" accept="application/*">
                    <label class="input-group-text" hidden="true" for="coverageDetail" id="coverageDetailFileLabel">Detalle de bienes asegurados
                    </label>
                    @if ($coverageDetail)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="coverageDetailDownload">Detalle de bienes asegurados - Previo</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="togglecoverageDetail()" id="coverageDetailFileToggle">Modificar</button>
                    <script>
                        let toggledcoverageDetailFile = false;
                        const coverageDetailInput = document.getElementById('coverageDetail');
                        const coverageDetailDownload = document.getElementById('coverageDetailDownload');
                        const coverageDetailLabel = document.getElementById('coverageDetailFileLabel');
                        const coverageDetailToggle = document.getElementById('coverageDetailFileToggle');

                        function togglecoverageDetail() {
                            toggledcoverageDetailFile = !toggledcoverageDetailFile;
                            coverageDetailInput.hidden = !toggledcoverageDetailFile;
                            coverageDetailDownload.hidden = toggledcoverageDetailFile;
                            coverageDetailLabel.hidden = !toggledcoverageDetailFile;
                            coverageDetailToggle.textContent = toggledcoverageDetailFile ? 'Usar previo' : 'Modificar'
                            if (toggledcoverageDetailFile) coverageDetailInput.click()
                        }
                    </script>
                    @else<input type="file" name="coverageDetail" id="coverageDetail" class="form-control">
                    <label for="coverageDetail" class="input-group-text">Detalle de bienes asegurados</label>
                    @endif

                    <label class="input-group-text" for="informeInspeccion">Informe de inspección
                        actualizado</label>
                    <input type="file" name="informeInspeccion" id="informeInspeccion">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <input class="form-control" type="file" name="coverageDetail" hidden="true" id="coverageDetail" accept="application/*">
                    <label class="input-group-text" hidden="true" for="coverageDetail" id="coverageDetailFileLabel">Detalle de bienes asegurados
                    </label>
                    @if ($coverageDetail)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="coverageDetailDownload">Detalle de bienes asegurados - Previo</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="togglecoverageDetail()" id="coverageDetailFileToggle">Modificar</button>
                    <script>
                        let toggledcoverageDetailFile = false;
                        const coverageDetailInput = document.getElementById('coverageDetail');
                        const coverageDetailDownload = document.getElementById('coverageDetailDownload');
                        const coverageDetailLabel = document.getElementById('coverageDetailFileLabel');
                        const coverageDetailToggle = document.getElementById('coverageDetailFileToggle');

                        function togglecoverageDetail() {
                            toggledcoverageDetailFile = !toggledcoverageDetailFile;
                            coverageDetailInput.hidden = !toggledcoverageDetailFile;
                            coverageDetailDownload.hidden = toggledcoverageDetailFile;
                            coverageDetailLabel.hidden = !toggledcoverageDetailFile;
                            coverageDetailToggle.textContent = toggledcoverageDetailFile ? 'Usar previo' : 'Modificar'
                            if (toggledcoverageDetailFile) coverageDetailInput.click()
                        }
                    </script>
                    @else<input type="file" name="coverageDetail" id="coverageDetail" class="form-control">
                    <label for="coverageDetail" class="input-group-text">Detalle de bienes asegurados</label>
                    @endif

                    <label class="input-group-text" for="siniestralidadCincoAnios">Siniestralidad 5 años de
                        embarcación</label>
                    <input type="file" name="siniestralidad_embarcacion" id="siniestralidadCincoAnios">
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group">
                    <input class="form-control" type="file" name="coverageDetail" hidden="true" id="coverageDetail" accept="application/*">
                    <label class="input-group-text" hidden="true" for="coverageDetail" id="coverageDetailFileLabel">Detalle de bienes asegurados
                    </label>
                    @if ($coverageDetail)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="coverageDetailDownload">Detalle de bienes asegurados - Previo</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="togglecoverageDetail()" id="coverageDetailFileToggle">Modificar</button>
                    <script>
                        let toggledcoverageDetailFile = false;
                        const coverageDetailInput = document.getElementById('coverageDetail');
                        const coverageDetailDownload = document.getElementById('coverageDetailDownload');
                        const coverageDetailLabel = document.getElementById('coverageDetailFileLabel');
                        const coverageDetailToggle = document.getElementById('coverageDetailFileToggle');

                        function togglecoverageDetail() {
                            toggledcoverageDetailFile = !toggledcoverageDetailFile;
                            coverageDetailInput.hidden = !toggledcoverageDetailFile;
                            coverageDetailDownload.hidden = toggledcoverageDetailFile;
                            coverageDetailLabel.hidden = !toggledcoverageDetailFile;
                            coverageDetailToggle.textContent = toggledcoverageDetailFile ? 'Usar previo' : 'Modificar'
                            if (toggledcoverageDetailFile) coverageDetailInput.click()
                        }
                    </script>
                    @else<input type="file" name="coverageDetail" id="coverageDetail" class="form-control">
                    <label for="coverageDetail" class="input-group-text">Detalle de bienes asegurados</label>
                    @endif

                    <label class="input-group-text" for="experienciaArmador">Experiencia del armador en otras
                        embarcaciones</label>
                    <input type="file" name="experienciaArmador" id="experienciaArmador">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <input class="form-control" type="file" name="coverageDetail" hidden="true" id="coverageDetail" accept="application/*">
                    <label class="input-group-text" hidden="true" for="coverageDetail" id="coverageDetailFileLabel">Detalle de bienes asegurados
                    </label>
                    @if ($coverageDetail)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="coverageDetailDownload">Detalle de bienes asegurados - Previo</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="togglecoverageDetail()" id="coverageDetailFileToggle">Modificar</button>
                    <script>
                        let toggledcoverageDetailFile = false;
                        const coverageDetailInput = document.getElementById('coverageDetail');
                        const coverageDetailDownload = document.getElementById('coverageDetailDownload');
                        const coverageDetailLabel = document.getElementById('coverageDetailFileLabel');
                        const coverageDetailToggle = document.getElementById('coverageDetailFileToggle');

                        function togglecoverageDetail() {
                            toggledcoverageDetailFile = !toggledcoverageDetailFile;
                            coverageDetailInput.hidden = !toggledcoverageDetailFile;
                            coverageDetailDownload.hidden = toggledcoverageDetailFile;
                            coverageDetailLabel.hidden = !toggledcoverageDetailFile;
                            coverageDetailToggle.textContent = toggledcoverageDetailFile ? 'Usar previo' : 'Modificar'
                            if (toggledcoverageDetailFile) coverageDetailInput.click()
                        }
                    </script>
                    @else<input type="file" name="coverageDetail" id="coverageDetail" class="form-control">
                    <label for="coverageDetail" class="input-group-text">Detalle de bienes asegurados</label>
                    @endif

                    <label class="input-group-text" for="siniestralidad_armador">Siniestralidad 5 años
                        armador</label>
                    <input type="file" name="siniestralidad_armador" id="siniestralidad_armador">
                </div>
            </div>
        </div>


        <div class="row mb-3">
            <div class="input-group">
                <input class="form-control" type="file" name="coverageDetail" hidden="true" id="coverageDetail" accept="application/*">
                <label class="input-group-text" hidden="true" for="coverageDetail" id="coverageDetailFileLabel">Detalle de bienes asegurados
                </label>
                @if ($coverageDetail)
                <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="coverageDetailDownload">Detalle de bienes asegurados - Previo</a>
                <button type="button" class="btn btn-info" style="color: white" onclick="togglecoverageDetail()" id="coverageDetailFileToggle">Modificar</button>
                <script>
                    let toggledcoverageDetailFile = false;
                    const coverageDetailInput = document.getElementById('coverageDetail');
                    const coverageDetailDownload = document.getElementById('coverageDetailDownload');
                    const coverageDetailLabel = document.getElementById('coverageDetailFileLabel');
                    const coverageDetailToggle = document.getElementById('coverageDetailFileToggle');

                    function togglecoverageDetail() {
                        toggledcoverageDetailFile = !toggledcoverageDetailFile;
                        coverageDetailInput.hidden = !toggledcoverageDetailFile;
                        coverageDetailDownload.hidden = toggledcoverageDetailFile;
                        coverageDetailLabel.hidden = !toggledcoverageDetailFile;
                        coverageDetailToggle.textContent = toggledcoverageDetailFile ? 'Usar previo' : 'Modificar'
                        if (toggledcoverageDetailFile) coverageDetailInput.click()
                    }
                </script>
                @else<input type="file" name="coverageDetail" id="coverageDetail" class="form-control">
                <label for="coverageDetail" class="input-group-text">Detalle de bienes asegurados</label>
                @endif

                <label class="input-group-text" for="otrasEmbarcaciones">Qué otras embarcaciones ha tenido el
                    armador en
                    los últimos 5 años</label>
                <input type="file" name="otrasEmbarcaciones" id="otrasEmbarcaciones">
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-7">
                <input class="form-control" type="file" name="coverageDetail" hidden="true" id="coverageDetail" accept="application/*">
                <label class="input-group-text" hidden="true" for="coverageDetail" id="coverageDetailFileLabel">Detalle de bienes asegurados
                </label>
                @if ($coverageDetail)
                <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="coverageDetailDownload">Detalle de bienes asegurados - Previo</a>
                <button type="button" class="btn btn-info" style="color: white" onclick="togglecoverageDetail()" id="coverageDetailFileToggle">Modificar</button>
                <script>
                    let toggledcoverageDetailFile = false;
                    const coverageDetailInput = document.getElementById('coverageDetail');
                    const coverageDetailDownload = document.getElementById('coverageDetailDownload');
                    const coverageDetailLabel = document.getElementById('coverageDetailFileLabel');
                    const coverageDetailToggle = document.getElementById('coverageDetailFileToggle');

                    function togglecoverageDetail() {
                        toggledcoverageDetailFile = !toggledcoverageDetailFile;
                        coverageDetailInput.hidden = !toggledcoverageDetailFile;
                        coverageDetailDownload.hidden = toggledcoverageDetailFile;
                        coverageDetailLabel.hidden = !toggledcoverageDetailFile;
                        coverageDetailToggle.textContent = toggledcoverageDetailFile ? 'Usar previo' : 'Modificar'
                        if (toggledcoverageDetailFile) coverageDetailInput.click()
                    }
                </script>
                @else<input type="file" name="coverageDetail" id="coverageDetail" class="form-control">
                <label for="coverageDetail" class="input-group-text">Detalle de bienes asegurados</label>
                @endif

                <label class="input-group-text" for="detalleViaje">Detalles de los viajes de pesca (en
                    caso de requerir casco pesquero)</label>
                <input type="text" name="detalleViajeText" id="detalleViaje" value="{{ $slip_type->detalleViajeText }}">
                <input type="file" name="detalleViajeFile" id="detalleViajeAttachement">
            </div>
            <div class="col-md-5">
                <div class="input-group">
                    <label class="input-group-text" for="copiaMatricula">Copia de la matrícula de la
                        embarcación</label>
                    <input type="file" name="copiaMatricula" id="copiaMatricula">
                </div>
            </div>

        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <input class="form-control" type="file" name="coverageDetail" hidden="true" id="coverageDetail" accept="application/*">
                <label class="input-group-text" hidden="true" for="coverageDetail" id="coverageDetailFileLabel">Detalle de bienes asegurados
                </label>
                @if ($coverageDetail)
                <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="coverageDetailDownload">Detalle de bienes asegurados - Previo</a>
                <button type="button" class="btn btn-info" style="color: white" onclick="togglecoverageDetail()" id="coverageDetailFileToggle">Modificar</button>
                <script>
                    let toggledcoverageDetailFile = false;
                    const coverageDetailInput = document.getElementById('coverageDetail');
                    const coverageDetailDownload = document.getElementById('coverageDetailDownload');
                    const coverageDetailLabel = document.getElementById('coverageDetailFileLabel');
                    const coverageDetailToggle = document.getElementById('coverageDetailFileToggle');

                    function togglecoverageDetail() {
                        toggledcoverageDetailFile = !toggledcoverageDetailFile;
                        coverageDetailInput.hidden = !toggledcoverageDetailFile;
                        coverageDetailDownload.hidden = toggledcoverageDetailFile;
                        coverageDetailLabel.hidden = !toggledcoverageDetailFile;
                        coverageDetailToggle.textContent = toggledcoverageDetailFile ? 'Usar previo' : 'Modificar'
                        if (toggledcoverageDetailFile) coverageDetailInput.click()
                    }
                </script>
                @else<input type="file" name="coverageDetail" id="coverageDetail" class="form-control">
                <label for="coverageDetail" class="input-group-text">Detalle de bienes asegurados</label>
                @endif

                <label class="input-group-text" for="detalleMantenimiento">Detalles de mantenimiento de
                    los últimos 5 años, incluyendo maquinaria y costos</label>
                <input type="file" name="detalleMantenimiento" id="detalleMantenimiento">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group">
                    <input class="form-control" type="file" name="coverageDetail" hidden="true" id="coverageDetail" accept="application/*">
                    <label class="input-group-text" hidden="true" for="coverageDetail" id="coverageDetailFileLabel">Detalle de bienes asegurados
                    </label>
                    @if ($coverageDetail)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="coverageDetailDownload">Detalle de bienes asegurados - Previo</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="togglecoverageDetail()" id="coverageDetailFileToggle">Modificar</button>
                    <script>
                        let toggledcoverageDetailFile = false;
                        const coverageDetailInput = document.getElementById('coverageDetail');
                        const coverageDetailDownload = document.getElementById('coverageDetailDownload');
                        const coverageDetailLabel = document.getElementById('coverageDetailFileLabel');
                        const coverageDetailToggle = document.getElementById('coverageDetailFileToggle');

                        function togglecoverageDetail() {
                            toggledcoverageDetailFile = !toggledcoverageDetailFile;
                            coverageDetailInput.hidden = !toggledcoverageDetailFile;
                            coverageDetailDownload.hidden = toggledcoverageDetailFile;
                            coverageDetailLabel.hidden = !toggledcoverageDetailFile;
                            coverageDetailToggle.textContent = toggledcoverageDetailFile ? 'Usar previo' : 'Modificar'
                            if (toggledcoverageDetailFile) coverageDetailInput.click()
                        }
                    </script>
                    @else<input type="file" name="coverageDetail" id="coverageDetail" class="form-control">
                    <label for="coverageDetail" class="input-group-text">Detalle de bienes asegurados</label>
                    @endif

                    <label class="input-group-text" for="tripulacionInfo">Información de la
                        tripulación</label>
                    <input type="file" name="tripulacionInfo" id="tripulacionInfo">
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group">
                    <input class="form-control" type="file" name="coverageDetail" hidden="true" id="coverageDetail" accept="application/*">
                    <label class="input-group-text" hidden="true" for="coverageDetail" id="coverageDetailFileLabel">Detalle de bienes asegurados
                    </label>
                    @if ($coverageDetail)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="coverageDetailDownload">Detalle de bienes asegurados - Previo</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="togglecoverageDetail()" id="coverageDetailFileToggle">Modificar</button>
                    <script>
                        let toggledcoverageDetailFile = false;
                        const coverageDetailInput = document.getElementById('coverageDetail');
                        const coverageDetailDownload = document.getElementById('coverageDetailDownload');
                        const coverageDetailLabel = document.getElementById('coverageDetailFileLabel');
                        const coverageDetailToggle = document.getElementById('coverageDetailFileToggle');

                        function togglecoverageDetail() {
                            toggledcoverageDetailFile = !toggledcoverageDetailFile;
                            coverageDetailInput.hidden = !toggledcoverageDetailFile;
                            coverageDetailDownload.hidden = toggledcoverageDetailFile;
                            coverageDetailLabel.hidden = !toggledcoverageDetailFile;
                            coverageDetailToggle.textContent = toggledcoverageDetailFile ? 'Usar previo' : 'Modificar'
                            if (toggledcoverageDetailFile) coverageDetailInput.click()
                        }
                    </script>
                    @else<input type="file" name="coverageDetail" id="coverageDetail" class="form-control">
                    <label for="coverageDetail" class="input-group-text">Detalle de bienes asegurados</label>
                    @endif

                    <label class="input-group-text" for="detalleValorReemplazo">Detalle del valor para
                        reemplazar maquinaria</label>
                    <input type="file" name="detalleValorReemplazo" id="detalleValorReemplazo">
                </div>
            </div>

        </div>
        <div class="row mb-3">
            <div class="input-group">
                <input class="form-control" type="file" name="coverageDetail" hidden="true" id="coverageDetail" accept="application/*">
                <label class="input-group-text" hidden="true" for="coverageDetail" id="coverageDetailFileLabel">Detalle de bienes asegurados
                </label>
                @if ($coverageDetail)
                <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="coverageDetailDownload">Detalle de bienes asegurados - Previo</a>
                <button type="button" class="btn btn-info" style="color: white" onclick="togglecoverageDetail()" id="coverageDetailFileToggle">Modificar</button>
                <script>
                    let toggledcoverageDetailFile = false;
                    const coverageDetailInput = document.getElementById('coverageDetail');
                    const coverageDetailDownload = document.getElementById('coverageDetailDownload');
                    const coverageDetailLabel = document.getElementById('coverageDetailFileLabel');
                    const coverageDetailToggle = document.getElementById('coverageDetailFileToggle');

                    function togglecoverageDetail() {
                        toggledcoverageDetailFile = !toggledcoverageDetailFile;
                        coverageDetailInput.hidden = !toggledcoverageDetailFile;
                        coverageDetailDownload.hidden = toggledcoverageDetailFile;
                        coverageDetailLabel.hidden = !toggledcoverageDetailFile;
                        coverageDetailToggle.textContent = toggledcoverageDetailFile ? 'Usar previo' : 'Modificar'
                        if (toggledcoverageDetailFile) coverageDetailInput.click()
                    }
                </script>
                @else<input type="file" name="coverageDetail" id="coverageDetail" class="form-control">
                <label for="coverageDetail" class="input-group-text">Detalle de bienes asegurados</label>
                @endif

                <label class="input-group-text" for="detalleLicencia">Detalle de las licencias que requiere la
                    embarcación para navegación</label>
                <input type="file" name="detalleLicencia" id="detalleLicencia">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group">
                    <input class="form-control" type="file" name="coverageDetail" hidden="true" id="coverageDetail" accept="application/*">
                    <label class="input-group-text" hidden="true" for="coverageDetail" id="coverageDetailFileLabel">Detalle de bienes asegurados
                    </label>
                    @if ($coverageDetail)
                    <a download="siniestralidad_previa" style="padding:1rem; color: #000" id="coverageDetailDownload">Detalle de bienes asegurados - Previo</a>
                    <button type="button" class="btn btn-info" style="color: white" onclick="togglecoverageDetail()" id="coverageDetailFileToggle">Modificar</button>
                    <script>
                        let toggledcoverageDetailFile = false;
                        const coverageDetailInput = document.getElementById('coverageDetail');
                        const coverageDetailDownload = document.getElementById('coverageDetailDownload');
                        const coverageDetailLabel = document.getElementById('coverageDetailFileLabel');
                        const coverageDetailToggle = document.getElementById('coverageDetailFileToggle');

                        function togglecoverageDetail() {
                            toggledcoverageDetailFile = !toggledcoverageDetailFile;
                            coverageDetailInput.hidden = !toggledcoverageDetailFile;
                            coverageDetailDownload.hidden = toggledcoverageDetailFile;
                            coverageDetailLabel.hidden = !toggledcoverageDetailFile;
                            coverageDetailToggle.textContent = toggledcoverageDetailFile ? 'Usar previo' : 'Modificar'
                            if (toggledcoverageDetailFile) coverageDetailInput.click()
                        }
                    </script>
                    @else<input type="file" name="coverageDetail" id="coverageDetail" class="form-control">
                    <label for="coverageDetail" class="input-group-text">Detalle de bienes asegurados</label>
                    @endif

                    <label class="input-group-text" for="formularioFirmado">Formulario relleno y
                        firmado</label>
                    <input type="file" name="formularioFirmado" id="formularioFirmado">
                </div>
            </div>
        </div>
        <div>
            <div style="float:right;" class="row">
                <div class="col-md">
                    <button type="submit" id="submitBtn" class="btn btn-info mx-2" style="color: white">Enviar a dpto. Técnico</button>
                </div>
            </div>
    </form>
</div>
@else
<form enctype="multipart/form-data" method="POST" id="maritimo_2_form" class="form maritimo2" onsubmit="maritimoform2()" style="display: none">
    <!-- One "tab" for each step in the form: -->

    @csrf
    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
    <input type="hidden" name="type_slip" value="maritimo_2_form">
    <div class="tab">

        <div class="row">
            @include('admin.comercial.include.object_index')
        </div>

        <div class="row my-3">
            <div class="input-group col-md-6">
                <label class="input-group-text" for="modalidad">Modalidad</label>
                <select name="modality" id="modalidad">
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="3/4">3/4</option>
                    <option value="4/4">4/4</option>
                    <option value="otros">Otros</option>
                </select>
            </div>
            <div class="col-md-6 my-2">
                <div class="input-group">
                    <label class="input-group-text" for="usoEmbarcacion">Uso de la embarcación</label>
                    <select name="use_boat" id="cascoBuquesUsos">
                        <option value="0" selected disabled>Selecciona</option>
                        <option value="mercantes">Mercante</option>
                        <option value="turismo">Turismo</option>
                        <option value="pesquero">Pesqueros</option>
                        <option value="remolcadores">Remolcadores</option>
                        <option value="placer">Placer</option>
                        <option value="defensa">Defensa</option>
                        <option value="dragas">Dragas</option>
                        <option value="otros">Otros</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <label class="input-group-text" for="limit">Límite de indemnización</label>
                    <input type="number" step="any" placeholder="..." name="limit_compensation" id="limit" data-money>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="flexColumnCenterContainer">
                <label class="lead">Detalle de Embarcaciones</label>
            </div>
        </div>

        <div class="row">
            <div class="tableContainer">
                <table id="maritimo_piTableEmbarcaciones" class="indemnizacionTable bigTable" style="margin: 1.5rem 0">
                    <thead>
                        <tr>
                            <th style="text-align: center">#</th>
                            <th style="text-align: center">Nombre de Embarcación</th>
                            <th style="text-align: center">Matrícula</th>
                            <th style="text-align: center">Material</th>
                            <th style="text-align: center">Manga (mts)</th>
                            <th style="text-align: center">Eslora (mts)</th>
                            <th style="text-align: center">Puntal (mts)</th>
                            <th style="text-align: center">Casco (USD)</th>
                            <th style="text-align: center">Maquina (USD)</th>
                            <th style="text-align: center">Total (USD)</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowEmbarcaciones(event, 'maritimo_pi')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>

                    <tbody id="maritimo_piTableEmbarcacionesBody">
                        <tr>
                            <td style="text-align: center">
                                1
                            </td>
                            <td>
                                <input type="text" name="name_boat[]" placeholder="...">
                            </td>
                            <td>
                                <input type="text" name="registration_boat[]" placeholder="...">
                            </td>
                            <td>
                                <select name="material_boat[]" id="maritimo_piMaterial1">
                                    <option value="0" selected>Selecciona</option>
                                    <option value="Madera">Madera</option>
                                    <option value="Fibra de vidrio">Fibra de vidrio</option>
                                    <option value="Acero naval">Acero naval</option>
                                    <option value="Aluminio">Aluminio</option>
                                    <option value="Mixtos">Mixtos</option>
                                </select>
                            </td>
                            <td>
                                <input type="number" step="any" name="manga_boat[]" placeholder="metros..">
                            </td>
                            <td>
                                <input type="number" step="any" name="eslora_boat[]" placeholder="metros..">
                            </td>
                            <td>
                                <input type="number" step="any" name="puntual_boat[]" placeholder="metros..">
                            </td>
                            <td>
                                <input onkeyup="sumaCascoMaquina(1, 1, 'maritimo_pi')" type="number" data-money step="any" class="row1 col1" name="shell_boat[]" value="0">
                            </td>
                            <td>
                                <input onkeyup="sumaCascoMaquina(1, 2, 'maritimo_pi')" type="number" data-money step="any" class="row1 col2" name="machine_boat[]" value="0">
                            </td>
                            <td style="text-align: center">
                                <span class="slipTitle col3" id="rowTotal1">0</span>$
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td style="text-align: center">
                                2
                            </td>
                            <td>
                                <input type="text" name="name_boat[]" placeholder="...">
                            </td>
                            <td>
                                <input type="text" name="registration_boat[]" placeholder="...">
                            </td>
                            <td>
                                <select name="material_boat[]" id="cascoBuquesMaterial1">
                                    <option value="0" selected>Selecciona</option>
                                    <option value="Madera">Madera</option>
                                    <option value="Fibra de vidrio">Fibra de vidrio</option>
                                    <option value="Acero naval">Acero naval</option>
                                    <option value="Aluminio">Aluminio</option>
                                    <option value="Mixtos">Mixtos</option>
                                </select>
                            </td>
                            <td>
                                <input type="number" step="any" name="manga_boat[]" placeholder="metros..">
                            </td>
                            <td>
                                <input type="number" step="any" name="eslora_boat[]" placeholder="metros..">
                            </td>
                            <td>
                                <input type="number" step="any" name="puntual_boat[]" placeholder="metros..">
                            </td>
                            <td>
                                <input onkeyup="sumaCascoMaquina(2, 1, 'maritimo_pi')" type="number" data-money step="any" class="row2 col1" name="shell_boat[]" value="0">
                            </td>
                            <td>
                                <input onkeyup="sumaCascoMaquina(2, 2, 'maritimo_pi')" type="number" data-money step="any" class="row2 col2" name="machine_boat[]" value="0">
                            </td>
                            <td style="text-align: center">
                                <span class="slipTitle col3" id="rowTotal2">0</span>$
                            </td>
                            <td></td>
                        </tr>

                    </tbody>

                    <tfoot>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: center">
                            <span class="slipTitle" id="colTotal1">0</span>$
                        </td>
                        <td style="text-align: center">
                            <span class="slipTitle" id="colTotal2">0</span>$
                        </td>
                        <td style="text-align: center">
                            <span class="slipTitle" id="totalTotal">0</span>$
                        </td>
                        <td></td>
                    </tfoot>

                </table>
            </div>
        </div>

    </div>

    <div class="tab">

        <div class="row">
            <div class="flexColumnCenterContainer">
                <label class="lead">Coberturas adicionales</label>
            </div>
        </div>

        <div class="row">
            <div class="tableContainer" style="margin: 2rem 0">
                <table id="maritimo_proteccionCoberturasAdicionalesTable" class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Coberturas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowCoberturaV2(event, 'maritimo_proteccion')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="maritimo_proteccionCoberturasAdicionalesTableBody">

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


        <div class="row">
            <div class="flexColumnCenterContainer">
                <label class="lead">Cláusulas adicionales</label>
            </div>
        </div>

        <div class="row">
            <div class="tableContainer" style="margin: 2rem 0">
                <table id="maritimo_proteccionClausulasAdicionalesTable" class="indemnizacionTable">
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 42px;">#</th>
                            <th style="text-align: center">Cláusulas</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center">USD</th>
                            <th style="text-align: center">Campo adicional</th>
                            <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add row">

                                <button type="button" onclick="addRowClausula(event, 'maritimo_proteccion')" class="btn btn-success btn-xs">
                                    +
                                </button>
                            </th>
                        </tr>
                    </thead>
                    {{-- tbody --}}
                    <tbody id="maritimo_proteccionClausulasAdicionalesTableBody">

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
        <div id="proteccionDeduciblesContainer" class="row">
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
            <button type="button" class="btn btn-info" style="color: white" onclick="addDeducible(event, 'proteccion')">Agregar deducible</button>
        </div>
    </div>
    <div class="tab">


        <div class="row">
            <div class="col-md-6">
                <p>
                    <label class="input-group-text" for="detalleValor">Detalle valorado de las
                        embarcaciones</label>
                    <input type="text" name="detail_boat" id="detalleValor" placeholder="Detalle...">
                    {{-- <textarea name="detalleValor" id="detalleValor" cols="20" rows="1" placeholder="Detalle..."></textarea> --}}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p>
                    <label class="input-group-text" for="nombreArmador">Nombre del armador</label>
                    <input class="inputForm" type="text" name="name_armador" id="nombreArmador">
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <label class="input-group-text" for="copiaMatricula">Copia de la matrícula de la
                        embarcación</label>
                    <input type="file" name="copiaMatricula" id="copiaMatricula">
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <p>
                    <label class="input-group-text" for="informeInspeccion">Informe de inspección
                        actualizado</label>
                    <input type="file" name="informeInspeccion" id="informeInspeccion">
                </p>
            </div>
            <div class="col-md-4">
                <p>
                    <label class="input-group-text" for="siniestralidadCincoAnios">Siniestralidad 5 años de
                        embarcación</label>
                    <input type="file" name="siniestralidad_embarcacion" id="siniestralidadCincoAnios">
                </p>
            </div>
            <div class="col-md-4">
                <p>
                    <label class="input-group-text" for="siniestralidad_armador">Siniestralidad 5 años
                        armador</label>
                    <input type="file" name="siniestralidad_armador" id="siniestralidad_armador">
                </p>
            </div>
        </div>

        <div class="row">
            <p>
                <label class="input-group-text" for="otrasEmbarcaciones">Qué otras embarcaciones ha tenido el
                    armador en
                    los últimos 5 años</label>
                <input type="file" name="otrasEmbarcaciones" id="otrasEmbarcaciones">
            </p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p>
                    <label class="input-group-text" for="experienciaArmador">Experiencia del armador en otras
                        embarcaciones</label>
                    <input type="file" name="experienciaArmador" id="experienciaArmador">
                </p>
            </div>

        </div>
    </div>
    <div class="tab">
        <div class="row">
            <div class="col-md-7">
                <p>
                    <label class="input-group-text" for="detalleViaje">Detalles de los viajes de pesca (en caso
                        de
                        requerir
                        casco pesquero)</label>
                    <input type="text" name="detalleViajeText" id="detalleViaje">
                    <input type="file" name="detalleViajeFile" id="detalleViajeAttachement">
                </p>
            </div>
            <div class="col-md-5">
                <p>
                    <label class="input-group-text" for="areaNavegacion">&Aacute;rea principal de
                        navegación</label>
                    <input type="text" name="navigation" id="areaNavegacion">
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p>
                    <label class="input-group-text" for="detalleMantenimiento">Detalles de mantenimiento de los
                        últimos 5 años,
                        incluyendo maquinaria y costos</label>
                    <input type="file" name="detalleMantenimiento" id="detalleMantenimiento">
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p>
                    <label class="input-group-text" for="tripulacionInfo">Información de la tripulación</label>
                    <input type="file" name="tripulacionInfo" id="tripulacionInfo">
                </p>
            </div>

            <div class="col-md-6">
                <p>
                    <label class="input-group-text" for="detalleValorReemplazo">Detalle del valor para
                        reemplazar
                        maquinaria</label>
                    <input type="file" name="detalleValorReemplazo" id="detalleValorReemplazo">
                </p>
            </div>

        </div>
        <div class="row">
            <p>
                <label class="input-group-text" for="detalleLicencia">Detalle de las licencias que requiere la
                    embarcación
                    para navegación</label>
                <input type="file" name="detalleLicencia" id="detalleLicencia">
            </p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p>
                    <label class="input-group-text" for="formularioFirmado">Formulario relleno y firmado</label>
                    <input type="file" name="formularioFirmado" id="formularioFirmado">
                </p>
            </div>

        </div>
    </div>
    <div>
        <div style="float:right;" class="row">
            <p>
            <div class="col-md">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-info mx-2" style="color: white">Atrás</button>
            </div>
            <div class="col-md">
                <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-info mx-2" style="color: white">Siguiente</button>
                {{-- <button type="submit" id="submitBtn" style="display: none">Enviar</button> --}}
                <button type="submit" id="submitBtn" style="display: none" class="btn btn-info mx-2" onclick="jqsubmit()" style="color: white">Enviar</button>


            </div>
            </p>
        </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
</form>
@endif
