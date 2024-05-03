<?php

use App\Http\Controllers\Admin\ABlogcontroller;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ModelController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RecivedOrderController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\OrderProductController;
use App\Http\Controllers\Front\ProducDetailsController;
use App\Http\Controllers\Front\ShopCatlogController;
use App\Http\Controllers\Front\SinglePostController;
use App\Http\Controllers\Front\SingleProductController;
use App\Http\Controllers\Front\UserOrdersController;
use App\Models\OrderProduct;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::name('admin.')->group(function () {
    //
    Route::middleware(['auth','admin'])->group(function(){
        Route::get('/admin', [AdminController::class, 'index'])->name('home');
        Route::get('/ContactMessages', [ContactController::class, 'show'])->name('ContactMessages');
        Route::put('admin/messages/{id}',[ContactController::class, 'update'])->name('messages.update');
        Route::get('/subscription', [SubscriptionController::class, 'index'])->name('subscription');
        Route::post('/AddSubsription', [SubscriptionController::class, 'add'])->name('AddSubsription.add');
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('blogs', ABlogcontroller::class);
        Route::resource('users', UserController::class);
        Route::get('admin/orders', [RecivedOrderController::class,'index'])->name('recivedorders');
        Route::post('orderstat/{id}', [RecivedOrderController::class,'updateorderstat'])->name('orderstate');
    });

});

    // Logic for admin dashboard...


Route::name('front.')->group(function () {
    // Route::middleware(['auth','user'])->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/sendMessage', [ContactController::class, 'sendMessage'])->name('contact.sendMessage');
    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/singlepost/{post}', [SinglePostController::class, 'index'])->name('singlepost');
    Route::get('/singleproduct/{product}', [SingleProductController::class, 'index'])->name('singleproduct');
    Route::post('/addToCart/{product}', [SingleProductController::class, 'addToCart'])->name('addToCart');
    Route::post('/LeaveComment/{product}', [SingleProductController::class, 'LeaveComment'])->name('LeaveComment');
    Route::get('/shopcatalog', [ShopCatlogController::class, 'index'])->name('shopcatalog');
    Route::post('/addtoCart/{id}', [ShopCatlogController::class, 'addToCart'])->name('addtoCart');
    Route::get('/productdetails', [ProducDetailsController::class, 'index'])->name('productdetails');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/cart', [CartController::class, 'index'])->name('cart'); //
    Route::post('/updateCart/{productId}', [CartController::class, 'addToCart'])->name('updateCart'); //
    Route::get('/removeFromCart/{productId}', [CartController::class, 'removeFromCart'])->name('removeItem'); //
    Route::get('/Showcart', [CartController::class, 'showCart'])->name('showCart'); //
    Route::get('/checkout',[OrderController::class,'checkout'])->name('checkout');
    Route::get('/orders',[OrderController::class,'index'])->name('orders');
    Route::post('/CancelOrder/{orderId}',[OrderController::class,'cancelorder'])->name('cancelorder');
    // });
});
Route::get('/pdf/{filename}', 'PDFController@show')->name('pdf.show');

Auth::routes();
 Route::get('/', [HomeController::class, 'index'])->name('front.home');
