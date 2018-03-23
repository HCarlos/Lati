<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class InitUserAsesoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idemp  = 1;
        $perm = Permission::findOrCreate('asesor_consulta','web');
        $role = Role::findOrCreate('asesor','web');
        if ( !$role->hasPermissionTo($perm) ){
            $role->givePermissionTo($perm);
        }

        User::findOrCreateUserWithRole('ase001','BOLON TUN ISABEL DEL CARMEN','ase001@mail.com','ase001',1352,$idemp,$role);
        User::findOrCreateUserWithRole('ase002','CHACON PEREZ FRANCISCA GUADALUPE','ase002@mail.com','ase002',1336,$idemp,$role);
        User::findOrCreateUserWithRole('ase003','EVIA AVALOS FRANCISCO JAVIER','ase003@mail.com','ase003',1310,$idemp,$role);
        User::findOrCreateUserWithRole('ase004','HERNANDEZ SANCHEZ ALMA DELIA','ase004@mail.com','ase004',1377,$idemp,$role);
        User::findOrCreateUserWithRole('ase005','ISLAS HERNANDEZ HILDA ENRIQUETA','ase005@mail.com','ase005',1382,$idemp,$role);
        User::findOrCreateUserWithRole('ase006','MORALES MISS LORENA DEL CARMEN','ase006@mail.com','ase006',1430,$idemp,$role);
        User::findOrCreateUserWithRole('ase007','RAMIREZ SOTO JOSE DOMINGO','ase007@mail.com','ase007',1455,$idemp,$role);
        User::findOrCreateUserWithRole('ase008','REYES ESPINOSA NURITH ANGELICA GUADALUPE','ase008@mail.com','ase008',1459,$idemp,$role);
        User::findOrCreateUserWithRole('ase009','MOCTEZUMA CELIS OCHOA MAGNOLIA EUGENIA','ase009@mail.com','ase009',1418,$idemp,$role);
        User::findOrCreateUserWithRole('ase010','RAMON ALVARADO JOYCE EUNICE','ase010@mail.com','ase010',1456,$idemp,$role);

    }
}
