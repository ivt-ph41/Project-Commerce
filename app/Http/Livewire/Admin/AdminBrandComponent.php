<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\CategorySlider;
use App\Models\Manufacturer;
use GuzzleHttp\Psr7\Request;
use Livewire\Livewire;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
class AdminBrandComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $ids;
    public $name;
    public $file;
    public $slug;
    public $address;
    public $file_banner = [];
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
    public function status($id){
        $brands = Manufacturer::withTrashed()->find($id);
        if($brands->status == 'enable'){
            $brands->update([
                'status' => 'disable',
            ]);
            $brands->delete();
            $this->emit('disable');
        }
        else{
            $brands->update([
                'status' => 'enable',
            ]);
            $brands->restore();
            $this->emit('enable');
        }
    }
    // public function updated($request){
    //     $this->validateOnly($request,
    //         [
    //         'name' => 'required',
    //         'file' => 'required',
    //         'slug' => 'required',
    //         'file_banner' => 'required',
    //         ]
    //         );
    // }
    // public function store(){
    //     $this->validate([
    //         'name' => 'required',
    //         'file' => 'required',
    //         'slug' => 'required',
    //         'file_banner' => 'required',
    //         'address' => 'required'
    //     ]);
    //     $brands = Manufacturer::create([
    //         'name' => $this->name,
    //         'address' => $this->address,
    //         'slug' => $this->slug,
    //         'updated_at' => Null
    //     ]);
    //     foreach ($this->file_banner as $item) {
    //         $path_banner = $item->storeAs('category_sliders',$item->getClientOriginalName(),'public');
    //         $category_sliders = Manufacturer::find($brands->id);
    //         $category_sliders->brand_sliders()->create([
    //             'name' => $path_banner,
    //             'description' => 'ok',
    //             'images' => $path_banner,
    //             'manufacturer_id' => $brands->id
    //         ]);
    //     }
    //     $this->resetInput();
    //     $this->emit('Add_success');
    // }
    // public function edit($id){
    //     $brands = Category::withTrashed()->find($id);
    //     $this->ids = $brands->id;
    //     $this->file = $brands->images;
    //     $this->slug = $brands->slug;
    //     $this->name = $brands->name;
    // }
    // public function update(){
    //     if(isset($this->ids)){
    //         $this->validate([
    //             'name' => 'required',
    //             'file' => 'required',
    //             'slug' => 'required',
    //             'file_banner' => 'required',
    //             'brand' => 'required',
    //         ]);
    //         $path = $this->file->storeAs('brands',$this->file->getClientOriginalName(),'public');
    //         $brands = Category::withTrashed()->find($this->ids);
    //         $brands->update([
    //             'name' => $this->name,
    //             'image' => $path,
    //             'slug' => $this->slug,
    //         ]);
    //         $brands->cate_manus()->sync($this->brand);
    //         CategorySlider::where('category_id',$brands->id)->delete();
    //         foreach ($this->file_banner as $item) {
    //             $path_banner = $item->storeAs('category_sliders',$item->getClientOriginalName(),'public');
    //             $category_sliders = Category::withTrashed()->find($brands->id);
    //             $category_sliders->category_sliders()->create([
    //                 'name' => $path_banner,
    //                 'description' => 'ok',
    //                 'images' => $path_banner,
    //                 'category_id' => $brands->id
    //             ]);
    //         }
    //     }
    //     $this->resetInput();
    //     $this->emit('Edit_success');
    // }
    // public function delete($id){
    //     $brands = Category::withTrashed()->find($id);
    //     $brands->forceDelete();
    //     $brands->cate_manus()->detach();
    // }
    // public function deleteAll(){
    //     $brands = Category::withTrashed()->whereIn('id',$this->SelectDelete);
    //     $brands->forceDelete();
    //     $brands->cate_manus()->detach();
    //     $this->SelectDelete = [];
    // }
    public function render()
    {
        // if($this->sort=='default'){
        //     $brands = Category::with('category_sliders','cate_manus')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')
        // ->Orwhere('status','like','%'.$this->search.'%')->Orwhere('created_at','like','%'.$this->search.'%')
        // ->Orwhere('updated_at','like','%'.$this->search.'%')->paginate(5);
        // }elseif($this->sort=='name'){
        //     $brands = Category::with('category_sliders','cate_manus')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')
        // ->Orwhere('status','like','%'.$this->search.'%')->Orwhere('created_at','like','%'.$this->search.'%')
        // ->Orwhere('updated_at','like','%'.$this->search.'%')->orderBy('name')->paginate(5);
        // }elseif($this->sort=='slug'){
        //     $brands = Category::with('category_sliders','cate_manus')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')
        // ->Orwhere('status','like','%'.$this->search.'%')->orderBy('slug')->Orwhere('created_at','like','%'.$this->search.'%')
        // ->Orwhere('updated_at','like','%'.$this->search.'%')->paginate(5);
        // }elseif($this->sort=='created_at'){
        //     $brands = Category::with('category_sliders','cate_manus')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')
        // ->Orwhere('status','like','%'.$this->search.'%')->orderBy('created_at')->Orwhere('created_at','like','%'.$this->search.'%')
        // ->Orwhere('updated_at','like','%'.$this->search.'%')->paginate(5);
        // }elseif($this->sort=='updated_at'){
        //     $brands = Category::with('category_sliders','cate_manus')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')
        // ->Orwhere('status','like','%'.$this->search.'%')->orderBy('updated_at')->Orwhere('created_at','like','%'.$this->search.'%')
        // ->Orwhere('updated_at','like','%'.$this->search.'%')->paginate(5);
        // }elseif($this->sort=='status'){
        //     $brands = Category::with('category_sliders','cate_manus')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')
        // ->Orwhere('status','like','%'.$this->search.'%')->orderBy('status')->Orwhere('created_at','like','%'.$this->search.'%')
        // ->Orwhere('updated_at','like','%'.$this->search.'%')->paginate(5);
        // }
        $brands = Manufacturer::with('brand_sliders')->withTrashed()->paginate(10);
        return view('livewire.admin.admin-brand-component',compact('brands'))->layout('layouts.admin')->slot('main');
    }
}
