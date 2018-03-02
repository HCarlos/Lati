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
                    <form method="post" action="{{ action('Catalogos\UsuarioController@update',['usr'=>$items]) }}">
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
                        <div class="form-group">
                            <label for = "nombre_completo">Nombre Completo</label>
                            <input type="text" name="nombre_completo" value="{{ old('nombre_completo',$items->nombre_completo) }}" required autofocus />
                        </div>
                        <div class="form-group">
                            <label for = "twitter">Twitter</label>
                            <input type="text" name="twitter"  value="{{ old('twitter',$items->twitter) }}"  />
                        </div>
                        <div class="form-group">
                            <label for = "facebook">Facebook</label>
                            <input type="text" name="facebook"  value="{{ old('facebook',$items->facebook) }}"  />
                        </div>
                        <div class="form-group">
                            <label for = "instagram">Instagram</label>
                            <input type="text" name="instagram"  value="{{ old('instagram',$items->instagram) }}"  />
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
                        <input type="hidden" name="action" value="{{$action}}" />
                        <input type="hidden" name="no" value="0{{$user->no}}" />

                    </form>
    </div>
</div>
@endsection

