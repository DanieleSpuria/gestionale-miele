<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{
  use HasFactory;

  public function bowls() {
    return $this->hasMany(Bowl::class);
  }

  protected $fillable = [
    'name',
    'quantity'
  ];
}
