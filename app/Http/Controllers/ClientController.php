<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Quality;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
      $clients = Client::all();

      return view('app.clients.index', compact('clients'));
    }





    public function show(Client $client)
    {
      $qualities = Quality::all();
      $qualities_id = [];
      $orders = $client->orders;

      foreach ($orders as $order) {
        foreach ($order->bowls as $bowl) {
          $qualities_id[] = $bowl->pivot->quality_id;
        }
      }

      return view('app.clients.show', compact('client', 'qualities', 'qualities_id', 'orders'));
    }





    public function create()
    {
      $client = new Client();
      $route = route('app.clients.store', $client);
      $method = 'POST';
      $btn = 'Crea';

      return view('app.clients.form', compact('client', 'route', 'method', 'btn'));
    }


    public function store(Request $request)
    {
      $form_data = $request->all();

      $new_client = new Client();
      $new_client->fill($form_data);
      $new_client->save();

      return redirect()->route('app.clients.index', $new_client);
    }





    public function edit(Client $client)
    {
      $route = route('app.clients.update', $client);
      $method = 'PUT';
      $btn = 'Modifica';

      return view('app.clients.form', compact('client', 'route', 'method', 'btn'));
    }


    public function update(Request $request, Client $client)
    {
      $form_data = $request->all();

      $client->update($form_data);

      return redirect()->route('app.clients.index', $client);
    }





    public function destroy(Client $client)
    {
      $client->delete();

      return redirect()->route('app.clients.index');
    }
}
