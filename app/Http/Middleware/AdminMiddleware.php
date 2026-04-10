<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\AuthenticationException;
class AdminMiddleware
{
   
    public function handle(Request $request, Closure $next): Response
    {if(!Auth::check() || Auth::user()->user !== 'admin'){
       throw new AuthenticationException("User not authenticated.");
    }
        return $next($request);
    }
}
