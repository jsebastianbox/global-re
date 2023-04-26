<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CoberturasSelector;

class CoberturasSelectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            //Vida
            [
                'name' => 'Muerte por cualquier causa',
                'main_branch' => 'vida',
                'sub_branch' => 'vida'
            ],
            [
                'name' => 'Desmembración accidental',
                'main_branch' => 'vida',
                'sub_branch' => 'vida'
            ],
            [
                'name' => 'Incapacidad total y permanente por cualquier causa',
                'main_branch' => 'vida',
                'sub_branch' => 'vida'
            ],
            [
                'name' => 'Reembolso de gastos médicos por acctidente',
                'main_branch' => 'vida',
                'sub_branch' => 'vida'
            ],
            [
                'name' => 'Gastos de sepelio',
                'main_branch' => 'vida',
                'sub_branch' => 'vida'
            ],
            [
                'name' => 'Ambulancia por accidente',
                'main_branch' => 'vida',
                'sub_branch' => 'vida'
            ],
            //Activos Fijos
            [
                'name' => 'Bienes bajo cuidado, custodia y control hasta',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],

            [
                'name' => 'Rotura de tanques y derrame de contenido',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],

            [
                'name' => 'Honorarios de Ingenieros, Arquitectos',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],

            [
                'name' => 'Remoción de escombros (desarme, demolición, obras provisionales como consecuencia de un siniestro amparado por la presente póliza)',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],

            [
                'name' => 'Gastos para reducir perdidas y daños',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],

            [
                'name' => 'Traslado temporal, bienes propios únicamente (excluye daños durante el trasporte, carga, descarga y hurto)',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],

            [
                'name' => 'Gastos para acelerar reparaciones (expediting expenses)',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],

            [
                'name' => 'Honorarios, gastos de viaje y estadía',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],

            [
                'name' => 'Vidrios y cristales',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],

            [
                'name' => 'Honorarios de auditores, revisores y contadores',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],

            [
                'name' => 'Alteraciones y reparaciones',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],

            [
                'name' => 'Intereses de contratista',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],

            [
                'name' => 'Gastos adicionales (flete aéreo, horas extras, días feriados, trabajos nocturnos aplicable a cualquier cobertura de la póliza)',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],

            [
                'name' => 'Documentos y modelos',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],

            [
                'name' => 'Extintores',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],

            [
                'name' => 'Refrigeración',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],

            [
                'name' => 'Arrendamientos',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],

            [
                'name' => 'Gastos extraordinarios',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            //Lucro cesante
            [
                'name' => 'Gastos de auditores y revisores',
                'main_branch' => 'activos',
                'sub_branch' => 'lucro'
            ],
            [
                'name' => 'Gastos de viaje y estadía',
                'main_branch' => 'activos',
                'sub_branch' => 'lucro'
            ],
            [
                'name' => 'Gastos extraordinarios',
                'main_branch' => 'activos',
                'sub_branch' => 'lucro'
            ],
            [
                'name' => 'Hurto',
                'main_branch' => 'activos',
                'sub_branch' => 'robo'
            ],

            //Sabotaje y terrorismo no hay

            //Marítimo

            //Casco marítimo
            [
                'name' => 'CL 280 – Cláusulas a término del Instituto Casco con ¾ de Responsabilidad por colisión suprimida',
                'main_branch' => 'maritimo',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'CL 281 – Cláusula del Instituto para Guerra y Huelgas',
                'main_branch' => 'maritimo',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'CL 311 – Cláusula a término. Riesgos de Puerto',
                'main_branch' => 'maritimo',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'CL 328 – Cláusula para Yates',
                'main_branch' => 'maritimo',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'CL 333 – Cláusula para embarcaciones rápidas. Condiciones Especiales y Riesgos adicionalmente excluidos',
                'main_branch' => 'maritimo',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'CL 370 – Cláusula del Instituto de exclusión de contaminación radioactiva, química, biológica, bioquímica, y armas electromagnéticas',
                'main_branch' => 'maritimo',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'CL 380 – Cláusula del Instituto de exclusión de ataques cibernéticos',
                'main_branch' => 'maritimo',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'Se cubre robo, incluye robo de motores',
                'main_branch' => 'maritimo',
                'sub_branch' => 'casco'
            ],

            //Maritimo Proteccion 

            [
                'name' => 'Responsabilidades respecto a gente de mar',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],

            [
                'name' => 'Responsabilidad respecto a pasajeros',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],

            [
                'name' => 'Gastos de cambio de derrota',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],

            [
                'name' => 'Gastos de cambio de derrota',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],

            [
                'name' => 'Responsabilidades por salvamento de vidas humanas',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],

            [
                'name' => 'Responsabilidad por colisión con otros buques',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],

            [
                'name' => 'Responsabilidad por pérdida o daño a la propiedad',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],

            [
                'name' => 'Responsabilidad por contaminación ambiental',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],

            [
                'name' => 'Responsabilidad por remolque',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],

            [
                'name' => 'Responsabilidad derivada de ciertas indemnizaciones y contratos',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],

            [
                'name' => 'Responsabilidad por naufragio',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],

            [
                'name' => 'Gastos por cuarentena',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],

            [
                'name' => 'Contribuciones en avería gruesa no recuperables',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],

            [
                'name' => 'Proporción del buque en la avería gruesa',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],

            [
                'name' => 'Propiedad a bordo del buque asegurado',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],
            [
                'name' => 'Remuneración especial a los salvadores',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],
            [
                'name' => 'Multas',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],
            [
                'name' => 'Investigaciones y procedimientos penales',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],
            [
                'name' => 'Responsabilidades y gastos incurridos por orden de los Administradores',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],
            [
                'name' => 'Costes jurídicos y de medidas preventivas',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],
            [
                'name' => 'Responsabilidad Civil ante otros terceros',
                'main_branch' => 'maritimo',
                'sub_branch' => 'proteccion_indemnizacion'
            ],


            //P&I, rc portuaria, rc armadores, astilleros no hay

            //No hay ninguna de transporte

            //Casco aereo

            [
                'name' => 'Errores u Omisiones',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'Cancelación Anticipada',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'Liquidación de Cláusulas U.P.I',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'Liquidación de AVN 26 A',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'Liquidación de Inclusiones y Exclusiones de Aeronaves',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'Extensión de vigencia a prorrata',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            //Perdida de licencia
            [
                'name' => 'Errores u Omisiones',
                'main_branch' => 'aviacion',
                'sub_branch' => 'pl'
            ],
            [
                'name' => 'Cancelación Anticipada',
                'main_branch' => 'aviacion',
                'sub_branch' => 'pl'
            ],
            [
                'name' => 'Liquidación de Cláusulas U.P.I',
                'main_branch' => 'aviacion',
                'sub_branch' => 'pl'
            ],
            [
                'name' => 'Liquidación de AVN 26 A',
                'main_branch' => 'aviacion',
                'sub_branch' => 'pl'
            ],
            [
                'name' => 'Liquidación de Inclusiones y Exclusiones de Aeronaves',
                'main_branch' => 'aviacion',
                'sub_branch' => 'pl'
            ],
            [
                'name' => 'Extensión de vigencia a prorrata',
                'main_branch' => 'aviacion',
                'sub_branch' => 'pl'
            ],
            //Energia Todo riesgo petrolero
            [
                'name' => 'Bienes bajo cuidado, custodia y control hasta',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Rotura de tanques y derrame de contenido',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Honorarios de Ingenieros, Arquitectos',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Remoción de escombros (desarme, demolición, obras provisionales como consecuencia de un siniestro amparado por la presente póliza)',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Gastos para reducir perdidas y daños',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Traslado temporal, bienes propios únicamente (excluye daños durante el trasporte, carga, descarga y hurto)',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Gastos para acelerar reparaciones (expediting expenses)',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Honorarios, gastos de viaje y estadía',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Vidrios y cristales',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Honorarios de auditores, revisores y contadores',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Alteraciones y reparaciones',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Intereses de contratista',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Gastos adicionales (flete aéreo, horas extras, días feriados, trabajos nocturnos aplicable a cualquier cobertura de la póliza)',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Documentos y modelos',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Extintores',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Refrigeración',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Arrendamientos',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Gastos extraordinarios',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            //Fianzas no hay
            //Fidelidad (asumiendo que es de fianzas, no de riesgos financieros)
            [
                'name' => 'Honorarios profesionales',
                'main_branch' => 'fianzas',
                'sub_branch' => 'fidelidad'
            ],
            //Resposabilidad civil
            [
                'name' => 'Gastos Médicos hasta',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Gastos de defensa, liquidación o ajuste de pagos suplementarios',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Responsabilidad Civil Patronal en exceso de los montos cubiertos por el Seguro Social hasta',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Responsabilidad Civil por Contaminación súbita imprevista y accidental',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Responsabilidad Civil por vehículos propios y no propios en exceso de la póliza de la póliza principal de vehículos hasta',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Bienes bajo cuidado, custodia y control',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Contratistas y subcontratistas',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            //Contractual
            [
                'name' => 'Gastos Médicos hasta',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Gastos de defensa, liquidación o ajuste de pagos suplementarios',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Responsabilidad Civil Patronal en exceso de los montos cubiertos por el Seguro Social hasta',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Responsabilidad Civil por Contaminación súbita imprevista y accidental',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Responsabilidad Civil por vehículos propios y no propios en exceso de la póliza de la póliza principal de vehículos hasta',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Bienes bajo cuidado, custodia y control',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Contratistas y subcontratistas',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            // Errores y omisiones no hay, rc medica, rc profesional, directores y administradores tampoco
            //Ramos tecnicos (construccion  y montaje)
            [
                'name' => 'Cobertura principal A - Daño Material: Este seguro cubre los daños materiales que sufran los bienes asegurados detallados en las condiciones particulares por cualquier causa que no sea excluida expresamente y que no pudiera ser cubierta bajo las coberturasadicionales(hurto, dif.de inventarios/ desgastepaulatino, corrosión, deteriorogradual / daños existentes / otros(texto)',
                'main_branch' => 'tecnico',
                'sub_branch' => 'construccion'
            ],
            [
                'name' => 'Cobertura B: Terremoto, Temblor, Tsunami y Erupción Volcánica',
                'main_branch' => 'tecnico',
                'sub_branch' => 'construccion'
            ],
            [
                'name' => 'Cobertura C: Ciclón, Huracán, Tormenta, Ventarrón e Inundación',
                'main_branch' => 'tecnico',
                'sub_branch' => 'construccion'
            ],
            [
                'name' => 'Cobertura D: Mantenimiento',
                'main_branch' => 'tecnico',
                'sub_branch' => 'construccion'
            ],
            [
                'name' => 'Cobertura E y F: Responsabilidad Civil',
                'main_branch' => 'tecnico',
                'sub_branch' => 'construccion'
            ],
            [
                'name' => 'Cobertura G: Remosión de Escombros',
                'main_branch' => 'tecnico',
                'sub_branch' => 'construccion'
            ],
            //Riesgo Montaje
            [
                'name' => 'Cobertura principal A - Daño Material: Este seguro cubre los daños materiales que sufran los bienes asegurados detallados en las condiciones particulares causados por:
                a. Errores durante el montaje.
                b. Impericia, descuido y actos malintencionados de obreros y empleados del Aseguradoo de extraños.
                c. Caídade partesdel objetoquese monta, comoconsecuenciade roturade cables o cadenas, hundimiento o deslizamiento del equipo de montaje u otros accidentesanálogos.
                d. Robo, de acuerdo con la siguiente definición: se entenderá por robo las pérdidas por substracción de los bienes aseguradosy los daños que se causen a los mismos como consecuencia del intento o la consumación del robo, siempre y cuando la persona quelocometa haya penetrado al lugar por medios violentos o de fuerza y en forma tal que en el lugar de entrada o de salida queden huellas visibles de tal acto de violencia. El Asegurado se obliga a presentar una denuncia de los hechos, de que trata este inciso, ante la autoridadcompetente.
                e. Incendio, rayo, explosión.
                f. Hundimientode tierrao desprendimientode tierrao de rocas.
                g. Cortocircuitos, arcos voltaicos, así como la acción indirecta de la electricidadatmosférica.
                h. Caída de aviones o parte de ellos.
                i. Otros accidentes durante el montaje y que no pudieran ser cubiertos bajo los amparos adicionales de la Cláusula Segunda y,cuando se trate de bienes nuevos, también durante las pruebas de resistencia o de operación.
                ',
                'main_branch' => 'tecnico',
                'sub_branch' => 'montaje'
            ],
            [
                'name' => 'Cobertura principal A - Daño Material: Este seguro cubre los daños materiales que sufran los bienes asegurados detallados en las condiciones particulares causados por:',
                'main_branch' => 'tecnico',
                'sub_branch' => 'montaje'
            ],
            [
                'name' => 'Cobertura B: Terremoto, Temblor, Tsunami y Erupción Volcánica',
                'main_branch' => 'tecnico',
                'sub_branch' => 'montaje'
            ],
            [
                'name' => 'Cobertura C: Ciclón, Huracán, Tormenta, Ventarrón e Inundación',
                'main_branch' => 'tecnico',
                'sub_branch' => 'montaje'
            ],
            [
                'name' => 'Cobertura D: Mantenimiento',
                'main_branch' => 'tecnico',
                'sub_branch' => 'montaje'
            ],
            [
                'name' => 'Cobertura E y F: Responsabilidad Civil',
                'main_branch' => 'tecnico',
                'sub_branch' => 'montaje'
            ],
            [
                'name' => 'Cobertura G: Remosión de Escombros',
                'main_branch' => 'tecnico',
                'sub_branch' => 'montaje'
            ],
            //Equipo electronico
            [
                'name' => 'Bienes bajo cuidado, custodia y control hasta',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Alteraciones y reparaciones',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Honorarios de Ingenieros, Arquitectos',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Remoción de escombros (desarme, demolición, obras provisionales como consecuencia de un siniestro amparado por la presente póliza)',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Gastos para reducir perdidas y daños',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Traslado temporal, bienes propios únicamente (excluye daños durante el trasporte, carga, descarga y hurto)',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Gastos para acelerar reparaciones (expediting expenses)',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Honorarios, gastos de viaje y estadía',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Honorarios de auditores, revisores y contadores',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Gastos adicionales (flete aéreo, horas extras, días feriados, trabajos nocturnos aplicable a cualquier cobertura de la póliza)',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Gastos extraordinarios',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            //Rotura maquinaria
            [
                'name' => 'Huelga, Motín, Conmoción Civil',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Gastos adicionales por Horas Extras, Trabajos Nocturno, Trabajos en Días Feriados',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Flete Expreso',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Gastos Adicionales por Flete Aéreo',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Propiedad Adyacente y/o Responsabilidad Civil',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Derrame de Tanques y Contenidos',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Aceites, Lubricantes y Refrigerantes',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Honorarios, gastos de viaje y estadía',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            //Pérdida de beneficios
            [
                'name' => 'Gastos de auditores y revisores',
                'main_branch' => 'tecnico',
                'sub_branch' => 'beneficios'
            ],
            [
                'name' => 'Gastos de viaje y estadía',
                'main_branch' => 'tecnico',
                'sub_branch' => 'beneficios'
            ],
            [
                'name' => 'Gastos extraordinarios',
                'main_branch' => 'tecnico',
                'sub_branch' => 'beneficios'
            ],
            //Equipo y maquinaria
            [
                'name' => 'Actos mal Intensionados de Terceros, Huelga, Motín, Conmoción Civil',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Gastos adicionales por Horas Extras, Trabajos Nocturno, Trabajos en Días Feriados',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Flete Expreso',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Gastos Adicionales por Flete Aéreo',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Propiedad Adyacente y/o Responsabilidad Civil',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Derrame de Tanques y Contenidos',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Aceites, Lubricantes y Refrigerantes',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Honorarios, gastos de viaje y estadía',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Robo y/o Asalto',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Responsabilidad Civil Extracontractual',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            //ALOP
            [
                'name' => 'Gastos de auditores y revisores',
                'main_branch' => 'tecnico',
                'sub_branch' => 'alop'
            ],
            [
                'name' => 'Gastos de viaje y estadía',
                'main_branch' => 'tecnico',
                'sub_branch' => 'alop'
            ],
            [
                'name' => 'Gastos extraordinarios',
                'main_branch' => 'tecnico',
                'sub_branch' => 'alop'
            ],
            //Vehiculos
            [
                'name' => 'Actos mal Intensionados de Terceros, Huelga, Motín, Conmoción Civil',
                'main_branch' => 'tecnico',
                'sub_branch' => 'vehiculos'
            ],
            [
                'name' => 'Gastos adicionales por Horas Extras, Trabajos Nocturno, Trabajos en Días Feriados',
                'main_branch' => 'tecnico',
                'sub_branch' => 'vehiculos'
            ],
            [
                'name' => 'Accidentes Personales',
                'main_branch' => 'tecnico',
                'sub_branch' => 'vehiculos'
            ],
            [
                'name' => 'Responsabilidad Civil Extracontractual',
                'main_branch' => 'tecnico',
                'sub_branch' => 'vehiculos'
            ],
        ];

        foreach ($data as $item) {
            CoberturasSelector::create($item);
        }
    }
}
