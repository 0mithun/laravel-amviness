<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Tag\Http\Controllers\Api\TagController;

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

Route::middleware('auth:api')->get('/tag', function (Request $request) {
    return $request->user();
});

Route::prefix('tag')->group(function() {
    Route::get('/',[TagController::class, 'index']);
    Route::post('/',[TagController::class, 'store']);
    Route::get('{tag}',[TagController::class, 'edit']);
    Route::put('{tag}',[TagController::class, 'update']);
    Route::delete('{tag}',[TagController::class, 'destroy']);
    Route::delete('/tag/multiple/destroy',[TagController::class, 'multipleDestroy']);
});
