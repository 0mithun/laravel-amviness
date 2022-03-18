<?php

use Illuminate\Support\Facades\Route;
use Modules\Review\Http\Controllers\ReviewController;

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

Route::group(['middleware' =>'auth:admin', 'prefix'=>'admin/review', ], function(){

    Route::get('/', [ReviewController::class, 'index'])->name('review.index');
    Route::get('/create', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/store', [ReviewController::class, 'store'])->name('review.store');
    Route::delete('/delete/{review}', [ReviewController::class, 'destroy'])->name('review.destroy');
    Route::get('/edit/{review}', [ReviewController::class, 'edit'])->name('review.edit');
    Route::put('/update/{review}', [ReviewController::class, 'update'])->name('review.update');
});

