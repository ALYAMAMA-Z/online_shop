<?php

namespace App\Services\UserServices;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductPhoto;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StorproductRequest;
use App\Http\Requests\StorimageRequest;

class productServices{

     public function storproduct( $request)
    {
        if ($request->id) {
            // تعديل منتج
            $product = Product::findOrFail($request->id);

            $data = $request->only(['name', 'price', 'quantity', 'description', 'category_id']);

            if ($request->hasFile('photo')) {
                // حذف الصورة القديمة من السيرفر
                if ($product->imagpath && File::exists(public_path('assets/img/' . $product->imagpath))) {
                    File::delete(public_path('assets/img/' . $product->imagpath));
                }

                $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
                $request->file('photo')->move(public_path('assets/img'), $photoName);
                $data['imagpath'] = $photoName;
            }

            $product->update($data);

            return redirect('/products')->with('success', 'تم تعديل المنتج بنجاح');
        } else {
            // إنشاء منتج جديد
            $photoName = '';
            if ($request->hasFile('photo')) {
                $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
                $request->file('photo')->move(public_path('assets/img'), $photoName);
            }

            Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'imagpath' => $photoName,
            ]);
        }
    }

     public function storproductimag( $request)
    {
        $photo = new ProductPhoto();
        $photo->product_id = $request->product_id;

        if ($request->hasFile('photo')) {
            $imageName = Str::uuid() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('uploads'), $imageName);
            $photo->imagpath = 'uploads/' . $imageName;
        }

        $photo->save();
       
    }

    public function editproduct($productid = null)
    {
        if ($productid) {
            $product = Product::findOrFail($productid);
            $allcategories = Category::all();

            return view('products.editproduct', [
                'product' => $product,
                'allcategories' => $allcategories
            ]);
        }

    }

}