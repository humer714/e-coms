<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Ensure categories exist before adding products
         $category = Category::first() ?? Category::create(['name' => 'Default Category']);

         Product::create([
             'name' => 'Smartphone',
             'description' => 'A high-quality smartphone with the latest features.',
             'price' => 699.99,
             'image' => 'assets/images/smartphone.jpg',
             'stock' => 10,
             'category_id' => $category->id,
         ]);

         Product::create([
            'name' => 'Laptop',
            'description' => 'Powerful laptop for work and gaming.',
            'price' => 1299.99,
            'image' => 'assets/images/laptop.jpg',
            'stock' => 5,
            'category_id' => $category->id,
        ]);
    }
}
