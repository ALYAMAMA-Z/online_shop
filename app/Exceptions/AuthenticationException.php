<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;


class AuthenticationException extends Exception
{
    public function report()
    {
        
        Log::error("Authentication failed for user.");
    }

    public function render($request)
    {
        return response()->json(['error' => 'Unauthorized. Please log in first.'], 401);
    }
}
