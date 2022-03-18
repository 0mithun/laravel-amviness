<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Blog\Entities\Post;
use Modules\Brand\Entities\Brand;
use Modules\Banner\Entities\Banner;
use Modules\Product\Entities\Product;
use Modules\Category\Entities\Category;

class FrontendController extends Controller
{



    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        $data['banners'] = Banner::latest()->get();
        $data['products'] = Product::whereStatus(1)->latest('id')->paginate(20);
        $data['brands'] = Brand::latest('id')->get();
        $data['blogs'] = Post::latest('id')->take(16)->get();
        $data['categories'] = Category::oldest('order')->get();

        return view('frontend.index', $data);
    }
}
