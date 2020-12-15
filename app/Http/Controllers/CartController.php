<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Mail\NewOrder;
use App\Mail\NewOrderClient;
use Mail;
use App\Currency;
use App\PaymentPlatform;

class CartController extends Controller
{
    public function update()
    {
    	$client = auth()->user(); 
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
    public function index()
    {
        $currencies = Currency::all();
        $paymentPlatforms = PaymentPlatform::all(); 

         return view('pay')->with([
         'currencies' => $currencies,
         'paymentPlatforms' => $paymentPlatforms,
         ]);
    }
    public function inde()
    {
        $currencies = Currency::all();
        $paymentPlatforms = PaymentPlatform::all(); 

         return view('pay')->with([
         'currencies' => $currencies,
         'paymentPlatforms' => $paymentPlatforms,
         ]);

         $notification = 'Tú pedido se ha registrado correctamente. Te contactaremos pronto por correo';
        return back()->with(compact('notification'));
    }
}
