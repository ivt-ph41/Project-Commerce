<?php

namespace App\Http\Livewire\User;

use App\Models\Commune;
use App\Models\District;
use App\Models\Province;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserAccountComponent extends Component
{
    public $name;
    public $email;
    public $birthday;
    public $phone;
    public $province;
    public $district;
    public $commune;
    public $stress;
    public function mount(){
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->birthday = Auth::user()->birth_day;
        $this->phone = Auth::user()->phone_number;
        $this->province = Auth::user()->province_id;
        $this->district = Auth::user()->district_id;
        $this->commune = Auth::user()->commune_id;
        $this->stress = Auth::user()->stress;
    }
    public function update(){
        $users = User::find(Auth::user()->id);
        $users->update([
            'name' => $this->name,
            'email' => $this->email,
            'birth_day' => $this->birthday,
            'phone_number' => $this->phone,
            'province_id' => $this->province,
            'district_id' => $this->district,
            'commune_id' => $this->commune,
            'stress' => $this->stress
        ]);
    }
    public function render()
    {
        $provinces = Province::all();
        $districts = District::where('matp',$this->province)->get();
        $communes = Commune::where('maqh',$this->district)->get();
        $users = User::with('user_province','user_district','user_commune')->where('id',Auth::user()->id)->first();
        return view('livewire.user.user-account-component',compact('provinces','districts','communes','users'))->layout('layouts.base');
    }
}
