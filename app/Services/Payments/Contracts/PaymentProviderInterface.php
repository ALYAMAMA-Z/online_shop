<?php

namespace App\Services\Payments\Contracts;

interface PaymentProviderInterface
{
    public function createPayment(array $data);
    public function handleCallback(array $payload);
}
