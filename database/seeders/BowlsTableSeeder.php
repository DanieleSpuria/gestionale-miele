<?php

namespace Database\Seeders;

use App\Models\Bowl;
use App\Models\Quality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BowlsTableSeeder extends Seeder
{
  public function run()
  {
    $bowls = config('bowls');

    foreach($bowls as $bowl) {
      $new_bowl           = new Bowl();
      $new_bowl->weight   = $bowl['weight'];
      $new_bowl->quantity = $bowl['quantity'];
      $new_bowl->save();
    }
  }
}
