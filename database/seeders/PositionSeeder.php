<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = array(
            'General Head Of Marine',
            'Marketing Director Latin America',
            'Regional Director ',
            'CEO',
            'Vice President',
            'Gerente General',
            'Managing Director Insurance Services',
            'Presidente Ejecutivo',
            'PRESIDENT AND ADJUSTER',
            ' '
        );

        foreach ($countries as $country) {
            Position::create([
                'name' => $country
            ]);
        }
    }
}
