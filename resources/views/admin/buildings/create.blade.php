@extends('layouts.app')

@section('content')

<section>
    <div class="container py-5">
        <div class="create-header">
            <div class="d-flex flex-column align-items-center">
                <img src="{{Vite::asset('resources/img/icons/create-icon.png')}}" alt="">
                <p>
                    <small class="color-green create-title">Aggiungi un Immobile</small>
                </p>
            </div>
        </div>

        {{-- progress-bar --}}

        <div class="py-4">
            <div class="progress" role="progressbar" aria-label="Example 1px high" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 3px">
                <div class="progress-bar" style="width: 3%" id="progress-bar-create"></div>
            </div>
        </div>
        
        


        <form action="{{route('admin.buildings.store')}}" method="POST" enctype="multipart/form-data">

            @csrf

            {{-- sezione nome casa e immagini --}}
            <div class="create-section" data-index="0">

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


                <div class="input-container">

                    <div class="mb-4 resp-info-create">
                        <label for="title" class="form-label text-secondary ">Nome *</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Es: Harry Potter House" value="{{old('title')}}" required min="5" max="255">
                    </div>
        
                    <div class="mb-4 resp-info-create">
                        <label for="image" class="form-label text-secondary ">Carica un'immagine di Copertina *</label>
                        <input type="file" class="form-control" name="image" id="image" required>
                    </div>
        
                    <div class="mb-4 resp-info-create">
                        <label for="images" class="form-label text-secondary ">Carica altre Immagini *</label>
                        <input type="file" class="form-control" name="images[]" id="images" multiple accept=".jpg,.png,.jpeg,.webp" required>
                    </div>
    
                    <div class="py-3 error">
                        <span class="text-danger d-none"><b><i>NB: I campi con l'asterisco sono obbligatori!</i></b></span>
                    </div>
    
                </div>
                
            </div>

            {{-- sezione indirizzo, descrizione e disponibilità  --}}
            <div class="create-section" data-index="1">

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

                <div class="address-input resp-info-create">
                    <label for="address" class="form-label text-secondary">Indirizzo *</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}" required placeholder="Es: Via Borsellino 23">
                    <div id="menuAutoComplete" class="card w-100 radius d-none">
                        <ul class="list">
                
                        </ul>
                    </div>
                </div>           
    
                <div class="mb-4 resp-info-create">
                    <label for="description" class="form-label text-secondary">Descrizione *</label>
                    <textarea class="form-control" name="description" id="description" rows="4" placeholder="Es: è una villa spaziosa di lusso con piscina molto grande e vista a 360 gradi. Aria condizionata, interni eleganti. Ideale per riunioni di famiglia e gruppi. 'Un luogo per riflettere sulla vita con gratitudine e celebrare con le persone che ami'" required minlength="20" maxlength="500">{{old('description')}}</textarea>
                </div>

                <span class="text-danger pb-2 d-none" id="alert-description"><b>La descrizione deve contenere almeno 20 caratteri!</b></span>
    
                <div class="checkbox-wrapper-available mb-4 check-resp-create">
                    <label for="available" class="mb-2 text-secondary"> Disponibile:</label>
                    <label>
                      <input type="checkbox" id="available" name="available" value="1" checked>
                      <span class="checkbox"></span>
                    </label>
                </div>

                <div class="py-3 error">
                    <span class="text-danger d-none"><b><i>NB: I campi con l'asterisco sono obbligatori!</i></b></span>
                </div>

            </div>
            

            {{-- sezione informazioni sul numero di stanze e metri quadrati --}}
            <div class="create-section" data-index="2">

                <div class="information">
                    <p class="mb-0">
                        Non c'è molto da dire, inserisci i campi richiesti e scegli i servizi che il tuo immobile può offire.
                    </p>
                    <p class="mb-0">
                        Controlla bene che tutti i numeri siano corretti e ricordati che inserire informazioni errate causa un'esperienza utente negativa! 
                    </p>
                </div>

                <div class="mb-4 resp-info-create">
                    <label for="rooms" class="form-label text-secondary">N. Stanze *</label>
                    <input type="number" class="form-control numbers" name="rooms" id="rooms" value="{{old('rooms')}}" min="1" required placeholder="Es: 12">
                </div>
    
                <div class="mb-4 resp-info-create">
                    <label for="bathrooms" class="form-label text-secondary">N. Bagni *</label>
                    <input type="number" class="form-control numbers" name="bathrooms" id="bathrooms" value="{{old('bathrooms')}}" min="1" required placeholder="Es: 2">
                </div>

                <div class="mb-2">
                    <span id="bathErr" class="text-danger d-none"><b>Il numero dei bagni non può essere più alto del numero di stanze!</b></span>
                </div>
    
                <div class="mb-4 resp-info-create">
                    <label for="beds" class="form-label text-secondary">N. Letti *</label>
                    <input type="number" class="form-control numbers" name="beds" id="beds" value="{{old('beds')}}" required min="1" placeholder="Es: 2">
                </div>
    
                <div class="mb-4 resp-info-create">
                    <label for="sqm" class="form-label text-secondary">Metri quadrati (Almeno 10) *</label>
                    <input type="number" class="form-control numbers" name="sqm" id="sqm" value="{{old('sqm')}}" required min="10" placeholder="Es: 110">
                </div>

                <div class="pb-3 d-none" id="numsErr">
                    <span class="text-danger"><b>I metri quadrati non possono essere più bassi di 10!</b></span>
                </div>
        
                <p class="mb-4 text-secondary resp-info-create">Seleziona uno o più servizi *</p>
                <div class="d-flex flex-wrap checkbox-wrapper-resp">
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
                <span class="text-danger d-none" id="alert-services"><b>Devi selezionare almeno un servizio!</b></span>

                <div class="py-3 error">
                    <span class="text-danger d-none"><b><i>NB: I campi con l'asterisco sono obbligatori!</i></b></span>
                </div>

            </div>
            
        

            {{--Ultima sezione --}}
            <div class="create-section last-section" data-index="3">

                

                <div class="row">
                    <div class="col-4 d-flex align-items-center">
                        
                        <div class="information d-flex flex-column h-100 justify-content-center">

                            <div class="flex-grow-1 d-flex flex-column justify-content-center">
                                <h2 class="color-green pb-4 text-center">Sei <span class="color-gold">pronto</span> per <span class="color-gold">partire</span> con <span class="color-gold">Movie</span> <span class="color-green">Mansion</span></h2>
        
                            <p class="mb-0">
                                Se hai controllato bene tutte le sezioni precedenti è il momento di creare il tuo annuncio e rendere <b>visibile</b> agli occhi di tutti il tuo immobile!
                            </p>
                            </div>
                            
        
                            <p class="mb-0 flex-grow-1 d-flex flex-column justify-content-end">
                                <small>
                                    Cliccando su <b>Crea Annuncio</b> acconsenti a rendere visibili e pubbliche tutte le informazioni correlate all'immobile e al trattamento dei tuoi dati secondo l'<b>articolo 4</b> del Regolamento Europeo.
                                </small>
                            </p>
        
                        </div>
                    </div>

                    <div class="col-8 pb-5">
                        <img src="{{Vite::asset('resources/img/create-last-img.png')}}" alt="" class="img-fluid">
                    </div>
                </div>

                <div class="form-button">
                
                    <button class="button-create-ann" type="submit" id="form-btn">
                        Crea Annuncio
                        <svg fill="currentColor" viewBox="0 0 24 24" class="icon">
                          <path
                            clip-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z"
                            fill-rule="evenodd"
                          ></path>
                        </svg>
                      </button>
                      
                </div>
        
            </div>
            

            <div class="slider-btns" id="sliderBtns">
                <span id="prevBtn" class="slider-btn">
                    <i class="fa-solid fa-circle-arrow-left icon"></i>
                </span>
                
                <span id="nextBtn" class="slider-btn">
                    <i class="fa-solid fa-circle-arrow-right icon"></i>
                </span>

            </div>

        </form>

        
    
        
    
        @if ($errors->any())
            <div class="alert alert-danger pt-4">
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

    

    //progress bar

    const progressBar = document.getElementById('progress-bar-create');



    // carosello
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const sliderBtns = document.getElementById('sliderBtns');
    const sections = document.querySelectorAll('.create-section');

    let currentSectionIndex = 0;

    document.addEventListener("DOMContentLoaded", function() {

        // Nascondi tutte le sezioni tranne la prima
        hideAllSections();
        showSection(currentSectionIndex);

        if(currentSectionIndex === 0) {
            prevBtn.classList.add('d-none')
            sliderBtns.classList.add('justify-content-end')
        } 

        // Gestisci clic sul pulsante Next
        nextBtn.addEventListener('click', function() {

            if(validateCurrentSection()){
                if (currentSectionIndex < sections.length - 1) {
                hideSection(currentSectionIndex);
                currentSectionIndex++;
                showSection(currentSectionIndex);
                } 

                sliderBtns.classList.remove('justify-content-end')
                sliderBtns.classList.add('justify-content-between')
                prevBtn.classList.remove('d-none')

                if(currentSectionIndex === 1) {

                    progressBar.style.width = "33%";

                } else if(currentSectionIndex === 2) {

                    progressBar.style.width = "66%";

                } else if(currentSectionIndex === 3) {

                    progressBar.style.width = "99%";

                }
    
            }

            if (currentSectionIndex === sections.length - 1 ) {
                 nextBtn.classList.add('d-none');
            } 

        });

        // Gestisci clic sul pulsante Previous
        prevBtn.addEventListener('click', function() {
            if (currentSectionIndex > 0) {
                hideSection(currentSectionIndex);
                currentSectionIndex--;
                showSection(currentSectionIndex);
            } 

            nextBtn.classList.remove('d-none')

            if(currentSectionIndex === 0) {
                prevBtn.classList.add('d-none')
                sliderBtns.classList.remove('justify-content-between')
                sliderBtns.classList.add('justify-content-end')
            } 

            if(currentSectionIndex === 0) {

                progressBar.style.width = "3%";

            } else if(currentSectionIndex === 1) {

                progressBar.style.width = "33%";

            } else if(currentSectionIndex === 2) {

                progressBar.style.width = "66%";

            } 

        });

        function hideAllSections() {
            sections.forEach(section => {
                section.style.display = 'none';
            });
        }

        function hideSection(index) {
            sections[index].style.display = 'none';
        }

        function showSection(index) {
            sections[index].style.display = 'flex';
        }

        function validateCurrentSection() {
            const currentSection = sections[currentSectionIndex];
            const requiredInputs = currentSection.querySelectorAll('input[required], textarea[required]'); 
            const messError = currentSection.querySelector('.error .text-danger');
            const numsErr = document.getElementById('numsErr')

            let isValid = true;

            // validazione se gli input sono vuoti

            requiredInputs.forEach(input => {
                if (input.value.trim() === '') {
                    
                    isValid = false;

                    input.classList.add('input-error');
                    messError.classList.remove('d-none');
                    

                } else {
                    input.classList.remove('input-error');
                    messError.classList.add('d-none');
                }
            });


            // validazione sulla descrizione

            if(currentSectionIndex === 1) {
                const descriptionInput = document.getElementById('description');
                const alertDescr = document.getElementById('alert-description');

                if(descriptionInput.value.length < 20) {

                    isValid = false;

                    descriptionInput.classList.add('input-error');
                    alertDescr.classList.remove('d-none');

                } else {

                    descriptionInput.classList.remove('input-error');
                    alertDescr.classList.add('d-none');

                }
            }

            // validazione sui numeri 

            if(currentSectionIndex === 2) {

                const numberInputs = currentSection.querySelectorAll('input[type="number"]');

                const numsErr = document.getElementById('numsErr');
                const sqmNum = document.getElementById('sqm');
                const rooms = document.getElementById('rooms');
                const bathrooms = document.getElementById('bathrooms');
                const bathErr = document.getElementById('bathErr');

                numberInputs.forEach(input => {

                    if (input.value < 1  || input.value.trim() === '') {

                        isValid = false;
                        input.classList.add('input-error');
                        messError.classList.remove('d-none');

                    } else if(sqmNum.value < 10) {

                        isValid = false;
                        numsErr.classList.remove('d-none');

                    } else if(parseInt(rooms.value, 10) < parseInt(bathrooms.value, 10)) {

                        isValid = false;
                        bathErr.classList.remove('d-none');

                    } else {

                        input.classList.remove('input-error');
                        messError.classList.add('d-none');
                        numsErr.classList.add('d-none');
                        bathErr.classList.add('d-none');

                    }

                    console.log(rooms.value, bathrooms.value)
                });

                const checkboxes = document.querySelectorAll('.services-checkbox:checked');

                const alertCheckbox = document.getElementById('alert-services');

                if (checkboxes.length === 0) {
                alertCheckbox.classList.remove('d-none');
                alertCheckbox.classList.add('d-block');
                isValid = false;
                } else {
                alertCheckbox.classList.remove('d-block');
                alertCheckbox.classList.add('d-none');
                }   
            }
            
            return isValid;
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