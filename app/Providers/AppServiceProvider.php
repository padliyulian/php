<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Position;
use App\Models\Employee;
use App\Models\Role;

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

        view()->composer(['project/create', 'project/edit', 'meeting/form'], function($view){
            $view->with('employees', Employee::all());
        });

        view()->composer(['auth/register'], function($view){
            $view->with('roles', Role::all());
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
