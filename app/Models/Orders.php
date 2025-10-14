<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'amount',
        'status',
        'stripe_id',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
