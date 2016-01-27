<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SlugServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    protected $defer = true;

    public function boot()
    {
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->singleton('App\Sa\Slug', function($app){
            return new Slug();
        });
    }

    public function provides(){

        return ['Slug'];
    }
}
