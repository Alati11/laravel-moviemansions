@extends('layouts.app');

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
                <div class="col-9">
                    @foreach ($buildings as $building)
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
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection