<?php

use Illuminate\Support\Facades\Route;
use Modules\Coupon\Http\Controllers\CouponController;

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

Route::prefix('coupon')->group(function () {
    Route::get('/', [CouponController::class, 'index'])->name('coupon.index');
    Route::get('/create', [CouponController::class, 'create'])->name('coupon.create');
    Route::post('/store', [CouponController::class, 'store'])->name('coupon.store');
    Route::get('/edit/{coupon}', [CouponController::class, 'edit'])->name('coupon.edit');
    Route::put('/update/{coupon}', [CouponController::class, 'update'])->name('coupon.update');
    Route::delete('/delete/{coupon}', [CouponController::class, 'destroy'])->name('coupon.delete');
    Route::delete('/multiple/destroy', [CouponController::class, 'multipleDestroy'])->name('coupon.multiple.delete');
    Route::get('/status', [CouponController::class, 'status'])->name('coupon.status.change');
});
