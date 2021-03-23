<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartComponent extends Component
{
    public function upQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
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
        return view('livewire.cart')->layout('layouts.base');;
    }
}
