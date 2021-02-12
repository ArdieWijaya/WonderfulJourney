<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>
    <div class="title-top">
        <div class="title-top-text">
            <h1 style="text-align: center; font-size: 48pt">Wonderful Journey</h1>
            <h3 style="text-align: center; font-size: 14pt">Blog of Indonesian Tourism</h3>
        </div>
    </div>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <div class="container">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @guest
                    <a class="nav-link text-white mr-2" href="{{ route('homepage') }}">Home</a>

                    <li class="nav-item dropdown text-white mr-2">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Category
                        </a>
                        <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown">
                            @foreach($categories as $category)
                            <a class="dropdown-item text-white" href="/category/{{ $category->id }}">
                                {{ $category->name }}
                            </a>
                            @endforeach
                        </div>
                    </li>

                    <a class="nav-link text-white mr-2" href="{{ route('aboutus') }}">About Us</a>
                    @endguest

                    @if(Auth::check())
                    @if((Auth::user()->role == 'Admin'))
                    <a class="nav-link text-white mr-2" href="{{ route('homepage') }}">Home</a>
                    <a class="nav-link text-white mr-2" href="/">Admin</a>
                    <a class="nav-link text-white mr-2" href="{{ route('adminuser') }}">User</a>
                    @endif
                    @if((Auth::user()->role == 'User'))
                    <a class="nav-link text-white mr-2" href="{{ route('homepage') }}">Home</a>
                    <a class="nav-link text-white mr-2" href="{{ route('userprofile') }}">Profil</a>
                    <a class="nav-link text-white mr-2" href="{{ route('userblog') }}">Blog</a>
                    @endif
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('register') }}"><i class="fa fa-user mr-2" aria-hidden="true"></i>{{ __('Sign Up') }}</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}"><i class="fa fa-sign-in mr-2" aria-hidden="true"></i>{{ __('Login') }}</a>
                    </li>
                    @else
                    <li class="nav-item dropdown text-white">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-in mr-2" aria-hidden="true"></i>
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
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>