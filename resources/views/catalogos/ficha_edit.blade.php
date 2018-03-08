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
                    <form method="post" action="{{ action('Catalogos\FichaController@update',['oFicha'=>$items]) }}">
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
                            <label for = "fecha" class="col-md-2 col-form-label text-md-right">Fecha</label>
                            <div class="col-md-10">
                                <input type="date" name="fecha" id="fecha" value="{{ old('fecha',$items->fecha) }}" class="col-md-3" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for = "datos_fijos" class="col-md-2 col-form-label text-md-right">Datos fijos</label>
                            <div class="col-md-10">
                                <input type="text" name="datos_fijos" id="datos_fijos" value="{{ old('datos_fijos',$items->datos_fijos) }}" class="col-md-12"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for = "etiqueta_marc" class="col-md-2 col-form-label text-md-right">Etiquetas</label>
                            <div class="col-md-10">
                                <textarea rows="6" name="etiqueta_marc" id="etiqueta_marc" class="col-md-12">{{ old('etiqueta_marc',$items->etiqueta_marc) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for = "isbn" class="col-md-2 col-form-label text-md-right">ISBN</label>
                            <div class="col-md-10">
                                <input type="text" name="isbn" id="isbn"  value="{{ old('isbn',$items->isbn) }}" class="col-md-12" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for = "titulo" class="col-md-2 col-form-label text-md-right">Título</label>
                            <div class="col-md-10">
                                <input type="text" name="titulo" id="titulo"  value="{{ old('titulo',$items->titulo) }}" class="col-md-12" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for = "autor" class="col-md-2 col-form-label text-md-right">Autor</label>
                            <div class="col-md-10">
                                <input type="text" name="autor" id="autor"  value="{{ old('autor',$items->autor) }}" class="col-md-12" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for = "clasificacion" class="col-md-2 col-form-label text-md-right">Clasificación</label>
                            <div class="col-md-10">
                                <input type="text" name="clasificacion" id="clasificacion"  value="{{ old('clasificacion',$items->clasificacion) }}" class="col-md-12"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for = "status" class="col-md-2 col-form-label text-md-right">Status</label>
                            <div class="col-md-10">
                                {{ Form::select('status', array('M'=>'M', 'A'=>'A'), trim($items->status), ['id' => 'status','class' => 'col-md-2']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for = "no_coleccion" class="col-md-2 col-form-label text-md-right">No. Colección</label>
                            <div class="col-md-10">
                                <input type="number" name="no_coleccion" id="no_coleccion"  value="{{ old('no_coleccion',$items->no_coleccion) }}" min="0" max="99" class="col-md-2" />
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
                        <input type="hidden" name="tipo_material" value="1" />

                    </form>
    </div>
</div>
@endsection

