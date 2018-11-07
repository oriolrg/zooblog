<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Config;

class SetLocale
{
    /**
     *
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('locale')) {
            return  "";
            $locale = Session::get('locale', Config::get('app.locale'));
            Session::put('locale', $locale);
            App::setLocale($locale);
        } else {
            $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);

            if ($locale != 'es' && $locale != 'ca') {
                $locale = 'en';
            }
            Session::put('locale', $locale);
            //$locale = Session::get('locale');
            App::setLocale($locale);
        }
        //$locale = Session::get('locale', Config::get('app.locale'));

        return $next($request);
    }
}