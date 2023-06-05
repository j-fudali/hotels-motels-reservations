<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use App\Models\Hotel;
use Illuminate\View\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Facades\View::composer('*', function (View $view) {
            $view->with("user", Auth::user());
            $hotels = Hotel::where('user_id_user', Auth::id())->orderBy('name')->get();
            $view->with("hotels", $hotels);
        });
    }
}
