<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $table = 'discounts';
    protected $fillable = ['id','code','type','quantity','reduced_price','end_day','start_day','created_at','updated_at'];

    /**
     * The roles that belong to the Discount
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function discount_users()
    {
        return $this->belongsToMany(User::class, 'user_discount', 'discount_id', 'user_id')->withPivot('status')->withTimestamps();
    }
}
