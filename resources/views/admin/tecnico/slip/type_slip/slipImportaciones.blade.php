<form method="POST" action="{{ route('slip.update', $slip->id) }}"  enctype="multipart/form-data" id="formSlipImportaciones"
    class="new_entry__form" >
    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="trans_import">

    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip Transporte Importaciones</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        <div class="two-sides">
            <div class="left_side">
                {{-- Objeto del seguro --}}
                <div class="input_group">
                    <label for="importacionesObjetoSeguro">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Objeto del seguro:
                    </label>
                    <textarea name="object_insurance" id="object_insurance" cols="30" rows="1"></textarea>
                </div>
                {{-- Trayecto asegurado --}}
                <div class="input_group">
                    <label for="importacionesTrayectoAsegurado">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Trayecto asegurado:
                    </label>
                    <input type="text" id="importacionesTrayectoAsegurado" name="insured_journey" placeholder="...">
                </div>
                {{-- Clase de mercancía --}}
                <div class="input_group">
                    <label for="importacionesClase">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Clase de mercancía:
                    </label>
                    <select name="type_merchandise" id="importacionesClase">
                        <option value="0" selected>Selecciona</option>
                        <option value="Granel">Granel</option>
                        <option value="Perecible (refrigerados, congelados o calefacción)">Perecible (refrigerados,
                            congelados o calefacción)</option>
                        <option value="Mercancía valiosa">Mercancía valiosa</option>
                        <option value="Mercancía peligrosa">Mercancía peligrosa</option>
                        <option value="Semovientes">Semovientes</option>
                        <option value="Mercancía general">Mercancía general</option>
                    </select>
                </div>
                {{-- Tipo de embalaje --}}
                <div class="input_group">
                    <label for="importacionesTipoEmbalaje">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Tipo de embalaje:
                    </label>
                    <select name="type_packing" id="importacionesTipoEmbalaje">
                        <option value="0" selected>Selecciona</option>
                        <option value="Vidones / toneles">Vidones / toneles</option>
                        <option value="Cajas modulares">Cajas modulares</option>
                        <option value="Huacales">Huacales</option>
                        <option value="Cajas de fibra">Cajas de fibra</option>
                        <option value="Tambores de fibra">Tambores de fibra</option>
                        <option value="Tambores plásticos">Tambores plásticos</option>
                        <option value="Tambores metal">Tambores metal</option>
                        <option value="Bobinas">Bobinas</option>
                        <option value="Balas">Balas</option>
                    </select>
                </div>
                {{-- Tipo de unificador --}}
                <div class="input_group">
                    <label for="importacionesTipoUnificador">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Tipo de unificador:
                    </label>
                    <select name="type_unify" id="importacionesTipoUnificador">
                        <option value="0" selected>Selecciona</option>
                        <option value="Palet">Palet</option>
                        <option value="Contenedores">Contenedores</option>
                        <option value="Intermodales">Intermodales</option>
                        <option value="Iglu (aéreo)">Iglu (aéreo)</option>
                    </select>
                </div>
                {{-- Medio de transporte --}}
                <div class="input_group">
                    <label for="importacionesMedioTransporte">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Medio de transporte:
                    </label>
                    <select name="transportation" id="importacionesMedioTransporte">
                        <option value="0" selected>Selecciona</option>
                        <option value="Marítimo">Marítimo</option>
                        <option value="Aéreo">Aéreo</option>
                        <option value="Terrestre">Terrestre</option>
                        <option value="Ferreo">Ferreo</option>
                        <option value="Combinado">Combinado</option>
                    </select>
                </div>
            </div>

            <div class="right_side">
                {{-- Estimado de movilización anual --}}
                <div class="input_group">
                    <label for="importacionesMovilizacion">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Estimado de movilización anual:
                    </label>
                    <input type="number" id="importacionesMovilizacion" name="annual_mobilization" placeholder="0">
                </div>
                {{-- Límite por embarque --}}
                <div class="input_group">
                    <label for="importacionesLimiteEmbarque">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Límite por embarque:
                    </label>
                    <input type="number" id="importacionesLimiteEmbarque" name="limit_shipment" placeholder="0">
                </div>
                {{-- Fecha aproximada de salida --}}
                <div class="input_group">
                    <label for="importacionesFechaSalida">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Fecha aproximada de salida:
                    </label>
                    <input type="date" id="importacionesFechaSalida" name="departure_date" placeholder="0">
                </div>
                {{-- Fecha aproximada de llegada --}}
                <div class="input_group">
                    <label for="importacionesFechaLlegada">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Fecha aproximada de llegada:
                    </label>
                    <input type="date" id="importacionesFechaLlegada" name="arrival_date" placeholder="0">
                </div>
                {{-- Cobertura --}}
                <div class="input_group">
                    <label for="importacionesCobertura">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Cobertura:
                    </label>
                    <textarea name="coverage" id="coverage" style="resize:both;width:100%;" 
 cols="30" rows="1"></textarea>
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
