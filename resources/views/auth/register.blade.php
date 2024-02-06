@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- name --}}
                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name *') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- surname --}}
                        <div class="mb-4 row">
                            <label for="surname *" class="col-md-4 col-form-label text-md-right">{{ __('Surname *') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- date of birth --}}
                        <div class="mb-4 row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth (Optional)') }}</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" autocomplete="date_of_birth" autofocus>

                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Your age must be between 16 and 100 years old</strong>
                                </span>
                                @enderror

                                <span class="d-none text-danger" id="alert-date">DevI avere tra 16 e 100 anni</span>
                            </div>
                        </div>

                        {{-- email --}}
                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address *') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- password --}}
                        <div class="mb-4 row">
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
                            <div class="col-1">
                                <div class="btn-group dropend">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        &#9432;
                                    </button>
                                    <ul class="dropdown-menu p-2">
                                        <li>La password deve avere almeno 8 caratteri</li>
                                        <li>La password deve avere almeno una lettera maiuscola ed una minuscola</li>
                                        <li>La password deve contenere almeno un numero</li>
                                    </ul>
                                </div>

                            </div>
                            
                        </div>

                        {{-- confirmation password --}}
                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password *') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <span id="password-length-alert" class="d-none text-danger">Le password non hanno la stessa lunghezza!</span>
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" onclick="verifyShortPassAndLength(event)" id="button">
                                    {{ __('Register') }}
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
        if ((datastring) > 2006 || (datastring) < 1923) {
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
