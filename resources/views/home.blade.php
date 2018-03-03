@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">Catálogos</div>

                    <div class="panel-body list-group">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('catalogos.side_bar_left')

                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">Configuracioes</div>

                    <div class="panel-body list-group">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('catalogos.side_bl_config')

                    </div>
                </div>
                @role('administrator')
                    <div>Acceso como Administrador</div>
                @else
                    <div>Acceso usuario</div>
                @endrole

            </div>

            <div class="col-md-9">
                    @yield('content_catalogo')
                    @yield('content_form_permisions')
            </div>

        </div>
    </div>
@endsection
