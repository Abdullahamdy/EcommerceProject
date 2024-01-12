<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasFactory;
    // use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'states.name' => 20,

        ],
    ];
    protected $guarded = [];
    public $timestamps = false;
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function cities(){
        return $this->hasMany(City::class);
    }

    public function status(){
        return $this->status ? 'Active' : 'InActive';
    }
    public function getCountryNameAttribute()
    {
        return $this->country->name;

    }
    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }
}
