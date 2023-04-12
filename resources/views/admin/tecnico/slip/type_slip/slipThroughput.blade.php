<form method="POST" action="{{ route('slip.update', $slip->id) }}"  enctype="multipart/form-data" id="formSlipThroughput"
    class="new_entry__form">
    @method('PUT');

    @csrf
    <input type="hidden" name="type_slip" value="stock">

    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> Slip Stock Throughput STP</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        <div class="two-sides">
            <div class="left_side">
                {{-- Objeto del seguro --}}
                <div class="input_group">
                    <label for="throughputObjetoSeguro">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Objeto del seguro:
                    </label>
                    <textarea name="object_insurance" id="object_insurance" cols="30" rows="1"></textarea>
                </div>
                {{-- Trayecto asegurado --}}
                <div class="input_group">
                    <label for="throughputTrayectoAsegurado">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Trayecto asegurado:
                    </label>
                    <input type="text" id="throughputTrayectoAsegurado" name="insured_journey"
                        placeholder="...">
                </div>
                {{-- Clase de mercancía --}}
                <div class="input_group">
                    <label for="throughputClase">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Clase de mercancía:
                    </label>
                    <select name="type_merchandise" id="throughputClase">
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
                    <label for="throughputTipoEmbalaje">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Tipo de embalaje:
                    </label>
                    <select name="type_packing" id="throughputTipoEmbalaje">
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
                    <label for="throughputTipoUnificador">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Tipo de unificador:
                    </label>
                    <select name="type_unify" id="throughputTipoUnificador">
                        <option value="0" selected>Selecciona</option>
                        <option value="Palet">Palet</option>
                        <option value="Contenedores">Contenedores</option>
                        <option value="Intermodales">Intermodales</option>
                        <option value="Iglu (aéreo)">Iglu (aéreo)</option>
                    </select>
                </div>

            </div>

            <div class="right_side">
                {{-- Medio de transporte --}}
                <div class="input_group">
                    <label for="throughputMedioTransporte">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Medio de transporte:
                    </label>
                    <select name="transportation" id="throughputMedioTransporte">
                        <option value="0" selected>Selecciona</option>
                        <option value="Marítimo">Marítimo</option>
                        <option value="Aéreo">Aéreo</option>
                        <option value="Terrestre">Terrestre</option>
                        <option value="Ferreo">Ferreo</option>
                        <option value="Combinado">Combinado</option>
                    </select>
                </div>
                {{-- Estimado de movilización anual --}}
                <div class="input_group">
                    <label for="throughputMovilizacion">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Estimado de movilización anual:
                    </label>
                    <input type="number" id="throughputMovilizacion" name="annual_mobilization" placeholder="0">
                </div>
                {{-- Base de valoración y liquidación de pérdida --}}
                <div class="input_group">
                    <label for="throughputBaseValoracion">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Base de valoración y liquidación de pérdida:
                    </label>
                    <input type="text" id="throughputBaseValoracion" name="valuation_and_loss"
                        placeholder="...">
                </div>
                {{-- Comision sobre utilidades --}}
                <div class="input_group">
                    <label for="throughputComision">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Comision sobre utilidades:
                    </label>
                    <input type="text" id="throughputComision" name="utility_commission" placeholder="...">
                </div>
                {{-- Condiciones --}}
                <div class="input_group">
                    <label for="throughputCondiciones">
                        <i class="fa-solid fa-bars-staggered"></i>
                        Condiciones:
                    </label>
                    <input type="text" id="throughputCondiciones" name="condition" placeholder="...">
                </div>

            </div>
        </div>

    </div>

    <div class="form_group2">
        <h3 class="slipTitle"> <span class="badge badge-secondary">2</span> Límite por embarque</h3>

        <div class="two-sides">
            <div id="throughputleft_sideAlmacenamiento" class="left_side">

                {{-- Almacenamiento --}}
                <h5 class="slipTitle">Almacenamiento 1:</h5>

                <div class="input_group">
                    <label for="throughputAlmacenamiento1a">
                        <i class="fa-solid fa-box"></i>
                        Valor en USD:
                    </label>
                    <input type="number" id="throughputAlmacenamiento1a" name="value_storage_stock[]"
                        class="inputNumber" placeholder="0">
                </div>

                <div class="input_group">
                    <label for="throughputAlmacenamiento1b">
                        <i class="fa-solid fa-box"></i>
                        Descripción:
                    </label>
                    <input type="text" id="throughputAlmacenamiento1b" name="description_storage_stock[]"
                        placeholder="...">
                </div>

            </div>


            <div class="right_side" style="align-items: center;justify-content: center;">
                <button class="new_entry__form--button" onclick="addThroughputAlmacenamiento(event)">Agregar
                    almacenamiento</button>
            </div>
        </div>

        <div class="two-sides" style="margin: 4rem 0">

            <div id="throughputleft_sideTransporte" class="left_side">
                {{-- Transporte --}}
                <h5 class="slipTitle">Transporte 1:</h5>

                <div class="input_group">
                    <label for="throughputTransporte1a">
                        <i class="fa-solid fa-box"></i>
                        Valor en USD:
                    </label>
                    <input type="number" id="throughputTransporte1a" name="value_transport_stock[]"
                        class="inputNumber" placeholder="0">
                </div>

                <div class="input_group">
                    <label for="throughputTransporte1b">
                        <i class="fa-solid fa-box"></i>
                        Descripción:
                    </label>
                    <input type="text" id="throughputTransporte1b" name="description_transport_stock[]"
                        placeholder="...">
                </div>

            </div>


            <div class="right_side" style="align-items: center;justify-content: center;">

                <button class="new_entry__form--button" onclick="addThroughputTransporte(event)">Agregar
                    transporte</button>

            </div>
        </div>

    </div>

    <div class="form_group3">
        {{-- Coberturas adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Coberturas adicionales</h3>

        @include('admin.tecnico.slip.slips_generales.tableCoberturasAdicionales')

    </div>

    <div class="form_group4">
        {{-- Cláusulas Adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Cláusulas Adicionales</h3>
        
        @include('admin.tecnico.slip.slips_generales.clausulasAdicionales')

        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Exclusiones</h3>

        @include('admin.tecnico.slip.slips_generales.exclusiones')

    </div>

    <div class="form_group5">
        <h3 class="slipTitle"> <span class="badge badge-secondary">6</span> Deducibles</h3>

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
