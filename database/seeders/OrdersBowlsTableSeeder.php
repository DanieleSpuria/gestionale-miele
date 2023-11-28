<?php

namespace Database\Seeders;

use App\Models\Bowl;
use App\Models\Order;
use App\Models\Quality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersBowlsTableSeeder extends Seeder
{
  public function run()
  {
    $orders = Order::all();

    foreach ($orders as $order) {
      $bowls     = [];
      $qualities = [];

      for ($i = 0; $i < rand(1, 6); $i++) {
          $randomBowl    = Bowl::inRandomOrder()->pluck('id')->random();
          $randomQuality = Quality::inRandomOrder()->pluck('id')->random();
          $bowls[]       = $randomBowl;
          $qualities[]   = $randomQuality;
      }

      for ($i = 0; $i < count($bowls); $i++) {
          if ($qualities[$i] != 2 && $bowls[$i] == 1) {
            $order->bowls()->attach($bowls[$i], ['quality_id' => $qualities[$i], 'price' => 8]);
          } else if ($qualities[$i] != 2 && $bowls[$i] == 2) {
            $order->bowls()->attach($bowls[$i], ['quality_id' => $qualities[$i], 'price' => 4]);
          } else if ($qualities[$i] == 2 && $bowls[$i] == 1) {
            $order->bowls()->attach($bowls[$i], ['quality_id' => $qualities[$i], 'price' => 7]);
          } else if ($qualities[$i] == 2 && $bowls[$i] == 2) {
            $order->bowls()->attach($bowls[$i], ['quality_id' => $qualities[$i], 'price' => 3.5]);
          }
      }
    }
  }
}
