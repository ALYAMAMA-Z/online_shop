<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
   
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        } else {
          
            $browserLanguage = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
            if (in_array($browserLanguage, ['en', 'ar', 'nl'])) {
                App::setLocale($browserLanguage);
                Session::put('locale', $browserLanguage);
            } else {

                App::setLocale('en');
                Session::put('locale', 'en');
            }
        }
        
        return $next($request);
    }
}