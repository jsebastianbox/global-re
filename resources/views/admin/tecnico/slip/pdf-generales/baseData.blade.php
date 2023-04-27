<div
    style="
        width: 210px;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        align-items: center;
        justify-content: center;
        padding: 0.25rem;
    "
>
    <div
        style="
            width: 100%;
            display: flex;
            gap: 0.5rem;
            align-items: center;
            font-size: 12px;
        "
    >
        <!-- <span
            style="
                color: #fff;
                background-color: #ccc;
                padding: 0.25rem;
                border-radius: 50%;
                height: 10px;
                width: fit-content;
                font-size: 10px;
                line-height: 5px;
                text-align: center;
            "
        >
            1
        </span> -->
    <div style="font-weight: 600"> {{ $slip->type->name }} </div>
    </div>

    <div
        style="
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            font-size: 6px;
        "
    >
        <div>
            Persona asignada: {{ $slip->user->name }} {{ $slip->user->surname }}
        </div>
        <div>Fecha: {{ $slip->updated_at }}</div>
        <div>Tipo de cobertura: {{ $slip->type->name }}</div>
        <div>País productor: {{ $slip->country->name }}</div>

        @if ($slip->broker == 'new_sercorp')
        <div>Broker local: {{ $slip->country->name }}</div>
        @else
        <div>Broker local: {{ $slip->broker }}</div>
        @endif

        <div>Cedente: {{ $slip->assignor }}</div>

        @if ($slip->sector != 'private')
        <div>Cedente: Público</div>
        @else
        <div>Cedente: Privado</div>
        @endif

        <div>Retrocedente: {{ $slip->retrocedente }}</div>
        <div>Asegurado: {{ $slip->insurer }}</div>
        <div>Dirección: {{ $slip->direction }}</div>
        <div>Actividad: {{$slip->activity }}</div>
        <div>Moneda: {{ $slip->coin }}</div>
        <div>Tipo de cambio: ${{ $slip->equivalence }}</div>
        <div>
            Vigencia: Desde {{ $slip->validity_since }} hasta
            {{$slip->validity_until}}
        </div>
        <div>Intermediario de seguros: {{ $slip->insuranceBroker }}</div>

        @if ($slip->type_coverage != 2 && $slip->type_coverage !== 4 &&
        $slip->type_coverage !== 5 && $slip->type_coverage !== 6 &&
        $slip->type_coverage !== 7 && $slip->type_coverage !== 8 &&
        $slip->type_coverage !== 11 && $slip->type_coverage !== 12 &&
        $slip->type_coverage !== 13 && $slip->type_coverage !== 14 &&
        $slip->type_coverage !==15 && $slip->type_coverage !== 16 &&
        $slip->type_coverage !== 17 && $slip->type_coverage !== 18 &&
        $slip->type_coverage !== 19 && $slip->type_coverage !== 20 &&
        $slip->type_coverage !== 33 && $slip->type_coverage !== 35 &&
        $slip->type_coverage !== 36 && $slip->type_coverage !== 37)
        <div>Valor Asegurado: {{ $slip->valor_asegurado }}</div>
        @endif 
        
        @if ($slip->type_coverage === 2 || $slip->type_coverage === 4)
        <div>Cúmulo Asegurado:{{ $slip->insurable_value }}</div>
        @endif

    </div>
</div>
