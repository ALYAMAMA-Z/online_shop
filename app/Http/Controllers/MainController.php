<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StorreviewRequest;




class MainController extends Controller
{

 public function main() {
 
         if(Auth::user()){
          Session::put('username',auth()->user()->name);
          }
 
          $categories = Category::all();
    
       return view('welcome',['categories' => $categories]);
}

 public function reviews() {

  $reviews= Review::paginate(3);
  return view('reviews',['reviews'=> $reviews]);
}

 public function storeReviews(StorreviewRequest $request) {

   
  $newReview = new Review();
    $newReview -> name = $request-> name;
    $newReview -> phone = $request-> phone;
    $newReview -> email = $request-> email;
    $newReview -> subject = $request-> subject;
    $newReview -> message = $request->message;
    $newReview->save();


  return redirect('/reviews')->with('success', 'تم إرسال المراجعة بنجاح');
}

  public function product( $category_id = null ) {
    if($category_id){

     $products = Product::where('category_id', $category_id)->paginate(6);
        return view('product',['products' => $products]);  

    }else{
       $products = Product::paginate(6);
        return view('product',['products' => $products]);  

    }
   
    
}
}
