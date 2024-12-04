<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name' => 'Shoes', 'order_no' => 1],
            ['name' => 'Shirts', 'order_no' => 2],
            ['name' => 'Shorts', 'order_no' => 3],
            ['name' => 'Pants', 'order_no' => 4],
            ['name' => 'Jackets', 'order_no' => 5],
            ['name' => 'Hoodies', 'order_no' => 6],
            ['name' => 'Accesories', 'order_no' => 7],
        ]);
    }
}
