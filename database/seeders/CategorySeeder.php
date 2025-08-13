<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $categories = [
           ['name' => 'Running Shoes'],
           ['name' => 'Casual Shoes'],
           ['name' => 'Sneakers'],
           ['name' => 'Trecking Shoes'],
       ];
       Category::insert($categories);
    }
}
