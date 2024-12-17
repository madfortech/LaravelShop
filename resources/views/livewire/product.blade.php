<div class="grid grid-cols-2 gap-10 mt-12">
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="space-y-4 py-4">
        <div class="bg-white p-5 rounded-lg shadow">
            {{-- <img src="/{{$this->product->image->path}}" alt=""> --}}
        </div>
        <div class="grid grid-cols-4 gap-4">
           <div class="bg-white p-5 rounded shadow">
                {{-- @foreach ($this->product->images as $image)
                    <img src="{{$image->path}}" class="rounded " alt="">
                @endforeach 
                --}}
           </div>
        </div>
    </div>

    <div>
        <h2 class="text-3xl font-medium"> {{$this->product->name}}</h2>
        <span class="text-gray-700  text-sm">{{$this->product->price}}</span>
        <div class="mt-4">
            {{$this->product->description}}
        </div>

        {{--  --}}
        <div class="mt-4">
            <select wire:model="variant" name="" id=""  class="block w-full rounded-md  border-0  py-1.5 pl-3 pr-10 text-gray-800">
                @foreach ($this->product->variants as $variant)
                    <option value="{{$variant->id}}">
                        {{$variant->size}}/
                        {{$variant->color}}
                    </option>
                    
                @endforeach
            </select>

            @error('variant')
                <div class="mt-2 text-red-600">
                    {{$message}}
                </div>
            @enderror
          
            <div class="mt-4">
                <x-button wire:click="addToCart">Add to cart</x-button>
            </div>
         
         
        </div>
        
    </div>
</div>
