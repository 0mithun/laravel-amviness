<?php

namespace Modules\Product\Actions;

class DeleteProduct
{
    public static function delete($product)
    {
        deleteImage($product->image);
        return $product->delete();
    }
}
