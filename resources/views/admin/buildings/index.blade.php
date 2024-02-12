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

                        {{--buildings card --}}

                            <div class="card mb-5 w-50">

                                <img class="" src="{{asset('storage/'. $building->image)}}" class="card-img-top" alt="...">

                                <div class="card-body">
                                    <h5 class="card-title">{{$building->title}}</h5>

                                    <p class="address mb-3">
                                        <img src="{{Vite::asset('resources/img/icons/maps.png')}}" alt="">
                                    {{$building->address}}
                                    </p>

                                    {{--card buttons --}}
                                    <div class="card-buttons d-flex gap-3 mb-3">

                                        {{-- Show button --}}
                                        <a href="{{route('admin.buildings.show', $building->id)}}">
                                            <button class="show-button btn-btn-primary">
                                                <span class="text">Dettagli</span>
    
                                                <span class="icon">
    
                                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                     width="533.333px" height="533.334px" viewBox="0 0 533.333 533.334" style="enable-background:new 0 0 533.333 533.334;"
                                                     xml:space="preserve">
                                                    <path d="M266.667,175C157.621,175,60.81,227.373,0,308.333c60.81,80.962,157.621,133.334,266.667,133.334
                                                    c109.045,0,205.856-52.372,266.667-133.334C472.523,227.373,375.711,175,266.667,175z M233.333,241.667
                                                    c18.409,0,33.333,14.924,33.333,33.333s-14.924,33.333-33.333,33.333S200,293.409,200,275S214.924,241.667,233.333,241.667z
                                                     M402.924,375.676c-20.648,10.551-42.525,18.678-65.023,24.153c-23.171,5.644-47.137,8.504-71.234,8.504
                                                    c-24.097,0-48.063-2.86-71.233-8.502c-22.497-5.478-44.375-13.604-65.024-24.153c-32.823-16.773-62.616-39.797-87.312-67.344
                                                    c24.697-27.546,54.49-50.572,87.312-67.342c16.841-8.605,34.501-15.597,52.647-20.854c-10.358,15.751-16.39,34.601-16.39,54.862
                                                    c0,55.229,44.772,100,100,100c55.228,0,100-44.771,100-100c0-20.262-6.032-39.111-16.389-54.864
                                                    c18.145,5.258,35.804,12.25,52.646,20.855c32.826,16.77,62.614,39.795,87.312,67.342
                                                    C465.539,335.879,435.749,358.906,402.924,375.676z M448.395,135.271c-56.626-28.934-117.767-43.605-181.729-43.605
                                                    c-63.961,0-125.103,14.671-181.728,43.605C54.328,150.914,25.703,170.639,0,193.645v56.878
                                                    c28.822-30.503,62.861-56.122,100.101-75.151c51.885-26.512,107.926-39.956,166.565-39.956s114.68,13.443,166.564,39.957
                                                    c37.241,19.029,71.28,44.647,100.103,75.151v-56.878C507.63,170.639,479.005,150.914,448.395,135.271z"/>
                                                    </svg>
                                                    
                                                </span>
                                            </button>
                                        </a>
                                        

                                        {{-- modify button --}}
                                        <button class="modify-button">
                                        
                                            <span class="text">Modifica</span>

                                            <span class="icon">

                                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	                                            viewBox="0 0 303.848 303.848" style="enable-background:new 0 0 303.848 303.848;" xml:space="preserve">
	                                            <path d="M297.023,52.375l-3.74-8.728l-50.361,50.348h-33.503l0.026-33.49l49.943-50.039l-9.023-3.618
		                                        c-10.129-4.055-20.739-6.105-31.543-6.105c-46.909,0-85.072,38.156-85.072,85.04c0,9.293,1.53,18.471,4.557,27.327L10.714,240.682
		                                        C3.798,247.584,0,256.775,0,266.543s3.805,18.953,10.714,25.842c6.896,6.915,16.08,10.72,25.849,10.72s18.946-3.805,25.849-10.72
		                                        L189.27,165.533c9.467,3.515,19.383,5.296,29.551,5.296c46.884,0,85.027-38.15,85.027-85.046
		                                        C303.848,74.214,301.553,62.98,297.023,52.375z M218.821,157.975c-9.891,0-19.493-1.986-28.542-5.887l-4.004-1.735L53.323,283.298
		                                        c-8.965,8.965-24.576,8.965-33.529,0c-4.48-4.467-6.947-10.431-6.947-16.755c0-6.337,2.468-12.288,6.947-16.768l133.492-133.472
		                                        l-1.555-3.927c-3.406-8.573-5.135-17.526-5.135-26.594c0-39.801,32.404-72.186,72.218-72.186c5.81,0,11.575,0.701,17.198,2.095
		                                        L196.584,55.19l-0.039,51.665h51.691l40.193-40.181c1.71,6.195,2.558,12.59,2.558,19.113
		                                        C290.994,125.59,258.622,157.975,218.821,157.975z M46.061,265.689c0,5.135-4.165,9.3-9.3,9.3c-5.141,0-9.306-4.165-9.306-9.3
		                                        c0-5.148,4.165-9.312,9.306-9.312C41.89,256.376,46.061,260.541,46.061,265.689z"/>
                                                </svg>
                                            </span>
                                        
                                        </button>
                                        
                                        {{-- delete button --}}
                                        <button class="delete-button" type="button" data-bs-toggle="modal" data-bs-target="#modal-{{$building->id}}">

                                            <span class="text">Elimina</span>

                                            <span class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
                                                </svg>
                                            </span>
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