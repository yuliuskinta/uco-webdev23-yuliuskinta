<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name',
        'order_no'
    ];

    // Mendapatkan data category yang telah diurutkan berdasarkan order_no dan name
    public static function getOrdered()
    {
        return self::orderBy('order_no')->orderBy('name')->get();
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
