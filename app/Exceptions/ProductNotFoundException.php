<?php

namespace App\Exceptions;
use Illuminate\Support\Facades\Log;

use Exception;

class ProductNotFoundException extends Exception
{
    public function report()
    {
        Log::error("Product not found in database.");
    }

    public function render($request)
    {
        return response()->json(['error' => 'Product not found.'], 404);
    }


}
