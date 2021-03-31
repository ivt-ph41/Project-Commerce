<?php

namespace App\Http\Livewire\User;

use App\Models\Discount;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserVoucherComponent extends Component
{
    public function get_code($id){
        $get_code = Discount::find($id);
        $get_code->discount_users()->attach(Auth::user()->id);
        $get_code->decrement('quantity');
        $this->emit('voucher');
    }
    public function render()
    {
        $vouchers = Discount::with('discount_users')->get();
        return view('livewire.user.user-voucher-component',compact('vouchers'))->layout('layouts.base');
    }
}
