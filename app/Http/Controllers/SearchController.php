<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class SearchController extends Controller
{
  public  function search(Request $request){

   $products= Product::where('name','like','%'.$request->searchkey.'%')
   ->paginate(6);
   
    return view('product',['products'=>$products]);
}
}
