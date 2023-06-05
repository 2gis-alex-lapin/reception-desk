<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Orders;
use App\Models\Order;

class Orders extends Component
{
    public function render()
    {
        return view('livewire.orders.form');
    }
}
