<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bowl extends Model
{
  use HasFactory;

  public function quality() {
    return $this->belongsTo(Quality::class);
  }

  public function orders() {
    return $this->belongsToMany(Order::class);
  }

  protected $fillable = [
    'weight',
    'quantity',
    'price'
  ];
}
