<?php

namespace Modules\Product\Actions;

class UpdateProduct
{
    public static function update($request, $product)
    {
        $product->update($request->except(['image']));

        $image = $request->image;
        if ($image) {
            deleteImage($product->image);
            $url = uploadImage($image, 'product');
            $product->update(['image' => $url]);
        }

        return $product;
    }
}
