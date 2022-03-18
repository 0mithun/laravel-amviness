<?php

use Illuminate\Support\Facades\Route;
use Modules\Newsletter\Http\Controllers\NewsletterController;


Route::group(['middleware' =>'auth:admin', 'prefix'=>'admin/newsletter', ], function(){
    // Job Routes

        Route::get('/', [NewsletterController::class, 'index'])->name('module.newsletter.index');
        Route::get('/add', [NewsletterController::class, 'create'])->name('module.newsletter.create');
        Route::post('/add', [NewsletterController::class, 'store'])->name('module.newsletter.store');
        Route::get('/edit/{newsletter}', [NewsletterController::class, 'edit'])->name('module.newsletter.edit');
        Route::put('/update/{newsletter}', [NewsletterController::class, 'update'])->name('module.newsletter.update');
        Route::delete('/destroy/{newsletter}', [NewsletterController::class, 'destroy'])->name('module.newsletter.destroy');

});
