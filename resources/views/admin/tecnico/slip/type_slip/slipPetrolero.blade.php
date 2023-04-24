<form method="POST" action="{{ route('slip.update', $slip->id) }}"  enctype="multipart/form-data" id="formSlipPetrolero"
    class="new_entry__form" >
    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="petrolero">


    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span>{{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        @include('admin.tecnico.slip.slips_generales.objectInsuranceAndCoverage')


    </div>

    <div class="form_group2">

        @if (count($sum_assured) > 0)
            @if ($slip->insurable_sum > 0)
                <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Suma Asegurable</h3>
            @elseif($slip->insured_sum > 0)
                <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Suma Asegurada</h3>
            @endif

            {{-- Suma asegurable / asegurada --}}

            <div class="flexColumnCenterContainer" style="margin:2.5rem 0">
                <button id="btnRefreshSuma" type="button" onclick="refreshSumaAseguradaTable()" class="btn btn-info" style="margin: 1rem">
                    Actualizar
                </button>
                @include('admin.tecnico.slip.slips_generales.tableSumaAsegurada')
            </div>
        @endif



        <div class="two-sides">
            <div class="left_side">
                <div class="input_group">
                    <label for="incendioLimiteIndem">
                        Límite de indemnización:
                    </label>
                    <input type="number" id="incendioLimiteIndem" name="limit_compensation"
                        value="{{ $slip_type->limit_compensation }}">
                </div>
            </div>
            <div class="right_side">
                @if ($slip->insurable_sum > 0)
                    <div class="input_group">
                        <label for="">Suma Asegurable:</label>
                        <input id="value_for_calculos" type="number" name="insurable_sum"
                        value="{{ $slip->insurable_sum }}">
                    </div>
                @elseif($slip->insured_sum > 0)
                    <div class="input_group">
                        <label for="">Suma Asegurada:</label>
                        <input id="value_for_calculos" type="number" name="insured_sum"
                        value="{{ $slip->insured_sum }}">
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="form_group3">
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Coberturas Adicionales</h3>

        @include('admin.comercial.include.edit_tablaCoberturas')

        {{-- Cláusulas Adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Cláusulas Adicionales</h3>

        @include('admin.comercial.include.edit_tablaClausulas')

    </div>

    <div class="form_group4">
        <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Tabla de depreciación para pérdidas
            totales</h3>

        <div class="flexRowWrapContainer">
            <div>
                @include('admin.tecnico.slip.slips_generales.tableRoturaMaquinaria')
            </div>

            <div>
                @include('admin.tecnico.slip.slips_generales.tableEquipoElectronico')

            </div>

        </div>

        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">6</span> Exclusiones</h3>

        @include('admin.tecnico.slip.slips_generales.exclusiones')
        
    </div>

    <div class="form_group5">
        {{-- DEDUCIBLE --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">7</span> Deducibles</h3>

        @include('admin.tecnico.slip.slips_generales.deducibles')

    </div>

    <div class="form_group6">

        @include('admin.tecnico.slip.slips_generales.footer1')
    
    </div>
    
    <div class="form_group7">
    
        @include('admin.tecnico.slip.slips_generales.footer2')
    
    </div>

</form>
