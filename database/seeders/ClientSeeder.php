<?php

namespace Database\Seeders;

use App\Models\ClienteDirecto;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
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
                'ri_bq' => 'Aeroregional',
                'reference' => 'Directo',
                'country' => 'Ecuador',
                'contact' => 'Manuel Rodríguez',
                'region' => 'Ecuador',
                'position' => 'Gerente',
                'business_line' => 'Aviación',
                'excluye' => '',
                'email' => 'kevinomarll25@hotmail.com',
                'phone_one' => '(+52) 55 8703 3229',
                'phone_two' => '',
                'phone_three' => '',
            ],
            [
                'ri_bq' => 'West Pacific',
                'reference' => 'Directo',
                'country' => 'Ecuador',
                'contact' => 'Edison Ayala',
                'region' => 'Ecuador',
                'position' => 'Gerente',
                'business_line' => 'Aviación',
                'excluye' => '',
                'email' => 'ferplanet9@hotmail.com',
                'phone_one' => '(+593) 99 561 2289',
                'phone_two' => '',
                'phone_three' => '',
            ],
        ];
        ClienteDirecto::insert($data);
    }
}
