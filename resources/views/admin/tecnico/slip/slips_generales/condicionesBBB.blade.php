<div class="tableContainer" style="margin: 2rem 0">
    <table id="condicionesTable" class="indemnizacionTable">
        <thead>
            <tr>
                <th style="text-align: center; width: 42px;">#</th>
                <th style="text-align: center">Cláusulas</th>
                <th style="text-align: center">Campo adicional</th>
                <th style="text-align: center">USD</th>
                <th style="text-align: center">Campo adicional</th>
                <th style="text-align: center; width: 42px;" class="sorting_" rowspan="1" colspan="1"
                    aria-label="Add row">
                <button onclick="addRowCondiciones(event, '')" class="btn btn-success btn-xs">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
                </th>
            </tr>
        </thead>
        {{-- tbody --}}
        <tbody id="condicionesTableBody">
            <tr>
                <td>1</td>
                <td>
                    <select name="description_condition_additional[]">
                        <optgroup label="Condiciones Aplicables a Todas las Secciones:">
                            <option value="Fecha de Retroactividad">Fecha de Retroactividad</option>
                            <option value="Cláusula de Limitación de Descubrimiento BEJH1">Cláusula de Limitación de Descubrimiento BEJH1</option>
                            <option value="Cláusula de Cancelación 60 días calendarios NMA 355">Cláusula de Cancelación 60 días calendarios NMA 355</option>
                            <option value="Ampliación aviso de siniestros 14 días">Ampliación aviso de siniestros 14 días</option>
                            <option value="Se excluyen pérdidas provenientes de lavado de activos">Se excluyen pérdidas provenientes de lavado de activos</option>
                            <option value="Es entendido y acordado que el Asegurado deberá informar cualquier transacción que produzca cualquier cambio en su dominio o control y que el incumplimiento en informar dicha transacción dentro de los treinta (30) días desde la fecha de la misma, constituirá determinación del Asegurado de terminar esta Póliza, a partir del comienzo de dicho período de treinta (30) días">Es entendido y acordado que el Asegurado deberá informar cualquier transacción que produzca cualquier cambio en su dominio o control y que el incumplimiento en informar dicha transacción dentro de los treinta (30) días desde la fecha de la misma, constituirá determinación del Asegurado de terminar esta Póliza, a partir del comienzo de dicho período de treinta (30) días</option>
                            <option value="Exclusión de la violación de la privacidad y los datos">Exclusión de la violación de la privacidad y los datos</option>
                            <option value="Se excluyen las pérdidas o reclamos que resulten, total o parcialmente, de pagos, transferencias o giros de cualquier índole (por teléfono, fax, Internet, correo electrónico, o cualquier otro medio electrónico o no), en los cuales el asegurado no haya implantado un sistema de doble control en el cual se cumplan al menos los siguientes requisitos">Se excluyen las pérdidas o reclamos que resulten, total o parcialmente, de pagos, transferencias o giros de cualquier índole (por teléfono, fax, Internet, correo electrónico, o cualquier otro medio electrónico o no), en los cuales el asegurado no haya implantado un sistema de doble control en el cual se cumplan al menos los siguientes requisitos:</option>
                        </optgroup>
                        <optgroup label="Condiciones Aplicables a la Sección A:">
                            <option value="Todos los términos y condiciones de acuerdo al texto DHP84, según adjunto, sin embargo la Cláusula de infidelidad del Clausulado DHP84 se elimina y se reemplaza por la Cláusula de infidelidad del Clausulado KFA81">Todos los términos y condiciones de acuerdo al texto DHP84, según adjunto, sin embargo la Cláusula de infidelidad del Clausulado DHP84 se elimina y se reemplaza por la Cláusula de infidelidad del Clausulado KFA81</option>
                            <option value="Extensión de directores de acuerdo al Clausulado DHP84">Extensión de directores de acuerdo al Clausulado DHP84</option>
                            <option value="Se incluye extensión de motines huelgas, conmoción Civil daño malicioso, vandalismo y actos malintencionados para títulos valores únicamente">Se incluye extensión de motines huelgas, conmoción Civil daño malicioso, vandalismo y actos malintencionados para títulos valores únicamente</option>
                            <option value="Se incluye cobertura de Terremoto e Incendio para dineros y títulos valores">Se incluye cobertura de Terremoto e Incendio para dineros y títulos valores</option>
                            <option value="Moneda falsa, se extiende a cubrir monedas de todo el mundo">Moneda falsa, se extiende a cubrir monedas de todo el mundo</option>
                            <option value="Se otorga cobertura para Transito de bienes asegurados realizados por transportadores de valores (terceras partes), en exceso de las pólizas contratadas por dichas compañías para tal fin, con la condición de que dichas compañías asuman toda responsabilidad por estos tránsitos y que el Asegurado requiera prueba escrita de la existencia de un póliza que cubra el total de los transportes de valores">Se otorga cobertura para Transito de bienes asegurados realizados por transportadores de valores (terceras partes), en exceso de las pólizas contratadas por dichas compañías para tal fin, con la condición de que dichas compañías asuman toda responsabilidad por estos tránsitos y que el Asegurado requiera prueba escrita de la existencia de un póliza que cubra el total de los transportes de valores</option>
                            <option value="Se incluyen honorarios de auditores y/o gastos legales hasta .... toda y cada pérdida y en el agregado anual. Deducible de USD .... toda y cada pérdida">Se incluyen honorarios de auditores y/o gastos legales hasta .... toda y cada pérdida y en el agregado anual. Deducible de USD .... toda y cada pérdida</option>
                            <option value="Cláusula de Extensión de Responsabilidad por No Pago NMA 1829">Cláusula de Extensión de Responsabilidad por No Pago NMA 1829</option>
                            <option value="Cláusula de Extensión de extorsión a personas sub-limitado a USD .... toda y cada pérdida y en el agregado">Cláusula de Extensión de extorsión a personas sub-limitado a USD .... toda y cada pérdida y en el agregado</option>
                            <option value="Cláusula de Extensión de extorsión a bienes sub-limitado a USD ...., toda y cada pérdida y en el agregado">Cláusula de Extensión de extorsión a bienes sub-limitado a USD ...., toda y cada pérdida y en el agregado</option>
                            <option value="Amparo automático para nuevos empleados y oficinas de acuerdo al Clausulado DHP 84. Sin embargo las fusiones y/o adquisiciones deberán ser reportadas para su respectivo estudio y aprobación y cobro de prima adicional a ser convenida">Amparo automático para nuevos empleados y oficinas de acuerdo al Clausulado DHP 84. Sin embargo las fusiones y/o adquisiciones deberán ser reportadas para su respectivo estudio y aprobación y cobro de prima adicional a ser convenida</option>
                            <option value="Incluye Falsificación por Télex Probados">Incluye Falsificación por Télex Probados</option>
                            <option value="Cobertura para cajillas de seguridad de acuerdo al Clausulado DHP 84">Cobertura para cajillas de seguridad de acuerdo al Clausulado DHP 84</option>
                            <option value="Se excluyen los conocimientos de embarque y los recibos de almacenes de depósito y/o similares">Se excluyen los conocimientos de embarque y los recibos de almacenes de depósito y/o similares</option>
                            <option value="Todos los amparos y anexos hacen parte del límite agregado anual y no son en adición a este">Todos los amparos y anexos hacen parte del límite agregado anual y no son en adición a este</option>
                            <option value="Todas las alteraciones y/o modificaciones y/o extensiones deberán ser acordadas con el Reasegurador">Todas las alteraciones y/o modificaciones y/o extensiones deberán ser acordadas con el Reasegurador</option>
                            <option value=" Cláusula de ATMs hasta USD .... por evento USD .... en el agregado anual con respecto a cada cajero automático"> Cláusula de ATMs hasta USD .... por evento USD .... en el agregado anual con respecto a cada cajero automático</option>
                            <option value="No se otorga cobertura para cajillas de seguridad">No se otorga cobertura para cajillas de seguridad</option>
                        </optgroup>
                        <optgroup label="Condiciones Aplicables a la Sección B:">
                            <option value="Clausulado LSW 238, convenios del 1 al 9">Clausulado LSW 238, convenios del 1 al 9</option>
                            <option value="Incluye Costos de Limpieza, sub-limitados a USD .... toda y cada pérdida, parte del agregado Anual y no en adición">Incluye Costos de Limpieza, sub-limitados a USD .... toda y cada pérdida, parte del agregado Anual y no en adición</option>
                            <option value="Se excluyen VIT e Internet">Se excluyen VIT e Internet</option>
                            <option value="Pérdidas resultante directa o indirectamente  en relación con Cajeros Automáticos sublimitada a USD .... por evento y USD .... en el agregado anual">Pérdidas resultante directa o indirectamente  en relación con Cajeros Automáticos sublimitada a USD .... por evento y USD .... en el agregado anual</option>
                        </optgroup>
                    </select>
                </td>
                <td>
                    <input type="text" placeholder="..." name="condition_additional_additional[]">
                </td>
                <td>
                    <input type="number" placeholder="0" name="condition_additional_usd[]">
                </td>
                <td>
                    <input type="text" placeholder="..." name="condition_additional_additional2[]">
                </td>
            </tr>
        </tbody>
    </table>
</div>
