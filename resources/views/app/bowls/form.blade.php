@extends('layouts.app')
@section('content')

<form action="{{ $route }}" method="POST">
  @csrf
  @method($method)

  <div>
    <label for="weight">Peso boccia</label>
    <input type="number" step="0.01" name="weight" value="{{ old('name', $bowl?->weight) }}">
  </div>

  <div>
    <label for="quantity">Quantità</label>
    <input type="number" name="quantity" value="{{ old('quantity', $bowl?->quantity) }}">
  </div>

  <button type="submit">{{ $btn }}</button>
</form>

@endsection
