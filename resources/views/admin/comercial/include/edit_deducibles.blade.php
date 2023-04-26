
<div id="DeduciblesContainer" class="row">
    <div class="flexColumnCenterContainer" style="margin:1rem 0">
        @if (count($slip->deductible) > 0)
            @foreach ($slip->deductible as $key => $item)
                <div class="d-flex mb-2">
                    <div class="input-group">
                        <input class="form-control" type="text" name="description_deductible[]"
                            placeholder="Detalle.."
                            value="{{ $item->description_deductible }}">
                        <input class="form-control" type="number" min="0" max="100" step="any"
                            placeholder="%" name="sinister_value[]" min="0"
                            value="{{ $item->sinister_value }}">
                        <span class="input-group-text">valor del siniestro</span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">%</span>
                        <input class="form-control" type="number" min="0" max="100" step="any"
                            name="insured_value_array[]"
                            value="{{ $item->insured_value }}">
                        <span class="input-group-text">del valor asegurado</span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">mínimo</span>
                        <input class="form-control" type="text" name="minimum[]" placeholder="..."
                        value="{{ $item->minimum }}">
                        <textarea rows="1" type="text" name="description2_deductible[]" placeholder="Descripción del deducible...">{{ $item->description2_deductible }}</textarea>
                    </div>

                </div>
            @endforeach
        @else
            <div class="d-flex mb-2">
                <div class="input-group">
                    <input class="form-control" type="text" name="description_deductible[]"
                        placeholder="Detalle..">
                    <input class="form-control" type="number" min="0" max="100" step="any"
                        placeholder="%" name="sinister_value[]" min="0">
                    <span class="input-group-text">valor del siniestro</span>
                </div>
                <div class="input-group">
                    <span class="input-group-text">%</span>
                    <input class="form-control" type="number" min="0" max="100" step="any"
                        name="insured_value_array[]">
                    <span class="input-group-text">del valor asegurado</span>
                </div>
                <div class="input-group">
                    <span class="input-group-text">mínimo</span>
                    <input class="form-control" type="text" name="minimum[]" placeholder="...">
                    <textarea rows="1" type="text" name="description2_deductible[]" placeholder="Descripción del deducible..."></textarea>
                </div>

            </div>
        @endif
    </div>
</div>
<div class="row col-md-4 mb-4" style="margin-inline: .1rem">
    <button type="button" class="btn btn-info" style="color: white"
        onclick="addDeducible(event, '')">Agregar deducible</button>
</div>