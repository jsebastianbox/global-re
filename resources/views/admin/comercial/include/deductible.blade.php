@if(\Illuminate\Support\Str::contains(\Illuminate\Support\Facades\Request::url(), '/admin/comercial/edit_compromiso/'))
<div id="deduciblesContainer">
    {{-- Deducible 1 --}}
    <div class="flexColumnCenterContainer" style="margin: 2rem 0">
        <input type="text" id="incendioDeducible1" name="description_deductible[]"
                placeholder="Deducible..">
        <div class="flexRowWrapContainer" style="margin:1.2rem 0">
            <div class="labelStyleContainer">
                <p>
                    <i class="fa-solid fa-percent"></i>
                    valor del siniestro
                </p>
                <input type="number" style="width: max-content;text-align: end;" class="inputDeducible" placeholder="..." name="sinister_value[]" min="0" data-money>
            </div>
            <div class="labelStyleContainer">
                <p >
                    <i class="fa-solid fa-percent"></i>
                    valor asegurado
                </p>
                <input type="number" placeholder="..." name="insured_value_array[]" min="0" data-money
                    class="inputDeducible" style="width: max-content;text-align: end;">
            </div>
            <div class="labelStyleContainer">
                <p>
                    <i class="fa-solid fa-dollar-sign"></i>
                    mínimo en USD
                </p>
                <input type="number" name="minimum[]" style="text-align:end" class="inputDeducible" placeholder="USD" data-money>
            </div>
        </div>
    </div>
        {{-- Deducible 2 --}}
    <div class="flexColumnCenterContainer" style="margin: 2rem 0">
        <input type="text" id="incendioDeducible1" name="description_deductible[]"
                placeholder="Deducible..">
        <div class="flexRowWrapContainer" style="margin:1.2rem 0">
            <div class="labelStyleContainer">
                <p>
                    <i class="fa-solid fa-percent"></i>
                    % valor del siniestro
                </p>
                <input type="number" style="width: max-content;text-align: end;" class="inputDeducible" placeholder="..." name="sinister_value[]" min="0" data-money>
            </div>
            <div class="labelStyleContainer">
                <p >
                    <i class="fa-solid fa-percent"></i>
                    % valor asegurado
                </p>
                <input type="number" placeholder="..." name="insured_value_array[]" min="0"
                    class="inputDeducible" style="width: max-content;text-align: end;">
            </div>
            <div class="labelStyleContainer">
                <p>
                    <i class="fa-solid fa-dollar-sign"></i>
                    mínimo en USD
                </p>
                <input type="number" name="minimum[]" style="text-align:end" class="inputDeducible" placeholder="USD" data-money>
            </div>
        </div>
    </div>

</div>

<div class="tableContainer">
    <input type="button" value="Agregar campo" onclick="addCoberturaRow('coberturaAdicional')">
</div>
@else
<div id="deduciblesContainer">
    {{-- Deducible 1 --}}
    <div class="flexColumnCenterContainer" style="margin: 2rem 0">
        <input type="text" id="incendioDeducible1" name="description_deductible[]"
                placeholder="Deducible..">
        <div class="flexRowWrapContainer" style="margin:1.2rem 0">
            <div class="labelStyleContainer">
                <p>
                    <i class="fa-solid fa-percent"></i>
                    valor del siniestro
                </p>
                <input type="number" style="width: max-content;text-align: end;" class="inputDeducible" placeholder="..." name="sinister_value[]" min="0" data-money>
            </div>
            <div class="labelStyleContainer">
                <p >
                    <i class="fa-solid fa-percent"></i>
                    valor asegurado
                </p>
                <input type="number" placeholder="..." name="insured_value_array[]" min="0" data-money
                    class="inputDeducible" style="width: max-content;text-align: end;">
            </div>
            <div class="labelStyleContainer">
                <p>
                    <i class="fa-solid fa-dollar-sign"></i>
                    mínimo en USD
                </p>
                <input type="number" name="minimum[]" style="text-align:end" class="inputDeducible" placeholder="USD" data-money>
            </div>
        </div>
    </div>
        {{-- Deducible 2 --}}
    <div class="flexColumnCenterContainer" style="margin: 2rem 0">
        <input type="text" id="incendioDeducible1" name="description_deductible[]"
                placeholder="Deducible..">
        <div class="flexRowWrapContainer" style="margin:1.2rem 0">
            <div class="labelStyleContainer">
                <p>
                    <i class="fa-solid fa-percent"></i>
                    % valor del siniestro
                </p>
                <input type="number" style="width: max-content;text-align: end;" class="inputDeducible" placeholder="..." name="sinister_value[]" min="0" data-money>
            </div>
            <div class="labelStyleContainer">
                <p >
                    <i class="fa-solid fa-percent"></i>
                    % valor asegurado
                </p>
                <input type="number" placeholder="..." name="insured_value_array[]" min="0"
                    class="inputDeducible" style="width: max-content;text-align: end;">
            </div>
            <div class="labelStyleContainer">
                <p>
                    <i class="fa-solid fa-dollar-sign"></i>
                    mínimo en USD
                </p>
                <input type="number" name="minimum[]" style="text-align:end" class="inputDeducible" placeholder="USD" data-money>
            </div>
        </div>
    </div>

</div>

<div class="tableContainer">
    <input type="button" value="Agregar campo" onclick="addCoberturaRow('coberturaAdicional')">
</div>
@endif