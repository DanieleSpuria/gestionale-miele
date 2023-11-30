@extends('layouts.app')
@section('content')

<form action="{{ $route }}" method="POST">
  @csrf
  @method($method)

  <div>
    <label for="client">Cliente</label>
    <select name="client">
      <option value="" disabled selected>Seleziona</option>
      @foreach($clients as $client)
       <option value="{{ $client->id }}">{{ $client->firstName }}</option>
      @endforeach
    </select>
  </div>


  <div class="d-flex ds-bowl">
    <div>
      <label for="quality">Qualità</label>
      <select name="order_bowls[0][quality]">
        <option value="" disabled selected>Seleziona</option>
        @foreach($qualities as $quality)
         <option value="{{ $quality->id }}">{{ $quality->name }}</option>
        @endforeach
      </select>
    </div>

    <div>
      <label for="weight">Peso</label>
      <select name="order_bowls[0][weight]">
        <option value="" disabled selected>Seleziona</option>
        @foreach($bowls as $bowl)
         <option value="{{ $bowl->id }}">{{ $bowl->weight }} kg</option>
        @endforeach
      </select>
    </div>

    <div>
      <label for="quantity">Quantità</label>
      <input type="number" name="order_bowls[0][quantity]">
    </div>
  </div>

  <div id="btn" class="btn border border-dark" onclick="add()">+</div>

  <button type="submit">{{ $btn }}</button>
</form>


<script>
  let index = 1; // Inizializza l'indice per i nuovi blocchi

  function add() {
    let bowl = document.querySelector('.ds-bowl');
    let btn = document.getElementById('btn');
    let addBowl = bowl.cloneNode(true);

    // Incrementa l'indice per il nuovo blocco
    addBowl.setAttribute('data-index', index);

    // Aggiorna i nomi dei campi di input nel nuovo blocco
    addBowl.querySelectorAll('select, input').forEach((element) => {
      let name = element.getAttribute('name');
      element.setAttribute('name', name.replace('[0]', '[' + index + ']'));
    });

    bowl.parentNode.insertBefore(addBowl, btn);
    index++; // Incrementa l'indice per il prossimo blocco
  }
</script>
@endsection
