<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product As Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
class ShopComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $sort;
    public $price_start;
    public $price_end;
    public $search;
    public function mount(){
        $this->sort = "default";
    }
    public function store($product_id,$product_name,$product_price){
        if(Auth::check()){
            Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
            $this->emit('cart');
        }else
        {
            session()->flash('check_login','You need to log in to continue!');
            return redirect()->route('login');
        }
    }
    public function render()
    {
        if($this->sort=="default"){
            $products = Products::with('product_images')->Orwhere('name','like','%'.$this->search.'%')->Orwhere('regular_price','like','%'.$this->search.'%')->paginate(20);
        }
        else if($this->sort=="popularity"){
            $products = Products::with('product_images')->Orwhere('name','like','%'.$this->search.'%')->Orwhere('regular_price','like','%'.$this->search.'%')->orderBy('view','DESC')->paginate(20);
        }else if($this->sort=="price"){
            $products = Products::with('product_images')->Orwhere('name','like','%'.$this->search.'%')->Orwhere('regular_price','like','%'.$this->search.'%')->orderBy('regular_price')->paginate(20);
        }
        else if($this->sort=="price-desc"){
            $products = Products::with('product_images')->Orwhere('name','like','%'.$this->search.'%')->Orwhere('regular_price','like','%'.$this->search.'%')->orderBy('regular_price','DESC')->paginate(20);
        }else
        $products = Products::with('product_images')->Orwhere('name','like','%'.$this->search.'%')->Orwhere('regular_price','like','%'.$this->search.'%')->paginate(20);
        if($this->price_start >0 && $this->price_end >0){
            $products = Products::with('product_images')->whereBetween('regular_price', [$this->price_start, $this->price_end])
            ->paginate(20);
        }
        return view('livewire.shop',compact('products'))->layout('layouts.base');;
    }
}
