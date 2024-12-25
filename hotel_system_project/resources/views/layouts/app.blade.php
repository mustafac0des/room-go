<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body, html {
            margin: 0;
            padding: 0;

            height: 100%;
        }

        #app {
            height: 100%;
        }

        /* Sidebar styles */
        .sidebar {
            height: 100vh;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            padding: 1rem; /* Adjust padding for sidebar */
        }

        /* Ensuring no margin or padding between the navbar and sidebar */
        .navbar {
            margin-bottom: 0; /* Remove any bottom margin */
        }

        .main-content {
            padding: 1rem; /* Adjust padding for main content */
        }

        /* Flexbox to align sidebar and content */
        .d-flex {
            display: flex;
        }

        .col-md-2 {
            flex: 0 0 16.6667%; /* Sidebar takes up 1/6th of the width */
            max-width: 16.6667%;
        }

        .col-md-10 {
            flex: 0 0 83.3333%; /* Content takes up the remaining space */
            max-width: 83.3333%;
        }
    </style>
</head>
<body style="background-color: #9A616D;">
    <div id="app">
        <div class="d-flex">
            @auth
            <div class="sidebar bg-light text-dark fs-5 col-md-2 p-3" >
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

            <div class="col-md-10 main-content">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="border-radius: 1rem;">
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
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
