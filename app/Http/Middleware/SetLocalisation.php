<?php

namespace App\Http\Middleware;

use Closure;

class SetLocalisation
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

        if (request('lang') == 'ar') {
            app()->setLocale('ar');
            session()->put('lang', 'ar');
        }

        if (request('lang') == 'fr') {
            app()->setLocale('fr');
            session()->put('lang', 'fr');
        }

        if(!request('lang')) {
            app()->setLocale('fr');
        }
        return $next($request);
    }
}
