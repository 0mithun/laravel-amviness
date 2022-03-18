<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\Api\CategoryController;
use Modules\Category\Http\Controllers\Api\SubCategoryController;

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

Route::middleware('auth:api')->get('/category', function (Request $request) {
    return $request->user();
});

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::get('{category}', [CategoryController::class, 'edit']);
    Route::put('{category}', [CategoryController::class, 'update']);
    Route::delete('{category}', [CategoryController::class, 'destroy']);
    Route::post('/update/order', [CategoryController::class, 'updateOrder']);
});

Route::prefix('subcategory')->group(function () {
    Route::get('/', [SubCategoryController::class, 'index']);
    Route::post('/', [SubCategoryController::class, 'store']);
    Route::get('{subcategory}', [SubCategoryController::class, 'edit']);
    Route::put('{subcategory}', [SubCategoryController::class, 'update']);
    Route::delete('{subcategory}', [SubCategoryController::class, 'destroy']);
    Route::delete('/multiple/destroy', [SubCategoryController::class, 'multipleDestroy']);
});
