<?php

namespace App\Exceptions;
use Illuminate\Support\Facades\Log;

use Exception;

class GeneralException extends Exception
{
    public function report()
    {
        Log::error("A general error occurred: " . $this->getMessage());
    }

    public function render($request)
    {
        return response()->json(['error' => 'Something went wrong. Please try again later.'], 500);
    }
}
