<?php

namespace App\Http\Livewire\User;

use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserChatComponent extends Component
{
    use WithFileUploads;
    public $message;
    public $select_user;
    public $image;
    public function mount(){
        $this->message = '';
    }
    public function resetInput(){
        $this->message = '';
        $this->image = '';
    }
    public function Send_Mess(){
        if($this->image){
            $filename = $this->image->storeAs('chats', $this->image->getClientOriginalName(),'public');
        }else{
            $filename = NULL;
        }
        if( $this->message == NULL && $filename == NULL ){
            return false;
        }
        if( $this->message != NULL && $filename != NULL){
                $messages = ChatRoom::create([
                    'message' => $this->message,
                    'user_id' => Auth::user()->id,
                    'receiver' => $this->select_user,
                    'is_seen' => 'USR',
                    'image' => $filename
                ]);
            }else{
                if($this->message != NULL && $filename == NULL){
                    $messages = ChatRoom::create([
                        'message' => $this->message,
                        'user_id' => Auth::user()->id,
                        'receiver' => $this->select_user,
                        'is_seen' => 'USR',
                        'image' => $filename
                    ]);
                }
                if($this->message == NULL && $filename != NULL){
                    $messages = ChatRoom::create([
                        'message' => $this->message,
                        'user_id' => Auth::user()->id,
                        'receiver' => $this->select_user,
                        'is_seen' => 'USR',
                        'image' => $filename
                    ]);
                }
        }
        $this->resetInput();
    }
    public function render()
    {
        if (Auth::user()->utype == 'USR') {
            $messages = ChatRoom::where('user_id', auth()->id())->Where('receiver', $this->select_user)->orwhere('user_id', $this->select_user)->Where('receiver', auth()->id())->orderBy('id', 'ASC')->get();
        }
        $admins = User::where('utype','ADM')->get();
        return view('livewire.user.user-chat-component',compact('messages','admins'))->layout('layouts.base');
    }
}
