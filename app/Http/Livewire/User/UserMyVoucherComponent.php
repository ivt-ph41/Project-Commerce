<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserMyVoucherComponent extends Component
{
    public function render()
    {
        $Myvouchers = User::with('user_discounts')->find(Auth::user()->id);
        return view('livewire.user.user-my-voucher-component',compact('Myvouchers'))->layout('layouts.base');
    }
}
