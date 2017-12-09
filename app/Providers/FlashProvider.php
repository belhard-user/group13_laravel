<?php

namespace App\Providers;

use App\Classes\Flash;
use Illuminate\Support\ServiceProvider;

class FlashProvider extends ServiceProvider
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
        $this->app->singleton('flash', function(){
            return new Flash();
        });
    }
}
