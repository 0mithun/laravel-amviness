<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Product\Entities\ProductGallery;
use Modules\Product\Actions\CreateProductGallery;
use Modules\Product\Actions\DeleteProductGallery;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $product_galleries = ProductGallery::where('product_id', $id)->latest()->get();
        return view('product::product.gallery.index', compact('id', 'product_galleries'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('product::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $id)
    {
        $gallery = CreateProductGallery::create($request, $id);

        if ($gallery) {
            return response()->json([
                'message' => 'Product Gallery Images Saved Successfully',
                'url' => route('module.product.gallery.index', $id)
            ]);
        } else {
            flashError();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProductGallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductGallery $gallery)
    {
        try {
            DeleteProductGallery::delete($gallery);

            flashSuccess('Product Gallery Images Deleted Successfully');
            return back();
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }
}
