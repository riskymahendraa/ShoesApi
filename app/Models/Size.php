<?php

namespace App\Models;
use App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{

    protected $fillable = ['size_value'];

    public function products(){
        return $this->belongsToMany(Product::class, 'product_size', 'size_id', 'product_id')->withPivot('stock');
    }
}
