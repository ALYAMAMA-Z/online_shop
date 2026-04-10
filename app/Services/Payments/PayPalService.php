<?php
namespace App\Services\Payments;

class PayPalService implements PaymentGateway
{
    public function createPayment(array $data)
    {
        return "https://paypal.com/checkout?amount=".$data['amount'];
    }

    public function handleCallback(array $request)
    {
        return true; // تحقق حقيقي عند الربط
    }
}
