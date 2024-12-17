<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    @if($this->order)
        thank you {{$this->order->id}}
        @else
    @endif

    <p wire:poll>
        Order is pending
    </p>
</div>
