@extends('layouts.app')
@section('content')

<a href="{{ route('app.caps.create') }}">Aggiungi</a>

<div class="d-flex flex-column">
@foreach ($caps as $cap)

  <ul class="d-flex">
    <li>{{ $cap->weight }} kg | {{ $cap->quantity }}</li>
    <a href="{{ route('app.caps.edit', $cap) }}">Modifica</a>
    <form action="{{ route('app.caps.destroy', $cap) }}" method="POST">
      @csrf
      @method('DELETE')

      <button type="submit">Cancella</button>
    </form>
  </ul>

@endforeach
</div>

@endsection
