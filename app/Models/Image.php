<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'image',
        'product_id'
    ];

    public $timestamps = false;

    public function getImage()
    {
        return url('/storage/'. $this->attributes['image']);
    }

    public function setImageAttributes($value)
    {
        return $this->attributes['image'] = $value;
    }

    // Получение фотографии
    public function getProduct()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
