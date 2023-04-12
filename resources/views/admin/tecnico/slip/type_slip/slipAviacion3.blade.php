<form method="POST" action="{{ route('slip.update', $slip->id) }}" enctype="multipart/form-data" id="fromSlipAviacion3"
    class="new_entry__form" >
    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="licencia"> {{-- revisar value para envio tecnico --}}


    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip {{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        {{-- table Objetos del seguro --}}
        <div class="tableContainer">
            <h4 class="slipTitle">Objeto(s) del seguro</h4>

            <table id="tableObjetosSeguro" class="indemnizacionTable">
                <thead>
                    <tr>
                        <th style="text-align: center">Número</th>
                        <th style="text-align: center">Nombre</th>
                        <th style="text-align: center">Fecha de nacimiento</th>
                        <th style="text-align: center">Edad</th>
                        <th style="text-align: center">Ingreso anual</th>
                        <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                            colspan="1" aria-label="Add row">
                            <button type="button" onclick="addRowObjetoSeguroV2(event)" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                        </th>
                    </tr>
                </thead>

                <tbody id="objetosTableBody">

                    {{-- @if (count($slip_type->object_insurance) > 0)
                        @foreach ($slip_type->object_insurance as $key => $item)
                            <tr>
                                <td style="text-align: center">
                                    <input type="text" name="number[]" value="{{ $item->number }}">
                                </td>

                                <td style="text-align: center">
                                    <input type="text" name="name[]" value="{{ $item->name }}">
                                </td>
                                <td style="text-align: center">
                                    <input type="date" name="birthday[]" value="{{ $item->birthday }}">
                                </td>
                                <td style="text-align: center">
                                    <input type="number" step="any" name="age[]" value="{{ $item->age }}">
                                </td>
                                <td style="text-align: center">
                                    <input type="number" step="any" name="limit[]" value="{{ $item->limit }}">
                                </td>
                                
                                <td></td>
                            </tr>
                        @endforeach
                    @else --}}
                        <tr>
                            <td style="text-align: center">
                                <input type="text" name="number[]">
                            </td>
                            <td style="text-align: center">
                                <input type="text" name="name[]">
                            </td>
                            <td style="text-align: center">
                                <input type="date" name="birthday[]">
                            </td>
                            <td style="text-align: center">
                                <input type="number" step="any" name="age[]">
                            </td>
                            <td style="text-align: center">
                                <input type="number" step="any" name="limit[]">
                            </td>
                            
                            <td></td>
                        </tr>
                    {{-- @endif --}}

                    
                </tbody>

            </table>

        </div>

        <div class="two-sides">
            <div class="left_side">
                <div class="input_group">
                    <label >
                        <i class="fa-solid fa-pager"></i>
                        Límite de indemnización:
                    </label>
                    <input type="text" name="limit_compensation" value="{{ $slip->limit_compensation }}">
                </div>

                <div class="input_group">
                    <label for="licenciaGeografico">
                        <i class="fa-solid fa-pager"></i>
                        Límite geográfico:
                    </label>
                    <input type="text" id="licenciaGeografico" name="geography_limit">
                </div>

            </div>

            <div class="right_side">
                <div class="input_group">
                    <label for="licenciaUsos" style="margin-right: 3rem">
                        <i class="fa-solid fa-pager"></i>
                        Usos:
                    </label>
                    <input type="text" id="licenciaUsos" name="use_loss_license'">
                </div>

                

            </div>
        </div>

    </div>

    <div class="form_group2">
        {{-- Coberturas adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Coberturas Adicionales</h3>

        @include('admin.tecnico.slip.slips_generales.tableCoberturasAdicionales')
    </div>

    <div class="form_group3">
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Cláusulas Adicionales</h3>

        @include('admin.tecnico.slip.slips_generales.clausulasAdicionales')

    </div>

    <div class="form_group4">
        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Exclusiones</h3>

        @include('admin.tecnico.slip.slips_generales.exclusiones')

    </div>

    <div class="form_group5">
        <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Deducibles</h3>

        @include('admin.tecnico.slip.slips_generales.deducibles')

    </div>

    <div class="form_group6">

        @include('admin.tecnico.slip.slips_generales.footer1')
    
    </div>
    
    <div class="form_group7">
    
        @include('admin.tecnico.slip.slips_generales.footer2')
    
    </div>

</form>
