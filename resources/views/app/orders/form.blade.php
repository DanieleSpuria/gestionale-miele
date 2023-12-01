@extends('layouts.app')
@section('content')

<form action="{{ $route }}" method="POST">
  @csrf
  @method($method)

  <script>
    let index = 0;
  </script>

  <div>
    <label for="client">Cliente</label>
    <select name="client">
      <option value="" disabled selected>Seleziona</option>
      @foreach($clients as $client)
       <option value="{{ $client->id }}" @if ($client->id == $order->client_id) selected @endif>{{ $client->firstName }}</option>
      @endforeach
    </select>
  </div>

  @if ($edit)
    @for ($i = 0; $i < $order->bowls->count(); $i++)

      <script>
        index++
      </script>

      <div class="d-flex ds-bowl">
        <div>
          <label for="quality">Qualità</label>
          <select name="order_bowls[{{ $i }}][quality]">
            <option value="" disabled selected>Seleziona</option>
            @foreach($qualities as $quality)
            <option
              value="{{ $quality->id }}"
              @if ($order->bowls[$i]->pivot->quality_id == $quality->id)
                selected
              @endif
            >{{ $quality->name }}</option>
            @endforeach
          </select>
        </div>

        <div>
          <label for="weight">Peso</label>
          <select name="order_bowls[{{ $i }}][weight]">
            <option value="" disabled selected>Seleziona</option>
            @foreach($bowls as $bowl)
            <option
              value="{{ $bowl->id }}"
              @if ($order->bowls[$i]->pivot->bowl_id == $bowl->id)
                selected
              @endif
            >{{ $bowl->weight }} kg</option>
            @endforeach
          </select>
        </div>

        <div>
          <label for="quantity">Quantità</label>
          <input
            type="number"
            name="order_bowls[{{ $i }}][quantity]"
            value="{{ old('quantity', $order->bowls[$i]?->pivot->quantity) }}"
          >
        </div>


        <div class="btn border border-dark" onclick="del(this)">-</div>
      </div>

    @endfor
  @else

  <div class="d-flex ds-bowl">
    <div>
      <label for="quality">Qualità</label>
      <select name="order_bowls[0][quality]">
        <option value="" disabled selected>Seleziona</option>
        @foreach($qualities as $quality)
        <option
          value="{{ $quality->id }}"
        >{{ $quality->name }}</option>
        @endforeach
      </select>
    </div>

    <div>
      <label for="weight">Peso</label>
      <select name="order_bowls[0][weight]">
        <option value="" disabled selected>Seleziona</option>
        @foreach($bowls as $bowl)
        <option
          value="{{ $bowl->id }}"
        >{{ $bowl->weight }} kg</option>
        @endforeach
      </select>
    </div>

    <div>
      <label for="quantity">Quantità</label>
      <input
        type="number"
        name="order_bowls[0][quantity]"
      >
    </div>

    <div class="btn border border-dark" onclick="del(this)">-</div>
  </div>

  @endif
  <div id="btn" class="btn border border-dark" onclick="add()">+</div>

  <button type="submit">{{ $btn }}</button>
</form>


<script>
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
      element.value = '';
    });

    bowl.parentNode.insertBefore(addBowl, btn);
    index++; // Incrementa l'indice per il prossimo blocco
  }

  function del(div) {
    let divRmv = div.closest('.ds-bowl');
    divRmv.remove();
  }
</script>
@endsection
