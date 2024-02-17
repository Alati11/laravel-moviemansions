@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="row justify-content-between py-5">
        <div class="col-md-3">
            <div class="h-100 d-flex flex-column">
                <h2 class="pb-4 register-title">Inizia a lavorare con <b>
                    <span class="color-green">Movie</span>
                    <span class="color-gold">Mansions</span></b>
                </h2>

                <div class="text-information flex-grow-1">
                    <h5>Compila questo form per registrarti e <b class="color-green">iniziare a guadagnare</b> fin da subito con noi!</h5>
                </div>

                <div class="d-flex justify-content-end pb-3 icon-container">
                    <img class="arrow-register-icon" src="{{Vite::asset('resources/img/icons/arrow-register.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card register-card">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- name --}}
                        <div class="mb-4 d-flex register-input">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name *') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- dropdown information --}}
                            <div class="btn-group ps-3">

                                <button class="dropdown-toggle register-information-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    &#x1F6C8;
                                </button>
                                <p class="dropdown-menu p-2">
                                    Utilizza il tuo nome <b>reale</b>, il tuo profilo risulterà più <b>affidabile</b> &#128526;
                                </p>

                            </div>
                        </div>

                        {{-- surname --}}
                        <div class="mb-4 d-flex register-input">
                            <label for="surname *" class="col-md-4 col-form-label text-md-right">{{ __('Surname *') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- dropdown information --}}
                            <div class="btn-group ps-3">

                                <button class="dropdown-toggle register-information-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    &#x1F6C8
                                </button>
                                <p class="dropdown-menu p-2">
                                    Stessa cosa del nome! Inserendo un cognome <b>reale</b> avrai più possibilità di concludere un buon affare! &#129309;
                                </p>

                            </div>

                        </div>

                        {{-- date of birth --}}
                        <div class="mb-4 d-flex register-input">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth (Optional)') }}</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" autocomplete="date_of_birth" autofocus>

                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Your age must be between 16 and 100 years old</strong>
                                </span>
                                @enderror

                                <span class="d-none text-danger" id="alert-date">Devi avere tra 16 e 100 anni</span>
                            </div>
                        </div>

                        {{-- email --}}
                        <div class="mb-4 d-flex register-input">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address *') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- dropdown information --}}
                            <div class="btn-group ps-3">

                                <button class="dropdown-toggle register-information-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    &#x1F6C8
                                </button>
                                <p class="dropdown-menu p-2">
                                    Utilizza la mail con la quale pubblichi i tuoi annunci <span class="text-warning">&#9993;</span>
                                </p>

                            </div>
                        </div>
                        
                        {{-- immagine profilo --}}

                        <div class="mb-4 d-flex register-input">
                            <label for="profile_pic" class="col-md-4 col-form-label text-md-right">Foto profilo</label>

                            <div class="col-md-6">
                                <input id="profile_pic" type="file" class="form-control" name="profile_pic" accept=".jpg,.png,.jpeg,.webp">

                                @error('profile_pic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- dropdown information --}}
                            <div class="btn-group ps-3">

                                <button class="dropdown-toggle register-information-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    &#x1F6C8
                                </button>
                                <p class="dropdown-menu p-2">
                                    Utilizza la mail con la quale pubblichi i tuoi annunci <span class="text-warning">&#9993;</span>
                                </p>

                            </div>
                        </div>

                        {{-- password --}}
                        <div class="mb-4 d-flex register-input">

                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password *') }}</label>

                            <div class="col-md-6">
                                
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" min="8">
                                <span id="password-short-alert" class="text-danger d-none">La password deve avere contenere almeno 8 caratteri!</span>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            {{-- dropdown information --}}
                            <div class="btn-group ps-3">

                                <button class="dropdown-toggle register-information-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    &#x1F6C8
                                </button>
                                <p class="dropdown-menu p-2">
                                    La password deve contenere almeno 8 caratteri e almeno una lettera maiuscola <span class="text-danger"><b>&#33;</b></span>
                                </p>

                            </div>
                            
                        </div>

                        {{-- confirmation password --}}
                        <div class="mb-4 d-flex register-input">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password *') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <span id="password-length-alert" class="d-none text-danger">Le password non hanno la stessa lunghezza!</span>
                            </div>

                            {{-- dropdown information --}}
                            <div class="btn-group ps-3">

                                <button class="dropdown-toggle register-information-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    &#x1F6C8
                                </button>
                                <p class="dropdown-menu p-2">
                                    Devi inserire la password <b>uguale</b> a come l'hai scritta sopra, occhio alle maiuscole &#128521;
                                </p>

                            </div>

                        </div>

                        <div class="mb-4 d-flex mb-0 profile-register-button">
                            <div class="col-md-6 offset-md-4">
                    
                                <button type="submit" class="profile-register-btn" onclick="verifyShortPassAndLength(event)" id="button">
                                    {{ __('Registrati') }}
                                    <div class="icon">
                                      <svg
                                        height="24"
                                        width="24"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                      >
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                          d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
                                          fill="currentColor"
                                        ></path>
                                      </svg>
                                    </div>
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Funzione per verificare che la lunghezza della password sia la stessa in entrambi gli input

    function verifyPassLength(event){

        event.preventDefault();

        const password = document.getElementById('password').value;
        
        const confPassword = document.getElementById('password-confirm').value;

        const passAlert = document.getElementById('password-length-alert');

        if (password.length !== confPassword.length) {

            passAlert.classList.remove('d-none');

            passAlert.classList.add('d-block');

            return false;
            
        } else {
            passAlert.classList.remove('d-block');

            passAlert.classList.add('d-none');
        
            return true;
        }
    }

    function verifyShortPassword(event){

        event.preventDefault();

        const password = document.getElementById('password').value;

        const passShortAlert = document.getElementById('password-short-alert');

        if(password.length < 8) {

            passShortAlert.classList.remove('d-none');

            passShortAlert.classList.add('d-block');

            return false;

        } else {
            
            passShortAlert.classList.remove('d-block');

            passShortAlert.classList.add('d-none');

            return true;
        }
    }

    function verifyShortPassAndLength(event) {

        if(verifyPassLength(event) && verifyShortPassword(event) && checkDate(event)) {

            document.getElementById('password').closest('form').submit();

        };
    }

    function checkDate(event){

        const docdate = document.getElementById("date_of_birth").value;
        const alertdate= document.getElementById('alert-date');
        // Ottieni il valore dell'input data

        const datastring = docdate.substring(0, 4)

            // Confronta le date
        if ((datastring) > 2006 || (datastring) < 1923 & docdate) {
        alertdate.classList.remove('d-none');
        alertdate.classList.add('d-block');

        return false

        } else {
            alertdate.classList.remove('d-block');
            alertdate.classList.add('d-none');

            return true
        }    
    }
</script>
@endsection
