@extends('home')

@section('styles')
<link href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css" rel="stylesheet"/>
{{--<link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" type="text/css">--}}
@endsection

@section('content_catalogo')
<div class="panel panel-primary" id="catalogosList0">
    <div class="panel-heading">

        <span id="titulo_catalogo">Catálogos </span>
        @if ($user->hasAnyPermission(['crear_registro','crear_usuarios','crear_roles','crear_permisos','all']))
            <a href="{{ route('catalogos/', array('id' => $id,'idItem' => 0,'action' => 0)) }}" class="btn btn-info btn-xs marginLeft2em" title="Agregar nuevo registro" style="margin-left: 2em;">
                <i class="fa fa-plus-circle "></i> Nuevo registro
            </a>
        @endif
        <form method="post" action="{{ action('Catalogos\CatalogosListController@indexSearch') }}" class="form-inline pull-right ">
            {{ csrf_field() }}
                <input type="text" class="form-control form-control-xs altoMoz" name="search" placeholder="buscar..." style="height: 2em !important; line-height: 2em !important;">
            <input type="hidden" name="id" value="{{$id}}"/>
            <button type="submit" class="btn btn-info btn-sm margen-izquierdo-1em "><i class="fas fa-search"></i></button>
        </form>
    </div>

    <div class="panel-body">

        <div class="fa-2x" id="preloaderLocal">
            <i class="fa fa-cog fa-spin"></i> Cargado datos...
        </div>
        @switch($id)

            @case(0)
                @if($user->hasRole('user'))
                <div class="dataTables_wrapper" role="grid">
                    @if ($items)
                    <table id="{{ $tableName}}" aria-describedby="sample-table-2_info"  class="table table-striped table-bordered table-hover dataTable hide" >
                        <thead>
                        <tr role="row">
                            <th aria-label="id" style="width: 80px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="0" role="columnheader" class="sorting" >ID</th>
                            <th aria-label="editorial" style="width: 200px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="1" role="columnheader" class="sorting">Editorial</th>
                            <th aria-label="representante" style="width: 200px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="2" role="columnheader" class="sorting">Representante</th>
                            <th aria-label="" style="width: 200px;" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled"></th>
                        </tr>
                        </thead>
                        <tbody aria-relevant="all" aria-live="polite" role="alert">
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->editorial }}</td>
                                <td>{{ $item->representante }}</td>
                                <td width="100">
                                    @if ($user->hasAnyPermission(['eliminar_registro','all']))
                                        <a href="#" class="btn btn-link btn-xs margen-izquierdo-1em pull-right btnAction2" id ="editorial-{{$item->id.'-'.$user->id.'-'.$id}}-2-/destroy_editorial/" title="Eliminar">
                                            <i class="fa fa-trash fa-lg red" ></i>
                                        </a>
                                    @endif
                                    @if ($user->hasAnyPermission(['editar_registro','all']))
                                        <a href="{{ route('catalogos/', array('id' => $id,'idItem' => $item->id,'action' => 1)) }}" class="btn btn-link btn-xs pull-right" title="Editar" >
                                            <i class="fas fa-pencil-alt blue"></i>
                                        </a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="alert alert-danger" role="alert">No se encontraron datos</div>
                    @endif
                </div>
                @endif
                @break;
            @case(1)
                @if($user->hasRole('user'))
                    <div class="dataTables_wrapper" role="grid">
                    @if ($items)
                            <table id="{{ $tableName}}" aria-describedby="sample-table-2_info"  class="table table-striped table-bordered table-hover dataTable hide" >
                                <thead>
                                <tr role="row">
                                    <th aria-label="id" style="width: 50px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="0" role="columnheader" class="sorting" >ID</th>
                                    <th aria-label="ficha_no" style="width: 50px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="1" role="columnheader" class="sorting">No</th>
                                    <th aria-label="isbn" style="width: 100px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="2" role="columnheader" class="sorting">ISBN</th>
                                    <th aria-label="titulo" style="width: 200px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="2" role="columnheader" class="sorting">TÍTULO</th>
                                    <th aria-label="autor" style="width: 200px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="2" role="columnheader" class="sorting">AUTOR</th>
                                    <th aria-label="" style="width: 100px;" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled"></th>
                                </tr>
                                </thead>
                                <tbody aria-relevant="all" aria-live="polite" role="alert">
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->ficha_no }}</td>
                                        <td>{{ $item->isbn }}</td>
                                        <td>{{ $item->titulo }}</td>
                                        <td>{{ $item->autor }}</td>
                                        <td width="100">
                                            @if ($user->hasAnyPermission(['eliminar_registro','all']))
                                                <a href="#" class="btn btn-link btn-xs margen-izquierdo-1em pull-right btnAction2" id ="editorial-{{$item->id.'-'.$user->id.'-'.$id}}-2-/destroy_ficha/" title="Eliminar">
                                                    <i class="fa fa-trash fa-lg red" ></i>
                                                </a>
                                            @endif
                                            @if ($user->hasAnyPermission(['editar_registro','all']))
                                                <a href="{{ route('catalogos/', array('id' => $id,'idItem' => $item->id,'action' => 1)) }}" class="btn btn-link btn-xs pull-right" title="Editar">
                                                    <i class="fas fa-pencil-alt blue"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    @else
                        <div class="alert alert-danger" role="alert">No se encontraron datos</div>
                    @endif
                    </div>

                @endif
                @break;

            @case(2)
            @if($user->hasRole('user'))
                <div class="dataTables_wrapper" role="grid">
                    @if ($items)
                        <table id="{{ $tableName}}" aria-describedby="sample-table-2_info"  class="table table-striped table-bordered table-hover dataTable hide" >
                            <thead>
                            <tr role="row">
                                <th aria-label="id" style="width: 80px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="0" role="columnheader" class="sorting" >ID</th>
                                <th aria-label="idmid" style="width: 80px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="1" role="columnheader" class="sorting" >IdMig</th>
                                <th aria-label="codigo" style="width: 200px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="2" role="columnheader" class="sorting">Código</th>
                                <th aria-label="Descripcion" style="width: 200px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="3" role="columnheader" class="sorting">Descripción</th>
                                <th aria-label="tipo" style="width: 200px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="4" role="columnheader" class="sorting">Tipo</th>
                                <th aria-label="" style="width: 200px;" colspan="1" rowspan="1" role="columnheader" tabindex="5" class="sorting_disabled"></th>
                            </tr>
                            </thead>
                            <tbody aria-relevant="all" aria-live="polite" role="alert">
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->idmig }}</td>
                                    <td>{{ $item->codigo }}</td>
                                    <td>{{ trim($item->lenguaje) }}</td>
                                    <td>{{ trim($item->tipo)=='L'?'Lengüaje':'Pais' }}</td>
                                    <td width="100">
                                        @if ($user->hasAnyPermission(['eliminar_registro','all']))
                                            <a href="#" class="btn btn-link btn-xs margen-izquierdo-1em pull-right btnAction2" id ="editorial-{{$item->id.'-'.$user->id.'-'.$id}}-2-/destroy_clp/" title="Eliminar">
                                                <i class="fa fa-trash fa-lg red" ></i>
                                            </a>
                                        @endif
                                        @if ($user->hasAnyPermission(['editar_registro','all']))
                                            <a href="{{ route('catalogos/', array('id' => $id,'idItem' => $item->id,'action' => 1)) }}" class="btn btn-link btn-xs pull-right" title="Editar" >
                                                <i class="fas fa-pencil-alt blue"></i>
                                            </a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger" role="alert">No se encontraron datos</div>
                    @endif
                </div>
            @endif
            @break;

            @case(10)
            @if($user->hasRole('administrator'))
                <div class="dataTables_wrapper" role="grid">
                    @if ($items)
                        <table id="{{ $tableName}}" aria-describedby="sample-table-2_info"  class="table table-striped table-bordered table-hover dataTable hide" >
                            <thead>
                            <tr role="row">
                                <th aria-label="id" style="width: 50px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="0" role="columnheader" class="sorting" >ID</th>
                                <th aria-label="name" style="width: 50px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="1" role="columnheader" class="sorting">Username</th>
                                <th aria-label="nombre_completo" style="width: 100px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="2" role="columnheader" class="sorting">Nombre Completo</th>
                                <th aria-label="email" style="width: 200px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="2" role="columnheader" class="sorting">Email</th>
                                <th aria-label="" style="width: 100px;" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled"></th>
                            </tr>
                            </thead>
                            <tbody aria-relevant="all" aria-live="polite" role="alert">
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->nombre_completo }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td width="100">
                                        @if ($user->hasAnyPermission(['eliminar_usuarios','all']))
                                            <a href="#" class="btn btn-link btn-xs margen-izquierdo-1em pull-right btnAction2" id ="usuario-{{$item->id.'-'.$user->id.'-'.$id}}-2-/destroy_usuario/" title="Eliminar">
                                                <i class="fa fa-trash fa-lg red" ></i>
                                            </a>
                                        @endif
                                        @if ($user->hasAnyPermission(['editar_usuarios','all']))
                                                <a href="{{ route('catalogos/', array('id' => $id,'idItem' => $item->id,'action' => 1)) }}" class="btn btn-link btn-xs pull-right" title="Editar">
                                                    <i class="fas fa-pencil-alt blue"></i>
                                                </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger" role="alert">No se encontraron datos</div>
                    @endif
                </div>
            @endif
            @break;
            @case(11)
            @if($user->hasRole('administrator'))
                <div class="dataTables_wrapper" role="grid">
                    @if ($items)
                        <table id="{{ $tableName}}" aria-describedby="sample-table-2_info"  class="table table-striped table-bordered table-hover dataTable hide" >
                            <thead>
                            <tr role="row">
                                <th aria-label="id" style="width: 50px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="0" role="columnheader" class="sorting" >ID</th>
                                <th aria-label="name" style="width: 50px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="1" role="columnheader" class="sorting">Role</th>
                                <th aria-label="" style="width: 100px;" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled"></th>
                            </tr>
                            </thead>
                            <tbody aria-relevant="all" aria-live="polite" role="alert">
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td width="100">
                                        @if ($user->hasAnyPermission(['eliminar_roles','all']))
                                            <a href="#" class="btn btn-link btn-xs margen-izquierdo-1em pull-right btnAction2" id ="role-{{$item->id.'-'.$item->id.'-'.$id}}-2-/destroy_role/" title="Eliminar">
                                                {{--<a href="{{ route('roleDestroy/', array('id' => $item->id,'idItem' => $item->id,'action' => 2)) }}" class="btn btn-link btn-xs pull-right" title="Eliminar">--}}
                                                <i class="fa fa-trash fa-lg red" ></i>
                                            </a>
                                        @endif
                                        @if ($user->hasAnyPermission(['editar_roles','all']))
                                                <a href="{{ route('catalogos/', array('id' => $id,'idItem' => $item->id,'action' => 1)) }}" class="btn btn-link btn-xs pull-right" title="Editar">
                                                    <i class="fas fa-pencil-alt blue"></i>
                                                </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger" role="alert">No se encontraron datos</div>
                    @endif
                </div>
            @endif
            @break;

            @case(12)
            @if($user->hasRole('administrator'))
                <div class="dataTables_wrapper" role="grid">
                    @if ($items)
                        <table id="{{ $tableName}}" aria-describedby="sample-table-2_info"  class="table table-striped table-bordered table-hover dataTable hide" >
                            <thead>
                            <tr role="row">
                                <th aria-label="id" style="width: 50px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="0" role="columnheader" class="sorting" >ID</th>
                                <th aria-label="name" style="width: 50px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="1" role="columnheader" class="sorting">Permiso</th>
                                <th aria-label="" style="width: 100px;" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled"></th>
                            </tr>
                            </thead>
                            <tbody aria-relevant="all" aria-live="polite" role="alert">
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td width="100">
                                        @if ($user->hasAnyPermission(['eliminar_permisos','all']))
                                            <a href="#" class="btn btn-link btn-xs margen-izquierdo-1em pull-right btnAction2" id ="role-{{$item->id.'-'.$item->id.'-'.$id}}-2-/destroy_permission/" title="Eliminar">
                                                {{--<a href="{{ route('roleDestroy/', array('id' => $item->id,'idItem' => $item->id,'action' => 2)) }}" class="btn btn-link btn-xs pull-right" title="Eliminar">--}}
                                                <i class="fa fa-trash fa-lg red" ></i>
                                            </a>
                                        @endif
                                        @if ($user->hasAnyPermission(['editar_permisos','all']))
                                            <a href="{{ route('catalogos/', array('id' => $id,'idItem' => $item->id,'action' => 1)) }}" class="btn btn-link btn-xs pull-right" title="Editar">
                                                <i class="fas fa-pencil-alt blue"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger" role="alert">No se encontraron datos</div>
                    @endif
                </div>
            @endif
            @break;


        @endswitch

    </div>

    {{--@include('catalogos.editorial_edit_2')--}}

