<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
 use Notifiable;   
 use SoftDeletes; 
    protected $fillable = ['name','description'];

	//$category->products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function getFeaturedImageUrlAttribute()
    {
    	$featuredProduct = $this->products()->first();
        return $featuredProduct->featured_image_url; 
    }
}
