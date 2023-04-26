<form method="POST" action="{{ route('slip.update', $slip->id) }}" id="formSlipVehiculos" class="new_entry__form"
    enctype="multipart/form-data">
    {{-- -ok --}}
    @method('PUT')

    @csrf

    <input type="hidden" name="type_slip" value="vida">

    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> {{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        @include('admin.tecnico.slip.slips_generales.objectInsuranceAndCoverage')


        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Placa vehículo(s)</h3>


            <div class="tableContainer">
                
                    <div class="d-flex justify-content-center">
                        <table id="vehiculosMatriculasTable" class="table" style="overflow-x: auto;width:500px">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Matrícula</th>
                                    <th scope="col"><input type="button" value="Agregar campo"
                                            onclick="addMatriculaRow(event)"></th>
                                </tr>
                            </thead>
                            <tbody id="vehiculosMatriculasTableBody">
                                @if (count($vehicles_details) > 0)
                                    @foreach ($vehicles_details as $key => $item)
                                    <tr>
                                        <th scope="row">{{$key + 1}}</th>
                                        <td>
                                            <input type="text" name="plate_vehicle[]" id="plate"
                                                value="{{$item->plate_vehicle}}">
                                        </td>        
                                
                                    </tr>
                                    @endforeach
                                @else
                                    <th scope="row">1</th>
                                    <td>
                                        <input type="text" name="plate_vehicle[]" id="plate"
                                            value="">
                                    </td>
                                @endif
                            </tbody>
                        </table>
                    </div>

            </div>
        

    </div>

    <div class="form_group2">
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Coberturas Adicionales</h3>

        {{-- @include('admin.tecnico.slip.slips_generales.tableCoberturasAdicionalesV2') --}}
        @include('admin.comercial.include.edit_tablaCoberturas')



       
    </div>

    <div class="form_group3">
        {{-- Cláusulas Adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Cláusulas Adicionales</h3>

        {{-- @include('admin.tecnico.slip.slips_generales.tableClausulasAdicionalesV2') --}}
        @include('admin.comercial.include.edit_tablaClausulas')

    </div>

    <div class="form_group4">

        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Exclusiones</h3>

        @include('admin.tecnico.slip.slips_generales.exclusiones')
    </div>

    <div class="form_group5">
        {{-- Deducibles --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">6</span> Deducibles</h3>

        @include('admin.tecnico.slip.slips_generales.deducibles')

    </div>

    <div class="form_group6">

        @include('admin.tecnico.slip.slips_generales.footer1')
    
    </div>
    
    <div class="form_group7">
    
        @include('admin.tecnico.slip.slips_generales.footer2')
    
    </div>

</form>
