@extends('layouts.app');

@section('content')

<section>
    <div class="container">
        <h1> Aggiungi un Appartamento</h1>
        <form action="{{route('admin.buildings.store')}}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Nome Appartamento</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Es: Harry Potter House" value="{{old('title')}}" required min="5" max="255">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Carica un'immagine di Copertina</label>
                <input type="file" class="form-control" name="image" id="image" required>
            </div>

            <div class="mb-3">
                <label for="images[]" class="form-label">Carica altre Immagini</label>
                <input type="file" class="form-control" name="images[]" id="images" multiple accept="image/*">
                {{-- accept= validazione che specifica file immagini, *= qualunque estensione --}}
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo Appartamento</label>
                <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}" required min="5">
                <div id="menuAutoComplete" class="card position-absolute w-100 radius d-none">
                    <ul class="list">

                    </ul>
                </div>
            </div>

            <input type="hidden" name="latitude" id="latitude" value="">

            <input type="hidden" name="longitude" id="longitude" value="">

           

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" name="description" id="description" rows="4" placeholder="Es: E' una casa molto bella" required minlength="20" maxlength="500">{{old('description')}}</textarea>
            </div>

            <div class="form-group">
                <label for="available">Disponibile:</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="available" name="available" value="1" checked>
                    <label class="form-check-label" for="available">Sì</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="rooms" class="form-label">N. Stanze</label>
                <input type="number" class="form-control" name="rooms" id="rooms" value="{{old('rooms')}}" min="2" required>
            </div>

            <div class="mb-3">
                <label for="bathrooms" class="form-label">N. Bagni</label>
                <input type="number" class="form-control" name="bathrooms" id="bathrooms" value="{{old('bathrooms')}}" min="1" required>
            </div>

            <div class="mb-3">
                <label for="beds" class="form-label">N. Letti</label>
                <input type="number" class="form-control" name="beds" id="beds" value="{{old('beds')}}" required min="1">
            </div>

            <div class="mb-3">
                <label for="sqm" class="form-label">Metri quadrati</label>
                <input type="number" class="form-control" name="sqm" id="sqm" value="{{old('sqm')}}" required min="10">
            </div>
    
            <p class="mb-3">Seleziona uno o più servizi</p>
            <div class="d-flex flex-wrap mb-3">
            @foreach ($services as $service)
                <div class="form-check me-3">
                    <label class="form-check-label" for="service-{{$service->id}}">
                        {{$service->name}}
                    </label>
                    <input name="services[]" class="form-check-input" type="checkbox" value="{{$service->id}}" id="service-{{$service->id}}" @checked(in_array($service->id, old('services', [])))>
                </div>    
            @endforeach
            </div>
        

            <select name="sponsorship_id" class="form-control mb-3" id="sponsorship_id">
                <option value="">Scegli una Sponsorizzazione (Opzionale)</option>
                @foreach($sponsorships as $sponsorship)
                    <option @selected(old('sponsorship_id') == $sponsorship->id) value="{{ $sponsorship->id }}">{{ $sponsorship->name }}</option>
                @endforeach
            </select>
    
            <div>
                <input type="submit" class="btn btn-primary" value="Aggiungi">
            </div>
    
        </form>
    
        
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</section>

@endsection

@section('javascript')
    <script>
        console.log('ok');


        const apiKey = "pqHD68XXAijUehCtM4HFFAVamZjQMA1W";
        const lat = '';
        const lon = '';
        

        // const search = document.getElementById('address');
        // const latitude = document.getElementById('latitude');
        // const longitude = document.getElementById('longitude');

        // search.addEventListener('input', function() {
        //     if (search.value.trim() !== '') {
        //         getApiProjects(search.value);
        //     }
        // });

        // function getApiProjects(address) {
        //     fetch(
        //         `https://api.tomtom.com/search/2/search/${address}.json?key=${apiKey}`
        //     )
        //     .then(response => response.json())
        //     .then(data => {
        //         console.log(data.results);

        //         if (data.results && data.results.length > 0) {
        //             const firstResult = data.results[0];
        //             const { lat, lon } = firstResult.position;

        //             // Inserisci latitudine e longitudine nei campi di input nascosti
        //             latitude.value = lat;
        //             longitude.value = lon;

        //             // Puoi anche aggiornare l'input 'search' con l'indirizzo selezionato, se lo desideri
        //             // search.value = firstResult.address.freeformAddress;
        //         }
        //     });
        // }


        // Soluzione con AUTOCOMPLETAMENTO

        const search = document.getElementById('address');
        const menuAutoComplete = document.getElementById('menuAutoComplete');
        const menuAutoCompleteClass = menuAutoComplete.classList;
        const ulList = document.querySelector('ul.list');

        const latitude = document.getElementById('latitude');
        const longitude = document.getElementById('longitude');

        search.addEventListener('input', function() {
            if (search.value != '')
                getApiProjects(search.value);
            addRemoveClass();

        })

        function addRemoveClass() {
            console.log(menuAutoCompleteClass);
            if (search.value == '')
                menuAutoCompleteClass.add('d-none');
            else
                menuAutoCompleteClass.remove('d-none');
        }

        function getApiProjects(adress) {
            fetch(
                    `https://api.tomtom.com/search/2/search/${adress}.json?key=${apiKey}&limit=5`
                )
                .then(response => response.json())
                .then(data => {
                    // console.log(data.results);
                    ulList.innerHTML = '';
                    if (data.results != undefined)
                        data.results.forEach(function(currentValue, index, array) {
                            const li = document.createElement('li');
                            li.append(currentValue.address.freeformAddress);
                            li.addEventListener('click',
                                () => {
                                    search.value = currentValue.address.freeformAddress;
                                    menuAutoCompleteClass.add('d-none');
                                    ulList.innerHTML = '';
                                    latitude.value = currentValue.position.lat;
                                    longitude.value = currentValue.position.lon;
                                    // console.log(latitude.value, 'lat');
                                    // console.log(longitude.value, 'lon');
                                }
                            )

                            ulList.appendChild(li);
                        });
                });
        }
     
    </script>
@endsection