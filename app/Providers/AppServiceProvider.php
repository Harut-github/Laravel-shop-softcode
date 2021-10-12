<?php

namespace App\Providers;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        //echo count cart for all pages
        view()->composer('*', function ($view) {
            if(Auth::check()){
                $user = Auth::user();
                $countcart = Cart::where('user_id',$user->id)->count();
                $view->with('countcart', $countcart);
            }
        });

       Schema::defaultStringLength(191);

    }
}
