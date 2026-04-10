<?php

namespace App\Exceptions;
use Illuminate\Support\Facades\Log;

use Exception;

class PaymentMethodNotSupportedException extends Exception
{
    public function report()
    {
        Log::error("Payment method not supported.");
    }

    public function render($request)
    {
        return response()->json(['error' => 'Payment method not supported.'], 400);
    }
}


