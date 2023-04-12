<?php

namespace Database\Seeders;

use App\Models\ConfigGlobal;
use Illuminate\Database\Seeder;

class ConfigGlobalSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'key' => 'code_establishment',
                'value' => '001'
            ],
            [
                'key' => 'code_emission_point',
                'value' => '001'
            ],
            [
                'key' => 'invoice_serie',
                'value' => '1'
            ]
        ];

        foreach ($data as $item) {
            ConfigGlobal::create($item);
        }
    }
}
