<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'id',
        'name',
        'count',
        'price',
        'description',
        'category_id'
    ];

    public function image(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
        return $this->hasMany(Image::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Catalogs::class, 'category_id');
    }

    public function reviews(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Review::class, 'product_id', 'id');
    }
}
