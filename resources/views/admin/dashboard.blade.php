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
                            <img class="icon" src="{{Vite::asset('resources/img/icons/settings.png')}}" alt="">
                        </span>
                    </div>

                    <div class="d-flex card-option">
                        <p class="card-text">Visualizzare i tuoi immobili e le relative informazioni &RightArrow;</p>
                        <span class="dash-icon">
                            <img class="icon" src="{{Vite::asset('resources/img/icons/my-apartments.png')}}" alt="">
                        </span>
                    </div>

                    <div class="d-flex card-option">
                        <p class="card-text">Inserire nuovi immobili  &RightArrow;</p>
                        <span class="dash-icon">
                            <img class="icon" src="{{Vite::asset('resources/img/icons/new-apartment.png')}}" alt="">
                        </span>
                    </div>

                    <div class="d-flex card-option">
                        <p class="card-text">Sponsorizzare il tuo immobile  &RightArrow;</p>
                        <span class="dash-icon">
                            <img class="icon" src="{{Vite::asset('resources/img/icons/sponsorship.png')}}" alt="">
                        </span>
                    </div>

                    <div class="d-flex card-option">
                        <p class="card-text">Vedere chi ti ha contattato  &RightArrow;</p>
                        <span class="dash-icon">
                            <img class="icon" src="{{Vite::asset('resources/img/icons/messages.png')}}" alt="">
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
