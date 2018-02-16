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
        $this->call(RolesAndPermissionsCapturistaASeeder::class);
        $this->call(RolesAndPermissionsAdminSeeder::class);
        $this->call(AgregarEditorialesSeeder::class);
    }
}
