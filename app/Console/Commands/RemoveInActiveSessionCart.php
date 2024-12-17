<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Cart;

class RemoveInActiveSessionCart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remove-in-active-session-cart';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' remove in active session in based cart';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $carts = Cart::whereDoesntHave('user')->whereDate('created_at','<',now())->subDay(1)->count();
        foreach($carts as $cart) {
            $cart->items()->delete();
            $cart->delete();
        }
    }
}
