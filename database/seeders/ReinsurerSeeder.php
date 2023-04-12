<?php

namespace Database\Seeders;

use App\Models\Reinsurers;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReinsurerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $path = public_path('sql/reinsurers.sql');
        $path = public_path('sql/reinsurers_new.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
