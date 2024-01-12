<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Nicolaslopezj\Searchable\SearchableTrait;

class ShippingCompany extends Model
{
    use HasFactory;
    //  use SearchableTrait;
    protected $guarded=[];
    protected $searchable = [
        'columns' => [
            'shipping_companies.name' => 10,
            'shipping_companies.code' => 10,
            'shipping_companies.description' => 10,

        ],
    ];

    public function status(){
        return $this->status ? 'Active' :'InActive';
    }
    public function fast()
    {
        return $this->fast ? 'Fast Delivery' : 'Normal Delivery';
    }

    public function Countries (){
        return $this->belongsToMany(Country::class, 'shipping_company_country');
    }
}
