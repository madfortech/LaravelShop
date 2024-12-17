 
{{-- The Master doesn't talk, he acts. --}}
<x-nav-link href="{{ route('cart') }}" :active="request()->routeIs('cart')">
 
    {{__('Your cart')}} ({{$this->count}})
</x-nav-link>