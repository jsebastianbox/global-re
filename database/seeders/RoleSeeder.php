<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'tecnico']);

        Permission::create(['description' => 'Ver Usuarios', 'name' => 'admin.index'])->assignRole($role1);
        Permission::create(['description' => 'Crear Usuarios', 'name' => 'admin.crate'])->assignRole($role1);
        Permission::create(['description' => 'Editar Usuarios', 'name' => 'admin.edit'])->assignRole($role1);
        Permission::create(['description' => 'Eliminar Usuarios', 'name' => 'admin.destoy'])->assignRole($role1);

        Permission::create(['description' => 'Ver Resaguradores', 'name' => 'reinsurers.index'])->syncRoles([$role1, $role2]);
        Permission::create(['description' => 'Crear Resaguradores', 'name' => 'reinsurers.crate'])->syncRoles([$role1, $role2]);
        Permission::create(['description' => 'Editar Resaguradores', 'name' => 'reinsurers.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['description' => 'Eliminar Resaguradores', 'name' => 'reinsurers.destoy'])->syncRoles([$role1, $role2]);

        Permission::create(['description' => 'Ver Regiones', 'name' => 'regions.index'])->assignRole($role2);
        Permission::create(['description' => 'Crear Regiones', 'name' => 'regions.crate'])->assignRole($role2);
        Permission::create(['description' => 'Editar Regiones', 'name' => 'regions.edit'])->assignRole($role2);
        Permission::create(['description' => 'Elimar Regiones', 'name' => 'regions.destoy'])->assignRole($role2);
    }
}
