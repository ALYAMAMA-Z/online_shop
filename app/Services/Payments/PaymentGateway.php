<?php
namespace App\Services\Payments;

interface PaymentGateway
{
    public function createPayment(array $data);
    public function handleCallback(array $request);
}

