<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Brand\Entities\Brand;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\Category\Entities\Category;
use Modules\Product\Http\Requests\ProductFormRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Product\Repositories\ProductRepositories;

class ProductController extends Controller
{
    use ValidatesRequests;

    protected $product;
    public function __construct(ProductRepositories $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest('id')->get();
        return view('product::product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('product::product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        try {
            $this->product->store($request);

            flashSuccess('Product Added Successfully');
            return back();
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }

    /**
     * Show the specified resource.
     *
     * @return string
     */
    public function show(Product $product)
    {
        return view('product::product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Product $product
     * @return Renderable
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('product::product.edit', compact('categories', 'brands', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductFormRequest $request
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, Product $product)
    {
        try {
            $this->product->update($request, $product);

            flashSuccess('Product Updated Successfully');
            return redirect(route('module.product.index'));
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $this->product->destroy($product);

            flashSuccess('Product Deleted Successfully');
            return redirect(route('module.product.index'));
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }

    /**
     * Get category wise product from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function categoryWiseProduct(Category $category)
    {
        try {
            $products = $this->product->categoryWiseProduct($category);

            return view('product::product.categoriesProduct', compact('products', 'category'));
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }

    /**
     * Get subcategory list from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function subcategory_list(Request $request)
    {
        try {
            $subcategories = $this->product->subcategory_list($request);

            return responseData($subcategories, 'subcategories');
        } catch (\Throwable $th) {
            return responseError();
        }
    }

    /**
     * Status change list from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function status_change(Request $request)
    {
        try {
            $this->product->status_change($request);

            if ($request->status == 1) {
                return responseSuccess('Product Activated Successfully');
            } else {
                return responseSuccess('Product Inactivated Successfully');
            }
        } catch (\Throwable $th) {
            return responseError();
        }
    }
}
