<form method="POST" action="{{ route('slip.update', $slip->id) }}" id="formSlipVida" class="new_entry__form"
    enctype="multipart/form-data">
    {{-- -ok --}}
    @method('PUT')

    @csrf

    <input type="hidden" name="type_slip" value="vida">

    <div class="form_group1">
        <h3 class="slipTitle"> <span class="badge badge-secondary">1</span> {{ $slip->type->name }}</h3>

        @include('admin.tecnico.slip.slips_generales.initial')

        <div class="two-sides">

            <div class="left_side">
                {{-- Limite edad --}}
                <h5 class="slipTitle">Limite de edad:</h5>
                <div class="input_group">
                    <label for="apEdadMaxAceptacion">
                        <i class="fa-solid fa-pager"></i>
                        Edad Máxima de Aceptación
                    </label>
                    <input type="text" id="apEdadMaxAceptacion" name="max_age_approve" placeholder="0"
                        value="{{ $slip_type->max_age_approve }}">
                </div>
                <div class="input_group">
                    <label for="apEdadMaxCancelacion">
                        <i class="fa-solid fa-pager"></i>
                        Edad Máxima de Cancelación
                    </label>
                    <input type="text" id="apEdadMaxCancelacion" name="max_age_cancel" placeholder="0"
                        value="{{ $slip_type->max_age_cancel }}">
                </div>

            </div>

            <div class="right_side">
                {{-- Beneficiarios --}}
                <h5 class="slipTitle">Beneficiario(s):</h5>
                <div class="input_group">
                    <label for="apBeneficiarioMuerte">
                        <i class="fa-solid fa-book-skull"></i>
                        Beneficiario(s) en caso de muerte
                    </label>
                    <input type="text" id="apBeneficiarioMuerte" name="beneficiary_death"
                        value="{{ $slip_type->beneficiary_death }}">
                </div>

                <div class="input_group">
                    <label for="apBeneficiarioIncapacidad">
                        <i class="fa-solid fa-book-skull"></i>
                        Beneficiario(s) en caso de incapacidad
                    </label>
                    <input type="text" id="apBeneficiarioIncapacidad" name="beneficiary_disability"
                        value="{{ $slip_type->beneficiary_disability }}">
                </div>

            </div>
        </div>

        {{-- table Objetos del seguro --}}

        <div class="tableContainer">
            <h3 class="slipTitle">Objeto(s) Del Seguro</h3>

            <table id="vidaListadoPersonasAseguradasTable" class="indemnizacionTable">
                <thead>
                    <tr>
                        <th style="text-align: center; width: 42px;">#</th>
                        <th style="text-align: center">Nombre</th>
                        <th style="text-align: center">Fecha de Nacimiento</th>
                        <th style="text-align: center">Edad</th>
                        <th style="text-align: center">Sexo</th>
                        <th style="text-align: center">Actividad</th>
                        <th style="text-align: center">Límite</th>
                        <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                            colspan="1" aria-label="Add row">
                        @if ($slip->type_coverage === 2 || $slip->type_coverage === 4)
                            <button type="button" onclick="addPersonaAseguradaRow(event, 'vida')"
                                class="btn btn-success btn-xs">
                                +
                            </button>                            
                        @endif
                        
                        </th>
                    </tr>
                </thead>
                {{-- tbody --}}
                <tbody id="vidaListadoPersonasAseguradasTableBody">
                    @if (count($object_insurance) > 0)
                        @foreach ($object_insurance as $key => $item )
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>
                                    <input value="{{$item->name}}" type="text" name="name[]" placeholder="Nombre..">
                                </td>

                                <td>
                                    <input value="{{$item->birthday}}" type="date" name="birthday[]" id="birthDate" class="birthdateInput" oninput="putAge('personaAdicional')">
                                </td>

                                <td>
                                    <input value="{{$item->age}}" type="number" step="any" class="ageInput" name="age[]" id="personAge" min="1"
                                            max="110">
                                </td>

                                <td>
                                    <select name="sex_merchant[]" id="sex">
                                        <option value="Masculino" {{$item->sex_merchant == 'Masculino' ? 'selected' : ''}}>Masculino</option>
                                        <option value="Femenino" {{$item->sex_merchant == 'Femenino' ? 'selected' : ''}}>Femenino</option>
                                    </select>
                                </td>
                                <td>
                                    <input value="{{$item->activity_merchant}}" type="text" placeholder="..." name="activity_merchant[]">
                                </td>
                                <td>
                                    <input value="{{$item->limit}}" type="text" placeholder="..." name="limit[]">
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>1</td>
                            <td>
                                <input type="text" name="name[]" placeholder="Nombre..">
                            </td>

                            <td>
                                <input type="date" name="birthday[]" id="birthDate" class="birthdateInput" oninput="putAge('personaAdicional')">
                            </td>

                            <td>
                                <input type="number" step="any" class="ageInput" name="age[]" id="personAge" min="1"
                                        max="110">
                            </td>

                            <td>
                                <select name="sex_merchant[]" id="sex">
                                    <option value="m" selected>Masculino</option>
                                    <option value="f">Femenino</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" placeholder="..." name="activity_merchant[]">
                            </td>
                            <td>
                                <input type="text" placeholder="..." name="limit[]">
                            </td>
                        </tr>
                    @endif
                </tbody>

            </table>

        </div>

        <div class="two-sides">
            <div class="left_side">
                {{-- Numero asegurado --}}
                <div class="input_group">
                    <label for="apNumAsegurado">
                        <i class="fa-solid fa-flag"></i>
                        Número asegurados
                    </label>
                    <input type="text" id="apNumAsegurado" name="num_insurer" value="{{ $slip->num_insurer }}">
                </div>
            </div>
            <div class="right">
                {{-- Cumulo asegurado --}}
                @if ($slip->insurable_value === 2 || $slip->insurable_value === 4)                            
                    <div class="input_group">
                        <label for="apCumuloAsegurado">
                            <i class="fa-solid fa-flag"></i>
                            Cúmulo asegurado
                        </label>
                        <input type="number" step="any" id="apCumuloAsegurado" name="insurable_value"
                            value="{{ $slip->insurable_value }}">
                    </div>
                @endif
            </div>
        </div>


    </div>

    <div class="form_group2">
        <h3 class="slipTitle"> <span class="badge badge-secondary">3</span> Coberturas Adicionales</h3>

        {{-- @include('admin.tecnico.slip.slips_generales.tableCoberturasAdicionalesV2') --}}
        @include('admin.comercial.include.edit_tablaCoberturas')


        {{-- Cláusulas Adicionales --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">4</span> Cláusulas Adicionales</h3>

        {{-- @include('admin.tecnico.slip.slips_generales.tableClausulasAdicionalesV2') --}}
        @include('admin.comercial.include.edit_tablaClausulas')


    </div>

    <div class="form_group3">
        {{-- Exclusiones --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Exclusiones</h3>

        @include('admin.tecnico.slip.slips_generales.exclusiones')
    </div>

    <div class="form_group4">
        {{-- Deducibles --}}
        <h3 class="slipTitle"> <span class="badge badge-secondary">6</span> Deducibles</h3>

        @include('admin.tecnico.slip.slips_generales.deducibles')

    </div>

    <div class="form_group5">
        <h3 class="slipTitle"> <span class="badge badge-secondary">5</span> Indemnización</h3>

        <p class="slipTitle">
            Porcentaje de indemnización de acuerdo al límite de edad, para la cobertura de vida y accidentes personales
        </p>

        <div class="sentenceInput">
            <label>Desde los</label>
            <input class="inputNumber" type="number" step="any" id="apIndemnizacionEdadDesde" name="compensation_since">
            <label> años, hasta los</label>
            <input class="inputNumber" type="number" step="any" id="apIndemnizacionEdadHasta" name="compensation_until">
            <label> años, al</label>
            <input class="inputNumber" type="number" step="any" id="apIndemnizacionSumaAsegurada1"
                name="compensation_porcentage">
            <label>% de la suma asegurada</label>
        </div>

        <div class="tableContainer">
            <table class="indemnizacionTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>INCAPACIDAD Y/O DESMEMBRACION</th>
                        <th>CANTIDAD (%)</th>
                    </tr>
                </thead>
                {{-- tbody --}}
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>Enajenación mental que impida todo trabajo.</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion1" name="Indemnizacion1" value="100"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Parálisis o Incapacidad total y permanente</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion2" name="Indemnizacion2" value="100"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Pérdida de la Vista de ambos ojos</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion3" name="Indemnizacion3" value="100"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Pérdida o inutilización total y permanente de ambas manos o ambos pies</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion4" name="Indemnizacion4" value="100"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Pérdida o inutilización total y permanente de una mano y un pie</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion5" name="Indemnizacion5" value="100"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Pérdida total e irrecuperable del habla</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion6" name="Indemnizacion6" value="100"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Pérdida total e irreparable de la audición de los dos oídos</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion7" name="Indemnizacion7" value="100"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Pérdida de dos o más miembros principales</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion8" name="Indemnizacion8" value="100"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Pérdida total e irreparable de un ojo, junto con la pérdida de un pie o una mano</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion9" name="Indemnizacion9" value="100"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Pérdida total de los dedos de ambas manos, comprendiendo todas las falanges</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion10" name="Indemnizacion10" value="100"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Pérdida o inutilización total y permanente de una mano</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion11" name="Indemnizacion11" value="80"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>Pérdida de todos los dedos de una mano</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion12" name="Indemnizacion12" value="60"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>Pérdida o inutilización total y permanente de un pie</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion13" name="Indemnizacion13" value="80"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>Pérdida total o irreparable de la visión de un ojo</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion14" name="Indemnizacion14" value="60"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>Pérdida total permanente de la audición de un oído</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion15" name="Indemnizacion15" value="60"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td>Pérdida de un miembro principal. </td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion16" name="Indemnizacion16" value="60"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <td>Pérdida de los dedos pulgar e índice de la misma mano</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion17" name="Indemnizacion17" value="25"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <td>Pérdida del pulgar derecho</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion18" name="Indemnizacion18" value="20"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td>Pérdida del pulgar izquierdo</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion19" name="Indemnizacion19" value="20"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td>Pérdida de las falanges del pulgar derecho</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion20" name="Indemnizacion20" value="20"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>21</td>
                        <td>Pérdida de las falanges del pulgar izquierdo</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion21" name="Indemnizacion21" value="20"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>22</td>
                        <td>Pérdida de una de las falanges del pulgar derecho</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion22" name="Indemnizacion22" value="20"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>23</td>
                        <td>Pérdida de una de las falanges del pulgar izquierdo</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion23" name="Indemnizacion23" value="20"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>24</td>
                        <td>Pérdida del dedo grande del pie</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion24" name="Indemnizacion24" value="20"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>25</td>
                        <td>Pérdida de tres falanges de cualquier otro dedo de la mano derecha</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion25" name="Indemnizacion25" value="15"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>26</td>
                        <td>Pérdida de dos falanges de cualquier otro dedo de la mano izquierda</td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion26" name="Indemnizacion26" value="15"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>27</td>
                        <td>Pérdida de dos falanges de cualquier otro dedo de la mano derecha </td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion27" name="Indemnizacion27" value="15"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>28</td>
                        <td>Pérdida de dos falanges de cualquier otro dedo de la mano izquierda </td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion28" name="Indemnizacion28" value="15"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td>29</td>
                        <td>Pérdida de una falange de cualquier otro dedo de la mano derecha </td>
                        <td>
                            <input type="number" step="any" id="apIndemnizacion29" name="Indemnizacion29" value="10"
                                min="0" style="width: 75px">
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>

    </div>

    <div class="form_group6">

        @include('admin.tecnico.slip.slips_generales.footer1')
    
    </div>
    
    <div class="form_group7">
    
        @include('admin.tecnico.slip.slips_generales.footer2')
    
    </div>

</form>
