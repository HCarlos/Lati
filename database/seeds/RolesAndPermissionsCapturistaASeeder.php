<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsCapturistaASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// Reset cached roles and permissions
        // app()['cache']->forget('spatie.permission.cache');

        // create permissions

        //Permission::query()->truncate();
        Permission::create(['name' => 'editar_registro',]);
        Permission::create(['name' => 'eliminar_registro',]);
        Permission::create(['name' => 'crear_registro',]);
        Permission::create(['name' => 'all',]);

        // create roles and assign existing permissions

        //Role::query()->truncate();
        $role = Role::create(['name' => 'capturista_a',]);
        $role->givePermissionTo('editar_registro');
        $role->givePermissionTo('eliminar_registro');
        $role->givePermissionTo('crear_registro');
        
    }
}
