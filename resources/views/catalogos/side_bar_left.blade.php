@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="list-group todoloAncho" id="dvCatalogos0">
    <a class="button list-group-item form-control" href="{{ route('listItem', array('id' => 0)) }}">Editoriales</a>
    <a class="button list-group-item form-control" href="{{ route('listItem', array('id' => 1)) }}">Fichas</a>
    <a class="button list-group-item form-control" href="{{ route('listItem', array('id' => 2)) }}">Códigos de lenguaje de paises</a>
    {{--<a></a>--}}
    {{--<a class="button list-group-item form-control" href="#" id="btnPrueba">Prueba</a>--}}

    @role('administrator|system_operator')
    <a class="button list-group-item form-control" href="{{ route('listItem', array('id' => 10)) }}">Usuarios</a>
    <a class="button list-group-item form-control" href="{{ route('listItem', array('id' => 11)) }}">Roles</a>
    <a class="button list-group-item form-control" href="{{ route('listItem', array('id' => 12)) }}">Permisos</a>
    @endrole
</div>

    {{--<a class="button list-group-item" href="{{ route('ajaxIndexCatList', array('id' => 0)) }}">Prueba</a>--}}
