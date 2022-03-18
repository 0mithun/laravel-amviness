<?php

namespace Modules\Product\Actions;

use Modules\Attribute\Entities\AttributeValue;
use Modules\Product\Entities\ProductAttribute;

class CreateProductAttribute
{
    public static function create($request, $product)
    {
        $product_attribute = ProductAttribute::create($request->except(['product_id', 'value']));
        $product_attribute->update([
            'product_id' => $product->id,
            'value' => AttributeValue::findOrFail($request->value_id)->value,
        ]);

        return $product_attribute;
    }
}
