@extends('home')

@section('content_form_permisions')
<div class="panel panel-primary" id="frmNew0">
    <div class="panel-heading">
            <span><strong>{{ ucwords($titulo) }}</strong> | Nuevo Registro
                <a class="btn btn-info btn-xs pull-right" href="{{ "/index/$id" }}">
                    Regresar
                </a>
            </span>
    </div>

    <div class="panel-body">
                    <form method="post" action="{{ action('Catalogos\FichaController@store') }}">
                        {{ csrf_field()   }}

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for = "fecha">Fecha</label>
                            {{ Form::date('fecha', \Carbon\Carbon::now(), ['id'=>'fecha']) }}
                        </div>
                        <div class="form-group">
                            <label for = "datos_fijos">Datos fijos</label>
                            <input type="text" name="datos_fijos" id="datos_fijos" value="{{ old('datos_fijos') }}" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for = "etiqueta_marc">Etiquetas</label>
                            <textarea cols="100" rows="4" name="etiqueta_marc" id="etiqueta_marc" class="form-control">{{ old('etiqueta_marc') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for = "isbn">ISBN</label>
                            <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}" />
                        </div>
                        <div class="form-group">
                            <label for = "titulo">Título</label>
                            <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}" />
                        </div>
                        <div class="form-group">
                            <label for = "autor">Autor</label>
                            <input type="text" name="autor" id="autor"  value="{{ old('autor') }}" />
                        </div>
                        <div class="form-group">
                            <label for = "clasificacion">Clasificación</label>
                            <input type="text" name="clasificacion" id="clasificacion"  value="{{ old('clasificacion') }}" />
                        </div>
                        <div class="form-group">
                            <label for = "status">Status</label>
                            {{ Form::select('status', array('M'=>'M', 'A'=>'A'), old('status'), ['id' => 'status']) }}
                        </div>
                        <div class="form-group">
                            <label for = "no_coleccion">No. Colección</label>
                            <input type="number" name="no_coleccion" id="no_coleccion"  value="{{ old('clasificacion',0) }}" min="0" max="99" />
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>

                        <a class="btn btn-info pull-right" href="{{ "/index/$id" }}">
                            Regresar
                        </a>

                        <input type="hidden" name="user_id" value="{{$user->id}}" />
                        <input type="hidden" name="cat_id" value="{{$id}}" />
                        <input type="hidden" name="idItem" value="{{$idItem}}" />
                        <input type="hidden" name="nombre" value="{{$nombre}}" />
                        <input type="hidden" name="action" value="{{$action}}" />
                        <input type="hidden" name="tipo_material" value="1" />

                    </form>
    </div>
</div>
@endsection

