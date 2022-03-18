<?php

namespace Modules\Attribute\Actions;

use Modules\Attribute\Entities\AttributeValue;

class CreateAttributeValue
{
    public static function create($request)
    {
        $value = AttributeValue::create($request->except(['price']));

        if ($request->price) {
            $value->price = number_format($request->price, 2);
            $value->save();
        }

        return $value;
    }
}
