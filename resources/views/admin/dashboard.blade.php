@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-secondary my-4 dash-title">
        {{ __('Benvenuto nel tuo pannello di controllo!') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card card-dash">
                <div class="card-header-dash card-title-dash"> <b>{{ __('In questa sezione puoi') }}</b></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                        {{-- {{ __('Benvenuto nel tuo pannello di controllo!') }} --}}

                    <div class="d-flex card-option">
                        <p class="card-text">Modificare le impostazioni del tuo profilo &RightArrow;</p>
                        <span class="dash-icon">
                            <a href="{{ url('profile') }}">
                                <img class="icon" src="{{Vite::asset('resources/img/icons/settings.png')}}" alt="">
                            </a>
                        </span>
                    </div>

                    <div class="d-flex card-option">
                        <p class="card-text">Visualizzare i tuoi immobili e le relative informazioni &RightArrow;</p>
                        <span class="dash-icon">
                            <a href="{{route('admin.buildings.index') }}">
                                <img class="icon" src="{{Vite::asset('resources/img/icons/my-apartments.png')}}" alt="">
                            </a>
                        </span>
                    </div>

                    <div class="d-flex card-option">
                        <p class="card-text">Inserire nuovi immobili  &RightArrow;</p>
                        <span class="dash-icon">
                            <a href="{{route('admin.buildings.create') }}">
                                <img class="icon" src="{{Vite::asset('resources/img/icons/new-apartment.png')}}" alt="">
                            </a>
                        </span>
                    </div>

                    <div class="d-flex card-option">
                        <p class="card-text">Vedere chi ti ha contattato  &RightArrow;</p>
                        <span class="dash-icon">
                            <a href="{{route('admin.messages.index')}}">
                                <img class="icon" src="{{Vite::asset('resources/img/icons/messages.png')}}" alt="">
                            </a>
                        </span>
                    </div>

                    <div class="d-flex card-option">
                        <p class="card-text">Sponsorizzare il tuo immobile  &RightArrow;</p>
                        <span class="dash-icon">
                            <a href="#">
                                <img class="icon" src="{{Vite::asset('resources/img/icons/sponsorship.png')}}" alt="">
                            </a>
                        </span>
                    </div>

                  

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
