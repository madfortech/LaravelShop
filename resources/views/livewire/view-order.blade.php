<div class="grid grid-cols-2 gap-4">
    <x-panel class="mt-12 col-span-2" title="your order#{{$this->order->id}}">
        {{-- The Master doesn't talk, he acts. --}}
        <h2>Your order</h2>
        { {$this->order->id}}
        
    </x-panel>

    <x-panel class="col-span-2">
        { {$this->order->id}}
    </x-panel>

    <x-panel class="col-span-2">
        { {$this->order->id}}
    </x-panel>
</div>
