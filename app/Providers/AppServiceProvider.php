<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

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
        if(env('APP_ENV') === 'local') {
            \URL::forceScheme('http');
        }
        else if(env('APP_ENV') === 'production') {
            \URL::forceScheme('https');
        }

        Schema::defaultStringLength(191);

        if (Schema::hasTable('albums')) {
            $allYears = (new \App\Http\Controllers\GalleryController())->ShowAllYearsOfGallerys();
            view()->share('allYears', $allYears);
        }
    }
}
