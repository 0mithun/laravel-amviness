<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\ProductController;
use Modules\Product\Http\Controllers\ProductGalleryController;
use Modules\Product\Http\Controllers\ProductAttributeController;

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

Route::group(['middleware' =>'auth:admin', 'prefix'=>'admin/product', ], function(){
    // Product Routes
        Route::get('/', [ProductController::class, 'index'])->name('module.product.index');
        Route::get('/add', [ProductController::class, 'create'])->name('module.product.create');
        Route::get('/show/{product}', [ProductController::class, 'show'])->name('module.product.show');
        Route::post('/add', [ProductController::class, 'store'])->name('module.product.store');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('module.product.edit');
        Route::put('/update/{product}', [ProductController::class, 'update'])->name('module.product.update');
        Route::delete('/destroy/{product}', [ProductController::class, 'destroy'])->name('module.product.destroy');

        Route::get('/get/subcategory/list', [ProductController::class, 'subcategory_list'])->name('get.subcategory.list');
        Route::get('/status/change', [ProductController::class, 'status_change'])->name('product.status.change');
        Route::get('/category/wise/product/{category}', [ProductController::class, 'categoryWiseProduct'])->name('category.wise.product');

        // Product gallery Routes
        Route::get('/gallery/{id}', [ProductGalleryController::class, 'index'])->name('module.product.gallery.index');
        Route::post('/gallery/{id}', [ProductGalleryController::class, 'store'])->name('module.product.gallery.store');
        Route::delete('/gallery/{gallery}', [ProductGalleryController::class, 'destroy'])->name('module.product.gallery.destroy');

        // Product Attribute Options Route
        Route::get('/attribute/value/{product}', [ProductAttributeController::class, 'index'])->name('product.attributes.index');
        Route::post('/attribute/value/{product}', [ProductAttributeController::class, 'store'])->name('product.attributes.store');
        Route::get('/attribute/value/edit/{product_attribute}', [ProductAttributeController::class, 'edit'])->name('product.attributes.edit');
        Route::put('/attribute/value/update/{product_attribute}', [ProductAttributeController::class, 'update'])->name('product.attribute.update');
        Route::get('/fetch/attribute/value/value', [ProductAttributeController::class, 'fetch_attributes_value'])->name('fetch.attributes.value');
        Route::delete('/attribute/value/delete/{product_attribute}', [ProductAttributeController::class, 'destroy'])->name('product.attributes.destroy');

});
