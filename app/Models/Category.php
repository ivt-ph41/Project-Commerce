<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'categories';
    protected $fillable = ['name','image','slug','created_at','updated_at','deleted_at','status'];
    /**
     * The roles that belong to the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cate_manus()
    {
        return $this->belongsToMany(Manufacturer::class, 'cate_manu', 'category_id', 'manufacturer_id');
    }
    /**
     * Get all of the comments for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cate_products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
    /**
     * Get all of the comments for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function category_sliders()
    {
        return $this->hasMany(CategorySlider::class, 'category_id', 'id');
    }
}
