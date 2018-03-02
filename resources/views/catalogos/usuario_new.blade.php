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
                    <form method="post" action="{{ action('Catalogos\UsuarioController@create') }}">
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
                            <label for = "name">Username</label>
                            <input type="text" name="name" value="{{ old('name') }}" required autofocus />
                        </div>
                        <div class="form-group">
                            <label for = "email">Email</label>
                            <input type="email" name="email"  value="{{ old('email') }}" required />
                        </div>
                        <div class="form-group">
                            <label for = "password">Password</label>
                            <input type="password" name="password"  value="" required />
                        </div>
                        <div class="form-group">
                            <label for = "password_confirmation">Re-password</label>
                            <input type="password" name="password_confirmation"  value="" required />
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
                        <input type="hidden" name="no" value="0" />

                    </form>
    </div>
</div>
@endsection

