<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function details ()
    {
    	return $this->hasMany(CartDetail::class); 
    }

    public function getTotalAttribute ()
    {
        $total=0;
        $articulos=0;
        foreach($this->details as $detail){
        $articulos=$detail->sum('quantity');
        
        if($articulos>=10){
        $total+= $detail->quantity* $detail->product->price_plus;
        
        }
        else{
        $total+= $detail->quantity* $detail->product->price;
        }
}
return $total;
    	} 
    }
