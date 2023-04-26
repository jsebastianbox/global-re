<div id="deduciblesContainer">
    @if (count($slip->deductible) > 0)
        @foreach ($slip->deductible as $key => $item)
            <div class="flexColumnCenterContainer" style="margin: 2rem 0">
                <div class="flexRowWrapContainer" style="margin:1.2rem 0">
                    <input type="text" name="description_deductible[]" value="{{ $item->description_deductible }}">
                    <div class="labelStyleContainer">
                        <p>
                            <i class="fa-solid fa-percent"></i>
                            valor del siniestro
                        </p>
                        <input type="number" style="max-width:95px;text-align: end;"
                            value="{{ $item->sinister_value }}" name="sinister_value[]" min="0">
                    </div>
                    <div class="labelStyleContainer">
                        <p>
                            <i class="fa-solid fa-percent"></i>
                            valor asegurado
                        </p>
                        <input type="number" value="{{ $item->insured_value }}" name="insured_value_array[]" min="0"
                            style="max-width:95px;text-align: end;">
                    </div>
                    <div class="labelStyleContainer">
                        <input type="text" name="minimum[]" style="text-align:end" value="{{ $item->minimum }}">
                        <p>
                            mínimo
                        </p>
                    </div>
                    <textarea type="text" name="description2_deductible[]" placeholder="...">
                        {{ $item->description2_deductible }}</textarea>
                </div>
            </div>
        @endforeach
    @else
        {{-- Deducible 1 --}}
        <div class="flexColumnCenterContainer" style="margin: 2rem 0">
            <div class="flexRowWrapContainer" style="margin:1.2rem 0">
                <input type="text" name="description_deductible[]" placeholder="Detalle..">
                <div class="labelStyleContainer">
                    <p>
                        <i class="fa-solid fa-percent"></i>
                        valor del siniestro
                    </p>
                    <input type="number" style="max-width:95px;text-align: end;" placeholder="%"
                        name="sinister_value[]" min="0">
                </div>
                <div class="labelStyleContainer">
                    <p>
                        <i class="fa-solid fa-percent"></i>
                        valor asegurado
                    </p>
                    <input type="number" placeholder="%" name="insured_value_array[]" min="0"
                        style="max-width:95px;text-align: end;">
                </div>
                <div class="labelStyleContainer">
                    <input type="number" name="minimum[]" style="text-align:end" placeholder="USD">
                    <p>
                        mínimo
                    </p>
                </div>
                <textarea type="text" name="description2_deductible[]" placeholder="..."></textarea>
            </div>
        </div>
    @endif

</div>

<div class="tableContainer">
    <button class="btn btn-info" onclick="addDeducible(event)">Agregar deducible</button>
</div>


<div class="row">
    <h4 for="" class="lead">Gestión de Reaseguros</h4>
</div>
<div class="row">
    <hr style="background-color: darkgrey; width: 70%">
</div>
<div class="row">
    <div class="tableContainer">
        {{-- @include('admin.tablas.calculo') --}}
        @include('include.reinsurer_table')
    </div>
</div>
