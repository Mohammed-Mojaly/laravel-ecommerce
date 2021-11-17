<?php

namespace App\Http\Livewire\Backend\Dashboard;

use Livewire\Component;
use App\Models\Order;


class StatisticsComponent extends Component
{
    public $currentMonthEarning = 0;
    public $currentAnnualEarning = 0;
    public $currentMonthOrderNew = 0;
    public $currentMonthOrderFinished = 0;

    public function render()
    {
        $this->currentMonthEarning = Order::whereOrderStatus(Order::FINISHED)->whereMonth('created_at' , date('m'))->sum('total');
        $this->currentAnnualEarning = Order::whereOrderStatus(Order::FINISHED)->whereYear('created_at' , date('Y'))->sum('total');
        $this->currentMonthOrderNew = Order::whereOrderStatus(Order::NEW_ORDER)->whereMonth('created_at' , date('m'))->count();
        $this->currentMonthOrderFinished = Order::whereOrderStatus(Order::FINISHED)->whereMonth('created_at', date('m'))->count();        return view('livewire.backend.dashboard.statistics-component');
    }
}
