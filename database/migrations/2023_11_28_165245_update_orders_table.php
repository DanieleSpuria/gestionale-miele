<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::table('orders', function (Blueprint $table) {
      $table->unsignedBigInteger('client_id');
      $table->foreign('client_id')
        ->references('id')
        ->on('clients');
    });
  }

  public function down()
  {
    Schema::table('orders', function (Blueprint $table) {
      $table->dropForeign(['client_id']);
      $table->dropColumn('client_id');
    });
  }
};