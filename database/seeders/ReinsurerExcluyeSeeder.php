<?php

namespace Database\Seeders;

use App\Models\ReinsurerExcluye;
use Illuminate\Database\Seeder;

class ReinsurerExcluyeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $region = array(
            'Embarcaciones de placer, pesqueros',
            'Obras Civiles',
            'Casualty & Liability',
            'Líneas de TyD',
            'Helicópteros'
        );

        foreach ($region as $country) {
            ReinsurerExcluye::create([
                'name' => $country
            ]);
        }
    }
}
