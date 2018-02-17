<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsAdminstratorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'all']);

        $role = Role::create([
            'name' => 'administrator',
            'description' => 'administrator',
            'guard_name' => 'web',
            ]);
        $role->givePermissionTo('all');

        Role::create([
            'name' => 'user',
            'description' => 'user',
            'guard_name' => 'web',
            ]);
    }
}
