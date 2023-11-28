<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class OrdersTableSeeder extends Seeder
{
  public function run(Faker $faker)
  {
    for ($i = 0; $i < 50; $i++) {
      $new_order = new Order();
      $new_order->status    = $faker->boolean();
      $new_order->total     = $faker->randomFloat(2, 0, 9999);
      $new_order->date      = $faker->date();
      $new_order->client_id = Client::inRandomOrder()->first()->id;
      $new_order->save();
    }
  }
}
