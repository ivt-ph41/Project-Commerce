<?php

namespace App\Http\Livewire\User;

use App\Models\ListWish;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UserListWishComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function storeCart($product_id,$product_name,$product_price){
        if(Auth::check()){
             Cart::add($product_id,$product_name,1,$product_price,['color' => 'black'])->associate('App\Models\Product');
             $this->emit('cart');
        }else{
            return redirect()->route('login');
        }
    }
    public function remove($id){
        $wishlists= ListWish::find($id)->delete();
    }
    public function render()
    {
        $wishlists = ListWish::with('wishlist_products')->where('user_id',Auth::user()->id)->paginate(10);
        return view('livewire.user.user-list-wish-component',compact('wishlists'))->layout('layouts.base');
    }
}
