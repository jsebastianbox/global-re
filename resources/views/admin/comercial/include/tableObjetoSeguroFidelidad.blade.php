<div class="tableContainer" style="margin: 2rem 0">
    <table id="fianzas_fidelidadTableObjetosSeguro" class="table table-striped table-bordered no-footer"
        cellspacing="0" width="80%" aria-describedby="example_info">
        <thead>
            <tr role="row">
                <th>Número</th>
                <th>Nombre(s)</th>
                <th>Cargo</th>
                <th>Ingreso anual</th>
                <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                    colspan="1" aria-label="Add row">

                    <button onclick="addRowObjetoSeguro(event, 'fianzas_fidelidad')"
                        class="btn btn-success btn-xs">
                        +
                    </button>
                </th>
            </tr>
        </thead>

        <tbody id="fianzas_fidelidadObjetosTableBody">
            @if (count($object_insurance) > 0)
                @foreach ($object_insurance as $key => $item )
                    <tr>
                        <td>
                            {{$key+1}}
                        </td>
                        <td>
                            <input value="{{$item->name}}" type="text" name="name[]" placeholder="...">
                        </td>
                        <td>
                            <input value="{{$item->activity_merchant}}" type="text" name="activity_merchant[]">
                        </td>

                        <td>
                            <input value="{{$item->limit}}" type="text" name="limit[]" placeholder="...">
                        </td>
                        <td></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>
                        1
                    </td>
                    <td>
                        <input type="text" name="name[]" placeholder="...">
                    </td>
                    <td>
                        <input type="text" name="activity_merchant[]">
                    </td>

                    <td>
                        <input type="text" name="limit[]" placeholder="...">
                    </td>
                    <td></td>
                </tr>
            @endif
        </tbody>
    </table>
</div>