<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // static data sharing globaly

        // View::share('key','value');
        View::share('name', 'hey here Arnav');
        View::share('header', 'This is the header');
        View::share('footer', 'This is the footer');

        // dynamic data sharing globaly
        
        View::composer('*', function ($view) {
            $time = date('H:i:s');
            $view->with(
                'globalMessage',
                'This is a global message'
            );
            $view->with(
                'currentTime',
                $time
            );
        });
    }
}
