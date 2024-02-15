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
        @elseif(session()->has('message_restore'))
            <div class="container p-2 w-50 mx-auto">
                <div class="alert alert-success text-center">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session()->get('message_restore') }}
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
                                    <div class="col-8 d-flex my-4">
                                        <img class="img-fluid rounded img-show-cover" src="{{ asset('storage/'. $building->image)}}" alt="">
                                    </div>
                                     
                                    <div class="col-4 overflow-y-scroll scrollable-column">
                                        @foreach($building->images as $image)
                                            <img class="img-plus w-100 rounded img-show-cover my-4" src="{{ asset('storage/'. $image->url)}}" alt="">
                                        @endforeach
                                    </div>
                                
                                </div>
                            </div>


                            <div class="card-option">

                                <div class="show-info">
                                    <div class="py-3">
                                        <span class="text-address fw-bolder">
                                            <i class="fa-solid fa-map-pin"></i> Indirizzo
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </span>
    
                                        <p class="ps-5">
                                             {{$building->address}}
                                        </p>
                                    </div>
                                    
                                   <div class="py-3 w-50">
                                        <span class="text-description fw-bolder"><i class="fa-solid fa-message"></i> Descrizione dell'edificio <i class="fa-solid fa-arrow-right-long"></i></span> 
                                        <p class="ps-5"> {{$building->description}}</p>
                                   </div>
    
                                    <div class="d-flex gap-2 flex-column">
                                        <div class="">
                                            <span class="text-address fw-bolder">
                                                <i class="fa-solid fa-clipboard"></i> 
                                                Lo spazio 
                                                <i class="fa-solid fa-arrow-right-long"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column gap-3 ps-5">
            
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

                                    <div class="pt-4">
                                        <span class="text-address fw-bolder">
                                            <i class="fa-solid fa-circle-exclamation"></i>
                                            Dispondibilità:
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </span>
                                    </div>
                                                  
                                    <div class="ps-5">
                                        @if ($building->available)
                                            <span>Disponibile</span>
                                        @else
                                            <span>Non disponibile</span>
                                        @endif
                                    </div>
                                
                                    <div class="py-4">
                                        <span class="text-address fw-bolder">
                                            <i class="fa-solid fa-bell-concierge"></i>
                                            Servizi
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </span>

                                        <div class="d-flex flex-column gap-2 py-2 ps-5">
                                            @foreach($building->services as $service)
                                                <div>
                                                    <img class="service-icon-show" src="{{ asset('storage/'. $service->icon)}}">
                                                    <span class="p-2">{{$service->name}}
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>   
                                    </div>

                                    {{-- sponsor e stats --}}

                                    <div class="d-flex justify-content-around py-4 align-items-center">
                                        <div>
                                            {{-- Bottone sponsorizza --}}
                                            @if        ($building->sponsorships->isNotEmpty())
                                                <a href="{{ route('admin.sponsorships.index', ['building_id' => $building->id]) }}">
                                                    <button class="btn btn-sm bg-primary text-light">
                                                        <b>Prolunga Sponsorizzazione</b>
                                                    </button>
                                                </a>
                                                {{-- @foreach ($building->sponsorships as $sponsorship)
                                                    <p>La sponsorizzazione termina: {{ $sponsorship->name }}: {{ $sponsorship->pivot->ending_date }}
                                                    </p>
                                                @endforeach --}}
                                            @if ($building->sponsorships->isNotEmpty())
                                            @php
                                                $latestSponsorship = $building->sponsorships->last();
                                            @endphp
                                                <p>La sponsorizzazione termina: {{ $latestSponsorship->name }}: {{$latestSponsorship->pivot->ending_date }}
                                                </p>
                                            @endif
                                            @else 
                                                <a href="{{ route('admin.sponsorships.index', ['building_id' => $building->id]) }}">
                                                    <button class="btn btn-sm bg-primary text-light">
                                                        <b>Sponsorizza</b>
                                                    </button>
                                                </a>
                                            @endif
                                        </div>

                                        {{-- stats --}}
                                        <div class="show-building-stat">
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

                            <div class="map-show-info">
                                <div class="d-flex justify-content-center align-items-center">
                                        <img class="icon-map" src="{{Vite::asset('resources/img/icons/maps.png')}}" alt="">
                                    <p id="address" class="mb-0 w-50 text-center">
                                        {{ $building->address }}
                                    </p>
                                </div>
                                <div class="d-flex flex-column align-items-center pt-3">
                                    <div id="map" class="map-container"></div>
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
