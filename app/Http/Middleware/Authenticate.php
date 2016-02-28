<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $loc = Config::get('app.locale');
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect("/".$loc."/login");
            }
        }

        if(Auth::user()->ban){
            Auth::logout();
            return redirect()
                ->route('home',['locale'=>$loc])
                ->with('error',[trans('message.ban_profile')]);
        }

        return $next($request);
    }
}
