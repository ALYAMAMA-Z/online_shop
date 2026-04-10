<?php

namespace App\Services\Payments\Providers;

use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

class PaypalPayment
{
    protected $apiContext;

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                env('PAYPAL_SECRET'),    
                env('PAYPAL_CLIENT_ID') 
            )
        );

        $this->apiContext->setConfig([
            'mode' => env('PAYPAL_MODE', 'sandbox'), 
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => false,
        ]);
    }

    public function createPayment(array $data)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setCurrency($data['currency'] ?? 'USD')
               ->setTotal($data['amount']);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
                    ->setDescription($data['description'] ?? 'Payment');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($data['success_url'])
                     ->setCancelUrl($data['cancel_url'] );

        $payment = new Payment();
        $payment->setIntent('sale')
                ->setPayer($payer)
                ->setTransactions([$transaction])
                ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return $payment->getApprovalLink();
        } catch (\Exception $e) {
            // من الأفضل تسجيل الخطأ هنا log
            return false;
        }
    }

    public function handleCallback($paymentId, $payerId)
    {
        try {
            $payment = Payment::get($paymentId, $this->apiContext);

            $execution = new PaymentExecution();
            $execution->setPayerId($payerId);

            $result = $payment->execute($execution, $this->apiContext);

            return $result->getState() === 'approved';
        } catch (\Exception $e) {
            // تسجيل الخطأ أو التعامل معه
            return false;
        }
    }
}
