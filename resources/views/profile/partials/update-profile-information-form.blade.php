<section>
    <header>
        <h2 class="text-secondary profile-inf-title">
            {{ __('Informazioni Profilo') }}
        </h2>

        <p class="mt-1 text-muted text-upd-profile">
            {{ __("Aggiorna le informazioni e l'email del tuo profilo ") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 form-upd-profile" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="mb-2">
            <label for="name">{{__('Nome')}}</label>
            <input class="form-control" type="text" name="name" id="name" autocomplete="name" value="{{old('name', $user->name)}}" required autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->get('name')}}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="surname">{{__('Cognome')}}</label>
            <input class="form-control" type="text" name="surname" id="surname" autocomplete="surname" value="{{old('surname', $user->surname)}}" required autofocus>
            @error('surname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->get('surname')}}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="date_of_birth">{{__('Data di Nascita')}}</label>
            <input class="form-control" type="date" name="date_of_birth" id="date_of_birth" autocomplete="date_of_birth" value="{{old('date_of_birth', $user->date_of_birth)}}" autofocus>
            @error('date_of_birth')
            <span class="invalid-feedback" role="alert">
                <strong>Devi avere tra 16 e 100 anni</strong>
                {{-- <strong>{{$errors->get('date_of_birth')}}</strong> --}}
            </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="profile_pic">{{__('Cambia Foto Profilo')}}</label>
            <input class="form-control" type="file" name="profile_pic" id="profile_pic" accept=".png, .jpg, .jpeg, .webp">
            <div class="profile-wrap">
                @if (isset($user->profile_pic))
                    <span> La tua immagine profilo attuale: </span>
                    <img class="profile-pic" src="{{asset('storage/'. $user->profile_pic)}}">
                @else
                    <span>Non hai ancora scelto una immagine di profilo</span>
                @endif
                
            </div>           
        </div>

        <div class="mb-2">
            <label for="email">
                {{__('Email') }}
            </label>

            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email)}}" required autocomplete="username" />

            @error('email')
            <span class="alert alert-danger mt-2" role="alert">
                <strong>{{ $errors->get('email')}}</strong>
            </span>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-muted">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification" class="btn btn-outline-dark">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 text-success">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
                @endif
            </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-4 pt-3">
            <button class="register-btn" type="submit">{{ __('Salva') }}</button>

            @if (session('status') === 'profile-updated')
            <script>
                const show = true;
                setTimeout(() => show = false, 2000)
                const el = document.getElementById('profile-status')
                if (show) {
                    el.style.display = 'block';
                }
            </script>
            <p id='profile-status' class="fs-5 text-muted"><small>{{ __('Salvato') }}</small></p>
                
            @else
                <p id='profile-status' class="fs-5 text-muted mb-0"><small>Non salvato</small></p>
            @endif
        </div>
    </form>
</section>
