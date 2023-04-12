<form method="POST" action="{{ route('slip.update', $slip->id) }}" enctype="multipart/form-data" id="formSlipFidelidad"
    class="new_entry__form" >
    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="fidelidad">


    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip {{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        <div class="two-sides">

            <div class="left_side">

                {{-- Tipo de cobertura --}}
                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Tipo de cobertura
                    </label>
                    <select name="type_coverage_fidelidad" id="">
                        <option value="0" selected disabled>Selecciona</option>
                        <option value="Blanket">Blanket</option>
                        <option value="Nominal">Nominal</option>
                    </select>
                </div>
                {{-- Cobertura --}}
                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Cobertura
                    </label>
                    <textarea name="coverage" id="coverage" style="resize:both;width:100%;" 
 cols="30" rows="1"></textarea>
                </div>
                {{-- Periodo de descubrimiento --}}
                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Periodo de descubrimiento
                    </label>
                    <input type="text" id="" name="discovery_period">
                </div>



            </div>

            <div class="right_side">


                {{-- Limite colusorio --}}
                <h5 class="slipTitle">Límite colusorio:</h5>
                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Numérico
                    </label>
                    <input type="number" value="{{ $slip_type->limit_colusorio_value}}" name="limit_colusorio_value">
                </div>
                <div class="input_group">
                    <label for="">
                        <i class="fa-solid fa-rectangle-list"></i>
                        Texto
                    </label>
                    <input type="text" value="{{ $slip_type->limit_colusorio_text}}" name="limit_colusorio_text">
                </div>


            </div>
        </div>

    </div>

    <div class="form_group2">
        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Objeto Del Seguro</h3>

        {{-- table Objetos del seguro --}}
        <div class="tableContainer">
            <h4 class="slipTitle">Tabla Objeto(s) del seguro</h4>

            <div class="input_group" style="max-width: 550px; margin:4rem 0">
                <label for=""> Si el listado es de 20 o mas confirmar si se puede subir un archivo excel</label>
                <input type="file" id="" name="file">
            </div>

            <table id="fidelidadTableObjetosSeguro" class="table table-striped table-bordered no-footer" cellspacing="0"
                width="80%" aria-describedby="example_info">
                <thead>
                    <tr role="row">
                        <th>Número</th>
                        <th>Nombre(s)</th>
                        <th>Cargo</th>
                        <th>Ingreso anual</th>
                        <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                            colspan="1" aria-label="Add row">

                            <button onclick="addRowFidelidadObjetoSeguro(event)" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                        </th>
                    </tr>
                </thead>

                <tbody id="fidelidadObjetosTableBody">

                    @if (count($slip_type->object_insurance) > 0 )
                        @foreach ($slip_type->object_insurance as $key => $item)
                            <tr>
                                <th style="text-align: center">
                                    <input type="text" name="number[]" value="{{ $item->number }}">
                                </th>
                                <th style="text-align: center">
                                    <input type="text" name="name[]" value="{{ $item->name }}">
                                </th>
                                <th style="text-align: center">
                                    <input type="text" name="activity_merchant[]" value="{{ $item->activity_merchant }}">
                                </th>
    
                                <th style="text-align: center">
                                    <input type="text" name="limit[]" value="{{ $item->limit }}">
                                </th>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th style="text-align: center">
                                <input type="text" name="number[]" placeholder="...">
                            </th>
                            <th style="text-align: center">
                                <input type="text" name="name[]" placeholder="...">
                            </th>
                            <th style="text-align: center">
                                <input type="text" name="activity_merchant[]">
                            </th>

                            <th style="text-align: center">
                                <input type="text" name="limit[]" placeholder="...">
                            </th>
                        </tr>
                    @endif
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="form_group3">
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Coberturas Adicionales</h3>

        @include('admin.tecnico.slip.slips_generales.tableCoberturasAdicionales')
    </div>

    <div class="form_group4">
        {{-- Cláusulas Adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Cláusulas Adicionales</h3>
        
        
        @include('admin.tecnico.slip.slips_generales.clausulasAdicionales')

    </div>

    <div class="form_group5">
        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Exclusiones</h3>

        @include('admin.tecnico.slip.slips_generales.exclusiones')

        <h3 class="slipTitle"> <span class="badge badge-secondary">6</span> Deducibles</h3>
        
        @include('admin.tecnico.slip.slips_generales.deducibles')
    </div>

    <div class="form_group6">

        <div class="tableContainer" style="1.2rem 0">
            <h4 class="slipTitle">Siniestralidad</h4>
            <div class="flexColumnCenterContainer">
                <div class="input_group" style="width:400px">

                    <input type="text" value="{{ $slip->accidentRate }}" placeholder="...">
                    <input type="file" name="siniestralidad" placeholder="No. Días">
                </div>
            </div>
        </div>

        <div class="tableContainer" style="1.2rem 0">
            <h4 class="slipTitle">Condiciones adicionales</h4>
            <div class="flexColumnCenterContainer">
                <div class="input_group" style="width:400px">

                    <label>
                        <i class="fa fa-search" aria-hidden="true"></i>
                        Condiciones adicionales
                    </label>
                    <input type="text" name="condition_additional" placeholder="...">
                </div>
            </div>
        </div>

        @include('admin.tecnico.slip.slips_generales.footer1')
    
    </div>
    
    <div class="form_group7">
    
        @include('admin.tecnico.slip.slips_generales.footer2')
    
    </div>

</form>
