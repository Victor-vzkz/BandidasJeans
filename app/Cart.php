<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function details ()
    {
    	return $this->hasMany(CartDetail::class); 
    }
    public function carts ()
    {
        return $this->hasOne(Cart::class); 
    }

    public function getTotalAttribute ()
    {
        $total=0;
        $articulos=0;
        $articulos=$this->details->sum('quantity');
        
        foreach($this->details as $detail){
        
        
        
        if($articulos>=10){
        $total+= $detail->quantity* $detail->product->price_plus;
        
        }
        else{
        $total+= $detail->quantity* $detail->product->price;
        }
}
return $total;
$total =save();
    	} 
    }
