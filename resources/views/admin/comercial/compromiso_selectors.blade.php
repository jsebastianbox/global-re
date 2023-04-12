<div class="new_entry__form" id="compromiso_form">
    {{-- TODO: nuevo compromiso --}}

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
    <div class="grid_elements" id="new_compromiso">
        <div class="left_side">

            {{-- Fecha y hora del slip --}}
            <div class="selectContainer">
                <div class="input--label">
                    <label class="labelForm" for="date">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                            <path
                                d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                        </svg>
                        Fecha
                        <input class="inputForm" type="datetime-local" id="date" name="date" value="{{ date('Y-m-d\TH:i') }}">
                    </label>
                    <script>
                        window.addEventListener('load', () => {
                            var now = new Date();
                            now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
                            now.setMilliseconds(null)
                            now.setSeconds(null)

                            document.getElementById('date').value = now.toISOString().slice(0, -1);
                        });
                    </script>
                </div>
            </div>

            {{-- <div class="selectContainer">
                <div class="input--label">

                    <label class="labelForm" for="insured">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                            <path
                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                            <path
                                d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                        </svg>
                        Asegurado
                        <input class="inputForm" type="text" id="insured" name="insured">
                    </label> <!-- Lo único mnanual es este de aquí -->
                </div>
            </div> --}}

            {{-- Slips --}}
            <div class="selectContainer">
                <div class="input--label">
                    <label class="labelForm" for="branch">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-bezier2" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 2.5A1.5 1.5 0 0 1 2.5 1h1A1.5 1.5 0 0 1 5 2.5h4.134a1 1 0 1 1 0 1h-2.01c.18.18.34.381.484.605.638.992.892 2.354.892 3.895 0 1.993.257 3.092.713 3.7.356.476.895.721 1.787.784A1.5 1.5 0 0 1 12.5 11h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5H6.866a1 1 0 1 1 0-1h1.711a2.839 2.839 0 0 1-.165-.2C7.743 11.407 7.5 10.007 7.5 8c0-1.46-.246-2.597-.733-3.355-.39-.605-.952-1-1.767-1.112A1.5 1.5 0 0 1 3.5 5h-1A1.5 1.5 0 0 1 1 3.5v-1zM2.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10 10a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
                        </svg>
                        Ramo
                        <select class="inputForm" name="branch" id="slips" onchange="update()">
                            <option selected disabled value="">Selecciona</option>
                            <option value="s1">Vida y accidentes personales</option>
                            <option value="s2">Activos fijos</option>
                            <option value="s3">Vehículos</option>
                            <option value="s4">Ramos técnicos</option>
                            <option value="s5">Energía</option>
                            <option value="s6">Marítimo</option>
                            <option value="s7">Aviación</option>
                            <option value="s8">Responsabilidad Civil</option>
                            <option value="s9">Riesgos financieros</option>
                            <option value="s10">Fianzas</option>
                        </select>
                    </label>
                </div>
            </div>

            {{-- Sub coberturas de slips --}}
            <div class="selectContainer">
                <section style="display: none" id="s1">
                    <div class="selectContainer">
                        <div class="input--label">
                            <label class="labelForm" for="cobertura_principal">
                                Tipo de cobertura
                                <select class="inputForm" name="cobertura_principal" id="cobertura_vida"
                                    onchange="updateS1()">
                                    <option value="" disabled selected>Seleccionar</option>
                                    <option value="vi">Vida individual</option>
                                    <option value="vc">Vida colectiva</option>
                                    <option value="api">Accidentes personales individual</option>
                                    <option value="apc">Accidentes personales colectiva</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </section>

                <section style="display: none" id="s2">
                    <div class="selectContainer" id="prop">
                        <div class="input--label">
                            <label class="labelForm" for="">Tipo de cobertura
                                <select class="inputForm" name="cobertura_principal" id="cobertura_activos"
                                    onchange="updateS2()">
                                    <option value="" disabled selected>Seleccionar</option>
                                    <option value="ila">Incendio todo riesgo</option>
                                    <option value="lcla">Lucro cesante por incendio y líneas aliadas
                                    </option>
                                    <option value="robo">Robo</option>
                                    <option value="st">Sabotaje y terrorismo</option>
                                </select>
                            </label>
                        </div>
                    </div>

                </section>

                <section style="display: none" id="s3">
                    <div class="selectContainer" id="vehi">
                        <div class="input--label">
                            <label class="labelForm" for="">Tipo de cobertura
                                <select class="inputForm" name="cobertura_vehiculos" id="cobertura_vehiculos"
                                    onchange="updateS3()">
                                    <option value="" disabled selected>Seleccionar</option>
                                    <option value="vl">Vehículos livianos</option>
                                    <option value="vp">Vehículos pesados</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </section>

                <section style="display: none" id="s4">
                    <div class="selectContainer" id="tec">
                        <div class="input--label">
                            <label class="labelForm" for="">Tipo de cobertura
                                <select class="inputForm" name="cobertura_principal" id="cobertura_tecnicos"
                                    onchange="updateS4()">
                                    <option value="" disabled selected>Seleccionar</option>
                                    <option value="ee">Equipo electrónico</option>
                                    <option value="rm">Rotura de maquinaria</option>
                                    <option value="pbrm">Pérdida de beneficios por rotura de maquinaria
                                    </option>
                                    <option value="emc">Equipo y maquinaria de contratistas</option>
                                    <option value="trc">Todo riesgo para contratistas</option>
                                    <option value="mm">Montaje de maquinaria</option>
                                    <option value="alop">ALOP</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </section>

                <section style="display: none" id="s5">
                    <div class="selectContainer" id="ene">
                        <div class="input--label">
                            <label class="labelForm" for="">Tipo de cobertura
                                <select class="inputForm" name="cobertura_principal" id="cobertura_energia"
                                    onchange="updateS5()">
                                    <option value="" disabled selected>Seleccionar</option>
                                    <optgroup label="Todo riesgo petrolero">
                                        <option value="us">Upstream</option>
                                        <option value="ds">Downstream</option>
                                        <option value="rc">Responsabilidad civil</option>
                                    </optgroup>
                                </select>
                            </label>
                        </div>
                    </div>
                </section>

                <section style="display: none" id="s6">
                    <div class="selectContainer" id="marit">
                        <div class="input--label">
                            <label class="labelForm" for="">Tipo de cobertura
                                <select class="inputForm" name="cobertura_principal" id="cobertura_maritimo"
                                    onchange="updateS6()">
                                    <option value="" disabled selected>Seleccionar</option>
                                    <option value="cm">Casco y maquinaria</option>
                                    <option value="mrc">Responsabilidad civil</option>
                                    <option value="pi">Protection and indemnity P&I</option>
                                    <option value="rcp">RC Portuaria</option>
                                    <option value="rcas">RC Astilleros</option>
                                    <option value="rcar">RC Armadores</option>
                                    <optgroup label="Transporte">
                                        <option value="tin">Interno</option>
                                        <option value="ex">Exportaciones</option>
                                        <option value="im">Importaciones</option>
                                        <option value="stp">Stock throughout STP</option>
                                        <option value="td">Transporte de dinero</option>
                                    </optgroup>
                                </select>
                            </label>
                        </div>
                    </div>
                </section>

                <section style="display: none" id="s7">
                    <div class="selectContainer" id="aviac">
                        <div class="input--label">
                            <label class="labelForm" for="">Tipo de cobertura
                                <select class="inputForm" name="cobertura_principal" id="cobertura_aviacion"
                                    onchange="updateS7()">
                                    <option value="" disabled selected>Seleccionar</option>
                                    <option value="ca">Casco aéreo</option>
                                    <option value="rc">Responsabilidad civil</option>
                                    <option value="pl">Pérdida de licencia</option>
                                    <option value="rca">Responsabilidad civil aeroportuaria</option>
                                    <option value="rch">Responsabilidad civil hangares</option>
                                    <option value="ariel">ARIEL</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </section>

                <section style="display: none" id="s8">
                    <div class="selectContainer" id="resciv">
                        <div class="input--label">
                            <label class="labelForm" for="">Tipo de cobertura
                                <select class="inputForm" name="cobertura_principal"
                                    id="cobertura_responsabilidad_civil" onchange="updateS8()">
                                    <option value="" disabled selected>Seleccionar</option>
                                    <option value="plo">Extracontractual PLO</option>
                                    <option value="cont">Contractual</option>
                                    <option value="eo">Errores y omisiones</option>
                                    <option value="rcm">Responsabilidad civil médica</option>
                                    <option value="rcrcp">Responsabilidad civil profesional</option>
                                    <option value="da">Directores y administradores</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </section>

                <section style="display: none" id="s9">
                    <div class="selectContainer" id="riesg">
                        <div class="input--label">
                            <label class="labelForm" for="">Tipo de cobertura
                                <select class="inputForm" name="cobertura_principal"
                                    id="cobertura_riesgos_financieros" onchange="updateS9()">
                                    <option value="" disabled selected>Seleccionar</option>
                                    <option value="bbb">Bancos e instituciones financieras (BBB)
                                    </option>
                                    <option value="fif">Fidelidad para instituciones financieras
                                    </option>
                                </select>
                            </label>
                        </div>
                    </div>
                </section>

                <section style="display: none" id="s10">
                    <div class="selectContainer" id="finan">
                        <div class="input--label">
                            <label class="labelForm" for="">Tipo de cobertura
                                <select class="inputForm" name="cobertura_principal" id="cobertura_finanzas"
                                    onchange="updateS10()">
                                    <option value="" disabled selected>Seleccionar</option>
                                    <option value="fi">Fidelidad</option>
                                    <option value="so">Serenidad de oferta</option>
                                    <option value="cc">Cumplimiento de contrato</option>
                                    <option value="ba">Buen uso de anticipo</option>
                                    <option value="ej">Ejecución de obra y buena calidad de materiales
                                    </option>
                                    <option value="ga">Garantías aduaneras</option>
                                    <option value="og">Otras garantías</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
