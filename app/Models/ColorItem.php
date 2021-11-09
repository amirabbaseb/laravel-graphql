<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorItem extends Model
{
    protected $fillable = [
        'price', 'color_id', 'item_id'
    ];
}

