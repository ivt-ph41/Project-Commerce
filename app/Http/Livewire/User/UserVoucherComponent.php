<?php

namespace App\Http\Livewire\User;

use App\Models\Discount;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App;
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
        $vouchers = Discount::with('discount_users')->where('quantity','>',0)
        ->where('end_day','>',now())
        ->get();
        $voucher_sliders = Slider::where('type',1)->get();
        return view('livewire.user.user-voucher-component',compact('vouchers','voucher_sliders'))->layout('layouts.base');
    }
}
