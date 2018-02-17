<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use App\Role;

class RolesAndPermissionsCapturistaAReloadedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'editar']);
        Permission::create(['name' => 'eliminar']);
        Permission::create(['name' => 'crear']);

        // create roles and assign existing permissions
        $role = Role::create(['name' => 'Capturista_A_Reloaded']);
        $role->givePermissionTo('editar');
        $role->givePermissionTo('eliminar');
        $role->givePermissionTo('crear');

    }
}
