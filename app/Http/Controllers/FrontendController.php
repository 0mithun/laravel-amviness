<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Faq\Entities\Faq;
use Modules\Blog\Entities\Post;
use Modules\Brand\Entities\Brand;
use Modules\Banner\Entities\Banner;
use Modules\Contact\Entities\Contact;
use Modules\Product\Entities\Product;
use Modules\Category\Entities\Category;
use Modules\Wishlist\Entities\Wishlist;
use Modules\Category\Entities\SubCategory;

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


        return view('frontend.index', $data);
    }




    /**
     *
     * @param  Product
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */

    public function shop_page()
    {
        // return $topCategories = Category::with('subcategories')->withCount('posts as post_count')->get();
        // return $topCategories = Category::with('subcategories')->withCount('posts as post_count')->latest('post_count')->take(8)->get();
        // return $topCategories = Category::with('subcategories')->withCount('ads as ad_count')->latest('ad_count')->take(8)->get();

        $data['products'] = Product::when(request('search'), function ($query) {
            $query->where('title', 'LIKE', '%' . request('search') . '%');
        })->latest('id')->paginate(15);

        // return $data['products'] = Product::latest('id')->get();
        $data['categories'] = Category::latest('id')->get();
        $data['brands'] = Brand::latest('id')->get();
        return view('frontend.shop', $data);
    }
    /**
     *
     * @param  Category
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */

    public function shop_grid()
    {
        // return "dfgnjdbgjhbe";
        // $data['products'] = Product::latest('id')->get();
        $data['products'] = Product::when(request('search'), function ($query) {
            $query->where('title', 'LIKE', '%' . request('search') . '%');
        })->latest('id')->paginate(24);
        $data['categories'] = Category::latest('id')->get();
        $data['brands'] = Brand::latest('id')->get();
        return view('frontend.shop-grid', $data);
    }




    /**
     *
     * @param  Product
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function singlep_product(Product $product)
    {
        $rellateds = Product::where('id', '!=', $product->id)->latest('category_id', $product->category_id)->take(5)->get();
        return view('frontend.single-product', compact('product', 'rellateds'));
    }


    /**
     *
     * @param
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function about()
    {
        return view('frontend.about');
    }



    /**
     *
     * @param  Product
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function getProductCategory(Category $category)
    {
        $categories = Category::latest('id')->get();
        $brands = Brand::latest('id')->get();
        $products = Product::where('category_id', $category->id)->latest('id')->get();
        return view('frontend.pages.category-product', compact('products', 'categories', 'brands'));
    }

    /**
     *
     * @param  Product
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function getProductsubCategory(SubCategory $subcategory)
    {
        $categories = Category::latest('id')->get();
        $brands = Brand::latest('id')->get();
        $products = Product::where('category_id', $subcategory->id)->latest('id')->get();
        return view('frontend.pages.category-product', compact('products', 'categories', 'brands'));
    }


    /**
     *
     * @param  Product
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function getPostcategory(Post $post)
    {
        $categories = Category::latest('id')->get();
        // $brands = Brand::latest('id')->get();
        $posts = Post::where('category_id', $post->id)->latest('id')->get();
        return view('frontend.category-post', compact('posts', 'categories'));
        // return view('frontend.pages.category-product', compact('products', 'categories', 'brands'));
    }



    /**
     *
     * @param  Post
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function blog()
    {
        $blogs = Post::when(request('search'), function ($query) {
            $query->where('title', 'LIKE', '%' . request('search') . '%');
        })->orderBy('id', 'DESC')->paginate(5);

        // $blogs = Post::latest('id')->paginate(5);// blog data fetchdata
        $categories = Category::latest('id')->get();
        return view('frontend.blog', compact('blogs', 'categories'));
    }

    /**
     *
     * @param  Post
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function blog_grid()
    {
        $blogs = Post::when(request('search'), function ($query) {
            $query->where('title', 'LIKE', '%' . request('search') . '%');
        })->orderBy('id', 'DESC')->paginate(9);
        $categories = Category::latest('id')->get();
        return view('frontend.blog-grid', compact('blogs', 'categories'));
    }


    /**
     *
     * @param  Product
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function single_blog(Post $post)
    {
        $blogs = Post::latest('id')->paginate(5);
        $rellateds = Post::where('id', '!=', $post->id)->latest('id')->take(3)->get();
        $categories = Category::latest('id')->get();
        return view('frontend.single-blog', compact('post', 'categories', 'blogs', 'rellateds'));
    }



    /**
     * contact page data passing
     * @param
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function conatct()
    {
        // return Contact::latest()->get();
        $contacts = Contact::latest()->take(5)->get();
        return view('frontend.contact', compact('contacts'));
    }

    /**
     * contact page frontend data store
     * @param Contact
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function conatctpage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            'subject' => 'required'
        ]);
        $contact = Contact::create($request->all());

        if ($contact) {
            flashSuccess('Contact Create Successfully');
            return redirect()->route('frontend.conatct');
        } else {
            flashError();
            return back();
        }
    }



    /**
     * contact page frontend data store
     * @param Faq
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function faqs()
    {
        $faqs = Faq::latest()->take(10)->get();
        return view('frontend.faqs', compact('faqs'));
    }



    /**
     * contact page frontend data store
     * @param Faq
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function myaccount()
    {
        // return "sdsdfsdf";

        return view('frontend.myaccount');
    }





    /**
     * contact page frontend data store
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function customerlogin()
    {
        return view('frontend.customerlogin');
    }

    /**
     * contact page frontend data store
     * @param Request
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function customerloginpage(Request $request)
    {
        return "trktheddfdfdfd";
        return view('frontend.customerlogin');
    }


    /**
     * contact page frontend data store
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function customerregister()
    {
        return view('frontend.customerregister');
    }



    /**
     * contact page frontend data store
     * @param Request
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function customerregisterpage(Request $request)
    {
        return $request;
    }

    /**
     * contact page frontend data store
     * @param Request
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function wistlist(Request $request)
    {
        // return auth('customer')->id();



        $wishlists = Wishlist::with('product')->latest()->get();
        return view('frontend.wishlist', compact('wishlists'));
    }

    /**
     * contact page frontend data store
     * @param Request
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function cart(Request $request)
    {
        return view('frontend.cart');
    }


    /**
     * contact page frontend data store
     * @param Request
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function checkout(Request $request)
    {
        return view('frontend.checkout');
    }


    /**
     * contact page frontend data store
     * @param Request
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function order(Request $request)
    {
        return view('frontend.order');
    }


    public function wishlisStore(Request $request)
    {
        $data = Wishlist::where('product_id', $request->product_id)->whereUserId($request->user_id)->first();
        if ($data) {
            $data->delete();

            flashSuccess('Ad removed from wishlist');
        } else {
            Wishlist::create([
                'product_id' => $request->product_id,
                'user_id' => $request->user_id
            ]);

            flashSuccess('Ad added to wishlist');
        }

        $user = auth('customer')->user();
        return back();
    }
    public function wishlisStorerm(Wishlist $wishlist)
    {
        try {
            $wishlist->delete();
            return redirect()->route('frontend.wishlist');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
