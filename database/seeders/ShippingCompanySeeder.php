<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\ShippingCompany;
use DB;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Seeder;
use Schema;

class ShippingCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('shipping_companies')->truncate();
        DB::table('shipping_company_country')->truncate();
        Schema::enableForeignKeyConstraints();
        
        $sha01 = ShippingCompany::create([
            'name'=>'Aramex Inside',
            'code' => 'ARA',
            'description' => '8 - 10 days',
            'fast'=>false,
            'cost'=>'15.00',
            'status' => true,
        ]);
        $sha01->Countries()->attach([194]);

        $sha02 = ShippingCompany::create([
            'name' => 'Aramex Inside Speed Shipping',
            'code' => 'ARA-SPD',
            'description' => '1 - 3 days',
            'fast' => true,
            'cost' => '25.00',
            'status' => true,
        ]);
        $sha02->Countries()->attach([194]);
        
        $countries = Country::where('id','!=',194)->pluck('id')->toArray();
        $sha03 = ShippingCompany::create([
            'name' => 'Aramex Outside',
            'code' => 'ARA-O',
            'description' => '15 - 20 days',
            'fast' => false,
            'cost' => '50.00',
            'status' => true,
        ]);
        $sha03->Countries()->attach($countries);
        
        $sha04 = ShippingCompany::create([
            'name' => 'Aramex Outside Speed Shipping',
            'code' => 'ARA-0-SPD',
            'description' => '5 - 10 days',
            'fast' => true,
            'cost' => '80.00',
            'status' => true,
        ]);
        $sha04->Countries()->attach($countries);
        
    }
}