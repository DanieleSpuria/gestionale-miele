<?php

namespace App\Http\Controllers;

use App\Models\Quality;
use Illuminate\Http\Request;

class QualityController extends Controller
{
    public function index()
    {
      $qualities = Quality::all();

      return view('app.qualities.index', compact('qualities'));
    }





    public function show(Quality $quality)
    {
        //
    }





    public function create()
    {
      $quality = new Quality();

      $route = route('app.qualities.store');
      $method = 'POST';
      $btn = 'Crea';

      return view('app.qualities.form', compact('quality', 'route', 'method', 'btn'));
    }

    public function store(Request $request)
    {
      $form_data = request()->all();

      $new_quality = new Quality();
      $new_quality->fill($form_data);
      $new_quality->save();

      return redirect()->route('app.qualities.index', $new_quality);
    }





    public function edit(Quality $quality)
    {
      $route = route('app.qualities.update', $quality);
      $method = 'PUT';
      $btn = 'Modifica';

      return view('app.qualities.form', compact('route', 'quality', 'method', 'btn'));
    }


    public function update(Request $request, Quality $quality)
    {
      $form_data = $request->all();

      $quality->update($form_data);

      return redirect()->route('app.qualities.index', $quality);
    }





    public function destroy(Quality $quality)
    {
      $quality->delete();

      return redirect()->route('app.qualities.index');
    }
}
