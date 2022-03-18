<?php

use Illuminate\Support\Facades\Route;
use Modules\Wishlist\Http\Controllers\WishlistController;

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::prefix('wishlist')->group(function () {
        Route::get('/', [WishlistController::class, 'index'])->name('module.wishlist.index');
        Route::post('/create', [WishlistController::class, 'store'])->name('module.wishlist.store');
        Route::delete('/destroy/{wishlist}', [WishlistController::class, 'destroy'])->name('module.wishlist.destroy');
    });
});
