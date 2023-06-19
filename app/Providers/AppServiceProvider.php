<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        if (App::environment('production')) {
            \URL::forceScheme('https');
        }else {
            \URL::forceScheme('http');
        }

        Schema::defaultStringLength(191);

        if (Schema::hasTable('albums')) {
            $allYears = (new \App\Http\Controllers\GalleryController())->ShowAllYearsOfGallerys();
            view()->share('allYears', $allYears);
        }
    }
}
