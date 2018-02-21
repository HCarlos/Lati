@extends('home')

@section('content_form_permisions')

    <div class="panel-heading">
            <span><strong>{{ ucwords($titulo) }}</strong> | Nuevo Registro
                <a class="btn btn-info btn-xs pull-right" href="{{ "/index/$id" }}">
                    Regresar
                </a>
            </span>
    </div>

    <div class="panel-body">
                    <form method="post" action="{{ action('Catalogos\EditorialController@store') }}">
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
                            <label for = "editorial">Editorial</label>
                            <input type="text" name="editorial" value="" />
                        </div>
                        <div class="form-group">
                            <label for = "representante">Representante</label>
                            <input type="text" name="representante"  value="" />
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
                        <input type="hidden" name="no" value="0" />

                    </form>
    </div>
@endsection

