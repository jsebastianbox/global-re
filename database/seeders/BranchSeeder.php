<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = array(
            'Vida y Accidentes Personales',
            'Propiedad activos fijos',
            'Vehículos',
            'Ramos Técnicos ',
            'Energia',
            'Maritimo',
            'Aviación',
            'Responsabilidad Civil',
            'Riesgos Financieros',
            'Fianzas',
        );

        foreach ($object as $item) {
            Branch::create([
                'name' => $item
            ]);
        }
    }
}
