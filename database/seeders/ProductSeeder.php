<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = 
        [
            [ "brand_id" => 7,
            "category_id" => 1,
            "name" => "Nike Air Max 90",
            "description" => "Nike Air Max 90 Running Shoes",
            "price" => 1800000,
            "stock" => 10,
            "image" => "images/products/dummy-1.jpg",
            "is_new_arrival" => true,
            ],
            
            [ "brand_id" => 3,
            "category_id" => 1,
            "name" => "New Balance 740",
            "description" => "New Balance 740 Sneakers Shoes",
            "price" => 2000000,
            "stock" => 7,
            "image" => "images/products/dummy-2.jpg",
            "is_new_arrival" => true,
            ],
        ];
            
            Product::insert($products);
    
    }
}
