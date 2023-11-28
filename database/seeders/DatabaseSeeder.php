<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    $this->call([
      QualitiesTableSeeder::class,
      BowlsTableSeeder::class,
      CapsTableSeeder::class,
      ClientsTableSeeder::class,
      OrdersTableSeeder::class,
      OrdersBowlsTableSeeder::class
    ]);
  }
}
