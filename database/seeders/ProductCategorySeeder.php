<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clothes = ProductCategory::create(['name'=>'Clothes','cover'=>'clothes.jgp','status'=>true,'parent_id'=>null]);
        ProductCategory::create(['name'=>'Women\'s T-Shirts','cover'=>'clothes.jgp','status'=>true,'parent_id'=>$clothes->id]);
        ProductCategory::create(['name'=>'Men\'s T-Shirts','cover'=>'clothes.jgp','status'=>true,'parent_id'=>$clothes->id]);
        ProductCategory::create(['name'=>'Dresses','cover'=>'clothes.jgp','status'=>true,'parent_id'=>$clothes->id]);
        ProductCategory::create(['name'=>'Novelty socks','cover'=>'clothes.jgp','status'=>true,'parent_id'=>$clothes->id]);
        ProductCategory::create(['name'=>'Men\'s sunglasses','cover'=>'clothes.jgp','status'=>true,'parent_id'=>$clothes->id]);
        ProductCategory::create(['name'=>'Women\'s sunglasses','cover'=>'clothes.jgp','status'=>true,'parent_id'=>$clothes->id]);

        $shoes = ProductCategory::create(['name'=>'Shoes','cover'=>'shoes.jgp','status'=>true,'parent_id'=>null]);
        ProductCategory::create(['name'=>'Women\'s shoes','cover'=>'shoes.jgp','status'=>true,'parent_id'=>$shoes->id]);
        ProductCategory::create(['name'=>'Men\'s shoes','cover'=>'shoes.jgp','status'=>true,'parent_id'=>$shoes->id]);
        ProductCategory::create(['name'=>'Boy\'s shoes','cover'=>'shoes.jgp','status'=>true,'parent_id'=>$shoes->id]);
        ProductCategory::create(['name'=>'Girls\'s sunglasses','cover'=>'clothes.jgp','status'=>true,'parent_id'=>$shoes->id]);

        $watches = ProductCategory::create(['name'=>'Watches','cover'=>'shoes.jgp','status'=>true,'parent_id'=>null]);
        ProductCategory::create(['name'=>'Women\'s Watches','cover'=>'shoes.jgp','status'=>true,'parent_id'=>$watches->id]);
        ProductCategory::create(['name'=>'Men\'s Watches','cover'=>'shoes.jgp','status'=>true,'parent_id'=>$watches->id]);
        ProductCategory::create(['name'=>'Boy\'s Watches','cover'=>'shoes.jgp','status'=>true,'parent_id'=>$watches->id]);
        ProductCategory::create(['name'=>'Girls\'s Watches','cover'=>'shoes.jgp','status'=>true,'parent_id'=>$watches->id]);

        $electronics = ProductCategory::create(['name'=>'Electronics','cover'=>'electronics.jgp','status'=>true,'parent_id'=>null]);
        ProductCategory::create(['name'=>'Electronics','cover'=>'electronics.jgp','status'=>true,'parent_id'=>$electronics->id]);
        ProductCategory::create(['name'=>'USB Flash drives','cover'=>'electronics.jgp','status'=>true,'parent_id'=>$electronics->id]);
        ProductCategory::create(['name'=>'Headphones','cover'=>'electronics.jgp','status'=>true,'parent_id'=>$electronics->id]);
        ProductCategory::create(['name'=>'Portable speakers','cover'=>'electronics.jgp','status'=>true,'parent_id'=>$electronics->id]);
        ProductCategory::create(['name'=>'Cell Phone bluetooth headsets','cover'=>'electronics.jgp','status'=>true,'parent_id'=>$electronics->id]);
        ProductCategory::create(['name'=>'Keyboards','cover'=>'electronics.jgp','status'=>true,'parent_id'=>$electronics->id]);

    }
}
