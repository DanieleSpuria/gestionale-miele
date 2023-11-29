<?php

namespace Database\Seeders;

use App\Models\Quality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QualitiesTableSeeder extends Seeder
{

  public function run()
  {
    $qualities = config('qualities');

    foreach($qualities as $quality) {
      $new_quality           = new Quality();
      $new_quality->name     = $quality['name'];
      $new_quality->quantity = $quality['quantity'];
      $new_quality->save();
    }
  }
}
