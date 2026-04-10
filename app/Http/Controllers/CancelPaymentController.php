<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CancelPaymentController extends Controller
{
   public function cancelpayment($provider) {
    return view('payment-failed', compact('provider'));
}
}