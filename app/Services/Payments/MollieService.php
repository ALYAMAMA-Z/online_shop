<?php
namespace App\Services\Payments;
use Mollie\Laravel\Facades\Mollie;

class MollieService implements PaymentGateway
{
    public function createPayment(array $data)
    {
        $payment = Mollie::api()->payments()->create([
            "amount" => ["currency"=>"EUR", "value"=>number_format($data['amount'],2,'.','')],
            "description"=>$data['description'] ?? 'طلب جديد',
            "redirectUrl"=>$data['redirect_url'],
        ]);
        return $payment->getCheckoutUrl();
    }

    public function handleCallback(array $request)
    {
        $paymentId = $request['id'] ?? null;
        if(!$paymentId) return false;
        $payment = Mollie::api()->payments()->get($paymentId);
        return $payment->isPaid();
    }
}
