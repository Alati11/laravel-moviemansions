@extends('layouts.app')
@section('content')

<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Profile') }}
        </h2>

        <span class="logout-image">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                {{-- <img src="{{Vite::asset('resources/img/icons/logout.png')}}" alt=""> --}}
                <button class="Btn-logout">
  
                    <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                    
                    <div class="text">Logout</div>
                  </button>
            </a>
        </span>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    
    <div class="card profile-card p-4 mb-4 shadow rounded-lg">

        @include('profile.partials.update-profile-information-form')

    </div>

    <div class="card profile-card p-4 mb-4  shadow rounded-lg">


        @include('profile.partials.update-password-form')

    </div>

    <div class="card profile-card p-4 mb-4  shadow rounded-lg">


        @include('profile.partials.delete-user-form')

    </div>
</div>

@endsection
