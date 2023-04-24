<div class="flexColumnCenterContainer">
    <div class="input_group" style="max-width: 450px; resize:both">
        <label>
            <i class="fa-solid fa-bars-staggered"></i>
            Objeto del seguro
        </label>
        <textarea name="object_insurance" id="object_insurance" cols="10" rows="2">{{ $slip->object_insurance }}</textarea>
    </div>
    <div class="input_group" style="max-width: 450px; resize:both">
        <label>
            <i class="fa-solid fa-bars-staggered"></i>
            Cobertura
        </label>
        <textarea name="coverage" id="coverage" cols="10" rows="2">{{ $slip->coverage }}</textarea>
    </div>
    @if ($slip->type_coverage === 16)
        <div class="input_group" style="max-width: 450px">
            <label>
                <i class="fa-solid fa-bars-staggered"></i>
                Periodo de mantenimiento:
            </label>
            <input type="text" name="period_compensation">
        </div>
    @endif
</div>