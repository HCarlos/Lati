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
/*
        $role = Role::where('name', 'alumno')->first();
        if (!$role){
            $perm = Permission::where('name', 'alumno_consulta')->first();
            if (!$perm){
                $perm = Permission::findOrCreate(['name' => 'alumno_consulta',]);
            }
            $role = Role::findOrCreate(['name' => 'alumno',]);
            $role->givePermissionTo($perm);
        }
*/
        $perm = Permission::findOrCreate('alumno_consulta','web');
        $role = Role::findOrCreate('alumno','web');
        if ( !$role->hasPermissionTo($perm) ){
            $role->givePermissionTo($perm);
        }

        User::create([
                    'username'=>'username_platsource',
                    'nombre_completo'=>'aqui debe ir el nombre completo',
                    'email'=>'el_email@nosedebe.repetir',
                    'password' => bcrypt('username_platsource'),
                    'iduser_ps' => 0,
                    'idemp' => $idemp,
                ])->roles()->attach($role);


    }
}
