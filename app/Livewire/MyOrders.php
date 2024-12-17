<?php

namespace App\Livewire;

use Livewire\Component;

class MyOrders extends Component
{

    public function getOrdersProeprty()
    {
        return auth()->user()->ordersProeprty;
    }

    public function render()
    {
        return view('livewire.my-orders');
    }
}
