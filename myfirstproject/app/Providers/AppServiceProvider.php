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
    }
}
