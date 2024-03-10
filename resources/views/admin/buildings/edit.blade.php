@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <h1> Modifica un Appartamento</h1>

        <form action="{{route('admin.buildings.update', $building->id)}}" method="POST" enctype="multipart/form-data">

            @csrf

            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Nome *</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Es: Harry Potter House" value="{{old('title', $building->title)}}" required min="5" max="255">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Carica un'immagine di Copertina *</label>
                <input type="file" class="form-control" name="image" id="image" required onchange="updateFileName()">
                <p id="filename" class="text-muted">{{$building->image}}</p>
            </div>

            <div class="mb-3">
                <label for="images" class="form-label">Carica altre Immagini *</label>
                <input type="file" class="form-control" name="images[]" id="images" multiple accept="image/*" value="{{old('images', $building->images)}}" onchange="updateFilesName()">
                {{-- accept= validazione che specifica file immagini, *= qualunque estensione --}}
                <p id="filenames" class="text-muted">No</p>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo *</label>
                <input type="text" class="form-control" name="address" id="address" value="{{old('address', $building->address)}}" required>
            </div>           

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione *</label>
                <textarea class="form-control" name="description" id="description" rows="4" placeholder="Es: E' una casa molto bella" required minlength="20" maxlength="500">{{old('description', $building->description)}}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="available">Disponibile:</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="available" name="available" value="1" checked>
                    <label class="form-check-label" for="available">Sì</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="rooms" class="form-label">N. Stanze *</label>
                <input type="number" class="form-control" name="rooms" id="rooms" value="{{old('rooms', $building->rooms)}}" min="1" required>
            </div>

            <div class="mb-3">
                <label for="bathrooms" class="form-label">N. Bagni *</label>
                <input type="number" class="form-control" name="bathrooms" id="bathrooms" value="{{old('bathrooms', $building->bathrooms)}}" min="1" required>
            </div>

            <div class="mb-3">
                <label for="beds" class="form-label">N. Letti *</label>
                <input type="number" class="form-control" name="beds" id="beds" value="{{old('beds', $building->beds)}}" required min="1">
            </div>

            <div class="mb-3">
                <label for="sqm" class="form-label">Metri quadrati *</label>
                <input type="number" class="form-control" name="sqm" id="sqm" value="{{old('sqm', $building->sqm)}}" required min="10">
            </div>
    
            <p class="mb-3">Seleziona uno o più servizi *</p>
            <div class="d-flex flex-wrap">
            @foreach ($services as $service)
                <div class="form-check me-3">
                    <label class="form-check-label" for="service-{{$service->id}}">
                        {{$service->name}}
                    </label>
                    <input name="services[]" class="form-check-input services-checkbox" type="checkbox" value="{{$service->id}}" id="service-{{$service->id}}" @checked(in_array($service->id, old('services', $building->services->pluck('id')->toArray())))>
                </div>    
            @endforeach
            </div>
            <span class="text-danger d-none" id="alert-services">Devi selezionare almeno un servizio!</span>
        

            <select name="sponsorship_id" class="form-control my-3" id="sponsorship_id">
                <option value="">Scegli una Sponsorizzazione (Opzionale)</option>
                @foreach($sponsorships as $sponsorship)
                    <option @selected($sponsorship->id) value="{{ $sponsorship->id }}">{{ $sponsorship->name }}</option>
                @endforeach
            </select>
    
            <div>
                <input type="submit" class="btn btn-primary" value="Salva" id="form-btn">
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

    <script>
        document.getElementById("form-btn").addEventListener("click", function(event) {
            const checkboxes = document.querySelectorAll('.services-checkbox:checked');

            const alertCheckbox = document.getElementById('alert-services');

            if (checkboxes.length === 0) {
            alertCheckbox.classList.remove('d-none');
            alertCheckbox.classList.add('d-block');
            event.preventDefault();
            } else {
                alertCheckbox.classList.remove('d-block');
                alertCheckbox.classList.add('d-none');
            }
        });

        function updateFileName() {
        var input = document.getElementById('image');
        var filenameDisplay = document.getElementById('filename');

        if (input.files.length > 0) {
            filenameDisplay.textContent = input.files[0].name;
        } else {
            filenameDisplay.textContent = 'Nessun file selezionato';
        }
        };

        function updateFilesName() {
        var input = document.getElementById('images');
        var filenameDisplay = document.getElementById('filenames');

        if (input.files.length > 0) {
            filenameDisplay.textContent = input.files[0].name;
            filenameDisplay.textContent += ', '+ input.files[1].name;
            filenameDisplay.textContent += ', '+ input.files[2].name;
        } else {
            filenameDisplay.textContent = 'Nessun file selezionato';
        }
        }
    
    </script>

@endsection