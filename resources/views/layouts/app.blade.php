<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css_/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/ace-fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/my_style_sheet.css') }}" rel="stylesheet">


    <style>

        ul.role-list-hrz {
            list-style-type: none;
            padding: 0;
            overflow: hidden;
            background-color: #333333;
        }

        ul.role-list-hrz li {
            float: left;
            margin: 0.5em;
        }

        ul.role-list-hrz li a {
            display: block;
            color: white;
            text-align: center;
            padding: 16px;
            text-decoration: none;
        }

        .role-list-hrz li a:hover {
            background-color: #111111;
        }

    </style>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    {{--<script defer src="{{ asset('js/fontawesome/fontawesome-all.js') }}"></script>--}}
    {{--<script defer src="{{ asset('js/fontawesome/fa-v4-shim.js') }}"></script>--}}

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fas fa-book blue"></i>  {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto pull-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Regístrate</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a  class="dropdown-item" href="{{ route('edit') }}"><i class="far fa-address-card"></i> Perfil</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() { init(); });
        function init() {
            $("#preloaderGlobal").hide();

            if ( $("#titulo_catalogo") ){
                        @if ( isset($titulo_catalogo) )
                var titulo = "{{ $titulo_catalogo}}";
                $("#titulo_catalogo").html(titulo);
                @endif
            }

            if ( $(".btnAction2") ){
                $('.btnAction2').on('click', function(event) {
                    event.preventDefault();
                    var aID = event.currentTarget.id.split('-');
                    var x = confirm("Desea eliminar el registro: "+aID[1]);
                    if (!x){
                        return false;
                    }
                    $(function() {
                        $.ajax({
                            method: "GET",
                            url: aID[5]+aID[1]+"/"+aID[1]+"/"+aID[4]
                        })
                            .done(function( response ) {
                                window.location.href = '/index/'+aID[3];
                            });
                    });
                });
            }

        }

    </script>
</body>
</html>
