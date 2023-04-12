<?php

namespace Database\Seeders;

use App\Models\SlipStatus;
use Illuminate\Database\Seeder;

class SlipStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = array(
            'Base de datos',
            'Departamento Comercial',
            'Departamento Técnico',
            'Co-Brokerajes',
            'Lictaciones',
            'Cartera y Cobranzas',
            'Siniestros',
            'Reportería',
        );

        foreach ($object as $item) {
            SlipStatus::create([
                'slip_status' => $item
            ]);
        }
    }
}
