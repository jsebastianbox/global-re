<?php

namespace Database\Seeders;

use App\Models\Bussines;
use Illuminate\Database\Seeder;

class BussinesSeeder extends Seeder
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
            Bussines::create([
                'name' => $country
            ]);
        }
    }
}
