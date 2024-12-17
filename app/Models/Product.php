<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;  
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Casts\MoneyCast;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'main_image_id'
    ];

    protected $casts = [
        'price' => MoneyCast::class, 
        
    ];   

   

   

    public function variants():HasMany
    {
        return $this->hasMany(ProductVariant::class , 'product_id');
    }

    public function image():HasOne
    {
        return $this->hasOne(Image::class )->ofMany('featured','max');
    }

    public function images():HasMany
    {
        return $this->hasMany(Image::class , 'product_id');
    }
}
