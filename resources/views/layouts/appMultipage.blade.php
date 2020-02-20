@php
$pageName = Request::route()->getName();
$pages=[
    ['name'=>'','bjuti'=>'Főoldal'],
    ['name'=>'about','bjuti'=>'Rólunk'],
    ['name'=>'menu','bjuti'=>'Menü'],
    ['name'=>'gallery','bjuti'=>'Galéria'],
    ['name'=>'event','bjuti'=>'Rendezvény'],
    ['name'=>'contact','bjuti'=>'Kapcsolat']
];
$bjutiName='';
foreach ($pages as $page)
{
    if($page['name'] == $pageName) {$bjutiName = $page['bjuti'];}
}

@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Utasellátó Kávéház {{ $bjutiName }}</title>

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
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
                <a class="navbar-brand {{ ($pageName == '') ? 'navbar-brand__active' : ''}}" href="{{ url('/') }}"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Public Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @for ($i = 1; $i < count($pages); $i++)
                        <li class="nav-item {{ ($pageName == $pages[$i]['name']) ? 'active' : ''}}">
                            <a class="nav-link" href="{{ url('/'.$pages[$i]['name']) }}">{{ $pages[$i]['bjuti'] }}
                                @if ($pageName == $pages[$i]['name'])
                                <span class="sr-only">(current)</span>
                                @endif
                            </a>
                        </li>
                        @endfor
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

        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>
