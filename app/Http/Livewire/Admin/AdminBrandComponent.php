<?php

namespace App\Http\Livewire\Admin;

use App\Models\BrandSlider;
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
    public function resetInput(){
        $this->name = '';
        $this->address = '';
        $this->slug = '';
        $this->file_banner = '';
    }
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
    public function store(){
        $this->validate([
            'name' => 'required|unique:manufacturer',
            'slug' => 'required|unique:manufacturer',
            'file_banner' => 'required',
            'address' => 'required'
        ]);
        $brands = Manufacturer::withTrashed()->create([
            'name' => $this->name,
            'address' => $this->address,
            'slug' => $this->slug,
            'updated_at' => Null
        ]);
        foreach ($this->file_banner as $item) {
            $path_banner = $item->storeAs('brand_sliders',$item->getClientOriginalName(),'public');
            $category_sliders = Manufacturer::withTrashed()->find($brands->id);
            $category_sliders->brand_sliders()->create([
                'name' => $path_banner,
                'description' => 'ok',
                'images' => $path_banner,
                'manufacturer_id' => $brands->id
            ]);
        }
        $this->resetInput();
        $this->emit('Add_success');
    }
    public function edit($id){
        $brands = Manufacturer::withTrashed()->find($id);
        $this->ids = $brands->id;
        $this->address = $brands->address;
        $this->slug = $brands->slug;
        $this->name = $brands->name;
    }
    public function update(){
        if(isset($this->ids)){
            $this->validate([
                'name' => 'required',
                'slug' => 'required',
                'file_banner' => 'required',
                'address' => 'required'
            ]);
            $brands = Manufacturer::withTrashed()->find($this->ids);
            $brands->update([
                'name' => $this->name,
                'address' => $this->address,
                'slug' => $this->slug,
            ]);
            BrandSlider::where('manufacturer_id',$this->ids)->delete();
            foreach ($this->file_banner as $item) {
                $path_banner = $item->storeAs('brand_sliders',$item->getClientOriginalName(),'public');
                $category_sliders = Manufacturer::withTrashed()->find($brands->id);
                $category_sliders->brand_sliders()->create([
                    'name' => $path_banner,
                    'description' => 'ok',
                    'images' => $path_banner,
                    'manufacturer_id' => $brands->id
                ]);
            }
        }
        $this->resetInput();
        $this->emit('Edit_success');
    }
    public function delete($id){
        $brands = Manufacturer::withTrashed()->find($id);
        if(!count($brands->brand_products)){
            $brands->forceDelete();
            $brand_slider = BrandSlider::where('manufacturer_id',$id)->delete();
        }else{
            $this->emit('not_delete');
        }

    }
    public function deleteAll(){
        $brands = Manufacturer::withTrashed()->whereIn('id',$this->SelectDelete);
        $brands->forceDelete();
        $brand_slider = BrandSlider::whereIn('manufacturer_id',$this->SelectDelete)->delete();
        $this->SelectDelete = [];
    }
    public function render()
    {
        if($this->sort=='default'){
            $brands = Manufacturer::with('brand_sliders')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('address','like','%'.$this->search.'%')
        ->Orwhere('status','like','%'.$this->search.'%')->Orwhere('created_at','like','%'.$this->search.'%')
        ->Orwhere('updated_at','like','%'.$this->search.'%')->orderBy('created_at','DESC')->paginate(10);
        }elseif($this->sort=='name'){
            $brands = Manufacturer::with('brand_sliders')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('address','like','%'.$this->search.'%')
        ->Orwhere('status','like','%'.$this->search.'%')->Orwhere('created_at','like','%'.$this->search.'%')
        ->Orwhere('updated_at','like','%'.$this->search.'%')->orderBy('name')->paginate(10);
         }elseif($this->sort=='address'){
            $brands = Manufacturer::with('brand_sliders')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('address','like','%'.$this->search.'%')
        ->Orwhere('status','like','%'.$this->search.'%')->Orwhere('created_at','like','%'.$this->search.'%')
        ->Orwhere('updated_at','like','%'.$this->search.'%')->orderBy('address')->paginate(10);
        }elseif($this->sort=='created_at'){
            $brands = Manufacturer::with('brand_sliders')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('address','like','%'.$this->search.'%')
        ->Orwhere('status','like','%'.$this->search.'%')->Orwhere('created_at','like','%'.$this->search.'%')
        ->Orwhere('updated_at','like','%'.$this->search.'%')->orderBy('created_at')->paginate(10);
        }elseif($this->sort=='updated_at'){
            $brands = Manufacturer::with('brand_sliders')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('address','like','%'.$this->search.'%')
        ->Orwhere('status','like','%'.$this->search.'%')->Orwhere('created_at','like','%'.$this->search.'%')
        ->Orwhere('updated_at','like','%'.$this->search.'%')->orderBy('updated_at')->paginate(10);
        }elseif($this->sort=='status'){
            $brands = Manufacturer::with('brand_sliders')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('address','like','%'.$this->search.'%')
        ->Orwhere('status','like','%'.$this->search.'%')->Orwhere('created_at','like','%'.$this->search.'%')
        ->Orwhere('updated_at','like','%'.$this->search.'%')->orderBy('created_at','ASC')->paginate(10);
        }
        return view('livewire.admin.admin-brand-component',compact('brands'))->layout('layouts.admin')->slot('main');
    }
}
