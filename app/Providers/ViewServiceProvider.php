<?php

namespace App\Providers;

use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use App\Models\Hotel;
use App\Models\Province;
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
            $countries = Country::all();
            $provinces = Province::all();
            $view->with(["user" => Auth::user(), "countries" => $countries, "provinces" => $provinces]);
        });
    }
}
