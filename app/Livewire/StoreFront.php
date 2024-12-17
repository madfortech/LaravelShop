<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
 
class StoreFront extends Component
{

    public function getProductsProperty()
    {
       //return  Product::query()->get();
       return Product::with(['variants', 'images', 'image'])->get();
    }

    public function render()
    {
        return view('livewire.store-front');
    }
}
