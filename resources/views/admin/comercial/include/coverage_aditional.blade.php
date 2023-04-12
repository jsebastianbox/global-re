@if(\Illuminate\Support\Str::contains(\Illuminate\Support\Facades\Request::url(), '/admin/comercial/edit_compromiso/'))
<table class="table" style="overflow-x: auto" id="coberturaAdicional">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Cobertura</th>
            <th scope="col"> (USD)</th>
            <th scope="col"><input type="button" value="Agregar campo" onclick="addCoberturaRow('coberturaAdicional')">
            </th>
        </tr>
    </thead>
    <tbody>
        <th scope="row">1</th>
        <td>
            <input type="text" name="description_coverage_additional[]" id="" oninput="this.className = ''" value="asdasdasd">
        </td>
        <td>
            <input type="number" name="coverage_additional_usd[]" id="" data-money oninput="this.className = ''">
        </td>
        <td>
            <input type="number" placeholder="" name="coverage_additional_additional[]" data-money oninput="this.className =''">
        </td>
    </tbody>
</table>
@else
<table class="table" style="overflow-x: auto" id="coberturaAdicional">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Cobertura</th>
            <th scope="col"> (USD)</th>
            <th scope="col"><input type="button" value="Agregar campo" onclick="addCoberturaRow('coberturaAdicional')">
            </th>
        </tr>
    </thead>
    <tbody>
        <th scope="row">1</th>
        <td>
            <input type="text" name="description_coverage_additional[]" id="" oninput="this.className = ''">
        </td>
        <td>
            <input type="number" name="coverage_additional_usd[]" id="" data-money oninput="this.className = ''">
        </td>
        <td>
            <input type="number" placeholder="" name="coverage_additional_additional[]" data-money oninput="this.className =''">
        </td>
    </tbody>
</table>
@endif