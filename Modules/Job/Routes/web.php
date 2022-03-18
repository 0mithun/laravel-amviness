<?php

use Illuminate\Support\Facades\Route;
use Modules\Job\Http\Controllers\JobController;

// Route::get('/carbon', function () {
//     return now()->toDateString();
// });
Route::middleware(['auth'])->group(function () {
    // Job Routes
    Route::prefix('job')->name('module.job.')->group(function () {
        Route::get('/', [JobController::class, 'index'])->name('index');
        Route::get('/add', [JobController::class, 'create'])->name('create');
        Route::post('/add', [JobController::class, 'store'])->name('store');
        Route::get('/edit/{job}', [JobController::class, 'edit'])->name('edit');
        Route::put('/update/{job}', [JobController::class, 'update'])->name('update');
        Route::delete('/destroy/{job}', [JobController::class, 'destroy'])->name('destroy');
    });
});
