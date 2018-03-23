<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class InitUserCoordinadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idemp  = 1;
        $perm = Permission::findOrCreate('coordinador_consulta','web');
        $role = Role::findOrCreate('coordinador','web');
        if ( !$role->hasPermissionTo($perm) ){
            $role->givePermissionTo($perm);
        }

        User::findOrCreateUserWithRole('cord001','GONZALEZ PULIDO GUILLERMO','cord001@mail.com','cord001',1369,$idemp,$role);
        User::findOrCreateUserWithRole('cord002','SARAO PEREZ WILBER','cord002@mail.com','cord002',1480,$idemp,$role);
        User::findOrCreateUserWithRole('cord003','LUTZOW LUNA DORA CONSUELO','cord003@mail.com','cord003',1287,$idemp,$role);
        User::findOrCreateUserWithRole('cord004','ISLAS HERNANDEZ HILDA ENRIQUETA','cord004@mail.com','cord004',1382,$idemp,$role);
        User::findOrCreateUserWithRole('cord005','TELLAECHE MERINO ANDREA','cord005@mail.com','cord005',1485,$idemp,$role);
        User::findOrCreateUserWithRole('cord006','SERAFIN FERIA BASILIO','cord006@mail.com','cord006',1481,$idemp,$role);
        User::findOrCreateUserWithRole('cord007','SOLA ROSAS BEATRIZ EUGENIA','cord007@mail.com','cord007',1483,$idemp,$role);
        User::findOrCreateUserWithRole('cord008','ALARCON MUGICA CYNTHIA ESTHER','cord008@mail.com','cord008',1508,$idemp,$role);
        User::findOrCreateUserWithRole('cord009','PAZ LOPEZ YOEL','cord009@mail.com','cord009',1440,$idemp,$role);
        User::findOrCreateUserWithRole('cord010','RODRIGUEZ MANZUR MARGARITA','cord010@mail.com','cord010',1465,$idemp,$role);
        User::findOrCreateUserWithRole('cord011','LEON ALDAY OLGA CECILIA','cord011@mail.com','cord011',1510,$idemp,$role);
        User::findOrCreateUserWithRole('cord012','REYES ESPINOSA NURITH ANGELICA GUADALUPE','cord012@mail.com','cord012',1459,$idemp,$role);
        User::findOrCreateUserWithRole('cord013','MOCTEZUMA CELIS OCHOA MAGNOLIA EUGENIA','cord013@mail.com','cord013',1418,$idemp,$role);
        User::findOrCreateUserWithRole('cord014','RAMON ALVARADO JOYCE EUNICE','cord014@mail.com','cord014',1456,$idemp,$role);

    }
}
