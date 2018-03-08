<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class InitializePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::findOrCreate('eliminar_usuarios','web');
        Permission::findOrCreate('eliminar_roles','web');
        Permission::findOrCreate('eliminar_permisos','web');

        Permission::findOrCreate('crear_usuarios','web');
        Permission::findOrCreate('crear_roles','web');
        Permission::findOrCreate('crear_permisos','web');

        Permission::findOrCreate('editar_usuarios','web');
        Permission::findOrCreate('editar_roles','web');
        Permission::findOrCreate('editar_permisos','web');

        Permission::findOrCreate('asignar_roles_usuario','web');
        Permission::findOrCreate('asignar_permisos_role','web');
        Permission::findOrCreate('eliminar_permisos_role','web');
        Permission::findOrCreate('eliminar_roles_usuario','web');

        Permission::findOrCreate('clonar_fichas','web');
        Permission::findOrCreate('subir_imagen_fichas','web');

    }
}
