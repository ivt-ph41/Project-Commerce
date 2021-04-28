<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SearchProductComponent extends Component
{
    public function render(Request $request)
    {
        $categories = Category::select('id')->where('name','like','%'.$request->search.'%')->get()->toArray();
        $products = Product::where('category_id',$categories)
        ->orwhere('name','like','%'.$request->search.'%')
        ->where('quantity','>',0)
        ->paginate(20);
        $count_product =  $products->count();
        return view('livewire.shop',compact('products','count_product'))->layout('layouts.base');;
    }
    public function store($product_id,$product_name,$product_price){
        if(Auth::check()){
            Cart::add($product_id,$product_name,1,$product_price,['color' => 'Black'])->associate('App\Models\Product');
            $this->emit('cart');
        }else
        {
            session()->flash('check_login','You need to log in to continue!');
            return redirect()->route('login');
        }
    }
}
