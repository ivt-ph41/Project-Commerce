<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserOrderComponent extends Component
{
    public function render()
    {
        $orders = Order::with('order_items','products')->where('user_id',Auth::user()->id)->get();
        return view('livewire.user.user-order-component',compact('orders'))->layout('layouts.base');
    }
}
