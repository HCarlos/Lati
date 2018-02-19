@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Perfil | {{$user->name}}</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('Edit') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('nombre_completo') ? ' has-error' : '' }}">
                                <label for="nombre_completo" class="col-md-4 control-label">Nombre Completo</label>
                                <div class="col-md-6">
                                    <input id="nombre_completo" type="text" class="form-control" name="nombre_completo" value="{{ $user->nombre_completo }}" required autofocus>
                                    @if ($errors->has('nombre_completo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nombre_completo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                                <label for="twitter" class="col-md-4 control-label">Twitter</label>
                                <div class="col-md-6">
                                    <input id="twitter" type="text" class="form-control" name="twitter" value="{{ $user->twitter }}"  >
                                    @if ($errors->has('twitter'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('twitter') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                                <label for="facebook" class="col-md-4 control-label">Facebbok</label>
                                <div class="col-md-6">
                                    <input id="facebook" type="text" class="form-control" name="facebook" value="{{ $user->facebook }}"  >
                                    @if ($errors->has('facebook'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('facebook') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('instagram') ? ' has-error' : '' }}">
                                <label for="instagram" class="col-md-4 control-label">Instagram</label>
                                <div class="col-md-6">
                                    <input id="instagram" type="text" class="form-control" name="instagram" value="{{ $user->instagram }}"  >
                                    @if ($errors->has('instagram'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('instagram') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{$user->id}}" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
