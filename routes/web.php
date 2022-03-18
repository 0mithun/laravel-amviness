<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\FrontendController;

Route::middleware(['frontend_setlang'])->group(function () {

    Route::get('/', [FrontendController::class,'index'])->name('home');

    // Route::get("/", [FrontendController::class, 'frontend_home'])->name('home');



    Route::group(['as' => 'frontend.'], function(){

        Route::get("/shop", [FrontendController::class, 'shop_page'])->name('shop');
        Route::get("/shop-grid", [FrontendController::class, 'shop_grid'])->name('shop.grid');
        Route::get("/single-product/{product}", [FrontendController::class, 'singlep_product'])->name('singleproduct');
        Route::get('/about', [FrontendController::class, 'about'])->name('about');



        //category and subcategoery
        Route::get('category/category-{category:slug}', [FrontendController::class, 'getProductCategory'])->name('product.category');
        Route::get('category/subcategory-{subcategory}', [FrontendController::class, 'getProductsubCategory'])->name('product.subcategory');
        //Blog
        Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
        Route::get('/blog-grid', [FrontendController::class, 'blog_grid'])->name('blog.grid');
        Route::get('/single-blog/{post}', [FrontendController::class, 'single_blog'])->name('singleblog');
        Route::get('/category/blog/{post}', [FrontendController::class, 'getPostcategory'])->name('post.category');
        //contact
        Route::get('/conatct', [FrontendController::class, 'conatct'])->name('conatct');
        Route::post('/conatct-page', [FrontendController::class, 'conatctpage'])->name('conatctpage');
        // Faqs
        Route::get('/faqs', [FrontendController::class, 'faqs'])->name('faqs');
        // account and

        // customer multui-guard auth
        // Route::get("/customer-login", [FrontendController::class, 'customerlogin'])->name('customerlogin');

        // ==================================login controler=====================================================

        // Route::get('customer-login', [App\Http\Controllers\Auth\Customer\LoginController::class, 'showLoginForm'])->name('customer.login');
        // Route::post('/customer/login', [App\Http\Controllers\Auth\Customer\LoginController::class, 'login'])->name('login.submit');






        // Route::post("/customer-login", [FrontendController::class, 'customerloginpage'])->name('customerloginpage');
        // Route::get("/customer-register", [FrontendController::class, 'customerregister'])->name('customerregister');
        // Route::post("/customer-register", [FrontendController::class, 'customerregisterpage'])->name('customerregisterpage');

        //wishlist,cart,order,checkout

        Route::group(['middleware'=> ['auth']], function(){

            Route::get('my-account', [FrontendController::class, 'myaccount'])->name('myaccount');

            Route::get('/wishlist', [FrontendController::class, 'wistlist'])->name('wishlist');
            Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
            Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout');
            Route::get('/order', [FrontendController::class, 'order'])->name('order');



            Route::post('/wish', [FrontendController::class, 'wishlisStore'])->name('wishlist.customer');
            Route::post('/wish-rm/{wishlist}', [FrontendController::class, 'wishlisStorerm'])->name('wishlist.customerrm');

        });
    });












    // Route::get('/home', function(){
    //     return view('home');
    // })->name('home');





    Auth::routes();

    Route::get('/lang/{lang}', function($lang){
        session()->put('frontend_lang', $lang);
        app()->setLocale($lang);

        return back();
    });

});


// ========================================================
//====================social Login=========================
// ========================================================
Route::get('login/{provider}', [SocialLoginController::class, 'redirect'])->name('social-login');
Route::get('auth/{provider}/callback', [SocialLoginController::class, 'callback']);


// ========================================================
//====================Artisan command======================
// ========================================================

// Route::get('route-clear', function () {
//     \Artisan::call('route:clear');
//     dd("Route Cleared");
// });
// Route::get('optimize', function () {
//     \Artisan::call('optimize');
//     dd("Optimized");
// });
// Route::get('view-clear', function () {
//     \Artisan::call('view:clear');
//     dd("View Cleared");
// });
// Route::get('view-cache', function () {
//     \Artisan::call('view:cache');
//     dd("View cleared and cached again");
// });
// Route::get('config-cache', function () {
//     \Artisan::call('config:cache');
//     dd("configuration cleared and cached again");
// });



Route::fallback(function () {
    return 'Not found';
});
