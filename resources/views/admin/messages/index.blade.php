@extends('layouts.app')

@section('content')
<section class="section-msg">
    <h1 class="title-msg" >Messaggi</h1>
    @foreach ($buildings as $building)
        <div class="building-wrap">
            <h4>In riferimento all'appartamento: 
                <span>{{$building->title}} </span>
            </h4>
            @if ($building->messages)
                
            @foreach ($building->messages as $message)

            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$message->id}}" aria-expanded="false" aria-controls="collapse{{$message->id}}">
                        From: {{$message->name . ' ' . $message->surname}}
                        </button>
                    </h2>
                    <div id="collapse{{$message->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div>
                                <p>Inviato da: 
                                    <span>{{ $message->name}}</span>
                                    <span class="surname">{{ $message->surname}}</span>
                                </p>
                                
                                <p>E-mail:
                                    <span>{{ $message->guest_email}}</span>
                                </p>
                                
                                <p>Contenuto:
                                    <span>{{ $message->text}}</span>
                                </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @else
            <p>Non hai ricevuto messaggi per questo edificio</p>
            @endif
        </div>
    @endforeach


   
        
        
    
   
    
</section>
@endsection