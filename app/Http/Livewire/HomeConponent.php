<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class HomeConponent extends Component
{
    public function render()
    {
        $product_new = Product::inRandomOrder()->get()->take(8);
        $product_sale = Product::where('sale_percent','>',0)->inRandomOrder()->get()->take(8);
        $category_product = Category::with('cate_products')->orderby('name')->get();
        return view('livewire.home',compact('product_sale','category_product','product_new'))->layout('layouts.base');
    }
}
