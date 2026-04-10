<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Http\Middleware\Customauth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CancelPaymentController;
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DeleteController;
use App\Http\Middleware\SetLocale;





Route::get('/', [MainController::class,'main'])/*->middleware('auth')*/;

Route::get('/products/{category_id?}',[MainController::class,'product']);

Route::get('/single-product/{productid}',[ProductController::class,'showproduct']);

Route::post('/search', [SearchController::class,'search']);

Route::get('/reviews',[MainController::class,'reviews']);


Route::get('/cart',[CartController::class,'cart'])->middleware('auth');

Route::get('/addproducttocart/{productid}',[AddProductController::class,'AddProductToCart'])->middleware('auth');

Route::get('/completeorder',[CartController::class,'completeorder'])->middleware('auth');

Route::post('/stororder', [CartController::class,'stororder']);

Route::get('/previousorder',[CartController::class,'previousorder'])->middleware('auth');

Route::get('/deleteitem/{cartid}',[DeleteController::class,'deleteItem']);



Route::post('/storproduct', [ProductController::class, 'storproduct']);
Route::get('/productTable', [ProductController::class, 'productTable']);
Route::get('/removeproductphoto/{imagid?}',[ProductController::class,'Removeproductphoto']);
Route::post('/storProductImag', [ProductController::class,'storproductimag']);
Route::post('/storproduct', [ProductController::class, 'storproduct'])->name('product.update');
// Route::get('/editproduct/{id}', [ProductController::class, 'editproduct'])->name('product.edit');


Route::post('/storeReviews',[MainController::class,'storeReviews'])->middleware('auth');




Route::get('/category',[CategoryController::class,'category']);



Route::post('/storepdf',[InvoiceController::class,'store'])->name('storepdf');

Route::get('/showpdf',[InvoiceController::class,'create'])->name('showpdf');

Route::get('/invoices/success/{id}', [\App\Http\Controllers\InvoiceController::class, 'success'])->name('invoices.success')->middleware('auth');

Route::get('/invoices/view/{id?}', [\App\Http\Controllers\InvoiceController::class, 'view'])->name('invoices.view')->middleware('auth');
//Route::get('/invoices/download/{id}', [\App\Http\Controllers\InvoiceController::class, 'download'])->name('invoices.download');




Route::get('/Addproductimag/{productid}', [ProductController::class, 'Addproductimag']);


Route::get('language/{locale}',[LanguageController::class,'change'])->name('language.switch');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth','admin'])->group(function(){

    Route::get('/editproduct/{productid?}', [ProductController::class,'editproduct'])->name('product.update');

    Route::get('/removeproduct/{productid?}', [ProductController::class,'removeproduct']);

    Route::get('/admin-dashboard', [ProductController::class,'addproduct']);

});




// // صفحة نموذج الدفع
Route::get('/checkout', function () {
    return view('checkout');
})->middleware('auth')->name('checkout');

// تنفيذ الدفع عبر POST
Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout')->middleware('auth');

// رد الدفع من مزود مثل Stripe أو PayPal
Route::get('/payment/callback/{provider}', [PaymentController::class, 'callback'])->name('payment.callback');

Route::get('/payment/cancel/{provider}', [CancelPaymentController::class,'cancelpayment'])->name('payment.cancel');

Route::post('/payment/webhook/{provider}', [PaymentController::class, 'webhook'])->name('payment.webhook');