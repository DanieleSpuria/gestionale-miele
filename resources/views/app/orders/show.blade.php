@extends('layouts.app')
@section('content')

<div>
  <ul>
    <li>Stato: @if ($order->status) Chiuso @else Aperto @endif</li>
    <li>Cliente: {{ $order->client->firstName }} {{ $order->client->lastName }}</li>
    <li>Indirizzo: {{ $order->client->address }}</li>
    <li>Numero: {{ $order->client->telephone_number }}</li>
    <li>Totale: {{ $order->total }} &euro;</li>
    <li>Data: {{ $order->date }}</li>
  </ul>

  @foreach ($order->bowls as $bowl)
    <ul>
      <li>Quantità: {{ $bowl->pivot->quantity }}</li>
      @foreach ($qualities as $quality)
        @if ($quality->id == $bowl->pivot->quality_id)
          <li>Qualità: {{ $quality->name }}</li>
        @endif
      @endforeach
      <li>{{ $bowl->weight }} kg</li>
      <li>{{ $bowl->pivot->price }} &euro;</li>
    </ul>
  @endforeach
</div>

@endsection
