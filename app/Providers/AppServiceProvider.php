<?php

namespace App\Providers;

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
        if(env('APP_ENV') === 'local') {
            \URL::forceScheme('http');
        }
        else if(env('APP_ENV') === 'production') {
            \URL::forceScheme('http');
        }
        else {
            error_log('Check of de APP_ENV op local of production staat. Run dan het volgende commando: "php artisan optimize:clear" -Mees');
        }

        Schema::defaultStringLength(191);

        if (Schema::hasTable('albums')) {
            $allYears = (new \App\Http\Controllers\GalleryController())->ShowAllYearsOfGallerys();
            view()->share('allYears', $allYears);
        }
    }
}
