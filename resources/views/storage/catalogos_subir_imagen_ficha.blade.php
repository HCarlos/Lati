@extends('home')

@section('content_form_permisions')
<div class="panel panel-primary" id="frmEdit0">
    <div class="panel-heading">
            <span><strong>{{ ucwords($titulo) }}</strong> {{$idItem}}
                <a class="btn btn-info btn-xs pull-right" href="{{ "/index/$id" }}">
                    Regresar
                </a>
            </span>
    </div>

    <div class="panel-body">
        <form method="post" action="{{ action('Storage\StorageFichaController@subirArchivoFicha',['oFicha'=>$items]) }}" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group row">
                <label class="col-md-4 control-label">Nuevo Archivo</label>
                <div class="col-md-6">
                    <input type="file" name="file" >
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Última Imagen</label>
                <div class="col-md-6">
                    @foreach($archivo as $item)
                        <a href="{{ asset('storage/'.$item->root.$item->filename)  }}" target="_blank">
                            <img src="{{ asset('storage/'.$item->root.$item->filename)  }}" width="100" height="100" title="{{$item->filename}}">
                        </a>
                    @endforeach
                </div>
            </div>
            <div>
                <label class="col-md-2 col-form-label text-md-right"></label>
                <div class="col-md-8" >
                    <button type="submit" class="btn btn-primary">
                        Subir
                    </button>
                </div>
                <a class="btn btn-info float-md-right " href="{{ "/index/$id" }}">
                    Regresar
                </a>
            </div>

            <input type="hidden" name="cat_id" value="{{$id}}" />
            <input type="hidden" name="idItem" value="{{$idItem}}" />
            <input type="hidden" name="action" value="{{$action}}" />

        </form>
    </div>
</div>
@endsection

