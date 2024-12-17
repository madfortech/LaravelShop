<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Laravel\Cashier\Events\WebhookReceived;
use App\WebShop\HandleCheckoutSessionCompleted;

class StripeEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(WebhookReceived $event): void
    {
        if($event->payload['type'] === 'checkout.session.completed'){
            (new HandleCheckoutSessionCompleted)->handle($event->payload['data']['object']['id']);
        }
    }
}
