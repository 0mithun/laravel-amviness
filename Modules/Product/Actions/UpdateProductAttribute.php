<?php

namespace Modules\Product\Actions;

use Modules\Attribute\Entities\AttributeValue;

class UpdateProductAttribute
{
    public static function update($request, $product_attribute)
    {
        $product_attribute->update($request->except(['product_id', 'value']));

        $product_attribute->update([
            'product_id' => $product_attribute->product_id,
            'value' => AttributeValue::findOrFail($request->value_id)->value,
        ]);

        return $product_attribute;
    }
}
