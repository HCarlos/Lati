@extends('home')

@section('content_form_permisions')
<div class="panel panel-primary" id="frmEdit0">
    <div class="panel-heading">
            <span><strong>{{ ucwords($titulo) }}</strong> {{$idItem}}
                {{--<a class="btn btn-info btn-xs pull-right" href="{{ "/index/$id" }}">--}}
                    {{--Regresar--}}
                {{--</a>--}}
                <a class="btn btn-info btn-xs pull-right" href="#" onclick="javascript:window.close();">
                   Cerrar
                </a>
            </span>
    </div>

    <div class="panel-body">
        <form method="post" action="{{ action('Storage\StorageFichaController@subirArchivoFicha',['oFicha'=>$items]) }}" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group row">
                <label class="col-md-4 control-label">Nuevo Archivo</label>
                <div class="col-md-6">
                    <input type="file" name="file" class="form-control {{ $errors->has('file') ? ' is-invalid' : '' }} altMoz" style="padding-top: 0px;" >
                    @if ($errors->has('file'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('file') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Última Imagen</label>
                <div class="col-md-6">

                    <div class="row">
                    @foreach($archivo as $item)
                        <div class="list-group-item col-md-3" >
                            <a href="{{ asset('storage/'.$item->root.$item->filename)  }}" target="_blank" >
                                <img src="{{ asset('storage/'.$item->root.$item->filename)  }}" width="100" height="100" title="{{$item->filename}}"/>
                                <a href="{{ route('storageFichaRemove/',['cat_id'=>$id,'idItem'=>$idItem,'action'=>$action,'idFF'=>$item->id])  }}"  class="mi-imagen-arriba-derecha icon-trash bigger-150" >
                                {{--<a href="#" class="mi-imagen-arriba-derecha icon-trash bigger-150 btnAction2" id="qif-{{$item->id.'-'.$idItem.'-'.$id.'-'.$item->id}}-2-/quitar_imagen_ficha/">--}}
                                    <i class="fas fa-trash-alt red"></i>
                                </a>
                            </a>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
            <div>
                <label class="col-md-2 col-form-label text-md-right"></label>
                <div class="col-md-8" >
                    <button type="submit" class="btn btn-primary">
                        Subir
                    </button>
                </div>
                {{--<a class="btn btn-info float-md-right " href="{{ "/index/$id" }}">--}}
                    {{--Regresar--}}
                {{--</a>--}}
                <a class="btn btn-info float-md-right " href="#" onclick="javascript:window.close();">
                    Cerrar
                </a>
            </div>

            <input type="hidden" name="cat_id" value="{{$id}}" />
            <input type="hidden" name="idItem" value="{{$idItem}}" />
            <input type="hidden" name="action" value="{{$action}}" />

        </form>
    </div>
</div>
@endsection

