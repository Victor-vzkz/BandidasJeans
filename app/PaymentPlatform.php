<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentPlatform extends Model
{
    /**
    *
    *
    * @var array
    */
    protected $fillable = [
     'name', 'image',
    ];
}
