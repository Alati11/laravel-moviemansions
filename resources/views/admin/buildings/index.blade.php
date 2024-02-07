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
            <div class="row justify-content-center">
                @if ($buildings->count() > 0)
                <div class="col-9">
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
                        <div class="row tbl">
                            <div class="col-1 tbl-item">
                                <p><b>{{$building->id}}</b></p>
                            </div>
                            
                            <div class="col tbl-item">
                                <h5>{{$building->title}}</h5>
                            </div>

                            <div class="col tbl-item">
                                <p>{{$building->address}}</p>
                            </div>
                            
                            <div class="col tbl-item">
                                <span><a href="{{route('admin.buildings.show', $building->id)}}" class="btn btn-sm btn-primary">Vedi</a></span>
                                <button type="button" class="btn btn-danger mx-2" data-bs-toggle="modal" data-bs-target="#modal-{{$building->id}}">Elimina</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                @else
                <div class="col-9 d-flex flex-column justify-content-center align-items-center">
                    <h2>Non hai ancora registrato nessun appartamento!</h2>
                    <span><a href="{{route('admin.buildings.create')}}" class="btn btn-sm btn-primary fs-3">Registrane uno</a></span>
                </div>
                @endif
            </div>
        </div>
    </section>
@endsection