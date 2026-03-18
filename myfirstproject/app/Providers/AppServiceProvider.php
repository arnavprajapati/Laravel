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
        // sharing data globally with all views
        View::share('name', 'hey here Arnav and i am sharing this data globally with all views');
        View::share('header', 'This is the header of the page globaly shared');
        View::share('footer', 'This is the footer of the page globally shared');
        // till now we sharing static data globally with all views but if we want to share dynamic data globally with all views then we can use view composer for that

        // View::composer(['contact', 'services'], function ($view) {
        //     $view->with('message', 'This is a dynamic message shared globally with contact and services views using view composer');
        // });

        View::composer('*', function ($view) {
            $time = date('H:i:s');
            $view->with('globalMessage', 'This is a global message shared with all views using view composer');
            $view->with('currentTime', $time);
        });
    }
}
