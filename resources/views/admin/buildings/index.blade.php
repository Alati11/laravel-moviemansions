@extends('layouts.app');

@section('content')
    <section>
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
                                <p>buttons</p>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection