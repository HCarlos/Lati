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
            @switch($id)
                @case(0)
                @case(1)
                @case(2)
                @case(3)
                @case(10)
                    <a href="{{ route('catalogos/', array('id' => $id,'idItem' => 0,'action' => 0)) }}" class="btn btn-info btn-xs marginLeft2em" target="_blank" title="Agregar nuevo registro" style="margin-left: 2em;">
                    @break
                @default
                   <a href="{{ route('catalogos/', array('id' => $id,'idItem' => 0,'action' => 0)) }}" class="btn btn-info btn-xs marginLeft2em" title="Agregar nuevo registro" style="margin-left: 2em;">
            @endswitch
                <i class="fa fa-plus-circle "></i> Nuevo registro
            </a>
        @endif
        {{--<form method="get" action="{{ route('listItem',['id'=>$id,'npage'=>$npage,'tpaginas'=>$tpaginas]) }}" class="form-inline pull-right ">--}}
            {{--{{ Form::select('listEle', $listEle, $npage, ['id' => 'listEle','multiple' => 'multiple','class'=>' listEle form-control  panel-fill','onclick'=>'javascript::this.submit()']) }}--}}
        {{--</form>--}}
        <form method="post" action="{{ action('Catalogos\CatalogosListController@indexSearch') }}" class="form-inline pull-right ">
            {{ csrf_field() }}
                <input type="text" class="form-control form-control-xs altoMoz" name="search" placeholder="Buscar en la base de datos..." style="height: 2em !important; line-height: 2em !important;">
            <input type="hidden" name="id" value="{{$id}}"/>
            <button type="submit" class="btn btn-info btn-sm margen-izquierdo-03em "><i class="fas fa-search"></i></button>
        </form>
    </div>

    <div class="panel-body">
        @include('catalogos.listados.paginate_list')
        <div class="fa-2x" id="preloaderLocal">
            <i class="fa fa-cog fa-spin"></i> Cargado datos...
        </div>
        @switch($id)
            @case(0)
                @if($user->hasRole('user'))
                    @include('catalogos.listados.editoriales_list')
                @endif
                @break;
            @case(1)
                @if($user->hasRole('user'))
                    @include('catalogos.listados.fichas_list')
                @endif
                @break;
            @case(2)
                @if($user->hasRole('user'))
                    @include('catalogos.listados.clp_list')
                @endif
                @break;
            @case(3)
                @if($user->hasRole('user'))
                    @include('catalogos.listados.apartados_list')
                @endif
                @break;
            @case(10)
                @if($user->hasRole('administrator|system_operator'))
                    @include('catalogos.listados.usuarios_list')
                @endif
                @break;
            @case(11)
            @if($user->hasRole('administrator'))
                    @include('catalogos.listados.roles_list')
                @endif
                @break;
            @case(12)
                @if($user->hasRole('administrator'))
                    @include('catalogos.listados.permisos_list')
                @endif
                @break;
        @endswitch
    </div>
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
                    "search": "Buscar en esta tabla",
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
