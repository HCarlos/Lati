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
                        <div class="form-group row">
                            <label for = "nombre_completo" class="col-md-2 col-form-label text-md-right">Nombre Completo</label>
                            <div class="col-md-10">
                                <input type="text" name="nombre_completo" value="{{ old('nombre_completo',$items->nombre_completo) }}" class="col-md-12" required autofocus />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for = "twitter" class="col-md-2 col-form-label text-md-right">Twitter</label>
                            <div class="col-md-10">
                                <input type="text" name="twitter"  value="{{ old('twitter',$items->twitter) }}" class="col-md-12"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for = "facebook" class="col-md-2 col-form-label text-md-right">Facebook</label>
                            <div class="col-md-10">
                                <input type="text" name="facebook"  value="{{ old('facebook',$items->facebook) }}" class="col-md-12"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for = "instagram" class="col-md-2 col-form-label text-md-right">Instagram</label>
                            <div class="col-md-10">
                                <input type="text" name="instagram"  value="{{ old('instagram',$items->instagram) }}" class="col-md-12"/>
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
                        <input type="hidden" name="no" value="0{{$user->no}}" />

                    </form>
    </div>
</div>
@endsection

