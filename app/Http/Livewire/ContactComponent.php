<?php

namespace App\Http\Livewire;

use App\Mail\Mail_Contact;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $phone_number;
    public $comment;
    public function contact(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'comment' => 'required',
        ],
        [
           'name.required' => 'Please enter your name',
           'email.required' => 'Please enter your email',
           'email.email' => 'Email format is incorrect',
           'comment.required' => 'Please enter your comment',
        ]
        );
    $data = [
        'name' => $this->name,
        'email' => $this->email,
        'phone_number' => $this->phone_number,
        'comment' => $this->comment,
    ];
    Mail::to('nhatbui2017@gmail.com')->send(new Mail_Contact($data));
    $this->emit('mail');
    }
    public function updated($request){
        $this->validateOnly($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'comment' => 'required',
        ],
        [
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email',
            'email.email' => 'Email format is incorrect',
            'comment.required' => 'Please enter your comment',
         ]
    );
    }
    public function render()
    {
        return view('livewire.contact')->layout('layouts.base');
    }
}
