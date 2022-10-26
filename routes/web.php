<?php

use App\Http\Controllers\ProductCartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\UserAddressController;
use App\Models\Product;
use App\Models\ProductCategory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', function(){
    return view('homePage',[
        'products' => Product::with('productPrices')->get(),
        'productCategories' => ProductCategory::all()
    ]);
});

Route::resources([
    'productCategories' => ProductCategoryController::class,
    'products' => ProductController::class,
    'productReviews' => ProductReviewController::class,
    'userAddresses' => UserAddressController::class
]);


// Route::post('cart', function () {
//     dd("test");
//     return view('welcome');
// });

// routes for handling the shopping cart
Route::controller(ProductCartController::class)->group(function () {
    Route::post('cart/addProduct/{id}', 'addProduct');
    Route::get('cart/removeProduct/{id}', 'removeProduct');
    Route::get('cart/show', 'showCartContent');
});

require __DIR__.'/auth.php';
