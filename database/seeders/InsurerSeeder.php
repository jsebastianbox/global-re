<?php

namespace Database\Seeders;

use App\Models\Insurance;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsurerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path('sql/insurers.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);

        // Insurance::create([
        //     'name' => 'Alianza Compañía de Seguros',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Aliado Seguros - Panamá',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Alfa Seguros - Paraguay',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'APS Seguros - República Dominicana',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Atrio Seguros - República Dominicana',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Aseguradora del Sur',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Aseguradora Paraguaya ASEPASA',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Auto Banreservas',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Cigoil',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Dominicana de Seguros - Rep. Dominicana',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Ecuatoriano Suiza',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Federal de Seguros',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Hispana de Seguros',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'INS Instituto Nacional de Seguros',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Interoceánica de Seguros',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Internacional de Seguros',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);


        // Insurance::create([
        //     'name' => 'Intercontinental de Seguros',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);


        // Insurance::create([
        //     'name' => 'Nacional de Seguros',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);


        // Insurance::create([
        //     'name' => 'La Colonial',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);


        // Insurance::create([
        //     'name' => 'La Comercial',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Consolidada de Seguros',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'La Monumental',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Latina Seguros',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Mapfre - Panamá',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Mapfre - Paraguay',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Oceanica Seguros',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Panal Seguros',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'QBE Seguros Colonial',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Rocafuerte Seguros',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Seguros Ban Reservas',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Seguros BBA',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Seguros Constitución',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Seguros Constitución',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Seguros Oriente',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Seguros Sucre',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Sweaden Compañía de Seguros',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Grupo Lafise',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);


        // //puestos por david

        // Insurance::create([
        //     'name' => 'Reaseguradora Delta C.A.',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Reaseguradora Santo Domingo S.A.',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Scor Reinsurance Company',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);

        // Insurance::create([
        //     'name' => 'Swiss Reinsurance Company Ltd.',
        //     'position_id' => 1,
        //     'contact_id' => 1,
        //     'country_id' => 1
        // ]);
    }
}
