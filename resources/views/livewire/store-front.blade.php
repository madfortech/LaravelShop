<div class="grid  grid-cols-6 gap-4 mt-12 ">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @foreach ($this->products as $product)
        
            <x-panel>
                <a href="{{route('product',$product)}}" class="absolute inset-0 w-full h-full">
                    
                </a>
                {{-- <img src="{{$product->image->path}}" alt=""> --}}
                <h2 class="text-lg font-medium"> {{$product->name}}</h2>
                <span class="text-gray-700  text-sm">{{$product->price}}</span>
            </x-panel>
       
    @endforeach
</div>
