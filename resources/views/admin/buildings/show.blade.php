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
                        <div class="card-header card-header-show card-title"> <b>{{$building->title}}</b></div>
        
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
                                    @foreach($building->images as $image)
                                    <div class="col-4">
                                        <img class="img-plus w-100 rounded img-show-cover my-4" src="{{ asset('storage/'. $image->url)}}" alt="">
                                    </div>
                                @endforeach
                                </div>
                            </div>

                            <div class="card-option">
                                <div class="py-3">
                                    <span class="text-address fw-bolder">Indirizzo</span>
                                    <div>{{$building->address}}</div>
                                </div>
                               <div class="py-3">
                                <span class="text-description fw-bolder">Descrizione dell'edificio</span> 
                                <div> {{$building->description}}</div>
                               </div>
                               <div class="py-3">
                                <span class="text-address fw-bolder">Lo spazio</span>
                                <div class="d-flex gap-5 mb-3">
                                    <div>Numero stanze: {{$building->rooms}}</div>
                                    <div>Numero bagni: {{$building->bathrooms}}</div>
                                    <div>Metri quadrati: {{$building->sqm}}</div>
                                    <div>Dispondibile:  
                                        @if ($building->available)
                                            <span>Si</span>
                                        @else
                                            <span>No</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="py-3">
                                    <span class="text-address fw-bolder">I servizi che troverai</span>
                                    <div class="d-flex flex-wrap align-items-center gap-4 py-2">
                                        @foreach($building->services as $service)
                                            <div>
                                                <img class="service-icon" src="{{ asset('storage/'. $service->icon)}}">
                                            <span class="p-2">{{$service->name}}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center pt-3">
                                    <div id="map" class="map-container"></div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <img class="icon-map pt-4 me-4" src="{{Vite::asset('resources/img/icons/maps.png')}}" alt="">
                                    <p id="address" class="pt-5">{{ $building->address }}</p>
                                    </div>
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
