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
       if($this->image)
        return '/images/categories/'.$this->image;

    $firstProduct = $this->products()->first();
    if($firstProduct)
        return $firstProduct->featured_image_url;

       return '/images/default.png';
    }
}
