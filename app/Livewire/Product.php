<?php

namespace App\Livewire;

use Livewire\Component;
use App\WebShop\AddProductVariantToCart;
use Laravel\Jetstream\InteractsWithBanner;


class Product extends Component
{
    use InteractsWithBanner;
    public $productId;

    public $variant;

    public $rules=[
        'variant' => 'required|exists:product_variants,id'
    ]; 

    public function addToCart(AddProductVariantToCart $cart)
    {
        $this->validate();

        $cart->add(
            variantId: $this->variant
        );
        $this->banner('Your product add been added to your cart');
        $this->dispatch('productAddedToCart');
    }

    public function mount()
    {
        $this->variant = $this->product->variants()->value('id');
    }

    public function getProductProperty()
    {
         //return Product::find($this->productId);
         return \App\Models\Product::findorfail($this->productId);
    }

    public function render()
    {
        return view('livewire.product');
    }
}
