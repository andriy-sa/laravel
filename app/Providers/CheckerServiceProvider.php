<?php

namespace App\Providers;

use App\Sa\Checker;
use Illuminate\Support\ServiceProvider;

class CheckerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    protected $defer = true;

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
        $this->app->bind('checker', function() {
            return new Checker;
        });
    }

    public function provides(){

        return ['checker'];
    }
}
