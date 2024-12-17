<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\MoneyCast;

class OrderItem extends Model
{
    use HasFactory;

    public $casts = [
        'price' => MoneyCast::class, 
        'amount_discount' => MoneyCast::class, 
        'amount_tax' => MoneyCast::class, 
        'amount_total' => MoneyCast::class, 
    ];

    protected $fillable = [
        'order_id',
        'product_variant_id',
        'name',
        'description',
        'price',
        'quantity',
        'amount_discount',
        'amount_subtotal',
        'amount_tax',
        'amount_total',
    ];

  
}
