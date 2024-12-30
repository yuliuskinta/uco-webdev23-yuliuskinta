<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shipping_address',
        'payment_method',
        'total_amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
