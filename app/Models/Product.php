<?php

namespace App\Models;
use App\Models\OrderItem;
use App\Models\Brand;
use App\Models\Category;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
