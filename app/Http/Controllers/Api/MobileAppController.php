<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Modules\Banner\Entities\Banner;
use Modules\Blog\Entities\Post;
use Modules\Brand\Entities\Brand;
use Modules\Category\Entities\Category;
use Modules\Category\Entities\SubCategory;
use Modules\Contact\Entities\Contact;
use Modules\Newsletter\Entities\Newsletter;
use Modules\Product\Entities\Product;
use Modules\Setting\Entities\Setting;
use Modules\Wishlist\Entities\Wishlist;

class MobileAppController extends Controller
{
    /**
     *
     * @param  Null
     * @return Modules\Banner\Entities\Banner
     * @return Modules\Banner\Entities\Brand
     * @return Modules\Banner\Entities\Category
     * @return Modules\Banner\Entities\Product
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function index()
    {
        $products = Product::with('category', 'brand')->latest('id')->take(12)->paginate();
        $banners = Banner::latest('id')->take(3)->get();
        $topCategories = Category::with('subcategories')->withCount('posts as post_count')->latest('post_count')->take(8)->get();
        $newProducts = Product::latest('id')->take(10)->get();
        $popularProducts = Product::latest('id')->where('status', 1)->whereHandlingTime(1)->take(10)->get();
        $topSaleProducts = Product::where('status', 1)->take(10)->get();
        try {
            $data = [
                'topBanners' => $banners,
                'topCategories' => $topCategories,
                'newProducts' => $newProducts,
                'popularProducts' => $popularProducts,
                'topSaleProducts' => $topSaleProducts,
                'products' => $products,
                'topSaleProducts' => $topSaleProducts
            ];
            return sendSuccessResponse($data);
        } catch (QueryException $e) {
            return sendErrorResponse("Something went wrong", $e->getMessage(), 500);
        }
    }



    /**
     *
     * @param  Product
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function productSearch()
    {
        try {
            $data['products'] = Product::when(request('search'), function ($query) {
                $query->where('title', 'LIKE', '%' . request('search') . '%');
            })->latest('id')->paginate(15);
            return sendSuccessResponse($data);
        } catch (QueryException $e) {
            return sendErrorResponse("Something went wrong", $e->getMessage(), 500);
        }
    }




    /**
     *
     * @param  Product
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function blogSearch()
    {
        try {
            $data['products'] = Post::when(request('search'), function ($query) {
                $query->where('title', 'LIKE', '%' . request('search') . '%');
            })->latest('id')->paginate(15);
            return sendSuccessResponse($data);
        } catch (QueryException $e) {
            return sendErrorResponse("Something went wrong", $e->getMessage(), 500);
        }
    }

    /**
     *
     * @param  Product
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function topCategory()
    {
        try {
            $data = Category::with('subcategories')->withCount('posts as post_count')->latest('post_count')->take(8)->get();
            return sendSuccessResponse($data);
        } catch (QueryException $e) {
            return sendErrorResponse("Something went wrong", $e->getMessage(), 500);
        }
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
        try {
            $data = Product::with('category')->with('brand')->where('category_id', $category->id)->latest('id')->paginate(12);
            return sendSuccessResponse($data);
        } catch (QueryException $e) {
            return sendErrorResponse("Something went wrong", $e->getMessage(), 500);
        }
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


        try {
            $data = Product::with('brand', 'category')->where('category_id', $subcategory->id)->latest('id')->paginate(12);
            return sendSuccessResponse($data);
        } catch (QueryException $e) {
            return sendErrorResponse("Something went wrong", $e->getMessage(), 500);
        }
    }

    /**
     *
     * @param  Product
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function setting()
    {
        try {
            $data = Setting::first();
            return sendSuccessResponse($data);
        } catch (QueryException $e) {
            return sendErrorResponse("Something went wrong", $e->getMessage(), 500);
        }
    }
    /**
     *
     * @param  Newsletter
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function newsletter()
    {
        try {
            $data = Newsletter::first();
            return sendSuccessResponse($data);
        } catch (QueryException $e) {
            return sendErrorResponse("Something went wrong", $e->getMessage(), 500);
        }
    }



    /**
     *
     * @param  Contact
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            'subject' => 'required'
        ]);

        try {
            $data = Contact::create($request->all());
            return sendSuccessResponse($data);
        } catch (QueryException $e) {
            return sendErrorResponse("Something went wrong", $e->getMessage(), 500);
        }
    }


    public function wishlist()
    {
        // return Wishlist::where('user_id', 1)->get();

        try {
            $data = Wishlist::where('user_id', 1)->get();
            return sendSuccessResponse($data);
        } catch (QueryException $e) {
            return sendErrorResponse("Something Went Wrong", $e->getMessage(), 500);
        }

        // return Wishlist::where('user_id', 1)->get();
    }


    public function destroy_wishlist(Request $request, $id)
    {
        try {
            $data = Wishlist::whereId($id)->first();

            if ($data) {
                return sendSuccessResponse($data);
            } else {
                return sendErrorResponse([], 'Data Not Foun', 404);
            }
        } catch (QueryException $e) {
            return sendErrorResponse("Something went wrong", $e->getMessage(), 500);
        }
    }
    public function single_wishlist(Request $request, $id)
    {
        $data = Wishlist::whereId($id)->first();
        try {
            $data->delete();
            if ($data) {
                return sendSuccessResponse($data);
            } else {
                return sendErrorResponse([], 'Data Not Foun', 404);
            }
        } catch (QueryException $e) {
            return sendErrorResponse("Something went wrong", $e->getMessage(), 500);
        }
    }


    public function relatedShowData(Product $product)
    {
        // Product::all();

        $related =  Product::whereHas('category', function ($query) use ($product) {
            $query->where('name', $product->category);
        })->whereNotIn('name', [$product->name])->get();


        return $related;
    }
}
