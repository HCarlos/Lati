@extends('home')

@section('content_form_permisions')
<div class="panel panel-primary" id="frmEdit0">
    <div class="panel-heading">
        <span><strong>{{ ucwords($titulo) }}</strong> | ELEMENTOS PRESTADOS {{$idItem}}
            <a class="btn btn-info btn-xs pull-right" href="#" onclick="javascript:window.close();">
                   Cerrar
            </a>
        </span>
    </div>

    <div class="panel-body">
        <form method="post" action="{{ action('Catalogos\FichaController@devolver',['oFicha'=>$items]) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

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
                <label for = "isbn" class="col-md-2 col-form-label text-md-right">ISBN</label>
                <div class="col-md-10">
                    <input type="text" name="isbn" id="isbn" value="{{ $items->isbn }}" class="col-md-10" readonly/>
                    <span class="col-md-2 bg-white text-right">{{!$items->isPrestado() ? 'Devuelto': 'Prestado'}}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for = "titulo" class="col-md-2 col-form-label text-md-right">Título</label>
                <div class="col-md-10">
                    <input type="text" name="titulo" id="titulo" value="{{ $items->titulo }}" class="col-md-12" readonly/>
                </div>
            </div>
            <div class="form-group row">
                <label for = "autor" class="col-md-2 col-form-label text-md-right">Autor</label>
                <div class="col-md-10">
                    <input type="text" name="autor" id="autor" value="{{ $items->autor }}" class="col-md-12" readonly/>
                </div>
            </div>
            <div class="form-group row">
                <label for = "usuario_prestador" class="col-md-2 col-form-label text-md-right">Usuario</label>
                <div class="col-md-10">
                    <input type="text" name="usuario_prestador" id="usuario_prestador" value="{{ $otrosDatos->nombre_completo }}" class="col-md-12" readonly/>
                </div>
            </div>
            <div class="form-group row">
                <label for = "fecha_salida" class="col-md-2 col-form-label text-md-right">Fecha Salida</label>
                <div class="col-md-10">
                    {{ Form::date('fecha_salida', \Carbon\Carbon::now(), ['id'=>'fecha_salida','class'=>'col-md-3','readonly'=>'readonly']) }}
                    @if ($errors->has('fecha_salida'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('fecha_salida') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for = "fecha_devolucion" class="col-md-2 col-form-label text-md-right">Fecha Devolución</label>
                <div class="col-md-10">
                    {{ Form::date('fecha_devolucion',\Carbon\Carbon::now()->addDay(5), ['id'=>'fecha_devolucion','class'=>'col-md-3']) }}
                    @if ($errors->has('fecha_devolucion'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('fecha_devolucion') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div>
                <label class="col-md-2 col-form-label text-md-right"></label>
                <div class="col-md-8" >
                    <button type="submit" class="btn btn-primary">
                        Devolver
                    </button>
                </div>

                <a class="btn btn-info float-md-right " href="#" onclick="javascript:window.close();">
                    Cerrar
                </a>
            </div>

            <input type="hidden" name="user_id" value="{{$user->id}}" />
            <input type="hidden" name="cat_id" value="{{$id}}" />
            <input type="hidden" name="idItem" value="{{$idItem}}" />
            <input type="hidden" name="action" value="{{$action}}" />
            <input type="hidden" name="tipo_material" value="1" />

        </form>
    </div>
</div>
@endsection

