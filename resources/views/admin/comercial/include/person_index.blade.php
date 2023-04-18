@if (\Illuminate\Support\Str::contains(\Illuminate\Support\Facades\Request::url(), '/admin/comercial/edit_compromiso/'))
    <label for="" class="lead">Información inicial</label>
    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="input-group imput-group-sm mb-3">
                <label class="input-group-text" for="countrySelect">
                    País productor
                </label>
                <select class="js-example-basic-single inputForm select_country form-select" name="country_id" onchange="countryLeyJurisdiccion()">
                    <option selected value="{{ $slip->country_id }}">{{ $countries->find($slip->country_id)->name }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="insuranceBroker">
                    Intermediario de seguros
                </label>
                <input type="text" name="insuranceBroker" id="insuranceBroker" class="form-control"  value="{{ $slip->insuranceBroker }}"/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="broker">
                    Broker de Reaseguros
                </label>
                <select class="js-example-basic-single inputForm select_broker" name="broker">
                    <option value="{{ $slip->broker }}" selected>{{ $slip->broker }}</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="input-group mb-3">
                <span class="input-group-text" for="coin">Divisa</span>
                {{-- <input name="coin" id="coin" placeholder="..." class="form-control"> --}}
                <select name="coin" id="coin">
                    <option value="" disabled>Seleccionar</option>
                    <option {{ $slip->coin == "Dólar canadiense" ? 'selected' : '' }} value="Dólar canadiense">Dólar canadiense</option>
                    <option {{ $slip->coin == "Dólar estadounidense" ? 'selected' : '' }} value="Dólar estadounidense">Dólar estadounidense</option>
                    <option {{ $slip->coin == "Peso argentino" ? 'selected' : '' }} value="Peso argentino">Peso argentino</option>
                    <option {{ $slip->coin == "Peso colombiano" ? 'selected' : '' }} value="Peso colombiano">Peso colombiano</option>
                    <option {{ $slip->coin == "Peso dominicano" ? 'selected' : '' }} value="Peso dominicano">Peso dominicano</option>
                    <option {{ $slip->coin == "Peso Mexicano" ? 'selected' : '' }} value="Peso mexicano">Peso mexicano</option>
                    <option {{ $slip->coin == "Real" ? 'selected' : '' }} value="Real">Real</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="coin">
                    Tipo de cambio
                </label>
                <input type="number" step="any" name="equivalence" id="equivalence" placeholder="$"
                    class="form-control" value="{{ $slip->equivalence }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="assignor">
                    Cedente
                </label>
                <select class="js-example-basic-single inputForm select_cedente" name="assignor">
                    <option value="{{ $slip->assignor }}" selected>{{ $slip->assignor }}</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="sector">Sector</label>
                <select class="form-select" name="sector" id="sector" required>
                    <option value="" selected disabled>Selecciona</option>
                    <option {{ $slip->sector == "public" ? 'selected' : '' }} value="public">Público</option>
                    <option {{ $slip->sector == "private" ? 'selected' : '' }} value="private">Privado</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="aseguradoName">
                    Nombre del asegurado
                </label>
                <input placeholder="Nombre del asegurado..." name="insurer" class="form-control" value="{{ $slip->insurer }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="activity">
                    Actividad
                </label>
                <input placeholder="Actividad..." name="activity" class="form-control" value="{{ $slip->activity }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="direction">
                    Dirección
                </label>
                <input placeholder="Dirección..." name="direction" class="form-control" value="{{$slip->direction}}">
            </div>
        </div>
    </div>

    <div class="row my-3">
        <label for="" class="lead">Vigencia</label>
        <hr style="background-color: darkgray">
        <div class="row">
            <div class="col-md-3 my-1">
                <div class="input-group">
                    <label class="input-group-text" for="validity_since">
                        <i class="fa-solid fa-calendar-check"></i>&nbsp;Desde</label>
                    <input type="date" id="validity_since" name="validity_since" value="{{ $slip->validity_since }}"
                        class="form-control">
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

        <div class="row mt-3">
            <label for="" class="lead">Información general</label>
            <hr style="background-color: darkgray">
            <div class="col-md-4" style="{{$slip->insurable_value > 0 ? 'display:none' : 'display:flex'}}">
                {{-- Si es que es vida individual --}}

                <div id="persona_asegurada">
                    <div class="input-group my-3">
                        <span class="input-group-text">Persona asegurada</span>
                        <input class="form-control" placeholder="Persona asegurada..." name="person_insured"
                            id="insuredPerson" value="{{ $slip->person_insured }}">
                    </div>
                </div>
                {{-- ///////////////////////// --}}

                {{-- Si es que es vida colectiva --}}

                <div id="objeto_asegurado" style="display: none">
                    <div class="input-group my-3">
                        <span class="input-group-text">Objeto asegurado</span>
                        <input class="form-control" placeholder="Objeto asegurado..." name="object_insured"
                            id="insuredObject" value="{{ $slip->object_insured }}">
                    </div>
                </div>

                {{-- //////////////////////// --}}
            </div>
            <div class="col-md-4 my-3">
                <div class="input-group">
                    <label class="input-group-text" for="coverage">Cobertura</label>
                    <textarea name="coverage" id="coverage" style="resize:both;width:100%;" 
 cols="30" rows="1" class="form-control">{{ $slip->coverage }}</textarea>
                </div>
            </div>
            <div class="col-md-4 my-3">
                <div class="input-group">
                    <label class="input-group-text" for="assignor">Retrocedente</label>
                    <input class="form-control" type="text" name="retrocedente" id="retrocedente" value="{{$slip->retrocedente}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 my-3" style="{{$slip->insurable_value > 0 ? 'display:none' : 'display:flex'}}">
                <div class="input-group mb-3">
                    <label class="input-group-text">Valor asegurado</label>
                    <input type="number" step="any" placeholder="Valor.." name="person_insured_value" class="form-control" value="{{$slip->person_insured_value}}">
                </div>
            </div>
        </div>
    </div>
@else
    <label for="" class="lead">Información inicial</label>
    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="input-group imput-group-sm mb-3">
                <label class="input-group-text" for="countrySelect">
                    País productor
                </label>
                <select class="js-example-basic-single inputForm select_country form-select" name="country_id" onchange="countryLeyJurisdiccion()">
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="insuranceBroker">
                    Intermediario de seguros
                </label>
                <input type="text" name="insuranceBroker" id="insuranceBroker" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="broker">
                    Broker de Reaseguros
                </label>
                <select class="js-example-basic-single inputForm select_broker" name="broker">
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="input-group mb-3">
                <span class="input-group-text" for="coin">Divisa</span>
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
                <label class="input-group-text" for="assignor">
                    Cedente
                </label>
                <select class="js-example-basic-single inputForm select_cedente" name="assignor">
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="sector">Sector</label>
                <select class="form-select" name="sector" id="sector" required>
                    <option value="" selected disabled>Selecciona</option>
                    <option value="public">Público</option>
                    <option value="private">Privado</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="aseguradoName">
                    Nombre del asegurado
                </label>
                <input placeholder="Nombre del asegurado..." name="insurer" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="activity">
                    Actividad
                </label>
                <input placeholder="Actividad..." name="activity" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
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
        <hr style="background-color: darkgray">
        <div class="row">
            <div class="col-md-3 my-1">
                <div class="input-group">
                    <label class="input-group-text" for="validity_since">
                        <i class="fa-solid fa-calendar-check"></i>&nbsp;Desde</label>
                    <input type="date" id="validity_since" name="validity_since" value="{{ date('Y-m-d') }}"
                        class="form-control">
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

        <div class="row mt-3">
            <label for="" class="lead">Información general</label>
            <hr style="background-color: darkgray">
            <div class="col-md-4">
                {{-- Si es que es vida individual --}}

                <div id="persona_asegurada" style="display: initial">
                    <div class="input-group my-3">
                        <span class="input-group-text">Persona asegurada</span>
                        <input class="form-control" placeholder="Persona asegurada..." name="person_insured"
                            id="insuredPerson">
                    </div>
                </div>
                {{-- ///////////////////////// --}}

                {{-- Si es que es vida colectiva --}}

                <div id="objeto_asegurado" style="display: none">
                    <div class="input-group my-3">
                        <span class="input-group-text">Objeto asegurado</span>
                        <input class="form-control" placeholder="Objeto asegurado..." name="object_insured"
                            id="insuredObject">
                    </div>
                </div>

                {{-- //////////////////////// --}}
            </div>
            <div class="col-md-4 my-3">
                <div class="input-group">
                    <label class="input-group-text" for="coverage">Cobertura</label>
                    <textarea name="coverage" cols="30" rows="1" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-4 my-3">
                <div class="input-group">
                    <label class="input-group-text" for="assignor">Retrocedente</label>
                    <input class="form-control" type="text" name="retrocedente" id="retrocedente">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mt-3 valorAseguradoContainer">
                <div class="input-group mb-3">
                    <label class="input-group-text">Valor asegurado</label>
                    <input type="number" step="any" placeholder="Valor.." name="person_insured_value" class="form-control">
                </div>
            </div>
        </div>

    </div>
@endif
