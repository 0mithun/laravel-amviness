<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Banner\Http\Controllers\Api\BannerController;

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

Route::middleware('auth:api')->get('/banner', function (Request $request) {
    return $request->user();
});



Route::prefix('slider')->group(function () {
    Route::get('/', [BannerController::class, 'index'])->name('slider.index');
});
