<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = [
            ['size_value' => 35],
            ['size_value' => 36],
            ['size_value' => 37],
            ['size_value' => 38],
            ['size_value' => 39],
            ['size_value' => 40],
            ['size_value' => 41],
            ['size_value' => 42],
    
        ];
        Size::insert($sizes);
    }
}
