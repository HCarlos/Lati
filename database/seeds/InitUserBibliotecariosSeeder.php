<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;


class InitUserBibliotecariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idemp  = 1;
        $perm = Permission::findOrCreate('bibliotecario_consulta','web');
        $role = Role::findOrCreate('bibliotecario','web');
        if ( !$role->hasPermissionTo($perm) ){
            $role->givePermissionTo($perm);
        }

        User::findOrCreateUserWithRole('bib0001','NARVAEZ SILVA VENERANDA ISKRA','bib001@mail.com','bib0001',1433,$idemp,$role);
        User::findOrCreateUserWithRole('bib0002','ROMAN SANCHEZ MARIA DE LOURDES','bib002@mail.com','bib0002',1468,$idemp,$role);
    }
}
