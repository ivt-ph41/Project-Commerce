<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserOrderComponent extends Component
{
    public $sort;
    public function mount(){
        $this->sort = 'default';
    }
    public function cancel($id){
        $orders = Order::find($id);
        if($orders->status=='new orders'){
            $orders->update([
                'status' => 'Cancelled',
            ]);
        }else{
            $this->emit('status_order');
        }
    }
    public function render()
    {
        if($this->sort == 'default'){
            $orders = Order::with('order_items','products')->where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(5);
        }else
        $orders = Order::with('order_items','products')->where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
        return view('livewire.user.user-order-component',compact('orders'))->layout('layouts.base');
    }
}
