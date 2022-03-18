<?php

namespace Modules\Product\Repositories;

use Modules\Product\Actions\StatusChange;
use Modules\Product\Actions\CategoriesProduct;
use Modules\Product\Actions\CreateProduct;
use Modules\Product\Actions\DeleteProduct;
use Modules\Product\Actions\SubcategoryList;
use Modules\Product\Actions\UpdateProduct;
use Modules\Product\Entities\Product;

class ProductRepositories implements ProductInterface
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return Product::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Object  $data
     */
    public function store(Object $data)
    {
        return CreateProduct::create($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Object $request
     * @param Object $product
     * @return \Illuminate\Http\Response
     */
    public function update(Object $request, Object $data)
    {
        return UpdateProduct::update($request, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Object $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Object $data)
    {
        return DeleteProduct::delete($data);
    }

    /**
     * Get category wise product from storage.
     *
     * @param Object $data
     * @return \Illuminate\Http\Response
     */
    public function categoryWiseProduct(Object $data)
    {
        return CategoriesProduct::get($data);
    }

    /**
     * Get subcategory list from storage.
     *
     * @param Object $data
     * @return \Illuminate\Http\Response
     */
    public function subcategory_list(Object $data)
    {
        return SubcategoryList::get($data);
    }

    /**
     * Status change list from storage.
     *
     * @param Object $data
     * @return \Illuminate\Http\Response
     */
    public function status_change(Object $data)
    {
        return StatusChange::status($data);
    }
}
