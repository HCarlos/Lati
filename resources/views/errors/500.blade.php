@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="center-block">
                <h2 class="text-center">Esto ha fallado.</h2>
                <img src="{{asset('assets/img/error-500.png')}}" />
                <p class="text-center">Nuestros ingenieros ya estan trabajando en la falla.</p>
            </div>
        </div>
    </div>
@endsection
