@extends('layouts.app')
@section('content')

<a href="{{ route('app.qualities.create') }}">Aggiungi</a>

<div class="d-flex flex-column" >
@foreach ($qualities as $quality)

  <ul class="d-flex">
    <li>{{ $quality->name }} | {{ $quality->quantity }} kg</li>
    <a href="{{ route('app.qualities.edit', $quality) }}">Modifica</a>
    <form action="{{ route('app.qualities.destroy', $quality) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler cancellare questa qualità di miele?')">
      @csrf
      @method('DELETE')

      <button type="submit">Cancella</button>
    </form>
  </ul>

@endforeach
</div>

@endsection
