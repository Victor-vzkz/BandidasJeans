<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;
use App\User;
class CartDetailController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function store (Request $request)
    {
       $cartDetail = new CartDetail();
       $cartDetail->cart_id =auth()->user()->cart->id;
       $cartDetail->product_id= $request->product_id;
       $cartDetail->quantity= $request->quantity;
       $cartDetail->tallas = $request->tallas;
       $cartDetail->color = $request->color;
       $cartDetail->save();

       $notification = 'El producto se ha cargado a tu carrito exitosamente.';
       return back()->with(compact('notification'));  
    }
    public function destroy (Request $request)
    {
       $cartDetail = CartDetail::find($request->cart_detail_id);
       if($cartDetail->cart_id == auth()->user()->cart->id)
       $cartDetail->delete();

       $notification = 'El producto se ha eliminado correctamente.';
       return back()->with(compact('notification')); 
    }
}
