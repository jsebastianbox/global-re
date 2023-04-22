<?php

namespace Database\Seeders;

use App\Models\exclusiones_selectors;
use Illuminate\Database\Seeder;

class ExclusionesSelectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // vida - accidente_personales                      
			[
				'name'  => 'Las personas que excedan los límites de edad mencionados en este Slip.',
				'main_branch' => 'vida',
				'sub_branch' => 'accidente_personales'
			],
			[
				'name'  => 'Daños extracontractuales, daños punitivos o ejemplares. ',
				'main_branch' => 'vida',
				'sub_branch' => 'accidente_personales'
			],
			[
				'name'  => 'Cualquier pago ex gracia',   
				'main_branch' => 'vida',
				'sub_branch' => 'accidente_personales'
			],
			[
				'name'  => 'Coberturas de Desempleo',
				'main_branch' => 'vida',
				'sub_branch' => 'accidente_personales'
			],
			[
				'name'  => 'Coberturas de Invalidez Parcial',
				'main_branch' => 'vida',
				'sub_branch' => 'accidente_personales'
			],
			[
				'name'  => 'Coberturas de Invalidez Temporal',
				'main_branch' => 'vida',
				'sub_branch' => 'accidente_personales'
			],
			[
				'name'  => 'Coberturas de Invalidez Profesional',
				'main_branch' => 'vida',
				'sub_branch' => 'accidente_personales'
			],
			[
				'name'  => 'Cobertura de Pérdida de Licencia',
				'main_branch' => 'vida',
				'sub_branch' => 'accidente_personales'
			],
			[
				'name'  => 'Cualquier tipo de Reserva Matemática',
				'main_branch' => 'vida',
				'sub_branch' => 'accidente_personales'
			],
			[
				'name'  => 'Personas menores de xxxxx años de edad',
				'main_branch' => 'vida',
				'sub_branch' => 'accidente_personales'
			],
			[
				'name'  => 'Para todas las coberturas las personas de nuevo ingreso mayores de xxxx años de edad.',
				'main_branch' => 'vida',
				'sub_branch' => 'accidente_personales'
			],
			[
				'name'  => 'Policías Judiciales',
				'main_branch' => 'vida',
				'sub_branch' => 'accidente_personales'
			],
			[
				'name'  => 'Guardaespaldas',
				'main_branch' => 'vida',
				'sub_branch' => 'accidente_personales'
			],
			[
				'name'  => 'Cualquier cuerpo especializado en lucha contra el narcotráfico y delincuencia organizada',
				'main_branch' => 'vida',
				'sub_branch' => 'accidente_personales'
			],
			[
				'name'  => 'Aviación Particular',
				'main_branch' => 'vida',
				'sub_branch' => 'accidente_personales'
			],
			[
				'name'  => 'Aviación Privada',
				'main_branch' => 'vida',
				'sub_branch' => 'accidente_personales'
			],
			[
				'name'  => 'Deportes y aficiones peligrosas si son practicadas de manera profesional',
				'main_branch' => 'vida',
				'sub_branch' => 'accidente_personales'
			],
			[
				'name'  => 'Empleados que se encuentren pensionados, jubilados, en proceso o estado de invalidez.',
				'main_branch' => 'vida',
				'sub_branch' => 'accidente_personales'
			],

            // vida - accidente_personales                      
			[
				'name'  => 'Las personas que excedan los límites de edad mencionados en este Slip.',
				'main_branch' => 'vida',
				'sub_branch' => 'vida'
			],
			[
				'name'  => 'Daños extracontractuales, daños punitivos o ejemplares. ',
				'main_branch' => 'vida',
				'sub_branch' => 'vida'
			],
			[
				'name'  => 'Cualquier pago ex gracia',
				'main_branch' => 'vida',
				'sub_branch' => 'vida'
			],
			[
				'name'  => 'Coberturas de Desempleo',
				'main_branch' => 'vida',
				'sub_branch' => 'vida'
			],
			[
				'name'  => 'Coberturas de Invalidez Parcial',
				'main_branch' => 'vida',
				'sub_branch' => 'vida'
			],
			[
				'name'  => 'Coberturas de Invalidez Temporal',
				'main_branch' => 'vida',
				'sub_branch' => 'vida'
			],
			[
				'name'  => 'Coberturas de Invalidez Profesional',
				'main_branch' => 'vida',
				'sub_branch' => 'vida'
			],
			[
				'name'  => 'Cobertura de Pérdida de Licencia',
				'main_branch' => 'vida',
				'sub_branch' => 'vida'
			],
			[
				'name'  => 'Cualquier tipo de Reserva Matemática',
				'main_branch' => 'vida',
				'sub_branch' => 'vida'
			],
			[
				'name'  => 'Personas menores de xxxxx años de edad',
				'main_branch' => 'vida',
				'sub_branch' => 'vida'
			],
			[
				'name'  => 'Para todas las coberturas las personas de nuevo ingreso mayores de xxxx años de edad.',
				'main_branch' => 'vida',
				'sub_branch' => 'vida'
			],
			[
				'name'  => 'Policías Judiciales',
				'main_branch' => 'vida',
				'sub_branch' => 'vida'
			],
			[
				'name'  => 'Guardaespaldas',
				'main_branch' => 'vida',
				'sub_branch' => 'vida'
			],
			[
				'name'  => 'Cualquier cuerpo especializado en lucha contra el narcotráfico y delincuencia organizada',
				'main_branch' => 'vida',
				'sub_branch' => 'vida'
			],
			[
				'name'  => 'Aviación Particular',
				'main_branch' => 'vida',
				'sub_branch' => 'vida'
			],
			[
				'name'  => 'Aviación Privada',
				'main_branch' => 'vida',
				'sub_branch' => 'vida'
			],
			[
				'name'  => 'Deportes y aficiones peligrosas si son practicadas de manera profesional',
				'main_branch' => 'vida',
				'sub_branch' => 'vida'
			],
			[
				'name'  => 'Empleados que se encuentren pensionados, jubilados, en proceso o estado de invalidez.',
				'main_branch' => 'vida',
				'sub_branch' => 'vida'
			],
            
            // activos_personales - incendio  
			[
				'name'  => 'Eventos químicos, biológicos, nucleares, radiológicos, cibernéticos.',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'incendio'
			],
			[
				'name'  => 'Daño y pérdida de información tecnológica',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'incendio'
			],
			[
				'name'  => 'Cualquier tipo de multas y penalizaciones.',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'incendio'
			],
			[
				'name'  => 'Guerra, guerra civil y sus consecuencias ',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'incendio'
			],
			[
				'name'  => 'Reacción nuclear ',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'incendio'
			],
			[
				'name'  => 'Cláusula de exclusión cibernética ',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'incendio'
			],
			[
				'name'  => 'Cláusula de sanciones, limitaciones y exclusiones ',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'incendio'
			],
			[
				'name'  => 'Cláusula de exclusión de filtración, polución y contaminación',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'incendio'
			],
			[
				'name'  => 'Cualquier cobertura de pérdidas consecuenciales.',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'incendio'
			],
			[
				'name'  => 'Responsabilidad Civil ',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'incendio'
			],
			[
				'name'  => 'Transporte de mercancías. ',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'incendio'
			],
			[
				'name'  => 'Infidelidad o actos deshonestos de los administradores o cualquiera de los trabajadores del Asegurado.',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'incendio'
			],
			[
				'name'  => 'Los faltantes y pérdidas misteriosas e inexplicables y otras pérdidas descubiertas después de realizar el inventario.',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'incendio'
			],
			[
				'name'  => 'Pérdidas indirectas, pérdidas consecuenciales por cualquier causa y pérdidas de mercado',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'incendio'
			],
            
            // activos_personales - lucro_cesante  
            [
				'name'  => 'Eventos químicos, biológicos, nucleares, radiológicos, cibernéticos.',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'lucro_cesante'
			],
			[
				'name'  => 'Daño y pérdida de información tecnológica',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'lucro_cesante'
			],
			[
				'name'  => 'Cualquier tipo de multas y penalizaciones.',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'lucro_cesante'
			],
			[
				'name'  => 'Guerra, guerra civil y sus consecuencias ',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'lucro_cesante'
			],
			[
				'name'  => 'Reacción nuclear ',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'lucro_cesante'
			],
			[
				'name'  => 'Cláusula de exclusión cibernética ',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'lucro_cesante'
			],
			[
				'name'  => 'Cláusula de sanciones, limitaciones y exclusiones ',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'lucro_cesante'
			],
			[
				'name'  => 'Cláusula de exclusión de filtración, polución y contaminación',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'lucro_cesante'
			],
			[
				'name'  => 'Cualquier cobertura de pérdidas consecuenciales.',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'lucro_cesante'
			],
			[
				'name'  => 'Responsabilidad Civil ',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'lucro_cesante'
			],
			[
				'name'  => 'Transporte de mercancías. ',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'lucro_cesante'
			],
			[
				'name'  => 'Infidelidad o actos deshonestos de los administradores o cualquiera de los trabajadores del Asegurado.',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'lucro_cesante'
			],
			[
				'name'  => 'Los faltantes y pérdidas misteriosas e inexplicables y otras pérdidas descubiertas después de realizar el inventario.',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'lucro_cesante'
			],
			[
				'name'  => 'Pérdidas indirectas, pérdidas consecuenciales por cualquier causa y pérdidas de mercado',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'lucro_cesante'
			],

            // activos_personales - robo  
			[
				'name'  => 'Eventos químicos, biológicos, nucleares, radiológicos, cibernéticos.',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'robo'
			],
			[
				'name'  => 'Daño y pérdida de información tecnológica',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'robo'
			],
			[
				'name'  => 'Cualquier tipo de multas y penalizaciones.',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'robo'
			],
			[
				'name'  => 'Guerra, guerra civil y sus consecuencias ',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'robo'
			],
			[
				'name'  => 'Reacción nuclear ',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'robo'
			],
			[
				'name'  => 'Cláusula de exclusión cibernética ',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'robo'
			],
			[
				'name'  => 'Cláusula de sanciones, limitaciones y exclusiones ',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'robo'
			],
			[
				'name'  => 'Cláusula de exclusión de filtración, polución y contaminación',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'robo'
			],
			[
				'name'  => 'Cualquier cobertura de pérdidas consecuenciales.',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'robo'
			],
			[
				'name'  => 'Responsabilidad Civil ',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'robo'
			],
			[
				'name'  => 'Transporte de mercancías. ',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'robo'
			],
			[
				'name'  => 'Infidelidad o actos deshonestos de los administradores o cualquiera de los trabajadores del Asegurado.',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'robo'
			],
			[
				'name'  => 'Los faltantes y pérdidas misteriosas e inexplicables y otras pérdidas descubiertas después de realizar el inventario.',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'robo'
			],
			[
				'name'  => 'Pérdidas indirectas, pérdidas consecuenciales por cualquier causa y pérdidas de mercado',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'robo'
			],

            // activos_personales - sabotaje_terrorismo
			[
				'name'  => 'Pagos ex gratia',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'sabotaje_terrorismo'
			],
			[
				'name'  => 'Cualquier tipo de responsabilidad civil',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'sabotaje_terrorismo'
			],
			[
				'name'  => 'Excluye BI/CBI',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'sabotaje_terrorismo'
			],
			[
				'name'  => 'Actos de crimen organizado',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'sabotaje_terrorismo'
			],
			[
				'name'  => 'Automóviles',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'sabotaje_terrorismo'
			],
			[
				'name'  => 'Bienes en tránsito',
				'main_branch' => 'activos_personales',
				'sub_branch' => 'sabotaje_terrorismo'
			],

            // maritimo - casco_maquinaria
            [
				'name'  => 'Confiscación, apresamiento, detención, apropiación, etc.',
				'main_branch' => 'maritimo',
				'sub_branch' => 'casco_maquinaria'
			],
			[
				'name'  => 'Daños consecuenciales (lucro cesante).',
				'main_branch' => 'maritimo',
				'sub_branch' => 'casco_maquinaria'
			],
			[
				'name'  => 'Riesgos de filtración y polución.',
				'main_branch' => 'maritimo',
				'sub_branch' => 'casco_maquinaria'
			],
			[
				'name'  => 'Competencias de velocidad o eventos con fines lucrativos.',
				'main_branch' => 'maritimo',
				'sub_branch' => 'casco_maquinaria'
			],
			[
				'name'  => 'Pagos comerciales y/o exgratia.',
				'main_branch' => 'maritimo',
				'sub_branch' => 'casco_maquinaria'
			],
			[
				'name'  => 'Rige Cláusula de exclusión garantías financieras y Riesgos de crédito.',
				'main_branch' => 'maritimo',
				'sub_branch' => 'casco_maquinaria'
			],
			[
				'name'  => 'Rige Cláusula de exclusión de asbestos.',
				'main_branch' => 'maritimo',
				'sub_branch' => 'casco_maquinaria'
			],
			[
				'name'  => 'Excluyendo Sabotaje, Vandalismo, Actos Maliciosos y Piratería.',
				'main_branch' => 'maritimo',
				'sub_branch' => 'casco_maquinaria'
			],
			[
				'name'  => 'Toda clase de Charter y/o alquiler de la embarcación.',
				'main_branch' => 'maritimo',
				'sub_branch' => 'casco_maquinaria'
			],
			[
				'name'  => 'Se excluye pérdida de calidad, ejecución, rendimiento o performance',
				'main_branch' => 'maritimo',
				'sub_branch' => 'casco_maquinaria'
			],
			[
				'name'  => 'Daño o pérdida de Obras de Arte y esculturas de cualquier clase.',
				'main_branch' => 'maritimo',
				'sub_branch' => 'casco_maquinaria'
			],
			[
				'name'  => 'Daño o pérdida de artículos y/o efectos personales',
				'main_branch' => 'maritimo',
				'sub_branch' => 'casco_maquinaria'
			],
			[
				'name'  => 'Se excluye cualquier pérdida o daño a la embarcación cuando esta sea utilizada para otras actividades distintas a las estipuladas en la Póliza.',
				'main_branch' => 'maritimo',
				'sub_branch' => 'casco_maquinaria'
			],
			[
				'name'  => 'Devolución de primas por estadía o inactividad',
				'main_branch' => 'maritimo',
				'sub_branch' => 'casco_maquinaria'
			],
			[
				'name'  => 'Se excluye RC Esquis y/o Jet Ski',
				'main_branch' => 'maritimo',
				'sub_branch' => 'casco_maquinaria'
			],

            /*
                Maritimo: 

                    Protección e Indemnización
                    vacío

                    RC Portuaria
                    vacío

                    RC Armadores
                    vacío

                    RC Astilleros
                    vacío

                    Transporte Interno
                    vacío

                    Transporte Importaciones
                    vacío

                    Transporte Exportaciones
                    vacío

                    Stock Throughput STP
                    vacío

                Aviación: 
                    Casco aéreo
                    vacío
                    
                    Perdida licencia
                    vacío
                    
                    Perdida licencia
                    vacío
            
            */

            // energia - riesgo_petrolero
            [
				'name'  => 'Eventos químicos, biológicos, nucleares, radiológicos, cibernéticos.',
				'main_branch' => 'energia',
				'sub_branch' => 'riesgo_petrolero'
			],
			[
				'name'  => 'Daño y pérdida de información tecnológica',
				'main_branch' => 'energia',
				'sub_branch' => 'riesgo_petrolero'
			],
			[
				'name'  => 'Cualquier tipo de multas y penalizaciones.',
				'main_branch' => 'energia',
				'sub_branch' => 'riesgo_petrolero'
			],
			[
				'name'  => 'Guerra, guerra civil y sus consecuencias ',
				'main_branch' => 'energia',
				'sub_branch' => 'riesgo_petrolero'
			],
			[
				'name'  => 'Reacción nuclear ',
				'main_branch' => 'energia',
				'sub_branch' => 'riesgo_petrolero'
			],
			[
				'name'  => 'Cláusula de exclusión cibernética ',
				'main_branch' => 'energia',
				'sub_branch' => 'riesgo_petrolero'
			],
			[
				'name'  => 'Cláusula de sanciones, limitaciones y exclusiones ',
				'main_branch' => 'energia',
				'sub_branch' => 'riesgo_petrolero'
			],
			[
				'name'  => 'Cláusula de exclusión de filtración, polución y contaminación',
				'main_branch' => 'energia',
				'sub_branch' => 'riesgo_petrolero'
			],
			[
				'name'  => 'Cualquier cobertura de pérdidas consecuenciales.',
				'main_branch' => 'energia',
				'sub_branch' => 'riesgo_petrolero'
			],
			[
				'name'  => 'Responsabilidad Civil ',
				'main_branch' => 'energia',
				'sub_branch' => 'riesgo_petrolero'
			],
			[
				'name'  => 'Transporte de mercancías. ',
				'main_branch' => 'energia',
				'sub_branch' => 'riesgo_petrolero'
			],
			[
				'name'  => 'Infidelidad o actos deshonestos de los administradores o cualquiera de los trabajadores del Asegurado.',
				'main_branch' => 'energia',
				'sub_branch' => 'riesgo_petrolero'
			],
			[
				'name'  => 'Los faltantes y pérdidas misteriosas e inexplicables y otras pérdidas descubiertas después de realizar el inventario.',
				'main_branch' => 'energia',
				'sub_branch' => 'riesgo_petrolero'
			],
			[
				'name'  => 'Pérdidas indirectas, pérdidas consecuenciales por cualquier causa y pérdidas de mercado',
				'main_branch' => 'energia',
				'sub_branch' => 'riesgo_petrolero'
			],


            /*
                Fianza:
                    Fianza
                    vacio
            */

            // fianza - fidelidad
			[
				'name'  => ' Fraude, robo, ratería, hurto',
				'main_branch' => 'fianza',
				'sub_branch' => 'fidelidad'
			],
			[
				'name'  => ' Desfalco, Peculado, Falsificación, Malversación, Sustracción fraudulenta,',
				'main_branch' => 'fianza',
				'sub_branch' => 'fidelidad'
			],
			[
				'name'  => ' Mal uso premeditado.',
				'main_branch' => 'fianza',
				'sub_branch' => 'fidelidad'
			],
			[
				'name'  => ' Falta de integridad y/o fidelidad y/o cualquier acto doloso y/o ímprobo y/o contrarios a la ley de cualquier clase, según lo descrito en el objeto del seguro de esta póliza.',
				'main_branch' => 'fianza',
				'sub_branch' => 'fidelidad'
			],

            /*
                Responsabilidad Civil:
                    Extracontractual LPO
                    vacío

                    Contractual 
                    vacío

                    Errores y omisiones 
                    vacío

                    Responsabilidad civil profesional
                    vacío

                    Directores y administradores
                    vacío

                    Responsabilidad civil medica
                    vacío


                Riesgo financiero:
                    Bancos e instituciones financieras
                    vacío
                    
                    Entidades no financieras
                    vacío
            */

            // tecnicos - riesgo_contratistas
			[   
				'name'  => 'Eventos químicos, biológicos, nucleares, radiológicos, cibernéticos.',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'riesgo_contratistas'
			],
			[
				'name'  => 'Cualquier tipo de multas y penalizaciones.',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'riesgo_contratistas'
			],
			[
				'name'  => 'Guerra, guerra civil y sus consecuencias ',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'riesgo_contratistas'
			],
			[
				'name'  => 'Reacción nuclear ',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'riesgo_contratistas'
			],
			[
				'name'  => 'Cláusula de exclusión cibernética ',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'riesgo_contratistas'
			],
			[
				'name'  => 'Cláusula de sanciones, limitaciones y exclusiones ',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'riesgo_contratistas'
			],
			[
				'name'  => 'Cláusula de exclusión de filtración, polución y contaminación',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'riesgo_contratistas'
			],
			[
				'name'  => 'Cualquier cobertura de pérdidas consecuenciales.',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'riesgo_contratistas'
			],





            // tecnicos - riesgo_montaje
            [
				'name'  => 'Eventos químicos, biológicos, nucleares, radiológicos, cibernéticos.',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'riesgo_montaje'
			],
			[
				'name'  => 'Cualquier tipo de multas y penalizaciones.',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'riesgo_montaje'
			],
			[
				'name'  => 'Guerra, guerra civil y sus consecuencias ',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'riesgo_montaje'
			],
			[
				'name'  => 'Reacción nuclear ',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'riesgo_montaje'
			],
			[
				'name'  => 'Cláusula de exclusión cibernética ',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'riesgo_montaje'
			],
			[
				'name'  => 'Cláusula de sanciones, limitaciones y exclusiones ',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'riesgo_montaje'
			],
			[
				'name'  => 'Cláusula de exclusión de filtración, polución y contaminación',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'riesgo_montaje'
			],
			[
				'name'  => 'Cualquier cobertura de pérdidas consecuenciales.',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'riesgo_montaje'
			],

            // tecnicos - equipo_electrico
            [
                'name'  => 'Eventos químicos, biológicos, nucleares, radiológicos, cibernéticos.',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'equipo_electrico'
            ],
            [
                'name'  => 'Daño y pérdida de información tecnológica',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'equipo_electrico'
            ],
            [
                'name'  => 'Cualquier tipo de multas y penalizaciones.',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'equipo_electrico'
            ],
            [
                'name'  => 'Guerra, guerra civil y sus consecuencias ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'equipo_electrico'
            ],
            [
                'name'  => 'Reacción nuclear ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'equipo_electrico'
            ],
            [
                'name'  => 'Cláusula de exclusión cibernética ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'equipo_electrico'
            ],
            [
                'name'  => 'Cláusula de sanciones, limitaciones y exclusiones ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'equipo_electrico'
            ],
            [
                'name'  => 'Cláusula de exclusión de filtración, polución y contaminación',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'equipo_electrico'
            ],
            [
                'name'  => 'Cualquier cobertura de pérdidas consecuenciales.',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'equipo_electrico'
            ],
            [
                'name'  => 'Responsabilidad Civil ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'equipo_electrico'
            ],
            [
                'name'  => 'Transporte de mercancías. ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'equipo_electrico'
            ],
            [
                'name'  => 'Infidelidad o actos deshonestos de los administradores o cualquiera de los trabajadores del Asegurado.',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'equipo_electrico'
            ],
            [
                'name'  => 'Los faltantes y pérdidas misteriosas e inexplicables y otras pérdidas descubiertas después de realizar el inventario.',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'equipo_electrico'
            ],
            [
                'name'  => 'Pérdidas indirectas, pérdidas consecuenciales por cualquier causa y pérdidas de mercado',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'equipo_electrico'
            ],


            // tecnicos - rotura_maquina
            [
                'name'  => 'Eventos químicos, biológicos, nucleares, radiológicos, cibernéticos.',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'rotura_maquina'
            ],
            [
                'name'  => 'Daño y pérdida de información tecnológica',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'rotura_maquina'
            ],
            [
                'name'  => 'Cualquier tipo de multas y penalizaciones.',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'rotura_maquina'
            ],
            [
                'name'  => 'Guerra, guerra civil y sus consecuencias ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'rotura_maquina'
            ],
            [
                'name'  => 'Reacción nuclear ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'rotura_maquina'
            ],
            [
                'name'  => 'Cláusula de exclusión cibernética ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'rotura_maquina'
            ],
            [
                'name'  => 'Cláusula de sanciones, limitaciones y exclusiones ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'rotura_maquina'
            ],
            [
                'name'  => 'Cláusula de exclusión de filtración, polución y contaminación',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'rotura_maquina'
            ],
            [
                'name'  => 'Cualquier cobertura de pérdidas consecuenciales.',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'rotura_maquina'
            ],
            [
                'name'  => 'Responsabilidad Civil ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'rotura_maquina'
            ],
            [
                'name'  => 'Transporte de mercancías. ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'rotura_maquina'
            ],
            [
                'name'  => 'Infidelidad o actos deshonestos de los administradores o cualquiera de los trabajadores del Asegurado.',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'rotura_maquina'
            ],
            [
                'name'  => 'Los faltantes y pérdidas misteriosas e inexplicables y otras pérdidas descubiertas después de realizar el inventario.',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'rotura_maquina'
            ],
            [
                'name'  => 'Pérdidas indirectas, pérdidas consecuenciales por cualquier causa y pérdidas de mercado',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'rotura_maquina'
            ],
                
            // tecnicos - perdida_beneficio_rotura_maquinaria
            [ 
                'name'  => 'Eventos químicos, biológicos, nucleares, radiológicos, cibernéticos.',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'perdida_beneficio_rotura_maquinaria'
            ],
            [
                'name'  => 'Daño y pérdida de información tecnológica',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'perdida_beneficio_rotura_maquinaria'
            ],
            [
                'name'  => 'Cualquier tipo de multas y penalizaciones.',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'perdida_beneficio_rotura_maquinaria'
            ],
            [
                'name'  => 'Guerra, guerra civil y sus consecuencias ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'perdida_beneficio_rotura_maquinaria'
            ],
            [
                'name'  => 'Reacción nuclear ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'perdida_beneficio_rotura_maquinaria'
            ],
            [
                'name'  => 'Cláusula de exclusión cibernética ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'perdida_beneficio_rotura_maquinaria'
            ],
            [
                'name'  => 'Cláusula de sanciones, limitaciones y exclusiones ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'perdida_beneficio_rotura_maquinaria'
            ],
            [
                'name'  => 'Cláusula de exclusión de filtración, polución y contaminación',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'perdida_beneficio_rotura_maquinaria'
            ],
            [
                'name'  => 'Cualquier cobertura de pérdidas consecuenciales.',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'perdida_beneficio_rotura_maquinaria'
            ],
            [
                'name'  => 'Responsabilidad Civil ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'perdida_beneficio_rotura_maquinaria'
            ],
            [
                'name'  => 'Transporte de mercancías. ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'perdida_beneficio_rotura_maquinaria'
            ],
            [
                'name'  => 'Infidelidad o actos deshonestos de los administradores o cualquiera de los trabajadores del Asegurado.',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'perdida_beneficio_rotura_maquinaria'
            ],
            [
                'name'  => 'Los faltantes y pérdidas misteriosas e inexplicables y otras pérdidas descubiertas después de realizar el inventario.',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'perdida_beneficio_rotura_maquinaria'
            ],
            [
                'name'  => 'Pérdidas indirectas, pérdidas consecuenciales por cualquier causa y pérdidas de mercado',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'perdida_beneficio_rotura_maquinaria'
            ],


            // tecnicos - todo_riesgo_equipo_maquinaria
            [
                'name'  => 'Eventos químicos, biológicos, nucleares, radiológicos, cibernéticos.',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'todo_riesgo_equipo_maquinaria'
            ],
            [
                'name'  => 'Daño y pérdida de información tecnológica',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'todo_riesgo_equipo_maquinaria'
            ],
            [
                'name'  => 'Cualquier tipo de multas y penalizaciones.',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'todo_riesgo_equipo_maquinaria'
            ],
            [
                'name'  => 'Guerra, guerra civil y sus consecuencias ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'todo_riesgo_equipo_maquinaria'
            ],
            [
                'name'  => 'Reacción nuclear ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'todo_riesgo_equipo_maquinaria'
            ],
            [
                'name'  => 'Cláusula de exclusión cibernética ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'todo_riesgo_equipo_maquinaria'
            ],
            [
                'name'  => 'Cláusula de sanciones, limitaciones y exclusiones ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'todo_riesgo_equipo_maquinaria'
            ],
            [
                'name'  => 'Cláusula de exclusión de filtración, polución y contaminación',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'todo_riesgo_equipo_maquinaria'
            ],
            [
                'name'  => 'Cualquier cobertura de pérdidas consecuenciales.',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'todo_riesgo_equipo_maquinaria'
            ],
            [
                'name'  => 'Responsabilidad Civil ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'todo_riesgo_equipo_maquinaria'
            ],
            [
                'name'  => 'Transporte de mercancías. ',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'todo_riesgo_equipo_maquinaria'
            ],
            [
                'name'  => 'Infidelidad o actos deshonestos de los administradores o cualquiera de los trabajadores del Asegurado.',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'todo_riesgo_equipo_maquinaria'
            ],
            [
                'name'  => 'Los faltantes y pérdidas misteriosas e inexplicables y otras pérdidas descubiertas después de realizar el inventario.',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'todo_riesgo_equipo_maquinaria'
            ],
            [
                'name'  => 'Pérdidas indirectas, pérdidas consecuenciales por cualquier causa y pérdidas de mercado',
                'main_branch' => 'tecnicos',
                'sub_branch' => 'todo_riesgo_equipo_maquinaria'
            ],

            // tecnicos - alop
            [
				'name'  => 'Eventos químicos, biológicos, nucleares, radiológicos, cibernéticos.',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'alop'
			],
			[
				'name'  => 'Daño y pérdida de información tecnológica',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'alop'
			],
			[
				'name'  => 'Cualquier tipo de multas y penalizaciones.',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'alop'
			],
			[
				'name'  => 'Guerra, guerra civil y sus consecuencias ',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'alop'
			],
			[
				'name'  => 'Reacción nuclear ',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'alop'
			],
			[
				'name'  => 'Cláusula de exclusión cibernética ',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'alop'
			],
			[
				'name'  => 'Cláusula de sanciones, limitaciones y exclusiones ',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'alop'
			],
			[
				'name'  => 'Cláusula de exclusión de filtración, polución y contaminación',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'alop'
			],
			[
				'name'  => 'Cualquier cobertura de pérdidas consecuenciales.',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'alop'
			],
			[
				'name'  => 'Responsabilidad Civil ',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'alop'
			],
			[
				'name'  => 'Transporte de mercancías. ',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'alop'
			],
			[
				'name'  => 'Infidelidad o actos deshonestos de los administradores o cualquiera de los trabajadores del Asegurado.',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'alop'
			],
			[
				'name'  => 'Los faltantes y pérdidas misteriosas e inexplicables y otras pérdidas descubiertas después de realizar el inventario.',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'alop'
			],
			[
				'name'  => 'Pérdidas indirectas, pérdidas consecuenciales por cualquier causa y pérdidas de mercado',
				'main_branch' => 'tecnicos',
				'sub_branch' => 'alop'
			],


            // veiculos - livianos
            [
				'name'  => 'Eventos químicos, biológicos, nucleares, radiológicos, cibernéticos.',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'livianos'
			],
			[
				'name'  => 'Daño y pérdida de información tecnológica',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'livianos'
			],
			[
				'name'  => 'Cualquier tipo de multas y penalizaciones.',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'livianos'
			],
			[
				'name'  => 'Guerra, guerra civil y sus consecuencias ',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'livianos'
			],
			[
				'name'  => 'Reacción nuclear ',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'livianos'
			],
			[
				'name'  => 'Cláusula de exclusión cibernética ',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'livianos'
			],
			[
				'name'  => 'Cláusula de sanciones, limitaciones y exclusiones ',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'livianos'
			],
			[
				'name'  => 'Cláusula de exclusión de filtración, polución y contaminación',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'livianos'
			],
			[
				'name'  => 'Cualquier cobertura de pérdidas consecuenciales.',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'livianos'
			],
			[
				'name'  => 'Responsabilidad Civil ',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'livianos'
			],
			[
				'name'  => 'Transporte de mercancías. ',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'livianos'
			],
			[
				'name'  => 'Infidelidad o actos deshonestos de los administradores o cualquiera de los trabajadores del Asegurado.',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'livianos'
			],
			[
				'name'  => 'Los faltantes y pérdidas misteriosas e inexplicables y otras pérdidas descubiertas después de realizar el inventario.',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'livianos'
			],
			[
				'name'  => 'Pérdidas indirectas, pérdidas consecuenciales por cualquier causa y pérdidas de mercado',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'livianos'
			],

            // vehiculos - pesados
            [
				'name'  => 'Eventos químicos, biológicos, nucleares, radiológicos, cibernéticos.',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'pesados'
			],
			[
				'name'  => 'Daño y pérdida de información tecnológica',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'pesados'
			],
			[
				'name'  => 'Cualquier tipo de multas y penalizaciones.',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'pesados'
			],
			[
				'name'  => 'Guerra, guerra civil y sus consecuencias ',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'pesados'
			],
			[
				'name'  => 'Reacción nuclear ',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'pesados'
			],
			[
				'name'  => 'Cláusula de exclusión cibernética ',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'pesados'
			],
			[
				'name'  => 'Cláusula de sanciones, limitaciones y exclusiones ',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'pesados'
			],
			[
				'name'  => 'Cláusula de exclusión de filtración, polución y contaminación',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'pesados'
			],
			[
				'name'  => 'Cualquier cobertura de pérdidas consecuenciales.',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'pesados'
			],
			[
				'name'  => 'Responsabilidad Civil ',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'pesados'
			],
			[
				'name'  => 'Transporte de mercancías. ',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'pesados'
			],
			[
				'name'  => 'Infidelidad o actos deshonestos de los administradores o cualquiera de los trabajadores del Asegurado.',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'pesados'
			],
			[
				'name'  => 'Los faltantes y pérdidas misteriosas e inexplicables y otras pérdidas descubiertas después de realizar el inventario.',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'pesados'
			],
			[
				'name'  => 'Pérdidas indirectas, pérdidas consecuenciales por cualquier causa y pérdidas de mercado',
				'main_branch' => 'vehiculos',
				'sub_branch' => 'pesados'
			],
        
        ];

        foreach ($data as $item) {
            exclusiones_selectors::create($item);
        }
    }
}
