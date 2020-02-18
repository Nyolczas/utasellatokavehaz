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
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">logo</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Public Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ (\Request::route()->getName() == 'about') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ url('/about') }}">Rólunk <span
                                    class="sr-only">{{ (\Request::route()->getName() == 'about') ? '(current)' : ''}}</span></a>
                        </li>
                        <li class="nav-item {{ (\Request::route()->getName() == 'menu') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ url('/menu') }}">Menü <span
                                    class="sr-only">{{ (\Request::route()->getName() == 'menu') ? '(current)' : ''}}</span></a>
                        </li>
                        <li class="nav-item {{ (\Request::route()->getName() == 'gallery') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ url('/gallery') }}">Galéria <span
                                    class="sr-only">{{ (\Request::route()->getName() == 'gallery') ? '(current)' : ''}}</span></a>
                        </li>
                        <li class="nav-item {{ (\Request::route()->getName() == 'event') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ url('/event') }}">Rendezvényszervezés <span
                                    class="sr-only">{{ (\Request::route()->getName() == 'event') ? '(current)' : ''}}</span></a>
                        </li>
                        <li class="nav-item {{ (\Request::route()->getName() == 'contact') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ url('/contact') }}">Kapcsolat <span
                                    class="sr-only">{{ (\Request::route()->getName() == 'contact') ? '(current)' : ''}}</span></a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->
                        @guest

                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
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
