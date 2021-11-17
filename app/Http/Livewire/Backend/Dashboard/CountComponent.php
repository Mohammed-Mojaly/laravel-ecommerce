<?php

namespace App\Http\Livewire\Backend\Dashboard;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class CountComponent extends Component
{
    public $allcustomers = 0;
    public $allproducts = 0;
    public $allordres = 0;

    public function render()
    {
        $this->allcustomers =  User::whereHas('roles' , function($query){
            $query->where('name' , 'customer');
        })->count();
        $this->allproducts = Product::whereStatus(1)->count();
        $this->allordres   = Order::whereOrderStatus(Order::FINISHED)->count();

        return view('livewire.backend.dashboard.count-component');
    }
}
