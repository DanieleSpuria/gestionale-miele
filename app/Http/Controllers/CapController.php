<?php

namespace App\Http\Controllers;

use App\Models\Cap;
use Illuminate\Http\Request;

class CapController extends Controller
{
    public function index()
    {
      $caps = Cap::all();

      return view('app.caps.index', compact('caps'));
    }




    public function show(Cap $cap)
    {
      //
    }





    public function create()
    {
      $cap = new Cap();
      $route = route('app.caps.store', $cap);
      $method = 'POST';
      $btn = 'Crea';

      return view('app.caps.form', compact('route', 'method', 'btn', 'cap'));
    }


    public function store(Request $request)
    {
      $form_data = $request->all();

      $new_cap = new Cap();
      $new_cap->fill($form_data);
      $new_cap->save();

      return redirect()->route('app.caps.index', $new_cap);
    }





    public function edit(Cap $cap)
    {
      $route = route('app.caps.update', $cap);
      $method = 'PUT';
      $btn = 'Modifica';

      return view('app.caps.form', compact('route', 'method', 'btn', 'cap'));
    }


    public function update(Request $request, Cap $cap)
    {
      $form_data = $request->all();

      $cap->update($form_data);

      return redirect()->route('app.caps.index', $cap);
    }





    public function destroy(Cap $cap)
    {
      $cap->delete();

      return redirect()->route('app.bowls.index');
    }
}
