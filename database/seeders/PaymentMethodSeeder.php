<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    public function run()
    {
        PaymentMethod::create([
            'name'                      => 'PayPal',
            'code'                      => 'PPEX',
            'driver_name'               => 'PayPal_Express',
            'merchant_email'            => null,
            'username'                  => null,
            'password'                  => null,
            'secret'                    => null,
            'sandbox_merchant_email'    => null,
            'sandbox_username'          => null,
            'sandbox_password'          => null,
            'sandbox_secret'            => null,
            'sandbox'                   => true,
            'status'                    => true,
        ]);
    }
}
