@extends('layouts.app');

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

            <div class="row p-5">
                <h2>{{$building->title}}</h2>
            </div>

            <div class="row justify-content-center p-4">
                <div class="col-10">
                    <img src="{{ asset('storage/'. $building->image)}}" alt="">
                </div>
            </div>

            <div class="row p-4">
                @foreach($building->images as $image)
                    <div class="col-6">
                        <img class="img-plus" src="{{ asset('storage/'. $image->url)}}" alt="">
                    </div>
                @endforeach
            </div>

            <div class="row p-4">
                <p>{{$building->address}}</p>
                <p>{{$building->description}}</p>
                <p>Numero stanze: {{$building->rooms}}</p>
                <p>Numero bagni: {{$building->bathrooms}}</p>
                <p>Numero metri quadrati: {{$building->sqm}}</p>
                <p>Dispondibile:  
                    @if ($building->available)
                        <span>Si</span>
                    @else
                        <span>No</span>
                    @endif
                </p>
                <p>Servizi:</p>
                <div class="d-flex flex-wrap">
                    @foreach($building->services as $service)
                        <img src={{$service['url']}}>
                        <span class="p-2">{{$service->name}}</span>
                    @endforeach
                </div>
                
            </div>

            <div id="map" class="map-container"></div>
            <p id="address">{{ $building->address }}</p>
        </div>
    </section>
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

                let v3 = { lon: longitude, lat: latitude };
                let center = v3;
                let map = null;
                map = tt.map({
                    key: apiKey,
                    container: "map",
                    center: center,
                    zoom: 14,
                })
                map.on('load', () => {
                    const marker = new tt.Marker().setLngLat(center, v3).addTo(map);
                    marker.setPopup(new tt.Popup().setHTML(`<h6>${address}</h6>`));
                    map.addControl(new tt.FullscreenControl());
                    map.addControl(new tt.NavigationControl());
                })
                
            })
            .catch(error => console.error("Errore nella richiesta:", error));
    </script>
    
@endsection