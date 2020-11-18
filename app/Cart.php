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
    	foreach ($this->details as $detail) {
    	 	$total += $detail->quantity * $detail->product->price;
    	 } 
    	 return $total;
    }

     public function getTotaldetails ()
    {
        $articulos=0;
        foreach ($this->details as $detail) {
            $articulos->$detail->count->quantity;
            if ($articulos>=10) {
                $detail->product->price_plus;
            } else {
                $detail->product->price;
            }
            
         } 
         return $total;
    }
}
