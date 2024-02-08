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
                <div class="py-5 d-flex justify-content-center">
                    <h2 class="color-green"><b>I miei Immobili</b></h2>
                </div>

                <div class="col-10 d-flex justify-content-center">
                    @foreach ($buildings as $building)
                        {{-- Modale --}}
                        <div class="modal fade" id="modal-{{$building->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Attenzione</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h3>Vuoi davvero eliminare {{$building->title}}?</h3>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Annulla</button>
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

                        {{--buildings cards --}}

                            <div class="card mb-3 w-50">
                                <img class="" src="{{asset('storage/'. $building->image)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    @endforeach
                </div>
                @else
                {{-- Se non ci sono appartamenti --}}
                <div class="col-9 d-flex flex-column justify-content-center align-items-center py-5">
                    <h3>Non hai ancora registrato nessun appartamento, inizia ora!</h3>
                    <span><a href="{{route('admin.buildings.create')}}" class="register-btn"><b>Registrane uno</b></a></span>
                </div>
                @endif
            </div>
        </div>
    </section>
@endsection