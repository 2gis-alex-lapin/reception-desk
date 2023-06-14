<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Orders;
use App\Http\Livewire\Forms;
use App\Models\Order;

class Orders extends Component
{
    public $title, $slug;

    public function render()
    {
        $order_slug = collect(request()->segments())->last();
        $this->slug = $order_slug;
        $this->title = __('orders.titles.'.$order_slug);
        
        return view('livewire.orders.index');
    }

}
