@extends('layouts.app')

@section('content')
    <section>
        <div class="container d-flex flex-column align-items-center">
            <h2 class="text-secondary py-4">
                Sponsorizzazioni 
                <span class="sponsor-index-img">
                    <img src="{{Vite::asset('resources/img/icons/sponsorship.png')}}" alt="">
                </span>
            </h2>

            <p class="under-title-sponsorships">
                Scegli la <b>sponsorizzazione</b> ideale per te! <br>
                Il tuo immobile sarà sempre nei primi risultati delle ricerche degli utenti e andando nella sezione apposita delle <b>visite</b> vedrai che sono schizzate alle <b>stelle</b>! <i class="fa-regular fa-face-grin-stars"></i> 
            </p>
        </div>

        <div class="container d-flex gap-5 py-5">
            @foreach ($sponsorships as $sponsorship)
            <div class="card mb-3 sponsor-card" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4 d-flex align-items-center p-2">
                    <img src="{{Vite::asset($sponsorship->thumb)}}" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h4 class="card-title">{{$sponsorship->name}}</h4>
                      <p>${{$sponsorship->price}}</p>
                      <p class="card-text"> 
                        <small>Durata sponsorizzazione: {{$sponsorship->duration}} ore</small>
                      </p>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center py-2">
                    <button class="register-btn">Scegli</button>
                  </div>
                </div>
              </div>
            @endforeach
        </div>
    </section>
@endsection

