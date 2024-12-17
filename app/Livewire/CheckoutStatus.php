<?php

namespace App\Livewire;

use Livewire\Component;

class CheckoutStatus extends Component
{

    public $session_id;

    public function mount()
    {
        $this->session_id = request()->get('session_id');
    }

    public function getOrderProperty()
    {
        return auth()->user()->orders()->where('stripe_checkout_session_id', $this->session_id)->first();
    }

    public function render()
    {
        return view('livewire.checkout-status');
    }
}
