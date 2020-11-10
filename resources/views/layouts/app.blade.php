<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">     -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap_table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jqueryConfirm.css') }}" defer>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery_dataTables.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap_dataTables.js') }}" defer></script>
    <script src="{{ asset('js/jqueryConfirm.js') }}" defer></script>

    @yield('footer_for_dataTable')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a  class="nav-link" href="{{ route('stockcount')}}">Menu</a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a  id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('stockcount')}}">Brand</a>
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Brand</a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('stockcount')}}" onclick="event.preventDefault();
                                                     document.getElementById('stockcountOP-form').submit();">
                                    {{ __('OP') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('stockcount')}}" onclick="event.preventDefault();
                                                     document.getElementById('stockcountCPS-form').submit();">
                                    {{ __('CPS') }}
                                </a>
                                <form id="stockcountCPS-form" action="{{ route('stockcount')}}" method="get" class="d-none">
                                    @csrf
                                    <input type="hidden" name="cps" id="cps" value="cps">
                                </form>
                                <form id="stockcountOP-form" action="{{ route('stockcount')}}" method="get" class="d-none">
                                    @csrf
                                    <input type="hidden" name="op" id="op" value="op">
                                </form>
                            </div>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
</body>

</html>
@yield('script')