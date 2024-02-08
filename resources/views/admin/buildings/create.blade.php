@extends('layouts.app')

@section('content')

<section>
    <div class="container py-5">
        <div class="create-header">
            <h2 class="color-green create-title"><b>Aggiungi un Immobile</b> 
            </h2>
            <img src="{{Vite::asset('resources/img/icons/create-icon.png')}}" alt="">
        </div>


        <form action="{{route('admin.buildings.store')}}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label for="title" class="form-label color-green" ><b>Nome</b>*</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Es: Harry Potter House" value="{{old('title')}}" required min="5" max="255">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label color-green"><b>Carica un'immagine di Copertina</b> *</label>
                <input type="file" class="form-control" name="image" id="image" required>
            </div>

            <div class="mb-3">
                <label for="images" class="form-label color-green"><b>Carica altre Immagini</b> *</label>
                <input type="file" class="form-control" name="images[]" id="images" multiple accept=".jpg,.png,.jpeg,.webp">
                {{-- accept= validazione che specifica file immagini, *= qualunque estensione --}}
            </div>

            <div class="mb-3">
                <label for="address" class="form-label color-green"><b>Indirizzo </b>*</label>
                <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}" required>
            </div>           

            <div class="mb-3">
                <label for="description" class="form-label color-green"><b>Descrizione</b> *</label>
                <textarea class="form-control" name="description" id="description" rows="4" placeholder="Es: E' una casa molto bella" required minlength="20" maxlength="500">{{old('description')}}</textarea>
            </div>

            <div class="checkbox-wrapper-available mb-3">
                <label for="available" class="mb-2"><b class="color-green">Disponibile:</b></label>
                <label>
                  <input type="checkbox" id="available" name="available" value="1"/>
                  <span class="checkbox"></span>
                </label>
              </div>

            <div class="mb-3">
                <label for="rooms" class="form-label color-green"><b>N. Stanze</b> *</label>
                <input type="number" class="form-control" name="rooms" id="rooms" value="{{old('rooms')}}" min="1" required>
            </div>

            <div class="mb-3">
                <label for="bathrooms" class="form-label color-green"><b>N. Bagni</b> *</label>
                <input type="number" class="form-control" name="bathrooms" id="bathrooms" value="{{old('bathrooms')}}" min="1" required>
            </div>

            <div class="mb-3">
                <label for="beds" class="form-label color-green"><b>N. Letti</b> *</label>
                <input type="number" class="form-control" name="beds" id="beds" value="{{old('beds')}}" required min="1">
            </div>

            <div class="mb-3">
                <label for="sqm" class="form-label color-green"><b>Metri quadrati</b> *</label>
                <input type="number" class="form-control" name="sqm" id="sqm" value="{{old('sqm')}}" required min="10">
            </div>
    
            <p class="mb-3 color-green"><b>Seleziona uno o più servizi</b> *</p>
            <div class="d-flex flex-wrap">
            @foreach ($services as $service)
                <div class="checkbox-wrapper-services me-4">
                    <label class="form-check-label" for="service-{{$service->id}}">
                        <span class="me-1">{{$service->name}}</span>
                    </label>
                    <label class="switch">
                      <input type="checkbox" name="services[]" class="services-checkbox" value="{{$service->id}}" id="service-{{$service->id}}" @checked(in_array($service->id, old('services', [])))>
                      <span class="slider"></span>
                    </label>
                  </div>
            @endforeach
            </div>
            <span class="text-danger d-none" id="alert-services">Devi selezionare almeno un servizio!</span>
        

            <select name="sponsorship_id" class="form-control my-3" id="sponsorship_id">
                <option value="">Scegli una Sponsorizzazione (Opzionale)</option>
                @foreach($sponsorships as $sponsorship)
                    <option @selected(old('sponsorship_id') == $sponsorship->id) value="{{ $sponsorship->id }}">{{ $sponsorship->name }}</option>
                @endforeach
            </select>
    
            <div>
                <input type="submit" class="register-btn" value="Salva" id="form-btn">
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
</script>

@endsection