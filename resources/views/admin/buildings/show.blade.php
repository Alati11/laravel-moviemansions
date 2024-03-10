@extends('layouts.app')

@section('content')
    <section>
        @if(session()->has('message_create'))
            <div class="container p-2 w-50 mx-auto">
                <div class="alert alert-success text-center">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session()->get('message_create') }}
                </div>
            </div>
        @elseif(session()->has('message_edit'))
            <div class="container p-2 w-50 mx-auto">
                <div class="alert alert-success text-center">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session()->get('message_edit') }}
                </div>
            </div>
        @endif
        <div class="container">

           

            <div class="row justify-content-center">
                <div class="col">
                    <div class="card card-show mx-auto my-5">

                        <div class="card-header card-header-show card-title">

                            <div>
                                <b>{{$building->title}}</b>
                            </div>

                            <div class="icons-show-header">
                                <div>
                                    <a href="{{route('admin.visits.show', $building->id)}}">
                                        <i class="fa-solid fa-square-poll-vertical" title="Visualizza Statistiche">
                                        </i>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
        
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
        
                            
        
                            <div class="d-flex card-option">
                                <div class="row flex-wrap justify-content-between fix-m">
                                    <div class="col-12 col-sm-8 d-flex my-4">
                                        <img class="img-fluid rounded img-show-cover" src="{{ asset('storage/'. $building->image)}}" alt="">
                                    </div>
                                     
                                    <div class="col-12 col-sm-4 overflow-y-auto scrollable-column text-center">
                                        @foreach($building->images as $image)
                                            <img class="img-plus rounded img-show-cover my-4" src="{{ asset('storage/'. $image->url)}}" alt="">
                                        @endforeach
                                    </div>
                                
                                </div>
                            </div>


                            {{-- corpo show card --}}
                            <div class="card-option pt-4 ">

                                <div class="show-info d-flex flex-column align-items-center">

                                    {{-- indirizzo --}}
                                    <div class="py-4 border position-relative mb-5 w-75 px-2">
                                        <span class="text-address fw-bolder position-absolute top-0 start-50 translate-middle bg-white px-2">
                                            <i class="fa-solid fa-map-pin text-secondary d-none d-sm-inline"></i> Indirizzo
                                        </span>
    
                                        <p class="text-center">
                                             {{$building->address}}
                                        </p>
                                        
                                    </div>
                                    
                                   <div class="py-3 border position-relative w-75 px-2 mb-5">

                                        <span class="text-description fw-bolder position-absolute top-0 start-50 translate-middle bg-white px-2">
                                            <i class="fa-solid fa-comment-dots text-secondary d-none d-sm-inline"></i> Descrizione dell'edificio 
                                        </span> 

                                        <p class="text-center mt-2"> {{$building->description}}
                                        </p>

                                   </div>

                                   {{-- numero stanze ecc --}}
                                    <div class="py-3 border position-relative w-75 px-2 mb-5">
                                        
                                            <span class="text-address fw-bolder position-absolute top-0 start-50 translate-middle bg-white px-2 text-nowrap">
                                                <i class="fa-solid fa-clipboard text-secondary d-none d-sm-inline"></i> 
                                                Lo spazio 
                                            </span>
    
                                        <div class="d-flex flex-column gap-3 ps-sm-5 text-center text-sm-start">
                
                                            <span>
                                                <b class="color-green">Numero stanze:</b> {{$building->rooms}}
                                            </span>
                
                                            <span >
                                                <b class="color-green">Numero bagni:</b> {{$building->bathrooms}}
                                            </span>
    
                                            <span>
                                                <b class="color-green">Numero letti:</b> {{$building->beds}}
                                            </span>
                
                                            <span>
                                                <b class="color-green">Metri quadrati:</b> {{$building->sqm}}
                                            </span>
                
                                        </div>
                                    </div>

                                    {{-- available --}}
                                    <div class="py-3 border position-relative w-75 px-2 mb-5">

                                        <span class="text-address fw-bolder position-absolute top-0 start-50 translate-middle bg-white px-2">
                                            <i class="fa-solid fa-circle-exclamation text-secondary d-none d-sm-inline"></i>
                                            Dispondibilità
                                        </span>
                                                    
                                        <div class="text-center ps-sm-5 text-sm-start">
                                            @if ($building->available)
                                                <span>Disponibile</span>
                                            @else
                                                <span>Non disponibile</span>
                                            @endif
                                        </div>

                                    </div>
                                
                                    {{-- servizi --}}
                                    <div class="py-4 border position-relative w-75 px-2 mb-5">

                                        <span class="text-address fw-bolder position-absolute top-0 start-50 translate-middle bg-white px-2">
                                            <i class="fa-solid fa-bell-concierge text-secondary d-none d-sm-inline"></i>
                                            Servizi
                                        </span>

                                        <div class="d-flex flex-wrap gap-4 py-2 justify-content-center text-center">
                                            @foreach($building->services as $service)
                                                <div>
                                                    <img class="service-icon-show" src="{{ asset('storage/'. $service->icon)}}">
                                                    <span class="p-2">{{$service->name}}
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>   
                                    </div>

                                </div>

                            </div>


                            <div class="map-show-info">
                                <div class="d-flex justify-content-center align-items-center">
                                        <img class="icon-map" src="{{Vite::asset('resources/img/icons/maps.png')}}" alt="">
                                    <p id="address" class="mb-0 text-center">
                                        {{ $building->address }}
                                    </p>
                                </div>
                                <div id="map" class="map-container mx-auto mt-3"></div>
                            </div>


                            {{-- sponsor e stats --}}
                            <div class="d-flex justify-content-around align-items-center">
                                <div>
                                    {{-- Bottone sponsorizza --}}
                                    @if        ($building->sponsorships->isNotEmpty())
                                        <a href="{{ route('admin.sponsorships.index', ['building_id' => $building->id]) }}">
                                            <button class="btn btn-sm sponsor-show-btn">
                                                <b>Prolunga Sponsorizzazione</b>
                                            </button>
                                        </a>
                                    @else 
                                        <a href="{{ route('admin.sponsorships.index', ['building_id' => $building->id]) }}">
                                            <button class="btn btn-sm sponsor-show-btn">
                                                <b>Sponsorizza</b>
                                            </button>
                                        </a>
                                    @endif
                                    {{-- Countdown --}}
                                    <div class="col-12 sponsorship-show-info py-3 d-flex flex-column">
                                        @if ($building->sponsorships->isNotEmpty())
                                            @php
                                                $latestSponsorship = $building->sponsorships->last();
                                            @endphp
                                                <p class="mb-0">
                                                    <small>
                                                        Sponsorizzazione attiva
                                                    </small>
                                                    
                                                </p>
                                                
                                                <div id="countdown"></div>
    
                                            @php
                                                $endingDate = $latestSponsorship->pivot->ending_date;
                                                $now = now();
                                                $remainingTimeInSeconds = max(Carbon\Carbon::parse($endingDate)->diffInSeconds($now), 0);
                                            @endphp
    
                                        @else 
                                        <p class="mb-0">
                                            <small>Nessuna sponsorizzazione attiva</small>
                                        </p>
                                        @endif
                                </div>
                                </div>

                                {{-- stats --}}
                                <div class="show-building-stat align-self-start">
                                    <a href="{{route('admin.visits.show', $building->id)}}" >
                                        <button class="btn btn-sm btn-secondary">
                                            Visualizza Statistiche
                                            <i class="fa-solid fa-square-poll-vertical" title="Visualizza Statistiche">
                                            </i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Fine card custom --}}

