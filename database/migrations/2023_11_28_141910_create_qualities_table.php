<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::create('qualities', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->decimal('quantity', 8, 2)->default(0.0);
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('qualities');
  }
};
