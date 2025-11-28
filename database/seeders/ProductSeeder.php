<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $category = Category::create([
            'name' => 'Vinhos',
            'slug' => 'vinhos'
        ]);

        Product::create([
            'category_id' => $category->id,
            'name' => 'Vinho Tinto Seco',
            'slug' => Str::slug('Vinho Tinto Seco'),
            'description' => 'Um vinho encorpado e elegante.',
            'price_cents' => 4590, // R$ 45,90
            'stock' => 10,
            'active' => 1
        ]);
    }
}
