<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;
    protected $table = 'manufacturer';
   /**
    * Get all of the comments for the Manufacturer
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function brand_products()
   {
       return $this->hasMany(Product::class, 'manufacturer_id', 'id');
   }
   /**
     * Get all of the comments for the BrandSlider
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function brand_sliders()
    {
        return $this->hasMany(BrandSlider::class, 'manufacturer_id', 'id');
    }
}
