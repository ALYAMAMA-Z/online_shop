<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductPhoto;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StorproductRequest;
use App\Http\Requests\StorimageRequest;


class ProductController extends Controller
{
    public function addproduct()
    {
        $allcategories = Category::all();
        return view('products.addproduct', ['allcategories' => $allcategories]);
    }

    public function storproduct(StorproductRequest $request)
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

            return redirect('/')->with('success', 'تم إضافة المنتج بنجاح');
        }
    }

    public function removeproduct($productid = null)
    {
        if ($productid) {
            $product = Product::findOrFail($productid);

           
            if ($product->imagpath && File::exists(public_path('assets/img/' . $product->imagpath))) {
                File::delete(public_path('assets/img/' . $product->imagpath));
            }

            $product->delete();
            return redirect('/products')->with('success', 'تم حذف المنتج بنجاح');
        }

        abort(404);
    }

    public function Removeproductphoto($imagid = null)
    {
        if ($imagid) {
            $photo = ProductPhoto::findOrFail($imagid);

            if ($photo->imagpath && File::exists(public_path($photo->imagpath))) {
                File::delete(public_path($photo->imagpath));
            }

            $photo->delete();
            return redirect('/productTable')->with('success', 'تم حذف صورة المنتج');
        }

        abort(404);
    }

    public function storproductimag(StorimageRequest $request)
    {
        $photo = new ProductPhoto();
        $photo->product_id = $request->product_id;

        if ($request->hasFile('photo')) {
            $imageName = Str::uuid() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('uploads'), $imageName);
            $photo->imagpath = 'uploads/' . $imageName;
        }

        $photo->save();

        return redirect('/productTable')->with('success', 'تم رفع صورة المنتج بنجاح');
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

        return redirect('/addproduct');
    }

    public function showproduct($productid)
    {
        $product = Product::with('category', 'productphoto')->findOrFail($productid);

        $reletedproduct = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $productid)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('products.showproduct', [
            'product' => $product,
            'reletedproduct' => $reletedproduct
        ]);
    }

    public function productTable()
    {
        $products = Product::all();
        return view('products.productTable', ['products' => $products]);
    }

    public function Addproductimag($productid)
    {
        $product = Product::findOrFail($productid);
        $productimag = ProductPhoto::where('product_id', $productid)->get();

        return view('products.Addproductimag', [
            'product' => $product,
            'productimag' => $productimag
        ]);
    }
}
