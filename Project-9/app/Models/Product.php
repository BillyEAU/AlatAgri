<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = [
        'product_name',
        'description',
        'price',
        'stock',
        'category_id',
        'shop_id',
        'image',
    ];
    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id');
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
