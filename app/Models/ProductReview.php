<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Nicolaslopezj\Searchable\SearchableTrait;
class ProductReview extends Model
{
    use HasFactory;
    // use SearchableTrait;
    protected $guarded = [];
    protected $searchable = [
        'columns' => [
            'product_reviews.name' => 10,
            'product_reviews.email' => 10,
            'product_reviews.title' => 10,
            'product_reviews.message' => 10,
        ],
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function status()
    {
      return  $this->status ? 'Active' : 'InActive';
    }
}
