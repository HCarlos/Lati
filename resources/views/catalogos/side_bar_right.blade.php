@extends('home')

@section('styles')
<link href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css" rel="stylesheet"/>
{{--<link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" type="text/css">--}}
@endsection

@section('content_catalogo')
<div class="panel panel-primary" id="catalogosList0">
    <div class="panel-heading">

        <span id="titulo_catalogo">Catálogos </span>

        <a href="{{ route('catalogos/', array('id' => $id,'idItem' => 0,'action' => 0)) }}" class="btn btn-info btn-xs marginLeft2em" title="Agregar nuevo registro" style="margin-left: 2em;">
            <i class="fa fa-plus-circle "></i> Nuevo registro
        </a>

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
                @if(Auth::user()->hasRole('user'))
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

                                        <a href="#" class="btn btn-link btn-xs margen-izquierdo-1em pull-right btnAction2" id ="editorial-{{$item->id.'-'.$user->id.'-'.$id}}-0-/destroy_editorial/" title="Eliminar">
                                            <i class="fa fa-trash fa-lg red" ></i>
                                        </a>

                                    <a href="{{ route('catalogos/', array('id' => $id,'idItem' => $item->id,'action' => 1)) }}" class="btn btn-link btn-xs pull-right" title="Editar" >
                                        <i class="fas fa-pencil-alt blue"></i>
                                    </a>

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
            @if(Auth::user()->hasRole('user'))
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

                                        <a href="#" class="btn btn-link btn-xs margen-izquierdo-1em pull-right btnAction2" id ="editorial-{{$item->id.'-'.$user->id.'-'.$id}}-0-/destroy_ficha/" title="Eliminar">
                                            <i class="fa fa-trash fa-lg red" ></i>
                                        </a>

                                        <a href="{{ route('catalogos/', array('id' => $id,'idItem' => $item->id,'action' => 1)) }}" class="btn btn-link btn-xs pull-right" title="Editar">
                                            <i class="fas fa-pencil-alt blue"></i>
                                        </a>

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
{{--<script src="{{ asset('js/datatables.min.js') }}"></script>--}}
<script src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
<script>
    jQuery(function($) {
        $(document).ready(function() {

            $("#preloaderLocal").hide();
            $('#{{ $tableName}}').removeClass('hide');

            var nCols = $('#{{ $tableName}}').find("tbody > tr:first td").length;
            var aCol = [];

            for (i = 0; i < nCols - 1; i++) {
                aCol[i] = {};
            }
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

            // oTable.fnDraw();

            // alert(nCols);
        });
    });
</script>
@endsection
