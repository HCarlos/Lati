<div class="list-group todoloAncho" id="dvCatalogos0">
    @role('user|administrator')
    <a class="button list-group-item form-control" href="{{ route('listItem', ['id' => 0,'npage' => 1, 'tpaginas' => 0]) }}">Editoriales</a>
    <a class="button list-group-item form-control" href="{{ route('listItem', ['id' => 1,'npage' => 1, 'tpaginas' => 0]) }}">Fichas</a>
    <a class="button list-group-item form-control" href="{{ route('listItem', ['id' => 2,'npage' => 1, 'tpaginas' => 0]) }}">Códigos de lenguaje de paises</a>
    {{--<a></a>--}}
    {{--<a class="button list-group-item form-control" href="#" id="btnPrueba">Prueba</a>--}}
    @endrole

    @role('administrator|system_operator')
    <a class="button list-group-item form-control" href="{{ route('listItem', ['id' => 10,'npage' => 1, 'tpaginas' => 0]) }}">Usuarios</a>
    @endrole
    @role('administrator')
    <a class="button list-group-item form-control" href="{{ route('listItem', ['id' => 11,'npage' => 1, 'tpaginas' => 0]) }}">Roles</a>
    <a class="button list-group-item form-control" href="{{ route('listItem', ['id' => 12,'npage' => 1, 'tpaginas' => 0]) }}">Permisos</a>
    @endrole
</div>

    {{--<a class="button list-group-item" href="{{ route('ajaxIndexCatList', ['id' => 0)) }}">Prueba</a>--}}
