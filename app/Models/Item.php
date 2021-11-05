<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
      'name', 'brand_id', 'price'
    ];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function colors() {
        return $this->belongsToMany(Color::class);
    }
}
