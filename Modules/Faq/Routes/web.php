<?php

use Illuminate\Support\Facades\Route;
use Modules\Faq\Http\Controllers\FaqController;


Route::group(['middleware' =>'auth:admin', 'prefix'=>'admin/faq', ], function(){
    // Job Routes
        Route::get('/', [FaqController::class, 'index'])->name('module.faq.index');
        Route::get('/add', [FaqController::class, 'create'])->name('module.faq.create');
        Route::post('/add', [FaqController::class, 'store'])->name('module.faq.store');
        Route::get('/edit/{faq}', [FaqController::class, 'edit'])->name('module.faq.edit');
        Route::put('/update/{faq}', [FaqController::class, 'update'])->name('module.faq.update');
        Route::delete('/destroy/{faq}', [FaqController::class, 'destroy'])->name('module.faq.destroy');

});
