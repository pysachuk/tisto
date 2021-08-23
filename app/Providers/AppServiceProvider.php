<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();
        \Blade::directive('menuActive',function($expression) {
            //explode the '$expression' string to the varibles needed
            list($route, $class) = explode(', ', $expression);
            //then we check if the route is the same as the one we are passing.
            return "{{ \Route::is({$route}) ? {$class} : '' }}";

        });
    }
}
