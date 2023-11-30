<?php

namespace App\Http\Controllers;

use App\Models\Bowl;
use Illuminate\Http\Request;

class BowlController extends Controller
{
    public function index()
    {
      $bowls = Bowl::all();

      return view('app.bowls.index', compact('bowls'));
    }





    public function show(Bowl $bowl)
    {
      //
    }





    public function create()
    {
      $bowl = new Bowl();
      $route = route('app.bowls.store', $bowl);
      $method = 'POST';
      $btn = 'Crea';

      return view('app.bowls.form', compact('route', 'method', 'bowl', 'btn'));
    }

    public function store(Request $request)
    {
      $form_data = $request->all();

      $new_bowl = new Bowl();
      $new_bowl->fill($form_data);
      $new_bowl->save();

      return redirect()->route('app.bowls.index', $new_bowl);
    }





    public function edit(Bowl $bowl)
    {
      $route = route('app.bowls.update', $bowl);
      $method = 'PUT';
      $btn = 'Modifica';

      return view('app.bowls.form', compact('route', 'method', 'btn', 'bowl'));
    }

    public function update(Request $request, Bowl $bowl)
    {
      $form_data = request()->all();

      $bowl->update($form_data);

      return redirect()->route('app.bowls.index', $bowl);
    }





    public function destroy(Bowl $bowl)
    {
      $bowl->delete();

      return redirect()->route('app.bowls.index');
    }
}
