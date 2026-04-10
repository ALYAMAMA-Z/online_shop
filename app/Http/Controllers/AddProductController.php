<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;


class AddProductController extends Controller
{
   public function AddProductToCart($productid){

    $newcart = new Cart();
             $user_id=auth()->user()->id;

           $result =  Cart::where('user_id',$user_id)
           ->where('product_id',$productid)
           ->first() ;

           if($result){

            $result->quantity  +=1;
            
            $result->save();

           }else{
                $newcart->product_id = $productid;
                $newcart->user_id = $user_id;
                $newcart->quantity = 1;
                $newcart->save();
                
           }
     return redirect('/cart');

}
}
