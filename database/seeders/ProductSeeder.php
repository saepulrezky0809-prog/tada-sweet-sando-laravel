<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::updateOrCreate(
            ['slug' => 'fruit-sando'],
            [
                'name' => 'Fruit Sando',
                'description' => 'Japanese fruit sandwich',
                'is_active' => true,
            ]
        );

        $products = [
            [
                'name' => 'Sando Strawberry',
                'slug' => 'sando-strawberry',
                'description' => 'Fruit sando dengan buah strawberry segar.',
                'price' => 7000,
                'stock' => 10,
            ],
            [
                'name' => 'Sando Mangga',
                'slug' => 'sando-mangga',
                'description' => 'Fruit sando dengan buah mangga segar.',
                'price' => 7000,
                'stock' => 10,
            ],
            [
                'name' => 'Sando Anggur',
                'slug' => 'sando-anggur',
                'description' => 'Fruit sando dengan buah anggur segar.',
                'price' => 7000,
                'stock' => 10,
            ],
            [
                'name' => 'Sando Mix',
                'slug' => 'sando-mix',
                'description' => 'Fruit sando dengan campuran buah segar.',
                'price' => 7000,
                'stock' => 10,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => $product['slug']],
                array_merge($product, [
                    'category_id' => $category->id,
                    'is_active' => true,
                ])
            );
        }
    }
}