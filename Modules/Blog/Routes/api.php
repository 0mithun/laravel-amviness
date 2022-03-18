<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\Api\BlogController;

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

Route::middleware('auth:api')->get('/blog', function (Request $request) {
    return $request->user();
});



Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('api.index');
    Route::get('/category', [BlogController::class, 'blogindex'])->name('api.blogindex');
    Route::get('{post}', [BlogController::class, 'show'])->name('api.show');
});
