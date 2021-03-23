<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public $text = 0;
    public function plus(){
        $this->text++;
    }
    public function render()
    {
        return view('livewire.admin.admin-dashboard-component')->layout('layouts.admin')->slot('main');
    }
}
