@extends('layouts.app')
@section('content')

<div>
  <ul>
    <li>{{ $client->firstName }} {{ $client->lastName }}</li>
    <li>{{ $client->address }}</li>
    <li>{{ $client->telephone_number }}</li>
  </ul>

  <h3>Ordini:</h3>

  @foreach ($orders as $order)
    <ul>
      <li>
        Stato:
        @if ($order->status)
          Chiuso
        @else
          Aperto
        @endif
      </li>
      <li>Totale: {{ $order->total }} &euro;</li>
      <li>Data: {{ $order->date }}</li>
      <li>
        Bocce:
        @foreach ($order->bowls as $bowl)
          <ul>
            <li>{{ $bowl->pivot->quantity }}</li>
            @foreach ($qualities as $quality)
              @if ($quality->id == $bowl->pivot->quality_id)
                <li>Qualità: {{ $quality->name }}</li>
              @endif
            @endforeach
            <li>Peso: {{ $bowl->weight }} kg</li>
            <li>Prezzo: {{ $bowl->pivot->price }} &euro;</li>
          </ul>
        @endforeach
      </li>
    </ul>
  @endforeach
</div>

@endsection
