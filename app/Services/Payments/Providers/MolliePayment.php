<?php

namespace App\Services\Payments\Providers;

use Mollie\Api\MollieApiClient;
use App\Services\Payments\Contracts\PaymentProviderInterface;
use Mollie\Laravel\Facades\Mollie;
class MolliePayment implements PaymentProviderInterface
{
    protected $mollie;

    public function __construct()
    {
        $this->mollie = new MollieApiClient();
        $this->mollie->setApiKey(env('MOLLIE_API_KEY'));
    }

    public function createPayment(array $data)
    {
      

        $payment = $this->mollie->payments->create([
            'amount' => [
                'currency' => $data['currency'] ?? 'EUR',
                'value' => number_format($data['amount'], 2, '.', ''), // Mollie يطلب قيمة نصية ب format معين
            ],
            'description' => $data['description'] ?? 'طلب من المتجر',
            'redirectUrl' => $data['redirect_url'],  // بعد الدفع يرجع له هنا
            'webhookUrl' => $data['webhook_url'] ?? route('payment.webhook', ['provider' => 'mollie']),  // webhook للتحقق من الدفع في الخلفية
            'metadata' => [
                'order_id' => $data['order_id'] ?? null,
            ],
        ]);

        return $payment->getCheckoutUrl();  // رابط الدفع للعميل
    }

    public function handleCallback(array $payload)
    {
        // Mollie API (webhook) 
        if (isset($payload['id'])) {
            $payment = $this->mollie->payments->get($payload['id']);
            return $payment->isPaid() && !$payment->isExpired() && !$payment->isCanceled();
        }
        return false;
    }
}
