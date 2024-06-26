<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $table = "orders_items";
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'count',
        'sum'
    ];


    public function image(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Image::class, 'products_id', 'product_id');
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Products::class, 'id', 'product_id');
    }
}
