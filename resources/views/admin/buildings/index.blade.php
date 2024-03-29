@extends('layouts.app')

@section('content')
    <section>
        @if(session()->has('message_destroy'))
            <div class="container p-4 w-50 mx-auto">
                <div class="alert alert-danger text-center">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session()->get('message_destroy') }}
                </div>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="pt-5 d-flex index-header align-items-center justify-content-end gap-3">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{Vite::asset('resources/img/icons/my-apartments.png')}}" alt="">
                        <p>
                            <small class="mb-0 title-section">I tuoi immobili</small>
                        </p>
                    </div>
                </div>
                
                {{-- Se ci sono appartamenti --}}
                @if ($buildings->count() > 0)

                <div class="d-flex flex-wrap justify-content-center row-gap-5 py-5">
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
                                        <p>
                                            <small>
                                                Ricordati che perderai tutte le informazioni associate a questo immobile e non sarà più visibile per nessuno.
                                            </small>
                                        </p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-info btn-cancel text-light" data-bs-dismiss="modal">Annulla</button>
                                        <form action="{{route('admin.buildings.destroy', $building->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-delete-building">Elimina</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Fine modale --}}

                        {{--buildings card --}}

                            <div class="col-lg-3 col-md-6 col-12 p-2">
                                <div class="card mb-5 building-card h-100">
                                @if        ($building->sponsorships->isNotEmpty())
                                    <span class="sponsor-active"></span>
                                @endif
                                    

                                    <img src="{{asset('storage/'. $building->image)}}" class="card-img-top img-fluid" alt="...">
    
                                    <div class="card-body d-flex flex-column align-items-center">
                                        <h5 class="card-title-index">{{$building->title}}</h5>
    
                                        <p class="address mb-3">
                                            <img src="{{Vite::asset('resources/img/icons/maps.png')}}" alt="">
                                        {{$building->address}}
                                        </p>
    
                                        {{--card buttons --}}
                                        <div class="card-buttons d-flex flex-wrap gap-3 mb-3 justify-content-center">
    
                                            {{-- Show button --}}
                                            <a href="{{route('admin.buildings.show', $building->id)}}">
                                                <button class="btn btn-sm btn-primary show-btn-index">
                                                    <b>Dettagli</b>
                                                </button>
                                            </a>
                                            
    
                                            {{-- modify button --}}
                                            <a href="{{route('admin.buildings.edit', $building->id)}}">
                                                <button class="btn btn-sm btn-warning btn-edit-index">
                                                    <b>Modifica</b>
                                                </button>
                                            </a>
                                            
                                            
                                            {{-- delete button --}}
                                            <button class="btn btn-sm btn-danger btn-delete-building" type="button" data-bs-toggle="modal" data-bs-target="#modal-{{$building->id}}">
                                                <b>Elimina</b>
                                            </button>
    
                                        </div>
    
                                        <p class="card-text-index">
                                            <small class="text-body-secondary">Ultima Modifica: {{ \Carbon\Carbon::parse($building->updated_at)->format('d F Y H:i') }}</small>
                                        </p>
    
                                        
                                        {{-- @if        ($building->sponsorships->isNotEmpty())
                                            <div>
                                                <span class="badge rounded-pill sponsor-badge position-absolute  text-bg-success ">Sponsor attiva</span>
                                            </div>    
                                        @endif --}}

                                        {{-- Sponsorship button --}}
                                        @if        ($building->sponsorships->isNotEmpty())
                                        <a href="{{ route('admin.sponsorships.index', ['building_id' => $building->id]) }}" class="sponsor-btn">
                                            <button class="btn-sponsor-index">
                                                <div class="original">Estendi Sponsor</div>
                                                <div class="letters">
                                                      
                                                    <span>E</span>
                                                    <span>s</span>
                                                    <span>t</span>
                                                    <span>e</span>
                                                    <span>n</span>
                                                    <span>d</span>
                                                    <span>i</span>
                                                </div>
                                            </button>
                                        </a>
                                
                                        @else
                                        <a href="{{ route('admin.sponsorships.index', ['building_id' => $building->id]) }}" class="sponsor-btn">
                                            <button class="btn-sponsor-index">
                                                <div class="original">Sponsorizza</div>
                                                <div class="letters">
                                                      
                                                    <span>S</span>
                                                    <span>p</span>
                                                    <span>o</span>
                                                    <span>n</span>
                                                    <span>s</span>
                                                    <span>o</span>
                                                    <span>r</span>
                                                    <span>i</span>
                                                    <span>z</span>
                                                    <span>z</span>
                                                    <span>a</span>
                                                </div>
                                            </button>
                                        </a>
                                        @endif
                                    </div> 
                                </div>
                            </div>

                    @endforeach
                </div>

                {{-- Se non ci sono appartamenti --}}
                @else
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
            </div>
        </div>
    </section>
@endsection

