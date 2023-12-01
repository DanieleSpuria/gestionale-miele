@extends('layouts.app')
@section('content')

<a href="{{ route('app.orders.create') }}">Aggiungi</a>

<div class="d-flex flex-column">
@foreach ($orders as $order)

  <ul class="d-flex">
    <li> @if ($order->status) Chiuso @else Aperto @endif | {{ $order->total }} &euro; | data: {{ $order->date }}</li>
    <a href="{{ route('app.orders.show', $order) }}">Vedi</a>
    <a href="{{ route('app.orders.edit', $order) }}">Modifica</a>
    <form action="{{ route('app.orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler cancellare l\'ordine?')">
      @csrf
      @method('DELETE')

      <button type="submit">Cancella</button>
    </form>
  </ul>

@endforeach
</div>

@endsection
