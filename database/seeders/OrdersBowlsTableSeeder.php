<?php

namespace Database\Seeders;

use App\Models\Bowl;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersBowlsTableSeeder extends Seeder
{
  public function run()
  {
    $orders = Order::all();

    foreach ($orders as $order) {
      $bowls = [];

      for ($i = 0; $i < rand(1, 6); $i++) {
          $randomId = Bowl::inRandomOrder()->pluck('id')->random();
          $bowls[] = $randomId;
      }

      $order->bowls()->attach($bowls);
    }
  }
}
