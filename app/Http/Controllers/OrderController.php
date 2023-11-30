<?php

namespace App\Http\Controllers;

use App\Models\Bowl;
use App\Models\Client;
use App\Models\Order;
use App\Models\Quality;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
      $orders = Order::all();

      return view('app.orders.index', compact('orders'));
    }





    public function show(Order $order)
    {
      $qualities = Quality::all();

      return view('app.orders.show', compact('order', 'qualities'));
    }





    public function create()
    {
      $order = new Order();
      $clients = Client::all();
      $qualities = Quality::all();
      $bowls = Bowl::all();
      $order_bowls = [];

      $route = route('app.orders.store', $order_bowls);
      $method = 'POST';
      $btn = 'Crea';

      return view('app.orders.form', compact('order', 'clients', 'qualities', 'bowls', 'order_bowls', 'route', 'method', 'btn'));
    }

    public function store(Request $request)
    {
      $form_data = $request->all();

      $qualities = Quality::all();
      $bowls = Bowl::all();

      $new_order = new Order();
      $new_order->date = Carbon::now()->format('Y-m-d');
      $new_order->client_id = $form_data['client'];
      $new_order->save();

      $total = 0;

      foreach ($form_data['order_bowls'] as $bowl) {
        $bowl_id = $bowl['weight'];
        $quality_id = $bowl['quality'];
        $quantity = $bowl['quantity'];

        if ($quality_id == 2 && $bowl_id == 1) {
          $price = 7;
        } else if ($quality_id == 2 && $bowl_id == 2) {
          $price = 3.5;
        } else if ($quality_id != 2 && $bowl_id == 1) {
          $price = 8;
        } else if ($quality_id != 2 && $bowl_id == 2) {
          $price = 4;
        }

        $total += $price * $quantity;

        $bowls_weight = 0;

        foreach ($bowls as $bowl) {
          if ($bowl->id == $bowl_id) {
            $bowls_weight = $bowl->weight * $quantity;
          }
        }

        foreach ($qualities as $quality) {
          if ($quality->id == $quality_id) {
            $quality_quantity = $quality->quantity;
            $quality->update(['quantity' => $quality_quantity -$bowls_weight]);
          }
        }

        $new_order->bowls()->attach($bowl_id, ['quality_id' => $quality_id, 'quantity' => $quantity, 'price' => $price]);
      }

      $new_order->total = $total;
      $new_order->update(['total' => $total]);


      return redirect()->route('app.orders.index', $new_order);
    }





    public function edit(Order $order)
    {
      $clients = Client::all();
      $qualities = Quality::all();
      $bowls = Bowl::all();

      $route = route('app.orders.update', $order);
      $method = 'PUT';
      $btn = 'Modifica';

      return view('app.orders.form', compact('order', 'clients', 'qualities', 'bowls', 'route', 'method', 'btn'));
    }

    public function update(Request $request, Order $order)
    {
        //
    }





    public function destroy(Order $order)
    {
      // $order->delete();

      // return redirect()->route('app.clients.index');
    }
}
