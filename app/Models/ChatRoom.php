<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;
    protected $table = 'chat_room';
    protected $fillable = ['id','message','user_id','receiver','is_seen','created_at','updated_at','image'];
}
