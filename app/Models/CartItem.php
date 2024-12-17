<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Casts\Attribute;

class CartItem extends Model
{
    use HasFactory;

    protected $touches = [
        'cart'
    ];

    public function cart():BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    protected $fillable = [
        'cart_id',
        'product_variant_id',
        'quantity'
    ];

    public function price():Attribute
    {
        return Attribute::make(
            get: function(int $value){
                return $this->product->price->multiply($this->quantity);
 
            }
        );
    }
     
    public function product(): HasOneThrough
    {
        return $this->hasOneThrough(
            Product::class,
            ProductVariant::class,
            'id',
            'id',
            'product_variant_id',
            'product_id'
        );
    }


    public function variant():BelongsTo
    {
        return $this->belongsTo(ProductVariant::class,'product_variant_id');
         
    }
}
