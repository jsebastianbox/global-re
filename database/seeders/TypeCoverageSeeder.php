<?php

namespace Database\Seeders;

use App\Models\TypeCoverage;
use Illuminate\Database\Seeder;

class TypeCoverageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $object1 = array(
            //vida y accidentes personales
            'Vida Individual',
            'Vida Colectiva',
            'Accidentes Personales Individual',
            'Accidentes Personales Colectiva',
        );

        $object2 = array(
            //propiedad activos fijos
            'Incendio y Lineas Aliadas',
            'Lucro Cesante por Incendio y Lineas Aliadas',
            'Robo',
            'Sabotaje y Terrorismo',
        );

        $object3 = array(
            //vehiculos
            'Vehiculos Livianos ',
            'Vehiculos Pesados ',
        );
        $object4 = array(
            //ramos técnicos
            'Equipo Electronico',
            'Rotura de Maquinaria',
            'Perdida de beneficios por rotura de maquinaria',
            'Equipo y Maquinaria de Contratistas',
            'Todo Riesgo para Contratistas',
            'Montaje de Maquinaria',
            'ALOP',
        );
        $object5 = array(
            //energia
            'Upstream',
            'Downstream',
            'Responsabilidad civil',
        );
        $object6 = array(
            //maritimo
            'Casco y Maquina',
            'Responsabilidad Civil',
            'Protection and indemnity P&I',
            'Rc Portuaria',
            'Rc Astilleros ',
            'Rc Armadores',
            'Interno',
            'Exportaciones',
            'Importaciones ',
            'Stock Throughput STP',
            'Transporte de Dinero',
        );
        $object7 = array(
            //aviacion
            'Casco Aereo',
            'Responsabilidad Civil ',
            'Perdida de Licencia',
            'Responsabilidad Civil Aeroportuaria',
            'Responsabilidad Civil Hangares',
            'Ariel ',
        );
        $object8 = array(
            //Responsabilidad civil
            'Extracontractual PLO',
            'Contractual',
            'Errores y Omisiones',
            'Responsabilidad Civil Medica',
            'Responsabilidad Civil Profesional',
            'Directores y Administradores',
        );
        $object9 = array(
            //riesgos financieros
            'Bancos e Instituciones Financieras',
            'Fidelidad para Instituciones Financieras',
        );

        $object10 = array(
            //fianzas
            'Fidelidad',
            'Seriedad de Oferta',
            'Cumplimiento de Contrato',
            'Buen Uso de Anticipo',
            'Ejecucion de Obra y Buena Calidad de Materiales',
            'Garantias Aduaneras',
            'Otras Garantias'
        );

        $this->save($object1, 1);
        $this->save($object2, 2);
        $this->save($object3, 3);
        $this->save($object4, 4);
        $this->save($object5, 5);
        $this->save($object6, 6);
        $this->save($object7, 7);
        $this->save($object8, 8);
        $this->save($object9, 9);
        $this->save($object10, 10);
    }

    function save($object, $branch_id)
    {
        foreach ($object as $item) {
            TypeCoverage::create([
                'name' => $item,
                'branch_id' => $branch_id,
            ]);
        }
    }
}
