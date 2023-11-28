<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::create('bowls', function (Blueprint $table) {
      $table->id();
      $table->decimal('weight', 8, 2);
      $table->integer('quantity')->default(0);
      $table->decimal('price', 8, 2);
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('bowls');
  }
};
