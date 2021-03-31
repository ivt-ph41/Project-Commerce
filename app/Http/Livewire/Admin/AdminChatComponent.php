<?php

namespace App\Http\Livewire\Admin;

use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminChatComponent extends Component
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
                    'is_seen' => 'ADM',
                    'image' => $filename
                ]);
            }else{
                if($this->message != NULL && $filename == NULL){
                    $messages = ChatRoom::create([
                        'message' => $this->message,
                        'user_id' => Auth::user()->id,
                        'receiver' => $this->select_user,
                        'is_seen' => 'ADM',
                        'image' => $filename
                    ]);
                }
                if($this->message == NULL && $filename != NULL){
                    $messages = ChatRoom::create([
                        'message' => $this->message,
                        'user_id' => Auth::user()->id,
                        'receiver' => $this->select_user,
                        'is_seen' => 'ADM',
                        'image' => $filename
                    ]);
                }
        }
        $this->resetInput();
    }
    public function render()
    {
        if (Auth::user()->utype == 'ADM') {
            $messages = ChatRoom::where('user_id', auth()->id())->Where('receiver', $this->select_user)->orwhere('user_id', $this->select_user)->Where('receiver', auth()->id())->orderBy('id', 'ASC')->get();
            $messages_notifi = ChatRoom::where('receiver',auth()->id())->orwhere('receiver',$this->select_user)->orderBy('created_at','desc')->first();
        }
        $users = User::where('utype','USR')->get();
        return view('livewire.admin.admin-chat-component',compact('messages','users','messages_notifi'))->layout('layouts.admin')->slot('main');
    }
}
