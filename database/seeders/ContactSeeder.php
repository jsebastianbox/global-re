<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $region = array(
            'Pedro Mesa',
            'PEDRO JOSE SAUMA MUÑOZ',
            'Ing. Iván Quirola Beltrán',
            'Ing. Edwin Boada Mejía',
            'IAN FOORD',
            ' '
        );

        foreach ($region as $country) {
            Contact::create([
                'name' => $country
            ]);
        }
    }
}
