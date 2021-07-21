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

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">


    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">

    <style type="text/css">
    <style type="text/css">
       .navbar-brand {
        font-family: 'Fredoka One';
        font-size: 30px;
       } 
       .navbar a.active {
        border-bottom: 3px solid salmon;
       }
       .navbar a:hover {
        border-bottom: 3px solid salmon;
       }
       body{
        font-family: 'Handlee', cursive;
       }
       a {
        font-size: 19px;
       }
    </style>
</head>
<body style="background-color:#FADBD8 ">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #D7BDE2 ">
            <div class="container">
                <div class="logo">
                     <a style="color: #F08080; " class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
             <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Indie+Flower&family=Montserrat+Subrayada:wght@700&display=swap" rel="stylesheet">
                </div>
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbar">
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


                        <li>
                            <a class="nav-link" href="{{ url('/artist')}}">Artist</a>
                        </li>

                         <li>
                            <a class="nav-link" href="{{ url('/album')}}">Album</a>
                        </li>

                         <li>
                            <a class="nav-link" href="{{ url('/tracks')}}">Tracks</a>
                        </li>

                        <li>
                            <a class="nav-link" href="{{ url('/played')}}">Played</a>
                        </li>
                    </div>


                            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                            <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                    <a class="nav-link disable" href="#"   aria-haspopup="true"><i class="fa fa-user" aria-hidden="true"></i>
                                    Hi, {{ Auth::user()->name }}<span class="caret"></span>
                                </a>

                            </li>

                            <li>
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>
                                        {{ __('Logout') }}
                                    </a>
                                </li>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                
                        
                              </ul>
                        @endguest
                  
                </div>
            </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>