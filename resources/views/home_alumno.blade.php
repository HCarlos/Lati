@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref">
        <div class="row">
            <div class="content col-md-12">
                <img src="{{asset('assets/img/biblioteca_virtual_logo_1.png')}}" /><br/>
                <form method="post" class="form form-inline" action="#">
                    {{ csrf_field() }}
                    <div class="form-group col-md-12">
                        <input type="text" name="searchWords" placeholder="Realizar búsqueda por palabras: ALGEBRA TRIGONOMETRIA" class="form-control col-md-12" style="width: 92%;"/>
                        <button type="submit" class="btn btn-info btn-sm form-actions "><i class="fas fa-search"></i></button>
                        <span id="helpBlock" class="help-block text-left">Puede buscar: TÍTULO ó AUTOR ó ISBN</span>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
