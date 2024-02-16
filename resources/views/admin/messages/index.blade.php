@extends('layouts.app')

@section('content')
<section class="section-msg">
    <div class="py-5 d-flex justify-content-end">
        <div class="d-flex flex-column align-items-center messages-img">
            <img src="{{Vite::asset('resources/img/icons/messages.png')}}" alt="">
            <small class="title-msg">Messaggi</small>
        </div>
    </div>
    
    @foreach ($buildings as $building)
        <div class="building-wrap">
            <h4 class="accordion-title">
                <img src="{{Vite::asset('resources/img/header-house.png')}}" alt="">
                <span>{{$building->title}} </span>
            </h4>
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
            <div class="no-messages">
                <p>Non hai ancora ricevuto messaggi per questo edificio! 
                    <i class="fa-solid fa-heart-crack"></i>
                <p>
            </div>
            @endif
        </div>
    @endforeach


   
        
        
    
   
    
</section>
@endsection