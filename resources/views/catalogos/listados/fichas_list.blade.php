<div class="dataTables_wrapper" role="grid">
    @if ($items)
        <table id="{{ $tableName}}" aria-describedby="sample-table-2_info"  class="table table-striped table-bordered table-hover dataTable hide" >
            <thead>
            <tr role="row">
                <th aria-label="id" style="width: 50px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="0" role="columnheader" class="sorting" >ID</th>
                {{--<th aria-label="ficha_no" style="width: 50px;" colspan="1" rowspan="1" aria-controls="{{ $tableName}}" tabindex="1" role="columnheader" class="sorting">No</th>--}}
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
                    {{--<td>{{ $item->ficha_no }}</td>--}}
                    <td>{{ $item->isbn }}</td>
                    <td>{{ $item->titulo }}</td>
                    <td>{{ $item->autor.' '}} @if($item->isImages() )    <i class="far fa-images red"></i> @endif </td>
                    <td width="100">

                        @if ($user->hasAnyPermission(['subir_imagen_fichas','all']))
                            <a href="{{ route('catalogosSubirImagenFichas/', array('id' => $id,'idItem' => $item->id,'action' => 4)) }}" class="btn btn-link btn-xs  margen-izquierdo-03em pull-right" target="_blank" title="Subir imagen" >
                                <i class="fas fa-image orange"></i>
                            </a>
                        @endif
                        @if ($user->hasAnyPermission(['clonar_fichas','all']))
                            <a href="{{ route('catalogosFichasClone/', array('id' => $id,'idItem' => $item->id,'action' => 3)) }}" class="btn btn-link btn-xs  margen-izquierdo-03em pull-right" target="_blank" title="Clonar" >
                                <i class="far fa-clone purple"></i>
                            </a>
                        @endif
                        @if ($user->hasAnyPermission(['eliminar_registro','all']))
                            <a href="#" class="btn btn-link btn-xs margen-izquierdo-03em pull-right btnAction2" id ="ficha-{{$item->id.'-'.$user->id.'-'.$id.'-'.$npage.'-'.$tpaginas}}-2-/destroy_ficha/" title="Eliminar">
                                <i class="fa fa-trash fa-lg red" ></i>
                            </a>
                        @endif
                        @if ($user->hasAnyPermission(['editar_registro','all']))
                            <a href="{{ route('catalogos/', array('id' => $id,'idItem' => $item->id,'action' => 1)) }}" class="btn btn-link btn-xs pull-right" target="_blank" title="Editar">
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
