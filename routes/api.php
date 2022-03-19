<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MobileAppController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::get('homepage', [MobileAppController::class, 'index'])->name('homepage.nextpage.index');
Route::get('category/category/{category:slug}', [MobileAppController::class, 'getProductCategory']);
Route::get('category/subcategory/{subcategory}', [MobileAppController::class, 'getProductsubCategory']);

Route::get('setting-website', [MobileAppController::class, 'setting']);

Route::get('newsletter-website', [MobileAppController::class, 'newsletter']);


Route::get('/product-search', [MobileAppController::class, 'productSearch']);

Route::get('/blog-search', [MobileAppController::class, 'blogSearch']);

Route::get('/top-categories', [MobileAppController::class, 'topCategory']);

Route::post('/contactmessage', [MobileAppController::class, 'contact']);

Route::get('/wishlist-extra', [MobileAppController::class, 'wishlist']);
Route::get('wishlist-extra/single/{id}', [MobileAppController::class, 'single_wishlist']);
Route::delete('wishlist-extra/delete/{id}', [MobileAppController::class, 'destroy_wishlist']);

// Route::get('category-product', [MobileAppController::class, 'categoryProduct']);




Route::get('/related-product-master/{product}', [MobileAppController::class, 'relatedShowData']);
