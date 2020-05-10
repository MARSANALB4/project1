<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '+NUTRICION') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('+NUTRICION', '+NUTRICION') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Registro</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">


                                    @if(Auth::user()->userType =='paciente')
                                        <a class="dropdown-item" href="{{ route('misObjetivos') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('misObjetivos-form').submit();">
                                            {{ __('Mis Objetivos') }}
                                        </a>

                                        <form id="misObjetivos-form" action="{{ route('misObjetivos') }}" method="GET" style="display: none;">
                                            @csrf
                                        </form>
                                        @endif
                                        @if(Auth::user()->userType =='paciente')
                                            <a class="dropdown-item" href="{{ route('misCitas') }}"
                                               onclick="event.preventDefault();
                                                         document.getElementById('misCitass-form').submit();">
                                                {{ __('Mis Citas') }}
                                            </a>

                                            <form id="misCitas-form" action="{{ route('misCitas') }}" method="GET" style="display: none;">
                                                @csrf
                                            </form>
                                        @endif

                                        @if(Auth::user()->userType =='paciente')

                                            <li>
                                                <a href="{{ url('/misObjetivos') }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('misObjetivos-form').submit();">
                                                    Mis Objetivos
                                                </a>
                                            </li>
                                            @endif
                                        @if(Auth::user()->userType =='paciente')

                                            <li>
                                                <a href="{{ url('/misCitass') }}"
                                                   onclick="event.preventDefault();
                                                    document.getElementById('misCitas-form').submit();">
                                                    Mis Citas
                                                </a>
                                            </li>
                                            @endif

                                </li>

                                <li>
                                    <a href="{{ url('/citas') }}">
                                        Citas
                                    </a>
                                </li>
                                    @if(Auth::user()->userType =='nutricionista')

                                <li>
                                    <a href="{{ url('/objetivos') }}">
                                        Objetivos
                                    </a>
                                </li>
                                <li>
                                        <a href="{{ url('/especialidades') }}">
                                            Especialidades
                                        </a>
                                </li>
                                    @endif






                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @if (count($errors) > 0)
        <div class="container">
            <div class="row ">
                <div class="alert alert-danger col-md-8 col-md-offset-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    @endif

    @yield('content')
</div>

<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
