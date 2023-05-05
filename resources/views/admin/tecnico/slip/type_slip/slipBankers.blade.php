<form method="POST" action="{{ route('slip.update', $slip->id) }}" enctype="multipart/form-data"
    id="formSlipBankers" class="new_entry__form">

    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="bbb">


    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> {{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        @include('admin.tecnico.slip.slips_generales.objectInsuranceAndCoverage')

    </div>

    <div class="form_group2">
        
        @if ($slip->type_coverage === 44)
            <div class="two-sides">

                <div class="left_side">


                    {{-- Limite Indemnización --}}
                    <h5 class="slipTitle">Límite de indemnización (USD):</h5>
                    <div class="input_group">
                        <label for="">
                            <i class="fa-solid fa-bars-staggered"></i>
                            Seccion I: BBB
                        </label>
                        <input type="text" value="{{$slip_type->description_compensation_limit}}" name="description_compensation_limit" placeholder="...">
                    </div>
                    <div class="input_group">
                        <label for="">
                            <i class="fa-solid fa-bars-staggered"></i>
                            Seccion II: Crimen por computador
                        </label>
                        <input type="text" value="{{$slip_type->description_compensation_limit2}}" name="description_compensation_limit2" placeholder="...">
                    </div>
                    <div class="input_group">
                        <label for="">
                            <i class="fa-solid fa-bars-staggered"></i>
                            Seccion III: Directores y administradores
                        </label>
                        <input type="text" value="{{$slip_type->description_compensation_limit3}}" name="description_compensation_limit3" placeholder="...">
                    </div>

                </div>

                <div class="right_side">

                    {{-- Cobertura --}}
                    <h5 class="slipTitle">Coberturas:</h5>
                    <div class="input_group">
                        <label for="">
                            <i class="fa-solid fa-bars-staggered"></i>
                            Seccion I: BBB
                        </label>
                        <input type="text" id="" name="description_coverage[]" placeholder="...">
                    </div>
                    <div class="input_group">
                        <label for="">
                            <i class="fa-solid fa-bars-staggered"></i>
                            Seccion II: Crimen por computador
                        </label>
                        <input type="text" id="" name="description_coverage[]" placeholder="...">
                    </div>
                    <div class="input_group">
                        <label for="">
                            <i class="fa-solid fa-bars-staggered"></i>
                            Seccion III: Directores y administradores
                        </label>
                        <input type="text" id="" name="description_coverage[]" placeholder="...">
                    </div>

                </div>
            </div>
        @endif

        @if ($slip->type_coverage === 45)
            <div class="two-sides">

                <div class="left_side">

                    {{-- Tipo de cobertura --}}
                    <div class="input_group">
                        <label for="">
                            <i class="fa-solid fa-rectangle-list"></i>
                            Tipo de cobertura
                        </label>
                        <select name="type_coverage_fidelidad" id="type_coverage_fidelidad">
                            <option value="0" selected disabled>Selecciona</option>
                            <option value="Blanket">Blanket</option>
                            <option value="Nominal">Nominal</option>
                        </select>
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

            <div class="two-sides">
                <div class="left_side">
                    <div class="input_group">
                        <label for="">
                            <i class="fa-solid fa-rectangle-list"></i>
                            Límite de indemnización
                        </label>
                        <input type="number" step="any" value="{{ $slip_type->limit_compensation}}" name="limit_compensation">
                    </div>
                </div>
                <div class="right_side">
                    <div class="input_group">
                        <label for="">
                            <i class="fa-solid fa-rectangle-list"></i>
                            Límite Agregado
                        </label>
                        <input type="number" step="any" value="{{ $slip_type->limit_aggregate}}" name="limit_aggregate">
                    </div>
                </div>
            </div>

            {{-- table Objetos del seguro --}}
            <div class="tableContainer">
                <h4 class="slipTitle">Tabla Objeto(s) del seguro</h4>
    
                @include('admin.comercial.include.tableObjetoSeguroFidelidad')
                
            </div>
        @endif

    </div>

    <div class="form_group3">

        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Coberturas Adicionales</h3>

        @include('admin.comercial.include.edit_tablaCoberturas')

        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Cláusulas Adicionales</h3>

        @include('admin.comercial.include.edit_tablaClausulas')

        @if ($slip->type_coverage === 44)
            <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Exclusiones</h3>
            @include('admin.tecnico.slip.slips_generales.exclusiones')
        @endif


    </div>

    <div class="form_group4">

        @if ($slip->type_coverage === 45)
            <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Exclusiones</h3>
            @include('admin.tecnico.slip.slips_generales.exclusiones')
        @endif

        @if ($slip->type_coverage === 44)
            <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Deducibles</h3>

            @include('admin.tecnico.slip.slips_generales.deducibles')
        @endif
        
    </div>

    <div class="form_group5">
        @if ($slip->type_coverage === 44)
            <h3 class="slipTitle"> <span class="badge badge-secondary">6</span> Condiciones</h3>
            @include('admin.tecnico.slip.slips_generales.condicionesBBB')
        @endif
        @if ($slip->type_coverage === 45)
            <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Deducibles</h3>

            @include('admin.tecnico.slip.slips_generales.deducibles')
        @endif

        
    </div>

    <div class="form_group6">

        <div class="tableContainer" style="1.2rem 0">
            <h4 class="slipTitle">Condiciones precedentes de cobertura</h4>
            <div class="flexColumnCenterContainer" style="max-width:450px">
                <div class="input_group" style="width:400px">
                    <label >
                        <i class="fa-solid fa-bars-staggered"></i>
                        Condiciones precedentes de cobertura
                    </label>
                    <input type="text" name="precedent_conditions" placeholder="...">
                </div>
            </div>
        </div>

        @include('admin.tecnico.slip.slips_generales.footer1')
    
    </div>
    
    <div class="form_group7">
    
        @include('admin.tecnico.slip.slips_generales.footer2')
    
    </div>

</form>
