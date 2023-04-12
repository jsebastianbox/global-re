<form method="POST" action="{{ route('slip.update', $slip->id) }}" enctype="multipart/form-data" id="formSlipInterno"
    class="new_entry__form">

    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="trans_intern">

    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip {{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        <div class="two-sides" style='margin-top:50px'>
            <div class="left_side">
                {{-- Objeto del seguro --}}
                <div class="input_group">
                    <label for="internoObjetoSeguro">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Objeto del seguro:
                    </label>
                    <textarea name="object_insurance" id="object_insurance" cols="30" rows="1">{{ $slip_type->object_insurance }}</textarea>
                </div>
                {{-- Trayecto asegurado --}}
                <div class="input_group">
                    <label for="internoTrayectoAsegurado">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Trayecto asegurado:
                    </label>
                    <input type="text" id="internoTrayectoAsegurado" name="insured_journey" disabled
                        placeholder="..." value="{{ $slip_type->insured_journey }}">
                </div>
                {{-- Clase de mercancía --}}
                <div class="input_group">
                    <label for="internoClase">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Clase de mercancía:
                    </label>
                    <select name="type_merchandise" id="internoClase">
                        <option value="0" disabled>Selecciona</option>
                        <option value="granel" @if ($slip_type->type_merchandise == 'granel') selected @endif>granel</option>
                        <option value="perecible"@if ($slip_type->type_merchandise == 'perecible') selected @endif>Perecible (refrigerados, congelados o calefacción)</option>
                        <option value="valiosa"@if ($slip_type->type_merchandise == 'valiosa') selected @endif>Mercancía valiosa</option>
                        <option value="tfibra"@if ($slip_type->type_merchandise == 'peligrosa') selected @endif>Mercancía Peligrosa</option>
                        <option value="tplastico"@if ($slip_type->type_merchandise == 'semovientes') selected @endif>Semovientes</option>
                        <option value="general"@if ($slip_type->type_merchandise == 'general') selected @endif>Mercancía general</option>
                    </select>
                </div>
                {{-- Tipo de embalaje --}}
                <div class="input_group">
                    <label for="internoTipoEmbalaje">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Tipo de embalaje:
                    </label>
                    <select name="type_packing" id="internoTipoEmbalaje">
                        <option value="0" disabled>Selecciona</option>
                        <option value="vidon" @if ($slip_type->type_packing == 'vidon') selected @endif>Vidones/Toneles</option>
                        <option value="huacal"@if ($slip_type->type_packing == 'huacal') selected @endif>Huacales</option>
                        <option value="caja"@if ($slip_type->type_packing == 'caja') selected @endif>Cajas de fibra</option>
                        <option value="tfibra"@if ($slip_type->type_packing == 'tfibra') selected @endif>Tambores de fibra</option>
                        <option value="tplastico"@if ($slip_type->type_packing == 'tplastico') selected @endif>Tambores de plástico</option>
                        <option value="tmetal"@if ($slip_type->type_packing == 'tmetal') selected @endif>Tambores de metal</option>
                        <option value="bobina"@if ($slip_type->type_packing == 'bobina') selected @endif>Bobinas</option>
                        <option value="bala"@if ($slip_type->type_packing == 'bala') selected @endif>Balas</option>
                    </select>
                </div>
                {{-- Tipo de unificador --}}
                <div class="input_group">
                    <label for="internoTipoUnificador">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Tipo de unificador:
                    </label>
                    <select name="type_unify" id="internoTipoUnificador">
                        <option value="0" disabled>Selecciona</option>
                        <option value="pallet" @if ($slip_type->type_unify == 'pallet') selected @endif>Pallet</option>
                        <option value="contenedor"@if ($slip_type->type_unify == 'contenedor') selected @endif>Contenedores</option>
                        <option value="intermodal"@if ($slip_type->type_unify == 'intermodal') selected @endif>Intermodales</option>
                        <option value="iglu"@if ($slip_type->type_unify == 'iglu') selected @endif>Iglu (aéreo)</option>
                    </select>
                </div>
                
            </div>

            <div class="right_side">
                {{-- Medio de transporte --}}
                <div class="input_group">
                    <label for="internoMedioTransporte">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Medio de transporte:
                    </label>
                    <select name="transportation" id="internoMedioTransporte">
                        <option value="0" disabled>Selecciona</option>
                        <option value="maritimo" @if ($slip_type->transportation == 'maritimo') selected @endif>Marítimo</option>
                        <option value="aereo"@if ($slip_type->transportation == 'aereo') selected @endif>Aéreo</option>
                        <option value="terrestre"@if ($slip_type->transportation == 'terrestre') selected @endif>Terrestre</option>
                        <option value="ferreo"@if ($slip_type->transportation == 'ferreo') selected @endif>Férreo</option>
                        <option value="combinado"@if ($slip_type->transportation == 'combinado') selected @endif>Combinado</option>
                    </select>
                </div>
                {{-- Estimado de movilización anual --}}
                <div class="input_group">
                    <label for="internoMovilizacion">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Estimado de movilización anual:
                    </label>
                    <input type="number" step="any" id="internoMovilizacion" name="annual_mobilization" placeholder="0" disabled
                        value="{{ $slip_type->annual_mobilization }}">
                </div>
                {{-- Límite por embarque --}}
                <div class="input_group">
                    <label for="internoLimiteEmbarque">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Límite por embarque:
                    </label>
                    <input type="number" step="any" id="internoLimiteEmbarque" name="limit_shipment" placeholder="0" disabled
                        value="{{ $slip_type->limit_shipment }}">
                </div>
                {{-- Fecha aproximada de salida --}}
                <div class="input_group">
                    <label for="internoFechaSalida">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Fecha aproximada de salida:
                    </label>
                    <input type="text" id="internoFechaSalida" name="departure_date" placeholder="0" disabled
                        value="{{ $slip_type->departure_date }}">
                </div>
                {{-- Fecha aproximada de llegada --}}
                <div class="input_group">
                    <label for="internoFechaLlegada">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Fecha aproximada de llegada:
                    </label>
                    <input type="text" id="internoFechaLlegada" name="arrival_date" placeholder="0" disabled
                        value="{{ $slip_type->arrival_date }}">
                </div>
                
            </div>
        </div>

        <div class="tableContainer">
            <div class="input_group" style="max-width: 600px">
                <label for="internoCobertura">
                    <i class="fa-solid fa-bars-staggered"></i>
                    Cobertura:
                </label>
                <textarea name="coverage" id="coverage" style="resize:both;width:100%;" 
 cols="30" rows="1"></textarea>
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

        <div class="tableContainer" style="1.2rem 0">
            <h4 class="slipTitle">Condiciones precedentes de cobertura</h4>
            <div class="flexColumnCenterContainer" style="max-width:450px">
                <textarea placeholder="..." name="precedent_conditions"></textarea>
            </div>
        </div>

        @include('admin.tecnico.slip.slips_generales.footer1')
    
    </div>
    
    <div class="form_group7">
    
        @include('admin.tecnico.slip.slips_generales.footer2')
    
    </div>


</form>
