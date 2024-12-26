<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="m-3" style="background-color: #9A616D;">
    <div id="app" class="w-100">
        <div class="d-flex">
            @auth
            <div class="sidebar bg-light text-dark fs-5 col-md-2 p-3" style="position: absolute; top: 0; left: 0; height: 100%; overflow-y: auto;">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-dark border rounded-4 m-1" href="{{ url('/profile/manage') }}">Manage Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark border rounded-4 m-1" href="{{ url('/rooms/create') }}">Host A Room</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark border rounded-4 m-1" href="{{ url('/rooms/manage') }}">Manage Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark border rounded-4 m-1" href="{{ url('/rooms/view') }}">Book A Room</a>
                    </li>
                </ul>
            </div>
            @endauth

            <div class="col-md-10 main-content mx-auto">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm rounded-4">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
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
        </div>
    </div>
</body>
</html>
