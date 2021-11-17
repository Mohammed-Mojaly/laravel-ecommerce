<?php

namespace Database\Seeders;

use App\Models\ProductCoupon;
use Illuminate\Database\Seeder;

class ProductCouponSeeder extends Seeder
{

    public function run()
    {
        ProductCoupon::create([
            'code'              => 'MOJALY100',
            'type'              => 'fixed',
            'value'             =>  100,
            'description'       => 'Discount 100 $ on your sales on website',
            'use_times'         => 20,
            'start_date'        => now(),
            'expire_date'       => now()->addMonth(),
            'greater_than'      => 600,
            'status'            => 1,
        ]);

        ProductCoupon::create([
            'code'              => 'MUFF50',
            'type'              => 'percentage',
            'value'             =>  50,
            'description'       => 'Discount 50% on your sales on website',
            'use_times'         => 5,
            'start_date'        => now(),
            'expire_date'       => now()->addMonth(),
            'greater_than'      => null,
            'status'            => 1,
        ]);
    }
}
