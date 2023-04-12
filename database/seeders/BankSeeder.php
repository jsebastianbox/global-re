<?php

namespace Database\Seeders;

use App\Models\Banco;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
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
                "name" => 'Banco Sabadell',
            ],
            [
                "name" => 'Abanca',
            ],
        ];
        Banco::insert($data);
    }
}
