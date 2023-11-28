<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::table('bowls', function (Blueprint $table) {
      $table->unsignedBigInteger('quality_id');
      $table->foreign('quality_id')
        ->references('id')
        ->on('qualities');
    });
  }

  public function down()
  {
    Schema::table('bowls', function (Blueprint $table) {
      $table->dropForeign(['quality_id']);
      $table->dropColumn('quality_id');
    });
  }
};
