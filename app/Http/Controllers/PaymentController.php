<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Invoice;
use App\Services\Payments\PaymentFactory;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CheckoutRequest;

class PaymentController extends Controller
{
   
   public function checkout(CheckoutRequest $request)
{

    $user = auth()->user();

    // إنشاء الطلب بالحالة "pending"
    $order = Order::create([
        'name' => $request->name,
        'email' => $request->email,
        'Phone' => $request->Phone,
        'Address' => $request->Address,
        'note' => $request->note,
        'amount' => $request->amount,
        'payment_status' => 'pending',
        'payment_provider' => $request->provider,
        'order_number' => uniqid('ORD-'),
        'user_id' => $user?->id,
    ]);

    // نبدأ الدفع
    $gateway = PaymentFactory::make($request->provider);
dd(env('MOLLIE_API_KEY'));
    $redirectUrl = $gateway->createPayment([
        'amount' => $request->amount,

        'description' => 'طلب رقم ' . $order->order_number,

        'success_url'=>route('payment.callback',[
            'provider' => $request->provider,
            'order_id' => $order->id
        ]),

        'cancel_url'=>route('payment.cancel', [
            'provider' => $request->provider,
            'order_id' => $order->id
        ]),
        'redirect_url' => route('payment.callback', [
            'provider' => $request->provider,
            'order_id' => $order->id
        ])
    ]);
   


    // return redirect($redirectUrl);


}

public function callback(Request $request, $provider)
{
    $gateway = PaymentFactory::make($provider);
    $success = $gateway->handleCallback($request->all());

    $order = Order::findOrFail($request->order_id);

    if ($success) {
        $order->update([
            'payment_status' => 'paid',
        ]);

        //  هنا يجب استخدام تفاصيل الطلب الحقيقية، مؤقتًا نستخدم منتج وهمي
        $items = [['name' => 'منتج تجريبي', 'qty' => 1, 'price' => $order->amount]];

        $data = [
            'order_id' => $order->order_number,
            'customer_name' => $order->name,
            'customer_email' => $order->email,
            'items' => $items,
            'total' => $order->amount,
        ];

        $pdf = PDF::loadView('invoice', $data);
        $fileName = 'invoice_' . $order->order_number . '.pdf';

        Storage::put('invoices/' . $fileName, $pdf->output());

        Invoice::create([
            'order_id' => $order->id,
            'customer_name' => $order->name,
            'customer_email' => $order->email,
            'items' => json_encode($items), //  تخزين كمصفوفة JSON
            'total' => $order->amount,
            'file_path' => 'invoices/' . $fileName,
        ]);

        return view('payment-success', compact('order', 'provider'));
    }

    $order->update([
        'payment_status' => 'failed',
    ]);

    return view('payment-failed', compact('provider', 'order'));
}

public function webhook(Request $request, $provider)
{
    $gateway = PaymentFactory::make($provider);

    $payload = $request->all();

    $success = $gateway->handleCallback($payload);

    if ($success) {

        $order_id = $payload['metadata']['order_id'] ?? null;
        if ($order_id) {
            $order = Order::find($order_id);
            if ($order) {
                $order->update(['payment_status' => 'paid']);
            }
        }
        return response('Webhook Handled', 200);
    }

    return response('Payment Failed', 400);
}


}
