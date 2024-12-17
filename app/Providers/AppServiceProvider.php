<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Money\Money;
 
use Money\Currencies\ISOCurrencies;
use Money\Formatter\IntlMoneyFormatter;
use Money\Currency;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Cashier;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Cashier::calculateTaxes();
        
        Model::unguard();
        
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();
     
            if ($user &&
                Hash::check($request->password, $user->password)) {
                    (new MigrateSessionCart)->migrate(CartFactory::make(), $user?->cart ?: cart()->firstOrCreate());
                return $user;
            }
        });

        Blade::stringable(function (Money $money) {
           

            $currencies = new ISOCurrencies();
            $numberFormatter = new \NumberFormatter('en', \NumberFormatter::CURRENCY);
            $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);
            return $moneyFormatter->format($money);

 
        });
    }
}
