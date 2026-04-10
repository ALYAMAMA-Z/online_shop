<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class DeleteController extends Controller
{

public function deleteItem($cartid){
    $user_id = auth()->user()->id;  // احصل على المستخدم الحالي

    $cartItem = Cart::where('id', $cartid)
                    ->where('user_id', $user_id)  // تحقق أن العنصر يخص المستخدم الحالي
                    ->first();

    if ($cartItem) {
        $cartItem->delete();
        return redirect('/cart')->with('success', 'Item deleted successfully.');
    } else {
        return redirect('/cart')->with('error', 'Item not found or you do not have permission to delete it.');
    }
}



}
