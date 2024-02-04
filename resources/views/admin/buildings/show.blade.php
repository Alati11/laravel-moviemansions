@extends('layouts.app');

@section('content')
    <section>
        <div class="container">

            <div class="row">
                <h2>{{$building->title}}</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-10">
                    <img src="{{ asset('storage/'. $building->image)}}" alt="">
                </div>
                <div class="col-10">
                    <img src="{{ asset('storage/img/buildings/batman.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection