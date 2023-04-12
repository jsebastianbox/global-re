<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
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
                'id' => 1,
                'name' => 'Pichincha',
                'country_id' =>'1'
            ],
            [
                'id' => 2,
                'name' => 'Loja',
                'country_id' =>'1'
            ],
            [
                'id' => 3,
                'name' => 'Miami',
                'country_id' =>'2'
            ],
            [
                'id' => 4,
                'name' => 'New York',
                'country_id' =>'2'
            ],
            [
                'id' => 5,
                'name' => 'Cancun',
                'country_id' =>'3'
            ],
            [
                'id' => 6,
                'name' => 'Guadalajara',
                'country_id' =>'3'
            ],
        ];

        foreach ($data as $country) {
            City::create($country);
        }
    }
}
