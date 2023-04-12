@if(\Illuminate\Support\Str::contains(\Illuminate\Support\Facades\Request::url(), '/admin/comercial/edit_compromiso/'))
    <div class="input_group">
        <label>
            <i class="fa-solid fa-flag"></i>
            Cláusula adicional 1:
        </label>
        {{-- <input type="input" name="description_clause_aditional[]" placeholder="..." disabled> --}}
        <select name="description_clause_aditional[]" class="selectClausula">
            <option selected disabled>Seleccionar</option>
        </select>
    </div>
    <div class="input_group">
        <label>
            <i class="fa-solid fa-flag"></i>
            Cláusula adicional 2:
        </label>
        <input type="input" name="description_clause_aditional[]" placeholder="..." disabled>
    </div>
    <div class="input_group">
        <label>
            <i class="fa-solid fa-flag"></i>
            Cláusula adicional 3:
        </label>
        <input type="input" name="description_clause_aditional[]" placeholder="..." disabled>
    </div>
    
    <input type="button" value="Agregar campo" onclick="addCoberturaRow('coberturaAdicional')">
    @else
    
    <div class="input_group">
        <label>
            <i class="fa-solid fa-flag"></i>
            Cláusula adicional 1:
        </label>
        <select name="description_clause_aditional[]" class="selectClausula">
            <option selected disabled>Seleccionar</option>
        </select>
</div>
<div class="input_group">
    <label>
        <i class="fa-solid fa-flag"></i>
        Cláusula adicional 2:
    </label>
    <input type="input" name="description_clause_aditional[]" placeholder="..." disabled>
</div>
<div class="input_group">
    <label>
        <i class="fa-solid fa-flag"></i>
        Cláusula adicional 3:
    </label>
    <input type="input" name="description_clause_aditional[]" placeholder="..." disabled>
</div>

<input type="button" value="Agregar campo" onclick="addCoberturaRow('coberturaAdicional')">
@endif