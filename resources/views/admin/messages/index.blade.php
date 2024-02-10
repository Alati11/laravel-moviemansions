@extends('layouts.app')

@section('content')
<section>
    <h1>Messaggi</h1>
    @foreach ($buildings as $building)
    <p>In riferimento all'appartamento: </p>
    <span>{{$building->title}} </span>
        @foreach ($building->messages as $message)
        <div>
            <p>Inviato da: </p>
            <p>{{ $message->name}}</p>
            <p>{{ $message->surname}}</p>
            <p>Mail:</p>
            <p>{{ $message->guest_email}}</p>
            <p>Contenuto:</p>
            <p>{{ $message->text}}</p>
        </div>
        @endforeach
    
    @endforeach
    
</section>
@endsection