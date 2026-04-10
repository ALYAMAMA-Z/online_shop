<?php

namespace App\Exceptions;
use Illuminate\Support\Facades\Log;

use Exception;

class AuthorizationException extends Exception
{
    public function report()
    {
        Log::error("User does not have authorization to perform this action.");
    }

    public function render($request)
    {
        return response()->json(['error' => 'Forbidden. You do not have permission.'], 403);
    }
}


