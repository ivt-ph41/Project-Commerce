<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product As Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
class BrandComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $sort;
    public $slug_brand;
    public $slug_cat;
    public $SelectColor = [];
    public function mount($slug_brand,$slug_cat){
        $this->sort = "default";
        $this->slug_brand = $slug_brand;
        $this->slug_cat = $slug_cat;
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
        $brand = Manufacturer::where('slug',$this->slug_brand)->first();
        $category = Category::where('slug',$this->slug_cat)->first();
        if($this->sort!=Null){
            if($this->sort=="default"){
                $products = Products::with('product_images')->where('category_id',$category->id)->where('manufacturer_id',$brand->id)->paginate(12);
            }
            else if($this->sort=="popularity"){
                $products = Products::with('product_images')->where('manufacturer_id',$brand->id)->orderBy('view','DESC')->paginate(12);
            }else if($this->sort=="price"){
                $products = Products::with('product_images')->where('manufacturer_id',$brand->id)->orderBy('regular_price')->paginate(12);
            }
            else if($this->sort=="price-desc"){
                $products = Products::with('product_images')->where('manufacturer_id',$brand->id)->orderBy('regular_price','DESC')->paginate(12);
            }
        }
        $brand_show = $category->cate_manus;
        $brand_sliders = Manufacturer::where('slug',$this->slug_brand)->first()->brand_sliders;
        if($this->SelectColor != Null){
            $products = Products::with('product_images')->where('manufacturer_id',$brand->id)->whereIn('color',$this->SelectColor)->paginate(20);
        }
        return view('livewire.brand-component',compact('products','brand_show','brand_sliders'))->layout('layouts.base');;
    }
}


