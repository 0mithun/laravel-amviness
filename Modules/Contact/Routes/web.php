<?php

use Illuminate\Support\Facades\Route;
use Modules\Contact\Http\Controllers\ContactController;

Route::middleware(['auth:super_admin'])->group(function() {
    // Contact Routes
    Route::prefix('contact')->group(function() {
        Route::get('/',[ContactController::class, 'index'])->name('module.contact.index');
        Route::delete('/destroy/{contact}',[ContactController::class, 'destroy'])->name('module.contact.destroy');
    });
});
