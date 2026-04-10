<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Handler extends ExceptionHandler
{
    
    protected $dontReport = [
       
    ];

    public function register()
    {
         $this->reportable(function (Exception $e) {
            if ($e instanceof AuthenticationException) {
                \Log::error("Authentication failed: " . $e->getMessage());
            }

            if ($e instanceof AuthorizationException) {
                \Log::error("Authorization failed: " . $e->getMessage());
            }

            if ($e instanceof ProductNotFoundException) {
                \Log::error("Product not found: " . $e->getMessage());
            }

        });
    }
}