@endsection

@section('javascript')

    <script>
    // Funzione countdown
    function formatCountdown(timeInSeconds) {
        var days = Math.floor(timeInSeconds / (3600 * 24));
        var hours = Math.floor((timeInSeconds % (3600 * 24)) / 3600);
        var minutes = Math.floor((timeInSeconds % 3600) / 60);
        var seconds = Math.floor(timeInSeconds % 60);

        return days + ' giorni ' + hours + ' ore ' + minutes + ' minuti ' + seconds + ' secondi';
    }

    // Countdown
    var remainingTimeInSeconds = {{ $remainingTimeInSeconds ?? 0 }};
    var countdownElement = document.getElementById('countdown');

    function updateCountdown() {
        remainingTimeInSeconds--;

        if (remainingTimeInSeconds >= 0) {
            countdownElement.innerHTML = formatCountdown(remainingTimeInSeconds);
            setTimeout(updateCountdown, 1000);
        } 
    }

    updateCountdown();
    // Fine funzione

        // map function
        const apiKey = 'pqHD68XXAijUehCtM4HFFAVamZjQMA1W';
        const addressElement = document.getElementById('address');
        const address = addressElement.textContent || addressElement.innerText;

        console.log(address);
        const url = `https://api.tomtom.com/search/2/geocode/${encodeURIComponent(address)}.json?key=${apiKey}`;
        console.log(url);
        fetch(url)
            .then(response => response.json())
            .then(data => {
                // Estrazione delle coordinate (latitudine e longitudine)
                const latitude = data.results[0].position.lat;
                const longitude = data.results[0].position.lon;

                // Ora puoi utilizzare latitude e longitude come necessario
                console.log("Latitudine:", latitude);
                console.log("Longitudine:", longitude);

                let coordinates = { lon: longitude, lat: latitude };
                let center = coordinates;
                let map = null;
                map = tt.map({
                    key: apiKey,
                    container: "map",
                    center: center,
                    zoom: 14,
                })
                map.on('load', () => {
                    const marker = new tt.Marker().setLngLat(center, coordinates).addTo(map);
                    marker.setPopup(new tt.Popup().setHTML(`<h6>${address}</h6>`));
                    map.addControl(new tt.FullscreenControl());
                    map.addControl(new tt.NavigationControl());
                })
                
            })
            .catch(error => console.error("Errore nella richiesta:", error));
    </script>
    
@endsection
