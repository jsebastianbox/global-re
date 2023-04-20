<div class="flexColumnCenterContainer">
    <div class="input_group" style="max-width: 450px">
        <label>
            <i class="fa-solid fa-bars-staggered"></i>
            Objeto del seguro
        </label>
        <textarea name="object_insurance" id="object_insurance" cols="30" rows="1">{{ $slip->object_insurance }}</textarea>
    </div>
    <div class="input_group" style="max-width: 450px">
        <label>
            <i class="fa-solid fa-bars-staggered"></i>
            Cobertura
        </label>
        <textarea name="coverage" id="coverage" cols="30" rows="1">{{ $slip->coverage }}</textarea>
    </div>
</div>