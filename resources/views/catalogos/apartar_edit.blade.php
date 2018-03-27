@extends('home')

@section('content_form_permisions')
<div class="panel panel-primary" id="frmEdit0">
    <div class="panel-heading">
        <span><strong>{{ ucwords($titulo) }}</strong> | ELEMENTOS APARTADOS {{$idItem}}
            <a class="btn btn-info btn-xs pull-right" href="#" onclick="javascript:window.close();">
                   Cerrar
            </a>
        </span>
    </div>

    <div class="panel-body">
                    <form method="post" action="{{ action('Catalogos\FichaController@prestar',['oFicha'=>$items]) }}">
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
                            <label for = "fecha_apartado" class="col-md-2 col-form-label text-md-right">Fecha Apartado</label>
                            <div class="col-md-10">
                                <input type="date" name="fecha_apartado" id="fecha_apartado" value="{{ old('fecha_apartado',$items->fecha_apartado) }}" class="col-md-3" disabled />
                                <span class="bg-seagreen-lati-bib pull-right">{{$items->isPrestado() ? 'Prestado': ''}}</span>
                                <span class="bg-coral-lati-bib pull-right">{{$items->isApartado() ? 'Apartado': ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for = "usuario_apartado" class="col-md-2 col-form-label text-md-right">Usuario</label>
                            <div class="col-md-10">
                                <input type="text" name="usuario_apartado" id="usuario_apartado" value="{{ $otrosDatos->nombre_completo }}" class="col-md-12" disabled/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for = "fecha_salida" class="col-md-2 col-form-label text-md-right">Fecha Salida</label>
                            <div class="col-md-10">
                                {{ Form::date('fecha_salida', \Carbon\Carbon::now(), ['id'=>'fecha_salida','class'=>'col-md-3']) }}
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
                            {{--<label class="col-md-2 col-form-label text-md-right"></label>--}}
                            <div class="col-md-8" >
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>

                            {{--<a class="btn btn-info float-md-right " href="{{ "/index/$id" }}">--}}
                                {{--Regresar--}}
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

