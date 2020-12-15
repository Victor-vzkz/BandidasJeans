<?php

use Illuminate\Database\Seeder;
use App\PaymentPlatform;

class PaymentPlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        PaymentPlatform::create([
                'name' => 'Paypal',
                'image' => 'img/paypal.png',
        ]);
           
    }
}
