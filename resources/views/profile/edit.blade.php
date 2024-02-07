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
                    <img src="{{Vite::asset('resources/img/icons/logout.png')}}" alt="">
            </a>
        </span>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    
    <div class="card p-4 mb-4 bg-white shadow rounded-lg">

        @include('profile.partials.update-profile-information-form')

    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">


        @include('profile.partials.update-password-form')

    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">


        @include('profile.partials.delete-user-form')

    </div>
</div>

@endsection
