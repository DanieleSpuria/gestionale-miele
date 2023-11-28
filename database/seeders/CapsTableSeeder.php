<?php

namespace Database\Seeders;

use App\Models\Cap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CapsTableSeeder extends Seeder
{
  public function run()
  {
    $caps = config('caps');

    foreach($caps as $cap) {
      $new_caps = new Cap();
      $new_caps->weight   = $cap['weight'];
      $new_caps->quantity = $cap['quantity'];
      $new_caps->save();
    }
  }
}
