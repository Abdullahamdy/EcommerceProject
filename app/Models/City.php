<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Nicolaslopezj\Searchable\SearchableTrait;

class City extends Model
{
    use HasFactory;
    // use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'cities.name' => 20,

        ],
    ];
    protected $guarded = [];
    public $timestamps = false;

    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function status()
    {
        return $this->status ? 'Active' : 'InActive';
    }

    public function getStateNameAttribute()
    {
        return $this->state->name;
    }
    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }
}
