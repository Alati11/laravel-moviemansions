@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            @foreach ($sponsorships as $sponsorship)
                <div class="d-flex gap-3">
                    <p>{{ $sponsorship->name }}</p>
                    <span>{{ $sponsorship->price }}</span>
                   <a href="{{ route('admin.sponsorships.show', $sponsorship->id) }}">
                    <button>Vedi</button>
                   </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection

