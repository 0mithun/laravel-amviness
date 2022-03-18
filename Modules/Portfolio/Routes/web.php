<?php

use Illuminate\Support\Facades\Route;
use Modules\Portfolio\Http\Controllers\PortfolioController;

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

Route::group(['middleware' =>'auth:admin', 'prefix'=>'admin/portfolio', ], function(){
    // Job Routes

        Route::get('/',[PortfolioController::class, 'index'])->name('module.portfolio.index');
        Route::get('/add',[PortfolioController::class, 'create'])->name('module.portfolio.create');
        Route::post('/add',[PortfolioController::class, 'store'])->name('module.portfolio.store');
        Route::get('/edit/{portfolio}',[PortfolioController::class, 'edit'])->name('module.portfolio.edit');
        Route::put('/update/{portfolio}',[PortfolioController::class, 'update'])->name('module.portfolio.update');
        Route::delete('/destroy/{portfolio}',[PortfolioController::class, 'destroy'])->name('module.portfolio.destroy');
        Route::delete('/portfolio/multiple/destroy',[PortfolioController::class, 'multipleDestroy'])->name('module.portfolio.multiple.destroy');

});
