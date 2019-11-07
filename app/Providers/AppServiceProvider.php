<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Position;
use App\Models\Employee;

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

        view()->composer(['project/create', 'project/edit'], function($view){
            $view->with('employees', Employee::all());
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
