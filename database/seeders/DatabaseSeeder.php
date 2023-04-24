<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BranchSeeder::class,
            CountrySeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            TypeCoverageSeeder::class,
            RegionSeeder::class,
            PositionSeeder::class,
            ContactSeeder::class,
            ReinsurerSeeder::class,
            InsurerSeeder::class,
            BussinesSeeder::class,
            ReinsurerExcluyeSeeder::class,
            SlipStatusSeeder::class,
            ConfigGlobalSeed::class,
            ClausulasAdicionalesSeeder::class,
            AdjustersSeeder::class,
            EstadoOfertasSeeder::class,
            ClientSeeder::class,
            BankSeeder::class,
            SlipTypeSeeder::class,
            ClausulasSelectorSeeder::class,
            CoberturasSelectorSeeder::class,
            CitySeeder::class,
            ExclusionesSelectorSeeder::class
        ]);
    }
}
