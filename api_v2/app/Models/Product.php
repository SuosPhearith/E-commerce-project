<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'sku',
        'category_id',
        'discount',
        'image',
        'tags',
        'additional_information',
        'modified_by',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
