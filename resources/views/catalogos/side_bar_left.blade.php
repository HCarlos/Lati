    <a class="button list-group-item" href="{{ route('listItem', array('id' => 0)) }}">Editoriales</a>
    <a class="button list-group-item" href="{{ route('listItem', array('id' => 1)) }}">Fichas</a>
    <a></a>
    <a class="button list-group-item" href="#" id="btnPrueba">Prueba</a>

    @role('administrator')
    <a class="button list-group-item" href="{{ route('listItem', array('id' => 10)) }}">Usuarios</a>
    <a class="button list-group-item" href="{{ route('listItem', array('id' => 11)) }}">Roles</a>
    @endrole

    {{--<a class="button list-group-item" href="{{ route('ajaxIndexCatList', array('id' => 0)) }}">Prueba</a>--}}
