<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Mail\NewOrder;
use App\Mail\NewOrderClient;
use Mail;

class CartController extends Controller
{
    public function update()
    {
    	$client = auth()->user(); 
        $articulos =$cart->details()->sum('quantity');
    	$cart = $client->cart;
    	$cart->status = 'Pending';
        $cart->order_date = Carbon::now();
    	$cart->save();

        $admins = User::where('admin', true)->get();
    	Mail::to($admins)->send(new NewOrder($client, $cart));

        Mail::to($client)->send(new NewOrderClient($client,$cart));

    	$notification = 'Tú pedido se ha registrado correctamente. Te contactaremos pronto por correo';
    	return back()->with(compact('notification'));
    }
}
