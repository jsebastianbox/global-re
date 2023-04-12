<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'id' => 1,
        //     'name' => 'Grace',
        //     'surname' => 'Segovia',
        //     'email' => 'admin@demo.com',
        //     'password' => Hash::make('admin'),
        //     'country_id' => 1
        // ]);

        $users = [
            [
                'name' => 'Administrador',
                'surname' => '',
                'email' => 'admin@demo.com',
                'role' => 'admin',
                'sex' => 'Masculino',
                'country_id' => 1,
                'email_verified_at' => null,
                'password' => 'admin',
                'remember_token' => null,
            ],
            [
                'name' => 'Grace',
                'surname' => 'Segovia',
                'email' => 'gsegovia@global-reinsurance.com',
                'role' => 'tecnico',
                'sex' => 'Femenino',
                'country_id' => 1,
                'email_verified_at' => null,
                'password' => 'admin',
                'remember_token' => null,
            ],
            [
                'name' => 'Diego',
                'surname' => 'Sánchez',
                'email' => 'email_1@demo.com',
                'role' => 'tecnico',
                'sex' => 'Masculino',
                'country_id' => 1,
                'email_verified_at' => null,
                'password' => 'Global_RE_2023',
                'remember_token' => null,
            ],
            [
                'name' => 'Daniela',
                'surname' => 'García',
                'email' => 'email_2@demo.com',
                'role' => 'tecnico',
                'sex' => 'Femenino',
                'country_id' => 1,
                'email_verified_at' => null,
                'password' => 'Global_RE_2023',
                'remember_token' => null,
            ],
            [
                'name' => 'Erika',
                'surname' => 'Deleg',
                'email' => 'email_3@demo.com',
                'role' => 'tecnico',
                'sex' => 'Femenino',
                'country_id' => 1,
                'email_verified_at' => null,
                'password' => 'Global_RE_2023',
                'remember_token' => null,
            ],
            [
                'name' => 'María Belén',
                'surname' => 'Toalombo',
                'email' => 'email_4@demo.com',
                'role' => 'tecnico',
                'sex' => 'Femenino',
                'country_id' => 1,
                'email_verified_at' => null,
                'password' => 'Global_RE_2023',
                'remember_token' => null,
            ],
            [
                'name' => 'María Fernanda',
                'surname' => 'Cárdenas',
                'email' => 'email_5@demo.com',
                'role' => 'tecnico',
                'sex' => 'Femenino',
                'country_id' => 1,
                'email_verified_at' => null,
                'password' => 'Global_RE_2023',
                'remember_token' => null,
            ],
            [
                'name' => 'Tatiana',
                'surname' => 'Ramos',
                'email' => 'email_6@demo.com',
                'role' => 'tecnico',
                'sex' => 'Femenino',
                'country_id' => 1,
                'email_verified_at' => null,
                'password' => 'Global_RE_2023',
                'remember_token' => null,
            ],
            [
                'name' => 'Antonella',
                'surname' => 'Deleg',
                'email' => 'adeleg@grupoglobal-sf.com',
                'role' => 'tecnico',
                'sex' => 'Femenino',
                'country_id' => 1,
                'email_verified_at' => null,
                'password' => 'Global_RE_2023',
                'remember_token' => null,
            ],
            [
                'name' => 'Michelle',
                'surname' => 'Navarrete',
                'email' => 'email_8@demo.com',
                'role' => 'tecnico',
                'sex' => 'Femenino',
                'country_id' => 1,
                'email_verified_at' => null,
                'password' => 'Global_RE_2023',
                'remember_token' => null,
            ],
            [
                'name' => 'Santiago',
                'surname' => 'Bustamante',
                'email' => 'email_9@demo.com',
                'sex' => 'Masculino',
                'role' => 'tecnico',
                'country_id' => 1,
                'email_verified_at' => null,
                'password' => 'Global_RE_2023',
                'remember_token' => null,
            ],
            [
                'name' => 'Cristian',
                'surname' => 'Salgado',
                'email' => 'email_10@demo.com',
                'role' => 'tecnico',
                'sex' => 'Masculino',
                'country_id' => 1,
                'email_verified_at' => null,
                'password' => 'Global_RE_2023',
                'remember_token' => null,
            ],
            [
                'name' => 'Roberto',
                'surname' => 'Sánchez',
                'email' => 'email_11@demo.com',
                'role' => 'tecnico',
                'sex' => 'Masculino',
                'country_id' => 1,
                'email_verified_at' => null,
                'password' => 'Global_RE_2023',
                'remember_token' => null,
            ],
            [
                'name' => 'Fernando',
                'surname' => 'Abad',
                'email' => 'email_12@demo.com',
                'role' => 'tecnico',
                'sex' => 'Masculino',
                'country_id' => 1,
                'email_verified_at' => null,
                'password' => 'Global_RE_2023',
                'remember_token' => null,
            ],
            [
                'name' => 'Jorge',
                'surname' => 'Calvachi',
                'email' => 'jcalvachi@global-reinsurance.com',
                'role' => 'tecnico',
                'sex' => 'Masculino',
                'country_id' => 1,
                'email_verified_at' => null,
                'password' => 'Global_RE_2023',
                'remember_token' => null,
            ],
        ];

        foreach ($users as $user) {
            $user['password'] = Hash::make($user['password']);

            DB::table('users')->insert($user);
        }
    }
}
