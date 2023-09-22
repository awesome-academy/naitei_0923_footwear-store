<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\CartDetail;
use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;

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
        view()->composer('*', function ($view) {
            $cartItemCount = 0;
            $favouriteItemCount = 0;
            if (Auth::check()) {
                $cartItemCount = CartDetail::where('user_id', Auth::user()->id)->count();
                $favouriteItemCount = User::find(Auth::user()->id)->products->count();
                $view->with('cartItemCount', $cartItemCount);
                $view->with('favouriteItemCount', $favouriteItemCount);
            } else {
                $view->with('cartItemCount', config('app.homepage.cart.default'));
                $view->with('favouriteItemCount', config('app.homepage.favourite.default'));
            }
        });
    }
}
