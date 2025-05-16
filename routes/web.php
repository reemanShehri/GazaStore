<?php

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Notifications\WelcomeNotification;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\APIProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\API\Product2Controller;
use App\Http\Controllers\NotificationController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



// Route::get('/', function () {
//     return view('components.welcome');
// });

Route::get('/', function () {
    return view('components.welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => app()->version(),
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::prefix('admin')->name('admin.')->group(
    function(){

   Route::get('/',[AdminController::class,'index'])->name('index');
   Route::get('profile',[AdminController::class,'profile'])->name('profile');
   Route::put('profile',[AdminController::class,'profile_data'])->name('profile_data');
   Route::resource('categories', CategoryController::class);
   Route::resource('products', ProductController::class);


});


 Route::prefix('admin')->name('admin.')->group(
    function(){

Route::get('/',[AdminController::class,'index'])->name('index');
Route::get('notification',[AdminController::class,'notification2'])->name('notification');


});



Route::middleware('auth')->group(function () {
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])
        ->name('profile.password.update');
});

require __DIR__.'/auth.php';


// API test routes

Route::get('products',[APIProductController::class,'products']);
Route::get('weather',[APIProductController::class,'weather']);


// API.php
// 5 urls as apiResource no create no edit urls
Route::apiResource('api-product', Product2Controller::class);
//

Route::get('send',[NotificationController::class,'send']);



// routes/web.php
Route::get('/notification', [NotificationController::class,'send2'])
    ->name('notification.read');


Route::prefix(LaravelLocalization::setLocale())->group(function () {
    Route::get('/', [FrontController::class, 'index'])->name('front.index');
    Route::get('/about', [FrontController::class, 'about'])->name('front.about');
    Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');
    Route::get('/products', [FrontController::class, 'products'])->name('front.products');
    Route::get('/category/{id}', [FrontController::class, 'category'])->name('front.category');


    Route::get('/product/{id}', [FrontController::class, 'single_product'])->name('front.single_product');
    Route::get('/product/{id}/add-to-cart', [FrontController::class, 'addToCart'])->name('front.add_to_cart');
    Route::get('/cart', [FrontController::class, 'cart'])->
        name('front.cart');
    Route::get('/cart/remove/{id}', [FrontController::class, 'removeFromCart'])->name('front.remove_from_cart');
    Route::get('/cart/checkout', [FrontController::class, 'checkout'])->name('front.checkout');
    Route::get('/cart/checkout/place-order', [FrontController::class, 'placeOrder
        '])->name('front.place_order');
    Route::get('/cart/checkout/success', [FrontController::class, 'success'])->name('front.success');
    Route::get('/cart/checkout/fail', [FrontController::class, 'fail'])->name('front.fail');
    Route::get('/cart/checkout/confirm', [FrontController::class, 'confirm'])->name('front.confirm');
    Route::get('/cart/checkout/confirm/{id}', [FrontController::class, 'confirm'])->name('front.confirm');
   

    Route::post('/contact/submit', [FrontController::class, 'submitContact'])->name('front.contact.submit');

});


Route::get('/r', [FrontController::class, 'r'])->name('r');
