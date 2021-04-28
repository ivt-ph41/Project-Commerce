<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public $Select_time;
    public function mount(){
        $this->Select_time = 'week';
    }
    public function render()
    {
        $dateline_week =date('Y-m-d H:i:s',strtotime('-7 day',strtotime(date('Y-m-d H:i:s'))));
        $dateline_month =date('Y-m-d H:i:s',strtotime('-30 day',strtotime(date('Y-m-d H:i:s'))));
        $dateline_year =date('Y-m-d H:i:s',strtotime('-365 day',strtotime(date('Y-m-d H:i:s'))));
       if($this->Select_time='week'){
            $sum_orders = Order::where('created_at','>',$dateline_week)->sum('total');
            $count_orders = Order::where('created_at','>',$dateline_week)->count();
            $count_users = User::where('created_at','>',$dateline_week)->count();
       }elseif($this->Select_time='month'){
            $sum_orders = Order::where('created_at','>',$dateline_month)->sum('total');
            $count_orders = Order::where('created_at','>',$dateline_month)->count();
            $count_users = User::where('created_at','>',$dateline_month)->count();
       }elseif($this->Select_time='year'){
            $sum_orders = Order::where('created_at','>',$dateline_year)->sum('total');
            $count_orders = Order::where('created_at','>',$dateline_year)->count();
            $count_users = User::where('created_at','>',$dateline_year)->count();
        }
        return view('livewire.admin.admin-dashboard-component',compact('sum_orders','count_orders','count_users'))->layout('layouts.admin')->slot('main');
    }
}
