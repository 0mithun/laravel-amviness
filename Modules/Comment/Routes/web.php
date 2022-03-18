<?php

use Illuminate\Support\Facades\Route;
use Modules\Comment\Http\Controllers\CommentController;

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

Route::prefix('comment')->name('comment.')->group(function() {
    Route::get('/', [CommentController::class, 'index'])->name('index');
    Route::post('/store', [CommentController::class, 'store'])->name('store');
});
