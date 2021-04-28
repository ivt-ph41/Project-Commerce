<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\CategorySlider;
use App\Models\Discount;
use GuzzleHttp\Psr7\Request;
use Livewire\Livewire;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
class AdminVoucherComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $ids;
    public $code;
    public $type;
    public $end_day;
    public $start_day;
    public $price;
    public $quantity;
    public $SelectDelete = [];
    public $search;
    public $sort;
    protected $paginationTheme = 'bootstrap';
    public function mount(){
        $this->sort = 'default';
    }
    // public function resetInput(){
    //     $this->name = '';
    //     $this->file = '';
    //     $this->slug = '';
    //     $this->file_banner = '';
    //     $this->brand = '';
    // }
    // public function status($id){
    //     $categories = Category::withTrashed()->find($id);
    //     if($categories->status == 'enable'){
    //         $categories->update([
    //             'status' => 'disable',
    //         ]);
    //         $categories->delete();
    //         $this->emit('disable');
    //     }
    //     else{
    //         $categories->update([
    //             'status' => 'enable',
    //         ]);
    //         $categories->restore();
    //         $this->emit('enable');
    //     }
    // }
    // public function updated($request){
    //     $this->validateOnly($request,
    //         [
    //         'name' => 'required',
    //         'file' => 'required',
    //         'slug' => 'required',
    //         'file_banner' => 'required',
    //         'brand' => 'required',
    //         ]
    //         );
    // }
    public function store(){
        $this->validate([
            'code' => 'required',
            'type' => 'required',
            'price' => 'required',
            'start_day' => 'required',
            'end_day' => 'required',
            'quantity' => 'required',
        ]);
        $discounts = Discount::create([
            'code' => $this->code,
            'type' => $this->type,
            'reduced_price' => $this->price,
            'start_day' => $this->start_day,
            'end_day' => $this->end_day,
            'quantity' => $this->quantity,
            'updated_at' => Null
        ]);
        // $this->resetInput();
        $this->emit('Add_success');
    }
    public function edit($id){
        $discounts = Discount::find($id);
        $this->ids = $discounts->id;
        $this->code = $discounts->code;
        $this->type = $discounts->type;
        $this->price = $discounts->reduced_price;
        $this->start_day = $discounts->start_day;
        $this->end_day = $discounts->end_day;
        $this->quantity = $discounts->quantity;
    }
    public function update(){
        if(isset($this->ids)){
            $this->validate([
                'code' => 'required',
                'type' => 'required',
                'price' => 'required',
                'start_day' => 'required',
                'end_day' => 'required',
                'quantity' => 'required',
            ]);
            $discounts = Discount::find($this->ids);
            $discounts->update([
                'code' => $this->code,
                'type' => $this->type,
                'reduced_price' => $this->price,
                'start_day' => $this->start_day,
                'end_day' => $this->end_day,
                'quantity' => $this->quantity,
            ]);
        }
        // $this->resetInput();
        $this->emit('Edit_success');
    }
    public function delete($id){
        $discounts = Discount::find($id);
        $discounts->delete();
    }
    // public function deleteAll(){
    //     $categories = Category::withTrashed()->whereIn('id',$this->SelectDelete);
    //     $categories->forceDelete();
    //     $categories->cate_manus()->detach();
    //     $this->SelectDelete = [];
    // }
    public function render()
    {
        // if($this->sort=='default'){
        //     $categories = Category::with('category_sliders','cate_manus')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')
        // ->Orwhere('status','like','%'.$this->search.'%')->Orwhere('created_at','like','%'.$this->search.'%')
        // ->Orwhere('updated_at','like','%'.$this->search.'%')->paginate(5);
        // }elseif($this->sort=='name'){
        //     $categories = Category::with('category_sliders','cate_manus')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')
        // ->Orwhere('status','like','%'.$this->search.'%')->Orwhere('created_at','like','%'.$this->search.'%')
        // ->Orwhere('updated_at','like','%'.$this->search.'%')->orderBy('name')->paginate(5);
        // }elseif($this->sort=='slug'){
        //     $categories = Category::with('category_sliders','cate_manus')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')
        // ->Orwhere('status','like','%'.$this->search.'%')->orderBy('slug')->Orwhere('created_at','like','%'.$this->search.'%')
        // ->Orwhere('updated_at','like','%'.$this->search.'%')->paginate(5);
        // }elseif($this->sort=='created_at'){
        //     $categories = Category::with('category_sliders','cate_manus')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')
        // ->Orwhere('status','like','%'.$this->search.'%')->orderBy('created_at')->Orwhere('created_at','like','%'.$this->search.'%')
        // ->Orwhere('updated_at','like','%'.$this->search.'%')->paginate(5);
        // }elseif($this->sort=='updated_at'){
        //     $categories = Category::with('category_sliders','cate_manus')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')
        // ->Orwhere('status','like','%'.$this->search.'%')->orderBy('updated_at')->Orwhere('created_at','like','%'.$this->search.'%')
        // ->Orwhere('updated_at','like','%'.$this->search.'%')->paginate(5);
        // }elseif($this->sort=='status'){
        //     $categories = Category::with('category_sliders','cate_manus')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')
        // ->Orwhere('status','like','%'.$this->search.'%')->orderBy('status')->Orwhere('created_at','like','%'.$this->search.'%')
        // ->Orwhere('updated_at','like','%'.$this->search.'%')->paginate(5);
        // }
        $discounts = Discount::paginate();
        return view('livewire.admin.admin-voucher-component',compact('discounts'))->layout('layouts.admin')->slot('main');
    }
}

