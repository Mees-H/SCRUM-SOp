<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\NavigationController;
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
        $allYears = (new \App\Http\Controllers\GalleryController())->ShowAYearsOfGallerys();
        view()->share('allYears', $allYears);
    }
}
