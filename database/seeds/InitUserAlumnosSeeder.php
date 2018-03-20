<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;
//use App\Role;
//use App\Permission;

class InitUserAlumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idemp  = 1;
        $perm = Permission::findOrCreate('alumno_consulta','web');
        $role = Role::findOrCreate('alumno','web');
        if ( !$role->hasPermissionTo($perm) ){
            $role->givePermissionTo($perm);
        }
        User::findOrCreateUserWithRole('username_platsource', 'aqui debe ir el nombre completo', 'el_email@nosedebe.repetir', 'username_platsource', 0, $idemp, $role);
        User::findOrCreateUserWithRole('alu0001','aqui debe ir el nombre completo alu0001','el_email@nosedebe.repetir.alu0001','alu0001',0,$idemp,$role);


    }
}
