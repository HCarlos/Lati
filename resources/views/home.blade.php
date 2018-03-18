@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span>Catálogos</span>
                        <a class="btn btn-link pull-right white" role="button" data-toggle="collapse" href="#dvCatalogos0" aria-expanded="false" aria-controls="dvCatalogos0">
                            <i class="fas fa-angle-down text-white"></i>
                        </a>
                    </div>
                    @include('catalogos.side_bar_left')
                </div>
                @if(Auth::user()->hasRole('administrator|system_operator'))
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span>Configuraciones</span>
                        <a class="btn btn-link pull-right white" role="button" data-toggle="collapse" href="#dvConfig0" aria-expanded="false" aria-controls="dvConfig0">
                            <i class="fas fa-angle-down text-white"></i>
                        </a>
                    </div>
                    @include('catalogos.side_bl_config')
                </div>
                @endif
                @admin
                <a href="{{ route('admin_dashboard') }}">Dashboard</a>
                @endadmin

            </div>

            <div class="col-md-9">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if( Request::path() === 'home')
                    <div class="row col-md-12" id="divWelcomeDashboard0">
                        <div class="center-block">
                            <img src="{{asset('assets/img/biblioteca_virtual_logo_1.png')}}" />
                        </div>
                    </div>
                @endif
                @yield('content_catalogo')
                @yield('content_form_permisions')
            </div>

        </div>
    </div>
@endsection
