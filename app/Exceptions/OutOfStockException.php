<?php

namespace App\Exceptions;
use Illuminate\Support\Facades\Log;

use Exception;

class OutOfStockException extends Exception
{
    public function report()
    {
        Log::error("Product is out of stock.");
    }

    public function render($request)
    {
        return response()->json(['error' => 'The product is out of stock.'], 400);
    }
}


