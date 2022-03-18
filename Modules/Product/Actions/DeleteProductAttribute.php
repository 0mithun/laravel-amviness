<?php

namespace Modules\Product\Actions;

class DeleteProductAttribute
{
    public static function delete($product_attribute)
    {
        return $product_attribute->delete();
    }
}
