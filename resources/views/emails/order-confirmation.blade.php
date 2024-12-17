 @component('mail::message')
    
    Hey
    {{$order->user->name}}
    
    Thank you
    <x-panel class="col-span-3">
        <table>
            <thead>
                <tr>
                    <th>
                        Item
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Quantity
                    </th>
                    <th>
                        Total
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td>
                            {{$item->name}}
                        </td>
                        <td>
                            {{$item->description}}
                        </td>
                        <td>
                            {{$item->price}}
                        </td>
                        <td>
                            {{$item->quantity}}
                        </td>
                        <td>
                            {{$item->amount_tax}}
                        </td>
                        <td>
                            {{$item->amount_total}}
                        </td>
                    </tr>
                @endforeach

            
            </tbody>
            <tfoot>
                @if($this->$order->amount_shiping->0)
                    <tr>
                    <td> Shipping </td>
                    </tr>
                    <td>
                        {{$this->$order->amount_shipping}}
                    </td>
                @endif

                @if($this->$order->amount_discount->0)
                    <tr>
                        <td> amount discount</td>
                    
                        <td>
                            {{$this->$order->amount_discount}}
                        </td>
                    </tr>
                @endif

                @if($this->$order->amount_tax->0)
                    <tr>
                        <td> amount tax</td>
                    
                        <td>
                            {{$order->amount_tax}}
                        </td>
                    </tr>
                @endif

                @if($this->$order->amount_subtotal->isPositive())
                    <tr>
                        <td>sub  total</td>
                    
                        <td>
                            {{$order->amount_subtotal}}
                        </td>
                    </tr>
                @endif

                @if($this->$order->amount_total->isPositive())
                    <tr>
                        <td>total</td>
                    
                        <td>
                            {{$this->$order->amount_total}}
                        </td>
                    </tr>
                @endif
            </tfoot>
        </table>
    <x-panel>

    <x-panel class="col-span-3" title="Billing information">
        @foreach ($this->order->billing_address->filter() as $value)
            {{ $value}} <br>
        @endforeach
    </x-panel>

    <x-panel class="col-span-3" title="Shipping information">
        @foreach ($this->order->shipping_address->filter() as $value)
            {{ $value}} <br>
        @endforeach
    </x-panel>
@endcomponent

@component('mail::button',['url'=> route('view-order'$order->id)])
    view order
@endcomponent