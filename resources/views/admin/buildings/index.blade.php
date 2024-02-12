@extends('layouts.app')

@section('content')
    <section>
        @if(session()->has('message_destroy'))
            <div class="container p-2 w-50 mx-auto">
                <div class="alert alert-danger text-center">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session()->get('message_destroy') }}
                </div>
            </div>
        @endif
        <div class="container">
            <div class="row">
                {{-- Se ci sono appartamenti --}}
                @if ($buildings->count() > 0)
                <div class="py-5 d-flex justify-content-center index-header align-items-center gap-3">
                    <h2 class="text-secondary mb-0">I tuoi immobili</h2>
                    <img class="pb-4" src="{{Vite::asset('resources/img/icons/my-mansions.png')}}" alt="">
                </div>

                <div class="col-12 d-flex flex-column align-items-center">
                    @foreach ($buildings as $building)

                        {{-- Modale --}}
                        <div class="modal fade" id="modal-{{$building->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Attenzione <span>&#9888;</span></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h3>Vuoi davvero eliminare <span class="color-green">{{$building->title}}</span> ?</h3>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info text-light" data-bs-dismiss="modal">Annulla</button>
                                        <form action="{{route('admin.buildings.destroy', $building->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Elimina</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Fine modale --}}

                        {{--buildings card --}}

                            <div class="card mb-5 w-50">

                                <img class="" src="{{asset('storage/'. $building->image)}}" class="card-img-top" alt="...">

                                <div class="card-body">
                                    <h5 class="card-title-index">{{$building->title}}</h5>

                                    <p class="address mb-3">
                                        <img src="{{Vite::asset('resources/img/icons/maps.png')}}" alt="">
                                    {{$building->address}}
                                    </p>

                                    {{--card buttons --}}
                                    <div class="card-buttons d-flex gap-3 mb-3">

                                        {{-- Show button --}}
                                        <a href="{{route('admin.buildings.show', $building->id)}}">
                                            <button class="btn btn-sm btn-primary show-btn-index">
                                                <b>Dettagli</b>
                                            </button>
                                        </a>
                                        

                                        {{-- modify button --}}
                                        <button class="btn btn-sm btn-warning btn-edit-index">
                                            <b>Modifica</b>
                                        </button>
                                        
                                        {{-- delete button --}}
                                        <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#modal-{{$building->id}}">
                                            <b>Elimina</b>
                                        </button>

                                        {{-- Sponsorship button --}}
                                        <a href="{{ route('admin.sponsorships.index') }}">
                                            <button class="bg-primary">Sponsorizza</button>
                                        </a>
                                    </div>

                                    <p class="card-text"><small class="text-body-secondary">Last update: {{$building->updated_at}} </small></p>

                                </div> 
                            </div>
                    @endforeach
                </div>

                {{-- Se non ci sono appartamenti --}}
                @else
                <div class="col-9 d-flex flex-column justify-content-center align-items-center py-5">
                    <h3 class="pb-4">Non hai ancora registrato nessun appartamento, inizia ora!</h3>
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
            </div>
        </div>
    </section>
@endsection