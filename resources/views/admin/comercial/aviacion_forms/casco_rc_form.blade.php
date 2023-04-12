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
@if (\Illuminate\Support\Str::contains(\Illuminate\Support\Facades\Request::url(), '/admin/comercial/edit_compromiso/'))
    <div class="card px-4 py-2">
        <form enctype="multipart/form-data" method="POST" action="{{ route('slip.update', $slip->id) }}" id="aviacion_1_form">
            <h3>Casco aviacion</h3>
            @csrf
            @method('PUT')
            <input type="hidden" name="type_slip" value="aviacion_1_form">
            {{-- <input hidden type="number" name="slip_status" value="3"> --}}
            <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
            @include('admin.comercial.include.object_index')
    
    
            <div class="row my-3">
                <label class="lead">Datos de la Aeronave</label>
                <hr style="background-color: darkgrey; width: 70%">
            </div>

            <div class="row">
                <div class="card table-responsive">
                    <table class="table" style="overflow-x: auto" id="aeronaveAdicional">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Tipo Ala</th>
                                <th scope="col">Serie</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Año fabricación</th>
                                <th scope="col">Capacidad tripulantes</th>
                                <th scope="col">Capacidad pasajeros</th>
                                <th scope="col">Suma asegurada</th>
                                <th scope="col"><input type="button" value="Agregar campo"
                                        onclick="addAeronaveRow('aeronaveAdicional')"></th>
                            </tr>
                        </thead>
                        <tbody>
        
                            @if (count($information_aerial) > 0)
                                @foreach ($information_aerial as $key => $item)
                                <tr>
                                    <th scope="row">{{ $key +1 }}</th>
                                    <td>
                                        <select name="type_ala_aerial[]" id="ala">
                                            <option {{ $item->type_ala_aerial === 'fija' ? 'selected' : '' }} value="fija">
                                                Fija</option>
                                            <option {{ $item->type_ala_aerial === 'fija' ? 'selected' : '' }} value="rotativa">
                                                Rotativa</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input value="{{ $item->serie_aerial }}" type="text" name="serie_aerial[]"
                                            id="series">
                                    </td>
                                    <td>
                                        <input value="{{ $item->marca_aerial }}" type="text" name="marca_aerial[]"
                                            id="brand">
                                    </td>
                                    <td>
                                        <input value="{{ $item->model_aerial }}" type="text" name="model_aerial[]"
                                            id="model">
                                    </td>
                                    <td>
                                        <input value="{{ $item->year_manufacture_aerial }}" type="number" step="any"
                                            name="year_manufacture_aerial[]" id="makeYear" min="1960">
                                    </td>
                                    <td>
                                        <input value="{{ $item->cap_crew }}" type="text" name="cap_crew[]" id="capacity"
                                            min="1" step="1">
                                    </td>
                                    <td>
                                        <input value="{{ $item->cap_pax }}" type="number" step="any" name="cap_pax[]"
                                            id="passengers">
                                    </td>
                                    <td>
                                        <input value="{{ $item->sum_insured }}" type="number" step="any"
                                            placeholder="Suma asegurada" name="sum_insured[]" id="insuredSum" data-money>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <th scope="row">1</th>
                                <td>
                                    <select name="type_ala_aerial[]" id="ala">
                                        <option value="" selected disabled>Seleccionar</option>
                                        <option value="fija">Fija</option>
                                        <option value="rotativa">Rotativa</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="serie_aerial[]" id="series">
                                </td>
                                <td>
                                    <input type="text" name="marca_aerial[]" id="brand">
                                </td>
                                <td>
                                    <input type="text" name="model_aerial[]" id="model">
                                </td>
                                <td>
                                    <input type="number" step="any" name="year_manufacture_aerial[]" id="makeYear"
                                        min="1960">
                                </td>
                                <td>
                                    <input type="text" name="cap_crew[]" id="capacity" min="1" step="1">
                                </td>
                                <td>
                                    <input type="number" step="any" name="cap_pax[]" id="passengers">
                                </td>
                                <td>
                                    <input type="number" step="any" placeholder="Suma asegurada" name="sum_insured[]"
                                        id="insuredSum" data-money>
                                </td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
    
            <div class="row">
    
                <div class="col-md-6">
                    <label class="input-group-text">Tipo de aviación</label>
                    <select name="type_aviation" id="tipoAviacion">
                        <option {{ $slip_type->type_aviation === 'comercial' ? 'selected' : '' }} value="comercial">
                            Comercial</option>
                        <option {{ $slip_type->type_aviation === 'general' ? 'selected' : '' }} value="general">General
                        </option>
                        <option {{ $slip_type->type_aviation === 'escuela' ? 'selected' : '' }} value="escuela">Escuelas
                            de aviación</option>
                        <option {{ $slip_type->type_aviation === 'fumigacion' ? 'selected' : '' }} value="fumigacion">
                            Fumigación</option>
                        <option {{ $slip_type->type_aviation === 'privado' ? 'selected' : '' }} value="privado">Privado
                            placer</option>
                    </select>
                </div>
            </div>
            
            <div class="row my-3">
                <label class="lead">Coberturas y Límite de coberturas</label>
                <hr style="background-color: darkgrey; width: 70%">
            </div>
    
            @if (count($aviation_extras) > 0)
                @foreach ($aviation_extras as $key => $item)
                    <div class="row mb-3">
                        <label class="lead">{{$item->description_coverage}}</label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="input-group-text">Cobertura</label>
                                <input type="hidden" name="limit_description_coverage[]" value="{{$item->description_coverage}}">
                                <input type="number" step="any" name="aditional_coverage[]" value="{{$item->aditional_coverage}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="input-group-text">Límite de cobertura</label>
                                <input type="hidden" name="limit_description_coverage[]" value="{{$item->limit_description_coverage}}">
                                <input type="number" step="any" name="aditional_coverage[]" value="{{$item->limit_aditional_coverage}}">
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
    
                <div class="row">
                    <div class="col-md-6">
                        <div class="input_group mb-3">
                            <label class="input-group-text">
                                
                                Casco Aéreo:
                            </label>
                            <input type="hidden" name="description_coverage[]" value="Casco Aéreo">
                            <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                        </div>
        
                        <div class="input_group mb-3">
                            <label class="input-group-text">
                                
                                Responsabilidad Civil:
                            </label>
                            <input type="hidden" name="description_coverage[]" value="Responsabilidad Civil">
                            <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input_group mb-3">
                            <label class="input-group-text">
                                
                                Casco Guerra:
                            </label>
                            <input type="hidden" name="description_coverage[]" value="Casco Guerra">
                            <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                        </div>
        
                        <div class="input_group mb-3">
                            <label class="input-group-text">
                                
                                Deducibles:
                            </label>
                            <input type="hidden" name="description_coverage[]" value="Deducibles">
                            <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-md-6">
                        <div class="input_group mb-3">
                            <label class="input-group-text">
                                
                                Repuestos:
                            </label>
                            <input type="hidden" name="description_coverage[]" value="Repuestos">
                            <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                        </div>
        
                        <div class="input_group mb-3">
                            <label class="input-group-text">
                                
                                Accidentes Personales:
                            </label>
                            <input type="hidden" name="description_coverage[]" value="Accidentes Personales">
                            <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input_group mb-3">
                            <label class="input-group-text">
                                
                                Gastos Médicos:
                            </label>
                            <input type="hidden" name="description_coverage[]" value="Gastos Médicos">
                            <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                        </div>
                    </div>
                </div>
        
                <div class="row my-3">
                    <label class="lead">Límites de cobertura</label>
                    <hr style="background-color: darkgrey; width: 70%">
                </div>
        
                <div class="row">
                    <div class="col-md-6">
                        <div class="input_group mb-3">
                            <label class="input-group-text">
                                
                                Casco Aéreo:
                            </label>
                            <input type="hidden" name="limit_description_coverage[]" value="Casco Aéreo">
                            <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                        </div>
        
                        <div class="input_group mb-3">
                            <label class="input-group-text">
                                
                                Responsabilidad Civil:
                            </label>
                            <input type="hidden" name="limit_description_coverage[]" value="Responsabilidad Civil">
                            <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input_group mb-3">
                            <label class="input-group-text">
                                
                                Casco Guerra:
                            </label>
                            <input type="hidden" name="limit_description_coverage[]" value="Casco Guerra">
                            <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                        </div>
        
                        <div class="input_group mb-3">
                            <label class="input-group-text">
                                
                                Deducibles:
                            </label>
                            <input type="hidden" name="limit_description_coverage[]" value="Deducibles">
                            <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-md-6">
                        <div class="input_group mb-3">
                            <label class="input-group-text">
                                
                                Repuestos:
                            </label>
                            <input type="hidden" name="limit_description_coverage[]" value="Repuestos">
                            <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                        </div>
        
                        <div class="input_group mb-3">
                            <label class="input-group-text">
                                
                                Accidentes Personales:
                            </label>
                            <input type="hidden" name="limit_description_coverage[]" value="Accidentes Personales">
                            <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input_group mb-3">
                            <label class="input-group-text">
                                
                                Gastos Médicos:
                            </label>
                            <input type="hidden" name="limit_description_coverage[]" value="Gastos Médicos">
                            <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <label class="input-group-text">Límite geográfico</label>
                            <input type="text" name="geography_limit" value="{{ $slip_type->geography_limit }}">
                        </div>
                    </div>
        
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <label class="input-group-text">Pilotos autorizados</label>
                            <input type="text" name="pilot_authorized" value="{{ $slip_type->pilot_authorized }}">
                        </div>
                    </div>
                </div>
                
            @endif
    
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
                        <input type="number" step="any" name="reinsurer_rate"
                            id="reinsurer_rate" value="{{ $slip->reinsurer_rate }}"><span
                            class="input-group-text">%</span>
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
                <div class="col-md-6 mb-3">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="modelMakeHours">Horas en marca y modelo</label>
                        <input value="{{ $slip_type->modelMakeHours }}" class="inputForm" type="file"
                            name="modelMakeHours" id="modelMakeHours">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="accidentRate">Siniestralidad de los últimos 5
                            años</label>
                        <input value="{{ $slip_type->accidentRate }}" class="inputForm" type="file"
                            name="accidentRate" id="accidentRate">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="otherForms">Formularios de Hangares y formularios varios
                            por cobertura</label>
                        <input value="{{ $slip_type->otherForms }}" class="inputForm" type="file" name="otherForms"
                            id="otherForms">
                    </div>
                </div>
                <div class="col-md-6">
    
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="crFormSigned">Formulario de casco relleno y
                            firmado</label>
                        <input value="{{ $slip_type->crFormSigned }}" class="inputForm" type="file"
                            name="crFormSigned" id="crFormSigned">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="pilotExperienceFormSigned">Experiencia de los pilotos -
                            formulario relleno y
                            firmado</label>
                        <input value="{{ $slip_type->pilotExperienceFormSigned }}" class="inputForm" type="file"
                            name="pilotExperienceFormSigned" id="pilotExperienceFormSigned">
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
    <form enctype="multipart/form-data" method="POST" id="aviacion_1_form" class="form aviacion"
        style="display: none">

        <h3>Casco aviacion</h3>

        @csrf
        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
        <input type="hidden" name="type_slip" value="aviacion_1_form">
        <input hidden type="number" name="slip_status" value="3">
        <div class="tab">
            @include('admin.comercial.include.object_index')
        </div>

        <div class="tab">
            <div class="row my-3">
                <label class="lead">Datos de la Aeronave</label>
                <hr>
            </div>

            <div class="row">
                <table class="table" style="overflow-x: auto" id="aeronaveAdicional">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Tipo Ala</th>
                            <th scope="col">Serie</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Año fabricación</th>
                            <th scope="col">Capacidad tripulantes</th>
                            <th scope="col">Capacidad pasajeros</th>
                            <th scope="col">Suma asegurada</th>
                            <th scope="col"><input type="button" value="Agregar campo"
                                    onclick="addAeronaveRow('aeronaveAdicional')"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <th scope="row">1</th>
                        <td>
                            <select name="type_ala_aerial[]" id="ala">
                                <option value="" selected disabled>Seleccionar</option>
                                <option value="fija">Fija</option>
                                <option value="rotativa">Rotativa</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="serie_aerial[]" id="series">
                        </td>
                        <td>
                            <input type="text" name="marca_aerial[]" id="brand">
                        </td>
                        <td>
                            <input type="text" name="model_aerial[]" id="model">
                        </td>
                        <td>
                            <input type="number" step="any" name="year_manufacture_aerial[]" id="makeYear"
                                min="1960">
                        </td>
                        <td>
                            <input type="number" name="cap_crew[]" id="capacity" min="1" step="1">
                        </td>
                        <td>
                            <input type="number" step="any" name="cap_pax[]" id="passengers">
                        </td>
                        <td>
                            <input type="number" step="any" placeholder="Suma asegurada" name="sum_insured[]"
                                id="insuredSum" data-money>
                        </td>
                    </tbody>
                </table>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <label class="input-group-text">Tipo de aviación</label>
                    <select name="type_aviation" id="tipoAviacion">
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="comercial">Comercial</option>
                        <option value="general">General</option>
                        <option value="escuela">Escuelas de aviación</option>
                        <option value="fumigacion">Fumigación</option>
                        <option value="privado">Privado placer</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <div class="input-group">
                        <label class="input-group-text">Valor asegurado</label>
                        <input type="number" step="any" placeholder="Valor.." name="object_insured_value" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row my-3">
                <label class="lead">Coberturas</label>
                <hr>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="input_group mb-3">
                        <label class="input-group-text">
                            
                            Casco Aéreo:
                        </label>
                        <input type="hidden" name="description_coverage[]" value="Casco Aéreo">
                        <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                    </div>

                    <div class="input_group mb-3">
                        <label class="input-group-text">
                            
                            Responsabilidad Civil:
                        </label>
                        <input type="hidden" name="description_coverage[]" value="Responsabilidad Civil">
                        <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input_group mb-3">
                        <label class="input-group-text">
                            
                            Casco Guerra:
                        </label>
                        <input type="hidden" name="description_coverage[]" value="Casco Guerra">
                        <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                    </div>

                    <div class="input_group mb-3">
                        <label class="input-group-text">
                            
                            Deducibles:
                        </label>
                        <input type="hidden" name="description_coverage[]" value="Deducibles">
                        <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="input_group mb-3">
                        <label class="input-group-text">
                            
                            Repuestos:
                        </label>
                        <input type="hidden" name="description_coverage[]" value="Repuestos">
                        <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                    </div>

                    <div class="input_group mb-3">
                        <label class="input-group-text">
                            
                            Accidentes Personales:
                        </label>
                        <input type="hidden" name="description_coverage[]" value="Accidentes Personales">
                        <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input_group mb-3">
                        <label class="input-group-text">
                            
                            Gastos Médicos:
                        </label>
                        <input type="hidden" name="description_coverage[]" value="Gastos Médicos">
                        <input type="number" step="any" name="aditional_coverage[]" placeholder="...">
                    </div>
                </div>
            </div>

            <div class="row my-3">
                <label class="lead">Límites de cobertura</label>
                <hr>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="input_group mb-3">
                        <label class="input-group-text">
                            
                            Casco Aéreo:
                        </label>
                        <input type="hidden" name="limit_description_coverage[]" value="Casco Aéreo">
                        <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                    </div>

                    <div class="input_group mb-3">
                        <label class="input-group-text">
                            
                            Responsabilidad Civil:
                        </label>
                        <input type="hidden" name="limit_description_coverage[]" value="Responsabilidad Civil">
                        <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input_group mb-3">
                        <label class="input-group-text">
                            
                            Casco Guerra:
                        </label>
                        <input type="hidden" name="limit_description_coverage[]" value="Casco Guerra">
                        <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                    </div>

                    <div class="input_group mb-3">
                        <label class="input-group-text">
                            
                            Deducibles:
                        </label>
                        <input type="hidden" name="limit_description_coverage[]" value="Deducibles">
                        <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="input_group mb-3">
                        <label class="input-group-text">
                            
                            Repuestos:
                        </label>
                        <input type="hidden" name="limit_description_coverage[]" value="Repuestos">
                        <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                    </div>

                    <div class="input_group mb-3">
                        <label class="input-group-text">
                            
                            Accidentes Personales:
                        </label>
                        <input type="hidden" name="limit_description_coverage[]" value="Accidentes Personales">
                        <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input_group mb-3">
                        <label class="input-group-text">
                            
                            Gastos Médicos:
                        </label>
                        <input type="hidden" name="limit_description_coverage[]" value="Gastos Médicos">
                        <input type="number" step="any" name="limit_aditional_coverage[]" placeholder="...">
                    </div>
                </div>
            </div>


        </div>

        <div class="tab">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text">Límite geográfico</label>
                        <input type="text" name="geography_limit">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text">Pilotos autorizados</label>
                        <input type="text" name="pilot_authorized">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label class="lead">Coberturas adicionales</label>
                <hr>
            </div>

            <div class="row">
                <div class="tableContainer" style="margin: 2rem 0">
                    <table id="aviacion_casco_rcCoberturasAdicionalesTable" class="indemnizacionTable">
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
                                        onclick="addRowCoberturaV2(event, 'aviacion_casco_rc', 'aviacion', 'all')"
                                        class="btn btn-success btn-xs">
                                        +
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        {{-- tbody --}}
                        <tbody id="aviacion_casco_rcCoberturasAdicionalesTableBody">

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
                                    <input type="text" placeholder="0" name="coverage_additional_usd[]">
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
                    <table id="aviacion_casco_rcClausulasAdicionalesTable" class="indemnizacionTable">
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
                                        onclick="addRowClausula(event, 'aviacion_casco_rc', 'aviacion', 'casco')"
                                        class="btn btn-success btn-xs">
                                        +
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        {{-- tbody --}}
                        <tbody id="aviacion_casco_rcClausulasAdicionalesTableBody">

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
                                    <input type="text" placeholder="0" name="clause_additional_usd[]">
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
                        <input class="inputForm" type="number" step="any" name="reinsurer_rate" id="reinsurer_rate"><span
                            class="input-group-text">%</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="deducible">Prima de reaseguros</label>
                        <input class="inputForm" type="number" step="any" placeholder="USD" name="reinsurance_premium">
                    </div>
                </div>
            </div>



            <div class="row">

                    <label class="lead">Deducibles</label>
                    <hr style="background-color: darkgray">

            </div>
            <div id="aviacion_rcDeduciblesContainer" class="row">
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
                    onclick="addDeducible(event, 'aviacion_rc')">Agregar deducible</button>
            </div>

            @include('admin.comercial.include.leyJurisdiccion')

            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="modelMakeHours">Horas en marca y modelo</label>
                        <input class="inputForm" type="file" name="modelMakeHours" id="modelMakeHours">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="accidentRate">Siniestralidad de los últimos 5
                            años</label>
                        <input class="inputForm" type="file" name="accidentRate" id="accidentRate">
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="input-group mb-3">
                        <label class="input-group-text" for="crFormSigned">Formulario de casco relleno y
                            firmado</label>
                        <input class="inputForm" type="file" name="crFormSigned" id="crFormSigned">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="pilotExperienceFormSigned">Experiencia de los pilotos -
                            formulario relleno y
                            firmado</label>
                        <input class="inputForm" type="file" name="pilotExperienceFormSigned"
                            id="pilotExperienceFormSigned">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="otherForms">Formularios de Hangares y formularios varios
                            por cobertura</label>
                        <input class="inputForm" type="file" name="otherForms" id="otherForms">
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
                </div>
                <div class="col-md">
                    <button type="button" id="nextBtn" class="nextButton btn btn-info" onclick="nextPrev(1)"
                        style="color: white">Siguiente</button>

                    <button type="submit" formnovalidate="formnovalidate" id="submitBtn" style="display: none"
                    onclick="jqsubmit()" class="btn btn-info" style="color: white">Enviar</button>

                    {{-- <button type="button" id="submitBtn" class="submitButton"
                    onclick="submitForm('activos_fijos_form')" style="display: none">Guardar</button> --}}
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
@endif
