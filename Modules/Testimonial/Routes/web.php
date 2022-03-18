<?php

use Illuminate\Support\Facades\Route;
use Modules\Testimonial\Http\Controllers\TestimonialController;

Route::group(['middleware' =>'auth:admin', 'prefix'=>'admin/testimonial', 'as'=>'module.'], function(){
    // Testimonial Routes
        Route::get('/',[TestimonialController::class, 'index'])->name('testimonial.index');
        Route::get('/add',[TestimonialController::class, 'create'])->name('testimonial.create');
        Route::post('/add',[TestimonialController::class, 'store'])->name('testimonial.store');
        Route::get('/edit/{testimonial}',[TestimonialController::class, 'edit'])->name('testimonial.edit');
        Route::put('/update/{testimonial}',[TestimonialController::class, 'update'])->name('testimonial.update');
        Route::delete('/destroy/{testimonial}',[TestimonialController::class, 'destroy'])->name('testimonial.destroy');
});
