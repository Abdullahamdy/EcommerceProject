<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Tag;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ProductTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::whereStatus(true)->pluck('id')->toArray();
        Product::all()->each(function ($product) use ($tags) {
            $product->tags()->attach(Arr::random($tags, rand(2, 3)));
        });
    }
}
