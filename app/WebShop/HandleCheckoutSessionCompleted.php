<?php 

namespace App\WebShop;
use Laravel\Cashier\Cashier;
use App\Models\User;
use App\Models\Cart;
use  illuminate\Support\Facades\DB;
use Stripe\lineItem;
use Mail\OrderConfirmation;

class HandleCheckoutSessionCompleted
{
    public function handle($session_id)
    {

        DB::transaction(function () use ($session_id) {

            $session = Cashier::stripe()->checkout->sessions->retrieve($session_id);
           
            $user = User::find($session->metadata->user_id);
            $cart = Cart::find($session->metadata->cart_id);

            $order =  $user->order()->create([
                'stripe_checkout_session_id' => $session->id,
                'amount_shipping' => $session->$total_details->amount_shipping,
                'amount_tax' => $session->$total_details->amount_tax,
                'amount_subtotal' => $session->amount_subtotal,
                'amount_total' => $session->amount_total,
                'billing_address'  => [
    
                    'name' => $session->customer_details->name,  
                    'city' => $session->customer_details->address->city,  
                    'country' => $session->customer_details->address->country,  
                    'line1' => $session->customer_details->address->line1,  
                    'line2' => $session->customer_details->address->line2,  
                    'postal_code' => $session->customer_details->address->postal_code,  
                    'state' => $session->customer_details->address->state,  
                ],
                'shipping_address' =>  [
                    'name' => $session->shipping_details->name,  
                    'city' => $session->shipping_details->address->city,  
                    'country' => $session->shipping_details->address->country,  
                    'line1' => $session->shipping_details->address->line1,  
                    'line2' => $session->shipping_details->address->line2,  
                    'postal_code' => $session->shipping_details->address->postal_code,  
                    'state' => $session->shipping_details->address->state,  
                ],
                
            ]);
    
            $line_items = Cashier::stripe()->checkout->sessions->allLineIems($session->id);
            $order_items = collect($line_items->all())->map(function (Lineitem $line) {
                $product = Cashier::stripe()->products->retrieve($line->price->product);
                return  new OrderItem([
                    'product_variant_id' => $product->metadata->product_variant_id,
                    'name' => $product->name,
                    'description' => $product->description,
                    'price' => $line->price->unit_amount,
                    'quantity' => $line->quantity,
                    'amount_discount' => $line->amount_discount,
                    'amount_tax' => $line->amount_tax,
                    'amount_total' =>  $line->amount_total,
                ]);
            });
    
            $order->items()->saveMany($order_items);
            $cart->items()->delete();
            $cart->delete();

            Mail::to($user)->send(new OrderConfirmation($order));
        });

      
     
    }
}