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
    public $SelectRam = [];
    public $SelectOS = [];
    public $Battery = [];
    public $price_start;
    public $price_end;
    public $search;
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
                $products = Products::with('product_images')->where('category_id',$category->id)->where('manufacturer_id',$brand->id)
                ->where(function($query){
                    $query->where('quantity','>',0);
                })->where(function($query){
                    $query ->where('name','like','%'.$this->search.'%')->Orwhere('regular_price','like','%'.$this->search.'%');
                })->paginate(20);
            }
            else if($this->sort=="popularity"){
                $products = Products::with('product_images')->where('category_id',$category->id)->where('manufacturer_id',$brand->id)
                ->where(function($query){
                    $query->where('quantity','>',0);
                })->where(function($query){
                    $query ->where('name','like','%'.$this->search.'%')->Orwhere('regular_price','like','%'.$this->search.'%');
                })->orderBy('view','DESC')->paginate(20);
            }else if($this->sort=="price"){
                $products = Products::with('product_images')->where('category_id',$category->id)->where('manufacturer_id',$brand->id)
                ->where(function($query){
                    $query->where('quantity','>',0);
                })->where(function($query){
                    $query ->where('name','like','%'.$this->search.'%')->Orwhere('regular_price','like','%'.$this->search.'%');
                })->orderBy('regular_price')->paginate(20);
            }
            else if($this->sort=="price-desc"){
                $products = Products::with('product_images')->where('category_id',$category->id)->where('manufacturer_id',$brand->id)
                ->where(function($query){
                    $query->where('quantity','>',0);
                })->where(function($query){
                    $query ->where('name','like','%'.$this->search.'%')->Orwhere('regular_price','like','%'.$this->search.'%');
                })->orderBy('regular_price','DESC')->paginate(20);
            }
        }
        $brand_show = $category->cate_manus;
        $brand_sliders = Manufacturer::where('slug',$this->slug_brand)->first()->brand_sliders;
        if($this->SelectColor != Null){
            $products = Products::with('product_images')->where('quantity','>',0)->where('category_id',$category->id)->where('manufacturer_id',$brand->id)->whereIn('color',$this->SelectColor)->paginate(20);
        }
        if($this->SelectRam != Null){
            $products = Products::with('product_images')->where('quantity','>',0)->where('category_id',$category->id)->where('manufacturer_id',$brand->id)->whereIn('ram',$this->SelectRam)->paginate(20);
        }
        if($this->SelectOS != Null){
            $products = Products::with('product_images')->where('quantity','>',0)->where('category_id',$category->id)->where('manufacturer_id',$brand->id)->whereIn('operating_system',$this->SelectOS)->paginate(20);
        }
        if($this->Battery != Null){
            $products = Products::with('product_images')->where('quantity','>',0)->where('category_id',$category->id)->where('manufacturer_id',$brand->id)->whereIn('battery_capacity',$this->Battery)->paginate(20);
        }
        if($this->price_start >0 && $this->price_end >0){
            $products = Products::with('product_images')->where('quantity','>',0)->where('category_id',$category->id)->where('manufacturer_id',$brand->id)->whereBetween('regular_price', [$this->price_start, $this->price_end])
            ->paginate(20);
        }
        return view('livewire.brand-component',compact('products','brand_show','brand_sliders'))->layout('layouts.base');;
    }
}


