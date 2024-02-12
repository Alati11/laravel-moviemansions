@extends('layouts.app')

@section('content')
<h1>Show: {{ $sponsorship->name }}</h1>
<select name="payment" id="payment">
    @foreach ($buildings as $building)
        <option value="">{{ $building->title }}</option>
    @endforeach
</select>
    <button>Paga</button>
</a>
@endsection

