<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table ='product_image';
    protected $fillable = ['id','images','deleted_at','created_at','updated_at','product_id'];
}
