<?php

namespace App\Livewire;

use Livewire\Component;
use App\Factories\CartFactory;
use App\WebShop\CreateStripeCheckoutSession;
class Cart extends Component
{

    
    public function checkout(CreateStripeCheckoutSession $CheckoutSession)
    {
        return $CheckoutSession->createFormCart($this->cart);
    }

    public function getCartProperty()
    {
       return CartFactory::make()->loadMissing(['items','items-product','items-variant']);
    }



    public function getItemsProperty()
    {
       return CartFactory::make()->items()->get();
    }

    public function increment($itemId)
    {
       return CartFactory::make()->items()->find($itemId)?->increment('quantity');
    }

    public function decrement($itemId)
    {
       $item =  CartFactory::make()->items()->find($itemId);
       if($item->quantity > 1)
       {
        $item ->decrement('quantity');
       }
    }

    public function delete($itemId)
    {
        return CartFactory::make()->items()->where('id',$itemId)->delete();
        $this->dispatch('productRemovedFromCart');
    }

    

    public function render()
    {
        return view('livewire.cart');
    }
}
