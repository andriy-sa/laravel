<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Route;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale  = Route::input('locale');
        $locale  = $locale == null ? 'uk' : $locale;
        $locales = Config::get('app.locales');
        if(!in_array($locale,$locales)){
            abort(404);
        }
        App::setLocale($locale);
        return $next($request);
    }
}
