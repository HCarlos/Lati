<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsCapturistaAReloadedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // create permissions
        Permission::create(['name' => 'editar_2']);
        Permission::create(['name' => 'eliminar_2']);
        Permission::create(['name' => 'crear_2']);

        // create roles and assign existing permissions
        $role = Role::create(['name' => 'Capturista_A_Reloaded']);
        $role->givePermissionTo('editar_2');
        $role->givePermissionTo('eliminar_2');
        $role->givePermissionTo('crear_2');

    }
}
