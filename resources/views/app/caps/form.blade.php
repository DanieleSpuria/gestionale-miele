@extends('layouts.app')
@section('content')

<form action="{{ $route }}" method="POST">
  @csrf
  @method($method)

  <div>
    <label for="weight">Peso</label>
    <input type="number" step="0.01" name="weight" value="{{ old('weight', $cap?->weight) }}">
  </div>

  <div>
    <label for="quantity">Quantità</label>
    <input type="number" name="quantity" value="{{ old('quantity', $cap?->quantity) }}">
  </div>

  <button type="submit">{{ $btn }}</button>
</form>

@endsection
