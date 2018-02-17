<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');
        $this->call(RolesAndPermissionsCapturistaASeeder::class);
        $this->call(AgregarEditorialesSeeder::class);
        $this->call(RolesAndPermissionsAdminstratorUserSeeder::class);
        $this->call(UsersInitializeSeeder::class);
    }
}
