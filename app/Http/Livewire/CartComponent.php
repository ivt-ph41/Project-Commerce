<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartComponent extends Component
{
    public function upQuantity($rowId){
        $product = Cart::get($rowId);
        $quantitys = Product::select('quantity')->find($product->model->id);
       if($quantitys->quantity >  $product->qty){
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
       }else{
           $this->emit('check_quantity');
       }
    }
    public function downQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
    }
    public function remove($rowId){
        Cart::remove($rowId);
    }
    public function destroyAll(){
        Cart::destroy();
    }
    public function render()
    {
        $product_hot = Product::inRandomOrder()->whereHas('products_orders',function($query){
            $query->orderBy('created_at');
        })->paginate(12);
        return view('livewire.cart',compact('product_hot'))->layout('layouts.base');;
    }
}
