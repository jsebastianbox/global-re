@if (\Illuminate\Support\Str::contains(\Illuminate\Support\Facades\Request::url(), '/admin/comercial/edit_compromiso/'))
    <label for="" class="lead">Datos básicos</label>
    <hr style="background-color: darkgrey; width: 70%">

    <div class="row mb-3">
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="countrySelect">
                    País productor
                </label>
                <select required class="js-example-basic-single inputForm select_country form-select" name="country_id"
                    onchange="countryLeyJurisdiccion()">
                    <option value="{{ $slip->country_id }}" selected>{{ $countries->find($slip->country_id)->name }}
                    </option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="broker">Broker de Reaseguros</label>
                <select class="js-example-basic-single inputForm select_broker form-select" name="broker">
                    <option value="{{ $slip->broker }}">{{ $slip->broker }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="insuranceBroker">Intermediario de Seguros</label>
                <input type="text" name="insuranceBroker" id="insuranceBroker" class="form-control"
                    value="{{ $slip->insuranceBroker }}">
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="coin">Divisa</label>
                <select name="coin" id="coin">
                    <option value="" disabled>Seleccionar</option>
                    <option value="Dólar canadiense" {{ $slip->coin == 'Dólar canadiense' ? 'selected' : '' }}>
                        Dólar canadiense</option>
                    <option value="Dólar estadounidense" {{ $slip->coin == 'Dólar estadounidense' ? 'selected' : '' }}>
                        Dólar estadounidense</option>
                    <option value="Peso argentino" {{ $slip->coin == 'Peso argentino' ? 'selected' : '' }}>
                        Peso argentino</option>
                    <option value="Peso colombiano" {{ $slip->coin == 'Peso colombiano' ? 'selected' : '' }}>
                        Peso colombiano</option>
                    <option value="Peso dominicano" {{ $slip->coin == 'Peso dominicano' ? 'selected' : '' }}>
                        Peso dominicano</option>
                    <option value="Peso mexicano" {{ $slip->coin == 'Peso mexicano' ? 'selected' : '' }}>
                        Peso mexicano</option>
                    <option value="Real" {{ $slip->coin == 'Real' ? 'selected' : '' }}>Real</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="coin">
                    Tipo de cambio
                </label>
                <input type="number" step="any" name="equivalence" id="equivalence" placeholder="$"
                    class="form-control" value="{{ $slip->equiavlence }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="assignor">Cedente</label>
                <select class="js-example-basic-single inputForm select_cedente form-select" name="assignor">
                    <option value="{{ $slip->assignor }}">{{ $slip->assignor }}</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row mb-1">
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="assignor">Retrocedente</label>
                <input type="text" name="retrocedente" id="retrocedente" class="form-control"
                    value="{{ $slip->retrocedente }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="sector">Sector</label>
                <select class="form-group" name="sector" id="sector">
                    <option value="" selected disabled>Selecciona</option>
                    <option value="public" {{ $slip->sector == 'public' ? 'selected' : '' }}>Público</option>
                    <option value="private" {{ $slip->sector == 'private' ? 'selected' : '' }}>Privado</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="aseguradoName">Nombre del Asegurado</label>
                <input placeholder="" name="insurer" class="form-control" value="{{ $slip->insurer }}">
            </div>
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="activity">Actividad</label>
                <input placeholder="Actividad..." name="activity" class="form-control"
                    value="{{ $slip->activity }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="coverage">Objeto asegurado</label>
                <textarea name="object_insurance" id="object_insurance" cols="30" rows="1" class="form-control">{{ $slip->object_insurance }}</textarea>
            </div>
        </div>

        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="direction">
                    Dirección
                </label>
                <input placeholder="Dirección..." name="direction" class="form-control"
                    value="{{ $slip->direction }}">
            </div>
        </div>
    </div>

    <div class="row my-3">

        <label for="" class="lead">Vigencia</label>
        <hr style="background-color: darkgray; width: 70%">
        <div class="row">
            <div class="col-md-3 my-1">
                <div class="input-group">
                    <label class="input-group-text" for="validity_since">
                        <i class="fa-solid fa-calendar-check"></i>&nbsp;Desde</label>
                    <input type="date" min="" id="validity_since" name="validity_since"
                        value="{{ $slip->validity_since }}" class="form-control">
                </div>
            </div>
            <div class="col-md-3 my-1">
                <div class="input-group">
                    <label class="input-group-text" for="validity_until">
                        <i class="fa-solid fa-calendar-check"></i>&nbsp;Hasta</label>
                    <input type="date" id="validity_until" name="validity_until"
                        value="{{ $slip->validity_until }}" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <label for="" class="lead">Información general</label>
        <hr style="background-color: darkgray">
        {{-- <div class="col-md-4 my-3">
            <div class="input-group mb-3">
                <label class="input-group-text" for="coverage">Cobertura</label>
                <textarea name="coverage" id="coverage" style="resize:both;width:100%;" 
            cols="30" rows="1" class="form-control">{{ !empty($slip->coverage) ? $slip->coverage : '' }}</textarea>
            </div>
        </div> --}}
        <div class="col-md-4 my-3" 
            @if($slip->type_coverage === 11 || $slip->type_coverage === 18 || $slip->type_coverage === 19 || $slip->type_coverage === 20)
                style="display:none;"
            @elseif($slip->insurable_sum > 0 || $slip->insured_sum > 0)
                style="display:none;"
            @else
                style="display:flex;"
            @endif
        >
            <div class="input-group mb-3">
                <label class="input-group-text">Valor asegurado</label>
                <input type="number" step="any" placeholder="Valor.." 
                    name="object_insured_value" class="form-control" 
                    value="{{$slip->object_insured_value}}">
            </div>
        </div>

        <div class="col-md-4 my-3">
            <div class="input-group mb-3">
                <label class="input-group-text" for="tecnico">Asignar t&eacute;cnico</label>
                <select class="js-example-basic-single inputForm select_assigned form-select" name="user_id">
                    <option selected value="{{ $users->find($slip->user_id)->id }}">
                        {{ $users->find($slip->user_id)->name . ' ' . $users->find($slip->user_id)->surname }}</option>
                </select>
            </div>
        </div>
    </div>
@else
    <label for="" class="lead">Datos básicos</label>
    <hr style="background-color: darkgrey; width: 70%">

    <div class="row mb-3">
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="countrySelect">
                    País productor
                </label>
                <select required class="js-example-basic-single inputForm select_country form-select"
                    name="country_id" onchange="countryLeyJurisdiccion()">
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="broker">Broker de Reaseguros</label>
                <select class="js-example-basic-single inputForm select_broker form-select" name="broker">
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="insuranceBroker">Intermediario de Seguros</label>
                <input type="text" name="insuranceBroker" id="insuranceBroker" class="form-control">
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="coin">Divisa</label>
                {{-- <input name="coin" id="coin" placeholder="..." class="form-control"> --}}
                <select name="coin" id="coin">
                    <option value="" disabled>Seleccionar</option>
                    <option value="Dólar canadiense">Dólar canadiense</option>
                    <option selected value="Dólar estadounidense">Dólar estadounidense</option>
                    <option value="Peso argentino">Peso argentino</option>
                    <option value="Peso colombiano">Peso colombiano</option>
                    <option value="Peso dominicano">Peso dominicano</option>
                    <option value="Peso mexicano">Peso mexicano</option>
                    <option value="Real">Real</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="coin">
                    Tipo de cambio
                </label>
                <input type="number" step="any" name="equivalence" id="equivalence" placeholder="$"
                    class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="assignor">Cedente</label>
                <select class="js-example-basic-single inputForm select_cedente form-select" name="assignor">
                </select>
            </div>
        </div>
    </div>
    

    <div class="row mb-1">
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="assignor">Retrocedente</label>
                <input type="text" name="retrocedente" id="retrocedente" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="sector">Sector</label>
                <select class="form-group" name="sector" id="sector">
                    <option value="" selected disabled>Selecciona</option>
                    <option value="public">Público</option>
                    <option value="private">Privado</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="aseguradoName">Nombre del Asegurado</label>
                <input placeholder="" name="insurer" class="form-control">
            </div>
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="activity">Actividad</label>
                <input placeholder="Actividad..." name="activity" class="form-control">
            </div>
        </div>

        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="object_insurance">Objeto asegurado</label>
                <textarea name="object_insurance" id="object_insurance" cols="30" rows="1" class="form-control"></textarea>
            </div>
        </div>

        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="direction">
                    Dirección
                </label>
                <input placeholder="Dirección..." name="direction" class="form-control">
            </div>
        </div>
    </div>

    <div class="row my-3">

        <label for="" class="lead">Vigencia</label>
        <hr style="background-color: darkgray; width: 70%">
        <div class="row">
            <div class="col-md-3 my-1">
                <div class="input-group">
                    <label class="input-group-text" for="validity_since">
                        <i class="fa-solid fa-calendar-check"></i>&nbsp;Desde</label>
                    <input type="date" id="validity_since" name="validity_since"
                        value="{{ date('Y-m-d') }}" class="form-control">
                </div>
            </div>
            <div class="col-md-3 my-1">
                <div class="input-group">
                    <label class="input-group-text" for="validity_until">
                        <i class="fa-solid fa-calendar-check"></i>&nbsp;Hasta</label>
                    <input type="date" id="validity_until" name="validity_until"
                        value="{{ date('Y-m-d', strtotime('+1 year')) }}" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <label for="" class="lead">Información general</label>
        <hr style="background-color: darkgray">
        <div class="col-md-4 my-3">
            <div class="input-group mb-3" id="coberturaContainer">
                <label class="input-group-text" for="coverage">Cobertura</label>
                <textarea name="coverage" id="coverage" style="resize:both;width:100%;" 
                    cols="30" rows="1" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-md-4 my-3 valorAseguradoContainer">
            <div class="input-group mb-3">
                <label class="input-group-text">Valor asegurado</label>
                <input type="number" step="any" placeholder="Valor.." name="object_insured_value" class="form-control">
            </div>
        </div>
        <div class="col-md-4 my-3">
            <div class="input-group mb-3">
                <label class="input-group-text" for="tecnico">Asignar t&eacute;cnico</label>
                <select class="js-example-basic-single inputForm select_assigned form-select" name="user_id">
                </select>
            </div>
        </div>
    </div>
@endif
