<div
    style="
        width: 210px;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        justify-content: center;
        padding: 0.25rem;
        font-size: 6px;
    "
>
    <div>Aclaraciones:</div>
    <div>Tasa de reaseguros: {{$slip->reinsurer_rate}}</div>
    <div>Prima de reaseguros: {{$slip->reinsurance_premium}}</div>
    <div>Notificación de siniestros: -</div>
    <div
        style="
            width: 100%;
            padding: 0.25rem;
            background-color: aliceblue;
            border-radius: 8px;
        "
    >
        Ley y jurisdicción: Este reaseguro será gobernado por y constituido de
        acuerdo con la ley de: {{$slip->country->name}} , y cada parte acuerda
        referir a la jurisdicción exclusiva de las cortes de:
        {{$slip->country->name}} , a menos que ambas partes acuerden referir el
        caso a arbitraje.
    </div>
</div>
