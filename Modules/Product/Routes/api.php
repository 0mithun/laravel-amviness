<?php

use App\Http\Controllers\Api\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\Api\ProductController;

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

// Route::middleware('sanctum:api')->get('/product', function (Request $request) {
//     return $request->user();
// });



// Route::middleware('sanctum:api')->get('/product', function (Request $request) {
//     return $request->user();
// });

// ->middleware('auth:sanctum')
// Route::get('/frontend/product', [ProductController::class, 'index'])->name('frontend.api.product.index');


Route::prefix('signin')->group(function () {
    Route::post('signin', [RegisterController::class, 'register'])->name('frontend.api.register');
    Route::post('signup', [RegisterController::class, 'login'])->name('frontend.api.login');
});

// Route::post('/me',[RegisterController::class, 'me'])->name('customer.me')->middleware('auth:customer_api');

// Route::post('me', [RegisterController::class, 'me'])->name('frontend.me')->middleware('auth:sanctum');
Route::post('/me', [RegisterController::class, 'me']);



Route::prefix('product')->name('product.api.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/latest-product', [ProductController::class, 'newproduct'])->name('newproduct');
    Route::get('{id}', [ProductController::class, 'show'])->name('show');
});




// Route::prefix('attribute')->group(function () {
//     Route::get('/', [AttributeController::class, 'index']);
//     Route::post('/', [AttributeController::class, 'store']);
//     Route::get('{attribute}', [AttributeController::class, 'show']);
//     Route::get('{attribute}', [AttributeController::class, 'edit']);
//     Route::put('{attribute}', [AttributeController::class, 'update']);
//     Route::delete('{attribute}', [AttributeController::class, 'destroy']);
// });
