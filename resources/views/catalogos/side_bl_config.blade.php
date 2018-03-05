    @role('administrator')
    <a class="button list-group-item" href="{{ route('asignItem/', array('ida' => 0,'iduser' => 0)) }}">Asignar Roles a Usuario</a>
    <a class="button list-group-item" href="{{ route('asignItem/', array('ida' => 1,'iduser' => 0)) }}">Asignar Permisos a Role</a>
    @endrole
