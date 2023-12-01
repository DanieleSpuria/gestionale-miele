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
        ->on('orders')
        ->cascadeOnDelete();

      $table->unsignedBigInteger('bowl_id');
      $table->foreign('bowl_id')
        ->references('id')
        ->on('bowls')
        ->cascadeOnDelete();

      $table->unsignedBigInteger('quality_id');
      $table->foreign('quality_id')
        ->references('id')
        ->on('qualities')
        ->cascadeOnDelete();

      $table->integer('quantity')->default(0);
      $table->decimal('price', 8, 2);
    });
  }

  public function down()
  {
    Schema::dropIfExists('order_bowl');
  }
};
