<div class="two-sides">


    <div class="left_side">

        {{-- Persona asignada --}}
        <div class="input_group">
            <label for="apTipoCobertura">
                <i class="fa-solid fa-rectangle-list"></i>
                Persona Asignada
            </label>
            <select disabled class="select_assigned js-example-basic-single inputForm" name="user_id">
                <option value="{{ $slip->user->id }}">{{ $slip->user->name }} {{ $slip->user->surname }}</option>
            </select>
        </div>
        {{-- fecha --}}
        <div class="input_group">
            <label for="Fecha">
                <i class="fa-solid fa-calendar-check"></i>
                Fecha
            </label>
            <input type="datetime-local" id="Fecha" name="date" value="{{ $slip->updated_at }}" disabled
                pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}">
        </div>
        {{-- tipo de cobertura --}}
        <div class="input_group">
            <label for="apTipoCobertura">
                <i class="fa-solid fa-rectangle-list"></i>
                Tipo de cobertura
            </label>
            <select class="select_type_coverage js-example-basic-single inputForm" name="type_coverage" disabled>
                <option value="{{ $slip->type->id }}" selected>{{ $slip->type->name }}</option>
            </select>
        </div>
        {{-- Pais productor --}}
        <div class="input_group">
            <label for="apPaisProductor">
                <i class="fa-solid fa-rectangle-list"></i>
                Pais Productor
            </label>
            <select class="js-example-basic-single inputForm select_country" name="country_id" disabled>
                <option value="{{ $slip->country_id }}" selected>{{ $slip->country->name }}</option>
            </select>
        </div>
        {{-- Broker Local --}}
        <div class="input_group">
            <label for="BrokerLocal">
                <i class="fa-solid fa-rectangle-list"></i>
                Broker Local
            </label>

            @if ($slip->broker == 'new_sercorp')
                <input type="text" id="BrokerLocal" name="broker" value="Otro" disabled>
            @else
                <input type="text" id="BrokerLocal" name="broker" value="{{ $slip->broker }}" disabled>
            @endif
        </div>
        {{-- Cedente --}}
        <div class="input_group">
            <label for="Cedente">
                <i class="fa-solid fa-rectangle-list"></i>
                Cedente
            </label>
            <input type="text" id="Cedente" name="assignor" value="{{ $slip->assignor }}" disabled>
        </div>
        {{-- Sector --}}
        <div class="input_group">
            <label for="Sector">
                <i class="fa-solid fa-bars-staggered"></i>
                Sector
            </label>
            <select name="sector" id="Sector" disabled>
                @if ($slip->sector != 'private')
                    <option value="{{ $slip->sector }}"> Público</option>
                @else
                    <option value="{{ $slip->sector }}">Privado</option>
                @endif
            </select>
        </div>

        {{-- Retrocedente --}}
        <div class="input_group">
            <label for="Retrocedente">
                <i class="fa-solid fa-bars-staggered"></i>
                Retrocedente
            </label>
            <input type="text" id="retrocedente" name="retrocedente" value="{{ $slip->retrocedente }}" disabled>
        </div>


    </div>

    <div class="right_side">

        {{-- Asegurado --}}
        <div class="input_group">
            <label for="Asegurado">
                <i class="fa-solid fa-bars-staggered"></i>
                Asegurado
            </label>
            <input type="text" id="Asegurado" name="insurer" value="{{ $slip->insurer }}" disabled>
        </div>
        {{-- Direccion --}}
        <div class="input_group">
            <label for="Direccion">
                <i class="fa-solid fa-bars-staggered"></i>
                Dirección
            </label>
            <input type="text" id="Direccion" name="direction" value="{{ $slip->direction }}">
        </div>
        {{-- Actividad --}}
        <div class="input_group">
            <label for="Actividad">
                <i class="fa-solid fa-bars-staggered"></i>
                Actividad
            </label>
            <input type="text" id="Actividad" name="activity" value="{{ $slip->activity }}" disabled>
        </div>
        {{-- Moneda --}}
        <div class="input_group">
            <label for="coin">
                <i class="fa-solid fa-coins"></i>
                Moneda
            </label>
            <input name="coin" id="coin" placeholder="$" value="{{ $slip->coin }}">
        </div>
        {{-- Tipo de cambio --}}
        <div class="input_group">
            <label for="coin">
                <i class="fa-solid fa-coins"></i>
                Tipo de cambio
            </label>
            <input name="equivalence" id="equivalence" placeholder="$" value="{{ $slip->equivalence }}">
        </div>
        {{-- Vigencia --}}
        <h5 class="slipTitle">Vigencia:</h5>
        <div class="input_group">
            <label for="VigenciaDesde">
                <i class="fa-solid fa-calendar-check"></i>
                Desde
            </label>
            <input input type="text" id="validity_since" name="validity_since"
                pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}" value="{{ $slip->validity_since }}">
        </div>
        <div class="input_group">
            <label for="VigenciaHasta">
                <i class="fa-solid fa-calendar-check"></i>
                Hasta
            </label>
            <input input type="text" id="validity_until" name="validity_until"
                pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}" value="{{ $slip->validity_until }}">
        </div>

        {{-- Intermediario de Seguros --}}
        <div class="input_group">
            <label for="insuranceBroker">
                <i class="fa-solid fa-bars-staggered"></i>
                Intermediario de Seguros
            </label>
            <input type="text" id="insuranceBroker" name="insuranceBroker" value="{{ $slip->insuranceBroker }}" disabled>
        </div>

        @if ($slip->type_coverage != 2 && $slip->type_coverage !== 4 && $slip->type_coverage !== 5 && $slip->type_coverage !== 6 && $slip->type_coverage !== 7 && $slip->type_coverage !== 8 && $slip->type_coverage !== 11 && $slip->type_coverage !== 12 && $slip->type_coverage !== 13 && $slip->type_coverage !== 14 && $slip->type_coverage !==15 && $slip->type_coverage !== 16 && $slip->type_coverage !== 17 && $slip->type_coverage !== 18 && $slip->type_coverage !== 19 && $slip->type_coverage !== 20 && $slip->type_coverage !== 33 && $slip->type_coverage !== 35 && $slip->type_coverage !== 36 && $slip->type_coverage !== 37)
            <div class="input_group">
                <label >
                    <i class="fa-solid fa-bars-staggered"></i>
                    Valor Asegurado
                </label>
                <input type="text" name="valor_asegurado" id="value_for_calculos" value="{{ $slip->valor_asegurado }}" disabled>
            </div>
        @endif

    
        {{-- campos con condicionales por tipo de cobertura --}}
        @if ($slip->type_coverage === 2 || $slip->type_coverage === 4)
            <div class="input_group">
                <label >
                    <i class="fa-solid fa-bars-staggered"></i>
                    Cúmulo Asegurado
                </label>
                <input type="text" name="insurable_value" id="value_for_calculos" value="{{ $slip->insurable_value }}" disabled>
            </div>
        @endif
    </div>
</div>

