<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bowl extends Model
{
  use HasFactory;

  public function qualities() {
    return $this->belongsToMany(Quality::class);
  }

  public function orders() {
    return $this->belongsToMany(Order::class, 'order_bowl');
  }

  protected $fillable = [
    'weight',
    'quantity'
  ];
}
