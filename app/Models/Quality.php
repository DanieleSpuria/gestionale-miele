<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{
  use HasFactory;

  public function orders() {
    return $this->belongsToMany(Order::class);
  }

  public function bowls() {
    return $this->belongsToMany(Bowl::class);
  }

  protected $fillable = [
    'name',
    'quantity'
  ];
}
