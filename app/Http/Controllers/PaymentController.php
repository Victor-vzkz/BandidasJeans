<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PayPalService;
use App\Resolvers\PaymentPlatformResolver;

class PaymentController extends Controller
{
    public function pay(Request $request){ 
     $messages=[	
    'value.required'=>'Es obligatorio ingresar un precio para el pago.',
    'value.numeric'=>'Ingrese un precio válido.',
    'value.min'=>'No se admiten valores negativos.'
    ];
    $rules= [
    	'value'=>'required|numeric|min:0',
        'currency' => 'required',
        'payment_platform' => 'required|exists:payment_platforms,id'
    ]; 

    $request->validate($rules, $messages);
     
    $paymentPlatform = resolve(PayPalService::class);

    return $paymentPlatform->handlePayment($request); 
    }

    public function approval()
    {
     $paymentPlatform = resolve(PayPalService::class);

     return $paymentPlatform->handleApproval();
    }
     public function cancelled ()
    {
     

    }
}
