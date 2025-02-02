<x-panel title="My orders" class="max-w-lg mx-auto mt-12">
    {{-- Success is as dangerous as failure. --}}
    <table class="max-w-full table-auto">
        <thead class="col-span-2 ">
            <tr>
                    <th class="text-left">Order</th>
                   
                    <th class="text-left">Ordered at</th>
                    <th class="text-left">Total</th>
                 
            </tr>
        </thead>
        <tbody>
            @foreach ($this->orders  as $order)
                <tr>
                    <td>
                     <a href="{{route('view-order',$order->id)}}">{{$order->id}}  </a>
                       
                    </td>

                    <td>{{$order->created_at->diffForHumans()}}</td>

                    <td>{{$order->amount_total}}</td>

                    {{-- <td>
                        {{$item->variant->color}}
                    </td>

                    <td>
                        {{$item->variant->size}}
                    </td> --}}
                 
                    {{-- <td class="flex items-center">
                        <button wire:click="decrement({{$item->id}})" @disabled($item->quantity == 1)>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                            </svg>
                        </button>
                            {{$item->quantity}}
                        <button wire:click="increment({{$item->id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>   
                        </button>

                    </td>
                    <td>
                    
                        <button wire:click="delete({{$item->id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>  
                        </button>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</x-panel>
