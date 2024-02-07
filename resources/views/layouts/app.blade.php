<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- TomTom Map -->
    <link rel="stylesheet" type="text/css" href="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.25.0/maps/maps.css" />
    <script type="text/javascript" src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.25.0/maps/maps-web.min.js"></script>


    <!-- Fonts -->
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/40396ce4f1.js" crossorigin="anonymous"></script>
   

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app" class="h-100 d-flex flex-column">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid px-5">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <div class="logo_laravel">
                        <img class="header-logo" src="{{Vite::asset('resources/img/logo.png')}}" alt="">
                    </div>
                    {{-- config('app.name', 'MovieMansions') --}}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                {{-- <div class="collapse navbar-collapse px-5" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.buildings.index') }}">{{ __('Appartamenti') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.buildings.create') }}">{{ __('Nuovo appartamento') }}</a>
                        </li>
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('admin/dashboard') }}">{{__('Dashboard')}}</a>
                                <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
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
                </div> --}}
            </div>
        </nav>

        <main class="d-flex flex-grow-1">
            {{-- sidebar --}}
            @if(Auth::check())
            <div class="sidebar">

                {{-- profile section--}}
                <div class="profile">

                    <div class="user-container">
                        <span class="user-image">
                            <img src="{{Vite::asset('resources/img/icons/user-2.png')}}" alt="">
                        </span>
    
                        <div>
                            <span class="user-name">
                                {{ Auth::user()->name }} {{ Auth::user()->surname }}
                            </span>

                            <div class="user-role">
                                <small class="text-secondary">Host</small>
                            </div>
                        </div>
                    </div>
            
                    <div class="user-icons">
                        <span class="settings-image">
                            <a href="{{ url('profile') }}">
                                <img src="{{Vite::asset('resources/img/icons/settings.png')}}" alt="">
                            </a>
                        </span>
                    </div>
                    
                </div>
                {{-- end profile section --}}

                <div class="sidebar-nav">
                    <div class="list">
                        {{-- dashboard --}}
                        <div class="d-flex align-items-center gap-2">
                            <span>
                                <img src="{{Vite::asset('resources/img/icons/dashboard.png')}}" alt="">
                            </span>
                            <a href="{{ url('admin/dashboard') }}">
                                    <span>Dashboard</span>
                            </a>
                        </div>
                        
                        {{-- my mansions --}}
                        <div class="d-flex align-items-center gap-2">
                            <span>
                                <img src="{{Vite::asset('resources/img/icons/my-apartments.png')}}" alt="">
                            </span>
                            <a href="{{route('admin.buildings.index') }}">
                                <span class="">I miei appartamenti</span>
                            </a>
                        </div>

                        {{-- create mansion --}}

                        <div class="d-flex align-items-center gap-2">
                            <span>
                                <img src="{{Vite::asset('resources/img/icons/new-apartment.png')}}" alt="">
                            </span>
                            <a href="{{route('admin.buildings.create') }}">
                                <span class="">Nuovo appartamento</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            @endif

            <div class="main-content flex-grow-1">
                @yield('content')
            </div>
        </main>
    </div>
    @yield('javascript')
</body>

</html>
