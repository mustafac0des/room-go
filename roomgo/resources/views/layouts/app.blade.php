<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
<body class="m-3" style="background-color: #9A616D;">
    <div id="app" class="w-100">
        <div class="d-flex">
            <div class="col-md-10 main-content mx-auto">
                <nav class="navbar navbar-expand-md bg-light shadow-lg rounded-4">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            Room<i style="color: #9A616D;">GO</i>
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
                                    <li class="nav-item dropdown d-flex align-items-center gap-1">
                                        <img class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;" src="data:image/jpeg;base64,{{ base64_encode(string: Auth::user()->picture) }}" alt="">
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
                <div class="d-flex">
                    @auth
                        <div class="sidebar text-dark fs-5 col-md-2 p-3">
                            <ul class="nav flex-column">
                                @if(Auth::user()->role == 'user')
                                    <li class="nav-item">
                                        <a class="nav-link shadow-lg bg-light border border-warning rounded-4 m-1" style="color: #9A616D;" href="{{ url('/profile/manage') }}">Manage Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link shadow-lg bg-light border-warning border rounded-4 m-1" style="color: #9A616D;" href="{{ url('/rooms/create') }}">Host A Room</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link shadow-lg bg-light border border-warning rounded-4 m-1" style="color: #9A616D;" href="{{ url('/rooms/manage') }}">Manage Rooms</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link shadow-lg bg-light border border-warning rounded-4 m-1" style="color: #9A616D;" href="{{ url('/rooms/view') }}">Book A Room</a>
                                    </li>
                                    <li class="nav-item" onclick="window.location='{{ route('chat.index') }}'">
                                        <a class="nav-link shadow-lg bg-light border border-warning rounded-4 m-1" style="color: #9A616D;">Go to ChatGPT</a>
                                    </li>
                                @endif
                                @if(Auth::user()->role == 'admin')
                                    <li class="nav-item">
                                        <a class="nav-link shadow-lg bg-light border border-warning rounded-4 m-1" style="color: #9A616D;" href="{{ url('/admin/users') }}">Manage Users</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link shadow-lg bg-light border border-warning rounded-4 m-1" style="color: #9A616D;" href="{{ url('/admin/rooms') }}">Manage Rooms</a>
                                    </li>
                                    </li>
                                    <li class="nav-item" onclick="window.location='{{ route('chat.index') }}'">
                                        <a class="nav-link shadow-lg bg-light border border-warning rounded-4 m-1" style="color: #9A616D;">Go to ChatGPT</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @endauth
                    <main class="w-100 py-4">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
