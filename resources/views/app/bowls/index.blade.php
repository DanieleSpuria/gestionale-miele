@extends('layouts.app')
@section('content')

<a href="{{ route('app.bowls.create') }}">Aggiungi</a>

<div class="d-flex flex-column">
@foreach ($bowls as $bowl)

  <ul class="d-flex">
    <li>{{ $bowl->weight }} kg | {{ $bowl->quantity }}</li>
    <a href="{{ route('app.bowls.edit', $bowl) }}">Modifica</a>
    <form action="{{ route('app.bowls.destroy', $bowl) }}" method="POST">
      @csrf
      @method('DELETE')

      <button type="submit">Cancella</button>
    </form>
  </ul>

@endforeach
</div>

@endsection
