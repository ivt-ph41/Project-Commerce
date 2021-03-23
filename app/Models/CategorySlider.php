<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySlider extends Model
{
    use HasFactory;
    protected $table = 'category_sliders';
    protected $fillable = ['name','images','description','created_at','updated_at','deleted_at','category_id'];
}
