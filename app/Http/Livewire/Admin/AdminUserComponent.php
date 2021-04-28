<?php

namespace App\Http\Livewire\Admin;

use App\Imports\UserImport;
use Livewire\Component;
use App\Models\User;
use ErrorException;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use PDF;
use Excel;
use Exception;
use Illuminate\Support\Facades\App;

class AdminUserComponent extends Component
{
    use WithPagination;
    public $ids;
    public $id_dt;
    public $name;
    public $email;
    public $password;
    public $phone_number;
    public $birth_day;
    public $search;
    public $sort;
    protected $paginationTheme = 'bootstrap';
    public function mount(){
        $this->sort = 'default';
    }
    public function resetInput(){
        $this->name = '';
        $this->email = '';
        $this->phone_number = '';
        $this->password = '';
        $this->birth_day = '';
    }
    public function resetForm(){
        $this->name = '';
        $this->email = '';
        $this->phone_number = '';
        $this->password = '';
        $this->birth_day = '';
    }
    public function updated($request){
        $this->validateOnly($request,
            [
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required',
                'phone_number' => 'required',
                'birth_day' => 'required'
            ]
            );
    }
    public function store(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'phone_number' => 'required',
            'birth_day' => 'required'
        ]);
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'phone_number' => $this->phone_number,
            'birth_day' => $this->birth_day,
            'utype' => 'ADM',
            'updated_at' => Null
        ]);
        $this->resetInput();
        $this->emit('Add_success');
    }
    public function edit($id){
        $users = User::find($id);
        $this->ids = $users->id;
        $this->name = $users->name;
        $this->email = $users->email;
        $this->phone_number = $users->phone_number;
        $this->birth_day = $users->birth_day;
    }
    public function update(){
        if(isset($this->ids)){
            $this->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'phone_number' => 'required',
                'birth_day' => 'required'
            ]);
            $users = User::find($this->ids);
            $users->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'phone_number' => $this->phone_number,
                'birth_day' => $this->birth_day,
            ]);
        }
        $this->emit('Edit_success');
    }
    public function delete($id){
        $users = User::find($id);
        $users->delete();

    }
    public function detail($id){
        $users = User::find($id);
        $this->id_dt = $users->id;
    }
    public function PDF($id){
    try {
        $users = User::with('user_province','user_district','user_commune')->find($id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML("<table style='border:1px solid black'>
                        <tr>
                            <th style='padding:15px'>id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>province</th>
                            <th>district</th>
                            <th>commune</th>
                        </tr>
                        <tr>
                            <td style='padding:15px'>{$users->id}</td>
                            <td style='padding:15px'>{$users->name}</td>
                            <td style='padding:15px'>{$users->email}</td>
                            <td style='padding:15px'>{$users->user_province->name}</td>
                            <td style='padding:15px'>{$users->user_district->name}</td>
                            <td style='padding:15px'>{$users->user_commune->name}</td>
                        </tr>
                        </table>")->setPaper('a4', 'landscape');
        return $pdf->stream();
        }
        //catch exception
          catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }
    public function EXCEL(Request $request){
        Excel::import(new UserImport,$request->import_excel);
        return redirect()->back();
    }
    public function render()
    {
        if(isset($this->id_dt)){
            $user_details = User::with('user_province','user_district','user_commune')->find($this->id_dt);
        }else{
            $user_details=[];
        }
        if($this->sort=='default'){
            $users = User::where('name','like','%'.$this->search.'%')->Orwhere('email','like','%'.$this->search.'%')
        ->Orwhere('utype','like','%'.$this->search.'%')->Orwhere('created_at','like','%'.$this->search.'%')
        ->Orwhere('phone_number','like','%'.$this->search.'%')->orderBy('created_at','DESC')->paginate(10);
        }elseif($this->sort=='name'){
            $users = User::where('name','like','%'.$this->search.'%')->Orwhere('email','like','%'.$this->search.'%')
        ->Orwhere('utype','like','%'.$this->search.'%')->Orwhere('created_at','like','%'.$this->search.'%')
        ->Orwhere('phone_number','like','%'.$this->search.'%')->orderBy('name',)->paginate(10);
        }elseif($this->sort=='email'){
            $users = User::where('name','like','%'.$this->search.'%')->Orwhere('email','like','%'.$this->search.'%')
        ->Orwhere('utype','like','%'.$this->search.'%')->Orwhere('created_at','like','%'.$this->search.'%')
        ->Orwhere('phone_number','like','%'.$this->search.'%')->orderBy('email',)->paginate(10);
        }elseif($this->sort=='phone_number'){
            $users = User::where('name','like','%'.$this->search.'%')->Orwhere('email','like','%'.$this->search.'%')
        ->Orwhere('utype','like','%'.$this->search.'%')->Orwhere('created_at','like','%'.$this->search.'%')
        ->Orwhere('phone_number','like','%'.$this->search.'%')->orderBy('phone_number',)->paginate(10);
        }elseif($this->sort=='created_at'){
            $users = User::where('name','like','%'.$this->search.'%')->Orwhere('email','like','%'.$this->search.'%')
        ->Orwhere('utype','like','%'.$this->search.'%')->Orwhere('created_at','like','%'.$this->search.'%')
        ->Orwhere('phone_number','like','%'.$this->search.'%')->orderBy('created_at')->paginate(10);
        }elseif($this->sort=='updated_at'){
            $users = User::where('name','like','%'.$this->search.'%')->Orwhere('email','like','%'.$this->search.'%')
        ->Orwhere('utype','like','%'.$this->search.'%')->Orwhere('created_at','like','%'.$this->search.'%')
        ->Orwhere('phone_number','like','%'.$this->search.'%')->orderBy('updated_at','DESC')->paginate(10);
        }elseif($this->sort=='type'){
            $users = User::where('name','like','%'.$this->search.'%')->Orwhere('email','like','%'.$this->search.'%')
        ->Orwhere('utype','like','%'.$this->search.'%')->Orwhere('created_at','like','%'.$this->search.'%')
        ->Orwhere('phone_number','like','%'.$this->search.'%')->orderBy('utype')->paginate(10);
        };
        return view('livewire.admin.admin-user-component',compact('users','user_details'))->layout('layouts.admin')->slot('main');
    }
}

