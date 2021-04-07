<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
        'current_team_id',
        'profile_photo_path',
        'utype',
        'created_at',
        'updated_at',
        'stress',
        'phone_number',
        'province_id',
        'district_id',
        'commune_id',
        'birth_day'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the user that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'matp');
    }
    public function user_district()
    {
        return $this->belongsTo(District::class, 'district_id', 'maqh');
    }
    public function user_commune()
    {
        return $this->belongsTo(Commune::class, 'commune_id', 'xaid');
    }
    /**
     * The roles that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user_discounts()
    {
        return $this->belongsToMany(Discount::class, 'user_discount', 'user_id', 'discount_id')->withPivot('status')->withTimestamps();
    }
}
