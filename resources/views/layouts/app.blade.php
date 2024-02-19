<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MovieMansions') }}</title>

    <!-- TomTom Map -->
    <link rel="stylesheet" type="text/css" href="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.25.0/maps/maps.css" />
    <script type="text/javascript" src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.25.0/maps/maps-web.min.js"></script>


    <!-- Fonts -->
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/40396ce4f1.js" crossorigin="anonymous"></script>

    {{-- BrainTree --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.42.0/js/dropin.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
   
    {{-- chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app" class="h-100 d-flex flex-column">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm header py-0">
            <div class="container-fluid">
                @if(Auth::check())
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <div class="logo_laravel">
                        <img class="header-logo" src="{{Vite::asset('resources/img/logo.png')}}" alt="">
                    </div>
                    {{-- config('app.name', 'MovieMansions') --}}
                </a>
                @else
                <a class="navbar-brand d-flex align-items-center" href="{{ route('login') }}">
                    <div class="logo_laravel">
                        <img class="header-logo" src="{{Vite::asset('resources/img/logo.png')}}" alt="">
                    </div>
                    {{-- config('app.name', 'MovieMansions') --}}
                </a>
                @endif

                @if(!Auth::check())
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @endif

                <div class="collapse navbar-collapse px-5 justify-content-end" id="navbarSupportedContent">
                   
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto d-flex flex-row gap-3 py-3 justify-content-center">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link nav-collapse-btn" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link nav-collapse-btn" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                        </li>
                        @endif
                        @endguest
                    </ul>
                </div>

                <div class="header-image">
                    <img src="{{Vite::asset('resources/img/header-house.png')}}" alt="">
                </div>
            </div>
        </nav>

        <main class="d-flex flex-grow-1">
            {{-- sidebar --}}
            @if(Auth::check())
            <div class="sidebar flex-shrink-0"> 
                <div class="content-wrapper">
                    {{-- profile section--}}
                    <div class="profile">

                        <div class="user-container">
                            <span class="user-image">
                                {{-- <img src="{{Vite::asset('resources/img/icons/user-2.png')}}" alt=""> --}}
                                @if (isset(Auth::user()->profile_pic))
                                    <img src="{{asset('storage/'.Auth::user()->profile_pic)}}" class="profile-user-image">
                                @else
                                    <img src="{{Vite::asset('resources/img/icons/user-3.png')}}">
                                @endif
                                
                            </span>
        
                            <div>
                                <span class="user-name">
                                    {{ Auth::user()->name }} {{ Auth::user()->surname }}
                                </span>
    
                                <div class="user-role">
                                    <small class="text-light">Host</small>
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
                            <a href="{{ url('admin/dashboard') }}">
                                <div class="d-flex align-items-center gap-2 nav-item">
                                    <span>
                                        <img src="{{Vite::asset('resources/img/icons/dashboard.png')}}" alt="">
                                    </span>

                                    <span class="sidebar-text-ind">Dashboard</span>
                                </div>
                            </a>
                            
                            {{-- my mansions --}}
                            <a href="{{route('admin.buildings.index') }}">
                                <div class="d-flex align-items-center gap-2 nav-item">
                                    <span>
                                        <img src="{{Vite::asset('resources/img/icons/my-apartments.png')}}" alt="">
                                    </span>
                                
                                    <span class="sidebar-text-ind">I miei immobili</span>
                                </div>
                            </a>
    
                            {{-- create mansion --}}
    
                            <a href="{{route('admin.buildings.create') }}">
                                <div class="d-flex align-items-center gap-2   nav-item">
                                    <span>
                                        <img src="{{Vite::asset('resources/img/icons/new-apartment.png')}}" alt="">
                                    </span>
                                
                                    <span class="sidebar-text-ind">Nuovo immobile</span>
                                </div>
                            </a>

                            {{-- messages --}}
                            <a href="{{route('admin.messages.index')}}">
                                <div class="d-flex align-items-center gap-2   nav-item">
                                    <span>
                                        <img src="{{Vite::asset('resources/img/icons/messages.png')}}" alt="">
                                    </span>
                                
                                    <span class="sidebar-text-ind">Messaggi</span>
                                </div>
                            </a>

                        </div>
                    </div>

                    {{-- Sponsorships --}}
                    {{-- <a href="{{route('admin.sponsorships.index')}}">
                        <div class="sponsorships nav-item">
                            <span>
                                <img src="{{Vite::asset('resources/img/icons/sponsorship.png')}}" alt="">
                            </span>
                        
                            <span>Sponsorizza il tuo immobile</span>
                        </div>
                    </a> --}}
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
