<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = ['id','user_id','product_id','comment','rating','created_at','updated_at',];
    /**
     * Get the user that owns the Review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function review_users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    /**
     * Get the user that owns the Review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function review_product()
    {
        return $this->belongsTo(User::class, 'product_id', 'id');
    }

    /**
     * Get all of the comments for the Review
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reply_reviews()
    {
        return $this->hasMany(ReplyReview::class, 'review_id', 'id');
    }
}
