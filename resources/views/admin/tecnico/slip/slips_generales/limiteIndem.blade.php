<div class="two-sides">
    <div class="left_side">
        <div class="input_group">
            <label for="">Límite de indemnización</label>
            <input value="{{$slip_type->limit_compensation}}" type="number" step="any" class="form-control" name="limit_compensation">
        </div>
    </div>

    <div class="right_side">
        <div class="input_group">
            <label for="">Suma asegurable:</label>
            <input value="{{$slip_type->asegurable_electronico}}" type="number" step="any" placeholder="Suma.." name="asegurable_electronico">

        </div>
        <div class="input_group">
            <label for="">Suma asegurada:</label>
            <input value="{{$slip_type->asegurada_electronico}}" type="number" step="any" placeholder="Suma.." name="asegurada_electronico">
        </div>
    </div>
</div>