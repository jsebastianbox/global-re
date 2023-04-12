<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $region = array(
            'Ecuador', 'Latam & Caribbean', 'Caribbean', 'Latam'
        );

        foreach ($region as $country) {
            Region::create([
                'name' => $country
            ]);
        }
    }
}
