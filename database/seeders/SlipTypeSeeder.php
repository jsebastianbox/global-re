<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SlipType;
class SlipTypeSeeder extends Seeder
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
            'Activos Fijos',
            'Vehículos',
            'Ramos Técnicos',
            'Energía',
            'Marítimo',
            'Aviación',
            'Responsabilidad Civil',
            'Riesgos Financieros',
            'Fianzas',
        );

        foreach ($object as $item) {
            SlipType::create([
                'name' => $item,
            ]);
        }
    }
}
