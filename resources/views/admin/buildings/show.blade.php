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

            <div class="row">
                <h2>{{$building->title}}</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-10">
                    <img src="{{ asset('storage/'. $building->image)}}" alt="">
                </div>
            </div>

            <div id="map" style="width: 1000px; height: 500px"></div>
            <p id="address">{{ $building->address }}</p>
        </div>
    </section>
@endsection

@section('javascript')

    <script>
        const apiKey = 'pqHD68XXAijUehCtM4HFFAVamZjQMA1W';
        const address = document.getElementById('address');
        console.log(address);
        const url = `https://api.tomtom.com/search/2/geocode/${encodeURIComponent(address.value)}.json?key=${apiKey}`;
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