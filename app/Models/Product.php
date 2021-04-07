<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['id','name','slug','short_description','description','regular_price','SKU','stock_status','featured','quantity','image','category_id','deleted_at','created_at','updated_at','view','manufacturer_id',
    'color','sale_percent','origin','weight','Dimension','ram','battery_capacity','network_connect','operating_system','origin_price'];
    /**
     * Get all of the comments for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product_images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
    /**
     * Get the user that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product_brands()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id', 'id');
    }
    public function product_categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
