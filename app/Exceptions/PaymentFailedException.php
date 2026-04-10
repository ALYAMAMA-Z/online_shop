<?php

namespace App\Exceptions;
use Illuminate\Support\Facades\Log;

use Exception;

class PaymentFailedException extends Exception
{
    public function report()
    {
        Log::error("Payment transaction failed.");
    }

    public function render($request)
    {
        return response()->json(['error' => 'Payment failed. Please try again later.'], 500);
    }
}


