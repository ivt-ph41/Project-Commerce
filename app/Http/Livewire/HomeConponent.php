<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeConponent extends Component
{
    public function render()
    {
        $product_new = Product::inRandomOrder()->get()->take(8);
        $product_sale = Product::where('sale_percent','>',0)->inRandomOrder()->get()->take(8);
        $category_product = Category::with('cate_products')->orderby('name')->get();
        if(Auth::check()){
            $related_products = Product::select('category_id','regular_price')->whereHas('products_orders',function($query){
                $query->whereHas('orders',function($query){
                    $query->where('user_id',Auth::user()->id);
                });
            })->get()->toArray();
            $related_products = Product::whereIN('category_id',$related_products)->get();
        }else $related_products = [];
        return view('livewire.home',compact('product_sale','category_product','product_new','related_products'))->layout('layouts.base');
    }
}
