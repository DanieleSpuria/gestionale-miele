@extends('layouts.app')
@section('content')

<a href="{{ route('app.clients.create') }}">Aggiungi</a>

<div class="d-flex flex-column">
@foreach ($clients as $client)

  <ul class="d-flex">
    <li>{{ $client->firstName }} {{ $client->lastName }} | {{ $client->address }} | {{ $client->telephone_number }}</li>
    <a href="{{ route('app.clients.show', $client) }}">Vedi</a>
    <a href="{{ route('app.clients.edit', $client) }}">Modifica</a>
    <form action="{{ route('app.clients.destroy', $client) }}" method="POST">
      @csrf
      @method('DELETE')

      <button type="submit">Cancella</button>
    </form>
  </ul>

@endforeach
</div>

@endsection
