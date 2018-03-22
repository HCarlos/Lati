@extends('home')

@section('content_form_permisions')
<div class="panel panel-primary" id="frmEdit0">
    <div class="panel-heading">
            <span><strong>{{ ucwords($titulo) }}</strong> | Editando registro {{$idItem}}
                <a class="btn btn-info btn-xs pull-right" href="#" onclick="javascript:window.close();">
                   Cerrar
                </a>
            </span>
    </div>

    <div class="panel-body">
                    <form method="post" action="{{ action('Catalogos\EditorialController@update',['editorial'=>$items]) }}">
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
                            <label for = "editorial" class="col-md-2 col-form-label text-md-right">Editorial</label>
                            <div class="col-md-10">
                                <input type="text" name="editorial" value="{{ old('editorial',$items->editorial) }}" class="col-md-12" autofocus />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for = "representante" class="col-md-2 col-form-label text-md-right">Representante</label>
                            <div class="col-md-10">
                                <input type="text" name="representante"  value="{{ old('representante',$items->representante) }}" class="col-md-12"/>
                            </div>
                        </div>
                        <div>
                            <label class="col-md-2 col-form-label text-md-right"></label>
                            <div class="col-md-8" >
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                            {{--<a class="btn btn-info float-md-right " href="{{ "/index/$id" }}">--}}
                            <a class="btn btn-info float-md-right " href="#" onclick="javascript:window.close();">
                                Cerrar
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

