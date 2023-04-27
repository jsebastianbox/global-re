<div style="
        width: 210px;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        justify-content: center;
        padding: 0.25rem;
        font-size: 6px;
    ">
    <div style="
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
            padding: 0.25rem;
            background-color: #e7e7e7;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        ">
        <span style="font-weight: 700">Limite de edad</span>
        <div style="
                width: 100%;
                display: flex;
                flex-direction: column;
                gap: 0.25rem;
            ">
            <span>
                Edad Máxima de Aceptación:
                {{ $slip_type->max_age_approve }}</span>
            <span>
                Edad Máxima de Cancelación:
                {{ $slip_type->max_age_approve }}</span>
        </div>
    </div>

    <div style="
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
            padding: 0.25rem;
            background-color: #e7e7e7;
            border-radius: 8px;
        ">
        <span style="font-weight: 700">Beneficiarios</span>
        <div style="
                width: 100%;
                display: flex;
                flex-direction: column;
                gap: 0.25rem;
            ">
            <span>
                Beneficiario(s) en caso de muerte:
                {{ $slip_type->beneficiary_death }}</span>
            <span>
                Beneficiario(s) en caso de incapacidad:
                {{ $slip_type->beneficiary_disability }}</span>
        </div>
    </div>

    @if (count($object_insurance) > 0) @foreach ($object_insurance as $key =>
    $item )
    <div style="font-size: 12px; font-weight: 600">Objeto(s) Del Seguro</div>
    <div style="
            width: 100%;
            padding: 0.25rem;
            background-color: aliceblue;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            gap: 2px;
        ">
        <strong> #{{ $key + 1 }} </strong>
        <span>Nombre: {{ $item->name }}</span>
        <span>Fecha de Nacimiento: {{ $item->birthday }}</span>
        <span>Edad: {{ $item->age }}</span>
        <span>Sexo: {{ $item->sex_merchant == 'Masculino' }}</span>
        <span>Actividad: {{ $item->activity_merchant }}</span>
        <span>Límite: {{ $item->limit }}</span>
    </div>
    @endforeach @endif

    <div>Asegurados: {{ $slip->num_insurer }}</div>
    <div>Base de cobertura: -</div>

    @if ($slip->insurable_value === 2 || $slip->insurable_value === 4)
    <div> Cúmulo asegurado: {{ $slip->insurable_value }} </div>
</div>
@endif


<div style="font-size: 12px; font-weight: 600"> Coberturas adicionales </div>
<div style="
            width: 100%;
            padding: 0.25rem;
            background-color: aliceblue;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            gap: 2px;
            margin-bottom: 2rem;
        ">
    <strong> #1 </strong>
    <span>Cobertura: </span>
    <span>Campo adicional: </span>
    <span>USD: </span>
    <span>Campo adicional: </span>
</div>

<div style="font-size: 12px; font-weight: 600"> Cláusulas adicionales </div>
<div style="
            width: 100%;
            padding: 0.25rem;
            background-color: aliceblue;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            gap: 2px;
        ">
    <strong> #1 </strong>
    <span>Cláusula: </span>
    <span>Campo adicional: </span>
    <span>USD: </span>
    <span>Campo adicional: </span>
</div>

<div style="font-size: 12px; font-weight: 600"> Exclusiones </div>
<div style="
            width: 100%;
            padding: 0.25rem;
            background-color: aliceblue;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            gap: 2px;
        ">
    <strong> #1 </strong>
    <span>Exclusión: </span>
    <span>Campo adicional: </span>
    <span>USD: </span>
    <span>Campo adicional: </span>
</div>

<div style="font-size: 12px; font-weight: 600"> Deducibles </div>
<div style="
            width: 100%;
            padding: 0.25rem;
            background-color: aliceblue;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            gap: 2px;
            margin-bottom: 3rem;
        ">
    <strong> #1 </strong>
    <span>Detalle: </span>
    <span>%: </span>
    <span>Valor del siniestro: </span>
    <span>Valor asegurado: </span>
    <span>Mínimo: </span>
    <span>USD: </span>
</div>

<div style="font-size: 12px; font-weight: 600"> Lista de Reaseguradores </div>
<div style="
            width: 100%;
            padding: 0.25rem;
            background-color: aliceblue;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            gap: 2px;
        ">
    <strong> #1 </strong>
    <span>Reasegurador: </span>
    <span>Suscriptor: </span>
    <span>%: </span>
    <span>Observaciones: </span>
    <span>Fecha de creación: </span>
    <span>Fecha de modificación: </span>
</div>

<div style="font-size: 12px; font-weight: 600"> Indemnización </div>
<div style="font-size: 8px; font-weight: 600"> Porcentaje de indemnización de acuerdo al límite de edad, para la
    cobertura de vida y accidentes personales.
</div>
<div style="font-size: 8px; font-weight: 600"> Desde los ___ hasta los ___ años, al ___ % de la suma asegurada.
</div>

<div style="width: 100%;padding: 0;margin: 0;display: flex;flex-direction: column;gap: 6px;">
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Enajenación mental que impida todo trabajo. </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            0% </div>
    </div>
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Pérdida total de los dedos de ambas manos, comprendiendo todas las falanges </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            100% </div>
    </div>
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Pérdida o inutilización total y permanente de una mano </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            75% </div>
    </div>
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Pérdida de todos los dedos de una mano </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            70% </div>
    </div>
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Pérdida o inutilización total y permanente de un pie </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            50% </div>
    </div>
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Pérdida total o irreparable de la visión de un ojo </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            50% </div>
    </div>
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Pérdida total permanente de la audición de un oído </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            30%
        </div>
    </div>
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Pérdida de un miembro principal. </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            30%
        </div>
    </div>
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Pérdida de los dedos pulgar e índice de la misma mano. </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            30%
        </div>
    </div>
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Pérdida del pulgar derecho. </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            30%
        </div>
    </div>
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Pérdida del pulgar izquierdo. </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            30%
        </div>
    </div>
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Pérdida de las falanges del pulgar derecho. </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            30%
        </div>
    </div>
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Pérdida de las falanges del pulgar izquierdo. </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            30%
        </div>
    </div>
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Pérdida de una de las falanges del pulgar derecho. </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            30%
        </div>
    </div>
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Pérdida de una de las falanges del pulgar izquierdo. </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            30%
        </div>
    </div>
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Pérdida del dedo grande del pie. </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            30%
        </div>
    </div>
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Pérdida de tres falanges de cualquier otro dedo de la mano derecha. </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            30%
        </div>
    </div>
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Pérdida de dos falanges de cualquier otro dedo de la mano izquierda. </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            30%
        </div>
    </div>
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Pérdida de dos falanges de cualquier otro dedo de la mano derecha. </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            30%
        </div>
    </div>
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Pérdida de dos falanges de cualquier otro dedo de la mano izquierda. </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            30%
        </div>
    </div>
    <div style="
        width: 100%;
        padding: 0.25rem;
        background-color: aliceblue;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        gap: 2px;
        ">
        <strong> Pérdida de una falange de cualquier otro dedo de la mano derecha. </strong>
        <div
            style="background-color: #fff;border-radius: 8px;color: #000;font-weight: 700;padding: 0.25rem;width: fit-content;">
            30%
        </div>
    </div>
</div>

</div>