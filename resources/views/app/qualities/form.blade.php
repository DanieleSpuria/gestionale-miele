@extends('layouts.app')
@section('content')

  <form action="{{ $route }}" method="POST">
    @csrf
    @method($method)

    <div>
      <label for="name">Nome qualità</label>
      <input type="text" name="name" value="{{ old('name', $quality?->name) }}">
    </div>

    <div>
      <label for="quantity">Quantità</label>
      <input type="number" name="quantity" value="{{ old('quantity', $quality?->quantity) }}">
    </div>

    <button type="submit">{{ $btn }}</button>
  </form>

@endsection
