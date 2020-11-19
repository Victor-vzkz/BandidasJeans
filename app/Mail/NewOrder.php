<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Cart;


class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $cart; 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Cart $cart)
    {
        $this->user = $user;
        $this->cart = $cart;
        $destinatario = $user()->email;
        $asunto= "confirmación de pedido";
        $cuerpo = 'emails.new-order';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {    
            return $this->view('emails.new-order')
        ->subject('Un cliente ha realizado un nuevo pedido');
    }
}
mail($destinatario,$asunto,$cuerpo);