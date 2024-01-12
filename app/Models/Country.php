<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;
    // use  SearchableTrai;

    protected $searchable = [
        'columns' => [
            'countries.name' => 20,

        ],
    ];
    public $timestamps = false;
    use HasFactory;
    protected $guarded  = [];

    public function states(){
        return $this->hasMany(State::class);
    }
    public function status()
    {
        return $this->status ? 'Active' : 'InActive';
    }
    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }
}
