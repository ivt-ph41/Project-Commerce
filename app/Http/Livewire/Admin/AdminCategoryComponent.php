<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\CategorySlider;
use Livewire\Livewire;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
class AdminCategoryComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $ids;
    public $name;
    public $file;
    public $slug;
    public $file_banner = [];
    public $brand = [];
    public $SelectDelete = [];
    public $search;
    public $sort;
    protected $paginationTheme = 'bootstrap';
    public function mount(){
        $this->sort = 'default';
    }
    public function resetInput(){
        $this->name = '';
        $this->file = '';
        $this->slug = '';
        $this->file_banner = '';
        $this->brand = '';
    }
    public function status($id){
        $categories = Category::withTrashed()->find($id);
        if($categories->status == 'enable'){
            $categories->update([
                'status' => 'disable',
            ]);
            $categories->delete();
            $this->emit('disable');
        }
        else{
            $categories->update([
                'status' => 'enable',
            ]);
            $categories->restore();
            $this->emit('enable');
        }
    }
    public function updated($request){
        $this->validateOnly($request,
            [
            'name' => 'required',
            'file' => 'required',
            'slug' => 'required',
            'file_banner' => 'required',
            'brand' => 'required',
            ]
            );
    }
    public function store(){
        $this->validate([
            'name' => 'required',
            'file' => 'required',
            'slug' => 'required',
            'file_banner' => 'required',
            'brand' => 'required',
        ]);
        $path = $this->file->storeAs('categories',$this->file->getClientOriginalName(),'public');
        $categories = Category::create([
            'name' => $this->name,
            'image' => $path,
            'slug' => $this->slug,
            'updated_at' => Null
        ]);
        $categories->cate_manus()->attach($this->brand);
        foreach ($this->file_banner as $item) {
            $path_banner = $item->storeAs('category_sliders',$item->getClientOriginalName(),'public');
            $category_sliders = Category::find($categories->id);
            $category_sliders->category_sliders()->create([
                'name' => $path_banner,
                'description' => 'ok',
                'images' => $path_banner,
                'category_id' => $categories->id
            ]);
        }
        $this->resetInput();
        $this->emit('Add_success');
    }
    public function edit($id){
        $categories = Category::withTrashed()->find($id);
        $this->ids = $categories->id;
        $this->file = $categories->images;
        $this->slug = $categories->slug;
        $this->name = $categories->name;
    }
    public function update(){
        if(isset($this->ids)){
            $this->validate([
                'name' => 'required',
                'file' => 'required',
                'slug' => 'required',
                'file_banner' => 'required',
                'brand' => 'required',
            ]);
            $path = $this->file->storeAs('categories',$this->file->getClientOriginalName(),'public');
            $categories = Category::withTrashed()->find($this->ids);
            $categories->update([
                'name' => $this->name,
                'image' => $path,
                'slug' => $this->slug,
            ]);
            $categories->cate_manus()->sync($this->brand);
            CategorySlider::where('category_id',$categories->id)->delete();
            foreach ($this->file_banner as $item) {
                $path_banner = $item->storeAs('category_sliders',$item->getClientOriginalName(),'public');
                $category_sliders = Category::withTrashed()->find($categories->id);
                $category_sliders->category_sliders()->create([
                    'name' => $path_banner,
                    'description' => 'ok',
                    'images' => $path_banner,
                    'category_id' => $categories->id
                ]);
            }
        }
        $this->resetInput();
        $this->emit('Edit_success');
    }
    public function delete($id){
        $categories = Category::withTrashed()->find($id);
        $categories->forceDelete();
        $categories->cate_manus()->detach();
    }
    public function deleteAll(){
        $categories = Category::withTrashed()->whereIn('id',$this->SelectDelete);
        $categories->forceDelete();
        $categories->cate_manus()->detach();
        $this->SelectDelete = [];
    }
    public function render()
    {
        if($this->sort=='default'){
            $categories = Category::with('category_sliders','cate_manus')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')
        ->Orwhere('status','like','%'.$this->search.'%')->Orwhere('created_at','like','%'.$this->search.'%')
        ->Orwhere('updated_at','like','%'.$this->search.'%')->paginate(5);
        }elseif($this->sort=='name'){
            $categories = Category::with('category_sliders','cate_manus')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')
        ->Orwhere('status','like','%'.$this->search.'%')->Orwhere('created_at','like','%'.$this->search.'%')
        ->Orwhere('updated_at','like','%'.$this->search.'%')->orderBy('name')->paginate(5);
        }elseif($this->sort=='slug'){
            $categories = Category::with('category_sliders','cate_manus')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')
        ->Orwhere('status','like','%'.$this->search.'%')->orderBy('slug')->Orwhere('created_at','like','%'.$this->search.'%')
        ->Orwhere('updated_at','like','%'.$this->search.'%')->paginate(5);
        }elseif($this->sort=='created_at'){
            $categories = Category::with('category_sliders','cate_manus')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')
        ->Orwhere('status','like','%'.$this->search.'%')->orderBy('created_at')->Orwhere('created_at','like','%'.$this->search.'%')
        ->Orwhere('updated_at','like','%'.$this->search.'%')->paginate(5);
        }elseif($this->sort=='updated_at'){
            $categories = Category::with('category_sliders','cate_manus')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')
        ->Orwhere('status','like','%'.$this->search.'%')->orderBy('updated_at')->Orwhere('created_at','like','%'.$this->search.'%')
        ->Orwhere('updated_at','like','%'.$this->search.'%')->paginate(5);
        }elseif($this->sort=='status'){
            $categories = Category::with('category_sliders','cate_manus')->withTrashed()->where('name','like','%'.$this->search.'%')->Orwhere('slug','like','%'.$this->search.'%')
        ->Orwhere('status','like','%'.$this->search.'%')->orderBy('status')->Orwhere('created_at','like','%'.$this->search.'%')
        ->Orwhere('updated_at','like','%'.$this->search.'%')->paginate(5);
        }
        return view('livewire.admin.category-component',compact('categories'))->layout('layouts.admin')->slot('main');
    }
}

