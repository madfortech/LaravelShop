<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Money\Currency;
use Models\CartItem;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_id',
    ];

    protected function total():Attribute
    {
        get: function(){
            return $this->items->reduce(function(Money $total,CartItem $item){
                return $total->add($item->subtotal);

            }, new Money(0,new Currency('USD')));
        };
        
       
    }

    public function items():HasMany
    {
        return $this->hasMany(CartItem::class);
    }

   /**
    * Get the user that owns the Cart
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function user(): BelongsTo
   {
       return $this->belongsTo(User::class );
   }

  
}
