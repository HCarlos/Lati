@extends('home')

@section('content_form_permisions')
<div class="panel panel-primary" id="frmEdit0">
    <div class="panel-heading">
            <span><strong>{{ ucwords($titulo) }}</strong> | Editando registro {{$idItem}}
                <a class="btn btn-info btn-xs pull-right" href="{{ "/index/$id" }}">
                    Regresar
                </a>
            </span>
    </div>

    <div class="panel-body">
                    <form method="post" action="{{ action('Catalogos\CodigoLenguajePaisController@update',['clp'=>$items]) }}">
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
                            <label for = "codigo" class="col-md-2 col-form-label text-md-right">Código</label>
                            <div class="col-md-10">
                                <input type="text" name="codigo" value="{{ old('codigo',$items->codigo) }}" class="col-md-12" autofocus />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for = "lenguaje" class="col-md-2 col-form-label text-md-right">Lengüaje</label>
                            <div class="col-md-10">
                                <input type="text" name="lenguaje"  value="{{ old('lenguaje',$items->lenguaje) }}" class="col-md-12"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for = "tipo" class="col-md-2 col-form-label text-md-right">Status</label>
                            <div class="col-md-10">
                                {{ Form::select('tipo', array(''=>'Seleccione una opción', 'L'=>'Lenguaje', 'P'=>'Pais'), trim($items->tipo), ['id' => 'tipo','class' => 'col-md-2']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for = "status_lenguaje" class="col-md-2 col-form-label text-md-right">Status</label>
                            <div class="col-md-10">
                                {{ Form::select('status_lenguaje', array('0'=>'Inactivo', '1'=>'Activo'), trim($items->status_lenguaje), ['id' => 'status_lenguaje','class' => 'col-md-2']) }}
                            </div>
                        </div>
                        <div>
                            <label class="col-md-2 col-form-label text-md-right"></label>
                            <div class="col-md-8" >
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                            <a class="btn btn-info float-md-right " href="{{ "/index/$id" }}">
                                Regresar
                            </a>
                        </div>

                        <input type="hidden" name="user_id" value="{{$user->id}}" />
                        <input type="hidden" name="cat_id" value="{{$id}}" />
                        <input type="hidden" name="idItem" value="{{$idItem}}" />
                        <input type="hidden" name="action" value="{{$action}}" />
                        <input type="hidden" name="idemp" value="0{{$user->idemp}}" />

                    </form>
    </div>
</div>
@endsection

