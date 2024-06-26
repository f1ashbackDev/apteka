<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogs extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['id', 'categories_name', 'image'];

    public function product(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Products::class, 'category_id');
    }
}
