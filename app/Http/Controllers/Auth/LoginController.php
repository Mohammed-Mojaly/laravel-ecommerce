<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers {
        logout as protected originalLogout;
    }


    protected $redirectTo = RouteServiceProvider::HOME;

    public function username()
    {
        return 'username';
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function logout(Request $request)
    {
        $cart = collect($request->session()->get('cart'));

        // Call original logout method
        $response = $this->originalLogout($request);

        // save cart after logout in session
        if(!config('cart.destroy_on_logout'))
        {
            $cart->each(function ($rows,$identifier) use ($request){
                $request->session()->get('cart.' . $identifier , $rows);
            });
        }
        return $response;
    }

    protected function loggedOut(Request $request)
    {
        Cache::forget('role_routes');
        Cache::forget('user_routes');
        Cache::forget('admin_side_menu');
    }

    public function redirectTo()
    {
        if(auth()->user()->roles()->first()->allowed_route != ''){
            return $this->redirectTo = auth()->user()->roles()->first()->allowed_route . '/index';
        }
    }

}
