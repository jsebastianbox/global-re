<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoOfertasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sale_statuses = [
            [
                'name' => 'Adjudicado a otra compañía - proceso de licitación pública.'
            ],
            [
                'name' => 'Adjudicado a otra compañía - términos más competitivos.'
            ],
            [
                'name' => 'Cerrado - información insuficiente para suscripción.'
            ],
            [
                'name' => 'Cerrado - vinculación casos de corrupción.'
            ],
            [
                'name' => 'Cerrado - no confirmación de la cedente.'
            ],
            [
                'name' => 'En proceso de cotización.'
            ],
            [
                'name' => 'En proceso de cotización - información adicional para suscripción.'
            ],
            [
                'name' => 'En proceso de cotización - por confirmar orden en firme.'
            ],
            [
                'name' => 'Licitación declarada desierta.'
            ],
            [
                'name' => 'Cerrado - no aceptado por reaseguradores (giro, condiciones del riesgo).'
            ],
            [
                'name' => 'Oferta presentada - sin respuesta de la cedente.'
            ],
        ];

        foreach ($sale_statuses as $sale_status) {
            DB::table('estado_ofertas')->insert($sale_status);
        }
    }
}
