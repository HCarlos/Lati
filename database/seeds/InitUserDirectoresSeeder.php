<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class InitUserDirectoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idemp  = 1;
        $perm = Permission::findOrCreate('director_consulta','web');
        $role = Role::findOrCreate('director','web');
        if ( !$role->hasPermissionTo($perm) ){
            $role->givePermissionTo($perm);
        }

        User::findOrCreateUserWithRole('dir0001','TRUJILLO ZENTELLA GRACIELA','dir0009@mail.com','dir0001',1488,$idemp,$role);
        User::findOrCreateUserWithRole('dir0002','COBO GONZALEZ ALFREDO ROBERTO','acobo@arji.edu.mx','dir0002',1334,$idemp,$role);
        User::findOrCreateUserWithRole('dir0003','HINOJOSA RAMIREZ MARIANELA','dir0010@mail.com','dir0003',1381,$idemp,$role);
        User::findOrCreateUserWithRole('dir0004','GARCIA DEL VALLE FRANCISCA','pakymex@gmail.com','dir0004',1306,$idemp,$role);
        User::findOrCreateUserWithRole('dir0005','GOMEZ GUADALUPE','glupegomez@hotmail.com','dir0005',1300,$idemp,$role);
        User::findOrCreateUserWithRole('dir0006','MERINO CASTELLANOS AURA GRACIELA','cristy.maglop@gmail.com','dir0006',1416,$idemp,$role);
        User::findOrCreateUserWithRole('dir0007','MICELI CARBONELL LUISA FERNANDA','pablomartinez_55@hotmail.com','dir0007',1417,$idemp,$role);
        User::findOrCreateUserWithRole('dir0008','MARTINEZ ALVAREZ PABLO','dir0006@mail.com','dir0008',1410,$idemp,$role);
        User::findOrCreateUserWithRole('dir0009','MENDOZA KOHRS MARTHA PATRICIA','tatateacher@gmail.com','dir0009',1413,$idemp,$role);
        User::findOrCreateUserWithRole('dir0010','MAGAÑA LOPEZ CRISTY','lfmicelic@hotmail.com','dir0010',1404,$idemp,$role);

    }
}
