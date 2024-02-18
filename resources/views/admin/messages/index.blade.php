@extends('layouts.app')

@section('content')
<section class="section-msg">
    <div class="py-5 d-flex justify-content-end">
        <div class="d-flex flex-column align-items-center messages-img">
            <img src="{{Vite::asset('resources/img/icons/messages.png')}}" alt="">
            <small class="title-msg">Messaggi</small>
        </div>
    </div>
    @if ($buildings->count() !== 0)
    <div class="">
        <select class="form-select msg" name="chose-building" id="chose-building">
            <option value="" >Scegli uno dei tuoi appartamenti</option>
            @foreach ($buildings as $building)
            <option value="{{ $building->id }}">{{$building->title}}</option>
            @endforeach
        </select>
    </div>
    

    <div class="fun-wrap">
        <img id="icon-msg-fun" src="{{Vite::asset('resources/img/icons/msg-fun.png')}}" alt="">
    </div>
    

    @foreach ($buildings as $building)

        <div class="building-wrap" id="{{$building->id}}">
            @if ($building->messages->count() !== 0)
            @foreach ($building->messages as $message)

            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$message->id}}" aria-expanded="false" aria-controls="collapse{{$message->id}}">
                            <i class="fa-solid fa-user me-2"></i>
                            {{$message->name . ' ' . $message->surname}}
                        </button>
                    </h2>
                    <div id="collapse{{$message->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="msg-wrap">
                                <div class="user-wrap">
                                    <p>
                                        <i class="fa-solid fa-user me-2"></i>
                                        <span>{{ $message->name}}</span>
                                        <span class="surname">{{ $message->surname}}</span>
                                    </p>
                                    <p>( {{ $message->guest_email}} )</p>
                                </div>
                                
                                
                                <p class="balloon">
                                    <span>{{ $message->text}}</span>
                                </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @else
            {{-- se non ci sono messaggi nell'appartamento --}}
            <div class="no-messages">
                <p>Non hai ancora ricevuto messaggi per questo edificio! 
                    <i class="fa-solid fa-heart-crack"></i>
                <p>
            </div>
            @endif
        </div>
    @endforeach
    @else
    {{-- se non ci sono appartamenti --}}
    <div class="col-9 d-flex flex-column justify-content-center align-items-center py-5">
        <div class="info mb-5 info-no-buildings">
            <div class="info__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none"><path fill="#393a37" d="m12 1.5c-5.79844 0-10.5 4.70156-10.5 10.5 0 5.7984 4.70156 10.5 10.5 10.5 5.7984 0 10.5-4.7016 10.5-10.5 0-5.79844-4.7016-10.5-10.5-10.5zm.75 15.5625c0 .1031-.0844.1875-.1875.1875h-1.125c-.1031 0-.1875-.0844-.1875-.1875v-6.375c0-.1031.0844-.1875.1875-.1875h1.125c.1031 0 .1875.0844.1875.1875zm-.75-8.0625c-.2944-.00601-.5747-.12718-.7808-.3375-.206-.21032-.3215-.49305-.3215-.7875s.1155-.57718.3215-.7875c.2061-.21032.4864-.33149.7808-.3375.2944.00601.5747.12718.7808.3375.206.21032.3215.49305.3215.7875s-.1155.57718-.3215.7875c-.2061.21032-.4864.33149-.7808.3375z"></path></svg>
            </div>
            <div class="info__title">
                <b>Non hai ancora registrato nessun appartamento!</b>
            </div>
        </div>

        <a href="{{route('admin.buildings.create')}}">
            <button class="register-btn">
                Registrane uno
                <div class="arrow-wrapper">
                    <div class="arrow"></div>
                </div>
            </button>
        </a>       
    </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const selectElement = document.getElementById('chose-building');

        selectElement.addEventListener('change', function () {
            let selectedValue = this.value;

            const allElements = document.querySelectorAll('.show-building');
            allElements.forEach(function (element) {
                element.classList.remove('show-building');
            })
            
            let selectedElement = document.getElementById(selectedValue);
            console.log('Valore selezionato:', selectedElement);

            if (selectedElement) {
                selectedElement.classList.add('show-building');
            }

            const icon = document.getElementById('icon-msg-fun');
            icon.classList.add('hide-icon')
        });
    });


    </script>

</section>
@endsection