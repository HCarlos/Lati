@extends('home')

@section('content_catalogo')

    <div class="panel-heading">

        <span id="titulo_catalogo">Catálogos </span>
            <a href="{{ route('catalogos/', array('id' => $id,'idItem' => 0,'action' => 0)) }}" class="btn btn-info btn-xs pull-right" title="Agregar nuevo registro">
                <i class="fa fa-plus-circle "></i> Nuevo registro
            </a>
    </div>

    <div class="panel-body">
        @switch($id)

            @case(0)
                @if(Auth::user()->hasRole('user'))

                    <table id="{{ $tableName}}"  class="table table-hover table-bordered table-striped datatable" style="width:100%" >
                        <thead>
                        <tr>
                            <th class="active">ID</th>
                            <th class="success">EDITORIAL</th>
                            <th class="warning">REPRESENTANTE</th>
                            <th class="active"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td class="active">{{ $item->id }}</td>
                                <td class="success">{{ $item->editorial }}</td>
                                <td class="warning">{{ $item->representante }}</td>
                                <td class="danger" width="100">

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
                @endif
            @break;
            @case(1)
            @if(Auth::user()->hasRole('user'))
                <table id="{{ $tableName}}" class="table table-hover table-bordered table-striped datatable" style="width:100%">
                    <thead>
                    <tr>
                        <th class="active">ID</th>
                        <th class="success">NO</th>
                        <th class="success">ISB</th>
                        <th class="warning">TITULO</th>
                        <th class="danger">AUTOR</th>
                        <th class="active" width="100"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td class="active">{{ $item->id }}</td>
                            <td class="success">{{ $item->ficha_no }}</td>
                            <td class="success">{{ $item->isbn }}</td>
                            <td class="warning">{{ $item->titulo }}</td>
                            <td class="danger">{{ $item->autor }}</td>
                            <td class="active">

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

            @endif
            @break;

        @endswitch

    </div>

@endsection


@section('scripts')
    <script src="{{ asset('assets/js/jquery-2.0.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.bootstrap.js') }}"></script>
    <script>
        jQuery(function($) {
            var nCols = $('#{{ $tableName}}').find("tbody > tr:first td").length;
            var aCol = [];

            for(i=0;i<nCols-1;i++){
                aCol[i] = {};
            }
            aCol[nCols-1] = { "bSortable": false };

            var oTable = $('#{{ $tableName}}').dataTable({
                "oLanguage": {
                    "sLengthMenu": "_MENU_ registros por página",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    },
                    "sSearch": "Buscar",
                    "sProcessing":"Procesando...",
                    "sLoadingRecords":"Cargando...",
                    "sZeroRecords": "No hay registros",
                    "sInfo": "_START_ - _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "No existen datos",
                    "sInfoFiltered": "(De _MAX_ registros)"
                },
                "aaSorting": [[ 0, "desc" ]],
                "aoColumns": aCol,
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
                "bRetrieve": true,
                "bDestroy": false
            });


        });
    </script>
@endsection
