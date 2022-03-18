<?php

namespace Modules\Product\Actions;

use Modules\Product\Entities\Product;

class CreateProduct
{
    public static function create($request)
    {
        $product = Product::create($request->except(['image']));

        $image = $request->image;
        if ($image) {
            $url = uploadImage($image, 'product');
            $product->update(['image' => $url]);
        }

        return $product;



        // $product = new Product();
        // $product->category_id = $request->category_id;
        // if ($request->brand_id) {
        //     $product->brand_id = $request->brand_id;
        // }
        // $product->title = $request->title;
        // $product->sku = $request->sku;
        // $product->price = $request->price;
        // $product->status = $request->status;

        // $image = $request->image;
        // if ($image) {
        //     $url = uploadImage($image, 'product');
        //     $product->image = $url;
        // }

        // if ($request->handling_time) {
        //     $product->handling_time = $request->handling_time;
        // }
        // if ($request->shipping_cost) {
        //     $product->shipping_cost = $request->shipping_cost;
        // }
        // if ($request->sale_price) {
        //     $product->sale_price = $request->sale_price;
        // }
        // if ($request->total_orders) {
        //     $product->total_orders = $request->total_orders;
        // }
        // if ($request->total_favourites) {
        //     $product->total_favourites = $request->total_favourites;
        // }
        // if ($request->short_description) {
        //     $product->short_description = $request->short_description;
        // }
        // if ($request->long_description) {
        //     $product->long_description = $request->long_description;
        // }

        // return $product->save();
    }
}
