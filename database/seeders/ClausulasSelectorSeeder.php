<?php

namespace Database\Seeders;

use App\Models\Clausulas_selector;
use Illuminate\Database\Seeder;

class ClausulasSelectorSeeder extends Seeder
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
                'name' => 'Errores u omisiones',
                'main_branch' => 'vida',
                'sub_branch' => 'vida'
            ],
            [
                'name' => 'Días para cancelación anticipada y no individual',
                'main_branch' => 'vida',
                'sub_branch' => 'vida'
            ],
            [
                'name' => 'Inclusión automática del personal',
                'main_branch' => 'vida',
                'sub_branch' => 'vida'
            ],
            [
                'name' => 'Días hábiles para notificación de siniestros',
                'main_branch' => 'vida',
                'sub_branch' => 'vida'
            ],
            [
                'name' => 'Extensión de vigencia a prorrata',
                'main_branch' => 'vida',
                'sub_branch' => 'vida'
            ],
            [
                'name' => 'Pago de reclamos',
                'main_branch' => 'vida',
                'sub_branch' => 'vida'
            ],
            [
                'name' => 'Pago de reclamos',
                'main_branch' => 'vida',
                'sub_branch' => 'vida'
            ],
            [
                'name' => 'De adhesión',
                'main_branch' => 'vida',
                'sub_branch' => 'vida'
            ],
            [
                'name' => 'De anticipo: Se entenderá por enfermedades terminales y/o graves entre otras, las siguientes: Infarto miocardio, Cirugía arterio coronaria, Cáncer (excluye cáncer in situ), Leucemia, Accidente cerebro vascular, Insuficiencia renal crónica. Trasplante de órganos mayores como son: corazón, riñones, hígado, páncreas, médula ósea, siempre y cuando el órgano esté o haya estado lesionado o enfermo. Esclerosis múltiple, Sida.',
                'main_branch' => 'vida',
                'sub_branch' => 'vida'
            ],
            [
                'name' => 'Declaración de titulares',
                'main_branch' => 'vida',
                'sub_branch' => 'vida'
            ],
            [
                'name' => 'Cobertura amplia vuelo',
                'main_branch' => 'vida',
                'sub_branch' => 'vida'
            ],
            [
                'name' => 'Devolución de prima por buena experiencia siniestral',
                'main_branch' => 'vida',
                'sub_branch' => 'vida'
            ],
            //Activos Fijos
            [
                'name' => 'Cláusula eléctrica',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Amparo automático de nuevas propiedades',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Libre circulación',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Reparaciones inmediatas',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Alteraciones y reparaciones',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Materiales importados',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Pérdida total constructiva',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Cláusula de inspección',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Reposición o reemplazo',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Reservas en el manejo de la información',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Salvamento',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Errores u omisiones no intencionales para descripción',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Cancelación individual',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Cancelación (días calendarios)',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Daños a instalaciones por tentativa de robo',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Bienes a la intemperie',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Adhesión',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Ajustadores, liquidadores y peritos de común acuerdo',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Arbitraje',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Designación de bienes',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Destrucción preventiva',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Aplicación de depreciación en pérdidas parciales',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Sellos y marcas',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Subrogación',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Autoridad civil',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Extensión de vigencia a prorrata.',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Restitución de suma asegurada con cobro de prima adicional',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Tolerancia del 10%',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            [
                'name' => 'Claúsula de 72 horas',
                'main_branch' => 'activos',
                'sub_branch' => 'incendio'
            ],
            //Lucro cesante
            [
                'name' => 'No cancelación individual',
                'main_branch' => 'activos',
                'sub_branch' => 'lucro'
            ],
            [
                'name' => 'Cancelación (días calendario)',
                'main_branch' => 'activos',
                'sub_branch' => 'lucro'
            ],
            [
                'name' => 'Ajustadores, liquidadores y peritos de común acuerdo',
                'main_branch' => 'activos',
                'sub_branch' => 'lucro'
            ],
            [
                'name' => 'Extensión de vigencia a prorrata',
                'main_branch' => 'activos',
                'sub_branch' => 'lucro'
            ],
            [
                'name' => 'Adhesión',
                'main_branch' => 'activos',
                'sub_branch' => 'lucro'
            ],
            [
                'name' => 'Subrogación',
                'main_branch' => 'activos',
                'sub_branch' => 'lucro'
            ],
            [
                'name' => 'Cláusula de 72 horas',
                'main_branch' => 'activos',
                'sub_branch' => 'lucro'
            ],
            //Robo asalto
            [
                'name' => 'No cancelación individual',
                'main_branch' => 'activos',
                'sub_branch' => 'robo'
            ],
            [
                'name' => 'Cancelación (Días calendario)',
                'main_branch' => 'activos',
                'sub_branch' => 'robo'
            ],
            [
                'name' => 'Ajustadores, liquidadores y peritos de común acuerdo',
                'main_branch' => 'activos',
                'sub_branch' => 'robo'
            ],
            [
                'name' => 'Extensión de vigencia a prorrata',
                'main_branch' => 'activos',
                'sub_branch' => 'robo'
            ],
            [
                'name' => 'Adhesión',
                'main_branch' => 'activos',
                'sub_branch' => 'robo'
            ],
            [
                'name' => 'Subrogación',
                'main_branch' => 'activos',
                'sub_branch' => 'robo'
            ],
            [
                'name' => 'Cláusula de 72 horas',
                'main_branch' => 'activos',
                'sub_branch' => 'robo'
            ],
            //Sabotaje y terrorismo
            [
                'name' => 'Daños por orden de autoridad a consecuencia de un acto cubierto por esta póliza.',
                'main_branch' => 'activos',
                'sub_branch' => 'st'
            ],
            [
                'name' => 'Gastos para aminorar la pérdida',
                'main_branch' => 'activos',
                'sub_branch' => 'st'
            ],
            [
                'name' => 'Alteraciones y reparaciones',
                'main_branch' => 'activos',
                'sub_branch' => 'st'
            ],
            [
                'name' => 'Definiciones sujeto a revisión',
                'main_branch' => 'activos',
                'sub_branch' => 'st'
            ],
            [
                'name' => 'Reparaciones Inmediatas',
                'main_branch' => 'activos',
                'sub_branch' => 'st'
            ],
            [
                'name' => 'Aclaración para pérdida total constructiva',
                'main_branch' => 'activos',
                'sub_branch' => 'st'
            ],
            [
                'name' => 'Adhesión',
                'main_branch' => 'activos',
                'sub_branch' => 'st'
            ],
            [
                'name' => 'Ajustadores, analistas, liquidadores y peritos.',
                'main_branch' => 'activos',
                'sub_branch' => 'st'
            ],
            [
                'name' => 'Salvamento',
                'main_branch' => 'activos',
                'sub_branch' => 'st'
            ],
            [
                'name' => 'Aviso de siniestros',
                'main_branch' => 'activos',
                'sub_branch' => 'st'
            ],
            [
                'name' => 'Errores u omisiones no intencionales para descripción',
                'main_branch' => 'activos',
                'sub_branch' => 'st'
            ],
            [
                'name' => 'Cláusula de 72 horas',
                'main_branch' => 'activos',
                'sub_branch' => 'st'
            ],
            [
                'name' => 'No cancelación individual',
                'main_branch' => 'transporte',
                'sub_branch' => 'transporte'
            ],
            [
                'name' => 'Cancelación (días calendario)',
                'main_branch' => 'transporte',
                'sub_branch' => 'transporte'
            ],
            [
                'name' => 'Ajustadores, liquidadores y peritos de común acuerdo',
                'main_branch' => 'transporte',
                'sub_branch' => 'transporte'
            ],
            [
                'name' => 'Extensión de vigencia a prorrata',
                'main_branch' => 'transporte',
                'sub_branch' => 'transporte'
            ],
            [
                'name' => 'Adhesión',
                'main_branch' => 'transporte',
                'sub_branch' => 'transporte'
            ],
            [
                'name' => 'Subrogación',
                'main_branch' => 'transporte',
                'sub_branch' => 'transporte'
            ],
            //Casco aereo
            [
                'name' => 'AVN1C Cláusula de casco, responsabilidad civil y responsabilidad civil para pasajeros.',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'AVN6A',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'AVN17A Cláusula de adiciones y retiros de aeronaves (aplicable al casco solamente) exclusiones y sustituciones para casco solamente.',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'AVN18A Cláusula de adiciones y retiros de aeronaves (aplicable a responsabilidades).',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'AVN23A Cláusula de aterrizaje en pistas no autorizadas.',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'AVN26A Cláusula de devolución de prima por aeronave fuera de servicio, ala fija y ala rotativa.',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'AVN34A Cláusula de responsabilidad civil admitida para tripulantes y pasajeros.',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'AVN38B Cláusula de exclusión de riesgos nucleares.',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'AVN41-A Cláusula de control de suscripción y control de reclamos (reaseguro).',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'AVN46B Cláusula de exclusión por ruido, polución, contaminación y otros peligros.',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'AVN48B Cláusula de exclusión de guerra, secuestro y otros peligros.',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'AVN52E (enmendada) Endoso de extensión de cobertura (responsabilidad civil de aeronaves).',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'AVN61 Cláusula de valor acordado.',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'AVN62 Cláusula de extensión de búsqueda y rescate.',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'AVN63 Cláusula de responsabilidad civil cruzada.',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'AVN76 Cláusula de pagos suplementarios.',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'AVS103 Cláusula de arreglo provisional 50/50 de reclamos.',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'LSW555D Cláusula de guerra y otros peligros (incluyendo secuestro y confiscación).',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'Cláusula de deducible (CBIM deductible) (turbina ala fija).',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'Cláusula de deducible (CBIM deductible) (turbina ala rotativa).',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'Cláusula de seguro de deducibles textos AUA.',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'LPO-344C Cláusula de repuestos.',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'Cláusula DE "CUT — TROUGHT" (reaseguro) (respecto a la cobertura de casco, guerra casco).',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => '96GPL1 Cláusula de pérdida de licencia para tripulantes aéreos.',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'Cláusula de seguro de prima no devengada (U.P.I.).',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            [
                'name' => 'Anexo de extensión de cobertura a la cláusula de pérdida de licencia para tripulantes aéreos 96GPL1.',
                'main_branch' => 'aviacion',
                'sub_branch' => 'casco'
            ],
            //Aereo Perdida de licencia
            // [
            //     'name' => 'Errores u Omisiones',
            //     'main_branch' => 'aviacion',
            //     'sub_branch' => 'pl'
            // ],
            //Energia Todo riesgo petrolero
            [
                'name' => 'Cláusula eléctrica',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Libre circulación',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Reparaciones inmediatas',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Alteraciones y reparaciones',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Materiales importados',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Pérdida total constructiva',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Cláusula de inspección',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Reposición o reemplazo',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Reservas en el manejo de la información',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Salvamento',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Errores u omisiones no intencionales para descripción',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'No cancelación individual',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Cancelación (días calendario)',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Daños a instalaciones por tentativa de robo',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Bienes a la intemperie',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Adhesión',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Ajustadores, liquidadores y peritos de común acuerdo',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Arbitraje',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Designación de bienes',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Destrucción preventiva',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Aplicación de depreciación en pérdidas parciales',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Sellos y marcas',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Subrogación',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Autoridad civil',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Extensión de vigencia a prorrata',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Restitución de suma asegurada con cobro de prima adicional',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Tolerancia del 10%',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            [
                'name' => 'Claúsula de 72 horas',
                'main_branch' => 'energia',
                'sub_branch' => 'trp'
            ],
            //Fianzas no hay
            //Fidelidad (asumiendo que es de fianzas, no de riesgos financieros)
            [
                'name' => 'Cobertura automático de nuevos empleados.',
                'main_branch' => 'fianzas',
                'sub_branch' => 'fidelidad'
            ],
            [
                'name' => 'Restitución automática de la Suma Asegurada',
                'main_branch' => 'fianzas',
                'sub_branch' => 'fidelidad'
            ],
            [
                'name' => 'Anticipo del (xxx% editable) del valor del siniestro',
                'main_branch' => 'fianzas',
                'sub_branch' => 'fidelidad'
            ],
            [
                'name' => 'Cláusula de Contragarantía',
                'main_branch' => 'fianzas',
                'sub_branch' => 'fidelidad'
            ],
            [
                'name' => ' Indemnización Total y definitiva',
                'main_branch' => 'fianzas',
                'sub_branch' => 'fidelidad'
            ],
            //Resposabilidad civil
            [
                'name' => 'Caida de letreros',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Caida de antenas, torres, instalaciones y equipos de telecomunicación',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Responsabilidad Civil como propietario de terrenos, edificios o locales que sean utilizados por la empresa asegurada',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Tenencia y uso de instalaciones de carga y descarga, así como de maquinarias de trabajo',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Posesión y mantenimiento de lugares de estacionamientos y gasolineras a su servicio',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Posesión y mantenimiento de instalaciones de seguridad',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Posesión y mantenimiento de instalaciones sociales a su servicio',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Mantenimiento de instalaciones sanitarias y de aparatos e instalaciones reconocidas por la ciencia médica, en caso de contar con consultorios la empresa.',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Uso de lugares y aparatos para la práctica de deportes por el personal de la empresa. No cubre la responsabilidad civil personal de los participantes en actividades deportivas.',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Excursiones y actos festivos organizados para el personal',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Propiedad o del mantenimiento de instalaciones de propaganda, letreros o vallas, dentro o fuera de los predios del asegurado',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Participación en ferias y exposiciones',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Uso de ascensores, escaleras eléctricas y montacargas',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Sellos y marcas',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Interés asegurable diverso',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Pago de Responsabilidad Civil sin sentencia ejecutoriada',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Bares, cafetería, restaurantes',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            [
                'name' => 'Uso de armas por militares, celadores, guardianes o persona de seguridad',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'extracontractual'
            ],
            //Contractual
            [
                'name' => 'Caida de letreros',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Caida de antenas, torres, instalaciones y equipos de telecomunicación',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Responsabilidad Civil como propietario de terrenos, edificios o locales que sean utilizados por la empresa asegurada',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Tenencia y uso de instalaciones de carga y descarga, así como de maquinarias de trabajo',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Posesión y mantenimiento de lugares de estacionamientos y gasolineras a su servicio',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Posesión y mantenimiento de instalaciones de seguridad',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Posesión y mantenimiento de instalaciones sociales a su servicio',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Mantenimiento de instalaciones sanitarias y de aparatos e instalaciones reconocidas por la ciencia médica, en caso de contar con consultorios la empresa.',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Uso de lugares y aparatos para la práctica de deportes por el personal de la empresa. No cubre la responsabilidad civil personal de los participantes en actividades deportivas.',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Excursiones y actos festivos organizados para el personal',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Propiedad o del mantenimiento de instalaciones de propaganda, letreros o vallas, dentro o fuera de los predios del asegurado',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Participación en ferias y exposiciones',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Uso de ascensores, escaleras eléctricas y montacargas',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Sellos y maresponsabilidad_civilas',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Interés asegurable diverso',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Pago de Responsabilidad Civil sin sentencia ejecutoriada',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Bares, cafetería, restaurantes',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            [
                'name' => 'Uso de armas por militares, celadores, guardianes o persona de seguridad',
                'main_branch' => 'responsabilidad_civil',
                'sub_branch' => 'contractual'
            ],
            // Errores y omisiones no hay, rc medica, rc profesional, directores y administradores tampoco
            //Ramos tecnicos (construccion  y montaje)
            [
                'name' => 'Amparo automático de nuevas propiedades',
                'main_branch' => 'tecnico',
                'sub_branch' => 'construccion'
            ],
            [
                'name' => 'Materiales importados',
                'main_branch' => 'tecnico',
                'sub_branch' => 'construccion'
            ],
            [
                'name' => 'Salvamento',
                'main_branch' => 'tecnico',
                'sub_branch' => 'construccion'
            ],
            [
                'name' => 'Errores u omisiones no intencionales para descripción',
                'main_branch' => 'tecnico',
                'sub_branch' => 'construccion'
            ],
            [
                'name' => 'Cancelación individual',
                'main_branch' => 'tecnico',
                'sub_branch' => 'construccion'
            ],
            [
                'name' => 'Adhesión',
                'main_branch' => 'tecnico',
                'sub_branch' => 'construccion'
            ],
            [
                'name' => 'Ajustadores, liquidadores y peritos de común acuerdo',
                'main_branch' => 'tecnico',
                'sub_branch' => 'construccion'
            ],
            [
                'name' => 'Arbitraje',
                'main_branch' => 'tecnico',
                'sub_branch' => 'construccion'
            ],
            [
                'name' => 'Claúsula de 72 horas',
                'main_branch' => 'tecnico',
                'sub_branch' => 'construccion'
            ],
            //Equipo electronico
            [
                'name' => 'Amparo automático de nuevas equipos',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Reparaciones inmediatas',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Alteraciones y reparaciones',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Materiales importados',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Pérdida total constructiva',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Cláusula de inspección',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Reposición o reemplazo',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Reservas en el manejo de la información',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Salvamento',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Errores u omisiones no intencionales para descripción',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'No cancelación individual',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Cancelación (días calendario)',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Daños a instalaciones por tentativa de robo',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Bienes a la intemperie',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Adhesión',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Ajustadores, liquidadores y peritos de común acuerdo',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Arbitraje',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Designación de bienes',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Destrucción preventiva',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Aplicación de depreciación en pérdidas parciales',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Sellos y marcas',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Subrogación',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Autoridad civil',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Extensión de vigencia a prorrata',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Restitución de suma asegurada con cobro de prima adicional',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Tolerancia del 10%',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            [
                'name' => 'Claúsula de 72 horas',
                'main_branch' => 'tecnico',
                'sub_branch' => 'electronico'
            ],
            //Rotura maquinaria
            [
                'name' => 'Amparo automático de nuevas equipos',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Reparaciones inmediatas',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Reposición o reemplazo',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Salvamento',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Errores u omisiones no intencionales para descripción',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Cancelación individual',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Cancelación (días calendario)',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Adhesión',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Ajustadores, liquidadores y peritos de común acuerdo',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Arbitraje',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Subrogación',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Autoridad civil',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Extensión de vigencia a prorrata',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Restitución de suma asegurada con cobro de prima adicional',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Tolerancia del 10%',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            [
                'name' => 'Claúsula de 72 horas',
                'main_branch' => 'tecnico',
                'sub_branch' => 'rotura_maquinaria'
            ],
            //Perdida de beneficios
            [
                'name' => 'No cancelación individual',
                'main_branch' => 'tecnico',
                'sub_branch' => 'beneficios'
            ],
            [
                'name' => 'Cancelación (días calendario)',
                'main_branch' => 'tecnico',
                'sub_branch' => 'beneficios'
            ],
            [
                'name' => 'Ajustadores, liquidadores y peritos de común acuerdo',
                'main_branch' => 'tecnico',
                'sub_branch' => 'beneficios'
            ],
            [
                'name' => 'Extensión de vigencia a prorrata',
                'main_branch' => 'tecnico',
                'sub_branch' => 'beneficios'
            ],
            [
                'name' => 'Adhesión',
                'main_branch' => 'tecnico',
                'sub_branch' => 'beneficios'
            ],
            [
                'name' => 'Subrogación',
                'main_branch' => 'tecnico',
                'sub_branch' => 'beneficios'
            ],
            [
                'name' => 'Cláusula de 72 horas',
                'main_branch' => 'tecnico',
                'sub_branch' => 'beneficios'
            ],
            //Equipo y maquinaria
            [
                'name' => 'Amparo automático de nuevas equipos',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Reparaciones inmediatas',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Salvamento',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Errores u omisiones no intencionales para descripción',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'No cancelación individual',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Cancelación (días calendario)',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Adhesión',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Ajustadores, liquidadores y peritos de común acuerdo',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Arbitraje',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Subrogación',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Autoridad civil',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Extensión de vigencia a prorrata',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Restitución de suma asegurada con cobro de prima adicional',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Tolerancia del 10%',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            [
                'name' => 'Claúsula de 72 horas',
                'main_branch' => 'tecnico',
                'sub_branch' => 'equipo_maquinaria'
            ],
            //ALOP
            [
                'name' => 'No cancelación individual',
                'main_branch' => 'tecnico',
                'sub_branch' => 'alop'
            ],
            [
                'name' => 'Cancelación (días calendario)',
                'main_branch' => 'tecnico',
                'sub_branch' => 'alop'
            ],
            [
                'name' => 'Ajustadores, liquidadores y peritos de común acuerdo',
                'main_branch' => 'tecnico',
                'sub_branch' => 'alop'
            ],
            [
                'name' => 'Extensión de vigencia a prorrata',
                'main_branch' => 'tecnico',
                'sub_branch' => 'alop'
            ],
            [
                'name' => 'Adhesión',
                'main_branch' => 'tecnico',
                'sub_branch' => 'alop'
            ],
            [
                'name' => 'Subrogación',
                'main_branch' => 'tecnico',
                'sub_branch' => 'alop'
            ],
            [
                'name' => 'Cláusula de 72 horas',
                'main_branch' => 'tecnico',
                'sub_branch' => 'alop'
            ],
            //Vehiculos livianos y pesados
            [
                'name' => 'Amparo automático de nuevas equipos',
                'main_branch' => 'tecnico',
                'sub_branch' => 'vehiculos'
            ],
            [
                'name' => 'Reparaciones inmediatas',
                'main_branch' => 'tecnico',
                'sub_branch' => 'vehiculos'
            ],
            [
                'name' => 'Reposición o reemplazo',
                'main_branch' => 'tecnico',
                'sub_branch' => 'vehiculos'
            ],
            [
                'name' => 'Salvamento',
                'main_branch' => 'tecnico',
                'sub_branch' => 'vehiculos'
            ],
            [
                'name' => 'Errores u omisiones no intencionales para descripción',
                'main_branch' => 'tecnico',
                'sub_branch' => 'vehiculos'
            ],
            [
                'name' => 'No cancelación individual',
                'main_branch' => 'tecnico',
                'sub_branch' => 'vehiculos'
            ],
            [
                'name' => 'Cancelación (días calendario)',
                'main_branch' => 'tecnico',
                'sub_branch' => 'vehiculos'
            ],
            [
                'name' => 'Adhesión',
                'main_branch' => 'tecnico',
                'sub_branch' => 'vehiculos'
            ],
            [
                'name' => 'Ajustadores, liquidadores y peritos de común acuerdo',
                'main_branch' => 'tecnico',
                'sub_branch' => 'vehiculos'
            ],
            [
                'name' => 'Arbitraje',
                'main_branch' => 'tecnico',
                'sub_branch' => 'vehiculos'
            ],
            [
                'name' => 'Subrogación',
                'main_branch' => 'tecnico',
                'sub_branch' => 'vehiculos'
            ],
            [
                'name' => 'Autoridad civil',
                'main_branch' => 'tecnico',
                'sub_branch' => 'vehiculos'
            ],
            [
                'name' => 'Extensión de vigencia a prorrata',
                'main_branch' => 'tecnico',
                'sub_branch' => 'vehiculos'
            ],
            [
                'name' => 'Restitución de suma asegurada con cobro de prima adicional',
                'main_branch' => 'tecnico',
                'sub_branch' => 'vehiculos'
            ],
            [
                'name' => 'Tolerancia del 10%',
                'main_branch' => 'tecnico',
                'sub_branch' => 'vehiculos'
            ],
            [
                'name' => 'Claúsula de 72 horas',
                'main_branch' => 'tecnico',
                'sub_branch' => 'vehiculos'
            ],
        ];

        foreach ($data as $item) {
            Clausulas_selector::create($item);
        }
    }
}
