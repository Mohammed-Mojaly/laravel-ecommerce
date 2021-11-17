<?php

// use App\Http\Controllers\Frontend\FrontendController;
// use App\Http\Controllers\Backend\BackendController;
// use App\Http\Controllers\Backend\CityController;
// use App\Http\Controllers\Backend\CountryController;
// use App\Http\Controllers\backend\CustomerAddressController;
// use App\Http\Controllers\Backend\CustomerController;
// use App\Http\Controllers\Frontend\CustomerController as FrontendCustomerController;
// use App\Http\Controllers\backend\PaymentMethodController;
// use App\Http\Controllers\Backend\ProductCategoriesController;
// use App\Http\Controllers\Backend\ProductController;
// use App\Http\Controllers\Backend\ProductCouponController;
// use App\Http\Controllers\Backend\ProductReviewController;
// use App\Http\Controllers\backend\ShippingCompanyController;
// use App\Http\Controllers\Backend\StateController;
// use App\Http\Controllers\Backend\SupervisorController;
// use App\Http\Controllers\Backend\TagController;
// use App\Http\Controllers\Frontend\PaymentController;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend;
use App\Http\Controllers\Frontend;

Route::get('/', [Frontend\FrontendController::class, 'index'])->name('frontend.index');
Route::get('/shop/{slug?}', [Frontend\FrontendController::class, 'shop'])->name('frontend.shop');
Route::get('/shop/tags/{slug}', [Frontend\FrontendController::class, 'shop_tag'])->name('frontend.shop_tag');
Route::get('/product/{slug?}', [Frontend\FrontendController::class, 'product'])->name('frontend.product');
Route::get('/cart', [Frontend\FrontendController::class, 'cart'])->name('frontend.cart');
Route::get('/wishlist', [Frontend\FrontendController::class, 'wishlist'])->name('frontend.wishlist');
Route::get('/detail', [Frontend\FrontendController::class, 'detail'])->name('frontend.detail');


/////////////////////////////////  Customer Routs    /////////////////////////////////////////
Route::group(['middleware' => ['roles', 'role:customer']], function () {

    Route::get('/dashboard', [Frontend\CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/profile', [Frontend\CustomerController::class, 'profile'])->name('customer.profile');
    Route::patch('/profile', [Frontend\CustomerController::class, 'update_profile'])->name('customer.update_profile');
    Route::get('/profile/remove-image', [Frontend\CustomerController::class, 'remove_profile_image'])->name('customer.remove_profile_image');
    Route::get('/addresses', [Frontend\CustomerController::class, 'addresses'])->name('customer.addresses');
    Route::get('/orders', [Frontend\CustomerController::class, 'orders'])->name('customer.orders');


    Route::group(['middleware' => 'check_cart'], function(){

        Route::get('/checkout', [Frontend\PaymentController::class, 'checkout'])->name('frontend.checkout');
        Route::post('/checkout/payment', [Frontend\PaymentController::class, 'checkout_now'])->name('checkout.payment');
        Route::get('/checkout/{order_id}/cancelled', [Frontend\PaymentController::class, 'cancelled'])->name('checkout.cancel');
        Route::get('/checkout/{order_id}/completed', [Frontend\PaymentController::class, 'completed'])->name('checkout.complete');
        Route::get('/checkout/webhook/{order?}/{env?}', [Frontend\PaymentController::class, 'webhook'])->name('checkout.webhook.ipn');
    });


});



Auth::routes(['verify' => true]);


/////////////////////////////////  Auth Routs    /////////////////////////////////////////
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::group(['middleware' => 'guest'], function () {

        Route::get('/login', [Backend\BackendController::class, 'login'])->name('login');
        Route::get('/forgot-password', [Backend\BackendController::class, 'forgot_password'])->name('forgot_password');
    });


    Route::group(['middleware' => ['roles', 'role:admin|supervisor']], function () {

        ///////////////////////  Index Routs    ///////////////////////
        Route::get('/', [Backend\BackendController::class, 'index'])->name('index_route');
        Route::get('/index', [Backend\BackendController::class, 'index'])->name('index');
        Route::get('/account_settings', [Backend\BackendController::class, 'account_settings'])->name('account_settings');
        Route::post('/admin/remove-image', [Backend\BackendController::class, 'remove_image'])->name('remove_image');
        Route::patch('/account_settings', [Backend\BackendController::class, 'update_account_settings'])->name('update_account_settings');


        ///////////////////////  Product Categories Routs   ///////////////////////
        Route::resource('product_categories', Backend\ProductCategoriesController::class);
        Route::post('/product_categories/remove-image', [Backend\ProductCategoriesController::class, 'remove_image'])->name('product_categories.remove_image');


        ///////////////////////  Tags Rout    ///////////////////////
        Route::resource('tags', Backend\TagController::class);


        ///////////////////////  Products Routs    ///////////////////////
        Route::resource('products', Backend\ProductController::class);
        Route::post('/products/remove-image', [Backend\ProductController::class, 'remove_image'])->name('products.remove_image');


        ///////////////////////  Products Coupons    ///////////////////////
        Route::resource('product_coupons', Backend\ProductCouponController::class);


        ///////////////////////  Products Reviws    ///////////////////////
        Route::resource('product_reviews', Backend\ProductReviewController::class);


        ///////////////////////  Users  & Customers  ///////////////////////
        Route::get('/customers/get_customers', [Backend\CustomerController::class, 'get_customers'])->name('customers.get_customers');
        Route::resource('customers', Backend\CustomerController::class);
        Route::post('/customers/remove-image', [Backend\CustomerController::class, 'remove_image'])->name('customers.remove_image');

        ///////////////////////  Customers Addresses    ///////////////////////
        Route::resource('customer_addresses', Backend\CustomerAddressController::class);

        ///////////////////////  Users    ///////////////////////
        Route::resource('supervisors', Backend\SupervisorController::class);
        Route::post('/supervisors/remove-image', [Backend\SupervisorController::class, 'remove_image'])->name('supervisors.remove_image');


        ///////////////////////  World    /////////////////////////////
        Route::get('cities/get_cities', [Backend\CityController::class, 'get_cities'])->name('cities.get_cities');
        Route::get('states/get_states', [Backend\StateController::class, 'get_states'])->name('states.get_states');
        Route::resource('countries', Backend\CountryController::class);
        Route::resource('states', Backend\StateController::class);
        Route::resource('cities', Backend\CityController::class);

        ///////////////////////  Shipping Companies    ///////////////////////
        Route::resource('shipping_companies', Backend\ShippingCompanyController::class);

        ///////////////////////  Payment Method    ///////////////////////
        Route::resource('payment_methods', Backend\PaymentMethodController::class);

        ///////////////////////  Orders   /////////////////////////////
        Route::resource('orders', Backend\OrderController::class);

    });
});
