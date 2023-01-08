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
        // Paginator::defaultView('pagination::bootstrap-4');
        // Paginator::defaultView('pagination::default');
        // Paginator::defaultView('pagination::semantic-ui');
        // Paginator::defaultView('pagination::simple-bootstrap-4');
        // Paginator::defaultView('pagination::simple-default');
        // Paginator::defaultView('pagination::simple-tailwind');
        // Paginator::defaultView('pagination::tailwind');
        Paginator::defaultView('pagination::original');
    }
}
