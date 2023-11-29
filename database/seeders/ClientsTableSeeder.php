<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ClientsTableSeeder extends Seeder
{
  public function run(Faker $faker)
  {
    for ($i = 0; $i < 20; $i++) {
      $new_client                   = new Client();
      $new_client->firstName        = $faker->firstName();
      $new_client->lastName         = $faker->lastName();
      $new_client->telephone_number = $faker->phoneNumber();
      $new_client->address          = $faker->address();
      $new_client->save();
    }
  }
}
