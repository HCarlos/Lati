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
        Permission::create(['name' => 'editar registro catalogo general']);
        Permission::create(['name' => 'eliminar registro catalogo general']);
        Permission::create(['name' => 'crear registro catalogo general']);

        // create roles and assign existing permissions
        $role = Role::create(['name' => 'Capturista A']);
        $role->givePermissionTo('editar registro catalogo general');
        $role->givePermissionTo('eliminar registro catalogo general');
        $role->givePermissionTo('crear registro catalogo general');
        
    }
}
