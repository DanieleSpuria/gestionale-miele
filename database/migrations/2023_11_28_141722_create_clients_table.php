<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::create('clients', function (Blueprint $table) {
      $table->id();
      $table->string('firstName');
      $table->string('lastName');
      $table->string('telephone_number');
      $table->string('address')->nullable();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('clients');
  }
};
