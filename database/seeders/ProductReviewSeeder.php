<?php

namespace Database\Seeders;
use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Product::all()->each(function($product) use($faker){
            for($i = 0 ; $i < rand(1,3); $i++){

                $product->reviews()->create([
                    'user_id'=>rand(3,23),
                    'name'=>$faker->userName,
                    'email'=>$faker->safeEmail,
                    'title'=>$faker->sentence,
                    'message'=>$faker->paragraph,
                    'status'=>rand(0,1),
                    'rating'=>rand(1,5),
                ]);
            }
        });
    }
}
