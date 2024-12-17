<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Cart;

class AbandonedCart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:abandoned-cart';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' look for abandoned carts and notify their owner';

    /**
     * Execute the console command.
     */
    public function handle()
    {
       $carts = Cart::WithWhereHas('user')->whereDate('updated_at',today()->subDay())->count();
       foreach($carts as $cart) {
        Mail::to($cart->user)->send(new AbandonedCartReminder($cart));
       }
    }
}
