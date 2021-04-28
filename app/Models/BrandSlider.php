<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandSlider extends Model
{
    protected $table = 'brand_sliders';
    protected $fillable = ['id','name','description','images','created_at','updated_at','deleted_at','manufacturer_id'];
}
