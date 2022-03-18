<?php

namespace Modules\Product\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\Attribute\Entities\Attribute;
use Modules\Attribute\Entities\AttributeValue;
use Modules\Product\Entities\ProductAttribute;
use Modules\Product\Actions\CreateProductAttribute;
use Modules\Product\Actions\DeleteProductAttribute;
use Modules\Product\Actions\UpdateProductAttribute;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Product\Http\Requests\ProductAttributeFormRequest;

class ProductAttributeController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product, $product_attribute = null)
    {
        $attributes = Attribute::all();
        $product_attributes = ProductAttribute::where('product_id', $product->id)->get();

        return view('product::product.attribute.index', compact('product', 'attributes', 'product_attributes', 'product_attribute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param ProductAttributeFormRequest $request
     * @param Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProductAttributeFormRequest $request, Product $product)
    {
        $product_attribute_count = ProductAttribute::where('product_id', $product->id)
            ->where('attribute_id', $request->attribute_id)
            ->where('value_id', $request->value_id)
            ->count();

        if ($product_attribute_count != 0) {
            $this->validate($request, [
                'value_id' => "required|unique:product_attributes,value_id",
            ], [
                'value_id.unique' => 'The attribute option name has already been taken'
            ]);
        } else {
            $productAttribute = CreateProductAttribute::create($request, $product);

            if ($productAttribute) {
                flashSuccess('Product Attribute Added Successfully');
                return back();
            } else {
                flashError();
                return back();
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProductAttribute $product_attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAttribute $product_attribute)
    {
        return $this->index($product_attribute->product, $product_attribute);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductAttributeFormRequest $request
     * @param ProductAttribute $product_attribute
     * @return \Illuminate\Http\Response
     */
    public function update(ProductAttributeFormRequest $request, ProductAttribute $product_attribute)
    {
        $product_attribute_count = ProductAttribute::where('product_id', $product_attribute->product_id)
            ->where('attribute_id', $request->attribute_id)
            ->where('value_id', $request->value_id)
            ->where('id', '!=', $product_attribute->id)
            ->count();

        if ($product_attribute_count != 0) {
            $this->validate($request, [
                'value_id' => "required|unique:product_attributes,value_id,$product_attribute->id",
            ], [
                'value_id.unique' => 'The attribute value has already been taken.'
            ]);
        } else {

            $productAttribute = UpdateProductAttribute::update($request, $product_attribute);

            if ($productAttribute) {
                flashSuccess('Product Attribute Updated Successfully');
                return redirect(route('product.attributes.index', $product_attribute->product_id));
            } else {
                flashError();
                return back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProductAttribute $product_attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAttribute $product_attribute)
    {
        $productAttribute = DeleteProductAttribute::delete($product_attribute);

        if ($productAttribute) {
            flashSuccess('Product Attribute Deleted Successfully');
            return back();
        } else {
            flashError();
            return back();
        }
    }

    /**
     * Fetch attribute value specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function fetch_attributes_value(Request $request)
    {
        $options = AttributeValue::where('attribute_id', $request->id)->get();
        return response()->json(['options' => $options]);
    }
}
