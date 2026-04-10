<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderdetails;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CartRequest;

class CartController extends Controller
{
    public function cart()
    {
        $user_id = auth()->id();

        $cartproducts = Cart::with('Product')
            ->where('user_id', $user_id)
            ->get();

        return view('products.cart', ['cartproducts' => $cartproducts]);
    }

    public function completeorder()
    {
        $user_id = auth()->id();

        $cartproducts = Cart::with('Product')
            ->where('user_id', $user_id)
            ->get();

        return view('checkout', ['cartproducts' => $cartproducts]);
    }

    public function stororder(CartRequest $request)
    {
        
        $user_id = auth()->id();

        $cartproducts = Cart::with('Product')
            ->where('user_id', $user_id)
            ->get();

        if ($cartproducts->isEmpty()) {
            return redirect('/cart')->with('error', 'السلة فارغة!');
        }

        DB::beginTransaction();

        try {
            $newOrder = Order::create([
                'name' => $request->name,
                'email' => $request->email,
                'Phone' => $request->Phone,
                'Address' => $request->Address,
                'note' => $request->note,
                'user_id' => $user_id,
            ]);

            foreach ($cartproducts as $item) {
                Orderdetails::create([
                    'product_id' => $item->product_id,
                    'price' => $item->Product->price,
                    'quantity' => $item->quantity,
                    'order_id' => $newOrder->id,
                ]);
            }

            Cart::where('user_id', $user_id)->delete();

            DB::commit();

            return redirect('/showpdf')->with('success', 'تم تقديم الطلب بنجاح');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/cart')->with('error', 'حدث خطأ أثناء تقديم الطلب، حاول مرة أخرى.');
        }
    }

    public function previousorder()
    {
        $user_id = auth()->id();

        $orders = Order::with('orderdetails.product')
            ->where('user_id', $user_id)
            ->latest()
            ->get();

        return view('products.previousorder', ['orders' => $orders]);
    }
}