@endsection

@section('scripts')
{{--<script src="{{ asset('js/jquery-1.12.4.js') }}"></script>--}}
<script src="{{ asset('assets/js/jquery-2.0.3.min.js') }}"></script>
<script src="{{ asset('js/datatables.min.js') }}"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
<script>
    jQuery(function($) {
        $(document).ready(function() {

            $("#preloaderLocal").hide();
            $('#{{ $tableName}}').removeClass('hide');

            var nCols = $('#{{ $tableName}}').find("tbody > tr:first td").length;
            var aCol = [];

            for (i = 0; i < nCols - 1; i++) {aCol[i] = {};}
            aCol[nCols - 1] = {"sorting": false};

            var oTable = $('#{{ $tableName}}').dataTable({
                "language": {
                    "lengthMenu": "_MENU_ registros por página",
                    "paginate": {
                        "first": "<<",
                        "last": ">>",
                        "previous": "<",
                        "next": ">"
                    },
                    "search": "Buscar",
                    "processing": "Procesando...",
                    "loadingRecords": "Cargando...",
                    "zeroRecords": "No hay registros",
                    "info": "_START_ - _END_ de _TOTAL_ registros",
                    "infoEmpty": "No existen datos",
                    "infoFiltered": ""
                },
                "sorting": [[0, "desc"]],
                "columns": aCol,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
                "retrieve": true,
                "destroy": false
            });

        });
    });
</script>
@endsection
