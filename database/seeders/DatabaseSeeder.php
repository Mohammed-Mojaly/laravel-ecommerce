<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
    //     $this->call(WorldSeeder::class);
    //     //$this->call(WorldStatusSeeder::class);
    //     $this->call(EntrustSeeder::class);
    //     //   $this->call(UserAddressSeeder::class);
    //     $this->call(ProductCategorySeeder::class);
    //     $this->call(TagSeeder::class);
    //     $this->call(ProductSeeder::class);
    //     $this->call(ProductsTagsSeeder::class);
    //     $this->call(ProductsImagesSeeder::class);
    //     $this->call(ProductCouponSeeder::class);
    //     $this->call(ProductReviewSeeder::class);
    //   //  $this->call(ShippingCompanySeeder::class);
    //    $this->call(PaymentMethodSeeder::class);
    //  //  $this->call(OrderSeeder::class);






   //  $this->call(WorldSeeder::class);
     $this->call(WorldStatusSeeder::class);
     $this->call(EntrustSeeder::class);
     $this->call(UserAddressSeeder::class);
     $this->call(ProductCategorySeeder::class);
     $this->call(TagSeeder::class);
     $this->call(ProductSeeder::class);
     $this->call(ProductsTagsSeeder::class);
     $this->call(ProductsImagesSeeder::class);
     $this->call(ProductCouponSeeder::class);
     $this->call(ProductReviewSeeder::class);
     $this->call(ShippingCompanySeeder::class);
     $this->call(PaymentMethodSeeder::class);
     $this->call(OrderSeeder::class);




    }
}
