<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyReview extends Model
{
    use HasFactory;
    protected $table = 'reply_reviews';
    protected $fillable = ['id','like','comment','review_id','created_at','updated_at','user'];
}
