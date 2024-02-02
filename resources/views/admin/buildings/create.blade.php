@extends('layouts.app');

@section('content')

<section>
    <div class="container">
        <h1> Aggiungi un Appartamento</h1>
        <form action="{{route('admin.buildings.store')}}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Nome Appartamento</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Es: Harry Potter House" value="{{old('title')}}">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Carica un'immagine di Copertina</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo Appartamento</label>
                <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" name="description" id="description" rows="4" placeholder="Es: E' una casa molto bella">{{old('description')}}</textarea>
            </div>

            <div class="form-group">
                <label for="available">Disponibile:</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="available" name="available" value="1">
                    <label class="form-check-label" for="available">Sì</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="rooms" class="form-label">N. Stanze</label>
                <input type="number" class="form-control" name="rooms" id="rooms" value="{{old('rooms')}}">
            </div>

            <div class="mb-3">
                <label for="bathrooms" class="form-label">N. Bagni</label>
                <input type="number" class="form-control" name="bathrooms" id="bathrooms" value="{{old('bathrooms')}}">
            </div>

            <div class="mb-3">
                <label for="beds" class="form-label">N. Letti</label>
                <input type="number" class="form-control" name="beds" id="beds" value="{{old('beds')}}">
            </div>

            <div class="mb-3">
                <label for="sqm" class="form-label">Metri quadrati</label>
                <input type="number" class="form-control" name="sqm" id="sqm" value="{{old('sqm')}}">
            </div>
    
            <p class="mb-3">Seleziona uno o più servizi</p>
            <div class="d-flex flex-wrap mb-3">
            @foreach ($services as $service)
                <div class="form-check me-3">
                    <label class="form-check-label" for="service-{{$service->id}}">
                        {{$service->name}}
                    </label>
                    <input name="services[]" class="form-check-input" type="checkbox" value="{{$service->id}}" id="service-{{$service->id}}" @checked(in_array($service->id, old('services', [])))>
                </div>    
            @endforeach
            </div>
        

            <select name="sponsorship_id" class="form-control mb-3" id="sponsorship_id">
                <option>Scegli una Sponsorizzazione (Opzionale)</option>
                @foreach($sponsorships as $sponsorship)
                    <option @selected(old('sponsorship_id') == $sponsorship->id) value="{{ $sponsorship->id }}">{{ $sponsorship->name }}</option>
                @endforeach
            </select>
    
            <div>
                <input type="submit" class="btn btn-primary" value="Aggiungi">
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

@endsection