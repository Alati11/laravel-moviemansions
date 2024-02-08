@extends('layouts.app')

@section('content')

<section>
    <div class="container py-5">
        <div class="create-header">
            <h2 class="text-secondary create-title">Aggiungi un Immobile</h2>
            <img src="{{Vite::asset('resources/img/icons/create-icon.png')}}" alt="">
        </div>


        <form action="{{route('admin.buildings.store')}}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label for="title" class="form-label text-secondary">Nome *</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Es: Harry Potter House" value="{{old('title')}}" required min="5" max="255">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label text-secondary">Carica un'immagine di Copertina *</label>
                <input type="file" class="form-control" name="image" id="image" required>
            </div>

            <div class="mb-3">
                <label for="images" class="form-label text-secondary">Carica altre Immagini *</label>
                <input type="file" class="form-control" name="images[]" id="images" multiple accept=".jpg,.png,.jpeg,.webp">
                {{-- accept= validazione che specifica file immagini, *= qualunque estensione --}}
            </div>

            <div class="mb-3">
                <label for="address" class="form-label text-secondary">Indirizzo *</label>
                <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}" required placeholder="Es: Via Borsellino 23">
            </div>           

            <div class="mb-3">
                <label for="description" class="form-label text-secondary">Descrizione *</label>
                <textarea class="form-control" name="description" id="description" rows="4" placeholder="Es: è una villa spaziosa di lusso con piscina molto grande e vista a 360 gradi. Aria condizionata, interni eleganti. Ideale per riunioni di famiglia e gruppi. 'Un luogo per riflettere sulla vita con gratitudine e celebrare con le persone che ami'" required minlength="20" maxlength="500">{{old('description')}}</textarea>
            </div>

            <div class="checkbox-wrapper-available mb-3">
                <label for="available" class="mb-2 text-secondary"> Disponibile:</label>
                <label>
                  <input type="checkbox" id="available" name="available" value="1"/>
                  <span class="checkbox"></span>
                </label>
              </div>

            <div class="mb-3">
                <label for="rooms" class="form-label text-secondary">N. Stanze *</label>
                <input type="number" class="form-control" name="rooms" id="rooms" value="{{old('rooms')}}" min="1" required placeholder="Es: 12">
            </div>

            <div class="mb-3">
                <label for="bathrooms" class="form-label text-secondary">N. Bagni *</label>
                <input type="number" class="form-control" name="bathrooms" id="bathrooms" value="{{old('bathrooms')}}" min="1" required placeholder="Es: 2">
            </div>

            <div class="mb-3">
                <label for="beds" class="form-label text-secondary">N. Letti *</label>
                <input type="number" class="form-control" name="beds" id="beds" value="{{old('beds')}}" required min="1" placeholder="Es: 2">
            </div>

            <div class="mb-3">
                <label for="sqm" class="form-label text-secondary">Metri quadrati *</label>
                <input type="number" class="form-control" name="sqm" id="sqm" value="{{old('sqm')}}" required min="10" placeholder="Es: 110">
            </div>
    
            <p class="mb-3 text-secondary">Seleziona uno o più servizi *</p>
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