<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\CategorySlider;
use App\Models\Product;
use App\Models\ProductImage;
use Livewire\Livewire;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
class AdminProductComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $id_dt;
    public $ids;
    public $name;
    public $file;
    public $slug;
    public $sku;
    public $short_description;
    public $description;
    public $origin_price;
    public $sale_percent;
    public $regular_price;
    public $quantity;
    public $color;
    public $origin;
    public $weight;
    public $Dimension;
    public $ram;
    public $battery_capacity;
    public $network_connect;
    public $operating_system;
    public $detail_image = [];
    public $category_id ;
    public $manufacturer_id;
    public $SelectDelete = [];
    public $search;
    public $sort;
//     protected $paginationTheme = 'bootstrap';
    public function mount(){
        $this->sort = 'default';
        $this->ram = '';
        $this->operating_system ='';
        $this->network_connect ='';
        $this->battery_capacity='';
        $this->color = '';
    }
//     public function resetInput(){
//         $this->name = '';
//         $this->file = '';
//         $this->slug = '';
//         $this->file_banner = '';
//         $this->brand = '';
//     }
    public function status($id){
        $products = Product::withTrashed()->find($id);
        if($products->stock_status == 'instock'){
            $products->update([
                'stock_status' => 'outofstock',
            ]);
            $products->delete();
            $this->emit('disable');
        }
        else{
            $products->update([
                'stock_status' => 'instock',
            ]);
            $products->restore();
            $this->emit('enable');
        }
    }
    public function updated($request){
        $this->validateOnly($request,
        [
            'name' => 'required',
            'file' =>'required',
            'detail_image' =>'required',
            'sku' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'origin_price' => 'required',
            'sale_percent' => 'required',
            'quantity' => 'required',
            'color' =>'required',
            'origin' =>'required',
            'weight' => 'required',
            'Dimension' => 'required',
            'slug' => 'required',
            'category_id' => 'required',
            'manufacturer_id' => 'required'
        ]
            );
    }
    public function store(){
        $this->validate(
            [
                'name' => 'required',
                'file' =>'required',
                'detail_image' =>'required',
                'sku' => 'required',
                'short_description' => 'required',
                'description' => 'required',
                'origin_price' => 'required',
                'sale_percent' => 'required',
                'quantity' => 'required',
                'color' =>'required',
                'origin' =>'required',
                'weight' => 'required',
                'Dimension' => 'required',
                'slug' => 'required',
                'category_id' => 'required',
                'manufacturer_id' => 'required'
            ]
        );
        $path = $this->file->storeAs('products',$this->file->getClientOriginalName(),'public');
        $products = Product::create([
            'name' => $this->name,
            'image' => $path,
            'SKU' => $this->sku,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'origin_price' => $this->origin_price,
            'sale_percent' => $this->sale_percent,
            'regular_price' => $this->origin_price*(100 - $this->sale_percent)/100,
            'quantity' => $this->quantity,
            'color' =>$this->color,
            'origin' =>$this->origin,
            'weight' => $this->weight,
            'Dimension' => $this->Dimension,
            'ram' => $this->ram,
            'slug' => $this->slug,
            'updated_at' => Null,
            'category_id' => $this->category_id,
            'manufacturer_id' => $this->manufacturer_id,
            'battery_capacity' => $this->battery_capacity,
            'network_connect' =>$this->network_connect,
            'operating_system' => $this->operating_system
        ]);
        foreach ($this->detail_image as $item) {
            $path_detail = $item->storeAs('product_detail',$item->getClientOriginalName(),'public');
            $product_image = Product::find($products->id);
            $product_image->product_images()->create([
                'images' => $path_detail,
                'product_id' => $products->id
            ]);
        }
        // $this->resetInput();
        $this->emit('Add_success');
    }
    public function edit($id){
        $products = Product::withTrashed()->find($id);
             $this->ids = $products->id;
             $this->name = $products->name;
             $this->file = $products->image;
             $this->sku = $products->SKU;
             $this->short_description = $products->short_description;
             $this->description = $products->description;
             $this->origin_price = $products->origin_price;
             $this->sale_percent = $products->sale_percent;
             $this->quantity = $products->quantity;
             $this->color = $products->color;
             $this->origin = $products->origin;
             $this->weight = $products->weight;
             $this->Dimension = $products->Dimension;
             $this->ram = $products->ram;
             $this->slug = $products->slug;
             $this->category_id = $products->category_id;
             $this->manufacturer_id = $products->manufacturer_id;
             $this->battery_capacity =  $products->battery_capacity;
             $this->network_connect =  $products->network_connect;
             $this->operating_system = $products->operating_system;
    }
    public function update(){
        if(isset($this->ids)){
            $this->validate(
                [
                    'name' => 'required',
                    'file' =>'required',
                    'detail_image' =>'required',
                    'sku' => 'required',
                    'short_description' => 'required',
                    'description' => 'required',
                    'origin_price' => 'required',
                    'sale_percent' => 'required',
                    'quantity' => 'required',
                    'color' =>'required',
                    'origin' =>'required',
                    'weight' => 'required',
                    'Dimension' => 'required',
                    'ram' => 'required',
                    'slug' => 'required',
                    'category_id' => 'required',
                    'manufacturer_id' => 'required'
                ]
            );
            $path = $this->file->storeAs('products',$this->file->getClientOriginalName(),'public');
            $products = Product::withTrashed()->find($this->ids);
            $products->update([
                'name' => $this->name,
                'image' => $path,
                'SKU' => $this->sku,
                'short_description' => $this->short_description,
                'description' => $this->description,
                'origin_price' => $this->origin_price,
                'sale_percent' => $this->sale_percent,
                'regular_price' => $this->origin_price*(100 - $this->sale_percent)/100,
                'quantity' => $this->quantity,
                'color' =>$this->color,
                'origin' =>$this->origin,
                'weight' => $this->weight,
                'Dimension' => $this->Dimension,
                'ram' => $this->ram,
                'battery_capacity' => $this->battery_capacity,
                'network_connect' =>   $this->network_connect,
                 'operating_system' =>  $this->operating_system,
                'slug' => $this->slug,
                'category_id' => $this->category_id,
                'manufacturer_id' => $this->manufacturer_id
            ]);
            ProductImage::where('product_id',$products->id)->delete();
            foreach ($this->detail_image as $item) {
                $path_detail = $item->storeAs('product_detail',$item->getClientOriginalName(),'public');
                $product_image = Product::withTrashed()->find($products->id);
                $product_image->product_images()->create([
                    'images' => $path_detail,
                    'product_id' => $products->id
                ]);
            }
        // $this->resetInput();
        $this->emit('Edit_success');
        }
    }
    public function detail($id){
        $product_details = Product::find($id);
        $this->id_dt = $product_details->id;
    }
    public function delete($id){
        $products = Product::withTrashed()->find($id);
        $products->forceDelete();
    }
    public function deleteAll(){
        $products = Product::withTrashed()->whereIn('id',$this->SelectDelete);
        $products->forceDelete();
        $this->SelectDelete = [];
    }
    public function render()
    {
        $categories = Category::all();
        if($this->category_id){
            $brands = Category::find($this->category_id)->cate_manus;
        }else{
            $brands = [];
        }
        if(isset($this->id_dt)){
            $product_details = Product::with('product_brands','product_categories')->find($this->id_dt);
        }else{
            $product_details=[];
        }
        if($this->sort=='default'){
            $products = Product::with('product_images','product_brands','product_categories')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')->orderBy('created_at','ASC')->paginate(20);
        }
        elseif($this->sort=='name'){
            $products = Product::with('product_images','product_brands','product_categories')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')->orderBy('name','ASC')->paginate(20);
        }
        elseif($this->sort=='price_up'){
            $products = Product::with('product_images','product_brands','product_categories')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')->orderBy('origin_price','ASC')->paginate(20);
        }
        elseif($this->sort=='price_down'){
            $products = Product::with('product_images','product_brands','product_categories')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')->orderBy('origin_price','DESC')->paginate(20);
        }
        elseif($this->sort=='view'){
            $products = Product::with('product_images','product_brands','product_categories')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')->orderBy('view','DESC')->paginate(20);
        }
        elseif($this->sort=='created_at'){
            $products = Product::with('product_images','product_brands','product_categories')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')->orderBy('created_at','DESC')->paginate(20);
        }
        elseif($this->sort=='updated_at'){
            $products = Product::with('product_images','product_brands','product_categories')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')->orderBy('updated_at','ASC')->paginate(20);
        }
        elseif($this->sort=='status'){
            $products = Product::with('product_images','product_brands','product_categories')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')->orderBy('stock_status','ASC')->paginate(20);
        }
        return view('livewire.admin.admin-product-component',compact('products','categories','brands','product_details'))->layout('layouts.admin')->slot('main');
    }
}

