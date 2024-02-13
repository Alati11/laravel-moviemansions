@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h2 class="text-secondary py-4">
                Sponsorizzazioni 
                <span class="sponsor-index-img">
                    <img src="{{Vite::asset('resources/img/icons/sponsorship.png')}}" alt="">
                </span>
            </h2>
        </div>

        <div class="container d-flex gap-5 py-5">
            @foreach ($sponsorships as $sponsorship)
            <div class="card mb-3" style="max-width: 540px;">
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
                </div>
              </div>
            @endforeach
        </div>
    </section>
@endsection

