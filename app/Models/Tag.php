<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
// use Nicolaslopezj\Searchable\SearchableTrait;
class Tag extends Model
{
    use HasFactory,Sluggable;
    // use  SearchableTrait;
    protected $guarded = [];

    protected $searchable = [
        'columns' => [
            'tags.name' => 10,
        ],
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    public function status(){
        return $this->status ? 'Active' : 'InActive';
    }
    public function products()
    {
        return $this->morphedByMany(Product::class, 'taggable');
    }
}
