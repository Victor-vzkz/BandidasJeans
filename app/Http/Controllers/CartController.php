<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update()
    {
    	$cart = auth()->user()->cart;
    	$cart->status = 'Pending';
    	$cart->save();

    	$notification = 'Tú pedido se ha registrado. Te contactaremos por correo';
    	return back()->with(compact('notification'));
    }
}
