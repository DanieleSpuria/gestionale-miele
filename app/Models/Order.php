<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use HasFactory;

  public function client() {
    return $this->belongsTo(Client::class);
  }

  public function bowls() {
    return $this->belongsToMany(Bowl::class, 'order_bowl')->withPivot('price', 'quantity', 'quality_id');
  }

  public function qualities() {
    return $this->belongsToMany(Quality::class);
  }

  protected $fillable = [
    'status',
    'total',
    'date'
  ];
}
