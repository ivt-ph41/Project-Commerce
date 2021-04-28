<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListWish extends Model
{
    use HasFactory;
    protected $table = 'wishlist';
    protected $fillable = ['id','user_id','product_id','created_at','updated_at'];
    /**
     * Get the user that owns the ListWish
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wishlist_users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    /**
     * Get the user that owns the ListWish
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wishlist_products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
