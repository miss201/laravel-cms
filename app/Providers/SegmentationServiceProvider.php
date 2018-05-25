<?php

namespace App\Providers;

use App\Containers\SegmentationContainer;
use Illuminate\Support\ServiceProvider;

class SegmentationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\SegmentationContracts', function () {
            return new SegmentationContainer();
        });
    }
}
