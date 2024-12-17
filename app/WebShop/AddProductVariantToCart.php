<?php

namespace App\WebShop;
use App\Models\Cart;
use App\Factories\CartFactory;

class AddProductVariantToCart
{
    public function add($variantId, $quantity = 1, $cart = null)
    {
        // CartFactory::make();

        //     if(auth()->guest())
        //     {
        //         $cart =  Cart::firstOrCreate([
        //                 'session_id' =>session()->getId(),

        //         ]);
        //     }

        //     if(auth()->user())
        //     {
        //         $cart =  auth()->user()->cart ?: auth()->user()->cart()->create();
        //     }
        
        $cart ?: CartFactory::make()->items()->firstOrCreate([
            'product_variant_id' => $variantId,
           
        ],
        [
            'quantity' => 0,
        ])->increment('quantity',$quantity);   
            
    }
}