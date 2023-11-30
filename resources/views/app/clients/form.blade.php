@extends('layouts.app')
@section('content')

<form action="{{ $route }}" method="POST">
  @csrf
  @method($method)

  <div>
    <label for="firstName">Nome</label>
    <input type="text" name="firstName" value="{{ old('firstName', $client?->firstName) }}">
  </div>

  <div>
    <label for="lastName">Cognome</label>
    <input type="text" name="lastName" value="{{ old('lastName', $client?->lastName) }}">
  </div>

  <div>
    <label for="address">Indirizzo</label>
    <input type="text" name="address" value="{{ old('address', $client?->address) }}">
  </div>

  <div>
    <label for="telephone_number">Numero di telefono</label>
    <input type="text" name="telephone_number" value="{{ old('telephone_number', $client?->telephone_number) }}">
  </div>

  <button type="submit">{{ $btn }}</button>
</form>

@endsection
