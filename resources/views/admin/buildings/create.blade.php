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

            {{-- sezione nome casa e immagini --}}
            <div class="create-section">

                <div class="information">
                    <p class="mb-0">
                        In questa sezione ti chiediamo di inserire il nome che vuoi dare al tuo alloggio, cercando di inserire un nome facilmente comprensibile per gli utenti in modo da regalare un'esperienza semplice e funzionale per i visitatori.
                    </p>

                    <p class="mb-0">
                        Inoltre dovrai inserire delle immagini che valorizzino   al meglio il tuo immobile!  
                    </p>

                    <p class="mb-0">
                        Il nostro consiglio è scattare foto luminose e con la qualità più alta possibile, ricordati che vuoi che questo immobile venga affittato! 
                    </p>
                    
                </div>


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

            </div>

            {{-- sezione indirizzo, descrizione e disponibilità  --}}
            <div class="create-section">

                <div class="information">
                    <p class="mb-0">
                        Qui devi inserire l'indirizzo del tuo immobile e una descrizione accattivante.
                    </p>
                    <p class="mb-0">
                        Sii il più dettagliato possibile mettendo in evidenza i punti di forza del tuo alloggio e cercando di valorizzarli al meglio delle tue capacità.
                    </p>
                    <p class="mb-0">
                        Ricordati che anche una descrizione come si deve può incuriosire ulteriormente un visitatore e spingerlo ad affittare!
                    </p>
                </div>

                <div class="mb-3 relative-container">
                    <label for="address" class="form-label text-secondary">Indirizzo *</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}" required placeholder="Es: Via Borsellino 23">
                    <div id="menuAutoComplete" class="card position-absolute w-100 radius d-none">
                        <ul class="list">
                
                        </ul>
                    </div>
                </div>           
    
                <div class="mb-3">
                    <label for="description" class="form-label text-secondary">Descrizione *</label>
                    <textarea class="form-control" name="description" id="description" rows="4" placeholder="Es: è una villa spaziosa di lusso con piscina molto grande e vista a 360 gradi. Aria condizionata, interni eleganti. Ideale per riunioni di famiglia e gruppi. 'Un luogo per riflettere sulla vita con gratitudine e celebrare con le persone che ami'" required minlength="20" maxlength="500">{{old('description')}}</textarea>
                </div>
    
                <div class="checkbox-wrapper-available mb-3">
                    <label for="available" class="mb-2 text-secondary"> Disponibile:</label>
                    <label>
                      <input type="checkbox" id="available" name="available" value="1" checked>
                      <span class="checkbox"></span>
                    </label>
                </div>

            </div>
            

            {{-- sezione informazioni sul numero di stanze e metri quadrati --}}
            <div class="create-section">

                <div class="information">
                    <p class="mb-0">
                        Non c'è molto da dire, inserisci i campi richiesti e scegli i servizi che il tuo immobile può offire.
                    </p>
                    <p class="mb-0">
                        Controlla bene che tutti i numeri siano corretti e ricordati che inserire informazioni errate causa un'esperienza utente negativa! 
                    </p>
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

            </div>
            
        

            {{-- sezione Sponsorizzazione --}}
            <div class="create-section">

                <div class="information">
                    <p class="mb-0">
                        Qual'è il modo migliore per avere più visualizzazioni al proprio immobile?
                    </p>
                    <p class="mb-0">
                        Acquistando una sponsorizzazione avrai il tuo alloggio in evidenza, questo vuol dire che qualunque utente voglia affittare un appartamento vedrà il tuo annuncio tra i primi risultati!  
                    </p>
                    <p class="mb-0">
                        Se vuoi capire quale tipo di sponsorizzazione fa al caso tuo, da un occhio ai <a href="" class="text-primary">tipi di sponsorizzazione.</a>
                    </p>

                </div>

                <select name="sponsorship_id" class="form-control my-3" id="sponsorship_id">
                    <option value="">Scegli una Sponsorizzazione (Opzionale)</option>
                    @foreach($sponsorships as $sponsorship)
                        <option @selected(old('sponsorship_id') == $sponsorship->id) value="{{ $sponsorship->id }}">{{ $sponsorship->name }}</option>
                    @endforeach
                </select>
        

            </div>
            
            <div>
                <input type="submit" class="register-btn" value="Crea Annuncio" id="form-btn">
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

@section('javascript')
    <script>
        const apiKey = "pqHD68XXAijUehCtM4HFFAVamZjQMA1W";
        const search = document.getElementById('address');
        const menuAutoComplete = document.getElementById('menuAutoComplete');
        const ulList = document.querySelector('ul.list');


        search.addEventListener('input', function() {
            if (search.value !== '') {
            getApiProjects(search.value);
            }
        addRemoveClass();
        });

        function addRemoveClass() {
            if (search.value === '') {
            menuAutoComplete.classList.add('d-none');
            } else {
            menuAutoComplete.classList.remove('d-none');
            }
        }

        function getApiProjects(address) {
            fetch(`https://api.tomtom.com/search/2/search/${address}.json?key=${apiKey}&limit=5`)
                .then(response => response.json())
                .then(data => {

                    ulList.innerHTML = '';

                    if (data.results !== undefined) {
                        data.results.forEach(currentValue => {
                            const li = document.createElement('li');
                            li.textContent = currentValue.address.freeformAddress;

                            li.addEventListener('click', () => {
                                search.value = currentValue.address.freeformAddress;
                                menuAutoComplete.classList.add('d-none');
                                ulList.innerHTML = '';

                                // Aggiorna le coordinate nel form
                                // search.setAttribute('data-latitude', currentValue.position.lat);
                                // search.setAttribute('data-longitude', currentValue.position.lon);

                            });

                            ulList.appendChild(li);
                        });
                    }
                });
        }
</script>
@endsection