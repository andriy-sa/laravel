<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class SiteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['site/*','auth/*'],'App\Http\Composers\FrontComposer');  

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
