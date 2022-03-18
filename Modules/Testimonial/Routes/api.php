<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Testimonial\Http\Controllers\Api\TestimonialController;

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

Route::middleware('auth:api')->get('/testimonial', function (Request $request) {
    return $request->user();
});

Route::prefix('testimonial')->group(function() {
    Route::get('/',[TestimonialController::class, 'index']);
    Route::post('/',[TestimonialController::class, 'store']);
    Route::get('{testimonial}',[TestimonialController::class, 'edit']);
    Route::put('{testimonial}',[TestimonialController::class, 'update']);
    Route::delete('{testimonial}',[TestimonialController::class, 'destroy']);
});
