<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'image',
        'name',
        'category',
        'description',
        'price',
        'color',   
        'size', 
    ];
}
