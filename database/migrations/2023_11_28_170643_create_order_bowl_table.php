<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::create('order_bowl', function (Blueprint $table) {
      $table->unsignedBigInteger('order_id');
      $table->foreign('order_id')
        ->references('id')
        ->on('orders');

      $table->unsignedBigInteger(('bowl_id'));
      $table->foreign('bowl_id')
        ->references('id')
        ->on('bowls');
    });
  }

  public function down()
  {
    Schema::dropIfExists('order_bowl');
  }
};