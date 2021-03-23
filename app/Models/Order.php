<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['id','user_id','status','created_at','updated_at','total','pay_method'];
    /**
 * Get all of the comments for the Order
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
    public function order_items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
    /**
     * The products that belong to the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_item', 'order_id', 'product_id');
    }
}


