<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Position;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer(['employee/create', 'employee/edit', 'layouts/navbar'], function($view){
            $view->with('positions', Position::all());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
