<?php

namespace App\WebShop;
use App\Models\Cart; 
use App\Models\CartItem; 
use Illuminate\Support\Collection;

class CreateStripeCheckoutSession
{
    public function createFormCart(Cart $cart)
    {
        return $cart->user
            ->allowPromotionCode(true)
            ->checkout( 
            $this -> formatCartItems ($cart->items) ,
            [
                'customer_update' =>[
                    'shipping' => 'auto',
                ],
                'shipping_address_collection' =>[
                    'allowed_countries' => ['US', 'CA'],
                ],
                'success_url' => route('checkout-status').'?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('cart'),
                [
                    'metadata'  => [
                        'user_id' =>  $cart->user->id,
                        'cart_id' => $cart->id,
                    ],
                ]

            ],
           
        );


    }

    public function formatCartItems(Collection $items)
    {
       return $items ->loadMissing('product','variant')-> map(function(CartItem $item){
            [
                'price_data' => [
                'currency' => 'USD',
                'unit_amount' =>  $item -> product->price->getAmount(),
                'product_data' => [
                    'name' =>   $item -> product->name ,
                    'description' => "Color: {{$item -> variant->size }} - Size: {{$item -> variant->size}}" ,
                    'metadata' => [
                        'product_id' => $item -> product->id,
                        'product_variant_id' =>  $item -> product_variant_id, 
                    ]
                ]
                ],
                'quantity' =>  $item ->  quantity,
            ];
       })->toArray();
    }

}